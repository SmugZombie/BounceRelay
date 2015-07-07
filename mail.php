if(mail2($to, $subject, $message)){ echo "Message Sent Successfully! \n"; }
else{ echo "Message Failed to Send \n"; }
return;

function mail2($to, $subject, $message){
        $key = '//YOUR PRIVATE KEY//';
        if($message == "" || $to == "" || $subject == ""){ return; }

        //set POST variables
        $url = 'https://bouncerelay.com/api/';
        $fields = array('email' => urlencode($to), 'subject' => urlencode($subject), 'message' => urlencode($message), 'key' => urlencode($key) );

        //url-ify the data for the POST
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        //open connection, set the url, number of POST vars, POST data
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
}
