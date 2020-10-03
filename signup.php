<?php 
session_start();
require_once('config.php');
global $siteURL;
 $userWallet = $_COOKIE['userWallet'];
if($_SESSION["userid"]!=''){ ?>
	<script>
		window.location.href = "<?php echo $siteURL;?>";
		</script>
<?php }
$successmsg ='';
$errormsg='';
if($_POST){
	
	$fullname = $_POST['fullname'];
	$country = $_POST['country'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$userWallet = $_COOKIE['userWallet'];
	$conf_passwd = $_POST['conf_passwd'];
	 $query2 = "SELECT * from voting_event_reglevel where userWallet = '".$userWallet."' ";
		$wall_result = mysqli_query($conn, $query2);
		$wall_count = mysqli_num_rows($wall_result);
		if($wall_count <= 0){
			$data = [
              'fullname' => $fullname,
              'email'  => $email,
              'country'  => $country,
              'password'  => md5($password),
				  ];
				  $time=time();
				
				   $queryinsert = "INSERT INTO `voting_event_reglevel` (`id`, `userID`, `userWallet`, `userWalletBase58`, `referrerID`, `referrerWallet`, `originalReferrer`, `timestamp`,  `status`, `fullname`, `email`, `phone`, `country`, `password`) VALUES (NULL, '', '".$userWallet."', '', '', '', '', '".$time."', '0', '".$fullname."', '".$email."', '".$phone."', '".$country."', '".md5($password)."')";
				  
				   mysqli_query($conn, $queryinsert);
				  $successmsg= "Your registration has been successfully done, Thank you for register we send verification email.  After you can given vote and comments. thank you.";
				 
				  $_SESSION['user'] = $data;
				  
		}else{
			$errormsg = 'You are already register..!';
		}
	//$user_id =
}

		include('header.php');
		
		?>
		
		 <div class="container">  
		<div class="col-xs-12 col-md-8 col-sm-offset-2">
			<p class="lead">To add your website to this top site, you have to create account:</p>
		
		<br>
		<?php if($successmsg !=''){ ?>
		<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		   <?php echo $successmsg;?>
		</div>
		<?php } if($errormsg!=''){ ?>

		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		   <?php echo $errormsg;?>
		</div>
		<?php } ?>
	<form action="<?php echo $siteURL.'signup.php';?>" method="post" class="form-horizontal" accept-charset="utf-9">
	
		<div class="form-group">
			<label class="control-label col-md-3" for="name">Full Name</label>
			<div class="controls col-md-9 col-xs-12">
				<input class="form-control" type="text" name="fullname" id="fullname" value="" required maxlength="55" placeholder="Full Name" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3" for="email">Email</label>
			<div class="controls col-md-9 col-xs-12">
				<input class="form-control" type="text" name="email" id="email" required value="" placeholder="Email"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3" for="email">Contry</label>
			<div class="controls col-md-9 col-xs-12">
				<input class="form-control" type="text" name="country" id="country" required value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3" for="email">Phone</label>
			<div class="controls col-md-9 col-xs-12">
				<input class="form-control" type="text" name="phone" id="phone" required value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3" for="description">Password</label>
			<div class="controls col-md-9 col-xs-12">
				<input class="form-control" type="password" name="password" id="password" required value="" placeholder="Password" />
			</div>
		</div>
		<!--<div class="form-group">
			<label class="control-label col-md-3" for="banner">Confirm Password</label>
			<div class="controls col-md-9 col-xs-12">
				<input class="form-control" type="password" name="conf_passwd" id="conf_passwd" required value="" placeholder="Confirm Password" />
			</div>
		</div>-->
				<div class="form-group">
			<div class="col-md-9 col-md-offset-3">
				<div class="g-recaptcha" data-sitekey="6LfLpAgTAAAAAL4ygVo-9gVI2yuu8g1oQ6CshAVq"></div>
			</div>
		</div>
				<div class="form-group">
			<div class="col-md-3"><input type="hidden" name="confirmation" value="true" /></div>
			<div class="controls col-md-9 col-xs-12">
				<input type="submit" value="Submit" class="btn btn-success btn-block" />
			</div>
		</div>
	</form>
	    </div>
</div>
	<div class="container">
	<hr>

<div class="text-center"><div>
	<?php 
?>