<?
Explanation 
Brevo एक SMTP सर्वर प्रदान करता है, जो SMTP के जरिए ईमेल भेजने के लिए इस्तेमाल किया जा सकता है। इसका मतलब है कि Brevo को SMTP के विकल्प के रूप में इस्तेमाल किया जा सकता है, लेकिन Brevo सिर्फ एक SMTP सेवा नहीं है; यह एक पूरी ईमेल सेवा प्रदाता है जो आपको SMTP के अलावा भी बहुत सारी सुविधाएँ देता है (जैसे ईमेल ट्रैकिंग, रिपोर्टिंग, मार्केटिंग टूल्स, आदि)।

Brevo का फ्री प्लान आपको 300 ईमेल प्रति दिन भेजने की अनुमति देता है।
SMS भेजने के लिए, Brevo फ्री प्लान में सीमित क्रेडिट होते हैं, लेकिन यदि आपको ज्यादा SMS भेजने हैं, तो आपको पेड प्लान की जरूरत होगी।

=======================================================================================
First Go to https://app.brevo.com/ and vreate an account 

Go to SMTP and API , at there you will get 
Your SMTP Settings 
SMTP Server: smtp-relay.brevo.com
Port:587
Login: 8c2790001@smtp-brevo.com

you will get SMTP key value from "Your SMTP Keys" section just below "Your SMTP Settings" section
now copy that SMTP key value - mS8Kwj2GHU6AaYdt

-----------------------------
now update you .env file   (This env details is from above example)

MAIL_MAILER=smtp
MAIL_HOST=smtp-relay.brevo.com
MAIL_PORT=587
MAIL_USERNAME=8c2790001@smtp-brevo.com  # Brevo SMTP login
MAIL_PASSWORD='SMTP key value'      # SMTP password from Brevo
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=naimish.gedia@mayuraconsultancy.com  # Your email
MAIL_FROM_NAME="Social Property Network"


after configure above details you will abel to receive emails using brevo 
