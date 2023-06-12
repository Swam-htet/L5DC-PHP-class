<?php

// session check
session_start();
$session_user = $_SESSION['session_user'];

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';

// connection and connection check
include "./config/config.php";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

?>

<?php

//  list for navbar 
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),


);

// current tab 
$current_tab = "Camp";

// header
header_function($current_tab);

// navbar 
navbar_function($list);
?>

<?php

if (isset($_POST['submit'])) {

    if ($session_user === "Admin") {

        $tbName = "camp";

        $data = json_decode(json_encode($_POST), false);

        $slideshow = $_FILES['slideshow']['name'];
        $profile = $_FILES['profile']['name'];

        $slideshow_path = "src/photo/" . $slideshow;
        $profile_path = "src/photo/" . $profile;



        $sql = "INSERT INTO $tbName (name,address,location,features,country,phone,no_premium,no_improved,no_standard,slideShow,profile) VALUES('$data->name','$data->address','$data->location','$data->features','$data->country','$data->phone','$data->premium','$data->improved','$data->standard','$slideshow_path','$profile_path')";

        if ($connection->query($sql)) {
            echo "<div class='alert alert-success'>Camp registration is successful.</div>";
        } else {
            echo "<div class='alert alert-danger'>$connection->error</div>";
        }
    } else {
        echo "<div class='container'>
            <h3>Admin User Only Page.</h3>
        </div>";
    }
}

?>


<?php

