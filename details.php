<?php include('header.php');
   $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
   	$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   	$e = explode("?", $url);
   	//print_r($e[1]);
   	$slug = explode("=", $e[1]);
   	//print_r($slug[1]);
   	$proposal_id=$slug[1];
   	$query = "SELECT * FROM proposal where id = '".$proposal_id."' ";
   	$result = mysqli_query($conn,$query);
   	$proposal = mysqli_fetch_array($result);
   	$proposalid = $proposal['id'];
		$hitcount = $proposal['hitcount'];
    $userWallet1 = $_SESSION["userWallet"];
    $userids = $_SESSION["userid"] ;


	//-----------------smart contract code-------------------
	 
   
	$query = "select sum(voteup) as upcount,sum(votedown)  as downcount FROM `votecount` where proposalid='".$proposal_id."' and userid='".$userids."' ";
    	$result = mysqli_query($conn, $query);
    	$votecounts = mysqli_fetch_array($result);
			 $total_voutup1=(int)$votecounts['upcount'];
			 $total_voutdown1=(int)$votecounts['downcount'];
			
	
	
	//------------------end code-----------------------------------------------------------------

//-- hit count code--
	$hitcount= $hitcount + 1;
//$query = "SELECT * FROM proposal where id = '".$proposal_id."' ";
	$query = "UPDATE proposal SET hitcount='".$hitcount."' WHERE id='".$proposal_id."'";
   	$result = mysqli_query($conn,$query);



