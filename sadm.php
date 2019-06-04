<?php
/* smart admin finder by b3rksecurity */
$admpath="admin/";
$list=file($argv[1]);
function get_data($url) {
$ch = curl_init();
$timeout = 20;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
foreach($list as $site){
$site=trim($site);
$get=get_data("$site/$admpath");
if(preg_match("/Admin/", $get)){
echo "ok\n";
fwrite(fopen("admins.txt", "a+"), "$site/$admpath \n");
}else{
echo "no\n";
}
}
?>
