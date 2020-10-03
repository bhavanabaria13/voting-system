<?php 
require_once('config.php');
session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Site directory of Dating, Site directory of Arts, Site directory of Business, Site directory of Computers, Site directory of Games, Site directory of Health, Site directory of Kids and Teens, Site directory of News, Site directory of Recreation, Site directory of Reference, Site directory of Regional, Site directory of Science, Site directory of Shopping, Site directory of Society, Site directory of Sports, ">
	<meta name="description" content="Toplist links is a directory of top websites ranked by votes, Dating sites, Art & Design sites, Business company links, Link to computer information, Links to popular games and gaming websites, Health information, Websites for Kids, Links to online newspapers and websites, Recreation activities and events for the whole family., Reference links, Regional links, Links to science resources, The best places to shop online, Society links, Sport links">

	<link href="assets/css/bootstrap.min.css" rel="stylesheet" id="theme_switcher"/>
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
	<link href="assets/css/app.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="assets/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/application.js"></script>	<script src='assets/js/api.js'></script>
	<title>Decentralized ForsageTron </title>
    <style>
        .header-logo {
    margin-right: 15px;
    width: 200px;
    -webkit-transform: translateX(-20px);
    transform: translateX(-20px);
    height: 80px;
    background: url('https://forsagetron.io//image/forsagetronlogo.png') no-repeat center black;
        background-size: auto;
    background-size: 100% 100%;
}
    </style>
</head>

<body>
	<nav id="topnav" class="navbar navbar-fixed-top navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand header-logo" href="<?php echo $siteURL;?>"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
<?php 
if($_SESSION["userid"] !=''){ ?>
<li><a href="/"><i class="fa fa-user"></i> <?php echo $_SESSION["fullname"];?></a></li>
<li><a href="<?php echo $siteURL.'logout.php'?>"><i class="fa fa-user"></i> Logout</a></li>
	
<?php }else if($_SESSION["userid"] =='' && $_COOKIE['userWallet']){ ?>

<li><a href="/"><i class="fa fa-user"></i> <?php echo $_COOKIE['userWallet'];?></a></li>
<li><a href="<?php echo $siteURL.'logout.php'?>"><i class="fa fa-user"></i> Logout</a></li>
<?php }else {
    
?>  
    <!--li><a href="#" id="autologin" >Link Wallet</a></li-->
	<li><a href="#" id="autologinauto" >Link Wallet </a></li>
					<!--<li><a href="<?php //echo $siteURL.'login.php'?>"><i class="fa fa-unlock"></i>Login</a></li>
<li><a href="<?php //echo $siteURL.'register.php'?>"><i class="fa fa-user"></i> Register </a></li>--><?php } ?>
				</ul>
				<!--ul class="nav navbar-nav navbar-right">
					<li class="dropdown mega-dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span id="current_theme">English</span> <b class="caret"></b></a>
						<ul class="dropdown-menu mega-dropdown-menu row">
							<li class="col-sm-3">
								<ul>
									<li ><a href="/?code=AF">Afrikaans</a></li><li ><a href="/?code=AZ">Azeri</a></li><li ><a href="/?code=CA">Catalan</a></li><li  class="active"><a href="/?code=EN">English</a></li><li ><a href="/?code=JA">Japanese</a></li><li ><a href="/?code=RU">Russian</a></li><li ><a href="/?code=TR">Turkish</a></li>								</ul>
								</li>
								<li class="col-sm-3">
									<ul>
										<li ><a href="/?code=SQ">Albanian</a></li><li ><a href="/?code=EU">Basque</a></li><li ><a href="/?code=ZH">Chinese</a></li><li ><a href="/?code=FR">French</a></li><li ><a href="/?code=KO">Korean</a></li><li ><a href="/?code=SL">Slovenian</a></li><li ><a href="/?code=UK">Ukrainian</a></li>								</ul>
									</li>
									<li class="col-sm-3">
										<ul>
											<li ><a href="/?code=AR">Arabic</a></li><li ><a href="/?code=BE">Belarusian</a></li><li ><a href="/?code=CS">Czech</a></li><li ><a href="/?code=DE">German</a></li><li ><a href="/?code=PT">Portuguese</a></li><li ><a href="/?code=ES">Spanish</a></li>								</ul>
										</li>
										<li class="col-sm-3">
											<ul>
												<li ><a href="/?code=HY">Armenian</a></li><li ><a href="/?code=BG">Bulgarian</a></li><li ><a href="/?code=NL">Dutch</a></li><li ><a href="/?code=HI">Hindi</a></li><li ><a href="/?code=RO">Romanian</a></li><li ><a href="/?code=TH">Thai</a></li>								</ul>
											</li>
										</ul>
									</li>
								</ul-->

							</div>
							<!-- /.navbar-collapse -->
						</div>
					</nav>

				