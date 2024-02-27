<?php
require_once('google-recaptcha-library.php');

if (isset($_POST['email'])) {
    $email_to = "nate@natebarlow.me";
    $form_error = false;

    function problem($error)
    {
        echo "<div class='error'>ERROR: " . $error . "</div>";
        return true;
    }

    // validation expected data exists
    if (!isset($_POST['firstName']) ||
        !isset($_POST['lastName']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message']) ) {
        $form_error = problem("I'm sorry. There appears to be a problem with the form you submitted.");
    }

    $firstName = $_POST['firstName']; // required
    $lastName = $_POST['lastName']; // required
    $email = $_POST['email']; // required
    $budget = $_POST['budget'];
    $subject = $_POST['subject']; // required
    $message = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message .= 'The email address you entered does not appear to be valid. ';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The message you entered do not appear to be valid. ';
    }

    if (strlen($error_message) > 0) {
        $form_error = problem($error_message);
    }

    //Place results of g_recaptcha_request() in $g_recaptcha_response
    $g_recaptcha_response = g_recaptcha_request();
    if (!$g_recaptcha_response->success) {
        $form_error = problem("I'm sorry, you failed the reCAPTCHA. ");
    }

    $email_message = "New website form response:\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_subject = clean_string($subject);

    $email_message .= "Name: " . clean_string($firstName) . " " . clean_string($lastName) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    if($budget) {
        $email_message .= "Budget: $" . clean_string($budget) . "\n";
    }
    $email_message .= "Subject: " . clean_string($subject) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . 'nate@natebarlow.me' . "\r\n" .
        'Reply-To: ' . clean_string($email) . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if($form_error == false) {
        $mail = wp_mail($email_to, $email_subject, $email_message, $headers);
        echo "<div class='success'>Form submitted successfully!<br>I'll get back to you within a week.</div>";
    } else {
        echo "
            <script>
                document.onreadystatechange = function() {
                    document.getElementById('firstName').value = '" . htmlspecialchars($firstName) . "';
                    document.getElementById('lastName').value = '" . htmlspecialchars($lastName) . "';
                    document.getElementById('email').value = '" . htmlspecialchars($email) . "';
                    document.getElementById('budget').value = '" . htmlspecialchars($budget) . "';
                    document.getElementById('subject').value = '" . htmlspecialchars($subject) . "';
                    document.getElementById('message').value = '" . htmlspecialchars($message) . "';
                }
            </script>";
    }
}
?>

<form class="form-contact grid grid-2" method="post" action="#">
    <label>
        <input id="firstName" name="firstName" type="text" autocomplete="given-name" required placeholder=" ">
        <p class="fancy-placeholder">First Name</p>
    </label>

    <label>
        <input id="lastName" name="lastName" type="text" autocomplete="family-name" required placeholder=" ">
        <p class="fancy-placeholder">Last Name</p>
    </label>

    <label class="form-full-width" for="budget">
        <select name="budget" id="budget">
            <option value="">What is your budget?</option>
            <option value="500">$500</option>
            <option value="1000">$1000</option>
            <option value="1500">$1500</option>
            <option value="2000">$2000+</option>
        </select>
    </label>

    <label class="form-full-width">
        <input id="email" name="email"  type="email" autocomplete="email" required placeholder=" ">
        <p class="fancy-placeholder">Email</p>
    </label>

    <label class="form-full-width">
        <input id="subject" name="subject" type="text" required placeholder=" ">
        <p class="fancy-placeholder">Subject</p>
    </label>

    <label class="form-full-width">
        <textarea name="message" id="message" cols="30" rows="10" required placeholder=" "></textarea>
        <p class="fancy-placeholder">Message</p>
    </label>

    <label class="form-full-width">
        <?php echo g_recaptcha_get_form_control(); ?>
    </label>

    <input type="submit" class="button form-full-width">
</form>

<script src="https://www.google.com/recaptcha/api.js"></script>