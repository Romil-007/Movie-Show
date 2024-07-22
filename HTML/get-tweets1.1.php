<?php
session_start();
require_once('twitteroauth/twitteroauth.php'); //Path to twitteroauth library
 
$twitteruser = "@OliaGozha";
$notweets = 10;
$consumerkey = "WIuolRmQXMzSP72YToZHC1I6r";
$consumersecret = "0eR7rXNHl4Hym2cCL5Mrss8r0fHJu9CnYSlGSxBrxl6QAGrWOE";
$accesstoken = "2785813181-ItqgZcIzAMBm1zQlNeR3hMi5HsIoEPkMRDGdfsq";
$accesstokensecret = "PXW2may2OP68gE0ReizoAfPS0xgw8ylICn5fX9OZh8q34";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
  
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>