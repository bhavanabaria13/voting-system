<?php 

require_once('config.php');
global $siteURL;
include('header.php');

	
	$successmsg ='';
$errormsg='';
if($_POST){
	
	$password = md5($_POST['password']);
	$email = $_POST['email'];
	$query = "select * from voting_event_reglevel where email ='".$email."' and password = '".$password."' and status ='1'	";
	$wall_result = mysqli_query($conn, $query);
		$wall_count = mysqli_num_rows($wall_result);
		if($wall_count > 0){
			

			$wall = mysqli_fetch_assoc($wall_result);
						
			$_SESSION["userid"] = $wall['id'];
			$_SESSION["userWallet"] = $wall['userWallet'];
						
			$_SESSION["fullname"] = $wall['fullname'];
			$_SESSION["email"] = $wall['email'];

			$_SESSION["country"] = $wall['country'];
			?>
			<script>
				 window.location.href = "<?php echo $siteURL; ?>";
			</script>
		<?php }else{
			$errormsg='User email and password not match. Please enter correct email and password. or your account not activated';
		}
}
?>
	

<div class="container">  
		<div class="col-xs-12 col-sm-4 col-sm-offset-4">
			<h1 class="text-center">Users Login</h1><hr/>	
			<?php  if($errormsg!=''){ ?>

		<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		   <?php echo $errormsg;?>
		</div>
		<?php } ?>
			<form method="post" action="<?php echo $siteURL.'login.php'?>" class="form form-horizontal">	  			
				<div class="input-group input-group-md">				
					<span class="input-group-addon" id="sizing-addon1">Email</span>				
					<input type="email" id="email" required="" name="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">			
				</div>
				<br>
				<div class="input-group input-group-md">
					<span class="input-group-addon" id="sizing-addon1">Password</span>
					<input type="password" id="password" required name="password" class="form-control">
				</div>
				<br>
				<input type="submit" name="btnsubmit" value="Login" class="btn btn-success btn-block">
				<br>
				<a href="<?php echo $siteURL.'signup.php'?>">New User !</a> &nbsp;&nbsp;&nbsp;&nbsp;
				<a href="">Forgot Password?</a>		
			</form>	
            
                        </div></div>
	<div class="container">
	<hr>
				<hr>

<?php include('footer.php');?>