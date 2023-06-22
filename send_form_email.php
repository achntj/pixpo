<?php
ob_start();
session_start();
?>

<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@pixpomedia.com,pixpomedia@gmail.com";
    $email_subject = "Pixpo Media - Contact Form";    
     
       
    $firsttname = $_POST['first-name']; // required
	$mobile = $_POST['phone']; // not required
	$email_from = $_POST['email']; // required
	$details = $_POST['comment']; // not required
    
     
    
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     $email_message .= "<html><body>";
	 $email_message .='<table border="1" style="border-color: #666;" cellpadding="10" align="center">';
    $email_message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".clean_string($firsttname)."</td></tr>";
	$email_message .= "<tr><td><strong>Contact No.:</strong></td><td>".clean_string($mobile)."</td></tr>";
    $email_message .= "<tr><td><strong>Email:</strong></td><td>".clean_string($email_from)."</td></tr>";
	$email_message .= "<tr><td><strong>Message:</strong></td><td>".clean_string($details)."</td></tr>"; 
	 $email_message .= "</table>";   
	 $email_message .= "</html></body>";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
$headers .= 'Content-type: text/html; charset=iso-8859-1\r\n';
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  


$to=$email_from;
            $subject="Pixpo Media Contact";
            $from = 'info@pixpomedia.com';
	        $msg="Hello $firsttname, </br> Thank you for Contact us , We will reply you soon.";
            $body=$msg;
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($to,$subject,$body,$headers); 


?>
 
<!-- include your own success html here -->
 
 
<?php

header('Location:index.html');
}
?>