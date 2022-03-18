@extends('ecommerce.index')

@section('styles')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Account Settings - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('ecommerce/app-assets/css/plugins/forms/form-validation.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ecommerce/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Account Settings</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pages</a>
                                </li>
                                <li class="breadcrumb-item active"> Account Settings
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i
                                    class="me-1" data-feather="check-square"></i><span
                                    class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i
                                    class="me-1" data-feather="message-square"></i><span
                                    class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i
                                    class="me-1" data-feather="mail"></i><span
                                    class="align-middle">Email</span></a><a class="dropdown-item"
                                href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span
                                    class="align-middle">Calendar</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column nav-left">
                            <!-- general -->
                            <li class="nav-item">
                                <a class="nav-link active" id="account-pill-general" data-bs-toggle="pill"
                                    href="#account-vertical-general" aria-expanded="true">
                                    <i data-feather="user" class="font-medium-3 me-1"></i>
                                    <span class="fw-bold">General</span>
                                </a>
                            </li>
                            <!-- change password -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-password" data-bs-toggle="pill"
                                    href="#account-vertical-password" aria-expanded="false">
                                    <i data-feather="lock" class="font-medium-3 me-1"></i>
                                    <span class="fw-bold">Change Password</span>
                                </a>
                            </li>
                            <!-- information -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-info" data-bs-toggle="pill"
                                    href="#account-vertical-info" aria-expanded="false">
                                    <i data-feather="info" class="font-medium-3 me-1"></i>
                                    <span class="fw-bold">Information</span>
                                </a>
                            </li>
                            <!-- social -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-social" data-bs-toggle="pill"
                                    href="#account-vertical-social" aria-expanded="false">
                                    <i data-feather="link" class="font-medium-3 me-1"></i>
                                    <span class="fw-bold">Social</span>
                                </a>
                            </li>
                            <!-- notification -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-notifications" data-bs-toggle="pill"
                                    href="#account-vertical-notifications" aria-expanded="false">
                                    <i data-feather="bell" class="font-medium-3 me-1"></i>
                                    <span class="fw-bold">Notifications</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/ left menu section -->

                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- general tab -->
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                        aria-labelledby="account-pill-general" aria-expanded="true">
                                        <!-- header section -->
                                        <div class="d-flex">
                                            <a href="#" class="me-25">
                                                <img src="/app-assets/images/portrait/small/avatar-s-11.jpg"
                                                    id="account-upload-img" class="rounded me-50" alt="profile image"
                                                    height="80" width="80" />
                                            </a>
                                            <!-- upload and reset button -->
                                            <div class="mt-75 ms-1">
                                                <label for="account-upload"
                                                    class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                                <input type="file" id="account-upload" hidden accept="image/*" />
                                                <button class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                                <p>Allowed JPG, GIF or PNG. Max size of 800kB</p>
                                            </div>
                                            <!--/ upload and reset button -->
                                        </div>
                                        <!--/ header section -->

                                        <!-- form -->
                                        <form class="validate-form mt-2">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label"
                                                            for="account-username">Username</label>
                                                        <input type="text" class="form-control" id="account-username"
                                                            name="username" placeholder="Username"
                                                            value="{{ auth('admin')->user()->id }}" readonly />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="account-name">Name</label>
                                                        <input type="text" class="form-control" id="account-name"
                                                            name="name" placeholder="Name"
                                                            value="{{ auth('admin')->user()->name }}" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="account-e-mail">E-mail</label>
                                                        <input type="email" class="form-control" id="account-e-mail"
                                                            name="email" placeholder="Email"
                                                            value="{{ auth('admin')->user()->email }}" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="account-company">Company</label>
                                                        <input type="text" class="form-control" id="account-company"
                                                            name="company" placeholder="Company name"
                                                            value="Crystal Technologies" />
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-75">
                                                    <div class="alert alert-warning mb-50" role="alert">
                                                        <h4 class="alert-heading">Your email is not confirmed.
                                                            Please check your inbox.</h4>
                                                        <div class="alert-body">
                                                            <a href="javascript: void(0);" class="alert-link">Resend
                                                                confirmation</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-2 me-1">Save
                                                        changes</button>
                                                    <button type="reset"
                                                        class="btn btn-outline-secondary mt-2">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ general tab -->

                                    <!-- change password -->
                                    <div class="tab-pane fade" id="account-vertical-password" role="tabpanel"
                                        aria-labelledby="account-pill-password" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="old_password">Old
                                                            Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control" id="old_password"
                                                                name="old_password" placeholder="Old Password" />
                                                            <div class="input-group-text cursor-pointer">
                                                                <i data-feather="eye"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="new_password">New
                                                            Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" id="new_password" name="new_password"
                                                                class="form-control" placeholder="New Password" />
                                                            <div class="input-group-text cursor-pointer">
                                                                <i data-feather="eye"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="re_new_password">Retype New
                                                            Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control"
                                                                id="re_new_password" name="confirm-new-password"
                                                                placeholder="New Password" />
                                                            <div class="input-group-text cursor-pointer"><i
                                                                    data-feather="eye"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="button" onclick="changePassword()"
                                                        class="btn btn-primary me-1 mt-1">Save
                                                        changes</button>
                                                    <button type="reset"
                                                        class="btn btn-outline-secondary mt-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ change password -->

                                    <!-- information -->
                                    <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                        aria-labelledby="account-pill-info" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form" id="admin_info">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="bio">Bio</label>
                                                        <textarea class="form-control" id="bio" rows="4" placeholder="Enter your bio ...">
                                                            @if (!is_null($admin_info->bio))
{{ $admin_info->bio }}
@endif
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="BOD">Birth
                                                            date</label>
                                                        <input type="text" class="form-control flatpickr"
                                                            placeholder="Follow this format: 2000-01-01" id="BOD"
                                                            @if (!is_null($admin_info->DOB)) value = "{{ $admin_info->DOB }}" @endif
                                                            name="BOD" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="country">Country</label>
                                                        <select class="form-select" id="country">
                                                            <option>select country</option>
                                                            <option value="AF">Afghanistan</option>
                                                            <option value="AX">Aland Islands</option>
                                                            <option value="AL">Albania</option>
                                                            <option value="DZ">Algeria</option>
                                                            <option value="AS">American Samoa</option>
                                                            <option value="AD">Andorra</option>
                                                            <option value="AO">Angola</option>
                                                            <option value="AI">Anguilla</option>
                                                            <option value="AQ">Antarctica</option>
                                                            <option value="AG">Antigua and Barbuda</option>
                                                            <option value="AR">Argentina</option>
                                                            <option value="AM">Armenia</option>
                                                            <option value="AW">Aruba</option>
                                                            <option value="AU">Australia</option>
                                                            <option value="AT">Austria</option>
                                                            <option value="AZ">Azerbaijan</option>
                                                            <option value="BS">Bahamas</option>
                                                            <option value="BH">Bahrain</option>
                                                            <option value="BD">Bangladesh</option>
                                                            <option value="BB">Barbados</option>
                                                            <option value="BY">Belarus</option>
                                                            <option value="BE">Belgium</option>
                                                            <option value="BZ">Belize</option>
                                                            <option value="BJ">Benin</option>
                                                            <option value="BM">Bermuda</option>
                                                            <option value="BT">Bhutan</option>
                                                            <option value="BO">Bolivia</option>
                                                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                            <option value="BA">Bosnia and Herzegovina</option>
                                                            <option value="BW">Botswana</option>
                                                            <option value="BV">Bouvet Island</option>
                                                            <option value="BR">Brazil</option>
                                                            <option value="IO">British Indian Ocean Territory</option>
                                                            <option value="BN">Brunei Darussalam</option>
                                                            <option value="BG">Bulgaria</option>
                                                            <option value="BF">Burkina Faso</option>
                                                            <option value="BI">Burundi</option>
                                                            <option value="KH">Cambodia</option>
                                                            <option value="CM">Cameroon</option>
                                                            <option value="CA">Canada</option>
                                                            <option value="CV">Cape Verde</option>
                                                            <option value="KY">Cayman Islands</option>
                                                            <option value="CF">Central African Republic</option>
                                                            <option value="TD">Chad</option>
                                                            <option value="CL">Chile</option>
                                                            <option value="CN">China</option>
                                                            <option value="CX">Christmas Island</option>
                                                            <option value="CC">Cocos (Keeling) Islands</option>
                                                            <option value="CO">Colombia</option>
                                                            <option value="KM">Comoros</option>
                                                            <option value="CG">Congo</option>
                                                            <option value="CD">Congo, Democratic Republic of the Congo
                                                            </option>
                                                            <option value="CK">Cook Islands</option>
                                                            <option value="CR">Costa Rica</option>
                                                            <option value="CI">Cote D'Ivoire</option>
                                                            <option value="HR">Croatia</option>
                                                            <option value="CU">Cuba</option>
                                                            <option value="CW">Curacao</option>
                                                            <option value="CY">Cyprus</option>
                                                            <option value="CZ">Czech Republic</option>
                                                            <option value="DK">Denmark</option>
                                                            <option value="DJ">Djibouti</option>
                                                            <option value="DM">Dominica</option>
                                                            <option value="DO">Dominican Republic</option>
                                                            <option value="EC">Ecuador</option>
                                                            <option value="EG">Egypt</option>
                                                            <option value="SV">El Salvador</option>
                                                            <option value="GQ">Equatorial Guinea</option>
                                                            <option value="ER">Eritrea</option>
                                                            <option value="EE">Estonia</option>
                                                            <option value="ET">Ethiopia</option>
                                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                                            <option value="FO">Faroe Islands</option>
                                                            <option value="FJ">Fiji</option>
                                                            <option value="FI">Finland</option>
                                                            <option value="FR">France</option>
                                                            <option value="GF">French Guiana</option>
                                                            <option value="PF">French Polynesia</option>
                                                            <option value="TF">French Southern Territories</option>
                                                            <option value="GA">Gabon</option>
                                                            <option value="GM">Gambia</option>
                                                            <option value="GE">Georgia</option>
                                                            <option value="DE">Germany</option>
                                                            <option value="GH">Ghana</option>
                                                            <option value="GI">Gibraltar</option>
                                                            <option value="GR">Greece</option>
                                                            <option value="GL">Greenland</option>
                                                            <option value="GD">Grenada</option>
                                                            <option value="GP">Guadeloupe</option>
                                                            <option value="GU">Guam</option>
                                                            <option value="GT">Guatemala</option>
                                                            <option value="GG">Guernsey</option>
                                                            <option value="GN">Guinea</option>
                                                            <option value="GW">Guinea-Bissau</option>
                                                            <option value="GY">Guyana</option>
                                                            <option value="HT">Haiti</option>
                                                            <option value="HM">Heard Island and Mcdonald Islands</option>
                                                            <option value="VA">Holy See (Vatican City State)</option>
                                                            <option value="HN">Honduras</option>
                                                            <option value="HK">Hong Kong</option>
                                                            <option value="HU">Hungary</option>
                                                            <option value="IS">Iceland</option>
                                                            <option value="IN">India</option>
                                                            <option value="ID">Indonesia</option>
                                                            <option value="IR">Iran, Islamic Republic of</option>
                                                            <option value="IQ">Iraq</option>
                                                            <option value="IE">Ireland</option>
                                                            <option value="IM">Isle of Man</option>
                                                            <option value="IL">Israel</option>
                                                            <option value="IT">Italy</option>
                                                            <option value="JM">Jamaica</option>
                                                            <option value="JP">Japan</option>
                                                            <option value="JE">Jersey</option>
                                                            <option value="JO">Jordan</option>
                                                            <option value="KZ">Kazakhstan</option>
                                                            <option value="KE">Kenya</option>
                                                            <option value="KI">Kiribati</option>
                                                            <option value="KP">Korea, Democratic People's Republic of
                                                            </option>
                                                            <option value="KR">Korea, Republic of</option>
                                                            <option value="XK">Kosovo</option>
                                                            <option value="KW">Kuwait</option>
                                                            <option value="KG">Kyrgyzstan</option>
                                                            <option value="LA">Lao People's Democratic Republic</option>
                                                            <option value="LV">Latvia</option>
                                                            <option value="LB">Lebanon</option>
                                                            <option value="LS">Lesotho</option>
                                                            <option value="LR">Liberia</option>
                                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                                            <option value="LI">Liechtenstein</option>
                                                            <option value="LT">Lithuania</option>
                                                            <option value="LU">Luxembourg</option>
                                                            <option value="MO">Macao</option>
                                                            <option value="MK">Macedonia, the Former Yugoslav Republic of
                                                            </option>
                                                            <option value="MG">Madagascar</option>
                                                            <option value="MW">Malawi</option>
                                                            <option value="MY">Malaysia</option>
                                                            <option value="MV">Maldives</option>
                                                            <option value="ML">Mali</option>
                                                            <option value="MT">Malta</option>
                                                            <option value="MH">Marshall Islands</option>
                                                            <option value="MQ">Martinique</option>
                                                            <option value="MR">Mauritania</option>
                                                            <option value="MU">Mauritius</option>
                                                            <option value="YT">Mayotte</option>
                                                            <option value="MX">Mexico</option>
                                                            <option value="FM">Micronesia, Federated States of</option>
                                                            <option value="MD">Moldova, Republic of</option>
                                                            <option value="MC">Monaco</option>
                                                            <option value="MN">Mongolia</option>
                                                            <option value="ME">Montenegro</option>
                                                            <option value="MS">Montserrat</option>
                                                            <option value="MA">Morocco</option>
                                                            <option value="MZ">Mozambique</option>
                                                            <option value="MM">Myanmar</option>
                                                            <option value="NA">Namibia</option>
                                                            <option value="NR">Nauru</option>
                                                            <option value="NP">Nepal</option>
                                                            <option value="NL">Netherlands</option>
                                                            <option value="AN">Netherlands Antilles</option>
                                                            <option value="NC">New Caledonia</option>
                                                            <option value="NZ">New Zealand</option>
                                                            <option value="NI">Nicaragua</option>
                                                            <option value="NE">Niger</option>
                                                            <option value="NG">Nigeria</option>
                                                            <option value="NU">Niue</option>
                                                            <option value="NF">Norfolk Island</option>
                                                            <option value="MP">Northern Mariana Islands</option>
                                                            <option value="NO">Norway</option>
                                                            <option value="OM">Oman</option>
                                                            <option value="PK">Pakistan</option>
                                                            <option value="PW">Palau</option>
                                                            <option value="PS">Palestinian Territory, Occupied</option>
                                                            <option value="PA">Panama</option>
                                                            <option value="PG">Papua New Guinea</option>
                                                            <option value="PY">Paraguay</option>
                                                            <option value="PE">Peru</option>
                                                            <option value="PH">Philippines</option>
                                                            <option value="PN">Pitcairn</option>
                                                            <option value="PL">Poland</option>
                                                            <option value="PT">Portugal</option>
                                                            <option value="PR">Puerto Rico</option>
                                                            <option value="QA">Qatar</option>
                                                            <option value="RE">Reunion</option>
                                                            <option value="RO">Romania</option>
                                                            <option value="RU">Russian Federation</option>
                                                            <option value="RW">Rwanda</option>
                                                            <option value="BL">Saint Barthelemy</option>
                                                            <option value="SH">Saint Helena</option>
                                                            <option value="KN">Saint Kitts and Nevis</option>
                                                            <option value="LC">Saint Lucia</option>
                                                            <option value="MF">Saint Martin</option>
                                                            <option value="PM">Saint Pierre and Miquelon</option>
                                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                                            <option value="WS">Samoa</option>
                                                            <option value="SM">San Marino</option>
                                                            <option value="ST">Sao Tome and Principe</option>
                                                            <option value="SA">Saudi Arabia</option>
                                                            <option value="SN">Senegal</option>
                                                            <option value="RS">Serbia</option>
                                                            <option value="CS">Serbia and Montenegro</option>
                                                            <option value="SC">Seychelles</option>
                                                            <option value="SL">Sierra Leone</option>
                                                            <option value="SG">Singapore</option>
                                                            <option value="SX">Sint Maarten</option>
                                                            <option value="SK">Slovakia</option>
                                                            <option value="SI">Slovenia</option>
                                                            <option value="SB">Solomon Islands</option>
                                                            <option value="SO">Somalia</option>
                                                            <option value="ZA">South Africa</option>
                                                            <option value="GS">South Georgia and the South Sandwich Islands
                                                            </option>
                                                            <option value="SS">South Sudan</option>
                                                            <option value="ES">Spain</option>
                                                            <option value="LK">Sri Lanka</option>
                                                            <option value="SD">Sudan</option>
                                                            <option value="SR">Suriname</option>
                                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                                            <option value="SZ">Swaziland</option>
                                                            <option value="SE">Sweden</option>
                                                            <option value="CH">Switzerland</option>
                                                            <option value="SY">Syrian Arab Republic</option>
                                                            <option value="TW">Taiwan, Province of China</option>
                                                            <option value="TJ">Tajikistan</option>
                                                            <option value="TZ">Tanzania, United Republic of</option>
                                                            <option value="TH">Thailand</option>
                                                            <option value="TL">Timor-Leste</option>
                                                            <option value="TG">Togo</option>
                                                            <option value="TK">Tokelau</option>
                                                            <option value="TO">Tonga</option>
                                                            <option value="TT">Trinidad and Tobago</option>
                                                            <option value="TN">Tunisia</option>
                                                            <option value="TR">Turkey</option>
                                                            <option value="TM">Turkmenistan</option>
                                                            <option value="TC">Turks and Caicos Islands</option>
                                                            <option value="TV">Tuvalu</option>
                                                            <option value="UG">Uganda</option>
                                                            <option value="UA">Ukraine</option>
                                                            <option value="AE">United Arab Emirates</option>
                                                            <option value="GB">United Kingdom</option>
                                                            <option value="US">United States</option>
                                                            <option value="UM">United States Minor Outlying Islands</option>
                                                            <option value="UY">Uruguay</option>
                                                            <option value="UZ">Uzbekistan</option>
                                                            <option value="VU">Vanuatu</option>
                                                            <option value="VE">Venezuela</option>
                                                            <option value="VN">Viet Nam</option>
                                                            <option value="VG">Virgin Islands, British</option>
                                                            <option value="VI">Virgin Islands, U.s.</option>
                                                            <option value="WF">Wallis and Futuna</option>
                                                            <option value="EH">Western Sahara</option>
                                                            <option value="YE">Yemen</option>
                                                            <option value="ZM">Zambia</option>
                                                            <option value="ZW">Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="website">Website</label>
                                                        <input type="text" class="form-control" name="website"
                                                            id="website" placeholder="Website address"
                                                            @if (!is_null($admin_info->website)) value="{{ $admin_info->website }}" @endif />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="phone">Phone</label>
                                                        <input type="text" class="form-control" id="phone"
                                                            placeholder="Phone number" name="phone"
                                                            @if (!is_null($admin_info->phone)) value="{{ $admin_info->phone }}" @endif />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="button" onclick="storeAdminInfo()"
                                                        class="btn btn-primary mt-1 me-1">Save
                                                        changes</button>
                                                    <button type="reset"
                                                        class="btn btn-outline-secondary mt-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ information -->

                                    <!-- social -->
                                    <div class="tab-pane fade" id="account-vertical-social" role="tabpanel"
                                        aria-labelledby="account-pill-social" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form">
                                            <div class="row">
                                                <!-- social header -->
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <i data-feather="link" class="font-medium-3"></i>
                                                        <h4 class="mb-0 ms-75">Social Links</h4>
                                                    </div>
                                                </div>
                                                <!-- twitter link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="twitter">Twitter</label>
                                                        <input type="text" id="twitter" class="form-control"
                                                            placeholder="Add link"
                                                            @if (!is_null($admin_social->twitter)) value="{{ $admin_social->twitter }}" @endif />
                                                    </div>
                                                </div>
                                                <!-- facebook link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="facebook">Facebook</label>
                                                        <input type="text" id="facebook" class="form-control"
                                                            placeholder="Add link"
                                                            @if (!is_null($admin_social->facebook)) value="{{ $admin_social->facebook }}" @endif />
                                                    </div>
                                                </div>
                                                <!-- google plus input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="google">Google+</label>
                                                        <input type="text" id="google" class="form-control"
                                                            placeholder="Add link"
                                                            @if (!is_null($admin_social->google)) value="{{ $admin_social->google }}" @endif />
                                                    </div>
                                                </div>
                                                <!-- linkedin link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="linkedln">LinkedIn</label>
                                                        <input type="text" id="linkedln" class="form-control"
                                                            placeholder="Add link" value="https://www.linkedin.com"
                                                            @if (!is_null($admin_social->linkedlin)) value="{{ $admin_social->linkedlin }}" @endif />
                                                    </div>
                                                </div>
                                                <!-- instagram link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="instagram">Instagram</label>
                                                        <input type="text" id="instagram" class="form-control"
                                                            placeholder="Add link"
                                                            @if (!is_null($admin_social->instagram)) value="{{ $admin_social->instagram }}" @endif />
                                                    </div>
                                                </div>
                                                <!-- Quora link input -->
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="quora">Quora</label>
                                                        <input type="text" id="quora" class="form-control"
                                                            placeholder="Add link"
                                                            @if (!is_null($admin_social->quora)) value="{{ $admin_social->quora }}" @endif />
                                                    </div>
                                                </div>

                                                <!-- divider -->
                                                <div class="col-12">
                                                    <hr class="my-2" />
                                                </div>

                                                <div class="col-12 mt-1">
                                                    <!-- profile connection header -->
                                                    <div class="d-flex align-items-center mb-3">
                                                        <i data-feather="user" class="font-medium-3"></i>
                                                        <h4 class="mb-0 ms-75">Profile Connections</h4>
                                                    </div>

                                                    <div class="row">
                                                        <!-- twitter user -->
                                                        <div class="col-6 col-md-3 text-center mb-1">
                                                            <p class="fw-bold">Your Twitter</p>
                                                            @if (!is_null($admin_social->twitter))
                                                                <button class="btn btn-outline-primary"> <a
                                                                        href="{{ $admin_social->twitter }}">Connect</a></button>
                                                            @else
                                                                <a href="#">Disconnect</a>
                                                            @endif
                                                        </div>
                                                        <!-- facebook button -->
                                                        <div class="col-6 col-md-3 text-center mb-1">
                                                            <p class="fw-bold mb-2">Your Facebook</p>
                                                            @if (!is_null($admin_social->facebook))
                                                                <button class="btn btn-outline-primary"> <a
                                                                        href="{{ $admin_social->facebook }}">Connect</a></button>
                                                            @else
                                                                <a href="#">Disconnect</a>
                                                            @endif
                                                        </div>
                                                        <!-- google user -->
                                                        <div class="col-6 col-md-3 text-center mb-1">
                                                            <p class="fw-bold">Your Google</p>
                                                            @if (!is_null($admin_social->google))
                                                                <button class="btn btn-outline-primary"> <a
                                                                        href="{{ $admin_social->google }}">Connect</a></button>
                                                            @else
                                                                <a href="#">Disconnect</a>
                                                            @endif
                                                        </div>
                                                        <!-- intagram button -->
                                                        <div class="col-6 col-md-3 text-center mb-2">
                                                            <p class="fw-bold mb-1">Your Instagram</p>
                                                            @if (!is_null($admin_social->instagram))
                                                                <button class="btn btn-outline-primary"> <a
                                                                        href="{{ $admin_social->instagram }}">Connect</a></button>
                                                            @else
                                                                <a href="#">Disconnect</a>
                                                            @endif
                                                        </div>
                                                        <!-- Linkedin buton -->
                                                        <div class="col-6 col-md-3 text-center mb-2">
                                                            <p class="fw-bold mb-1">Your Linkedin</p>
                                                            @if (!is_null($admin_social->linkedlin))
                                                                <button class="btn btn-outline-primary"> <a
                                                                        href="{{ $admin_social->linkedlin }}">Connect</a></button>
                                                            @else
                                                                <a href="#">Disconnect</a>
                                                            @endif
                                                        </div>
                                                        <!-- quora button -->
                                                        <div class="col-6 col-md-3 text-center mb-2">
                                                            <p class="fw-bold mb-1">Your Quora</p>
                                                            @if (!is_null($admin_social->quora))
                                                                <button class="btn btn-outline-primary"> <a
                                                                        href="{{ $admin_social->quora }}">Connect</a></button>
                                                            @else
                                                                <a href="#">Disconnect</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <!-- submit and cancel button -->
                                                    <button type="button" onclick="addAdminSocials()"
                                                        class="btn btn-primary me-1 mt-1">Save changes</button>
                                                    <button type="reset"
                                                        class="btn btn-outline-secondary mt-1">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ social -->

                                    <!-- notifications -->
                                    <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel"
                                        aria-labelledby="account-pill-notifications" aria-expanded="false">
                                        <div class="row">
                                            <h6 class="section-label mb-2">Activity</h6>
                                            <div class="col-12 mb-2">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" checked
                                                        id="accountSwitch1" />
                                                    <label class="form-check-label" for="accountSwitch1">
                                                        Email me when someone comments onmy article
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" checked
                                                        id="accountSwitch2" />
                                                    <label class="form-check-label" for="accountSwitch2">
                                                        Email me when someone answers on my form
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="accountSwitch3" />
                                                    <label class="form-check-label" for="accountSwitch3">Email me
                                                        hen someone follows me</label>
                                                </div>
                                            </div>
                                            <h6 class="section-label mt-2">Application</h6>
                                            <div class="col-12 mt-1 mb-2">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" checked
                                                        id="accountSwitch4" />
                                                    <label class="form-check-label" for="accountSwitch4">News and
                                                        announcements</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" checked
                                                        id="accountSwitch6" />
                                                    <label class="form-check-label" for="accountSwitch6">Weekly
                                                        product updates</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-75">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="accountSwitch5" />
                                                    <label class="form-check-label" for="accountSwitch5">Weekly
                                                        blog digest</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mt-2 me-1">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-secondary mt-2">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ notifications -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ right content section -->
                </div>
            </section>
            <!-- / account setting page -->

        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('scripts')
    <script>
        function changePassword() {
            // admin/client/change-password
            axios.put('/admin/admin-settings/change-password/', {
                    old_password: document.getElementById('old_password').value,
                    new_password: document.getElementById('new_password').value,
                    re_new_password: document.getElementById('re_new_password').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    location.reload();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message)
                })
                .then(function() {
                    // always executed
                });
        }

        function storeAdminInfo() {
            // admin/admin-settings/admin-info
            axios.post('/admin/admin-settings/admin-info', {
                    bio: document.getElementById('bio').value,
                    bod: document.getElementById('BOD').value,
                    country: document.getElementById('country').value,
                    website: document.getElementById('website').value,
                    phone: document.getElementById('phone').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // location.reload();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message)
                })
                .then(function() {
                    // always executed
                });
        }

        function addAdminSocials() {
            // /admin/admin-settings/admin-social
            axios.post('/admin/admin-settings/admin-social', {
                    twitter: document.getElementById('twitter').value,
                    facebook: document.getElementById('facebook').value,
                    google: document.getElementById('google').value,
                    linkedln: document.getElementById('linkedln').value,
                    instagram: document.getElementById('instagram').value,
                    quora: document.getElementById('quora').value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // location.reload();
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message)
                })
                .then(function() {
                    // always executed
                });
        }
    </script>
@endsection
