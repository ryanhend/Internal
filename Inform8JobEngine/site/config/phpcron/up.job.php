<?php

// Verify that this url is reachable:
$url 		= 	"www.google.com.au";
$timeout 	= 	30;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code)
	print "$url returning http status code: $http_code.";
else
	print "ERROR: Site $url is unreachable.";