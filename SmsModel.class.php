<?php

// 适用于php5.2及以上版本
require_once 'Alidayu/AlidayuClient.class.php';
require_once 'Alidayu/SmsNumSend.class.php';

class SmsModel{
	
	//调用函数参数至少两项，手机号码和验证码 $mobile, $code
	public function DySms($mobile, $code)
	{
		//实例化对象，并设置应用APP Key和APP Secret
		$client  = new AlidayuClient('23527374','4b25c875a286c8e48af054df27406c6f');
		$request = new SmsNumSend;
		
		//短信模板参数
		$smsParams = array('sitename' => '德邻家政','code' => "{$code}");
		//print_r($smsParams);die();
		// 验证码模板 SMS_25698039
		$req = $request->setSmsTemplateCode('SMS_25645039')
		->setRecNum($mobile)
		->setSmsParam(json_encode($smsParams))
		->setSmsFreeSignName("德邻家政")
		->setSmsType('normal')
		->setExtend('release');
		//print_r($request);die();
		$response = $client->execute($req);
		//print_r($response);die();
		return $response['alibaba_aliqin_fc_sms_num_send_response']['result']['success'] ? true : false;

	}
}
//测试调用
/*
if(SmsModel::DySms('187****4515','123123')){
	echo 'ok';
}else{
	echo 'error';
}
*/

//到此结束，就是这么简单~