<?php



/*

$userwallet = 'TJaHQQ72pC6XazztK3HjJb4M4mw4K4uiNP';
$url = 'https://forsagetron.io/dashboard/getuserbywallet.php';
$cURLConnection = curl_init();
$data = array(
    'userwallet' => 'TJaHQQ72pC6XazztK3HjJb4M4mw4K4uiNP'
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
echo $error;
curl_close($cURLConnection);
$data = explode("title='Click to view full list'>",$etherscanCode);
print_R($data);
if ($data[0]!='0') { echo 'ttt';
$data = explode("</a> transactions",$data[1]);
$totalTransactions = $data[0];
}else{
    echo '222';
}*/


include('config.php');
 echo  $setuserWallet = clean($_COOKIE['userWallet']);
  
?><br><br>

   <!-- jQuery library -->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://tronify.io/js/jquery.min.js"></script>
<a id="regUserButton">vote up </a>
<button  type="submit" id="regUserButton" class="btn auth-sign__btn">Join <span id="approvingLoader" >  </span></button>

<script>


  window.addEventListener('load', async () => {
    $(document).ready(function(){
         var metaMaskAddress=false;
      var metaMaskAddressBase58=false;
        
          async function init(){
        
            if (window.tronWeb!=undefined) {
                 metaMaskAddress= await window.tronWeb.defaultAddress.hex;
                 metaMaskAddressBase58= await window.tronWeb.defaultAddress.base58;
                    if(metaMaskAddress!=false){
            	 metaMaskAddress = metaMaskAddress.substring(2);
                 metaMaskAddress = '0x'+metaMaskAddress;
                 console.log(metaMaskAddress);
//             	 await new Promise((resolve, reject) => setTimeout(resolve, 2000));
             		var expires = "expires=Session";
             		var now = new Date();
                      now.setTime(now.getTime() + 168 * 3600 * 1000);
                     // document.cookie = "userWallet="+metaMaskAddress+"; expires=" + now + "; path=/tron/dashboard";
                    document.cookie = "userWallet="+metaMaskAddressBase58+"; expires=" + now + "; path=/";
                }
            
              }
           }
           setTimeout(init,1000);
			
      $("#loginAutomaticallyButton").click(async function(){
          
        if (window.tronWeb!=undefined) {
            
            try {
                 
        
        var metaMaskAddress= await window.tronWeb.defaultAddress.base58;
                 if(metaMaskAddress==false){
                     alertify.warning('Tronlink Wallet not loaded yet. Please try again');
                      return false;                  
                 }else{
                  console.log(metaMaskAddress);
                    
                    var expires = "expires=Session";
                    
                     var now = new Date();
                     now.setTime(now.getTime() + 168 * 3600 * 1000);
                     
                    
                     document.cookie = "userWallet="+metaMaskAddress+"; expires=" + now + "; path=/";
                     //location.reload(); 
                     window.location.href = "<?php echo SITE_URL; ?>dashboard/?";
                 }
                 
            } catch (error) {
              console.log(error);
                // User denied account access...
            }
        }else {
            //alertify.alert('Non-Tronlink','Non-Tronlink browser detected. You should consider trying Tronlink Wallet!');
        }
        
      });

      $("#manualEntryButton").click(function(){
          
          var str = $("#manualEntryInput").val();
          console.log(str);
          str = str.replace(/\s/g,'');    //removing spaces

        var blockedIPs=[""];
        
          if(blockedIPs.includes(str) ){
              alertify.alert("Temporary Disabled","Viewing of this  ID is temporary disabled  due  to  high  data  load.  You  can  verify  all  details about it  at  Tronscan.org");
              return;
          }
          /*
          var strPass = $("#manualEntryPassword").val();
          strPass = strPass.replace(/\s/g,'');
          */

          if ((typeof str !== 'undefined' && str != '')) {

            //now chekcing if it is user ID, which should be 10 digit long and should be only numbers
            if(str.match(/^[0-9]+$/) != null){

              var now = new Date();
              now.setTime(now.getTime() + 1 * 3600 * 1000);
              document.cookie = "userID="+str+"; expires=" + now.toUTCString() + "; path=/";

              window.location.href = "<?php echo SITE_URL; ?>dashboard/?";

            } else if(str.length == 42){

              var now = new Date();
              now.setTime(now.getTime() + 168 * 3600 * 1000);
              document.cookie = "userWallet="+str+"; expires=" + now.toUTCString() + "; path=/";

              window.location.href = "<?php echo SITE_URL; ?>dashboard/?";

            } else {

              $('#manualErrorMsg').text('Invalid User ID or Wallet Address');

            }
            $('#manualErrorMsg').text("");
            $('#manualPassErrorMsg').text("");

          } else {

            $('#manualErrorMsg').text("");
            $('#manualPassErrorMsg').text("");

            if(str == ''){
              $('#manualErrorMsg').text('Enter User ID or Wallet Address');  
            }        

          }
      });
    });
  });

