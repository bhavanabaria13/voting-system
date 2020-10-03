<?php 
session_start();
require_once('config.php');
global $siteURL;
 $userWallet = $_COOKIE['userWallet'];
 
 
 
 //print_r($_POST);
 //Array ( [voteup] => 1 [userid] => 14 [proposalid] => 4 )
$successmsg ='';
$errormsg='';
if($_POST){
	$voteup = $_POST['votedown'];
	$userid = $_POST['userid'];
	$proposalid = $_POST['proposalid'];
	
	
	if($_SESSION["userid"]==''){ 
 //$_SESSION["errmsg"] = 'Please login after given vote.';
 $data = 1;
 echo json_encode($data);
  }
	else {
	$userWallet = $_COOKIE['userWallet'];
	// $query2 = "SELECT votedown from proposal where id = '".$proposalid."' and userid = '".$userid."'";
	 $query2 = "SELECT * from votecount where proposalid = '".$proposalid."' and userid = '".$userid."' and  votedown='1' ";
	
		$wall_result = mysqli_query($conn, $query2);
		 $wall_count = mysqli_num_rows($wall_result);
		 $wall_count = mysqli_fetch_assoc($wall_result);
			 $vateval= $wall_count['votedown'];
		 
		
				
		
		
		if($wall_count <= 0){ 
			 $wall_count = mysqli_fetch_assoc($wall_result);
			 //$vateval= $wall_count['votedown'];
			//$total = $vateval + 1;
			//$query2 = "UPDATE proposal SET votedown='".$total."' WHERE id='".$proposalid."'";
			$query2 = "INSERT INTO `votecount` (`id`, `userid`, `forsageid`, `proposalid`, `userwallet`, `voteup`, `votedown`) VALUES (NULL, '".$userid."', '".$userid."', '".$proposalid."', '".$_SESSION["userWallet"]."', '0', '1');";
			
		$wall_result = mysqli_query($conn, $query2);
			unset($_SESSION["succmsg"]);
		unset($_SESSION["errmsg"]);
		//$_SESSION["succmsg"] = 'Thank you for vote this proposal';
		$success = 'Thank you for vote this proposal';
		$data  = 2;
		echo json_encode($data);
		}else{ 
			unset($_SESSION["succmsg"]);
		unset($_SESSION["errmsg"]);
		//$_SESSION["errmsg"] = 'you have already gives vote for this proposal';
		$data = 3;
		//$error = 'you have already gives vote for this proposal';
		echo json_encode($data);
		 }
	}
	
}
	
	
?>