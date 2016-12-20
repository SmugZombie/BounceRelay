#!/usr/bin/python
# mail2.py
# github.com/smugzombie/bouncerelay

import requests, commands, HTMLParser, json, sys

try:
        to = sys.argv[1]
        subject = sys.argv[2]
        message = sys.argv[3]
except:
        print "Usage: mail.py [to] [subject] [message]"
        exit()

def sendMessage(to,subject,message):
        url = "https://bouncerelay.com/api/1.0/sendmail.json"
        html = HTMLParser.HTMLParser() # Start HTML Parser
        payload = {}
        payload['apikey'] = ""
        payload['message'] = str(html.unescape(message))
        payload['subject'] = str(html.unescape(subject))
        payload['to'] = str(to)
        headers = {'content-type': "application/json", 'cache-control': "no-cache"}
        response = requests.request("POST", url, data=json.dumps(payload), headers=headers)
#        print response

sendMessage(to,subject,message)
