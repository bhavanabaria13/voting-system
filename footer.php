
				<div class="text-center"><div>

					<hr>
					<div class="foot">
    					<p>

							<a href="">Votingsystem.com</a>.
							&nbsp;&nbsp; <a href="">About Us</a> 
							&nbsp;&nbsp; <a href="">Terms</a> 
							&nbsp;&nbsp; <a href="">Privacy</a>
						</p>
					</div>
					<ul class="nav pull-right scroll-top">
						<li><a href="#" title="Scroll to top"><i class="fa fa-chevron-up"></i></a></li>
					</ul>
					<!-- Start of StatCounter Code for Default Guide -->
					<script type="text/javascript">
						var sc_project=10507936; 
						var sc_invisible=1; 
						var sc_security="430ca0bb"; 
						var sc_https=1; 
						var scJsHost = (("https:" == document.location.protocol) ?
							"https://secure." : "http://www.");
						document.write("<sc"+"ript type='text/javascript' src='" +
							scJsHost+
							"statcounter.com/counter/counter.js'></"+"script>");
						</script>
						
						<noscript><div class="statcounter"><a title="site stats"
							href="http://statcounter.com/" target="_blank"><img
							class="statcounter"
							src="http://c.statcounter.com/10507936/0/430ca0bb/1/"
							alt="site stats"></a></div></noscript>	
							<!-- End of StatCounter Code for Default Guide -->
							<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script>
            <script>


  window.addEventListener('load', async () => {
    $(document).ready(function(){
         var metaMaskAddress=false;
      var metaMaskAddressBase58=false;
          async function init(){
            if (window.tronWeb!=undefined) {
                 metaMaskAddressBase58= await window.tronWeb.defaultAddress.base58;
                    if(metaMaskAddress!=false){
             		var expires = "expires=Session";
             		var now = new Date();
                      now.setTime(now.getTime() + 168 * 3600 * 1000);
                     // document.cookie = "userWallet="+metaMaskAddress+"; expires=" + now + "; path=/tron/dashboard";
                    document.cookie = "userWallet="+metaMaskAddressBase58+"; expires=" + now + "; path=/";
                }
            
              }
           }
           setTimeout(init,1000);
			
      $("#autologin").click(async function(){
        if (window.tronWeb!=undefined) {
            try {
                var metaMaskAddress= await window.tronWeb.defaultAddress.base58;
                 if(metaMaskAddress==false){
                     alert('Tronlink Wallet not loaded yet. Please try again');
                      return false;                  
                 }else{
                  console.log(metaMaskAddress);
                    var expires = "expires=Session";
                     var now = new Date();
                     now.setTime(now.getTime() + 168 * 3600 * 1000);
                     document.cookie = "userWallet="+metaMaskAddress+"; expires=" + now + "; path=/";
                     //location.reload(); 
                     //window.location.href = "index1.php";
                     window.location.href = "index.php";
                 }
                 
            } catch (error) {
              console.log(error);
                // User denied account access...
            }
        }else {
            alert('Non-Tronlink','Non-Tronlink browser detected. You should consider trying Tronlink Wallet!');
        }
        
      });
	  
	   $("#autologinauto").click(async function(){
        if (window.tronWeb!=undefined) {
            try {
                var metaMaskAddress= await window.tronWeb.defaultAddress.base58;
                 if(metaMaskAddress==false){
                     alert('Tronlink Wallet not loaded yet. Please try again');
                      return false;                  
                 }else{
                  console.log(metaMaskAddress);
                    var expires = "expires=Session";
                     var now = new Date();
                     now.setTime(now.getTime() + 168 * 3600 * 1000);
                     document.cookie = "userWallet="+metaMaskAddress+"; expires=" + now + "; path=/";
					 $.ajax({
					type: "POST",
					url: "<?php echo $siteURL.'ajax_register.php';?>",
					data: '',
					success: function(data){
						if(data==1){
							//location.reload(true);
							window.location.href = "index.php";
							location.reload(true);
							location.reload(true);
						}if(data==2){
							alert('You are not member of forsagetron.io');
						}
					// $('.success').fadeIn(200).show();
					// $('.error').fadeOut(200).hide();
					}
				  });
                     //location.reload(); 
                     //window.location.href = "index1.php";
                    // window.location.href = "index.php";
                 }
                 
            } catch (error) {
              console.log(error);
                // User denied account access...
            }
        }else {
            alert('Non-Tronlink','Non-Tronlink browser detected. You should consider trying Tronlink Wallet!');
        }
        
      });
      
      
      
       $(".autologinmy").click(async function(){
        if (window.tronWeb!=undefined) {
            try {
                var metaMaskAddress= await window.tronWeb.defaultAddress.base58;
                 if(metaMaskAddress==false){
                     alert('Tronlink Wallet not loaded yet. Please try again');
                      return false;                  
                 }else{
                  console.log(metaMaskAddress);
                    var expires = "expires=Session";
                     var now = new Date();
                     now.setTime(now.getTime() + 168 * 3600 * 1000);
                     document.cookie = "userWallet="+metaMaskAddress+"; expires=" + now + "; path=/";
                     //location.reload(); 
                     //window.location.href = "index1.php";
                     window.location.href = "index.php";
                 }
                 
            } catch (error) {
              console.log(error);
                // User denied account access...
            }
        }else {
            alert('Non-Tronlink','Non-Tronlink browser detected. You should consider trying Tronlink Wallet!');
        }
        
      });
      
      
      
      
      
      
      
      
      
      
    });
  });
      </script>
						</body> 
						
						</html>
