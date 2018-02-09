<?php
/**
generic method to fetch list of records from model
$modelName : 'App/User';
$filters: ['id'=>1]
$orderDataBy: ['id'=>'desc']
 **/
function getModelList($modelName, $filters = [], $skip = 0, $length = 0, $orderDataBy = [])
{

    $model = new $modelName;

    if (empty($filters)) {
        $modelQuery = $model::select('*');
    } else {
        $modelQuery = $model::where($filters);
    }

    foreach ($orderDataBy as $columnName => $orderBy) {
        $modelQuery->orderBy($columnName, $orderBy);
    }

    if ($length > 1) {
        $listCount = $modelQuery->get()->count();
        $list      = $modelQuery->skip($skip)->take($length)->get();
    } else {
        $list      = $modelQuery->get();
        $listCount = $list->count();
    }

    return ['listCount' => $listCount, 'list' => $list];

}

/**
check if provided permission has access to th user
 */
function hasAccess($uriPermission)
{
    $guard       = $uriPermission['guard'];
    $permissions = $uriPermission['permissions'];
    $access      = false;

    if (!empty($permissions)) {
        //check for permission

        if (!hasPermission($permissions, $guard)) {
            $access = false;
        } else {
            $access = true;
        }

    }

    return $access;
}

/***
checks if user has permission
$uriPermission : array of permission
 **/

function hasPermission($permissions, $guard)
{

    if (Auth::check() && Auth::user()->hasAnyPermission($permissions)) {
        return true;
    } else {
        return false;
    }

}

function getCounty()
{
    return ['Avon', 'Bedfordshire', 'Berkshire', 'Borders', 'Buckinghamshire', 'Cambridgeshire', 'Central', 'Cheshire', 'Cleveland', 'Clwyd', 'Cornwall', 'County Antrim', 'County Armagh', 'County Down', 'County Fermanagh', 'County Londonderry', 'County Tyrone', 'Cumbria', 'Derbyshire', 'Devon', 'Dorset', 'Dumfries and Galloway', 'Durham', 'Dyfed', 'East Sussex', 'Essex', 'Fife', 'Gloucestershire', 'Grampian', 'Greater Manchester', 'Gwent', 'Gwynedd County', 'Hampshire', 'Herefordshire', 'Hertfordshire', 'Highlands and Islands', 'Humberside', 'Isle of Wight', 'Kent', 'Lancashire', 'Leicestershire', 'Lincolnshire', 'London', 'Lothian', 'Merseyside', 'Mid Glamorgan', 'Norfolk', 'North Yorkshire', 'Northamptonshire', 'Northumberland', 'Nottinghamshire', 'Oxfordshire', 'Powys', 'Rutland', 'Shropshire', 'Somerset', 'South Glamorgan', 'South Yorkshire', 'Staffordshire', 'Strathclyde', 'Suffolk', 'Surrey', 'Tayside', 'Tyne and Wear', 'Warwickshire', 'West Glamorgan', 'West Midlands', 'West Sussex', 'West Yorkshire', 'Wiltshire', 'Worcestershire'];
}

