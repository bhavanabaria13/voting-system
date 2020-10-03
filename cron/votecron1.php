<?php
/*c1 = main Contract : TVpvLZcFRxGfsk7Rc7tzEZtiZkspUDdfJe
Events
1.buyLevelEv
2.doTransactionEv
3.payPlatformChargeEv
4.depositedToPoolEv
5.regUserEv
6.processPayOutEv
7.startMynetworkEv
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../config.php");
include("../../vendor/autoload.php");
//include './config.php';
//include './vendor/autoload.php';
$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider($trongridurl);
$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider($trongridurl);
$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider($trongridurl);
try {
    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

$contract = $mainContractAddress;

//this function will fetch and process data of ALL events
function fetchData($mysqli , $previousLastEventFingerprint,$lastfingerprint, $tron){

     $url = TRONGRID_V2_EVENT_API_URL.MAIN_CONTRACT_ADDRESS.'?size=200&sort=block_timestamp';
	//$url="https://api.trongrid.io/v1/contracts/TLUkkYUPDf3itE3MifnE9asAcE9TZA7AvQ/events?event_name=paidForLevelEv&order_by=block_timestamp%2Casc";
    //global $siteURL;

    if ($previousLastEventFingerprint !== null) {
      //  $url .= "&previousLastEventFingerprint=".$previousLastEventFingerprint;
      //$previousLastEventFingerprint=$previousLastEventFingerprint + 1;
        $url .= "&since=".$previousLastEventFingerprint;
        //$url .= "&min_block_timestamp=".$previousLastEventFingerprint;
    }


   // echo $url;


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $output = curl_exec($ch);
    $output = json_decode($output);
    curl_close ($ch);

    $last = null;
    $last_timestamp=0;

 $i=0;

foreach(array_reverse($output) as $obj){


		$fingerprint= $obj->_fingerprint;

	break;
}


	if($fingerprint!=$lastfingerprint){
	foreach ($output as $key => $value) {
      $i=$i+1;
  //  echo "<br>******<br>";
   // print_r($key);
   // print_r($value);
  // if($key=="data")
   //{
   //	echo "<br>111<br>";
    $transaction_id =$value->transaction_id;
    $blockNumber = $value->block_number;
   	//print_r($value[0]->result->_amount);exit;


      $isAddBlock=false;
     //$transaction_id = $value->transaction_id;
    	//$blockNumber = $value->block_number;
      $blockNumber = hexdec($blockNumber);
      $timeNow = ($value->block_timestamp / 1000);
      $last_timestamp  =$value->block_timestamp;


		 if($value->event_name == 'Vote'){
//Vote(id, msg.sender, false, vote);
            $proposalid = $value->result->id;
            $senderwallet = $value->result->msg.sender;
            $votestatus = $value->result->false;
            $vote = $value->result->vote;

      			$query2 = "SELECT userid from user_table where userwallet = '".$senderwallet."' ";


      			$wall_result = mysqli_query($conn, $query2);
      			$wall_count = mysqli_num_rows($wall_result);
      			$wall_count = mysqli_fetch_assoc($wall_result);
      			 $userid= $wall_count['userid'];

      			if($votestatus==true){

      				$query2 = "INSERT INTO `votecount` (`id`, `userid`, `forsageid`, `proposalid`, `userwallet`, `voteup`, `votedown`) VALUES (NULL, '".$userid."', '".$userid."', '".$proposalid."', '".$senderwallet."', '1', '0');";

      				$wall_result = mysqli_query($conn, $query2);
      			}else{

      				$query2 = "INSERT INTO `votecount` (`id`, `userid`, `forsageid`, `proposalid`, `userwallet`, `voteup`, `votedown`) VALUES (NULL, '".$userid."', '".$userid."', '".$proposalid."', '".$senderwallet."', '0', '1');";

      				$wall_result = mysqli_query($conn, $query2);
      			}
            //$votestatus=true;



        }

  	if((int)$last_timestamp>0){
        $query = "update  `adminsetting` set  last_timestamp='" . $last_timestamp . "'";
      //echo "<br> admin settings: ".$query;
      mysqli_query($mysqli, $query);
    }
    if($i==count($output)){

      $query = "update  `adminsetting` set  lastfingerprint='" . $fingerprint . "'";
      //echo "<br> admin settings: ".$query;
      mysqli_query($mysqli, $query);
    }
   //}
  }
    }
}
$qryadmin = "SELECT last_timestamp,lastfingerprint FROM adminsetting ";
$reslast = mysqli_query($conn, $qryadmin);
$res = $reslast->fetch_assoc();
$last_timestamp=$res['last_timestamp1'];
$lastfingerprint=$res['lastfingerprint'];
$lastEvent = fetchData($conn, $last_timestamp,$lastfingerprint, $tron);

header("Refresh:1");
