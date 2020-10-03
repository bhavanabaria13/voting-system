<?php
require_once('config.php');
global $siteURL;
 $setuserWallet = clean($_COOKIE['userWallet']);
 //echo "<br><br><br><br><br><br>SDF:DSF :".$setuserWallet;
 if(!empty($setuserWallet))
 {
    $query = "select id,email,userid,userWallet,fullname FROM `user_table` where userwallet='".clean($setuserWallet)."'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);
    if($row > 0){
       $wall = mysqli_fetch_array($result);
      	$_SESSION["forsageid"] = $wall['id'];
      	$_SESSION["userid"] = $wall['userid'];
      	$_SESSION["userWallet"] = $wall['userWallet'];
  	    $_SESSION["email"] = $wall['email'];
        $_SESSION["fullname"]=$wall['fullname'];
		$data =1;
		echo json_encode($data);
    }
    else
    {
        
                
                
        $userwallet = $setuserWallet;
        //$url=$etherscanAddress.''.$mainContractAddress;
        $url = 'https://forsagetron.io/dashboard/getuserbywallet.php';
        $cURLConnection = curl_init();
        $data = array(
            'userwallet' => $setuserWallet
        );
        $payload = json_encode(array("user" => $data));
        
        // Attach encoded JSON string to the POST fields
        
        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($cURLConnection, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, "POST");
        $etherscanCode = curl_exec($cURLConnection);
        $error = curl_error($cURLConnection);
      //  echo $error;
        curl_close($cURLConnection);
        $data = explode("title='Click to view full list'>",$etherscanCode);
        
        if ($data[0]!='0') { 
            $verifycode = rand();
            $time = time();
        $queryinsert = "INSERT INTO `user_table` (`id`, `userid`, `userwallet`, `fullname`, `email`, `status`, `created` ,`verifycode`) 
        VALUES (NULL, '".$data[0]."', '".$setuserWallet."', '', '', '0', '".$time."','".$verifycode."')";
        mysqli_query($conn, $queryinsert);
        $totalTransactions = $data[0];
		$data =1;
		echo json_encode($data);
}else{ 
   // alert('You are not member of forsagetron.io');
   $data =2;
		echo json_encode($data);
 }
      //$query1 = "select userID FROM `forsage_event_reglevel` where userWalletBase58='".clean($setuserWallet)."'";
      // $result1 = mysqli_query($conn2, $query1);
      // $row = mysqli_num_rows($result1);
       /*if($row > 0){
          $user = mysqli_fetch_array($result1);
          $userID = $user['userID'];
          $_SESSION["userWallet"] = $setuserWallet;
          $_SESSION["email"] = '';
          $_SESSION["fullname"]='';
          $_SESSION["userid"] = $userID;
          $query2 = "INSERT INTO `user_table` ( `userid`, `userwallet`) VALUES ( '".$userID."', '".$setuserWallet."');";
          ///echo $query2;
  		    $wall_result = mysqli_query($conn, $query2);
          $last_id = $conn->insert_id;
          $_SESSION["forsageid"] = $last_id;
       }
       else {
         echo "<script>alert('Wallet ".$setuserWallet." is not a member of Forsage tron.');
         var now = new Date();
         document.cookie = 'userWallet=; expires=' + now + '; path=/';
         location.href='';
         </script>";
       }*/
    }
 }

?>
