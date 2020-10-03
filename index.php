<?php
include('header.php');
 $setuserWallet = clean($_COOKIE['userWallet']);
 //echo "<br><br><br><br><br><br>SDF:DSF :".$setuserWallet;
 if(!empty($setuserWallet))
 {
    $query = "select id,email,userid,userWallet,fullname FROM `user_table` where userwallet='".clean($setuserWallet)."'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);
    if($row > 0){
       $wall = mysqli_fetch_array($result);
      	$_SESSION["forsageid"] = $wall['id'];
      	$_SESSION["userid"] = $wall['userid'];
      	$_SESSION["userWallet"] = $wall['userWallet'];
  	    $_SESSION["email"] = $wall['email'];
        $_SESSION["fullname"]=$wall['fullname'];
    }
    else
    {
      $query1 = "select userID FROM `forsage_event_reglevel` where userWalletBase58='".clean($setuserWallet)."'";
       $result1 = mysqli_query($conn2, $query1);
       $row = mysqli_num_rows($result1);
       if($row > 0){
          $user = mysqli_fetch_array($result1);
          $userID = $user['userID'];
          $_SESSION["userWallet"] = $setuserWallet;
          $_SESSION["email"] = '';
          $_SESSION["fullname"]='';
          $_SESSION["userid"] = $userID;
          $query2 = "INSERT INTO `user_table` ( `userid`, `userwallet`) VALUES ( '".$userID."', '".$setuserWallet."');";
          ///echo $query2;
  		    $wall_result = mysqli_query($conn, $query2);
          $last_id = $conn->insert_id;
          $_SESSION["forsageid"] = $last_id;
       }
       else {
         echo "<script>alert('Wallet ".$setuserWallet." is not a member of Forsage tron.');
         var now = new Date();
         document.cookie = 'userWallet=; expires=' + now + '; path=/';
         location.href='';
         </script>";
       }
    }
 }

?>
<?php 
   
   $query = "select * FROM `category` where status='1' "; 
   $result = mysqli_query($conn, $query);
   $row = mysqli_num_rows($result);
   if($row > 0){
       $allcat = mysqli_fetch_all($result);
      
   }
   $query = "select * FROM `proposal` where status='1' "; 
   $result = mysqli_query($conn, $query);
   $row = mysqli_num_rows($result);
   if($row > 0){
       $allproposal = mysqli_fetch_all($result);
   }
   
   ?>
<!-- End Top Slider -->
<div class="container" id="toplist">
<div class="row">
   <hr class="hr-primary" />
   <ol class="breadcrumb bread-primary ">
      <li><a style="text-transform: capitalize;"><i class="fa fa-newspaper-o"></i> Categories</a></li>
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
   <li class="list-group-item col-xs-4"><a href="<?php echo $siteURL.'category.php?category='.$category[2];?>" style="text-transform: capitalize;"> <?php echo $category[2].' ('.$cal.') ';?> </a></li>
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
      <h1>List of All Proposals</h1>
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
            <?php 
			
				//-- check user exists on not
				$userWallet1 = $_SESSION["userWallet"];
    $userids = $_SESSION["userid"] ;
       $query = "select * FROM `user_table` where userwallet='".$userWallet1."' and userid='".$userids."' and status='1' ";
   		$result = mysqli_query($conn, $query);
   		 $numrows = mysqli_num_rows($result);
		 
			if(!empty($allproposal)){ $i=1;
               foreach($allproposal as $proposal){ 
               		$cat=$proposal[2];	
$hitcount = $proposal[28];				
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
               <td style="text-transform: capitalize;"><?php echo $catname;?></td>
               <td class="thumb" data-title="Thumb"><a  class="" style="color: green;text-transform: capitalize;"><?php echo $proposal[6];?></a></td>
               <td class="site" data-title="Sitename">
                  <h3>
                     <a href="<?php  echo $siteURL.'details.php?slug='.$proposal[0];?>" >
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
		  <a class="bg-purple State mb-4" data-id="<?php echo $proposal[0];?>" id="votedownscmy<?php echo $proposal[0];?>"    ><i class="fa fa-thumbs-down"></i> (<span id="votedowncount"><?php echo $total_voutdown;?></span>)</a>
			  
			  
		 <?php }else{ ?>
		   <a disabled class="bg-purple State mb-4 disabled" data-id="<?php echo $proposal[0];?>" id="votedownscmy"  ><i class="fa fa-thumbs-down"></i> (<span id="votedowncount"><?php echo $total_voutdown;?></span>)</a>
			  
			  
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
            <a disabled class="bg-purple State mb-4  disabled " >   <i class="fa fa-thumbs-down"></i> (<?php echo $total_voutdown;?>) </a>
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
			var voteup = 1;
			//alert();
			var vg= $("#votedownscmy<?php echo $proposal[0];?>").data("id");
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
            	//document.getElementById("theFormvoteup").submit();
							$.ajax({
									url: 'getvote.php',
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
       
   </div>
</div>
<hr>
<hr>
<?php include('footer.php');?>