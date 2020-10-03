<?php 
session_start();
require_once('config.php');
global $siteURL;
 $userWallet = $_COOKIE['userWallet'];
 $comments = $_POST['comments'];
   $userid = $_POST['userid'];
   $proposalid = $_POST['proposalid'];
   $catid = $_POST['catid'];

   $userWallet = $_SESSION['userWallet'];

   if($_SESSION["userid"]!='' && $catid!=''){
   $time=time();
   $queryinsert = "INSERT INTO `comment` (`id`, `catid`, `proposalid`, `comments`, `created`, `updated`, `userid`, `forsageuserid`) VALUES (NULL, '".$catid."', '".$proposalid."', '".$comments."', '".$time."', '', '".$userid."', '".$userid."')";
   			  //  echo $queryinsert;
   			   mysqli_query($conn, $queryinsert);
   			  $successmsg= "Thank you for comment.";
   
 $data=1;
 echo json_encode($data);
		 }
 

	
	
?>