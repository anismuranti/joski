<?php
while(true){

$headers = array(
"Host: app.oneaset.co.id",
"Connection: keep-alive",
"Accept: application/json, text/plain, */*",
"countryId: 1",
"User-Agent: Mozilla/5.0 Version/4.0 Chrome/94.0.4606.71 Mobile Safari/537.36",
"languageId: 123",
);
$url = "https://app.oneaset.co.id/api/app/biz/activity/master/user/task/list?activityId=2";
$res = curl($url,$headers,"get");
$js = json_decode($res,true);
$name = $js["data"]["5"]["redEnvelopeVO"]["nameId"];
$stock = $js["data"]["5"]["redEnvelopeVO"]["remainNum"];
$telegrambot='5136257768:AAEHzmUBZWalZPxqn5EBgklo1CYiLiMX2Nk';
$telegramchatid=-401957147;
if($stock == "1"){
	telegram ("===============================\n                 ＣＥＫ ＥＶＥＮＴ\n                    ＯＮＥＡＳＥＴ\n===============================\n[<>] NAME => $name\n[<>] STOCK => ABIS\n===============================\n");
}else{
telegram ("===============================\n                 ＣＥＫ ＥＶＥＮＴ\n                    ＯＮＥＡＳＥＴ\n===============================\n[<>] NAME => $name\n[<>] STOCK => $stock\n===============================\n");
}
sleep(300);
}



function telegram($msg) {
        global $telegrambot,$telegramchatid;
        $url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';$data=array('chat_id'=>$telegramchatid,'text'=>$msg);
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,true,$context);
        return $result;
}
function curl($url, $header, $mode="get", $data=0)
	{
	if ($mode == "get" || $mode == "Get" || $mode == "GET")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		}
		elseif ($mode == "poss" || $mode == "Poss" || $mode == "POSS")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_HEADER, true);
		$result = curl_exec($ch);
		}
	elseif ($mode == "post" || $mode == "Post" || $mode == "POST")
		{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		}
	elseif ($mode == "patch" || $mode == "PATCH" || $mode == "Patch")
	   {
		$ch = curl_init($url);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
         $result = curl_exec($ch);
		}
		elseif ($mode == "options" || $mode == "Options" || $mode == "OPTIONS")
		{
		$ch = curl_init($url);
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
         $result = curl_exec($ch);
		}
		else
		{
		$result = "Not define";
		}
	return $result;
	}



?>
