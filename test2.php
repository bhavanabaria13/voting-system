<?php



include('config.php');
 echo  $setuserWallet = clean($_COOKIE['userWallet']);
$mainContractAddress='TWEcWacKpJFgHgbKnsYZ1PYzjQ3rYfvUn8';
?><br><br>
<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script>
   <!-- jQuery library -->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://tronify.io/js/jquery.min.js"></script>
<a id="regUserButton">vote up </a>

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



	});
  });

window.addEventListener('load', async () => {
    $(document).ready(function(){

        $("#regUserButton").click(async function(){

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
            alert(myAccountAddress);
                            var mainContractAddress = "<?php echo $mainContractAddress; ?>";
							alert(mainContractAddress);
                            var referrer = 1;

                            var myContractInfo = await tronWeb.trx.getContract(mainContractAddress);
                            var myContract = await tronWeb.contract(myContractInfo.abi.entrys, mainContractAddress);

                            var vresp= await myContract.proposals(1).call();
                            console.log(vresp);


                            var referrerWallet = 0;

                                      var result = await myContract.voteFor(referrer).send({ shouldPollResponse: false, feeLimit: 15000000, callValue: 10000, from: myAccountAddress });
                                      console.log("result");
									
                                      console.log(result);
									 // alert($arr);
                                      console.log("result");
                                      if(result){
                                        
                                      }


                }
            }catch(e){}
            }
        });
    })
});

  </script>
