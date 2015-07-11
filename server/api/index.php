<?
header('Access-Control-Allow-Origin: *'); 

$key = $_POST['key'];
$nobrand = false;
if($key == "//FALSEAPIKEY//"){
	$from_name = "mydomain.net";
	$from_email = "mydomain.net-noreply@bouncerelay.com";
}
else{
	echo 0;
	return;
}

$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$to = $email;

if(!$nobrand){ $message .="<br><br>-Sent Via <a href='http://bouncerelay.com/faq/'>bouncerelay.com</a>"; }
$separator = md5(time());
$eol = "\r\n";

// main header (multipart mandatory)
$headers = "From: $from_name <$from_email>" . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;
$headers .= "Content-Transfer-Encoding: 7bit" . $eol;
$headers .= "This is a MIME encoded message." . $eol . $eol;

// message
$headers .= "--" . $separator . $eol;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
$headers .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
$headers .= $message . $eol . $eol;

if(mail($to, $subject, "", $headers)){
    echo 1;
    return;
}

echo 0;
?>