function getCountry()
{
    return ["GB" => "United Kingdom", "AF" => "Afghanistan", "AX" => "Aland Islands", "AL" => "Albania", "DZ" => "Algeria", "AS" => "American Samoa", "AD" => "Andorra", "AO" => "Angola", "AI" => "Anguilla", "AQ" => "Antarctica", "AG" => "Antigua And Barbuda", "AR" => "Argentina", "AM" => "Armenia", "AW" => "Aruba", "AU" => "Australia", "AT" => "Austria", "AZ" => "Azerbaijan", "BS" => "Bahamas", "BH" => "Bahrain", "BD" => "Bangladesh", "BB" => "Barbados", "BY" => "Belarus", "BE" => "Belgium", "BZ" => "Belize", "BJ" => "Benin", "BM" => "Bermuda", "BT" => "Bhutan", "BO" => "Bolivia", "BA" => "Bosnia And Herzegovina", "BW" => "Botswana", "BV" => "Bouvet Island", "BR" => "Brazil", "IO" => "British Indian Ocean Territory", "BN" => "Brunei Darussalam", "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi", "KH" => "Cambodia", "CM" => "Cameroon", "CA" => "Canada", "CV" => "Cape Verde", "KY" => "Cayman Islands", "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile", "CN" => "China", "CX" => "Christmas Island", "CC" => "Cocos (Keeling) Islands", "CO" => "Colombia", "KM" => "Comoros", "CG" => "Congo", "CD" => "Congo,Democratic Republic", "CK" => "Cook Islands", "CR" => "Costa Rica", "CI" => "Cote D'Ivoire", "HR" => "Croatia", "CU" => "Cuba", "CY" => "Cyprus", "CZ" => "Czech Republic", "DK" => "Denmark", "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic", "EC" => "Ecuador", "EG" => "Egypt", "SV" => "El Salvador", "GQ" => "Equatorial Guinea", "ER" => "Eritrea", "EE" => "Estonia", "ET" => "Ethiopia", "FK" => "Falkland Islands (Malvinas)", "FO" => "Faroe Islands", "FJ" => "Fiji", "FI" => "Finland", "FR" => "France", "GF" => "French Guiana", "PF" => "French Polynesia", "TF" => "French Southern Territories", "GA" => "Gabon", "GM" => "Gambia", "GE" => "Georgia", "DE" => "Germany", "GH" => "Ghana", "GI" => "Gibraltar", "GR" => "Greece", "GL" => "Greenland", "GD" => "Grenada", "GP" => "Guadeloupe", "GU" => "Guam", "GT" => "Guatemala", "GG" => "Guernsey", "GN" => "Guinea", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HT" => "Haiti", "HM" => "Heard Island & Mcdonald Islands", "VA" => "Holy See (Vatican City State)", "HN" => "Honduras", "HK" => "Hong Kong", "HU" => "Hungary", "IS" => "Iceland", "IN" => "India", "ID" => "Indonesia", "IR" => "Iran, Islamic Republic Of", "IQ" => "Iraq", "IE" => "Ireland", "IM" => "Isle Of Man", "IL" => "Israel", "IT" => "Italy", "JM" => "Jamaica", "JP" => "Japan", "JE" => "Jersey", "JO" => "Jordan", "KZ" => "Kazakhstan", "KE" => "Kenya", "KI" => "Kiribati", "KR" => "Korea", "KW" => "Kuwait", "KG" => "Kyrgyzstan", "LA" => "Lao People's Democratic Republic", "LV" => "Latvia", "LB" => "Lebanon", "LS" => "Lesotho", "LR" => "Liberia", "LY" => "Libyan Arab Jamahiriya", "LI" => "Liechtenstein", "LT" => "Lithuania", "LU" => "Luxembourg", "MO" => "Macao", "MK" => "Macedonia", "MG" => "Madagascar", "MW" => "Malawi", "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta", "MH" => "Marshall Islands", "MQ" => "Martinique", "MR" => "Mauritania", "MU" => "Mauritius", "YT" => "Mayotte", "MX" => "Mexico", "FM" => "Micronesia, Federated States Of", "MD" => "Moldova", "MC" => "Monaco", "MN" => "Mongolia", "ME" => "Montenegro", "MS" => "Montserrat", "MA" => "Morocco", "MZ" => "Mozambique", "MM" => "Myanmar", "NA" => "Namibia", "NR" => "Nauru", "NP" => "Nepal", "NL" => "Netherlands", "AN" => "Netherlands Antilles", "NC" => "New Caledonia", "NZ" => "New Zealand", "NI" => "Nicaragua", "NE" => "Niger", "NG" => "Nigeria", "NU" => "Niue", "NF" => "Norfolk Island", "MP" => "Northern Mariana Islands", "NO" => "Norway", "OM" => "Oman", "PK" => "Pakistan", "PW" => "Palau", "PS" => "Palestinian Territory, Occupied", "PA" => "Panama", "PG" => "Papua New Guinea", "PY" => "Paraguay", "PE" => "Peru", "PH" => "Philippines", "PN" => "Pitcairn", "PL" => "Poland", "PT" => "Portugal", "PR" => "Puerto Rico", "QA" => "Qatar", "RE" => "Reunion", "RO" => "Romania", "RU" => "Russian Federation", "RW" => "Rwanda", "BL" => "Saint Barthelemy", "SH" => "Saint Helena", "KN" => "Saint Kitts And Nevis", "LC" => "Saint Lucia", "MF" => "Saint Martin", "PM" => "Saint Pierre And Miquelon", "VC" => "Saint Vincent And Grenadines", "WS" => "Samoa", "SM" => "San Marino", "ST" => "Sao Tome And Principe", "SA" => "Saudi Arabia", "SN" => "Senegal", "RS" => "Serbia", "SC" => "Seychelles", "SL" => "Sierra Leone", "SG" => "Singapore", "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands", "SO" => "Somalia", "ZA" => "South Africa", "GS" => "South Georgia And Sandwich Isl.", "ES" => "Spain", "LK" => "Sri Lanka", "SD" => "Sudan", "SR" => "Suriname", "SJ" => "Svalbard And Jan Mayen", "SZ" => "Swaziland", "SE" => "Sweden", "CH" => "Switzerland", "SY" => "Syrian Arab Republic", "TW" => "Taiwan", "TJ" => "Tajikistan", "TZ" => "Tanzania", "TH" => "Thailand", "TL" => "Timor-Leste", "TG" => "Togo", "TK" => "Tokelau", "TO" => "Tonga", "TT" => "Trinidad And Tobago", "TN" => "Tunisia", "TR" => "Turkey", "TM" => "Turkmenistan", "TC" => "Turks And Caicos Islands", "TV" => "Tuvalu", "UG" => "Uganda", "UA" => "Ukraine", "AE" => "United Arab Emirates", "US" => "United States", "UM" => "United States Outlying Islands", "UY" => "Uruguay", "UZ" => "Uzbekistan", "VU" => "Vanuatu", "VE" => "Venezuela", "VN" => "Viet Nam", "VG" => "Virgin Islands, British", "VI" => "Virgin Islands, U.S.", "WF" => "Wallis And Futuna", "EH" => "Western Sahara", "YE" => "Yemen", "ZM" => "Zambia", "ZW" => "Zimbabwe"];
}


function getCountrycodeAlpha2ToAlpha3()
{

    $country_code['AF'] = 'AFG';
    $country_code['AL'] = 'ALB';
    $country_code['DZ'] = 'DZA';
    $country_code['AS'] = 'ASM';
    $country_code['AD'] = 'AND';
    $country_code['AO'] = 'AGO';
    $country_code['AI'] = 'AIA';
    $country_code['AQ'] = 'ATA';
    $country_code['AG'] = 'ATG';
    $country_code['AR'] = 'ARG';
    $country_code['AM'] = 'ARM';
    $country_code['AW'] = 'ABW';
    $country_code['AU'] = 'AUS';
    $country_code['AT'] = 'AUT';
    $country_code['AZ'] = 'AZE';
    $country_code['BS'] = 'BHS';
    $country_code['BH'] = 'BHR';
    $country_code['BD'] = 'BGD';
    $country_code['BB'] = 'BRB';
    $country_code['BY'] = 'BLR';
    $country_code['BE'] = 'BEL';
    $country_code['BZ'] = 'BLZ';
    $country_code['BJ'] = 'BEN';
    $country_code['BM'] = 'BMU';
    $country_code['BT'] = 'BTN';
    $country_code['BO'] = 'BOL';
    $country_code['BA'] = 'BIH';
    $country_code['BW'] = 'BWA';
    $country_code['BV'] = 'BVT';
    $country_code['BR'] = 'BRA';
    $country_code['IO'] = 'IOT';
    $country_code['VG'] = 'VGB';
    $country_code['BN'] = 'BRN';
    $country_code['BG'] = 'BGR';
    $country_code['BF'] = 'BFA';
    $country_code['BI'] = 'BDI';
    $country_code['KH'] = 'KHM';
    $country_code['CM'] = 'CMR';
    $country_code['CA'] = 'CAN';
    $country_code['CV'] = 'CPV';
    $country_code['KY'] = 'CYM';
    $country_code['CF'] = 'CAF';
    $country_code['TD'] = 'TCD';
    $country_code['CL'] = 'CHL';
    $country_code['CN'] = 'CHN';
    $country_code['CX'] = 'CXR';
    $country_code['CC'] = 'CCK';
    $country_code['CO'] = 'COL';
    $country_code['KM'] = 'COM';
    $country_code['CD'] = 'COD';
    $country_code['CG'] = 'COG';
    $country_code['CK'] = 'COK';
    $country_code['CR'] = 'CRI';
    $country_code['CI'] = 'CIV';
    $country_code['CU'] = 'CUB';
    $country_code['CY'] = 'CYP';
    $country_code['CZ'] = 'CZE';
    $country_code['DK'] = 'DNK';
    $country_code['DJ'] = 'DJI';
    $country_code['DM'] = 'DMA';
    $country_code['DO'] = 'DOM';
    $country_code['EC'] = 'ECU';
    $country_code['EG'] = 'EGY';
    $country_code['SV'] = 'SLV';
    $country_code['GQ'] = 'GNQ';
    $country_code['ER'] = 'ERI';
    $country_code['EE'] = 'EST';
    $country_code['ET'] = 'ETH';
    $country_code['FO'] = 'FRO';
    $country_code['FK'] = 'FLK';
    $country_code['FJ'] = 'FJI';
    $country_code['FI'] = 'FIN';
    $country_code['FR'] = 'FRA';
    $country_code['GF'] = 'GUF';
    $country_code['PF'] = 'PYF';
    $country_code['TF'] = 'ATF';
    $country_code['GA'] = 'GAB';
    $country_code['GM'] = 'GMB';
    $country_code['GE'] = 'GEO';
    $country_code['DE'] = 'DEU';
    $country_code['GH'] = 'GHA';
    $country_code['GI'] = 'GIB';
    $country_code['GR'] = 'GRC';
    $country_code['GL'] = 'GRL';
    $country_code['GD'] = 'GRD';
    $country_code['GP'] = 'GLP';
    $country_code['GU'] = 'GUM';
    $country_code['GT'] = 'GTM';
    $country_code['GN'] = 'GIN';
    $country_code['GW'] = 'GNB';
    $country_code['GY'] = 'GUY';
    $country_code['HT'] = 'HTI';
    $country_code['HM'] = 'HMD';
    $country_code['VA'] = 'VAT';
    $country_code['HN'] = 'HND';
    $country_code['HK'] = 'HKG';
    $country_code['HR'] = 'HRV';
    $country_code['HU'] = 'HUN';
    $country_code['IS'] = 'ISL';
    $country_code['IN'] = 'IND';
    $country_code['ID'] = 'IDN';
    $country_code['IR'] = 'IRN';
    $country_code['IQ'] = 'IRQ';
    $country_code['IE'] = 'IRL';
    $country_code['IL'] = 'ISR';
    $country_code['IT'] = 'ITA';
    $country_code['JM'] = 'JAM';
    $country_code['JP'] = 'JPN';
    $country_code['JO'] = 'JOR';
    $country_code['KZ'] = 'KAZ';
    $country_code['KE'] = 'KEN';
    $country_code['KI'] = 'KIR';
    $country_code['KP'] = 'PRK';
    $country_code['KR'] = 'KOR';
    $country_code['KW'] = 'KWT';
    $country_code['KG'] = 'KGZ';
    $country_code['LA'] = 'LAO';
    $country_code['LV'] = 'LVA';
    $country_code['LB'] = 'LBN';
    $country_code['LS'] = 'LSO';
    $country_code['LR'] = 'LBR';
    $country_code['LY'] = 'LBY';
    $country_code['LI'] = 'LIE';
    $country_code['LT'] = 'LTU';
    $country_code['LU'] = 'LUX';
    $country_code['MO'] = 'MAC';
    $country_code['MK'] = 'MKD';
    $country_code['MG'] = 'MDG';
    $country_code['MW'] = 'MWI';
    $country_code['MY'] = 'MYS';
    $country_code['MV'] = 'MDV';
    $country_code['ML'] = 'MLI';
    $country_code['MT'] = 'MLT';
    $country_code['MH'] = 'MHL';
    $country_code['MQ'] = 'MTQ';
    $country_code['MR'] = 'MRT';
    $country_code['MU'] = 'MUS';
    $country_code['YT'] = 'MYT';
    $country_code['MX'] = 'MEX';
    $country_code['FM'] = 'FSM';
    $country_code['MD'] = 'MDA';
    $country_code['MC'] = 'MCO';
    $country_code['MN'] = 'MNG';
    $country_code['MS'] = 'MSR';
    $country_code['MA'] = 'MAR';
    $country_code['MZ'] = 'MOZ';
    $country_code['MM'] = 'MMR';
    $country_code['NA'] = 'NAM';
    $country_code['NR'] = 'NRU';
    $country_code['NP'] = 'NPL';
    $country_code['AN'] = 'ANT';
    $country_code['NL'] = 'NLD';
    $country_code['NC'] = 'NCL';
    $country_code['NZ'] = 'NZL';
    $country_code['NI'] = 'NIC';
    $country_code['NE'] = 'NER';
    $country_code['NG'] = 'NGA';
    $country_code['NU'] = 'NIU';
    $country_code['NF'] = 'NFK';
    $country_code['MP'] = 'MNP';
    $country_code['NO'] = 'NOR';
    $country_code['OM'] = 'OMN';
    $country_code['PK'] = 'PAK';
    $country_code['PW'] = 'PLW';
    $country_code['PS'] = 'PSE';
    $country_code['PA'] = 'PAN';
    $country_code['PG'] = 'PNG';
    $country_code['PY'] = 'PRY';
    $country_code['PE'] = 'PER';
    $country_code['PH'] = 'PHL';
    $country_code['PN'] = 'PCN';
    $country_code['PL'] = 'POL';
    $country_code['PT'] = 'PRT';
    $country_code['PR'] = 'PRI';
    $country_code['QA'] = 'QAT';
    $country_code['RE'] = 'REU';
    $country_code['RO'] = 'ROU';
    $country_code['RU'] = 'RUS';
    $country_code['RW'] = 'RWA';
    $country_code['SH'] = 'SHN';
    $country_code['KN'] = 'KNA';
    $country_code['LC'] = 'LCA';
    $country_code['PM'] = 'SPM';
    $country_code['VC'] = 'VCT';
    $country_code['WS'] = 'WSM';
    $country_code['SM'] = 'SMR';
    $country_code['ST'] = 'STP';
    $country_code['SA'] = 'SAU';
    $country_code['SN'] = 'SEN';
    $country_code['CS'] = 'SCG';
    $country_code['SC'] = 'SYC';
    $country_code['SL'] = 'SLE';
    $country_code['SG'] = 'SGP';
    $country_code['SK'] = 'SVK';
    $country_code['SI'] = 'SVN';
    $country_code['SB'] = 'SLB';
    $country_code['SO'] = 'SOM';
    $country_code['ZA'] = 'ZAF';
    $country_code['GS'] = 'SGS';
    $country_code['ES'] = 'ESP';
    $country_code['LK'] = 'LKA';
    $country_code['SD'] = 'SDN';
    $country_code['SR'] = 'SUR';
    $country_code['SJ'] = 'SJM';
    $country_code['SZ'] = 'SWZ';
    $country_code['SE'] = 'SWE';
    $country_code['CH'] = 'CHE';
    $country_code['SY'] = 'SYR';
    $country_code['TW'] = 'TWN';
    $country_code['TJ'] = 'TJK';
    $country_code['TZ'] = 'TZA';
    $country_code['TH'] = 'THA';
    $country_code['TL'] = 'TLS';
    $country_code['TG'] = 'TGO';
    $country_code['TK'] = 'TKL';
    $country_code['TO'] = 'TON';
    $country_code['TT'] = 'TTO';
    $country_code['TN'] = 'TUN';
    $country_code['TR'] = 'TUR';
    $country_code['TM'] = 'TKM';
    $country_code['TC'] = 'TCA';
    $country_code['TV'] = 'TUV';
    $country_code['VI'] = 'VIR';
    $country_code['UG'] = 'UGA';
    $country_code['UA'] = 'UKR';
    $country_code['AE'] = 'ARE';
    $country_code['GB'] = 'GBR';
    $country_code['UM'] = 'UMI';
    $country_code['US'] = 'USA';
    $country_code['UY'] = 'URY';
    $country_code['UZ'] = 'UZB';
    $country_code['VU'] = 'VUT';
    $country_code['VE'] = 'VEN';
    $country_code['VN'] = 'VNM';
    $country_code['WF'] = 'WLF';
    $country_code['EH'] = 'ESH';
    $country_code['YE'] = 'YEM';
    $country_code['ZM'] = 'ZMB';
    $country_code['ZW'] = 'ZWE';

    return $country_code;

};

function convertCountrycodeAlpha2Alpha3($alpha2_country_code)
{

    $country_codes = getCountrycodeAlpha2ToAlpha3();
    if (isset($country_codes[$alpha2_country_code])) {
        return $country_codes[$alpha2_country_code];
    } else {
        return false;
    }

}

function getCountryNameByCode($code)
{
    $countries = getCountry();

    if (isset($countries[$code])) {
        $counry = $countries[$code];
    } else {
        $counry = '';
    }

    return $counry;
}

function getCompanyDescription()
{
    return ["Wealth Manager", "Accountant", "Solicitor", "Business Advisor", "Investment Network", "Financial Advisor"];
}

/***
generates unique GI code for the modal
 ***/
function generateGICode(\Illuminate\Database\Eloquent\Model $model, $refernceKey, $args)
{
    $randomNo    = rand($args['min'], $args['max']);
    $formattedGI = $args['prefix'] . $randomNo;

    $record = $model->where([$refernceKey => $formattedGI])->first();

    if (empty($record)) {
        $result = $formattedGI;
    } else {
        $result = $this->generateGICode($model, $refernceKey, $args);
    }

    return $result;

}

function getRegulationTypes()
{
    return ['da' => 'Directly Authorised', 'ar' => 'Appointed Representative', 'uo' => 'Unregulated/Other'];
}

function getRegisteredIndRange()
{
    return ['1' => '1', '2' => '2 - 5', '3' => '6 - 10', '4' => '11 - 25', '5' => '25 - 100', '6' => '100+'];
}

function getSource()
{
    return ['internet' => 'Internet', 'personal' => 'Referral', 'recommendation' => 'Recommendation', 'email' => 'Email', 'event' => 'Event', 'LGBR Capital' => 'LGBR Capital'];
}

function certificationTypes()
{
    return ['self_certified' => 'Self Certified', 'approved' => 'Approved', 'uncertified' => 'Uncertified'];
}

function getCaptchaKey()
{
    return env('captcha_private_key');
}

function recaptcha_validate($recaptcha)
{
    $captcha    = $recaptcha;
    $privatekey = env('captcha_private_key');
    $url        = 'https://www.google.com/recaptcha/api/siteverify';
    $data       = array(
        'secret'   => $privatekey,
        'response' => $captcha,
        'remoteip' => $_SERVER['REMOTE_ADDR'],
    );

    $curlConfig = array(
        CURLOPT_URL            => $url,
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS     => $data,
    );

    $ch = curl_init();
    curl_setopt_array($ch, $curlConfig);
    $response = curl_exec($ch);
    curl_close($ch);

    $jsonResponse = json_decode($response);
    return $jsonResponse;
}

/** Generate Firm Invite Key
 ***/
function generate_firm_invite_key(\Illuminate\Database\Eloquent\Model $model, $firm_id)
{

    //  if($firm_id=="")
    //    return '';
    $firn_invite_key = uniqid() . $firm_id;
    // $firn_invite_key = time()+rand();

    $record = $model->where(['invite_key' => $firn_invite_key])->first();

    if (empty($record)) {
        $result = $firn_invite_key;
    } else {
        $result = generate_firm_invite_key($model, $firm_id);
    }

    return $result;

}
/**
$fileName = 'approved_intermediary';
$header = ['Platform GI Code Name','Email','Role','Firm','Telephone No'];
$userData = [
[FIRMCR272, 272 User, user272@mail.com, Wealth Manager, '01010100'  ]
[FIRMCR272, 272 User, user272@mail.com, Wealth Manager, '01010100'  ]
];
 */
function generateCSV($header, $data, $filename)
{
    $filePath = public_path("export-csv/" . $filename . ".csv");
    $handle   = fopen($filePath, 'w');
    fputcsv($handle, $header);

    foreach ($data as $row) {
        fputcsv($handle, $row);
    }

    header('Content-type: text/csv');
    header('Content-Length: ' . filesize($filePath));
    header('Content-Disposition: attachment; filename=' . $filename . '.csv');
    while (ob_get_level()) {
        ob_end_clean();
    }
    readfile($filePath);

    //Remove the local original file once all sizes are generated and uploaded
    unlink($filePath);
    exit();
}

function getCertificationQuesionnaire()
{
    $questionnaires = \App\CertificationQuestionaire::select('*')->orderBy('certification_default_id', 'asc')->orderBy('order', 'asc')->get()->toArray();

    return $questionnaires;
}

/** Function to geth the quiz questions/options, statements, declarations on elective professional investors
 */
function getElectiveProfInvestorQuizStatementDeclaration($pdf = false, $isElectiveProfInv = false)
{
    $hideIagree = ($isElectiveProfInv) ? 'd-none' : '';
    if ($pdf == true) {

        /* markup for certification pdf */
        $statement = '
        <table cellpadding="0" cellspacing="10" border="0"   class="w100per round_radius" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; font-size: 14px;">

            <tr style="margin-bottom: 0; padding-bottom: 0;">
                <td style="width: 100%; border:none;">





            <h6>Elective Professional Investor Statement</h6><br/>
              <div style="margin-bottom: 10px; margin-bottom: 10px;"><b>The statement below details the rights and protections afforded to Retail investors that are
                lost when the client opts up to be designated as a Professional.</b></div>

                <div style="margin-bottom: 10px; margin-bottom: 10px; font-size: 14px;"><b>Please confirm that you have read and understood the statement below:</b></div>

                <div style="margin-bottom: 10px; margin-bottom: 10px; font-size: 14px;"><b>STATEMENT</b></div>

                <div style="margin-bottom: 10px; margin-bottom: 10px; font-size: 14px;">Financial Conduct Authority (“FCA”) Classification</div>

                <div style="margin-bottom: 10px; margin-bottom: 10px; font-size: 14px;">On the basis of information we have about you, or you have given us, and with reference to the rules
                  of the FCA (see http://fshandbook.info/FS/html/FCA/COBS/3/5), we have categorised you as a Professional
                  client by reason of your expertise, experience and knowledge in relation to investing in our financial
                  products and other investment opportunities.</div>

                  <div style="margin-bottom: 10px; margin-bottom: 10px; font-size: 14px;">Please note that your categorisation as an elective Professional client applies only for the
                    purpose of enabling us or our affiliates to promote financial products and investment opportunities to
                    you, and that you will not be treated as our client for any other purpose.</div>

                    <p style="font-size: 14px;">As a consequence of this categorisation, we are informing you that you will lose the protections
                      afforded exclusively to Retail clients under the FCA rules.  In particular:</p>

                      <table style="width: 100%; margin-bottom: 0; padding-bottom: 0;" class="no-spacing" >
                         <tr>
                         <td style="Width: 3%; vertical-align: top; font-weight: bold;"><p style="font-size: 20px; margin-top: -10; padding-top:0;">.</p></td>
                         <td style="Width: 97%; vertical-align: top;"><p style="font-size: 14px;margin-top: 0; padding-top:0;">Communications and financial promotions made to you will not be subject to the detailed form and content requirements of the FCA’s rules, including those regarding costs and associated charges, that apply in the case of Retail clients.</p></td>
                         </tr>
                     </table>

                     <table style="width: 100%; margin-bottom: 0; padding-bottom: 0;" class="no-spacing" >
                         <tr>
                         <td style="Width: 3%; vertical-align: top; font-weight: bold;"><p style="font-size: 20px; margin-top: -10; padding-top:0;">.</p></td>
                         <td style="Width: 97%; vertical-align: top;"><p style="font-size: 14px;margin-top: 0; padding-top:0;">When communicating with you, we are required to ensure that such communications are fair,
                            clear and not misleading. However, we may take into consideration your status as a Professional
                            client when complying with such requirements and in assessing whether any communication to you
                            is likely to be understood by you and contains appropriate information for you to make an
                            informed assessment of its subject matter;</p></td>
                         </tr>
                     </table>

                     <table style="width: 100%; margin-bottom: 0; padding-bottom: 0;" class="no-spacing" >
                         <tr>
                         <td style="Width: 3%; vertical-align: top; font-weight: bold;"><p style="font-size: 20px; margin-top: -10; padding-top:0;">.</p></td>
                         <td style="Width: 97%; vertical-align: top;"><p style="font-size: 14px;margin-top: 0; padding-top:0;">We will not be restricted from promoting financial products and investment opportunities
                              which are not regulated in the UK and in doing so need not warn you further as regards the
                              protections you will lose;</p></td>
                         </tr>
                     </table>

                     <table style="width: 100%; margin-bottom: 0; padding-bottom: 0;" class="no-spacing" >
                         <tr>
                         <td style="Width: 3%; vertical-align: top; font-weight: bold;"><p style="font-size: 20px; margin-top: -10; padding-top:0;">.</p></td>
                         <td style="Width: 97%; vertical-align: top;"><p style="font-size: 14px;margin-top: 0; padding-top:0;">Because participants in our financial products and investment opportunities are not
                                (or will not on first participating be) Retail clients, we are able to agree with any fund
                                investment that we do not owe a duty of best execution;</p></td>
                         </tr>
                     </table>

                     <table style="width: 100%; margin-bottom: 0; padding-bottom: 0;" class="no-spacing" >
                         <tr>
                         <td style="Width: 3%; vertical-align: top; font-weight: bold;"><p style="font-size: 20px; margin-top: -10; padding-top:0;">.</p></td>
                         <td style="Width: 97%; vertical-align: top;"><p style="font-size: 14px;margin-top: 0; padding-top:0;">Because participants in our financial products and investment opportunities are not
                                  Retail clients, the detailed FCA rules on periodic statements are dis-applied.  You will
                                  however still receive statements in accordance with the other constitutional documents;</p></td>
                         </tr>
                     </table>


                     <table style="width: 100%; margin-bottom: 0; padding-bottom: 0;" class="no-spacing" >
                         <tr>
                         <td style="Width: 3%; vertical-align: top; font-weight: bold;"><p style="font-size: 20px; margin-top: -10; padding-top:0;">.</p></td>
                         <td style="Width: 97%; vertical-align: top;"><p style="font-size: 14px;margin-top: 0; padding-top:0;">In the event that we cease to provide investment advisory services, we are not required
                                    to ensure that any business which is outstanding is properly completed but we will nevertheless
                                    agree to do so; and</p></td>
                         </tr>
                     </table>

                     <table style="width: 100%; margin-bottom: 0; padding-bottom: 0;" class="no-spacing" >
                         <tr>
                         <td style="Width: 3%; vertical-align: top; font-weight: bold;"><p style="font-size: 20px; margin-top: -10; padding-top:0;">.</p></td>
                         <td style="Width: 97%; vertical-align: top;"><p style="font-size: 14px;margin-top: 0; padding-top:0;">You will have no right of access to the UK’s Financial Ombudsman Service.</p></td>
                         </tr>
                     </table>



                                  Please read and sign the declaration below to confirm you have read and understand this written
                                  notice and wish to be treated as a Professional client.

                                  <p font-size: 14px;>If you do not agree to the signing of this declaration, we are unable to categorise you as
                                    an Elective Professional client in conducting business with you in regard to the financial
                                    products and investment opportunities we wish to communicate and market to you.</p>

                                    <p font-size: 14px;>Yours sincerely,</p>

                                    <p font-size: 14px;>Daniel Rodwell,<br>Managing Director<br>'; /*Seed EIS Platform*/
        $statement .= 'GrowthInvest</p>

                                  </td>
            </tr>
        </table>';

        $declaration = ' <table cellpadding="0" cellspacing="10" border="0"   class="w100per round_radius" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; font-size: 14px;">

            <tr style="margin-bottom: 0; padding-bottom: 0;">
                <td style="width: 100%; border:none;">

                <h6>Declaration</h6>
                        <br/>
                        <p style="font-size: 14px;">Declaration: Notice of Wish to be treated as a Professional client</p>

                          <p style="font-size: 14px;">Under the EU’s Markets in Financial Instruments Directive (MiFID), I wish to be treated as an
                          elective Professional client if, subject to your assessment of my expertise, experience, and
                          knowledge of me you are reasonably assured, in light of the nature of the transactions or services
                          envisaged, that I am capable of making my own investment decisions and understand the risks
                          involved. In making your assessment I understand you may rely on information already in your
                          possession and you may request further additional information from me if necessary.</p>

                          <p style="font-size: 14px;">As a consequence of this assessment and classification as a Professional client I understand you
                          will be able to promote various financial products and investment opportunities to me. I also
                          understand you are required to obtain written acknowledgement from me that I have been provided
                          with a written notice (as detailed in the above letter) in regards of me being treated as a
                          Professional client.</p>

                          <p style="font-size: 14px;">I warrant that I have the necessary expertise, experience and knowledge of making my own
                          investment decisions and understand the risks involved in investing in the financial products and
                          investment opportunities being marketed to me.</p>

                          <p style="font-size: 14px;">I also confirm that I have read and understand the differences between the treatment of
                          Professional and Retail clients and that I fully understand the protections and compensation
                          rights that I may lose and the consequences of losing such protections.</p>

                          <p style="font-size: 14px;">I am fully aware that it is up to me to keep the firm informed of any change that could
                          affect my categorisation.</p>

                          <p style="font-size: 14px;">On the basis of the above information I can confirm that the firm may treat me as a
                          Professional client.</p></td>
            </tr>
        </table><br/>';
        /* end markup for certification pdf */

    } else {

        $statement = '<div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <a data-toggle="collapse" href="#epiStatement" role="button" class="collapsed">
                                          Elective Professional Investor Statement
                                          <i class="fa fa-lg fa-plus-square-o"></i>
                                          <i class="fa fa-lg fa-minus-square-o"></i>
                                        </a>
                                    </div>

                                    <div id="epiStatement" class="collapse " role="tabpanel" >
                                        <div class="card-body">
                                            <p><b>The statement below details the rights and protections afforded to Retail investors that are lost when the client opts up to be designated as a Professional.</b></p>
                                            <p><b>Please confirm that you have read and understood the statement below:</b></p>
                                            <p><b>STATEMENT</b></p>
                                            <p>Financial Conduct Authority (“FCA”) Classification</p>
                                            <p>On the basis of information we have about you, or you have given us, and with reference to the rules of the FCA (see http://fshandbook.info/FS/html/FCA/COBS/3/5), we have categorised you as a Professional client by reason of your expertise, experience and knowledge in relation to investing in our financial products and other investment opportunities.</p>
                                            <p>Please note that your categorisation as an elective Professional client applies only for the purpose of enabling us or our affiliates to promote financial products and investment opportunities to you, and that you will not be treated as our client for any other purpose.</p>
                                            <p>As a consequence of this categorisation, we are informing you that you will lose the protections afforded exclusively to Retail clients under the FCA rules. In particular:</p>
                                            <ul class="disc">
                                                <li>Communications and financial promotions made to you will not be subject to the detailed form and content requirements of the FCA’s rules, including those regarding costs and associated charges, that apply in the case of Retail clients.</li>
                                                <li>When communicating with you, we are required to ensure that such communications are fair, clear and not misleading. However, we may take into consideration your status as a Professional client when complying with such requirements and in assessing whether any communication to you is likely to be understood by you and contains appropriate information for you to make an informed assessment of its subject matter;</li>
                                                <li>We will not be restricted from promoting financial products and investment opportunities which are not regulated in the UK and in doing so need not warn you further as regards the protections you will lose;</li>
                                                <li>Because participants in our financial products and investment opportunities are not (or will not on first participating be) Retail clients, we are able to agree with any fund investment that we do not owe a duty of best execution;</li>
                                                <li>Because participants in our financial products and investment opportunities are not Retail clients, the detailed FCA rules on periodic statements are dis-applied. You will however still receive statements in accordance with the other constitutional documents;</li>
                                                <li>In the event that we cease to provide investment advisory services, we are not required to ensure that any business which is outstanding is properly completed but we will nevertheless agree to do so; and</li>
                                                <li>You will have no right of access to the UK’s Financial Ombudsman Service.</li>
                                            </ul>Please read and sign the declaration below to confirm you have read and understand this written notice and wish to be treated as a Professional client.
                                            <p>If you do not agree to the signing of this declaration, we are unable to categorise you as an Elective Professional client in conducting business with you in regard to the financial products and investment opportunities we wish to communicate and market to you.</p>
                                            <p>Yours sincerely,</p>
                                            <p>Daniel Rodwell,<br>
                                            Managing Director<br>
                                            GrowthInvest</p>

                                          <button class="btn btn-primary btn-sm elective-prof-inv-btn  ' . $hideIagree . '" data-agree="no">I Agree</button>

                                        </div>
                                    </div>
                                </div>';

        $declaration = '<h4 class="my-3">
                                Declaration
                            </h4>
                            <p>Declaration: Notice of Wish to be treated as a Professional client</p>
                            <p>Under the EU’s Markets in Financial Instruments Directive (MiFID), I wish to be treated as an
                                elective Professional client if, subject to your assessment of my expertise, experience, and
                                knowledge of me you are reasonably assured, in light of the nature of the transactions or services
                                envisaged, that I am capable of making my own investment decisions and understand the risks
                                involved. In making your assessment I understand you may rely on information already in your
                                possession and you may request further additional information from me if necessary.</p>
                            <p>As a consequence of this assessment and classification as a Professional client I understand you
                                will be able to promote various financial products and investment opportunities to me. I also
                                understand you are required to obtain written acknowledgement from me that I have been provided
                                with a written notice (as detailed in the above letter) in regards of me being treated as a
                                Professional client.</p>
                            <p>I warrant that I have the necessary expertise, experience and knowledge of making my own
                                investment decisions and understand the risks involved in investing in the financial products and
                                investment opportunities being marketed to me.</p>
                            <p>I also confirm that I have read and understand the differences between the treatment of
                                Professional and Retail clients and that I fully understand the protections and compensation
                                rights that I may lose and the consequences of losing such protections.</p>
                            <p>I am fully aware that it is up to me to keep the firm informed of any change that could
                                affect my categorisation.</p>
                            <p>On the basis of the above information I can confirm that the firm may treat me as a
                                Professional client.</p>';
    }

    /* <p>Name:</p>
    <p>Email Id:</p>
    <p>Date:</p>'; */

    $electiveProfInvestorQuizStatementDeclaration = array(
        'statement'   => $statement,
        'declaration' => $declaration,
    );

    return $electiveProfInvestorQuizStatementDeclaration;
}

function genActiveCertificationValidityHtml($investorCertification, $fileId)
{
    $certificationDate = $investorCertification->created_at;
    $certificationName = $investorCertification->certification()->name;
    $expiryDate        = date('Y-m-d', strtotime($certificationDate . '+1 year'));

    $d1       = new \DateTime($expiryDate);
    $d2       = new \DateTime();
    $interval = $d2->diff($d1);

    $validity = '';
    // if($interval->y == 1)
    // {
    //     $validity = 'a Year';
    // }
    // elseif($interval->m > 1)
    // {
    //     $validity = $interval->m.' months';
    // }
    // elseif($interval->m == 1)
    // {
    //     $validity = $interval->m.' months';
    // }
    // elseif($interval->d > 1)
    // {
    //     $validity = $interval->d.' days';
    // }
    // elseif($interval->d == 1)
    // {
    //     $validity = $interval->d.' day';
    // }

    if ($interval->y == 1) {
        $validity .= 'a Year ';
    }

    if ($interval->m > 1) {
        $validity .= $interval->m . ' months';
    } elseif ($interval->m == 1) {
        $validity .= $interval->m . ' month';
    }

    if ($interval->m >= 1) {
        $validity .= ' and ';
    }

    if ($interval->d > 1) {
        $validity .= $interval->d . ' days';
    } elseif ($interval->d == 1) {
        $validity .= $interval->d . ' day';
    }

    // $validity = $interval->format('%y years %m months and %d days');

    $html = '<div class="alert bg-gray certification-success">
        <div class="l-30">
        <h5 class="">' . $certificationName . ' Certification</h5>

            <i class="icon icon-ok text-success"></i> Certified on
         <span class="date-rem">' . date('d/m/Y', strtotime($certificationDate)) . '
            <a href="' . url('backoffice/investor/download-certification/' . $fileId) . '" target="_blank">(Click to download)</a>
        </span>&nbsp;
        <span class="text-danger">
            and valid for: ' . $validity . '
        </span>
        </div>
    </div>';

    return $html;

}

function getSectors()
{
    return ['Transport', 'Technology ( Social )', 'Technology ( Platform )', 'Technology ( App )', 'Bloodstock', 'Research', 'Publishing', 'Music', 'Film', 'Exports', 'Nutrition', 'Estate Agency', 'Marketing', 'Financial', 'Home Improvement', 'Dentistry', 'Advertising', 'Security', 'Environmental', 'Fashion'];
}

function getBusinessSectors()
{
    return \App\Defaults::where('type','business-sector')->get();
}

/**
 * Gets the ordinal number. used for business round display
 *
 * @param      array|integer|string  $number  The number
 *
 * @return     array|integer|string  The ordinal number.
 */
function get_ordinal_number($number)
{

    if ($number == 0 || $number == "") {
        return "";
    }

    $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
    if (($number % 100) >= 11 && ($number % 100) <= 13) {
        $abbreviation = $number . 'th';
    } else {
        $abbreviation = $number . $ends[$number % 10];
    }

    return $abbreviation;

}

function check_null($num)
{

    if (is_null($num)) {
        return 0;
    } else {
        return $num;
    }

}

function format_amount($amount, $decimal = 0, $prefix = false, $commafy = true)
{

    if (($amount === '') || (is_null($amount))) {
        return '';
    }

    $commafy_char = "";
    if ($commafy) {
        $commafy_char = ",";
    }

    $amount = number_format($amount, $decimal, '.', $commafy_char);

    if ($prefix) {

        $amount = " &pound; " . $amount;

    }

    return $amount;
}

function getObjectComments($objectType, $objectId, $parent)
{
    $commentData = [];
    $comments    = \App\Comment::where('object_type', $objectType)->where('object_id', $objectId)->where('parent', $parent)->orderBy('created_at', 'desc')->get();

    if ($comments->count()) {
        foreach ($comments as $key => $comment) {
            $comment['reply'] = getObjectComments($objectType, $objectId, $comment->id);
        }
    }

    return $comments;

}


function createOnfidoApplicant($investor)
{
    $nomineeData            = $investor->getInvestorNomineeData();
    $nomineeapplicationInfo = $nomineeData['nomineeapplication_info']; //dd($nomineeapplicationInfo);
    $additionalInfo         = $nomineeData['additional_info'];

    $objectData['first_name']                      = $investor->first_name;
    $objectData['middle_name']                     = null;
    $objectData['last_name']                       = $investor->last_name;
    $objectData['email']                           = $investor->email;
    $objectData['dob']                             = date('Y-m-d H:i:s', strtotime($nomineeapplicationInfo['dateofbirth']));
    $objectData['telephone']                       = $investor->telephone_no;
    $objectData['mobile']                          = $investor->telephone_no;
    $objectData['country']                         = $investor->country;
    $objectData['addresses'][0]['country']         = $investor->country;
    $objectData['addresses'][0]['postcode']        = $investor->postcode;
    $objectData['addresses'][0]['building_number'] = $investor->address_1;
    $objectData['addresses'][0]['street']          = ($investor->address_2 != "") ? $investor->address_2 : 'na';
    $objectData['addresses'][0]['town']            = ($investor->city != "") ? $investor->city : 'na';
    $objectData['addresses'][0]['start_date']      = null;
    $objectData['addresses'][0]['end_date']        = null;

    // $objectData['addresses'] =  (object) $objectData['addresses'];
    // $objectData =  (object) $objectData;

    $reports[] = array('name' => 'identity');
    $reports[] = array('name' => 'anti_money_laundering');
    // commented on 26april2016 $reports[] = array('name'=>'anti_money_laundering');
    /*There was a validation error on this request","The following reports have not been enabled for your account: anti_money_laundering. You can see the list of enabled reports using the /report_type_groups API endpoint. Please contact client-support@onfido.com if you have questions regarding your account setup.*/

    $result_create_applicant = onfidoApplicantionApi($objectData, $reports);

    $result = $result_create_applicant['create_applicant_result'];

    $applicant_id = '';
    $error        = (isset($result->error)) ? $result->error : '';
    $error_html   = '';

    /* Check for applicant creation error*/
    if ($error) {

        $error_html .= 'Onfido create applicant error: ' . $error->message;

        $cont_error_fields = 1;
        foreach ($error->fields as $key => $value) {
            $error_html .= "<br/>" . $cont_error_fields . ". " . $key;

            if (is_array($value)) {
                foreach ($value as $key2 => $value2) {
                    $error_html .= "<br/>"; //.$key2;

                    /*var_dump($value2);

                    var_dump(get_object_vars($value2) );*/

                    if (is_array($value2)) {
                        foreach ($value2 as $key3 => $value3) {
                            //echo "*** \n\n\n".$key3;

                            foreach ($value3 as $key4 => $value4) {
                                $error_html .= $value4;
                            }
                        }
                    } else if (is_object($value2)) {

                        $v2 = get_object_vars($value2);

                        foreach ($v2 as $key3 => $value3) {
                            //$error_html.=$key3." ";
                            $error_html .= "<ol>";
                            foreach ($value3 as $key4 => $value4) {
                                $error_html .= '<li>' . $value4 . '</li>';
                            }
                            $error_html .= "</ol>";
                        }

                    }

                }
            } else {
                $error_html .= $value;
            }

            $cont_error_fields++;

        }

    } else {

        $applicant_id = $result->id;
    }
    /* Check for applicant creation error*/

    /* Check for applicant report creation error*/
    $check_report_error = '';

    $result_check_report = $result_create_applicant['create_checkreports_result'];
    $check_report_error  = (isset($result_check_report->error)) ? $result_check_report->error : '';
    if ($check_report_error) {

        $error_html .= 'Onfido report creation error: <br/>' . $error->message;

        if (!isset($cont_error_fields)) {
            $cont_error_fields = 1;
        }

        foreach ($check_report_error->fields as $key => $value) {
            //$error_html.= "<br/>".$cont_error_fields.". ".$key ;

            if (is_array($value)) {
                foreach ($value as $key2 => $value2) {
                    //$error_html.= "<br/>".$key2;

                    /*var_dump($value2);
                    echo "<br/><br/> \n\n ";*/

                    if (is_array($value2)) {
                        //echo "<br/><br/> \n\n **********************";

                        foreach ($value2 as $key3 => $value3) {
                            /* echo "*** \n\n\n key3: ".$key3;

                            var_dump($value3);

                            echo "<br/><br/> \n\n ";*/

                            foreach ($value3 as $key4 => $value4) {

                                /*echo "key 4 ";
                                var_dump($value4);*/

                                $error_html .= $value4;
                            }
                        }
                    } else if (is_object($value2)) {
                        /*echo "<br/><br/> \n\n =====================";
                        echo "else if ";

                        echo "value2";
                        print_r($value2);*/

                        $v2 = get_object_vars($value2);
                        /*echo "v2";
                        print_r($v2);*/

                        foreach ($v2 as $key3 => $value3) {

                            /*echo "\n\n <br/> key3:";
                            var_dump($key3);
                            print_r($value3);*/

                            $error_html .= $key3 . " ";
                            $error_html .= "<ol>";
                            foreach ($value3 as $key4 => $value4) {
                                /*echo"key4".$key4;
                                print_r($value4);*/

                                $error_html .= '<li>' . $value4 . '</li>';
                            }
                            $error_html .= "</ol>";
                        }

                    } else {
                        $error_html .= $value2;
                    }

                }
            } else {
                $error_html .= $value;
            }

            $cont_error_fields++;

        }
    }

    $error = (isset($result->error)) ? $result->error : '';

    /* End Check for applicant report creation error*/

    $onfido_error     = 'no';
    $status_error_msg = '';

    if ($error_html != "") {
        $status_error_msg = "Thank you for your submission to the Investment Account.
One of our client services team will be in touch shortly to confirm any additional information that we require. ";
        $onfido_error = "yes";

        $args = array('investor_id' => $investor->id,
            'onfido_error_html'         => $error_html,
        );

        // generate_mail('Onfido submission failed', $args);
        $onfidoSubmitted = 'fail';
    } else {
        $onfidoSubmitted = 'yes';
    }

    $investorOnfifoStatus = $investor->userOnfidoSubmissionStatus();

    if (empty($investorOnfifoStatus)) {
        $investorOnfifoStatus           = new \App\UserData;
        $investorOnfifoStatus->user_id  = $investor->id;
        $investorOnfifoStatus->data_key = 'onfido_submitted';
    }

    $investorOnfifoStatus->data_value = $onfidoSubmitted;
    $investorOnfifoStatus->save();

    //var_dump($result->error);

    return array('result' => $result_create_applicant, 'applicant_id' => $applicant_id, 'error' => $status_error_msg, 'onfido_error' => $onfido_error);
}

function onfidoApplicantionApi($applicantDetails = array(), $reports = array())
{

    $token = env('ONFIDO_ACCESS_TOKEN');

    if (strlen($applicantDetails['country']) <= 2 && strlen($applicantDetails['country']) > 0) {
        $applicantDetails['country'] = convertCountrycodeAlpha2Alpha3($applicantDetails['country']);
    }

    if (strlen($applicantDetails['addresses'][0]['country']) <= 2 && strlen($applicantDetails['addresses'][0]['country']) > 0) {
        $applicantDetails['addresses'][0]['country'] = convertCountrycodeAlpha2Alpha3($applicantDetails['addresses'][0]['country']);
    }

    $applicant_details_json = json_encode($applicantDetails);

    //$auth = base64_encode( 'token='.$token );
    $ch          = curl_init();
    $curlopt_url = "https://api.onfido.com/v2/applicants/";
    curl_setopt($ch, CURLOPT_URL, $curlopt_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
        'Authorization: Token token=' . $token));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/3.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $applicant_details_json);

    $result                  = curl_exec($ch);
    $create_applicant_result = json_decode($result);

    if (!isset($create_applicant_result->error)) {

        if (count($reports) > 0) {

            //This will create identity and AML Report Checks
            $result_check_reports       = createOnfidoApplicantCheck($create_applicant_result->id, $reports);
            $create_check_report_result = json_decode($result_check_reports);
        }

    }

    $return_result = array('create_applicant_result' => $create_applicant_result, 'create_checkreports_result' => $create_check_report_result);

    return $return_result;
}

function createOnfidoApplicantCheck($applicantId, $reports = array())
{

    if ($applicantId == '') {
        return false;
    }

    $token = env('ONFIDO_ACCESS_TOKEN');

    $checkobj['type']   = 'standard';
    $checkobj['status'] = 'in_progress';
    //$checkobj->type = 'awaiting_applicant';

    /* build report types array of report objects based on reports data passed */
    if (count($reports) > 0) {

        foreach ($reports as $key_report => $value_report) {

            $new_object_name          = str_replace(' ', '_', $value_report['name']) . '_obj';
            $$new_object_name['name'] = $value_report['name'];
            //$$new_object_name->status = 'awaiting_data';
            $check_reports[] = $$new_object_name;
        }

        $checkobj['reports'] = $check_reports;

    }

    $applicant_details_json = json_encode($checkobj);

    $ch          = curl_init();
    $curlopt_url = "https://api.onfido.com/v2/applicants/" . $applicantId . "/checks";
    curl_setopt($ch, CURLOPT_URL, $curlopt_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
        'Authorization: Token token=' . $token));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/3.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $applicant_details_json); // Commented not to include reports for check

    $result = curl_exec($ch);

    return $result;

}

