<?php
$url = $_GET['url'];
$path_parts = pathinfo($url);

$ext = $path_parts['extension'];
$filename = $path_parts['filename'];

header("Content-type: application/$ext");
header("Content-Disposition: attachment; filename=$filename");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSLVERSION,3);
$data = curl_exec ($ch);
curl_close ($ch);
echo $data;
?>
