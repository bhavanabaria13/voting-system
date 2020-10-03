<?php

require_once('config.php');
global $siteURL;
$_SESSION["userid"] = '';
			$_SESSION["userWallet"] = '';
						$_SESSION["forsageid"] ='';
			$_SESSION["fullname"] = '';
			$_SESSION["email"] ='';

			$_SESSION["country"] = '';
			$_SESSION["fullname"] = '';
			unset($_SESSION["fullname"]);
			unset($_SESSION["forsageid"]);
			unset($_SESSION["fullname"]);
			unset($_SESSION["fullname"]);
			session_destroy ();


if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}
			
?>		<script>
		window.location.href = "<?php echo $siteURL;?>";
		</script>
		