function add_update_onfido_reports_meta($applicant_id = '', $investor = [], $check_report_result)
{

    if ($applicant_id != '' && empty($investor)) {

        $reports = array();

        $check_id           = $check_report_result->id;
        $check_status       = $check_report_result->status;
        $check_type         = $check_report_result->type;
        $check_results_uri  = $check_report_result->results_uri;
        $check_download_uri = $check_report_result->download_uri;
        $check_form_uri     = $check_report_result->form_uri;
        $check_paused       = $check_report_result->paused;

        $reports_ar = $check_report_result->reports;

        if ($check_report_result->reports == false || is_null($check_report_result->reports)) {
            //If report/check creation failed, add/update custom onfido report,

            $onfido_report_meta = $investor->userOnfidoApplicationReports();

            if (empty($onfido_report_meta)) {

                $args['identity_report_status'] = "requested";
                $args['aml_report_status']      = "requested";
                $args['set_report_meta']        = false;
                $report_data                    = add_new_onfido_report_onplatform($investor, $args);

            } else {

                $reports = array();

                //echo "four ";

                $report_data = (!empty($onfido_report_meta)) ? $onfido_report_meta->data_value : [];
                // var_dump($report_data);

                $onfido_check   = $report_data['check'];
                $onfido_reports = $onfido_check['reports'];

                foreach ($onfido_reports as $key => $value) {
                    $reports[] = update_onfido_report_status($value, $args);

                }

                $onfido_check['reports'] = $reports;
                $report_data['check']    = $onfido_check;

            }

        } else {
            foreach ($reports_ar as $key => $value) {

                $value->status_onfido       = $value->status;
                $value->status              = 'requested';
                $value->status_growthinvest = 'requested';
                $reports[]                  = $value;
            }

            $report_data = array('applicant_id' => $applicant_id,
                'check'                             => array('id' => $check_id,
                    'check_status'                                    => $check_status,
                    'check_type'                                      => $check_type,
                    'check_result_url'                                => $check_results_uri,
                    'check_download_url'                              => $check_download_uri,
                    'check_form_url'                                  => $check_form_uri,
                    'check_paused'                                    => $check_paused,
                    'reports'                                         => $reports,
                ),
            );

        }
        //update_user_meta($userid,'on_reports',maybe_serialize($report_data) );

        $onfido_report_meta = $investor->userOnfidoApplicationReports();

        if (empty($onfido_report_meta)) {
            $onfido_report_meta           = new \App\UserData;
            $onfido_report_meta->user_id  = $investor->id;
            $onfido_report_meta->data_key = 'onfido_reports';
        }

        $onfido_report_meta->data_value = $report_data;
        $onfido_report_meta->save();

        

    }

}