//---------------------------



   	//--count no. of vote up --
   /*	$query = "select voteup FROM `votecount` where proposalid='".$proposal_id."' and voteup='1'";
   	$result = mysqli_query($conn, $query);
   	$total_voutup = mysqli_num_rows($result);


   	//--count no. of vote up --
   	$query = "select votedown FROM `votecount` where proposalid='".$proposal_id."' and votedown='1'";
   	$result = mysqli_query($conn, $query);
   	$total_voutdown = mysqli_num_rows($result);*/
		$query = "select sum(voteup) as upcount,sum(votedown)  as downcount FROM `votecount` where proposalid='".$proposal_id."'";
    	$result = mysqli_query($conn, $query);
    	$votecounts = mysqli_fetch_array($result);
			$total_voutup=(int)$votecounts['upcount'];
			$total_voutdown=(int)$votecounts['downcount'];


   	//-- check user exists on not
       $query = "select * FROM `user_table` where userwallet='".$userWallet1."' and userid='".$userids."' and status='1' ";
   		$result = mysqli_query($conn, $query);
   		 $numrows = mysqli_num_rows($result);
   		//die;

   if(isset($_POST['submitemail'])){
		// echo "<br><br><br><br><br><br>";
		// print_r($_POST);
   	$fullname = $_POST['fullname'];
   	$email = $_POST['email'];
   	$user = $_POST['user'];
   	$detail = $_POST['detail'];
   	$userWallet1 = $_SESSION["userWallet"];

   	$userids = $_SESSION["userid"] ;
   	$time = time();
   	if($_SESSION["userid"]!=''){

   	if($detail=='checkfrm'){
			$recordid=0;
   		$query = "select * FROM `user_table` where userwallet='".$_SESSION["userWallet"]."'";
   		$result = mysqli_query($conn, $query);
   		$row = mysqli_num_rows($result);
			$verifycode = rand();
   		if($row > 0){
				$k=mysqli_fetch_assoc($result);
		//	print_r($k);die;
				$recordid = $k['id'];
				$queryupdate = "update `user_table` set `fullname`='".$fullname."', `email`='".$email."',`verifycode`='".$verifycode."' where userwallet='".$_SESSION["userWallet"]."'";
				mysqli_query($conn, $queryupdate);
			}
			else{
   			  $queryinsert = "INSERT INTO `user_table` (`id`, `userid`, `userwallet`, `fullname`, `email`, `status`, `created` ,`verifycode`) VALUES (NULL, '".$userids."', '".$_SESSION["userWallet"]."', '".$fullname."', '".$email."', '0', '".$time."','".$verifycode."')";
   			  mysqli_query($conn, $queryinsert);
   			  $recordid = mysqli_insert_id($conn);
				}
   			 $link = $siteURL.'verify.php?slug='.$recordid.'&verify='.$verifycode;
   			 // email code
   			 $to = $email;
   			 $subject = "gov.forsagetron.io Verification mail ";

   			 $message = "<b style='font-size:20px'>Hello ".$fullname.",</b><br><br>";
   			 $message .= "Please verify your account by clicking on Verification Link.<br><br>";

   			  $message .= "<a href='".$link."' style='color: black;    background: yellow;    padding: 11px 13px;    border-radius: 6px;
       		font-size: 16px;' >Verification Link.</a>";

   			 $header = "From: info@noxlive.io \r\n";
   			// $header .= "Cc:nobody@example.com \r\n";
   			 $header .= "MIME-Version: 1.0\r\n";
   			 $header .= "Content-type: text/html\r\n";

   			 $retval = mail ($to,$subject,$message,$header);
   			}



   			 if( $retval == true ) {
   				//echo "Message sent successfully...";
   				?>
						<script>
						   alert('Message sent successfully...');
						</script>
						<?php
			   }else {
			   //echo "Message could not be sent...";
			   ?>
			<script>
			   alert('Message could not be sent...');
			</script>
			<?php
			   }


   	}
   else{ ?>
			<script>
			   alert('Please Connect to wallet.');
			</script>
			<?php
   	}
   }
  


















  $successmsg ='';
   $errormsg='';

   if(isset($_POST['comments'])){
   $comments = $_POST['comments'];
   $userid = $_POST['userid'];
   $proposalid = $_POST['proposalid'];
   $catid = $_POST['catid'];

   $userWallet = $_SESSION['userWallet'];

   if($_SESSION["userid"]!='' && $catid!=''){
   $time=time();
   $queryinsert = "INSERT INTO `comment` (`id`, `catid`, `proposalid`, `comments`, `created`, `updated`, `userid`, `forsageuserid`) VALUES (NULL, '".$catid."', '".$proposalid."', '".$comments."', '".$time."', '', '".$userid."', '".$userid."')";
   			  //  echo $queryinsert;
   			   mysqli_query($conn, $queryinsert);
   			  $successmsg= "Thank you for comment.";
   			 ?>
<script>
   alert('Thank your for comment.');
</script>
<?php
   }else{ ?>
<script>
   alert('Please login to give comments');
</script>
<?php }
   }


   if($_SESSION["succmsg"]!=''){ ?>
<script>
   alert('<?php echo $_SESSION["succmsg"];?>');
</script>
<?php $_SESSION["succmsg"] ='';unset ($_SESSION["succmsg"]);
   }
   if($_SESSION["errmsg"]!=''){ ?>
<script>
   alert('<?php echo $_SESSION["errmsg"];?>');
</script>
<?php $_SESSION["errmsg"]=''; unset ($_SESSION["errmsg"]);
   }




   $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
   $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   $e = explode("?", $url);
   //print_r($e[1]);
   $slug = explode("=", $e[1]);
   //print_r($slug[1]);
   $proposal_id=$slug[1];
   $query = "SELECT * FROM proposal where id = '".$proposal_id."' ";
   $result = mysqli_query($conn,$query);
   $row = mysqli_fetch_array($result);
   if(!empty($row)){


   ?>
<style>
   /* The popup form - hidden by default */
   .form-popup {
   display: none;
   position: fixed;
   bottom: 0;
   right: 15px;
   border: 3px solid #f1f1f1;
   z-index: 9;
   }
   /* Add styles to the form container */
   .form-container {
   max-width: 300px;
   padding: 10px;
   background-color: white;
   }
   /* Full-width input fields */
   .form-container input[type=text], .form-container input[type=password] {
   width: 100%;
   padding: 15px;
   margin: 5px 0 22px 0;
   border: none;
   background: #f1f1f1;
   }
   /* When the inputs get focus, do something */
   .form-container input[type=text]:focus, .form-container input[type=password]:focus {
   background-color: #ddd;
   outline: none;
   }
   /* Set a style for the submit/login button */
   .form-container .btn {
   background-color: #4CAF50;
   color: white;
   padding: 16px 20px;
   border: none;
   cursor: pointer;
   width: 100%;
   margin-bottom:10px;
   opacity: 0.8;
   }
   /* Add a red background color to the cancel button */
   .form-container .cancel {
   background-color: red;
   }
   /* Add some hover effects to buttons */
   .form-container .btn:hover, .open-button:hover {
   opacity: 1;
   }
</style>
<!--
   <button class="open-button" onclick="openForm()">Open Form</button>
   <div class="form-popup" id="myForm">
     <form action="<?php echo $siteURL.'details.php?slug='.$row[0];?>" class="form-container" method="post">
       <h1>Details Form</h1>

   	<label for="email"><b>Fullname</b></label>
       <input type="text" placeholder="Enter Name" name="fullname" required>

       <label for="email"><b>Email</b></label>
       <input type="text" placeholder="Enter Email" name="email" required>
     <input type="hidden" name="user" value="forsagetron">
       <input type="hidden" name="detail" value="checkfrm">
       <button type="submit" class="btn">Submit</button>
       <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
     </form>-->
</div>
<script>
   function openForm() {
     document.getElementById("myForm").style.display = "block";
   }

   function closeForm() {
     document.getElementById("myForm").style.display = "none";
   }
</script>
<div class="container" id="toplist">
   <div class="row">
      <hr class="hr-primary" />
      <ol class="breadcrumb bread-primary ">
         <li><a href=""><i class="fa fa-newspaper-o"></i> Propasal Details: <?php echo $row['proposal_name'];?></a></li>
      </ol>
   </div>
   <div class="row">
      <div class="col-md-8">
         <div class="title">
            <h2>
               YIP: Release fee rewards #<?php echo $row['YFItoken'];?>
            </h2>
         </div>
         <div class="btn-status">
            <span class="bg-purple State mb-4"><?php echo $row['proposalstatus'];?></span>
            <?php if($row['proposalstatus']!='close') { ?>
            <?php if($numrows > 0){ ?>
            <?php if($total_voutup1<='0'){?>
		 	 <a class="bg-purple State mb-4" id="voteupsc"  ><i class="fa fa-thumbs-up"></i> (<span id="voteupcount"><?php echo $total_voutup;?></span>)</a>
		 <?php }else{ ?>
		  <a disabled class="bg-purple State mb-4 disabled"   ><i class="fa fa-thumbs-up"></i> (<span id="voteupcount"><?php echo $total_voutup;?></span>)</a>
		 <?php } ?>
		  <?php if($total_voutdown1<='0'){?>
		 	 <a class="bg-purple State mb-4" id="votedownsc"  ><i class="fa fa-thumbs-down"></i> (<span id="votedowncount"><?php echo $total_voutdown;?></span>)</a>
		 <?php }else{ ?>
		<a disabled class="bg-purple State mb-4 disabled"   ><i class="fa fa-thumbs-down"></i> (<span id="votedowncount"><?php echo $total_voutdown;?></span>)</a>
		 <?php } ?>
		
            <?php }
               elseif($_SESSION["userWallet"]!='' && ($numrows=='' || $numrows =='0')){ ?>
            <a type="button" class="bg-purple State mb-4 disabled1" data-toggle="modal" data-target="#login_modal" style="cursor: pointer;">
            <i class="fa fa-thumbs-up"></i> (<?php echo $total_voutup;?>)</a>
            <a type="button" class="bg-purple State mb-4 disabled1" data-toggle="modal" data-target="#login_modal" style="cursor: pointer;">
            <i class="fa fa-thumbs-down"></i> (<?php echo $total_voutdown;?>)</a>
            <?php	}
               else{ ?>
.            <a disabled class="bg-purple State mb-4 disabled" >   <i class="fa fa-thumbs-up"></i> (<?php echo $total_voutup;?>) </a>
            <a disabled class="bg-purple State mb-4 disabled" >   <i class="fa fa-thumbs-down"></i> (<?php echo $total_voutdown;?>) </a>
            <?php }
               }else{ ?>
            <a disabled class="bg-purple State mb-4 disabled" >   <i class="fa fa-thumbs-up"></i> (<?php echo $total_voutup;?>) </a>
            <a disabled class="bg-purple State mb-4 disabled " >   <i class="fa fa-thumbs-down"></i> (<?php echo $total_voutdown;?>) </a>
            <?php	} ?>
			<a disabled class="bg-purple State mb-4" >   hitcount (<?php echo $hitcount;?>) </a>
			
         </div>
         <!-- Modal -->
         <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Users Details</h4>
                  </div>
                  <div class="modal-body">
                     <h2>Users Details</h2>
                     <form action="<?php echo $siteURL.'details.php?slug='.$row['id'];?>" method="post">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Email address</label>
                           <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Full name</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" name ="fullname" placeholder="Full name" required>
                           <input type="hidden" name="user" value="forsagetron">
                           <input type="hidden" name="detail" value="checkfrm">
                        </div>
                        <button type="submit" name="submitemail" class="btn btn-success btn-block">Submit</button>
                     </form>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
               </div>
            </div>
         </div>
		 
		 
		 <!-------------------------votefor function 2 october---------------------------------------------------------------->
			  
            
		<script>


window.addEventListener('load', async () => {
    $(document).ready(function(){

        $("#voteupsc").click(async function(){
			var voteup = 1;
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
                            var referrer = "<?php echo $row['id'];?>";

                            var myContractInfo = await tronWeb.trx.getContract(mainContractAddress);
                            var myContract = await tronWeb.contract(myContractInfo.abi.entrys, mainContractAddress);

                            //var vresp= await myContract.proposals(1).call();
                           // console.log(vresp);


                            var referrerWallet = 0;

                                      var result = await myContract.voteFor(referrer).send({ shouldPollResponse: false, feeLimit: 15000000, callValue: 10000, from: myAccountAddress });
									 
                                      console.log(result);
                                      if(result){
										var transactionid = result;
										var msg= ("Thanks for voting <?=$siteName;?> You can check the status at <a href='<?=$etherscanAddressTestnet.$tronscanTx;?>"+result+"' target='_blank'>Tronscan</a><br>");
										console.log(msg);
										

										alert(msg);
									//	alert("Transacton Recorded","Thanks for voting <?=$etherscanAddressTestnet.$siteName;?> You can check the status at <a href='<?=$tronscanTx;?>"+result+"' target='_blank'>Tronscan</a><br>");

                                      }


                }
            }catch(e){}
            }
        });
   

$("#votedownsc").click(async function(){
			var voteup = 1;
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
                            var referrer = "<?php echo $row['id'];?>";

                            var myContractInfo = await tronWeb.trx.getContract(mainContractAddress);
                            var myContract = await tronWeb.contract(myContractInfo.abi.entrys, mainContractAddress);

                            //var vresp= await myContract.proposals(1).call();
                           // console.log(vresp);


                            var referrerWallet = 0;

                                      var result = await myContract.voteAgainst(referrer).send({ shouldPollResponse: false, feeLimit: 15000000, callValue: 10000, from: myAccountAddress });
									 
                                      console.log(result);
                                      if(result){
										var transactionid = result;
										var msg= ("Thanks for voting <?=$siteName;?> You can check the status at <a href='<?=$etherscanAddressTestnet.$tronscanTx;?>"+result+"' target='_blank'>Tronscan</a><br>");
										console.log(msg);
										

										alert(msg);
									//	alert("Transacton Recorded","Thanks for voting <?=$etherscanAddressTestnet.$siteName;?> You can check the status at <a href='<?=$tronscanTx;?>"+result+"' target='_blank'>Tronscan</a><br>");

                                      }


                }
            }catch(e){}
            }
        });
   

   })
});

  </script>

		 <!------------------------------------------------------------------------------------------>
         <script>
            function  givevote(votepass){
            	//document.getElementById("theFormvoteup").submit();
							$.ajax({
									url: 'getvote.php',
									type: 'POST',
									data: {votepass: votepass,userid:'<?php echo $_SESSION["userid"];?>',proposalid:'<?php echo $row['id'];?>'},
									success: function (data) {
										data=JSON.parse(data);
										//alert(data);
										if(data=="Thank you for vote this proposal"){
											if(votepass==1)
											{
												var vcnt=$("#voteupcount").html();
												$("#voteupcount").html(parseInt(vcnt)+1);
											}
											else {
												var vcnt=$("#votedowncount").html();
												$("#votedowncount").html(parseInt(vcnt)+1);
											}
										}
									}
								});

            }
         </script>
         <div></div>
         <div class="content">
            <div class="markdown-body break-word mb-6">
               <!--p>Summary:</p-->
               <?php echo $row['description'];?>
            </div>
            <!--------Comment section----------------->
            <?php if($numrows > 0){ ?>
            <div>
               <form method="post" id="frmcmt">
                  <div class="input-group input-group-md">
                     <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION["userid"];?>">
                     <input type="hidden" name="proposalid" id="proposalid" value="<?php echo $row['id'];?>">
                     <input type="hidden" name="catid" id="catid" value="<?php echo $row['catid'];?>">
                     <span class="input-group-addon" id="sizing-addon1">Comment</span>
                     <textarea name="comments" id="comments" class="form-control"></textarea>
                  </div>
                  <br>
                  
				  <a onclick="nmo()"  class="btn btn-info btn-block"> post</a>
                  <br>
               </form>
			   <script type="text/javascript" >
				 function nmo(){
				  var userid = $("#userid").val();
				  var catid = $("#catid").val();
				  var comments = $("#comments").val();
				  
				  var proposalid = $("#proposalid").val();
				  
				  var dataString = 'catid='+ catid + '&userid=' + userid + '&comments=' + comments + '&proposalid=' + proposalid;
//alert(dataString);
				if(comments=='')
				{
				  $('.success').fadeOut(200).hide();
				  $('.error').fadeOut(200).show();
				}
				else
				{
				  $.ajax({
					type: "POST",
					url: "<?php echo $siteURL.'comments.php';?>",
					data: dataString,
					success: function(data){
						
						if(data==1){
							alert('Thank you for comment.');
						}
					// $('.success').fadeIn(200).show();
					// $('.error').fadeOut(200).hide();
					}
				  });
				}
				return false;
				  }
				</script>
				
            </div>
            <?php } ?>
			<?php  $query = "select * FROM `votecount` where proposalid='".$proposal_id."'";
			$resultss = mysqli_query($conn, $query);
			$norow = mysqli_num_rows($resultss);
			$allresult = mysqli_fetch_all($resultss);
			?>
            <div class="border-top border-bottom border-md rounded-0 rounded-md-2 mb-4 block-bg">
               <h4 class="px-4 py-3 border-bottom d-block bg-gray-dark rounded-top-0 rounded-md-top-2"> Votes <span data-v-3469808b="" class="Counter ml-1"><?php echo $norow;?></span></h4>
               <div class="">
			  
