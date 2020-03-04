<?php
include 'top.php';

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security


$thisURL = $domain . $phpSelf;


//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables

$firstName = "";

$lastName = "";

$gender = "Male";

$age = "Under 18";

$region = "";

$email = "youremail@uvm.edu";

$comments = "Leave a comment for us.";

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags

$firstNameERROR = false;

$lastNameERROR = false;

$genderERROR = false;

$ageERROR = false;

$donate = false;
$hostFundraiser = false;
$MakePhoneCalls = false;
$PassOutFlyers = false;

$activityERROR = false;
$totalChecked = 0;

$regionERROR = false;

$emailERROR = false;

$commentsERROR = false;

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables

$errorMsg = array();

$dataRecord = array();

$mailed = false;

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is subitted
//
if (isset($_POST["btnSubmit"])) {

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2a Security
    //
    if (!securityCheck($thisURL)) {
        $msg = '<p>Sorry you cannot accsess this page. ';
        $msg .= 'Security breach detected and reported.</p>';
        die($msg);
    }


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    //SECTION 2b Sanitize (clean) data
    
    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $firstName;

    $lastName = htmlentities($_POST["txtLastName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $lastName;

    $gender = htmlentities($_POST["radGender"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $gender;

    $age = htmlentities($_POST["radAge"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $age;
    
    if (isset($_POST["chkdonate"])) {
        $donate = true;
        $totalChecked++;
    } else {
        $donate = false;
    }
    $dataRecord[] = $donate;

    if (isset($_POST["chkhostFundraiser"])) {
        $hostFundraiser = true;
        $totalChecked++;
    } else {
        $hostFundraiser = false;
    }
    $dataRecord[] = $hostFundraiser;

    if (isset($_POST["chkmakePhoneCalls"])) {
        $MakePhoneCalls = true;
        $totalChecked++;
    } else {
        $MakePhoneCalls = false;
    }
    $dataRecord[] = $MakePhoneCalls;

    if (isset($_POST["chkpassOutFlyers"])) {
        $PassOutFlyers = true;
        $totalChecked++;
    } else {
        $PassOutFlyers = false;
    }
    $dataRecord[] = $PassOutFlyers;

    $region = htmlentities($_POST["regionLived"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $region;

    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $email;

    $comments = htmlentities($_POST["txtComments"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $comments;


    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c Validtion 
    //

    if ($firstName == "") {
        $errorMsg[] = "Please enter your first name.";
        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($firstName)) {
        $errorMsg[] = "Your first name appears to have an extra character.";
        $firstNameERROR = true;
    }

    if ($lastName == "") {
        $errorMsg[] = "Please enter your last name.";
        $lastNameERROR = true;
    } elseif (!verifyAlphaNum($lastName)) {
        $errorMsg[] = "Your last name appears to have an extra character.";
        $lastNameERROR = true;
    }

    if ($gender != "Male" AND $gender != "Female") {
        $errorMsg[] = "Please choose a gender.";
        $genderERROR = true;
    }
    
    if ($age != "Under 18" AND $age != "18-64" AND $age != "65+") {
        $errorMsg[] = "Please choose an age.";
        $ageERROR = true;
    }

    if ($totalChecked < 1) {
        $errorMsg[] = "Please choose at least one activity.";
        $activityERROR = true;
    }

    if ($region == "" or $region == "Select a Region") {
        $errorMsg[] = "Please select a region.";
        $regionERROR = true;
    }

    if ($email == "" or $email == "youremail@uvm.edu") {
        $errorMsg[] = 'Please enter your email address.';
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = 'Your email address appears to be incorrect.';
        $emailERROR = true;
    }

    if ($comments != "") {
        if (!verifyAlphaNum($comments)) {
            $errorMsg[] = "Your comments appear to have extra characters that are not allowed.";
            $commentsERROR = true;
        }
    }

    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d Process Form - Passed Validation
    //
    if (!$errorMsg) {
        if ($debug)
            print PHP_EOL . '<p>Form is valid</p>';




        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
   // SECTION: 2e Save Data
        //
   // This block saves the data to a CSV file
        $myFolder = '../data/';

        $myFileName = 'registration';

        $fileExt = '.csv';

        $filename = $myFolder . $myFileName . $fileExt;
        if ($debug)
            print PHP_EOL . '<p>filename is ' . $filename;

        // now we just open the file for append
        $file = fopen($filename, 'a');

        // write the forms informations
        fputcsv($file, $dataRecord);

        // close the file
        fclose($file);

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
   // SECTION: 2f Create message
        //
        $message = '<h2>Your information:</h2>';

        foreach ($_POST as $htmlName => $value) {

            $message .= '<p>';
            
            $camelCase = preg_split('/(?=[A-Z])/', substr($htmlName, 3));

            foreach ($camelCase as $oneWord) {
                $message .= $oneWord . ' ';
            }

            $message .= ' = ' . htmlentities($value, ENT_QUOTES, "UTF-8") . '</p>';
        }

        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
   // SECTION: 2g Mail to user
        //
   
        $to = $email; // the pserson who filled out the form
        $cc = '';
        $bcc = '';

        $from = 'customer.service@helprefugees.com';

        // sunject of main should make sense to your form 
        $subject = 'Helping Refugees: ';

        $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);
    } // end if form is valid 
} // ends if from was submitted 
//#############################################################################
//
// SECTION: 3 Display form
//
?>

<article id="main">

    <?php
//#############################################################################
//
// SECTION: 3a.
//

    if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { //closing if marked with: end body submit 
        print '<h2>Thank you for providing your information.</h2>';

        print '<p>For your records a copy of this data has ';

        if (!$mailed) {
            print "not ";
        }


        print 'been sent: </p>';
        print '<p> To: ' . $email . '</p>';

        print $message;
    } else {


        print '';

        //#########################################################################
        //
    // SECTION: 3b Error Messages
        //


        if ($errorMsg) {
            print '<div id="errors">' . PHP_EOL;
            print '<h2>Your form has the following mistakes that need to be fixed.</h2>' . PHP_EOL;
            print '<ol>' . PHP_EOL;

            foreach ($errorMsg as $err) {
                print '<li>' . $err . '</li>' . PHP_EOL;
            }
            print '</ol>' . PHP_EOL;
            print '</div>' . PHP_EOL;
        }


        //#########################################################################
        //
    // SECTION: 3c html Form
        //
        ?>

        
        <form class="contact" action="<?php print $phpSelf; ?>"
              id="frmRegistar"
              method="post">


            <h1>Volunteer Today!</h1>


            <fieldset id="info">
                <legend class="legend">Your Information</legend>
                <p class="first">
                 <label class="required description" for="txtFirstName">First Name</label>
                    <input autofocus
                    <?php if ($firstNameERROR) print 'class="mistake"'; ?>
                           id="txtFirstName"
                           maxlength="45"
                           name="txtFirstName"
                           onfocus="this.select()"
                           placeholder="Enter your first name"
                           tabindex="100"
                           type="text"
                           value="<?php print $firstName; ?>"
                           >
                </p>

                <p class="last">
                    <label class="required description">Last Name</label>
                    <input 
                    <?php if ($lastNameERROR) print 'class="mistake"'; ?>
                           id="txtlastName"
                           maxlength="45"
                           name="txtLastName"
                           onfocus="this.select()"
                           placeholder="Enter your last name"
                           tabindex="200"
                           type="text"
                           value="<?php print $lastName; ?>"
                           >
                </p>
                
                <p class="email">
                   <label class="required email_description" for="txtEmail">Email</label> 
                    <input
                        <?php if ($emailERROR) print 'class="mistake"'; ?>
                        id="txtEmail"
                        maxlength="45"
                        name="txtEmail"
                        onfocus="this.select()"
                        placeholder="Enter a valid email adress"
                        tabindex="250"
                        type="text"
                        value="<?php print $email; ?>">
                </p>
            </fieldset>


            <fieldset class="<?php if ($genderERROR) print ' mistake'; ?>">
                <legend class="legend required radio">Gender</legend>   
                <p class="left">
                    <label class="radio-field">
                        <input
                            type="radio"
                            id="radGenderMale"
                            name="radGender"
                            value="Male"
                            tabindex="300"
                            <?php if ($gender == "Male") print ' checked="checked" '; ?>>Male</label>
                </p>
                
                <p class="left">
                    <label class="radio-field" >
                        <input
                            type="radio"
                            id="radGenderFemale"
                            name="radGender"
                            value="Female"
                            tabindex="400"
                            <?php if ($gender == "Female") print ' checked="checked" '; ?>>Female</label>
                </p>
            </fieldset>
            
            <fieldset class=" <?php if ($ageERROR) print ' mistake'; ?>">
                <legend class="legend required radio">Age</legend>    
                <p class="left">
                    <label class="radio-field">
                        <input
                            type="radio"
                            id="radAgeUnder18"
                            name="radAge"
                            value="Under 18"
                            tabindex="500"
                            <?php if ($age == "Under 18") print ' checked="checked" '; ?>>Under 18</label>
                </p>
               
                <p class="left">
                    <label class="radio-field">
                        <input
                            type="radio"
                            id="rad18-64"
                            name="radAge"
                            value="18-64"                            
                            tabindex="600"
                            <?php if ($age == "18-64") print ' checked="checked" '; ?>>18-64</label>
                </p>
                
                <p class="left">
                    <label class="radio-field">
                        <input
                            type="radio"
                            id="rad65+"
                            name="radAge"
                            value="65+"
                            tabindex="700"
                            <?php if ($age == "65+") print ' checked="checked" '; ?>>65+</label>
                </p>
            </fieldset>

            <fieldset class="checkbox <?php if ($activityERROR) print ' mistake'; ?>">
                <legend class="legend">How would you be willing to help?</legend>

                <p class="left">
                    <label class="check-field">
                        <input <?php if ($donate) print " checked "; ?>
                            id="chkdonate"
                            name="chkdonate"
                            tabindex="800"
                            type="checkbox"
                            value="Donate">Donate</label>
                </p>

                <p class="left">
                    <label class="check-field">
                        <input <?php if ($hostFundraiser) print " checked "; ?>
                            id="chkhostFundraiser"
                            name="chkhostFundraiser"
                            tabindex="900"
                            type="checkbox"
                            value="hostFundraiser">Host Fundraiser</label>
                </p>  

                <p class="left">
                    <label class="check-field">
                        <input <?php if ($MakePhoneCalls) print " checked "; ?>
                            id="chkmakePhoneCalls"
                            name="chkmakePhoneCalls"
                            tabindex="1000"
                            type="checkbox"
                            value="makePhoneCalls">Make Phone Calls</label>
                </p>  

                <p class="left">
                    <label class="check-field">
                        <input <?php if ($PassOutFlyers) print " checked "; ?>
                            id="chkpassOutFlyers"
                            name="chkpassOutFlyers"
                            tabindex="1100"
                            type="checkbox"
                            value="passOutFlyers">Pass Out Flyers</label>
                </p>  
            </fieldset>

            <fieldset  class="listbox <?php if ($regionERROR) print ' mistake'; ?>">
                <legend class="legend">US Region of Residence</legend>
                <p class="dropdown">
                <select id="regionLived" 
                        name="regionLived" 
                        tabindex="1200" >
                    <option <?php if ($region == "Select a Region") print " selected "; ?>
                        value="Select a Region">Select a Region</option>
                    
                    <option <?php if ($region == "North East") print " selected "; ?>
                        value="North East">North East</option>

                    <option <?php if ($region == "South East") print " selected "; ?>
                        value="South East">South East</option>

                    <option <?php if ($region == "Mid West") print " selected "; ?>
                        value="Mid West">Mid West</option>

                    <option <?php if ($region == "South West") print " selected "; ?>
                        value="South West">South West</option>

                    <option <?php if ($region == "West") print " selected "; ?>
                        value="West">West</option>
                </select>
                </p>
            </fieldset>    

            <fieldset class="textarea <?php if ($commentsERROR) print ' mistake'; ?>">
                <legend class="legend">Comments</legend>
                <p class="comments_p">
                    <label  class="required" for="txtComments"></label>
                    <textarea class="comments" 
                              id="txtComments" 
                              name="txtComments" 
                              onfocus="this.select()" 
                              tabindex="1400"><?php print $comments; ?></textarea>
                </p>
            </fieldset>
            <!-- Start Submit button -->
            <fieldset class="buttons">
                <legend class="legend">Submit</legend>
                <input 
                    class="button" 
                    id="btnSubmit" 
                    name="btnSubmit" 
                    tabindex="1500" 
                    type="submit" 
                    value="Submit">
                
            </fieldset> <!-- ends submit button -->

        </form>

        <?php
    } //end body submit
    ?>    

</article>

<?php include 'footer.php'; ?>

</body>
</html>