if ($session_user == "Admin") {

?>
    <div class="container">
        <h1>Camp Register</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

            <div>
                <label for="name" class="form-text">Name : </label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div>
                <label for="location" class="form-text">Location : </label>
                <input type="text" name="location" id="location" class="form-control">
            </div>
            <div>
                <label for="address" class="form-text">Address : </label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            <div>
                <label for="features" class="form-text">Features : </label>
                <input type="text" name="features" id="features" class="form-control">
            </div>
            <div>
                <label for="phone" class="form-text">Phone : </label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div>
                <label for="number" class="form-text">Number of Premium Pitch : </label>
                <input type="number" min="0" value="0" name="premium" id="premium" class="form-control">
            </div>
            <div>
                <label for="number" class="form-text">Number of Improved Pitch : </label>
                <input type="number" min="0" value="0" name="improved" id="improved" class="form-control">
            </div>
            <div>
                <label for="number" class="form-text">Number of Standard Pitch : </label>
                <input type="number" min="0" value="0" name="standard" id="standard" class="form-control">
            </div>
            <div><label>Country : </label>
                <select name="country">
                    <option>Choose your country</option>
                    <?php
                    $country_list = array(
                        "AF" => "Afghanistan",  "AX" => "Aland Islands",    "AL" => "Albania",  "DZ" => "Algeria",  "AS" => "American Samoa",   "AD" => "Andorra",  "AO" => "Angola",   "AI" => "Anguilla", "AQ" => "Antarctica",   "AG" => "Antigua and Barbuda",  "AR" => "Argentina",    "AM" => "Armenia",  "AW" => "Aruba",    "AU" => "Australia",    "AT" => "Austria",  "AZ" => "Azerbaijan",   "BS" => "Bahamas",  "BH" => "Bahrain",  "BD" => "Bangladesh",   "BB" => "Barbados", "BY" => "Belarus",  "BE" => "Belgium",  "BZ" => "Belize",   "BJ" => "Benin",    "BM" => "Bermuda",  "BT" => "Bhutan",   "BO" => "Bolivia",  "BQ" => "Bonaire, Sint Eustatius and Saba", "BA" => "Bosnia and Herzegovina",   "BW" => "Botswana", "BV" => "Bouvet Island",    "BR" => "Brazil",   "IO" => "British Indian Ocean Territory",   "BN" => "Brunei Darussalam",    "BG" => "Bulgaria", "BF" => "Burkina Faso", "BI" => "Burundi",  "KH" => "Cambodia", "CM" => "Cameroon", "CA" => "Canada",   "CV" => "Cape Verde",   "KY" => "Cayman Islands",   "CF" => "Central African Republic", "TD" => "Chad", "CL" => "Chile",    "CN" => "China",    "CX" => "Christmas Island", "CC" => "Cocos (Keeling) Islands",  "CO" => "Colombia", "KM" => "Comoros",  "CG" => "Congo",    "CD" => "Congo, Democratic Republic of the Congo",  "CK" => "Cook Islands", "CR" => "Costa Rica",   "CI" => "Cote D'Ivoire",    "HR" => "Croatia",  "CU" => "Cuba", "CW" => "Curacao",  "CY" => "Cyprus",   "CZ" => "Czech Republic",   "DK" => "Denmark",  "DJ" => "Djibouti", "DM" => "Dominica", "DO" => "Dominican Republic",   "EC" => "Ecuador",  "EG" => "Egypt",    "SV" => "El Salvador",  "GQ" => "Equatorial Guinea",    "ER" => "Eritrea",  "EE" => "Estonia",  "ET" => "Ethiopia", "FK" => "Falkland Islands (Malvinas)",  "FO" => "Faroe Islands",    "FJ" => "Fiji", "FI" => "Finland",  "FR" => "France",   "GF" => "French Guiana",    "PF" => "French Polynesia", "TF" => "French Southern Territories",  "GA" => "Gabon",    "GM" => "Gambia",   "GE" => "Georgia",  "DE" => "Germany",  "GH" => "Ghana",    "GI" => "Gibraltar",    "GR" => "Greece",   "GL" => "Greenland",    "GD" => "Grenada",  "GP" => "Guadeloupe",   "GU" => "Guam", "GT" => "Guatemala",    "GG" => "Guernsey", "GN" => "Guinea",   "GW" => "Guinea-Bissau",    "GY" => "Guyana",   "HT" => "Haiti",    "HM" => "Heard Island and McDonald Islands",    "VA" => "Holy See (Vatican City State)",    "HN" => "Honduras", "HK" => "Hong Kong",    "HU" => "Hungary",  "IS" => "Iceland",  "IN" => "India",    "ID" => "Indonesia",    "IR" => "Iran, Islamic Republic of",    "IQ" => "Iraq", "IE" => "Ireland",  "IM" => "Isle of Man",  "IL" => "Israel",   "IT" => "Italy",    "JM" => "Jamaica",  "JP" => "Japan",    "JE" => "Jersey",   "JO" => "Jordan",   "KZ" => "Kazakhstan",   "KE" => "Kenya",    "KI" => "Kiribati", "KP" => "Korea, Democratic People's Republic of",   "KR" => "Korea, Republic of",   "XK" => "Kosovo",   "KW" => "Kuwait",   "KG" => "Kyrgyzstan",   "LA" => "Lao People's Democratic Republic", "LV" => "Latvia",   "LB" => "Lebanon",  "LS" => "Lesotho",  "LR" => "Liberia",  "LY" => "Libyan Arab Jamahiriya",   "LI" => "Liechtenstein",    "LT" => "Lithuania",    "LU" => "Luxembourg",   "MO" => "Macao",    "MK" => "Macedonia, the Former Yugoslav Republic of",   "MG" => "Madagascar",   "MW" => "Malawi",   "MY" => "Malaysia", "MV" => "Maldives", "ML" => "Mali", "MT" => "Malta",    "MH" => "Marshall Islands", "MQ" => "Martinique",   "MR" => "Mauritania",   "MU" => "Mauritius",    "YT" => "Mayotte",  "MX" => "Mexico",   "FM" => "Micronesia, Federated States of",  "MD" => "Moldova, Republic of", "MC" => "Monaco",   "MN" => "Mongolia", "ME" => "Montenegro",   "MS" => "Montserrat",   "MA" => "Morocco",  "MZ" => "Mozambique",   "MM" => "Myanmar",  "NA" => "Namibia",  "NR" => "Nauru",    "NP" => "Nepal",    "NL" => "Netherlands",  "AN" => "Netherlands Antilles", "NC" => "New Caledonia",    "NZ" => "New Zealand",  "NI" => "Nicaragua",    "NE" => "Niger",    "NG" => "Nigeria",  "NU" => "Niue", "NF" => "Norfolk Island",   "MP" => "Northern Mariana Islands", "NO" => "Norway",   "OM" => "Oman", "PK" => "Pakistan", "PW" => "Palau",    "PS" => "Palestinian Territory, Occupied",  "PA" => "Panama",   "PG" => "Papua New Guinea", "PY" => "Paraguay", "PE" => "Peru", "PH" => "Philippines",  "PN" => "Pitcairn", "PL" => "Poland",   "PT" => "Portugal", "PR" => "Puerto Rico",  "QA" => "Qatar",    "RE" => "Reunion",  "RO" => "Romania",  "RU" => "Russian Federation",   "RW" => "Rwanda",   "BL" => "Saint Barthelemy", "SH" => "Saint Helena", "KN" => "Saint Kitts and Nevis",    "LC" => "Saint Lucia",  "MF" => "Saint Martin", "PM" => "Saint Pierre and Miquelon",    "VC" => "Saint Vincent and the Grenadines", "WS" => "Samoa",    "SM" => "San Marino",   "ST" => "Sao Tome and Principe",    "SA" => "Saudi Arabia", "SN" => "Senegal",  "RS" => "Serbia",   "CS" => "Serbia and Montenegro",    "SC" => "Seychelles",   "SL" => "Sierra Leone", "SG" => "Singapore",    "SX" => "St Martin",    "SK" => "Slovakia", "SI" => "Slovenia", "SB" => "Solomon Islands",  "SO" => "Somalia",  "ZA" => "South Africa", "GS" => "South Georgia and the South Sandwich Islands", "SS" => "South Sudan",  "ES" => "Spain",    "LK" => "Sri Lanka",    "SD" => "Sudan",    "SR" => "Suriname", "SJ" => "Svalbard and Jan Mayen",   "SZ" => "Swaziland",    "SE" => "Sweden",   "CH" => "Switzerland",  "SY" => "Syrian Arab Republic", "TW" => "Taiwan, Province of China",    "TJ" => "Tajikistan",   "TZ" => "Tanzania, United Republic of", "TH" => "Thailand", "TL" => "Timor-Leste",  "TG" => "Togo", "TK" => "Tokelau",  "TO" => "Tonga",    "TT" => "Trinidad and Tobago",  "TN" => "Tunisia",  "TR" => "Turkey",   "TM" => "Turkmenistan", "TC" => "Turks and Caicos Islands", "TV" => "Tuvalu",   "UG" => "Uganda",   "UA" => "Ukraine",  "AE" => "United Arab Emirates", "GB" => "United Kingdom",   "US" => "United States",    "UM" => "United States Minor Outlying Islands", "UY" => "Uruguay",  "UZ" => "Uzbekistan",   "VU" => "Vanuatu",  "VE" => "Venezuela",    "VN" => "Viet Nam", "VG" => "Virgin Islands, British",  "VI" => "Virgin Islands, U.s.", "WF" => "Wallis and Futuna",    "EH" => "Western Sahara",   "YE" => "Yemen",    "ZM" => "Zambia",   "ZW" => "Zimbabwe"
                    );

                    foreach ($country_list as $v) {
                        echo "<option>$v</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="slideshow">Photo for Slide Show : </label>
                <input type="file" name="slideshow" id="slideshow">
            </div>

            <div>
                <label for="profile">Photo for Profile Photo : </label>
                <input type="file" name="profile" id="profile">
            </div>


            <button type="submit" name='submit'>Create Camp</button>

        </form>
    </div>
<?php
} else {
    echo "<div class='containerc'>Admin User Only Page.</div>";
}
?>

<?php
// footer 
include_once "./component/footer.php";
?>