<?PHP
// mail.php
// author: regli2
// date: 07/06/2015
// purpose: For use with machines that already have PHP installed on them

$to = "ron@bouncerelay.com";
$subject = "PBX Reboot Complete"; // Subject of Email
$message = "The PBX has rebooted and returned online."; // Body of Email

if(mail2($to, $subject, $message))
        { echo "Message Sent Successfully! \n"; }
else
        { echo "Message Failed to Send \n"; }
return;

function mail2($to, $subject, $message){
        $apikey = '//YOUR PRIVATE KEY//';
        $url = "https://bouncerelay.com/api/1.0/sendmail.json";
	$subject = htmlentities($subject);;
	$data = array("apikey" => $apikey,"subject" => $subject,"message"=>$message, "to" => $to );
    $data_string = json_encode($data);

	$ch=curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Content-Length: ' . strlen($data_string)));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    if($err){$result .= "ERR".$err; }
    curl_close($ch);
    
    return $result;
}
