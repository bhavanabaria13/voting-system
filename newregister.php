<?php 

require_once('config.php');
global $siteURL;
echo $_COOKIE['userWallet'];

define('SITE_URL', $siteURL);
print_r($_POST);

if($_POST){
	
	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$referrer_id = $_POST['referrer_id'];
	$userWallet = $_COOKIE['userWallet'];
	$email = $_POST['user_email'];
	$password = $_POST['password'];
	$i_accept = $_POST['i_accept'];
	$country ='India';
	//$user_id =
	
	
		
	$query1 = "SELECT * from forsage_event_reglevel where userWallet = '".$userWallet."' ";
	$basic_result = mysqli_query($conn, $query1);
	$basic_count = mysqli_num_rows($basic_result);

	if($basic_count <= 0){
		//check forsagetron user
		$query2 = "SELECT * from voting_event_reglevel where userWallet = '".$userWallet."' ";
		$wall_result = mysqli_query($conn, $query2);
		$wall_count = mysqli_num_rows($wall_result);
		if($basic_count <= 0){
			//insert part
			$data = [
              'first_name' => $first_name,
              'last_name'  => $last_name,
              'email'  => $email,
              'country'  => $country,
              'password'  => md5($password),
              //'verification_code' => $verification_code
      ];
//INSERT INTO `voting_event_reglevel` (`id`, `userID`, `userWallet`, `userWalletBase58`, `referrerID`, `referrerWallet`, `originalReferrer`, `timestamp`, `partners_in_structure`, `structure_status`) VALUES (NULL, '1', '242we', 'dsfsdsf', '22', 'dsfs', '234234', '234234', '0', '0');

echo $queryinsert = "INSERT INTO `voting_event_reglevel` (`id`, `userID`, `userWallet`, `userWalletBase58`, `referrerID`, `referrerWallet`, `originalReferrer`, `timestamp`, `partners_in_structure`, `structure_status`) VALUES (NULL, '1', '242we', 'dsfsdsf', '22', 'dsfs', '234234', '234234', '0', '0')";
       echo $queryinsert="insert into voting_event_reglevel(first_name,last_name,email,country,password,referrer_id,verification_code,userWallet,userID,userWalletBase58,referrerID,originalReferrer,parentId,timestamp,amount,user_id,status,structure_status) values('".$first_name."','".$last_name."','".$email."','".$country."','".md5($password)."','".$referrer_id."','','".$userWallet."',$userID,'".$userWallet."',$referrerID,$referrerID,$referrerID,1212121,0,'',1,1)";
      //  echo $queryinsert;
	  $successmsg= "Your registration has been successfully done, you can login with your ".$user_id;
      mysqli_query($conn, $queryinsert);
      //$this->session->set_userdata($data);


      $_SESSION['user'] = $data;
		}else{
			//login page redirect
			header("Location: https://gov.forsagetron.io/login.php"); 
			$errmsg ='voting user id already used.';
		}
		
	}else {
		$errmsg ='forsagetron user id already used.';
	}

      

}
//Array ( [first_name] => fsf [last_name] => dsssd [referrer_id] => sdfsd [trx_wallet] => 7777777777777 [user_email] => bhavna@gmak.c [password] => 12345678 [i_accept] => on )
?>
<html>
<body>
     <div class="card-body">
                                <h4 class="card-title text-center">Signup</h4>  


                              

                                <form id="login-form" class="login-form mt-4" action="<?php echo $siteURL.'newregister.php'; ?>" method="POST" >

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">                                               
                                                <label>Full name <span class="text-danger">*</span></label>
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" class="form-control pl-5" placeholder="Full Name" id="first_name" name="first_name" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-none">
                                            <div class="form-group position-relative">                                                
                                                <label>Last name <span class="text-danger">*</span></label>
                                                <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                <input type="text" class="form-control pl-5" placeholder="Last Name" id="last_name" name="last_name">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Referrer ID </label>
                                                <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                <input type="text" class="form-control pl-5" placeholder="Referrer ID" id="referrer_id" name="referrer_id" value="<?php echo $referrer_id; ?>" >
                                            </div>
                                        </div>
                                        
                                        
                                        
                                       
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Your Email <span class="text-danger">*</span></label>
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="form-control pl-5" placeholder="Email" name="user_email" required="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Password <span class="text-danger">*</span></label>
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" name="password" class="form-control pl-5" placeholder="Password" required="" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="i_accept" class="custom-control-input" id="i_accept" required="">
                                                    <label class="custom-control-label" for="i_accept">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                           
                                            <button type="submit" >Register</button>
                                        </div>
<!--                                         <div class="col-lg-12 mt-4 text-center">
                                            <h6>Or Signup With</h6>
                                            <ul class="list-unstyled social-icon mb-0 mt-3">
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>
                                            </ul>
                                        </div> -->
                                        
                                    </div>
                                </form>
                            </div>
                       
</body>
</html>