<?php

require_once('config.php');
global $siteURL;
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$e = explode("?", $url);
	//print_r($e[1]);
	$slug = explode("=", $e[1]);
	$verifycode = $slug[2];
	$slugq = explode("&", $slug[1]);
	$userverifyid= $slugq[0];
	 
	
		$query = "select * FROM `user_table` where id='".$userverifyid."' and verifycode='".$verifycode."'"; 
		$result = mysqli_query($conn, $query);
		 
		 $numrows = mysqli_num_rows($result);
		 if($numrows > 0){
			 
			 $query= "UPDATE `user_table` SET `status` = '1' WHERE `user_table`.`id` = '".$userverifyid."'";
			 $result = mysqli_query($conn, $query);
			 
			 ?>
			 
			 <script>
		window.location.href = "<?php echo $siteURL;?>";
		</script>
		
			 <?php
		 }
?>		