<?php 
			   
			
   
			 
		//	print_r($allresult);
			if(!empty($allresult)){
				//print_r($allresult);
				foreach($allresult as $res){
					//print_r($res);
					 $uid= $res[1];
					$voteup= $res[5];
					$votedown= $res[6];
					$wallet= $res[4];
				
			  $query = "select * FROM `user_table` where userid='".$uid."'";
			$re = mysqli_query($conn, $query);
			$alsult = mysqli_fetch_assoc($re);
			$wallets= $alsult['userwallet'];
			?>
<div class="px-4 py-3 border-top d-flex" style="border: 0px !important;">
                     <span class="column">
                        <a target="_blank" class="no-wrap">
                           <div class="d-inline-block v-align-middle line-height-0 mr-1">
                              <div style="border-radius: 8px; overflow: hidden; padding: 0px; margin: 0px; width: 16px; height: 16px; display: inline-block; background: rgb(21, 152, 242);">
                                 <svg x="0" y="0" width="16" height="16">
                                    <rect x="0" y="0" width="16" height="16" transform="translate(1.3191608397935475 0.5272271286667383) rotate(122.2 8 8)" fill="#F19E02"></rect>
                                    <rect x="0" y="0" width="16" height="16" transform="translate(1.163155600210493 -5.8966206917648885) rotate(302.1 8 8)" fill="#C7144C"></rect>
                                    <rect x="0" y="0" width="16" height="16" transform="translate(-0.2991085089188318 13.437447722847798) rotate(178.1 8 8)" fill="#F73F01"></rect>
                                 </svg>
                              </div>
                           </div>
						   <a href="<?php echo $etherscanAddress.$wallets; ?>" target="_blank" class="openLink"><?php echo substr($wallets, 0, 5) . '...' . substr($wallets, -5) ; ?>
							</a>
                           <span>
                              <!----><!---->
                           </span>
                        </a>
                        <!---->
                     </span>
                     <div class="flex-auto text-center text-white">Set breaker to true</div>
                     <div class="column text-right text-white"><span aria-label="0 YFI" class="tooltipped tooltipped-n"> 0 YFI </span><a target="_blank" title="Receipt" class="ml-2 text-gray"><i data-v-031ff5a7="" class="iconfont iconsignature"></i></a></div>
                  </div>
				                   

<?php }
			}else{
				echo '<p style="text-align:center">No Votes found..</p>';
			}
