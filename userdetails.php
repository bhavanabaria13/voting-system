<?php 
session_start();
require_once('config.php');
global $siteURL;

		// echo "<br><br><br><br><br><br>";
		// print_r($_POST);
   	$fullname = $_POST['fullname'];
   	$email = $_POST['email'];
   	$user = $_POST['user'];
   	$detail = $_POST['detail'];
   	$userWallet1 = $_SESSION["userWallet"];

   	$userids = $_SESSION["userid"] ;
   	$time = time();
   	if($_SESSION["userid"]!=''){

   	if($detail=='checkfrm'){
			$recordid=0;
   		$query = "select * FROM `user_table` where userwallet='".$_SESSION["userWallet"]."'";
   		$result = mysqli_query($conn, $query);
   		$row = mysqli_num_rows($result);
			$verifycode = rand();
   		if($row > 0){
				$k=mysqli_fetch_assoc($result);
		//	print_r($k);die;
				$recordid = $k['id'];
				$queryupdate = "update `user_table` set `fullname`='".$fullname."', `email`='".$email."',`verifycode`='".$verifycode."' where userwallet='".$_SESSION["userWallet"]."'";
				mysqli_query($conn, $queryupdate);
			}
			else{
   			  $queryinsert = "INSERT INTO `user_table` (`id`, `userid`, `userwallet`, `fullname`, `email`, `status`, `created` ,`verifycode`) VALUES (NULL, '".$userids."', '".$_SESSION["userWallet"]."', '".$fullname."', '".$email."', '0', '".$time."','".$verifycode."')";
   			  mysqli_query($conn, $queryinsert);
   			  $recordid = mysqli_insert_id($conn);
				}
   			 $link = $siteURL.'verify.php?slug='.$recordid.'&verify='.$verifycode;
   			 // email code
   			 $to = $email;
   			 $subject = "gov.forsagetron.io Verification mail ";

   			 $message = "<b style='font-size:20px'>Hello ".$fullname.",</b><br><br>";
   			 $message .= "Please verify your account by clicking on Verification Link.<br><br>";

   			  $message .= "<a href='".$link."' style='color: black;    background: yellow;    padding: 11px 13px;    border-radius: 6px;
       		font-size: 16px;' >Verification Link.</a>";


   			 $header = "From: nobody@example.com \r\n";
   			// $header .= "Cc:nobody@example.com \r\n";
   			 $header .= "MIME-Version: 1.0\r\n";
   			 $header .= "Content-type: text/html\r\n";

   			 $retval = mail ($to,$subject,$message,$header);
   			}



   			 if( $retval == true ) {
   				//echo "Message sent successfully...";
				$data=1;
   				

 echo json_encode($data);
			   }else {
			   //echo "Message could not be sent...";
			   $data=2;

 echo json_encode($data);
			   
			   }


   	}
   else{ $data=3;
   

 echo json_encode($data);
   	}
   
  

	
	
?>