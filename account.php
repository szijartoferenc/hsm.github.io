<?php 
include("include/connection.php");

if (isset($_POST['account'])) {
    
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];


    $error = array();
    if (empty($surname)) {
       $error ['account'] = "Írja be a vezetéknevét";
    } else if (empty($firstname)) {
        $error ['account'] = "Írja be a keresztnevét";
    } else if (empty($email)) {
        $error ['account'] = "Írja be az emailcímét";
    } else if ($gender == "") {
        $error ['account'] = "Írja be a nemét";
    } else if(empty($phone)){
        $error ['account'] = "Írja be a telefonszámát";
    } else if ($country == "") {
        $error ['account'] = "Írja be az országot";
    } else if (empty($password)) {
        $error ['account'] = "Írja be a jelszót";
    } else if ($confirm_password != $password) {
        $error ['account'] = "A jelszavak nem egyeznek";
    }

    if (count($error)==0) {
        $query = "INSERT INTO patients (surname, firstname, username, email, gender, phone, country, password, data_reg,  profile) VALUES('$surname','$firstname','$username','$email','$gender', '$phone','$country','$password',NOW(),'patient.jpg')";

        $result = mysqli_query($conn,$query);

        if ($result) {
            echo "<script>alert('A regisztráció küldése sikeres'))</script>";
            header("Location: patientlogin.php");
        }else {
            echo "<script>alert('A regisztráció küldése sikertelen'))</script>";
        }


    }

   


}

if (isset($error ['account'])) {
    $s= $error['account'];

    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
}else {
    $show = "";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beteg regisztráció</title>
</head>
<body>
<?php
    include("include/header.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 mt-4 p-5 bg-light text-dark">
                    <h5 class="text-center">Regisztráljon most!</h5>
                        <div>
                            <?php echo $show; ?>
                        </div>
                        
                    <form method="post">
                        <div class="form-group mt-3">
                            <label>Vezetéknév:</label>
                            <input type="text" name="surname" class="form-control" autocomplete="off"
                                placeholder="Írja be a vezetéknevét">
                                <?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>
                           
                        </div>
                        <div class="form-group mt-3">
                            <label>Keresztnév:</label>
                            <input type="text" name="firstname" class="form-control" autocomplete="off"
                                placeholder="Írja be a keresztnevét">
                                <?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>
                              
                        </div>
                        <div class="form-group mt-3">
                            <label>Felhasználónév:</label>
                            <input type="text" name="username" class="form-control" autocomplete="off"
                                placeholder="Írja be választott felhasználónevét">
                                <?php if(isset($_POST['username'])) echo $_POST['username']; ?>
                               
                        </div>
                        <div class="form-group mt-3">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" autocomplete="off"
                                placeholder="Írja be az emailcímét">
                                <?php if(isset($_POST['email'])) echo $_POST['email']; ?>
                                
                        </div>
                        <div class="form-group mt-3">
                            <label>Neme:</label>
                            <select name="gender" class="form-control">
                                <option value=""></option>
                                <option value="Nő">Nő</option>
                                <option value="Férfi">Férfi</option>
                            </select>
                            
                        </div>
                        <div class="form-group mt-3">
                            <label>Telefonszám:</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off"
                                placeholder="Adja meg telefonszámát">
                              
                        </div>

                        <div class="form-group mt-3">
                            <label>Ország:</label>
                            <select name="country" class="form-control">
                                <option></option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua & Barbuda</option>
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
                                <option value="BQ">Caribbean Netherlands</option>
                                <option value="BA">Bosnia & Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei</option>
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
                                <option value="CG">Congo - Brazzaville</option>
                                <option value="CD">Congo - Kinshasa</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Côte d’Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czechia</option>
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
                                <option value="FK">Falkland Islands (Islas Malvinas)</option>
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
                                <option value="HM">Heard & McDonald Islands</option>
                                <option value="VA">Vatican City</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran</option>
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
                                <option value="KP">North Korea</option>
                                <option value="KR">South Korea</option>
                                <option value="XK">Kosovo</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Laos</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">North Macedonia</option>
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
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldova</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar (Burma)</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="AN">Curaçao</option>
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
                                <option value="PS">Palestine</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn Islands</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russia</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">St. Barthélemy</option>
                                <option value="SH">St. Helena</option>
                                <option value="KN">St. Kitts & Nevis</option>
                                <option value="LC">St. Lucia</option>
                                <option value="MF">St. Martin</option>
                                <option value="PM">St. Pierre & Miquelon</option>
                                <option value="VC">St. Vincent & Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">São Tomé & Príncipe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="CS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia & South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard & Jan Mayen</option>
                                <option value="SZ">Eswatini</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syria</option>
                                <option value="TW">Taiwan</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad & Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks & Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">U.S. Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="VG">British Virgin Islands</option>
                                <option value="VI">U.S. Virgin Islands</option>
                                <option value="WF">Wallis & Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                           

                        </div>

                        <div class="form-group mt-3">
                            <label>Jelszó:</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off"
                                placeholder="Adja meg választott jelszavát">
                               
                        </div>

                        <div class="form-group mt-3">
                            <label>Jelszó megerősítése:</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off"
                                placeholder="Írja be mégegyszer">
                               
                        </div>

                        <input type="submit" name="account" value="Regisztráljon most!" class="btn btn-success mt-3">

                        <p class="mt-2">Már van felhasználói fiókja <a href="patientlogin.php">Kattintson ide!</a></p>


                    </form>

                  
                </div>
                <div class="col-md-3"></div>

            </div>
        </div>



    </div>
</body>
</html>