?>
								  
				  
                
				  <!---->
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="border-top border-bottom border-md rounded-0 rounded-md-2 mb-4 block-bg">
            <h4 class="px-4 py-3 border-bottom d-block bg-gray-dark rounded-top-0 rounded-md-top-2">
               Informations <!---->
            </h4>
            <div class="p-4">
               <div class="mb-1 overflow-hidden"><b>Token(s)</b><span class="float-right text-white"><span><img src="https://raw.githubusercontent.com/bonustrack/snapshot-spaces/master/spaces/yearn/logo.png" class="d-inline-block bg-gray-9 v-align-middle line-height-0 circle border" style="width: 22px; height: 22px;"> YFI <span class="mr-1" style="display: none;">+</span></span></span></div>
               <div class="mb-1">
                  <b>Author</b>
                  <span class="float-right">
                     <a target="_blank" class="no-wrap">
                        <div class="d-inline-block v-align-middle line-height-0 mr-1">
                           <div style="border-radius: 8px; overflow: hidden; padding: 0px; margin: 0px; width: 16px; height: 16px; display: inline-block; background: rgb(247, 63, 1);">
                              <svg x="0" y="0" width="16" height="16">
                                 <rect x="0" y="0" width="16" height="16" transform="translate(2.375350564132803 4.160803727122366) rotate(220.3 8 8)" fill="#1598F2"></rect>
                                 <rect x="0" y="0" width="16" height="16" transform="translate(-7.437526834981239 7.348265148018029) rotate(193.1 8 8)" fill="#FC7500"></rect>
                                 <rect x="0" y="0" width="16" height="16" transform="translate(-5.986444825889106 14.27684258718817) rotate(168.3 8 8)" fill="#F3C100"></rect>
                              </svg>
                           </div>
                        </div>
                        <?php echo $row['userwallet'];?>
                        <span>
                           <span data-v-421ee3b3="" class="Label border v-align-middle ml-1">Core</span><!---->
                        </span>
                     </a>
                     <!---->
                  </span>
               </div>
               <div class="mb-1"><b>IPFS</b><a href="<?php echo $row['IPFSlink'];?>" target="_blank" class="float-right"> #<?php echo $row['IPFS'];?> <i data-v-031ff5a7="" class="iconfont ml-1 iconexternal-link"></i></a></div>
               <div>
                  <div class="mb-1"><b>Start date</b><span title="-5d -14h -9m -25s -21ms" class="float-right text-white"><?php echo $start = date('d.m.Y H:i', $row['startingdate']);?></span></div>
                  <div class="mb-1"><b>End date</b><span title="-2d -14h -9m -25s -91ms" class="float-right text-white"><?php echo $start = date('d.m.Y H:i', $row['enddate']);?></span></div>
                  <div class="mb-1"><b>Snapshot</b><a href="https://etherscan.io/block/10905651" target="_blank" class="float-right"> 0
				  <i data-v-031ff5a7="" class="iconfont ml-1 iconexternal-link"></i></a></div>
               </div>
            </div>
         </div>
         <div class="border-top border-bottom border-md rounded-0 rounded-md-2 mb-4 block-bg">
            <h4 class="px-4 py-3 border-bottom d-block bg-gray-dark rounded-top-0 rounded-md-top-2">
               Results <!---->
            </h4>
            <div class="p-4">
               <div>
			   <?php 
			$totalvote = $norow;
			