function add_new_onfido_report_onplatform($investor,$args){


    $identity_report_status = $args['identity_report_status'];
    $aml_report_status      = $args['aml_report_status'];
    $reports                = array();



    $identity_report_obj = new stdClass;
    $identity_report_obj->name = 'identity';
    $identity_report_obj->id = '';
    $identity_report_obj->status_growthinvest = $identity_report_status;



    $aml_report_obj = new stdClass;
    $aml_report_obj->name = 'anti_money_laundering';
    $aml_report_obj->id = '';
    $aml_report_obj->status_growthinvest = $aml_report_status;




    $reports[] =  $identity_report_obj;
    $reports[] = $aml_report_obj;



    $report_data = array( 'applicant_id'    => '',
                          'check'           => array('id'               => '',
                                                 'check_status'         => '',
                                                 'check_type'           => '',
                                                 'check_result_url'     => '',
                                                 'check_download_url'   => '',
                                                 'check_form_url'       => '',
                                                 'check_paused'         => '',
                                                 'reports'              => $reports
                                                )
                         );
    if($args['set_report_meta']==false)
        return $report_data;
    else{
        $onfido_report_meta = $investor->userOnfidoApplicationReports();

        if (empty($onfido_report_meta)) {
            $onfido_report_meta           = new \App\UserData;
            $onfido_report_meta->user_id  = $investor->id;
            $onfido_report_meta->data_key = 'onfido_reports';
        }

        $onfido_report_meta->data_value = $report_data;
        $onfido_report_meta->save();

    }
}


