@extends('layouts.backoffice')

@section('js')
  @parent

  <script type="text/javascript" src="{{ asset('js/backoffice.js') }}"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('backoffice-content')

<div class="container">

    <div class="d-flex flex-row mt-5 bg-white border border-gray">
        <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
            <li class="nav-item">
                <a href="#home" class="nav-link " data-toggle="tab" role="tab">Home</a>
            </li>
            <li class="nav-item">
                <a href="#manage_clients" class="nav-link" data-toggle="tab" role="tab">Manage Clients</a>
            </li>
            <li class="nav-item">
                <a href="#add_clients" class="nav-link active" data-toggle="tab" role="tab">Add Clients</a>
            </li>
            <li class="nav-item">
                <a href="#investment_offers" class="nav-link" data-toggle="tab" role="tab">Investment Offers</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" id="home" role="tabpanel">
                <h1>Lorem</h1>

                <p>Aenean sed lacus id mi scelerisque tristique. Nunc sed ex sed turpis fringilla aliquet in in neque. Praesent posuere, neque rhoncus sollicitudin fermentum, erat ligula volutpat dui, nec dapibus ligula lorem ac mauris. Etiam et leo venenatis purus pharetra dictum.</p>

                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin tempor mi ut risus laoreet molestie. Duis augue risus, fringilla et nibh ac, convallis cursus purus. Suspendisse potenti. Praesent pretium eros eleifend posuere facilisis. Proin ut magna vitae nulla suscipit eleifend. Ut bibendum pulvinar sapien, vel tristique felis scelerisque et. Sed elementum sapien magna, placerat interdum lacus placerat ut. Integer varius, ligula bibendum laoreet sollicitudin, eros metus fringilla lectus, quis consequat nisl nibh ut nisi. Aenean dignissim, nibh ac fermentum condimentum, ante nisl rutrum sapien, at commodo eros sapien vulputate arcu. Fusce neque leo, blandit nec lectus eu, vestibulum commodo tellus. Aliquam sem libero, tristique at condimentum ac, luctus nec nulla.</p>
            </div>
            <div class="tab-pane fade" id="manage_clients" role="tabpanel">
                <h1>Ipsum</h1>

                <p>Aenean pharetra risus quis placerat euismod. Praesent mattis lorem eget massa euismod sollicitudin. Donec porta nulla ut blandit vehicula. Mauris sagittis lorem nec mauris placerat, et molestie elit vehicula. Donec libero ex, condimentum et mi dapibus, euismod ornare ligula.</p>

                <p>In faucibus tempus ante, et tempor magna luctus id. Ut a maximus ipsum. Duis eu velit nec libero pretium pellentesque. Maecenas auctor hendrerit pulvinar. Donec sed tortor interdum, sodales elit vel, tempor turpis. In tristique vestibulum eros vel congue. Vivamus maximus posuere fringilla. Nullam in est commodo, tristique ligula eu, tincidunt enim. Duis iaculis sodales lectus vitae cursus.</p>
            </div>
            <div class="tab-pane fade show active" id="add_clients" role="tabpanel">

                <div class="p-2">
                    <div class="row mb-4">
                        <div class="col-md-5">
                            <h1 class="section-title font-weight-medium text-primary mt-4 mb-0">Add Investor</h1>
                            <p class="text-muted">Register a new client on the platform</p>
                        </div>
                        <div class="col-md-7">
                            <div class="bg-gray p-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ url('img/image-transfer-asset.jpg')}}" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="font-weight-normal text-dark">Download our Client Registration Guide</h5>
                                        <p class="mb-1">A straightforward guide to getting your clients up and running on the platform.</p>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert bg-primary text-white alert-dismissible fade show" role="alert">
                        Your client registration details added successfully and being redirected to certification stage
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                     @include('includes.notification')
                    <div class="row">
                        <div class="col-9">
                            <div class="border border-primary border-2 bg-gray p-3 mb-4">
                                <div class="text-center">
                                    <h5 class="m-0">
                                        <small class=" font-weight-medium">
                                            Platform Account Registration
                                        </small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="border border-transparent border-2 bg-gray p-3 mb-4">
                                <div class="text-center">
                                    <h5 class="m-0">
                                        <small class=" font-weight-medium">
                                            Investment Account
                                        </small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="progress-indicator">
                        <li class="completed">
                            <a href="{{ url('backoffice/investor/'.$investor->gi_code.'/registration')}}">Registration</a>
                            <span class="bubble"></span>
                        </li>
                        <li class="completed">
                            <a href="{{ url('backoffice/investor/'.$investor->gi_code.'/client-categorisation')}}">Client Categorisation</a>
                            <span class="bubble"></span>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0)">Additional Information</a>
                            <span class="bubble"></span>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Investment Account</a>
                            <span class="bubble"></span>
                        </li>
                    </ul>
                </div>

                <div class="profile-content p-4">

                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="{{ url('backoffice/investor/'.$investor->gi_code.'/client-categorisation')}}" class="btn btn-outline-primary mb-4"><i class="fa fa-angle-double-left"></i> Prev</a>
                        </div>
                        <div class="">
                            <a href="#" class="btn btn-primary mb-4">Next <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>

                    <h5 class="mt-3 mb-2">
                       
                        3: <i class="fa fa-info-circle text-primary"> </i> <span class="text-primary">  @if($investor->hasPermissionTo('is_wealth_manager')) Client Additional Information @else Additional Information @endif</span>
                        

                       
                         <button class="btn btn-primary pull-right">Edit Details</button>
                    </h5>
                    <hr class="my-3">
                    <!-- Additional Information Content HERE -->
                    <p>
                        Please tell us a bit more about yourself and your investment preferences by completing our investor profile questionnaire. This helps with our suitability assessment, and includes basic financial information, your experience in the Alternative Investment sector. It also allows us to better tailor our communications to you.
                    </p>
                    <hr class="my-3">
                     <form method="post" action="{{ url('backoffice/investor/'.$investor->gi_code.'/save-additional-information') }}" data-parsley-validate name="add-investor-ai" id="add-investor-ai" enctype="multipart/form-data">
                        <div class="row mb-5 mt-5">
                            <div class="col-sm-3 text-center">
                                <label>Profile Picture</label>
                                <div class="image">
                                    <img class="mx-auto d-block img-responsive" src="{{ url('img/dummy/avatar.png')}}">
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Skype ID</label>
                                        <input type="text" name="skypeid" class="form-control" placeholder="Eg: johnSmith_avon" value="{{ (!empty($additionalInfo) && isset($additionalInfo['skypeid'])) ? $additionalInfo['skypeid']:'' }}"  >
                                    </div>
                                    <div class="col-sm-6">
                                        <label>LinkedIN</label>
                                        <input type="text" name="linkedin" class="form-control" placeholder="Eg: www.linkedin.com/john-smith"  value="{{ (!empty($additionalInfo) && isset($additionalInfo['linkedin'])) ? $additionalInfo['linkedin']:'' }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" class="form-control" placeholder="Eg: www.Facebook.com/john-smith" value="{{ (!empty($additionalInfo) && isset($additionalInfo['facebook'])) ? $additionalInfo['facebook']:'' }}" >
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Twitter</label>
                                        <input type="text" name="twitter" class="form-control" placeholder="Eg: www.Twitter.com/john-smith" value="{{ (!empty($additionalInfo) && isset($additionalInfo['twitter'])) ? $additionalInfo['twitter']:'' }}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="my-3 text-primary">
                            Investor Profile Questionnaire
                        </h4>
                        <hr class="my-3">
                        <div class="mb-3">
                            Section 1 - Financial Adviser
                        </div>
                        <div class="form-group">
                            <label>Does your client have a financial advisor or a wealth manager (authorised person)?</label>
                            <div>
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="yesrodio1" name="havefinancialadvisor" value="yes" class="custom-control-input"  {{ (!empty($investorFai) && isset($investorFai['havefinancialadvisor']) && $investorFai['havefinancialadvisor'] =='yes') ? 'checked':'' }}>
                                  <label class="custom-control-label normal" for="yesrodio1" >Yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="norodio1" name="havefinancialadvisor" value="no" class="custom-control-input" {{ (!empty($investorFai) && isset($investorFai['havefinancialadvisor']) && $investorFai['havefinancialadvisor'] =='no') ? 'checked':'' }}>
                                  <label class="custom-control-label normal" for="norodio1" >No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Does your client require advice on seed EIS/SEIS?</label>
                            <div>
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="yesrodio2" name="requireadviceseedeisoreis" value="yes" class="custom-control-input" {{ (!empty($investorFai) && isset($investorFai['requireadviceseedeisoreis']) && $investorFai['requireadviceseedeisoreis'] =='yes') ? 'checked':'' }} >
                                  <label class="custom-control-label normal" for="yesrodio2" >Yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="norodio2" name="requireadviceseedeisoreis" value="no" class="custom-control-input" {{ (!empty($investorFai) && isset($investorFai['requireadviceseedeisoreis']) && $investorFai['requireadviceseedeisoreis'] =='no') ? 'checked':'' }} >
                                  <label class="custom-control-label normal" for="norodio2" >No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Is your client receiving advice from an Authorised Person in relation to unlisted shares and unlisted debt securities?</label>
                            <div>
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="yesrodio3" name="advicefromauthorised" value="yes" class="custom-control-input" {{ (!empty($investorFai) && isset($investorFai['advicefromauthorised']) && $investorFai['advicefromauthorised'] =='yes') ? 'checked':'' }} >
                                  <label class="custom-control-label normal" for="yesrodio3" >Yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="norodio3" name="advicefromauthorised" value="no" class="custom-control-input"   {{ (!empty($investorFai) && isset($investorFai['advicefromauthorised']) && $investorFai['advicefromauthorised'] =='no') ? 'checked':'' }}>
                                  <label class="custom-control-label normal" for="norodio3">No</label>
                                </div>
                            </div>
                        </div>
                        <div id="" role="tablist" class="gi-collapse mb-3">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <a data-toggle="collapse" href="#collapse1" role="button">
                                      Advised Investor Questionnaire
                                      <i class="fa fa-lg fa-plus-square-o"></i>
                                      <i class="fa fa-lg fa-minus-square-o"></i>
                                    </a>
                                </div>

                                <div id="collapse1" class="collapse show" role="tabpanel" >
                                    <div class="card-body">
                                        <p><em>To be completed by your adviser/investment institution/intermediary</em></p>

                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Firm Name</label>

                                                        <input type="text" class="form-control" name="companyname" value="{{ (!empty($investorFai) && isset($investorFai['companyname'])) ? $investorFai['companyname']:'' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>FCA Firm Reference Number</label>
                                                        <input type="text" class="form-control" name="fcanumber" value="{{ (!empty($investorFai) && isset($investorFai['fcanumber'])) ? $investorFai['fcanumber']:'' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Primary Contact Name</label>
                                                        <input type="text" class="form-control" name="principlecontact" value="{{ (!empty($investorFai) && isset($investorFai['principlecontact'])) ? $investorFai['principlecontact']:'' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Primary Contact's FCA Number</label>
                                                        <input type="text" class="form-control" name="primarycontactfca" value="{{ (!empty($investorFai) && isset($investorFai['primarycontactfca'])) ? $investorFai['primarycontactfca']:'' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Primary Contact Email Address</label>
                                                        <input type="email" class="form-control" name="email"  data-parsley-type="email" value="{{ (!empty($investorFai) && isset($investorFai['email'])) ? $investorFai['email']:'' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Primary Contact Phone Number</label>
                                                        <input type="text" class="form-control" name="telephone" data-parsley-type="number" data-parsley-minlength="10" data-parsley-minlength-message="The telephone number must be atleast 10 characters long!" value="{{ (!empty($investorFai) && isset($investorFai['telephone'])) ? $investorFai['telephone']:'' }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <fieldset>
                                                        <legend>Firm Address</legend>
                                                        <div class="form-group">
                                                            <label>Address 1</label>
                                                            <textarea class="form-control" name="address">{{ (!empty($investorFai) && isset($investorFai['address'])) ? $investorFai['address']:'' }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Address 2</label>
                                                            <textarea class="form-control" name="address2">{{ (!empty($investorFai) && isset($investorFai['address2'])) ? $investorFai['address2']:'' }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Town</label>
                                                            <input type="text" class="form-control" name="city" value="{{ (!empty($investorFai) && isset($investorFai['city'])) ? $investorFai['city']:'' }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>County</label>
                                                            <select class="form-control" name="county">
                                                                <option value="">Please Select</option>
                                                   
                                                                @foreach($countyList as $county) 
                                                                    <option value="{{ $county }}" @if(!empty($investorFai) && isset($investorFai['county']) && $investorFai['county'] == $county) selected @endif >{{ $county }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Postcode</label>
                                                                    <input type="text" class="form-control" name="postcode" value="{{ (!empty($investorFai) && isset($investorFai['postcode'])) ? $investorFai['postcode']:'' }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Country</label>
                                                                <select class="form-control" name="country">
                                                                    <option value="">Please Select</option>
                                                                     
                                                                    @foreach($countryList as $code=>$country)
                                                                        <option value="{{ $code }}" @if(!empty($investorFai) && isset($investorFai['country']) && $investorFai['country'] == $code) selected @endif>{{ $country }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            Section 2 - Investor Details
                        </div>
                        <hr class="my-3">
                        <div id="" role="tablist" class="gi-collapse mb-3">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <a data-toggle="collapse" href="#suitabilityq" role="button">
                                      Suitability Questionnaire
                                      <i class="fa fa-lg fa-plus-square-o"></i>
                                      <i class="fa fa-lg fa-minus-square-o"></i>
                                    </a>
                                </div>
                                <div id="suitabilityq" class="collapse show " role="tabpanel" >
                                    <div class="card-body">
                                        <div class="row ml-2 mr-2 mb-2">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Self employed or Employed?</label>
                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="employed" name="employmenttype" class="custom-control-input" value="Employed" {{ (!empty($additionalInfo) && isset($additionalInfo['employmenttype']) && $additionalInfo['employmenttype'] =='Employed') ? 'checked':'' }}>
                                                          <label class="custom-control-label normal" for="employed">Employed</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="selfemployed" name="employmenttype" class="custom-control-input"  value="Self Employed" {{ (!empty($additionalInfo) && isset($additionalInfo['employmenttype']) && $additionalInfo['employmenttype'] =='Self Employed') ? 'checked':'' }}>
                                                          <label class="custom-control-label normal" for="selfemployed">Self Employed</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ml-2 mr-2 mb-3">
                                            <div class="col-sm-4">
                                                <label>Total Annual Income: (including Dividends and Pension)</label>
                                                <select class="form-control" name="totalannualincome" >
                                                     <option value="">Select</option>
                                                      <option value="£ 25,000- £ 50,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalannualincome']) && $additionalInfo['totalannualincome'] =='£ 25,000- £ 50,000') ? 'selected':'' }}>£ 25,000 - £ 50,000</option>
                                                      <option value="£ 51,000- £ 100,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalannualincome']) && $additionalInfo['totalannualincome'] =='£ 51,000- £ 100,000') ? 'selected':'' }}>£ 51,000 - £ 100,000</option>
                                                      <option value="£ 101,000- £ 200,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalannualincome']) && $additionalInfo['totalannualincome'] =='£ 101,000- £ 200,000') ? 'selected':'' }}>£ 101,000 - £ 200,000</option>
                                                      50
                                                      <option value="£ 200,000+" {{ (!empty($additionalInfo) && isset($additionalInfo['totalannualincome']) && $additionalInfo['totalannualincome'] =='£ 200,000+') ? 'selected':'' }}>£ 200,000+</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="mb-4">Possible annual investment</label>
                                                <select class="form-control" name="possibleannualinvestment" >
                                                    <option value="">Select</option>
                                                      <option value="£ 1 - £ 10,000" {{ (!empty($additionalInfo) && isset($additionalInfo['possibleannualinvestment']) && $additionalInfo['possibleannualinvestment'] =='£ 1 - £ 10,000') ? 'selected':'' }}>£ 1 - £ 10,000</option>
                                                      <option value="£ 10,000 - £ 25,000" {{ (!empty($additionalInfo) && isset($additionalInfo['possibleannualinvestment']) && $additionalInfo['possibleannualinvestment'] =='£ 10,000 - £ 25,000') ? 'selected':'' }}>£ 10,000 - £ 25,000</option>
                                                      <option value="£ 25,000 - £ 75,000" {{ (!empty($additionalInfo) && isset($additionalInfo['possibleannualinvestment']) && $additionalInfo['possibleannualinvestment'] =='£ 25,000 - £ 75,000') ? 'selected':'' }}>£ 25,000 - £ 75,000</option>
                                                      <option value="£ 75,000 - £ 100,000" {{ (!empty($additionalInfo) && isset($additionalInfo['possibleannualinvestment']) && $additionalInfo['possibleannualinvestment'] =='£ 75,000 - £ 100,000') ? 'selected':'' }}>£ 75,000 - £ 100,000</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="mb-4">Maximum investment in any one project</label>
                                                <select class="form-control" name="maximuminvestmentinanyoneproject" >
                                                    <option value="">Select</option>
                                                    <option value="£ 1 - £ 10,000" {{ (!empty($additionalInfo) && isset($additionalInfo['maximuminvestmentinanyoneproject']) && $additionalInfo['maximuminvestmentinanyoneproject'] =='£ 1 - £ 10,000') ? 'selected':'' }}>£ 1 - £ 10,000</option>
                                                    <option value="£ 10,000 - £ 25,000" {{ (!empty($additionalInfo) && isset($additionalInfo['maximuminvestmentinanyoneproject']) && $additionalInfo['maximuminvestmentinanyoneproject'] =='£ 10,000 - £ 25,000') ? 'selected':'' }}>£ 10,000 - £ 25,000</option>
                                                    <option value="£ 25,000 - £ 75,000" {{ (!empty($additionalInfo) && isset($additionalInfo['maximuminvestmentinanyoneproject']) && $additionalInfo['maximuminvestmentinanyoneproject'] =='£ 25,000 - £ 75,000') ? 'selected':'' }}>£ 25,000 - £ 75,000</option>
                                                    <option value="£ 75,000 - £ 100,000" {{ (!empty($additionalInfo) && isset($additionalInfo['maximuminvestmentinanyoneproject']) && $additionalInfo['maximuminvestmentinanyoneproject'] =='£ 75,000 - £ 100,000') ? 'selected':'' }}>£ 75,000 - £ 100,000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row ml-2 mr-2 mb-2">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    @if($investor->hasPermissionTo('is_wealth_manager'))
                                                    <label>Is your client looking to invest and actively engage with the company as an Angel?</label>
                                                    @else
                                                    <label class="">Are you looking to invest and actively engage with the company as an Angel?</label>
                                                    @endif

                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="angel" name="investortype" class="custom-control-input" value="Angel" {{ (!empty($additionalInfo) && isset($additionalInfo['investortype']) && $additionalInfo['investortype'] =='Angel') ? 'checked':'' }}>
                                                          <label class="custom-control-label normal" for="angel">Angel</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="justinvestor" name="investortype" class="custom-control-input" {{ (!empty($additionalInfo) && isset($additionalInfo['investortype']) && $additionalInfo['investortype'] =='Just Investor') ? 'checked':'' }}  value="Just Investor">
                                                          <label class="custom-control-label normal" for="justinvestor"> Just Investor</label>
                                                        </div>
                                                    </div>
                                                    <i class="text-muted"><small>In this instance an Angel is considered to be an individual who alongside the provision of capital, wishes to take some form of active involvement in the business</small></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ml-2 mr-2 mb-3">
                                            <div class="col-sm-6">
                                                @if($investor->hasPermissionTo('is_wealth_manager'))
                                                <label>Does your client have a specific interest in a particular business sector?</label>
                                                @else
                                                <label class="">Do you have a specific interest in a particular business sector? </label>
                                                @endif
                                                <select class="form-control" name="specificinterestinbussinesssector"  >
                                                    <option value="">Select</option>
                                                    @foreach($sectors as $sector)
                                                    <option value="{{  $sector }}" {{ (!empty($additionalInfo) && isset($additionalInfo['specificinterestinbussinesssector']) && $additionalInfo['specificinterestinbussinesssector'] ==$sector) ? 'selected':'' }}>{{  $sector }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                @if($investor->hasPermissionTo('is_wealth_manager'))
                                                <label class="mb-4">Has your client invested in an unlisted company before?</label>
                                                @else
                                                <label class="">Have you invested in an unlisted company before? </label>
                                                @endif

                                                <select class="form-control"  name="investedinanunlistedcompany">
                                                    <option value="">Select</option>
                                                    <option value="Yes" {{ (!empty($additionalInfo) && isset($additionalInfo['investedinanunlistedcompany']) && $additionalInfo['investedinanunlistedcompany'] =='Yes') ? 'selected':'' }}>Yes</option>
                                                    <option value="No" {{ (!empty($additionalInfo) && isset($additionalInfo['investedinanunlistedcompany']) && $additionalInfo['investedinanunlistedcompany'] =='No') ? 'selected':'' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row ml-2 mr-2 mb-2">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Is your client comfortable with the liquidity issues?</label>
                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="yescomfortable" value="yes" name="comfortablewithliquidityissues" class="custom-control-input"  {{ (!empty($additionalInfo) && isset($additionalInfo['comfortablewithliquidityissues']) && $additionalInfo['comfortablewithliquidityissues'] =='yes') ? 'checked':'' }}>
                                                          <label class="custom-control-label normal" for="yescomfortable">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="notcomfortable" value="no" name="comfortablewithliquidityissues" class="custom-control-input" {{ (!empty($additionalInfo) && isset($additionalInfo['comfortablewithliquidityissues']) && $additionalInfo['comfortablewithliquidityissues'] =='no') ? 'checked':'' }} >
                                                          <label class="custom-control-label normal" for="notcomfortable">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ml-2 mr-2 mb-3">
                                            <div class="col-sm-12">
                                                @if($investor->hasPermissionTo('is_wealth_manager'))
                                                <label>What is your client looking for?</label>
                                                @else
                                                <label class="">What skills do you bring?</label>
                                                @endif

                                                <select class="form-control" name="investorlookingfor" >
                                                    <option value="">Select</option>
                                                    <option value="Combination of both" {{ (!empty($additionalInfo) && isset($additionalInfo['investorlookingfor']) && $additionalInfo['investorlookingfor'] =='Combination of both') ? 'selected':'' }}>Combination of both</option>
                                                    <option value="Long term growth" {{ (!empty($additionalInfo) && isset($additionalInfo['investorlookingfor']) && $additionalInfo['investorlookingfor'] =='Long term growth') ? 'selected':'' }}>Long term growth</option>
                                                    <option value="Tax efficient investment" {{ (!empty($additionalInfo) && isset($additionalInfo['investorlookingfor']) && $additionalInfo['investorlookingfor'] =='Tax efficient investment') ? 'selected':'' }}>Tax efficient investment</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mr-2 ml-2 mb-3">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    @if($investor->hasPermissionTo('is_wealth_manager'))
                                                    <label>Does your client require assistance to analyse business proposals?</label>
                                                     @else
                                                    <label>Do you require assistance to analyse business proposals? </label>
                                                    @endif
                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="yesrequire" name="requireassistance" class="custom-control-input" {{ (!empty($additionalInfo) && isset($additionalInfo['requireassistance']) && $additionalInfo['requireassistance'] =='yes') ? 'checked':'' }}  value="yes">
                                                          <label class="custom-control-label normal" for="yesrequire">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="notrequire" name="requireassistance" class="custom-control-input" {{ (!empty($additionalInfo) && isset($additionalInfo['requireassistance']) && $additionalInfo['requireassistance'] =='no') ? 'checked':'' }} value="no">
                                                          <label class="custom-control-label normal" for="notrequire">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    @if($investor->hasPermissionTo('is_wealth_manager'))
                                                    <label>Will your client be looking to invest alone or part of a group?</label>
                                                    @else
                                                    <label>Will you be looking to invest alone or part of a group? </label>
                                                    @endif
                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="alone" name="investas" class="custom-control-input" value="Alone" {{ (!empty($additionalInfo) && isset($additionalInfo['investas']) && $additionalInfo['investas'] =='Alone') ? 'checked':'' }} >
                                                          <label class="custom-control-label normal" for="alone">Alone</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="partofgroup" name="investas" class="custom-control-input" value="Part of a group" {{ (!empty($additionalInfo) && isset($additionalInfo['partofgroup']) && $additionalInfo['partofgroup'] =='Part of a group') ? 'checked':'' }}>
                                                          <label class="custom-control-label normal" for="partofgroup">Part of group</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mr-2 ml-2 mb-2">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    @if($investor->hasPermissionTo('is_wealth_manager'))
                                                    <label>Does your client have any companies looking for funding?</label>
                                                    @sle
                                                    <label style="">Do you have any companies looking for funding?</label>
                                                    @endif
                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="fundingyes" name="haveanycompanieslookingforfunding" value="yes" class="custom-control-input" {{ (!empty($additionalInfo) && isset($additionalInfo['haveanycompanieslookingforfunding']) && $additionalInfo['haveanycompanieslookingforfunding'] =='yes') ? 'checked':'' }} >
                                                          <label class="custom-control-label normal" for="fundingyes">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="fundingno" name="haveanycompanieslookingforfunding" value="no" class="custom-control-input" {{ (!empty($additionalInfo) && isset($additionalInfo['haveanycompanieslookingforfunding']) && $additionalInfo['haveanycompanieslookingforfunding'] =='no') ? 'checked':'' }} >
                                                          <label class="custom-control-label normal" for="fundingno">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    @if($investor->hasPermissionTo('is_wealth_manager'))
                                                    <label>Has your client used SEIS?</label>
                                                    @else
                                                    <label>Have you used SEIS?</label>
                                                    @endif
                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="yesused" value="yes" name="usedeisorventurecapitaltrusts" class="custom-control-input"  {{ (!empty($additionalInfo) && isset($additionalInfo['usedeisorventurecapitaltrusts']) && $additionalInfo['usedeisorventurecapitaltrusts'] =='yes') ? 'checked':'' }}>
                                                          <label class="custom-control-label normal" for="yesused">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="notused" value="no" name="usedeisorventurecapitaltrusts" class="custom-control-input"  {{ (!empty($additionalInfo) && isset($additionalInfo['usedeisorventurecapitaltrusts']) && $additionalInfo['usedeisorventurecapitaltrusts'] =='no') ? 'checked':'' }}>
                                                          <label class="custom-control-label normal" for="notused">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mr-2 ml-2 mb-3">
                                            <div class="col-sm-6">
                                                <label>Number of companies invested in the last 2 years for SEIS</label>
                                                <select class="form-control" name="numcompaniesinvested2yr_seis" >
                                                   <option value="">Select</option>
                                                    <option value="0" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_seis']) && $additionalInfo['numcompaniesinvested2yr_seis'] =='0') ? 'selected':'' }}>0</option>
                                                    <option value="1" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_seis']) && $additionalInfo['numcompaniesinvested2yr_seis'] =='1') ? 'selected':'' }} >1</option>
                                                    <option value="2-4" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_seis']) && $additionalInfo['numcompaniesinvested2yr_seis'] =='2-4') ? 'selected':'' }}>2 - 4</option>
                                                    <option value="5+"  {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_seis']) && $additionalInfo['numcompaniesinvested2yr_seis'] =='5+') ? 'selected':'' }}>5+</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Total annual amount invested in SEIS</label>
                                                <select class="form-control" name="totalinvestedinseis"  >
                                                   <option value="">Select</option>
                                                        <option value="£ 1 - £ 10,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedinseis']) && $additionalInfo['totalinvestedinseis'] =='£ 1 - £ 10,000') ? 'selected':'' }}>£ 1 - £ 10,000</option>
                                                        <option value="£ 10,000 - £ 25,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedinseis']) && $additionalInfo['totalinvestedinseis'] =='£ 10,000 - £ 25,000') ? 'selected':'' }}>£ 10,000 - £ 25,000 </option>
                                                        <option value="£ 25,000 - £ 50,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedinseis']) && $additionalInfo['totalinvestedinseis'] =='£ 25,000 - £ 50,000') ? 'selected':'' }}>£ 25,000 - £ 50,000</option>
                                                        <option value="£ 50,000 - £ 100,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedinseis']) && $additionalInfo['totalinvestedinseis'] =='£ 50,000 - £ 100,000') ? 'selected':'' }}>£ 50,000 - £ 100,000</option>
                                                        <option value="£ 100,000+" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedinseis']) && $additionalInfo['totalinvestedinseis'] =='£ 100,000+') ? 'selected':'' }}>£ 100,000+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mr-2 ml-2 mb-2">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Has your client used EIS?</label>
                                                     <label>Have you used EIS?</label>
                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="yesused2" name="usedeis" value="yes" class="custom-control-input"  {{ (!empty($additionalInfo) && isset($additionalInfo['usedeis']) && $additionalInfo['usedeis'] =='yes') ? 'checked':'' }}>
                                                          <label class="custom-control-label normal" for="yesused2">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="notused2" name="usedeis" value="no" class="custom-control-input" {{ (!empty($additionalInfo) && isset($additionalInfo['usedeis']) && $additionalInfo['usedeis'] =='no') ? 'checked':'' }} >
                                                          <label class="custom-control-label normal" for="notused2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mr-2 ml-2 mb-3">
                                            <div class="col-sm-6">
                                                <label>Number of companies invested in the last 2 years for EIS</label>
                                                <select class="form-control"  name="numcompaniesinvested2yr_eis">
                                                    <option value="">Select</option>
                                                      <option value="0" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_eis']) && $additionalInfo['numcompaniesinvested2yr_eis'] =='0') ? 'selected':'' }}>0</option>
                                                      <option value="1" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_eis']) && $additionalInfo['numcompaniesinvested2yr_eis'] =='1') ? 'selected':'' }}>1</option>
                                                      <option value="2-4" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_eis']) && $additionalInfo['numcompaniesinvested2yr_eis'] =='2-4') ? 'selected':'' }}>2 - 4 </option>
                                                      <option value="5+" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_eis']) && $additionalInfo['numcompaniesinvested2yr_eis'] =='5+') ? 'selected':'' }}>5+</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Total annual amount invested in EIS</label>
                                                <select class="form-control" name="totalinvestedeis" >
                                                    <option value="">Select</option>
                                                    <option value="£ 1 - £ 10,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedeis']) && $additionalInfo['totalinvestedeis'] =='£ 1 - £ 10,000') ? 'selected':'' }}>£ 1 - £ 10,000</option>
                                                    <option value="£ 10,000 - £ 25,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedeis']) && $additionalInfo['totalinvestedeis'] =='£ 10,000 - £ 25,000') ? 'selected':'' }}>£ 10,000 - £ 25,000 </option>
                                                    <option value="£ 25,000 - £ 50,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedeis']) && $additionalInfo['totalinvestedeis'] =='£ 25,000 - £ 50,000') ? 'selected':'' }}>£ 25,000 - £ 50,000</option>
                                                    <option value="£ 50,000 - £ 100,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedeis']) && $additionalInfo['totalinvestedeis'] =='£ 50,000 - £ 100,000') ? 'selected':'' }}>£ 50,000 - £ 100,000</option>
                                                    <option value="£ 100,000+" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedeis']) && $additionalInfo['totalinvestedeis'] =='£ 100,000+') ? 'selected':'' }}>£ 100,000+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mr-2 ml-2 mb-3">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Has your client used VCT?</label>
                                                     <label>Have you used VCT?</label>
                                                    <div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="yesused3" name="usedvct" value="yes" class="custom-control-input"  {{ (!empty($additionalInfo) && isset($additionalInfo['usedvct']) && $additionalInfo['usedvct'] =='yes') ? 'checked':'' }}>
                                                          <label class="custom-control-label normal" for="yesused3">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="notused3" name="usedvct" value="no" class="custom-control-input" {{ (!empty($additionalInfo) && isset($additionalInfo['usedvct']) && $additionalInfo['usedvct'] =='no') ? 'checked':'' }} >
                                                          <label class="custom-control-label normal" for="notused3">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mr-2 ml-2 mb-3">
                                            <div class="col-sm-6">
                                                <label>Number of companies invested in the last 2 years for EIS</label>
                                                <select class="form-control" name="numcompaniesinvested2yr_vct" >
                                                    <option value="">Select</option>
                                                    <option value="0" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_vct']) && $additionalInfo['numcompaniesinvested2yr_vct'] =='0') ? 'selected':'' }}>0</option>
                                                    <option value="1" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_vct']) && $additionalInfo['numcompaniesinvested2yr_vct'] =='1') ? 'selected':'' }}>1</option>
                                                    <option value="2-4" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_vct']) && $additionalInfo['numcompaniesinvested2yr_vct'] =='2-4') ? 'selected':'' }}>2 - 4 </option>
                                                    <option value="5+" {{ (!empty($additionalInfo) && isset($additionalInfo['numcompaniesinvested2yr_vct']) && $additionalInfo['numcompaniesinvested2yr_vct'] =='5+') ? 'selected':'' }}>5+</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Total annual amount invested in VCT</label>
                                                <select class="form-control" name="totalinvestedvct" >
                                                    <option value="">Select</option>
                                                    <option value="£ 1 - £ 10,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedvct']) && $additionalInfo['totalinvestedvct'] =='£ 1 - £ 10,000') ? 'selected':'' }} >£ 1 - £ 10,000</option>
                                                    <option value="£ 10,000 - £ 25,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedvct']) && $additionalInfo['totalinvestedvct'] =='£ 10,000 - £ 25,000') ? 'selected':'' }} >£ 10,000 - £ 25,000 </option>
                                                    <option value="£ 25,000 - £ 50,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedvct']) && $additionalInfo['totalinvestedvct'] =='£ 25,000 - £ 50,000') ? 'selected':'' }} >£ 25,000 - £ 50,000</option>
                                                    <option value="£ 50,000 - £ 100,000" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedvct']) && $additionalInfo['totalinvestedvct'] =='£ 50,000 - £ 100,000') ? 'selected':'' }}>£ 50,000 - £ 100,000</option>
                                                    <option value="£ 100,000+" {{ (!empty($additionalInfo) && isset($additionalInfo['totalinvestedvct']) && $additionalInfo['totalinvestedvct'] =='£ 100,000+') ? 'checked':'' }}>£ 100,000+</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label>Where did you hear about the site?</label>
                                <textarea class="form-control" name="hearaboutsite" >{{ (!empty($additionalInfo) && isset($additionalInfo['hearaboutsite'])) ? $additionalInfo['hearaboutsite']:'' }}</textarea>
                            </div>
                        </div>
                        <div>
                            <label>Contact Preferences</label>
                            @if($investor->hasPermissionTo('is_wealth_manager'))
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="yeshappy" name="marketingmail" {{ (!empty($additionalInfo) && isset($additionalInfo['marketingmail']) && $additionalInfo['marketingmail'] =='yes') ? 'checked':'' }}  value="yes" >
                                        <label class="custom-control-label normal" for="yeshappy">Yes, my Client is happy to receive marketing emails from the platform.</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="yeshappy2" {{ (!empty($additionalInfo) && isset($additionalInfo['marketingmail_party']) && $additionalInfo['marketingmail_party'] =='yes') ? 'checked':'' }} name="marketingmail_party" value="yes"  >
                                        <label class="custom-control-label normal" for="yeshappy2">Yes, my Client happy to receive marketing emails from strategic 3rd parties of the Platform.</label>
                                    </div>
                                </div>
                            @else
                                 <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="yeshappy" name="marketingmail" value="yes" {{ (!empty($additionalInfo) && isset($additionalInfo['marketingmail']) && $additionalInfo['marketingmail'] =='yes') ? 'checked':'' }} >
                                        <label class="custom-control-label normal" for="yeshappy"> I am happy to receive marketing emails from the platform.</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="yeshappy2" name="marketingmail_party" value="yes" {{ (!empty($additionalInfo) && isset($additionalInfo['marketingmail_party']) && $additionalInfo['marketingmail_party'] =='yes') ? 'checked':'' }} >
                                        <label class="custom-control-label normal" for="yeshappy2">I am happy to receive marketing emails from strategic 3rd parties of the Platform.</label>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label>Plans for using the site</label>
                                <textarea class="form-control" name="plansforusingsite"  >{{ (!empty($additionalInfo) && isset($additionalInfo['plansforusingsite'])) ? $additionalInfo['plansforusingsite']:'' }}</textarea>
                            </div>

                            @if($investor->hasPermissionTo('is_wealth_manager'))
                            <i class="text-muted"><small>Tell us how you intend to use the GrowthInvest.com website. It will help us provide better service to your client. </small></i><br/>
                            <i class="text-muted"><small>Eg: Interested in investing in online business. </small></i>
                            @else

                            <i class="text-muted"><small>Tell us how you intend to use the GrowthInvest.com website. It will help us provide the best services to you. </small></i><br/>
                            <i class="text-muted"><small>Eg: I am interested in investing in online business</small></i>
                            @endif
                            
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <a href="{{ url('backoffice/investor/'.$investor->gi_code.'/client-categorisation')}}"  class="btn btn-outline-primary mt-4"><i class="fa fa-angle-double-left"></i> Prev</a>
                            </div>
                            <button class="btn btn-primary mt-4" type="submit">Save</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="gi_code" value="{{ $investor->gi_code }}">
                            <div class="">
                                <a href="#" class="btn btn-primary mt-4">Next <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="investment_offers" role="tabpanel">
                <h1>Ipsum</h1>

                <p>Aenean pharetra risus quis placerat euismod. Praesent mattis lorem eget massa euismod sollicitudin. Donec porta nulla ut blandit vehicula. Mauris sagittis lorem nec mauris placerat, et molestie elit vehicula. Donec libero ex, condimentum et mi dapibus, euismod ornare ligula.</p>

                <p>In faucibus tempus ante, et tempor magna luctus id. Ut a maximus ipsum. Duis eu velit nec libero pretium pellentesque. Maecenas auctor hendrerit pulvinar. Donec sed tortor interdum, sodales elit vel, tempor turpis. In tristique vestibulum eros vel congue. Vivamus maximus posuere fringilla. Nullam in est commodo, tristique ligula eu, tincidunt enim. Duis iaculis sodales lectus vitae cursus.</p>
            </div>
        </div>
    </div>

</div>



    <style type="text/css">
        #datatable-investors_filter{
            display: none;
        }
    </style>

@endsection
