@extends('layouts.public')
@section('title', $data->meta_title)
@section('content')
<div class="wrapper-general">
    <section class="form-box">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <div class="box">
                        <div class="step step-1">
                            <h1>Become a Member</h1>
                            <p>For all your executive flights and ground transports you will earn bonus points you can use on your next journey. </p>
                            <p>Alternatively you can donate your points to Doctors Without Borders.</p>                            
                            <form name="join_form" id="step1_form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option disabled selected value>Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                          <label for="">First name</label>
                                            <input id="first_name" name="first_name" type="text" class="form-control user" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="form-group">
                                            <label for="">Last name</label>
                                            <input id="last_name" name="last_name" type="text" class="form-control user" placeholder="Last name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Country</label>
                                            <select name="country" id="country" class="form-control" required>
                                                <option disabled selected value>Country</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Congo" >Congo</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Ivory Coast">Ivory Coast</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Chile">Chile</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="China">China</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cap-Vert">Cap-Vert</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Dutch Antilles">Dutch Antilles</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Finland">Finland</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Micronesia">Micronesia</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="France">France</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Israel">Israel</option>
                                                <option value="India">India</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="St Kitts &amp; Nevis" >St Kitts &amp; Nevis</option>
                                                <option value="North Korea" >North Korea</option>
                                                <option value="South Korea" >South Korea</option>
                                                <option value="Kuwait" >Kuwait</option>
                                                <option value="Cayman Island" >Cayman Island</option>
                                                <option value="Kazakhstan" >Kazakhstan</option>
                                                <option value="Laos" >Laos</option>
                                                <option value="Lebanon" >Lebanon</option>
                                                <option value="St Lucia" >St Lucia</option>
                                                <option value="Liechtenstein" >Liechtenstein</option>
                                                <option value="Sri Lanka" >Sri Lanka</option>
                                                <option value="Liberia" >Liberia</option>
                                                <option value="Lesotho" >Lesotho</option>
                                                <option value="Lithuania" >Lithuania</option>
                                                <option value="Luxembourg" >Luxembourg</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Saint Martin">Saint Martin</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Mozambique" >Mozambique</option>
                                                <option value="Namibia" >Namibia</option>
                                                <option value="Niger" >Niger</option>
                                                <option value="Nigeria" >Nigeria</option>
                                                <option value="Nicaragua" >Nicaragua</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Norway" >Norway</option>
                                                <option value="Nepal" >Nepal</option>
                                                <option value="Nauru" >Nauru</option>
                                                <option value="Niue" >Niue</option>
                                                <option value="New Zealand" >New Zealand</option>
                                                <option value="Oman" >Oman</option>
                                                <option value="Panama" >Panama</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Polinesia Francese">Polinesia Francese</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Poland" >Poland</option>
                                                <option value="Puerto Rico" >Puerto Rico</option>
                                                <option value="Territoires Palestiniens" >Territoires Palestiniens</option>
                                                <option value="Portugal" >Portugal</option>
                                                <option value="Palau" >Palau</option>
                                                <option value="Paraguay" >Paraguay</option>
                                                <option value="Qatar" >Qatar</option>
                                                <option value="Romania" >Romania</option>
                                                <option value="Serbia" >Serbia</option>
                                                <option value="Russia" >Russia</option>
                                                <option value="Rwanda" >Rwanda</option>
                                                <option value="Saudi Arabia" >Saudi Arabia</option>
                                                <option value="Solomon Islands" >Solomon Islands</option>
                                                <option value="Seychelles" >Seychelles</option>
                                                <option value="Sudan" >Sudan</option>
                                                <option value="Sweden" >Sweden</option>
                                                <option value="Singapore" >Singapore</option>
                                                <option value="Slovenia" >Slovenia</option>
                                                <option value="Slovakia" >Slovakia</option>
                                                <option value="Sierra Leone" >Sierra Leone</option>
                                                <option value="Senegal" >Senegal</option>
                                                <option value="Somalia" >Somalia</option>
                                                <option value="Suriname" >Suriname</option>
                                                <option value="Sao Tome &amp; Principe" >Sao Tome &amp; Principe</option>
                                                <option value="Salvador" >Salvador</option>
                                                <option value="Syria" >Syria</option>
                                                <option value="Swaziland" >Swaziland</option>
                                                <option value="Chad" >Chad</option>
                                                <option value="Togo" >Togo</option>
                                                <option value="Thailand" >Thailand</option>
                                                <option value="Tajikistan" >Tajikistan</option>
                                                <option value="East Timor" >East Timor</option>
                                                <option value="Turkmenistan" >Turkmenistan</option>
                                                <option value="Tunisia" >Tunisia</option>
                                                <option value="Tonga" >Tonga</option>
                                                <option value="Turkey" >Turkey</option>
                                                <option value="Trinidad &amp; Tobago" >Trinidad &amp; Tobago</option>
                                                <option value="Tuvalu" >Tuvalu</option>
                                                <option value="Taïwan" >Taïwan</option>
                                                <option value="Tanzania" >Tanzania</option>
                                                <option value="Ukraine" >Ukraine</option>
                                                <option value="Uganda" >Uganda</option>
                                                <option value="United States" >United States</option>
                                                <option value="Uruguay" >Uruguay</option>
                                                <option value="Uzbekistan" >Uzbekistan</option>
                                                <option value="Vatican City" >Vatican City</option>
                                                <option value="St Vincent &amp; the Grenadines">St Vincent &amp; the Grenadines</option>
                                                <option value="Venezuela" >Venezuela</option>
                                                <option value="British Virgin Islands" >British Virgin Islands</option>
                                                <option value="Vietnam" >Vietnam</option>
                                                <option value="Vanuatu" >Vanuatu</option>
                                                <option value="Samoa" >Samoa</option>
                                                <option value="Kosovo" >Kosovo</option>
                                                <option value="Yemen" >Yemen</option>
                                                <option value="South Africa" >South Africa</option>
                                                <option value="Zambia" >Zambia</option>
                                                <option value="Zimbabwe" >Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">City</label>
                                            <input id="city" name="city" type="text" class="form-control world" placeholder="City" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="checkbox agree_check">
                                            <label><input type="checkbox" name="agree" id="agree"> I have read and I agree to <a href="{{url('/terms')}}" target="_blank">Terms & Conditions, Privacy Policy & GDPR Compliance.</a>. </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrapper-btns text-left">
                                    <a id="continue" class="btn btn-yellow">Continue</a>
                                </div>
                            </form>
                        </div>
                        <div class="step step-2" style="display: none;">
                            <h1>Become a Member</h1>
                            <p>For all your executive flights and ground transports you will earn bonus points you can use on your next journey. </p>
                            <p>Alternatively you can donate your points to Doctors Without Borders.</p>                            
                            <form name="step2_form" id="step2_form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" id="email" name="email" class="form-control email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="tel" id="phone" name="phone" class="form-control phone" placeholder="Phone"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" id="password" name="password" class="form-control pass" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Retype Password</label>
                                            <input type="password" id="retype_password" name="retype_password" class="form-control pass" placeholder="Retype Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" id="offer" value="offer" name="offer" >I wish to receive Access Oslo emails with special offers and more.</label>
                                        </div>
                                        <small>We promise to respect your privacy and not share your details.
                                            <br> Look at our
                                            <a href="#">Privacy Policy</a> for more details.</small>
                                    </div>
                                </div>
                                <div class="wrapper-btns text-left">
                                    <a id="register" class="btn btn-yellow">Register</a>
                                </div>
                            </form>
                        </div>
                        <div class="step step-3" style="display: none;">
                            <h1>Become a Member</h1>
                            <p>For all your executive flights and ground transports you will earn bonus points you can use on your next journey. </p>
                            <p>Alternatively you can donate your points to Doctors Without Borders.</p>                            
                            <form name="step3_form" id="step3_form">
                                <div class="verify-box text-center">
                                    <h2>Verify Your Account</h2>
                                    <p>Please enter your mobile number to verify your account</p>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                            <div class="input-group">
                                                <div class="form-group">
                                                    <input id="mobile-number" name="mobile-number" type="tel" class="form-control" placeholder="Phone number" required  title="The invaild phoneNumber">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrapper-btns text-center">
                                    <a id="request_sms" class="btn btn-yellow">Request sms verification</a>
                                </div>
                            </form>
                        </div>
                        <div class="step step-4" style="display: none;">
                            <form name="step4_form" id="step4_form">
                                <h1>Become a Member</h1>
                                <p>For all your executive flights and ground transports you will earn bonus points you can use on your next journey. </p>
                                <p>Alternatively you can donate your points to Doctors Without Borders.</p>                                
                                <div class="sms-box text-center">
                                    <h2>SMS Sent Successfully</h2>
                                    <p>We have just sent a text message to: </p>

                                    <b id="send_phonenumber">321213</b>

                                    <p>You should receive it within the next 10 minutes. <br><br>

                                    To verify you account please enter the code you have received in the SMS message</p>
                                    <div class="box-code">
                                        <input type="text" id="first" name="first" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="second" name="second" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="third" name="third" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="fourth" name="fourth" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="fifth" name="fifth" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="sixth" name="sixth" class="form-control code" maxlength="1" required title="x">
                                    </div>
                                </div>
                                <div class="wrapper-btns text-center">
                                    <a class="btn btn-yellow" id="verify">Verify</a>
                                    <div class="clearfix"></div>
                                    <a class="link" id="reSMS">I didn't receive an SMS</a>
                                </div>
                            </form>
                        </div>
                        <div class="step step-5" style="display: none;">
                            <h1>WELCOME TO ACCESS OSLO</h1>
                            <form name="step5_form" id="step5_form" method="post" action="/users/start_signup">
                                {{csrf_field()}}
                                <h2>How did you hear about us?</h2>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="radio">
                                        <label><input type="radio" value="advertisement" name="advertisement">Advertisement</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" value="email_last" name="email_last">Email</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" value="post_mail" name="post_mail">Post Mail</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="radio">
                                            <label><input type="radio" value="search_engine" name="search_engine">Search Engine</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" value="referrals" name="referrals">Referrals</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" value="news" name="news">News</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrapper-btns text-center">
                                    <input type="hidden" id="hidden_email" name="email">
                                    <input type="hidden" id="hidden_pwd" name="password">
                                    <input type="submit" id="start" class="btn btn-yellow" value="Start using loyalty program">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.SignUp();});</script>
@endsection
