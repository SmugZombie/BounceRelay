#!/usr/bin/python
# mail.py
# github.com/smugzombie/bouncerelay

import requests, commands, HTMLParser, json

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
        print response

data = commands.getstatusoutput("/usr/bin/python /root/elastichealth.py")[1]
sendMessage("helpdesk@XXXXXXX.com","ElasticSearch Usage",data)