$new_up = ($total_voutup / 100) * $totalvote;

$new_down = ($total_voutdown / 100) * $totalvote;

			   ?>
                  <div class="text-white mb-1">
                     <span class="mr-1">Set breaker...</span>
                     <span aria-label="1.16k YFI" class="mr-1 tooltipped tooltipped-n"> 0 YFI </span>
                     <span class="float-right"><?php echo $new_up;?>%</span>
                  </div>
                  <!-- <span data-v-3566e8ef="" class="Progress Progress--small overflow-hidden anim-scale-in mb-3"><span data-v-3566e8ef="" title="1.16k YFI" class="bg-blue" style="width: 94.851%;"></span></span> -->
                  <div class="progress">
                     <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $new_up;?>%;">
                        <?php echo $new_up;?>%
                     </div>
                  </div>
               </div>
               <div>
                  <div class="text-white mb-1">
                     <span class="mr-1">Keep things...</span>
                     <span aria-label="0 YFI" class="mr-1 tooltipped tooltipped-n"> 0 YFI </span>
                     <span class="float-right"><?php echo $new_down;?>%</span>
                  </div>
                  <!-- <span data-v-3566e8ef="" class="Progress Progress--small overflow-hidden anim-scale-in mb-3">
                     <span data-v-3566e8ef="" title="63.04 YFI" class="bg-blue" style="width: 5.149%;"></span>
                     </span> -->
                  <div class="progress">
                     <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $new_down;?>%;">
                        <?php echo $new_down;?>%
                     </div>
                  </div>
               </div>
              <!-- <button data-v-3bce6c50="" type="button" class="button width-full mt-2" disabled> Download report </button>-->
            </div>
         </div>
      </div>
   </div>
   <?php 

