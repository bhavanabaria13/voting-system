<?php 
   require_once('config.php');
   	include('header.php');
   	$setuserWallet = $_COOKIE['userWallet'];
   ?>
<?php 
   require_once('config.php');
   
   
   $query = "select * FROM `category` where status='1' "; 
   $result = mysqli_query($conn, $query);
   $row = mysqli_num_rows($result);
   if($row > 0){
       $allcat = mysqli_fetch_all($result);
      
   }
   //echo 'All Category'.'<br><br>';
   
   
   //echo 'All Proposal'.'<br><br>';
   $query = "select * FROM `proposal` where status='1' "; 
   $result = mysqli_query($conn, $query);
   $row = mysqli_num_rows($result);
   if($row > 0){
       $allproposal = mysqli_fetch_all($result);
   }
   
   ?>
<!-- End Top Slider -->
<link rel="profile" href="http://gmpg.org/xfn/11">
<script type="text/javascript">var ajax_url = 'http://my.tokencomics.io/tctron/wp-admin/admin-ajax.php';</script> 
<input type="hidden" name="hdn_wallet_id" id="hdn_wallet_id" value="TJaHQQ72pC6XazztK3HjJb4M4mw4K4uiNP" /> 
<script src="http://my.tokencomics.io/tctron/wp-content/themes/tokencomics/assets/js/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.9.0/jquery.validate.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" defer></script>
<script type="text/javascript">//added by Hitesh >Start
   window.addEventListener('load', async () => {
       
       var myAccountAddress= await window.tronWeb.defaultAddress.base58;
       
       if(myAccountAddress == false){
   
           localStorage.setItem('isPopupLogin', 0);
   
           var interval = setInterval(function(){ 
               
               isLocked(interval);
   
           }, 1000);
       } else {
   
           let state = localStorage.getItem('islocked'); 
           var my_Account = localStorage.getItem('myAccountAddress');
           var my_Account2 = myAccountAddress;
           if(my_Account!=null){
               my_Account = my_Account.toUpperCase();
               my_Account2 = my_Account2.toUpperCase();
               if(my_Account !== my_Account2){
                   localStorage.setItem('myAccountAddress', myAccountAddress);     
                   //window.location.href = "?userPublicAddress="+accounts[0];
               } else {
                 localStorage.setItem('myAccountAddress', myAccountAddress);     
               }
           } else {
               localStorage.setItem('myAccountAddress', myAccountAddress);     
           }
   
           var now = new Date();
           now.setTime(now.getTime() + 1 * 3600 * 1000);
   
           document.cookie = "authenticated_wallet="+myAccountAddress+"; expires=" + now.toUTCString() + "; path=/";
    document.cookie = "userWallet="+myAccountAddress+"; expires=" + now.toUTCString() + "; path=/";
    
   		//window.location.href = "http://localhost/voting/dashboard.php";
   //	window.location.href = "<?php echo $siteURL?>";
   		window.location.href = "https://gov.forsagetron.io/";
           var intervalDiff = setInterval(function(){ 
             checkDiffWallet(intervalDiff);
           }, 1000);
   
       }
   
       
       
   });
   
   async function isLocked(interval) {
       var myAccountAddress= await window.tronWeb.defaultAddress.base58;
       
       if(myAccountAddress == false){
   
         var isPopupLogin = localStorage.getItem('isPopupLogin'); 
   
         if(isPopupLogin == 0){
           alertify.alert('Login','Please Login to Tronlink Wallet.');
           localStorage.setItem('isPopupLogin', 1); 
         }
   
         localStorage.setItem('islocked', 0);
         localStorage.removeItem('myAccountAddress'); 
         myAccountAddress = null;
         
         document.cookie = 'authenticated_wallet=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
   document.cookie = 'userWallet=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
   
       } else {
   
           //clearInterval(interval);
   
           let state = localStorage.getItem('islocked'); 
           var my_Account = localStorage.getItem('myAccountAddress');
           var my_Account2 = myAccountAddress;
           if(my_Account!=null){
               my_Account = my_Account.toUpperCase();
               my_Account2 = my_Account2.toUpperCase();
               if(my_Account!==my_Account2){
                   localStorage.setItem('myAccountAddress', myAccountAddress);     
                   //window.location.href = "?userPublicAddress="+accounts[0];
               } else {
                 localStorage.setItem('myAccountAddress', myAccountAddress);     
               }
           } else {
               localStorage.setItem('myAccountAddress', myAccountAddress);     
           }
   
           var now = new Date();
           now.setTime(now.getTime() + 1 * 3600 * 1000);
   
           document.cookie = "authenticated_wallet="+myAccountAddress+"; expires=" + now.toUTCString() + "; path=/";
   
           if(state==0 || state==null){
               localStorage.setItem('islocked', 1);
               localStorage.setItem('isPopupLogin', 0);
               location.reload(true);
           }
   
   
       }
   }
   
   async function checkDiffWallet(intervalDiff) {
       
       var myAccountAddress= await window.tronWeb.defaultAddress.base58;
       var my_Account = localStorage.getItem('myAccountAddress');
       
       if(myAccountAddress == false){
   
         var isPopupLogin = localStorage.getItem('isPopupLogin'); 
   
         if(isPopupLogin == 0){
           alertify.alert('Login','Please Login to Tronlink Wallet.');
           localStorage.setItem('isPopupLogin', 1);
         }
   
         localStorage.setItem('islocked', 0);
         localStorage.removeItem('myAccountAddress'); 
         myAccountAddress = null;
         
         document.cookie = 'authenticated_wallet=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
   	  //window.location.href = "<?php echo $siteURL;?>";
   	  window.location.href = "https://gov.forsagetron.io/";
   
       } else if(myAccountAddress != my_Account){
   
         localStorage.setItem('myAccountAddress', myAccountAddress);
         var now = new Date();
         now.setTime(now.getTime() + 1 * 3600 * 1000);
         document.cookie = "authenticated_wallet="+myAccountAddress+"; expires=" + now.toUTCString() + "; path=/";
   	//	window.location.href = "<?php echo $siteURL;?>";
   		window.location.href = "https://gov.forsagetron.io/";
         location.reload(true);
   
       }
   
   }
