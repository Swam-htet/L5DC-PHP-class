<?php
session_start();

$session_user = $_SESSION['session_user'];

// session counter 
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

//  connection and connection check 
include "./config/config.php";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}




// component import 
include_once "./component/header.php";
include_once './component/navbar.php';
include_once "./component/here.php";
include_once "./component/viewCounter.php";


?>
<?php

// list for navbar 
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),

);

// current tab
$current_tab = "Policy";


// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>

<div class='container'>
    <div class='card'>
        <h2 class='m-b-3'>Privacy Policy for GWSC</h2>

        <p class='m-b-2'>At localhost:3001, accessible from localhost:3001, one of our main priorities is the privacy of our visitors. This
            Privacy Policy document contains types of information that is collected and recorded by localhost:3001 and how we
            use it.</p>

        <p class='m-b-2'>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.
        </p>

        <p class='m-b-2'>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to
            the information that they shared and/or collect in localhost:3001. This policy is not applicable to any information
            collected offline or via channels other than this website.</p>


    </div>

    <div class="card">
        <h3 class='m-b-3'>Consent</h3>

        <p class='m-b-2'>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>
    </div>
    <div class="card">
        <h3 class='m-b-3'>Information we collect</h3>

        <p class='m-b-2'>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made
            clear to you at the point we ask you to provide your personal information.</p>
        <p class='m-b-2'>If you contact us directly, we may receive additional information about you such as your name, email address, phone
            number, the contents of the message and/or attachments you may send us, and any other information you may choose to
            provide.</p>
        <p class='m-b-2'>When you register for an Account, we may ask for your contact information, including items such as name, company
            name, address, email address, and telephone number.</p>
    </div>
    <div class="card">
        <h3 class='m-b-3'>How we use your information</h3>

        <p class='m-b-2'>We use the information we collect in various ways, including to:</p>

        <ul class='m-b-2'>
            <li>Provide, operate, and maintain our website</li>
            <li>Improve, personalize, and expand our website</li>
            <li>Understand and analyze how you use our website</li>
            <li>Develop new products, services, features, and functionality</li>
            <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide
                you with updates and other information relating to the website, and for marketing and promotional purposes</li>
            <li>Send you emails</li>
            <li>Find and prevent fraud</li>
        </ul>
    </div>
    <div class="card">

        <h3 class='m-b-3'>Log Files</h3>

        <p class='m-b-2'>localhost:3001 follows a standard procedure of using log files. These files log visitors when they visit websites.
            All hosting companies do this and a part of hosting services' analytics. The information collected by log files
            include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp,
            referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally
            identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users'
            movement on the website, and gathering demographic information.</p>
    </div>
    <div class="card">
        <h3 class='m-b-3'>Cookies and Web Beacons</h3>

        <p class='m-b-2'>Like any other website, localhost:3001 uses "cookies". These cookies are used to store information including
            visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to
            optimize the users' experience by customizing our web page content based on visitors' browser type and/or other
            information.</p>
    </div>
    <div class="card">

        <h3 class='m-b-3'>Google DoubleClick DART Cookie</h3>

        <p class='m-b-2'>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our
            site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may
            choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the
            following URL – <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>
    </div>
    <div class="card">
        <h3 class='m-b-3'>Advertising Partners Privacy Policies</h3>

        <P class='m-b-2'>You may consult this list to find the Privacy Policy for each of the advertising partners of localhost:3001.</p>

        <p class='m-b-2'>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in
            their respective advertisements and links that appear on localhost:3001, which are sent directly to users' browser.
            They automatically receive your IP address when this occurs. These technologies are used to measure the
            effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites
            that you visit.</p>

        <p class='m-b-2'>Note that localhost:3001 has no access to or control over these cookies that are used by third-party advertisers.</p>

    </div>
    <div class="card">

        <h3 class='m-b-3'>Third Party Privacy Policies</h3>

        <p class='m-b-2'>localhost:3001's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult
            the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their
            practices and instructions about how to opt-out of certain options. </p>

        <p class='m-b-2'>You can choose to disable cookies through your individual browser options. To know more detailed information about
            cookie management with specific web browsers, it can be found at the browsers' respective websites.</p>
    </div>
    <div class="card">


        <h3 class='m-b-3'>CCPA Privacy Rights (Do Not Sell My Personal Information)</h3>

        <p class='m-b-2'>Under the CCPA, among other rights, California consumers have the right to:</p>
        <p class='m-b-2'>Request that a business that collects a consumer's personal data disclose the categories and specific pieces of
            personal data that a business has collected about consumers.</p>
        <p class='m-b-2'>Request that a business delete any personal data about the consumer that a business has collected.</p>
        <p class='m-b-2'>Request that a business that sells a consumer's personal data, not sell the consumer's personal data.</p>
        <p class='m-b-2'>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please
            contact us.</p>
    </div>
    <div class="card">
        <h3 class='m-b-3'>GDPR Data Protection Rights</h3>

        <p class='m-b-2'>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the
            following:</p>
        <p class='m-b-2'>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for
            this service.</p>
        <p class='m-b-2'>The right to rectification – You have the right to request that we correct any information you believe is inaccurate.
            You also have the right to request that we complete the information you believe is incomplete.</p>
        <p class='m-b-2'>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</p>
        <p class='m-b-2'>The right to restrict processing – You have the right to request that we restrict the processing of your personal
            data, under certain conditions.</p>
        <p class='m-b-2'>The right to object to processing – You have the right to object to our processing of your personal data, under
            certain conditions.</p>
        <p class='m-b-2'>The right to data portability – You have the right to request that we transfer the data that we have collected to
            another organization, or directly to you, under certain conditions.</p>
        <p class='m-b-2'>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please
            contact us.</p>
    </div>
    <div class="card">


        <h3 class='m-b-3'>Children's Information</h3>

        <p class='m-b-2'>Another part of our priority is adding protection for children while using the internet. We encourage parents and
            guardians to observe, participate in, and/or monitor and guide their online activity.</p>

        <p class='m-b-2'>localhost:3001 does not knowingly collect any Personal Identifiable Information from children under the age of 13. If
            you think that your child provided this kind of information on our website, we strongly encourage you to contact us
            immediately and we will do our best efforts to promptly remove such information from our records.</p>
    </div>
    <div class="card">
        <h3 class='m-b-3'>Changes to This Privacy Policy</h3>

        <p class='m-b-2'>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any
            changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are
            effective immediately, after they are posted on this page.</p>

        <p class='m-b-2'>Our Privacy Policy was created with the help of the <a href="https://www.termsfeed.com/privacy-policy-generator/">Privacy Policy Generator</a>.</p>
    </div>

    <div class="card">

        <h3 class='m-b-3'>Contact Us</h3>

        <p class='m-b-2'>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.</p>


    </div>

</div>


<?php
view_counter($connection);

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>