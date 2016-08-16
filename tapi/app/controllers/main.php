<?php
class Main extends Controller {
	
	function jdata($f3){
		$data=array(
		"from"=>"abc@gmail.com",
		"to"=>"xyz@gmail.com",
		"sub"=>"Test",
		"body"=>"This is a Test Mail",
		);
		$data_string = json_encode($data);
		
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/api/mail");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string))
		);
		
		$result=curl_exec($ch);
		
		curl_close($ch);
		
		//$json = file_get_contents('php://input');
		
		 //$result = json_decode($json);
		
		var_dump($data_string);
		
		//echo $data;
		
		//echo 'sssssssssssssss';
	}
	
	function amail($app){
	
		//$app = \Base::instance();
		$json = $app->get('BODY');
		/* 
		$json = file_get_contents('php://input');
		

		var_dump($obj); 
		//*/
		
		$obj = json_decode($json);
		var_dump($obj); 
		
		$from=$obj->from;
		$to=$obj->to;
		$sub=$obj->sub;
		$body=$obj->body;
		
		//je bolen
		//suntey pachchen
		
		$mail = new PHPMailer;

		$mail->From = $from;
		$mail->addAddress($to);
		$mail->Subject = $sub;
		$mail->Body = $body;
		
		$mail->isHTML(true);
		
		if(!$mail->send()) 
		{
			echo "Mailer Error: " . $mail->ErrorInfo;
		} 
		else 
		{
			echo "Message has been sent successfully";
		} 
	}
	
	
	
}
?>