$file = $_GET["file"] .".pdf"; 

// We will be outputting a PDF 
header('Content-Type: application/pdf'); 

// It will be called downloaded.pdf 
header('Content-Disposition: attachment; filename="abc.pdf"'); 

$imagpdf = file_put_contents($image, file_get_contents($file)); 

echo $imagepdf; 
?> 

   <div class="row">
      <br>
      <br>
      <h4> Comment list</h4>
      <div class="commentscls">
         <style>
            span.first.username {
            font-size: 23px;
            color: black;
            text-decoration: underline;
            }
            span.first.day {
            text-align: right;
            float: right;
            color: blue;
            font-style: bold;
            }
            .commentsls {
            text-align: justify;
            font-size: 15px;
            }
         </style>
         <ul class="commentul">
            <?php
               $query2 = "SELECT * from comment where proposalid = '".$row['id']."' ";
               	$wall_result = mysqli_query($conn, $query2);
               	$wall_count = mysqli_num_rows($wall_result);
               	if($wall_count > 0){
               		$cmts1= mysqli_fetch_all($wall_result);
               	//	print_r($cmts);die;
               		foreach($cmts1 as $cmts){
               			$comments=$cmts[3];
               			$created=$cmts[4];
               			$userid=$cmts[6];
               			$forsageuserid=$cmts[7];
               			$date1 = date('d.m.Y H:i', $created);
               			$end = time();
               			$date2 = date('d.m.Y H:i', $end);
               			$date1_ts = strtotime($date1);
               			$date2_ts = strtotime($date2);
               		  $diff = $date2_ts - $date1_ts;
               		  $total= round($diff / 86400);


               			$query2 = "SELECT * from user_table where userid = '".$userid."' ";
               			$wall_result = mysqli_query($conn, $query2);
               			$userdetails= mysqli_fetch_array($wall_result);
               			$usernamem = $userdetails['fullname'];

               ?>
            <li class="commentli">
               <div class="names trigger-user-card">
                  <span class="first username"><a href="" ><?php echo $usernamem;?></a></span>
                  <span class="first day" ><?php echo $total;?>d</span>
               </div>
               <div class="commentsls">
                  <?php echo $comments;?>
               </div>
            </li>
            <?php }  } ?>
         </ul>
      </div>
   </div>
</div>
<?php } ?>
<?php include('footer.php');?>