</script> 
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" defer></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" defer></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" defer></script> <script src="http://my.tokencomics.io/tctron/wp-content/cache/autoptimize/js/autoptimize_single_50d28bc73a08cd1ae8da0cf70f059947.js" defer></script> <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
<div class="container" id="toplist">
<div class="row">
   <hr class="hr-primary" />
   <ol class="breadcrumb bread-primary ">
      <li><a href="/"><i class="fa fa-newspaper-o"></i> Categories</a></li>
   </ol>
</div>
<ul id="categories" class="list-group row">
   <?php
      if(!empty($allcat)){
      foreach($allcat as $category){
      	
      			$cat=$category[0];				
      			$query = "select * FROM `proposal` where catid='".$cat."' "; 
      			$result = mysqli_query($conn, $query);
      			 $cal = mysqli_num_rows($result);
      			//$carno = $cal['category']; ?>
   <li class="list-group-item col-xs-4"><a href="<?php //echo $category[1];?>" style="text-transform: capitalize;"> <?php echo $category[2].' ('.$cal.') ';?> </a></li>
   <?php }
      }
      	?>
</ul>
<hr>
<div class="row">
   <form class="form-horizontal" action="/">
      <div class="col-md-2"></div>
   </form>
</div>
<hr>
<div class="row">
   <div class="col-md-9">
      <h1>Global top ranked websites</h1>
   </div>
   <div class="col-md-3">
      <!--<form action="" class="form-inline" id="search_form">
         <div class="input-group col-md-12">
         	<div class="input-group-addon">Sort By: </div>
         	<select id="filter" class="form-control" >
         		<option value="">--Sort By--</option>
         		<option selected value="asc">Ascending</option>
         		<option  value="date">Date</option>
         		<option  value="desc">Descending</option>
         		<option  value="most_view">Most Viewed</option>
         		<option  value="ratings">Ratings</option>
         	</select>
         </div>
         </form>-->
   </div>
