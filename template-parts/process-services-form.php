<?php
if (isset($_POST['service'])) {
   // Ensure the form was submitted with POST method

   // Retrieve values from the form
   $service = isset($_POST['service']) ? sanitize_text_field($_POST['service']) : '';
   $pages = isset($_POST['pages']) ? sanitize_text_field($_POST['pages']) : '';
   $features_array = isset($_POST['features']) ? array_map('sanitize_text_field', $_POST['features']) : '';
   $features = implode(', ', $features_array);
   $price = isset($_POST['price']) ? sanitize_text_field($_POST['price']) : '';
   $user_name = isset($_POST['user_name']) ? sanitize_text_field($_POST['user_name']) : '';
   $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
   $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

   if($pages == "custom pages") {
      $pages = isset($_POST['custom_pages']) ? sanitize_text_field($_POST['custom_pages']) : '';
   }

   if(strpos($features, "custom features")) {
      $customFeatures = isset($_POST['custom_features']) ? sanitize_text_field($_POST['custom_features']) : '';
   }

   function clean_string($string) {
      $bad = array("content-type", "bcc:", "to:", "cc:", "href");
      return str_replace($bad, "", $string);
   }

   $to = 'nate@natebarlow.me';
   $subject = 'Somebody Wants a Website!';
   $body = "Name: " . clean_string($user_name) . "<br>";
   $body .= "Email: " . clean_string($email) . "<br>";
   $body .= "Message: <br>" . nl2br(clean_string($message)) . "<br><br>";
   $body .= "Service: " . clean_string($service) . "<br>";
   $body .= "Pages: " . clean_string($pages) . "<br>";
   $body .= "Features: " . clean_string($features) . "<br>";
   if($customFeatures) {
      $body .= "Custom Features: " . clean_string($customFeatures) . "<br>";
   }
   $body .= "Price: " . clean_string($price) . "<br>";

   $headers = array('Content-Type: text/html; charset=UTF-8');

   if(wp_mail($to, $subject, $body, $headers)) {
      echo "<div class='success'>Form submitted successfully!<br>I'll get back to you within a week.</div>";
   } else {
      echo "<div class='error'>Form submission error.<br>Please try again or <a class='inline' href='/contact'>contact me</a>so we can get started!</div>";
   }

}
?>