function update_onfido_reports_status($investor, $args){



    $identity_report_status = $args['identity_report_status'];
    $aml_report_status      = $args['aml_report_status'];
    $reports                = array();

    $args['set_report_meta'] = false;

    $onfido_report_meta = $investor->userOnfidoApplicationReports();



    /*$args = array('identity_report_status'=> $identity_report_status,
                  'aml_report_status'     => $aml_report_status
                 ); */

    if(empty($onfido_report_meta)){

        //echo "one ";


        $investor_onfido_applicant_id = $investor->userOnfidoApplicationId();

        if(!empty($investor_onfido_applicant_id)){  // If there is associated applicant id, retrieve check and reports and update the meta
            //echo "two ";
            $investor_onfido_applicant_id = $investor_onfido_applicant_id->data_value;
            $report_data = get_onfido_reports_meta_by_applicant_id($investor_onfido_applicant_id,$args);


        }
        else{ 

            add_new_onfido_report_onplatform($investor_id,$args);

        }

    }// END if($onfido_report_meta==false){
    else{

        $reports = array();

        //echo "four ";


        $report_data = (!empty($onfido_report_meta)) ? $onfido_report_meta->data_value : [];
        // var_dump($report_data);

         $onfido_check = $report_data['check'];
         $onfido_reports = $onfido_check['reports'];

         foreach ($onfido_reports as $key => $value) {
            $reports[]  = update_onfido_report_status($value,$args);

        }

         $onfido_check['reports'] = $reports;
         $report_data['check'] = $onfido_check;

    }


    $onfido_report_meta = $investor->userOnfidoApplicationReports();

    if (empty($onfido_report_meta)) {
        $onfido_report_meta           = new \App\UserData;
        $onfido_report_meta->user_id  = $investor->id;
        $onfido_report_meta->data_key = 'onfido_reports';
    }

    $onfido_report_meta->data_value = $report_data;
    $onfido_report_meta->save();
    

}


