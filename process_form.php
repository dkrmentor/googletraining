<?php
if (isset($_POST['name'])) {
  // Retrieve form data
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $whatsapp = $_POST['whatsapp'];
  $email = $_POST['email'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $training = $_POST['training'];

  // Build email message
  $to = 'broadcasters.pakistan@gmail.com';
  $subject = 'New Query Form Submission';
  $message = "Name: $name\n";
  $message .= "Contact Number: $contact\n";
  $message .= "WhatsApp Number: $whatsapp\n";
  $message .= "Email Address: $email\n";
  $message .= "City: $city\n";
  $message .= "Country: $country\n";
  $message .= "Training Type: $training\n";

  // Send email
  $headers = "From: $email";
  if (mail($to, $subject, $message, $headers)) {
    // Email sent successfully
    header('Location: index.html?submitted=1');
    exit();
  } else {
    // Error sending email
    echo "Sorry, there was an error submitting your form. Please try again later.";
  }
}
?>

<!-- Add this section to display the success message -->
<?php
if (isset($_GET['submitted']) && $_GET['submitted'] == 1) {
  echo '<p style="color: green;">Form submitted successfully! Thank you for your submission.</p>';
}
?>