</div>
<div class="row">
   <div id="no-more-tables">
      <table class="col-md-12 table-bordered table-striped table-condensed cf">
         <thead class="cf">
            <tr>
               <th class="ranking_th numeric">Sr.No</th>
               <th class="ranking_th numeric">Categories</th>
               <th class="thumb_th numeric">Status</th>
               <th class="site_th numeric">Proposal</th>
               <th class="votes_th numeric">Votes</th>
            </tr>
         </thead>
         <tbody>
            <!--        <tr>
               <td colspan="4" class="pages"><ul class="pagination"><li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li><li><a href=/page/2>2</a></li><li><a href=/page/2>Next</a></li></ul></td>
               </tr>
               -->      
            <?php if(!empty($allproposal)){ $i=1;
               foreach($allproposal as $proposal){ 
               		$cat=$proposal[2];				
               		$query = "select * FROM `category` where id='".$cat."' "; 
               		$result = mysqli_query($conn, $query);
               		$cal = mysqli_fetch_assoc($result);
               		$catname = $cal['category'];
               		$proposal_id = $proposal[0];			
               		//--count no. of vote up --	
               		$query = "select voteup FROM `votecount` where proposalid='".$proposal_id."' and voteup='1'"; 
               		$result = mysqli_query($conn, $query);
               		$total_voutup = mysqli_num_rows($result);
               					
               		
               		//--count no. of vote up --
               		$query = "select votedown FROM `votecount` where proposalid='".$proposal_id."' and votedown='1'"; 
               		$result = mysqli_query($conn, $query);
               		$total_voutdown = mysqli_num_rows($result);
               	?>  
            <tr>
               <td class="rank">
                  <span class="ranking" data-title="Ranking"><?php echo $i;?></span><br/>
                  <!-- <a href="/category/Shopping">Shopping</a>				 -->
               </td>
               <td style="text-transform: capitalize;"><?php echo $catname;?></td>
               <td class="thumb" data-title="Thumb"><a  class="" style="color: green;text-transform: capitalize;"><?php echo $proposal[6];?></a></td>
               <td class="site" data-title="Sitename">
                  <h3><a href="<?php//  echo $siteURL.'details.php?slug='.$proposal[0];?>" ><?php echo $proposal[1];?></a></h3>
                  <?php echo substr($proposal[3],0,150)."<br>";?>
                  <?php  $start = date('d.m.Y H:i', $proposal[4]);
                     $end = date('d.m.Y H:i', $proposal[5]);
                     echo 'Start Time - '.$start .' - '.$end;
                     ?>
                  <div class="text-center">
                     <!--<a href="http://www.amazon.com" target="_blank"><img src="http://www.toplistlinks.com/images/banner468x60.png" alt="Amazon.com" class="banner" /></a>-->
                  </div>
               </td>
               <!--td class="thumb" data-title="Hits Out"><?php echo $start = date('d.m.Y H:i', $proposal[4]);;?></td>
                  <td class="thumb" data-title="Start Time"><?php echo $start = date('d.m.Y H:i', $proposal[5]);;?></td>
                  <td class="thumb" data-title="End Time"><?php echo $total_voutdown;?></td-->
               <td class="votes" data-title="Votes">
                  <ul class="nav nav-pills">
                     <li class="active"><a href="<?php //echo $siteURL.'details.php?slug='.$proposal[0];?>" target="_blank">Vote <span class="badge">
                        <?php echo $total_voutup;?></span></a>
                     </li>
                  </ul>
               </td>
            </tr>
            <?php $i++; }
               } ?>
         </tbody>
      </table>
   </div>
</div>
<hr>
<div class="row">
   <div class="text-center">
      <a class="btn btn-primary" role="button" href="">Add Link</a>
   </div>
</div>
<hr>
<?php include('footer.php');?>