/*Function to  get onfido reports data for given applicant id and if new statuses are given for report update the report status in report data */
 function get_onfido_reports_meta_by_applicant_id($applicant_id='',$args=array()){

    if($applicant_id=='')
        return false;

 
    if(isset($args['identity_report_status'])){
        $new_identity_report_status = $args['identity_report_status'];
    }

    if(isset($args['aml_report_status'])){
        $new_aml_report_status = $args['aml_report_status'];
    }


    $reports = array();
 
    //$applicant_id = 'de331d9e-5276-4337-999b-dbcc7b47904d';
    $applicant_list_checks = json_decode(list_applicant_checks($applicant_id));


    $list_checks = $applicant_list_checks->checks ;

    foreach ($list_checks as $key => $value) { //looping thru all checks of applicant



        $check_id               = $value->id;
        $check_status           = $value->status;
        $check_type             = $value->type;
        $check_results_uri      = $value->results_uri;
        $check_download_uri     = $value->download_uri;
        $check_form_uri         = $value->form_uri;
        $check_paused           = $value->paused;

        $reports_ar             = $value->reports;



        foreach ($reports_ar as $report_key => $report_value) { //looping thru all reports of check


                $cur_report_id = $report_value;

                $args_report_check              = array('reportid'=>$cur_report_id,'checkid'=>$check_id );
                $cur_report_data                = retrieve_report_details($args_report_check);

                $cur_report_details             = update_onfido_report_status($cur_report_data,$args); //update report status with new statuses if provided

                $reports[] = $cur_report_details;


        }
    }
    $report_data = array('applicant_id' => $applicant_id,
                          'check'           => array('id'               => $check_id,
                                                 'check_status'         => $check_status,
                                                 'check_type'           => $check_type,
                                                 'check_result_url'     => $check_results_uri,
                                                 'check_download_url'   => $check_download_uri,
                                                 'check_form_url'       => $check_form_uri,
                                                 'check_paused'         => $check_paused,
                                                 'reports'              => $reports
                                                )
                        );
 
    return $report_data;

}

