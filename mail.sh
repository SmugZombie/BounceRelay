#!/bin/bash
# mail.sh
# author: ThirdPartyReject
# date: 07/06/2015
# purpose: For use with machines that dont have access to PHP

to="ron@bouncerelay.com"
subject="'Test Message'"
message="'This is a test message'"
apiKey="//APIKEYHERE//"

# Do not modify below this line
# Define the Home Url
homeUrl="https://bouncerelay.com/api/"
# Make the cURL call
curlResult=$(curl -k -s --data "key=$apiKey&subject=$subject&message=$message&email=$to" $homeUrl)
# Echo the result
echo $curlResult
