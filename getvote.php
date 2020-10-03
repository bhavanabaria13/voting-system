<?php
require_once('config.php');
global $siteURL;
 $userWallet = $_COOKIE['userWallet'];

 //print_r($_POST);
 //Array ( [voteup] => 1 [userid] => 14 [proposalid] => 4 )
$successmsg ='';
$errormsg='';
if(isset($_POST['votepass'])){
	$votepass = $_POST['votepass'];
	$userid = $_POST['userid'];
	$proposalid = $_POST['proposalid'];
if(empty($userid)){
  echo json_encode('Please login after given vote.');
  }else{
    $voteup=0;
    $votedown=0;$userWallet = $_COOKIE['userWallet'];
    if($votepass==1)
    {
      $voteup=1;
	   $query2 = "SELECT * from votecount where proposalid = '".$proposalid."' and userid = '".$userid."' ";
		$wall_result = mysqli_query($conn, $query2);
		$wall_count = mysqli_num_rows($wall_result);

		if($wall_count <= 0){
			 $query2 = "INSERT INTO `votecount` (`userid`, `forsageid`, `proposalid`, `userwallet`, `voteup`, `votedown`) VALUES ( '".$userid."', '".$userid."', '".$proposalid."', '".$userWallet."', '1', '0')";

  		$wall_result = mysqli_query($conn, $query2);
		 $query2 = "delete from  votecount where proposalid = '".$proposalid."' and userid = '".$userid."' votedown='1'";
		$wall_result = mysqli_query($conn, $query2);
		echo json_encode("Thank you for vote this proposal");
		}else{
		    echo json_encode("You have already voted for this proposal");
	 }
    }
    else {
      $votedown=1;
	     $query2 = "SELECT * from votecount where proposalid = '".$proposalid."' and userid = '".$userid."' ";
		$wall_result = mysqli_query($conn, $query2);
		$wall_count = mysqli_num_rows($wall_result);

		if($wall_count <= 0){
			   $query2 = "INSERT INTO `votecount` (`userid`, `forsageid`, `proposalid`, `userwallet`, `voteup`, `votedown`) VALUES ( '".$userid."', '".$userid."', '".$proposalid."', '".$userWallet."', '0', '1')";

  		$wall_result = mysqli_query($conn, $query2);
		$query2 = "delete from  votecount where proposalid = '".$proposalid."' and userid = '".$userid."' votedup='1'";
		$wall_result = mysqli_query($conn, $query2);
		echo json_encode("Thank you for vote this proposal");
		}else{
		    echo json_encode("You have already voted for this proposal");
	 }
    }
 }
}


?>
