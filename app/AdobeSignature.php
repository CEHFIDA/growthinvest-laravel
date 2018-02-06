<?php
/**
 * Accepts pdf file and send the pdf file content using adobe echosign to the recipients.
 * Allows to set webhook which listens for the event when the recipients signs the document.
 * If document is signed, allows to download signed pdf for a given document key
 * Allows to retrieve adobe generated value of Document key,
 * and the signed document url for supplied user id
 * https://secure.na1.echosign.com/public/docs/EchoSignDocumentService15
 */

namespace App;
use SoapClient;

class AdobeSignature
{
    private $adobe_sign;
    private $adobe_echo_sign_url;
    private $integration_key;

    public function __construct()
    {
        $this->adobe_echo_sign_url = 'https://secure.echosign.com/services/EchoSignDocumentService22?wsdl';
        $this->users_data          = new UserData;
        $this->integration_key     = env('ADOBESIGN_ACCOUNT_KEY');
    }

    /**
     * Initialize the adobe echosign api
     * @return null
     */
    public function initializeEchoSign()
    {

        $this->adobe_sign          = new \SoapClient($this->adobe_echo_sign_url);
        $this->adobe_echo_sign_url = $this->getAdobeSignBaseUrl();
        $this->adobe_sign          = new \SoapClient($this->adobe_echo_sign_url);
    }

    /**
     * Get the adobe api url for sending pdf for signature using api
     * @return string $base_uri
     */
    public function getAdobeSignBaseUrl()
    {

        $signature = $this->adobe_sign;
        $api_key   = $this->integration_key;
        $url       = $this->adobe_echo_sign_url;

        $base_version  = 22;
        $base_uri      = "";
        $protocol      = parse_url($url, PHP_URL_SCHEME);
        $server_path   = parse_url($url, PHP_URL_PATH);
        $php_url_query = parse_url($url, PHP_URL_QUERY);

        $echo_sign_document_service_version = filter_var($server_path, FILTER_SANITIZE_NUMBER_INT);
        $version                            = (int) $echo_sign_document_service_version;
        if ($version < $base_version) {
            $base_uri = $url;
        } else {
            $api_results   = $signature->getBaseUris(array('apiKey' => $api_key))->getBaseUrisResult;
            $base_uris     = $api_results->apiBaseUri;
            $base_uri_host = parse_url($base_uris, PHP_URL_HOST);
            $base_uri      = $protocol . "://" . $base_uri_host . $server_path . "?" . $php_url_query;
        }

        return $base_uri;
    }

    /**
     * Sends the pdf for signature to recipient using adobe echosign api,
     * and returns the key generated by adobe echosign for the document
     * @param  array $args array('pdf_url'=>pdffilepath,'message'=>that will be displayed in the body of mail,
     * 'name'=>'name of the form', 'recipient_email'=>'','ccs'=>'comma seperated email ids',
     * 'callbackInfo'=>'webhook url, which will listen for the signature event' )
     * @return string $documentKey adobe document key
     */
    public function sendPdfForSignature($args)
    {
        $this->initializeEchoSign();

        $adobe_sign = $this->adobe_sign;
        $api_key    = $this->integration_key;

        $sign_result = $adobe_sign->sendDocument(array(
            'apiKey'               => $api_key,
            'documentCreationInfo' => array(
                'fileInfos'     => array(
                    'FileInfo' => array(
                        'file'     => file_get_contents($args['pdf_url']),
                        'fileName' => $args['pdf_url'],
                    ),
                ),
                'message'       => $args['message'],
                'name'          => $args['name'],
                'signatureFlow' => "SENDER_SIGNATURE_NOT_REQUIRED",
                'signatureType' => "ESIGN",
                'recipients'    => array(
                    array(
                        'email' => $args['recipient_email'],
                        'role'  => 'SIGNER',
                    ),
                ),
                'ccs'           => $args['ccs'],
                'callbackInfo'  => array('signedDocumentUrl' => $args['callbackInfo']),

            ),

        )
        );

        foreach ($sign_result->documentKeys as $signed_key => $signed_value) {
            $document_key = $signed_value->documentKey;
        }

        return $document_key;
    }

    /**
     * sends the adobe document key to the adobe echosign api and returns the signed document url
     * @param  string $doc_key document key generated by adobe for the pdf
     * @return string $adobe_doc_url adobe url for the signed document.
     */
    public function getAdobeDocUrlByDocKey($doc_key)
    {
        $this->initializeEchoSign();

        $adobe_sign = $this->adobe_sign;
        $api_key    = $this->integration_key;
        $signature  = $adobe_sign;

        $docdata = $signature->getDocumentUrls(array(
            'apiKey'      => $api_key,
            'documentKey' => $doc_key,
            'options'     => array('comb'),
        ));

        $adobe_doc_url = $docdata->getDocumentUrlsResult->urls->DocumentUrl->url;
        return $adobe_doc_url;
    }

    /**
     * downloads the signed document based on provided document key
     * @param  string $doc_key key generated by adobe echosign for the document
     * @return application/pdf
     */
    public function downloadSignedUrl($user_id, $type)
    {

        $adobe_doc_keys       = $this->getAdobeDocKeys($type);
        $user_data_signed_url = $this->users_data->getUserValue($user_id, $adobe_doc_keys['signed_url']);
        $file_name            = $adobe_doc_keys['filename'];

        header('Cache-Control: public');
        header('Content-type: application/pdf');
        header("Content-Transfer-Encoding: Binary");
        header('Content-Disposition: attachment; filename="' . $file_name . '"');
        readfile($adobe_doc_url);
    }

    /**
     * gets key, url generated by adobe echosign for the signed pdf document, stored against given userid
     * @param  string $user_id   user id
     * @param  string $type pdf
     * @return array  $doc_data key,documenturl generated by adobe echosign and
     */
    public function getSignedUrldocKey($user_id, $type)
    {
        $adobe_doc_keys = $this->getAdobeDocKeys($type);

        $user_data_dockey      = $this->users_data->getUserValue($user_id, $adobe_doc_keys['key']);
        $user_data_signed_url  = $this->users_data->getUserValue($user_id, $adobe_doc_keys['signed_url']);
        $user_data_signed_date = $this->users_data->getUserValue($user_id, $adobe_doc_keys['doc_signed_date']);

        $doc_data = array('dockey' => $user_data_dockey, 'signeddocurl' => $user_data_signed_url, 'doc_signed_date' => $user_data_signed_date);

        return $doc_data;
    }

    /**
     * getAdobeDocKeys get the key name for adobe echosign pdf dockey
     * @param  string $doc_type type of the document to be signed
     * @return array $doc_array  metakey used for storing the adobe document
     */
    public function getAdobeDocKeys($doc_type)
    {
        switch ($doc_type) {

            case 'nominee':
                $doc_array = array('key' => 'nomineeapplication_dockey', 'signed_url' => 'nomineeapplication_signedurl', 'doc_signed_date' => 'nominee_signed_docdate', "filename" => 'Nominee_Application_Form.pdf');
                break;

            default:
                break;
        }

        return $doc_array;
    }

}
