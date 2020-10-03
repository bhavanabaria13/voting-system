<?php 
   include('header.php');
   $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
   	$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   	$e = explode("?", $url);
   	//print_r($e[1]);
   	$slug = explode("=", $e[1]);
   	//print_r($slug[1]);
    	$proposal_id=$slug[1];
   ?>
<?php 
   $query = "select * FROM `category` where slug='".$proposal_id."' "; 
   $result = mysqli_query($conn, $query);
   $catdetail = mysqli_fetch_assoc($result);
   $catname = $catdetail['category'];
   $catid = $catdetail['id'];
   
				
   $query = "select * FROM `proposal` where status='1' and catid='".$catid."'"; 
   $result = mysqli_query($conn, $query);
   $row = mysqli_num_rows($result);
   if($row > 0){
       $allproposal = mysqli_fetch_all($result);
   }
   
   ?>
<!-- End Top Slider -->
<div class="container" id="toplist">
<div class="row">
   <form class="form-horizontal" action="/">
      <div class="col-md-2"></div>
   </form>
</div>
<hr>
<div class="row">
   <div class="col-md-9">
      <h1 style="text-transform:capitalize"><?php echo $catname  .' proposal list';?></h1>
   </div>
   <div class="col-md-3">
      
   </div>
</div>
<div class="row">
   <div id="no-more-tables">
      <table class="col-md-12 table-bordered table-striped table-condensed cf">
         <thead class="cf">
            <tr>
               <th class="ranking_th numeric">Sr.No</th>
               <th class="thumb_th numeric">Status</th>
               <th class="site_th numeric">Proposal</th>
               <th class="votes_th numeric">Votes</th>
            </tr>
         </thead>
         <tbody>
            
            <?php
	//-- check user exists on not
				$userWallet1 = $_SESSION["userWallet"];
    $userids = $_SESSION["userid"] ;
       $query = "select * FROM `user_table` where userwallet='".$userWallet1."' and userid='".$userids."' and status='1' ";
   		$result = mysqli_query($conn, $query);
   		 $numrows = mysqli_num_rows($result);

			if(!empty($allproposal)){ $i=1;
               foreach($allproposal as $proposal){ 
               		$cat=$proposal[2];$hitcount = $proposal[28];	
               		$query = "select * FROM `category` where id='".$cat."' "; 
               		$result = mysqli_query($conn, $query);
               		$cal = mysqli_fetch_assoc($result);
               		$catname = $cal['category'];
               		
               	 	$proposal_id = $proposal[0];
               			//--count no. of vote up --	
						 	$query = "select sum(voteup) as upcount,sum(votedown)  as downcount FROM `votecount` where proposalid='".$proposal_id."'";
    	$result = mysqli_query($conn, $query);
    	$votecounts = mysqli_fetch_array($result);
			$total_voutup=(int)$votecounts['upcount'];
			$total_voutdown=(int)$votecounts['downcount'];
						/*$query = "select voteup FROM `votecount` where proposalid='".$proposal_id."' and voteup='1'"; 
						$result = mysqli_query($conn, $query);
						$total_voutup = mysqli_num_rows($result);
									
						
						//--count no. of vote up --
						$query = "select votedown FROM `votecount` where proposalid='".$proposal_id."' and votedown='1'"; 
						$result = mysqli_query($conn, $query);
						$total_voutdown = mysqli_num_rows($result);*/
						
							//-----------------smart contract code-------------------
	$query = "select sum(voteup) as upcount,sum(votedown)  as downcount FROM `votecount` where proposalid='".$proposal_id."' and userid='".$userids."' ";
    	$result = mysqli_query($conn, $query);
    	$votecounts = mysqli_fetch_array($result);
			 $total_voutup1=(int)$votecounts['upcount'];
			 $total_voutdown1=(int)$votecounts['downcount'];
			
	
	
	//------------------end code-----------------------------------------------------------------

					   
               	?>  
            <tr>
               <td class="rank">
                  <span class="ranking" data-title="Ranking"><?php echo $i;?></span><br/>
                  <!-- <a href="/category/Shopping">Shopping</a>				 -->
               </td>
               <td class="thumb" data-title="Thumb"><a  class="" style="color: green;text-transform: capitalize;"><?php echo $proposal[6];?></a></td>
               <td class="site" data-title="Sitename">
                  <h3>
                     <a href="<?php  echo $siteURL.'details.php?slug='.$proposal[0];?>" target="_blank">
                     <?php echo $proposal[1];?></a>
                  </h3>
                  <?php echo substr($proposal[3],0,150)."<br>";?>
                  <?php  $start = date('d.m.Y H:i', $proposal[4]);
                     $end = date('d.m.Y H:i', $proposal[5]);
                     echo 'Start Time - '.$start .' - '.$end;
                     ?>
                  <div class="text-center">
                     <!--<a href="http://www.amazon.com" target="_blank"><img src="http://www.toplistlinks.com/images/banner468x60.png" alt="Amazon.com" class="banner" /></a>-->
                  </div>
               </td>
               <!--	<td class="thumb" data-title="Hits Out"><?php //echo $start = date('d.m.Y H:i', $proposal[4]);;?></td>
                  <td class="thumb" data-title="Start Time"><?php //echo $start = date('d.m.Y H:i', $proposal[5]);;?></td>>
                  <td class="thumb" data-title="End Time"><?php //echo $total_voutdown;?></td-->
                <td class="votes" data-title="Votes">
                    <?php if($proposal[6]!='close') { ?>
            <?php if($numrows > 0){ ?>
            	<?php if($total_voutup1<='0'){?>
		 	 
			   <a class="bg-purple State mb-4" data-id="<?php echo $proposal[0];?>" id="voteupscmy<?php echo $proposal[0];?>"   ><i class="fa fa-thumbs-up"></i> (<span id="voteupcount"><?php echo $total_voutup;?></span>)</a> 
			   
		 <?php }else{ ?>
		  
		  
			   <a disabled class="bg-purple State mb-4 disabled" data-id="<?php echo $proposal[0];?>"   ><i class="fa fa-thumbs-up"></i> (<span id="voteupcount"><?php echo $total_voutup;?></span>)</a> 
			 
		 <?php } ?>
		 <?php if($total_voutdown1<='0'){?>
		  <a class="bg-purple State mb-4" data-id="<?php echo $proposal[0];?>" id="votedownscmy<?php echo $proposal[0];?>"><i class="fa fa-thumbs-down"></i> (<span id="votedowncount"><?php echo $total_voutdown;?></span>)</a>
			  
			  
		 <?php }else{ ?>
		   <a disabled class="bg-purple State mb-4 disabled" data-id="<?php echo $proposal[0];?>"   ><i class="fa fa-thumbs-down"></i> (<span id="votedowncount"><?php echo $total_voutdown;?></span>)</a>
			  
			  
		 <?php } ?>
            <?php }
               elseif($_SESSION["userWallet"]!='' && ($numrows=='' || $numrows =='0')){ ?>
            <a type="button" class="bg-purple State mb-4 disabled1" data-toggle="modal" data-target="#login_modal" style="cursor: pointer;">
            <i class="fa fa-thumbs-up"></i> (<?php echo $total_voutup;?>)</a>
            <a type="button" class="bg-purple State mb-4 disabled1" data-toggle="modal" data-target="#login_modal" style="cursor: pointer;">
            <i class="fa fa-thumbs-down"></i> (<?php echo $total_voutdown;?>)</a>
            <?php	}
               else{ ?>
            <a disabled class="bg-purple State mb-4 disabled" >   <i class="fa fa-thumbs-up"></i> (<?php echo $total_voutup;?>) </a>
            <a disabled class="bg-purple State mb-4 disabled" >   <i class="fa fa-thumbs-down"></i> (<?php echo $total_voutdown;?>) </a>
            <?php }
               }else{ ?>
            <a disabled class="bg-purple State mb-4 disabled" >   <i class="fa fa-thumbs-up"></i> (<?php echo $total_voutup;?>) </a>
            <a disabled class="bg-purple State mb-4 disabled" >   <i class="fa fa-thumbs-down"></i> (<?php echo $total_voutdown;?>) </a>
            <?php	} ?>
			<a disabled class="bg-purple State mb-4" >   hitcount (<?php echo $hitcount;?>) </a>
			
			<!------------------------vote for Smart contract------------------------------------------------>
			
		
		 	 		<script>


window.addEventListener('load', async () => {
    $(document).ready(function(){

        $("#voteupscmy<?php echo $proposal[0];?>").click(async function(){
			var voteup = 1;
			var vg= $("#voteupscmy<?php echo $proposal[0];?>").data("id");
			//alert(vg);
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
                            var referrer = vg;

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
   

$("#votedownscmy<?php echo $proposal[0];?>").click(async function(){
	//alert();
			var voteup = 1;
			//alert();
			var vg= $("#votedownscmy<?php echo $proposal[0];?>").data("id");
			alert(vg);
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
                            var referrer = vg;

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


			 
			 
			 <!----------------------------end code--------------------------------------------------------->
			
               </td>
           
	  
	  
	    <script>
            function  givevote(votepass,id){
				alert(votepass);
            	//document.getElementById("theFormvoteup").submit();
							$.ajax({
									url: "<?php echo $siteURL.'getvote.php';?>",
									type: 'POST',
									data: {votepass: votepass,userid:'<?php echo $_SESSION["userid"];?>',proposalid:id},
									success: function (data) {
										data=JSON.parse(data);
										//alert(data);
										if(data=="Thank you for vote this proposal"){
											if(votepass==1)
											{
												var vcnt=$("#voteupcount"+id).html();
												$("#voteupcount"+id).html(parseInt(vcnt)+1);
											}
											else {
												var vcnt=$("#votedowncount"+id).html();
												$("#votedowncount"+id).html(parseInt(vcnt)+1);
											}
										}
									}
								});

            }
         </script>
		
            </tr>
            <?php $i++; }
               } ?>
         </tbody>
      </table>
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
                     <form  method="post">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Email address</label>
                           <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Full name</label>
                           <input type="text" class="form-control" id="fullname" name ="fullname" placeholder="Full name" required>
						   
                           <input type="hidden" name="user" id="user" value="forsagetron">
                           <input type="hidden" name="detail" id="detail" value="checkfrm">
                        </div>
						<a onclick="nmosubmit()"  class="btn btn-success btn-block"> Submit</a>
						<a></a>
                     </form>
					 <script type="text/javascript" >
				 function nmosubmit(){
				  var email = $("#email").val();
				  var fullname = $("#fullname").val();
				  var user = $("#user").val();
				  
				  var detail = $("#detail").val();
				  
				  var dataString = 'email='+ email + '&fullname=' + fullname + '&user=' + user + '&detail=' + detail;
//alert(dataString);
				if(email=='')
				{
				  $('.success').fadeOut(200).hide();
				  $('.error').fadeOut(200).show();
				}
				else
				{
				  $.ajax({
					type: "POST",
					url: "<?php echo $siteURL.'userdetails.php';?>",
					data: dataString,
					success: function(data){
						//alert(data);
						if(data==1){
							alert('Message successfully sent..');
						}
						if(data==2){
							alert('Message could not be sent.');
						}
						if(data==3){
							alert('Please connect to wallet.');
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
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
               </div>
            </div>
         </div>
       
   </div>
</div>
<hr>
<hr>
<?php include('footer.php');?>