function list_applicant_checks($applicant_id){

    $token = env('ONFIDO_ACCESS_TOKEN');
    

    //$auth = base64_encode( 'token='.$token );
    $ch = curl_init();
    $curlopt_url = "https://api.onfido.com/v1/applicants/".$applicant_id."/checks";
    curl_setopt($ch, CURLOPT_URL, $curlopt_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
    'Authorization: Token token='.$token));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/3.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

    $result = curl_exec($ch); 


    
    /* echo "<pre>";
    print_r($result);
    echo "</pre>"; */ 
    return $result;
    /* Example response 

     {"checks":[{"id":"eec6a785-9aa2-4d6e-9b14-e622b2198628","created_at":"2017-03-29T10:36:58Z","status":"complete","redirect_uri":null,"type":"express","result":"clear","sandbox":true,"report_type_groups":["2004"],"tags":[],"results_uri":"https://onfido.com/dashboard/information_requests/3106711","download_uri":"https://onfido.com/dashboard/pdf/information_requests/3106711","form_uri":null,"href":"/v1/applicants/d6783af5-b4d9-45b8-a5e8-fa49827340cb/checks/eec6a785-9aa2-4d6e-9b14-e622b2198628","reports":["71c794af-df1a-4ae6-ac94-84d5cbe05ede","ac71e083-fa98-49a9-8a24-a890369253d8"],"paused":false}]}

    */
}

