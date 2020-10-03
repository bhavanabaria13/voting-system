
	<?php 

require_once('config.php');


global $siteURL;
//echo $siteURL;?>  
<!DOCTYPE html><html lang="en-US" class="no-js no-svg"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/> 
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

        }, 3000);
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
		//window.location.href = "<?php echo $siteURL.'signup.php'?>";
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
        location.reload(true);
      }

      localStorage.setItem('islocked', 0);
      localStorage.removeItem('myAccountAddress'); 
      myAccountAddress = null;
      
      document.cookie = 'authenticated_wallet=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	 // window.location.href = "<?php echo $siteURL.'signup.php'?>";
	  window.location.href = "https://gov.forsagetron.io/";

    } else if(myAccountAddress != my_Account){

      localStorage.setItem('myAccountAddress', myAccountAddress);
      var now = new Date();
      now.setTime(now.getTime() + 1 * 3600 * 1000);
      document.cookie = "authenticated_wallet="+myAccountAddress+"; expires=" + now.toUTCString() + "; path=/";
		//window.location.href = "<?php echo $siteURL.'signup.php'?>";
		window.location.href = "https://gov.forsagetron.io/";
      location.reload(true);

    }

}</script> <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css"><link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css"> <script src="//cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" defer></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" defer></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" defer></script> <script src="http://my.tokencomics.io/tctron/wp-content/cache/autoptimize/js/autoptimize_single_50d28bc73a08cd1ae8da0cf70f059947.js" defer></script> <script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>