window.addEventListener('load', async () => {
    $(document).ready(function(){
        
        $("#regUserButton").click(async function(){
        alert();
            // Modern dapp browsers...
            if (window.tronWeb!=undefined) {
                try {
                    // var way_of_reaching_us = 'other';
                    // way_of_reaching_us = document.getElementById("way_of_reaching_us").value;
                    // Acccounts now exposed
                    var metaMaskAddress= await window.tronWeb.defaultAddress.base58;
                    if(metaMaskAddress==false){
                         alertify.alert('Login','Please Login to Tronlink Wallet.');
                          return false;                  
                    }
                       
                        if(metaMaskAddress !=false){
                            var myAccountAddress=metaMaskAddress;
            
                            var mainContractAddress = "<?php echo $mainContractAddress; ?>";
							alert(mainContractAddress);
                            var referrer = document.getElementById("regReferralID").value;

                            var myContractInfo = await tronWeb.trx.getContract(mainContractAddress);
                            var myContract = await tronWeb.contract(myContractInfo.abi.entrys, mainContractAddress);
                            var valuePass = await myContract.levelPrice(1).call();
                            valuePass = window.tronWeb.toDecimal(valuePass) * 2;
                            console.log(valuePass);
                            console.log(referrer);
                            
                            var referrerWallet = 0;
                            
                            $.ajax({
                              url: 'https://forsagetron.io/dashboard/getuserbywallet.php',
                              type: 'POST',
                              data: {referrerID: referrer},
                              success: function (val, status) {
                                referrerWallet = val;
                                
                                console.log(referrerWallet);
                                
                                getRef(myContract, referrerWallet);
                                
                                async function getRef(myContract, referrer){
                                    
                                    if(referrer == ""){
                                        alertify.warning("Please enter referrer ID.");
                                    } else {
                                        console.log("result2");
                                        var result = await myContract.registrationExt(referrer).send({ shouldPollResponse: false, feeLimit: 15000000, callValue: valuePass, from: myAccountAddress });
                                        console.log("result");
                                        console.log(result);
                                        console.log("result");
                                        if(result){
                                           /* xhttp.open("GET", "https://forsagetron.io/dashboard/includes/getUserIdFromTransactionHash.php?metaMaskAddress="+metaMaskAddress+"&way_of_reaching_us="+way_of_reaching_us, false);
                                                  xhttp.send();*/

                                            alertify.alert("Transacton Recorded","Thanks for joining <?=$siteName;?> You can check the status at <a href='<?=$etherscanTx;?>"+result+"' target='_blank'>Tronscan</a><br><br> Once transaction is confirmed in Blockchain, you can come back to this page and login into your account.", function(){});
                                        }
                                    }
                                }
                                
                              },
                              error: function (jqXHR, textStatus, errorThrown) {
                                console.log('Error Ajax request: ' + jqXHR.responseText);
                                
                              }
                            });
                            
                            
                }
            }catch(e){}
            }
        });
    })
});

  </script>
   