function retrieve_report_details($args=array()){

    $token = env('ONFIDO_ACCESS_TOKEN');
    
    if(isset($args['url']) && $args['url']!=''){
        $retrieve_url = $args['url'];
    }
    else if(isset($args['reportid']) && isset($args['checkid'])){
        $retrieve_url = "https://api.onfido.com/v2/checks/".$args['checkid']."/reports/".$args['reportid'];
    }
    else{
        return false;
    }

    //$auth = base64_encode( 'token='.$token );
    $ch = curl_init();
    $curlopt_url = $retrieve_url;
    curl_setopt($ch, CURLOPT_URL, $curlopt_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
    'Authorization: Token token='.$token));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/3.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

    $result = curl_exec($ch); 
    $result_json_decoded = json_decode($result);

    /*echo "<pre>";
    print_r($result);
    echo "</pre>";*/

    return $result_json_decoded;
    /* Example response 
 
    */
}
/**
 * Store logged in user menu in session
 */

function storeUserMenus($user)
{

    $user_permissions = [];

    $user_permissions_ar = $user->getAllPermissions();
    $user_roles          = $user->getRoleNames(); // Returns a collection

    foreach ($user_permissions_ar as $key => $value) {
        $user_permissions[] = ($value->getAttribute('name'));
    }

    $admin_menus = getUserAdminMenus($user_permissions);
    //$dashboard_menus = $this->getUserDashboardMenus($user_roles,$user_permissions);

    $user_data['role'] = isset($user_roles[0]) ? $user_roles[0] : '';

    session(['user_data' => $user_data]);
    session(['user_menus' => array('admin' => $admin_menus)]);

}

function getUserAdminMenus($user_permissions)
{
    $menus = [];

    if (count(array_intersect($user_permissions, array('manage_options', 'edit_my_firm'))) > 0) {

        if (count(array_intersect($user_permissions, array('manage_options', 'view_firms'))) > 0) {

            $menus[] = ['url' => url('backoffice/user/all'), 'name' => 'Manage'];
        }

        if (in_array('manage_options', $user_permissions)) {

            $menus[] = ['url' => '#Statistics', 'name' => 'Statistics'];
            $menus[] = ['url' => '#View-document-templates', 'name' => 'View Document Templates'];
            $menus[] = ['url' => '#View-email-templates', 'name' => 'View Email Templates'];

            if (in_array('view_groups', $user_permissions)) {

                $menus[] = ['url' => '#view-groups', 'name' => 'View Groups'];
            }

            if (count(array_intersect($user_permissions, array('view_firm_leads', 'view_all_leads'))) > 0) {

                $menus[] = ['url' => '#view-leads', 'name' => 'View Leads'];
            }

        }

    }

    return $menus;
}

/* USER MENU END*/

/* CDN START */
 
function cdn($asset)
{

    //Check if we added cdn's to the config file

    if (!Config::get('app.cdn') || Config::get('app.cdn')=="") {
        return asset($asset);
    }



    //Get file name & cdn's

    $cdns = Config::get('app.cdn');

    $assetName = basename($asset);

    //remove any query string for matching

    $assetName = explode("?", $assetName);

    $assetName = $assetName[0];

    //Find the correct cdn to use

    foreach ($cdns as $cdn => $types) {

        if (preg_match('/^.*\.(' . $types . ')$/i', $assetName)) {
            return cdnPath($cdn, $asset);
        }

    }

    //If we couldnt match a cdn, use the last in the list.

    end($cdns);

    return cdnPath(key($cdns), $asset);

}

function cdnPath($cdn, $asset)
{

    return "//" . rtrim($cdn, "/") . "/" . ltrim($asset, "/");
 
}
/* CDN END */
 
/**
 * [update_onfido_report_status description]
 * @param  [type] $cur_report_details [onfido individual report object data ]
 * @param  array  $args               ['identity_report_status','aml_report_status']   -> newstatus to be added
 * @return [type]                     [updated report data object]
 */
function update_onfido_report_status($cur_report_details,$args=array()){


    if(isset($args['identity_report_status'])){
        $new_identity_report_status = $args['identity_report_status'];
    }

    if(isset($args['aml_report_status'])){
        $new_aml_report_status = $args['aml_report_status'];
    }


    switch($cur_report_details->name){
        case 'identity'              :  if(isset($new_identity_report_status)){

                                            $new_status_cur_report              = $new_identity_report_status;
                                            $cur_report_details->status_growthinvest  = $new_status_cur_report;
                                            //$cur_report_details->status       = $cur_report_details->status_onfido;
                                        }
                                        break;
        case 'anti_money_laundering' :  if(isset($new_aml_report_status)){

                                            $new_status_cur_report              = $new_aml_report_status;
                                            $cur_report_details->status_growthinvest  = $new_status_cur_report;
                                            //$cur_report_details->status       = $cur_report_details->status_onfido;
                                        }
                                        break;
    }



    return $cur_report_details;

}


 
 
