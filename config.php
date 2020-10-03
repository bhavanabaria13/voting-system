<?php
error_reporting(0);

//system default localhost server
//
global $siteURL;
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','votes_today');

$conn = mysqli_connect(DB_HOST,DB_USER, DB_PASS,DB_NAME);


if (mysqli_connect_errno()){
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


define('DB_HOST1','localhost');
define('DB_USER1','root');
define('DB_PASS1','');
define('DB_NAME1','forsage_main');
/*
$hostname = 'localhost';
$username ='forsaget_mainUser';
$password ='}X@L-aLm&!vD';
$database ='forsage_main';*/
$conn2 = mysqli_connect(DB_HOST1,DB_USER1, DB_PASS1,DB_NAME1);

// Check connection
if (mysqli_connect_errno()){
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//getting admin setting data
$query = "SELECT * FROM adminsetting  ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
if($row != NULL){
  $mainContractAddress = $row['mainContractAddress'];
  $mainContractABI = $row['mainContractABI'];
  $ethPrice = $row['ethPiceInUsd'];
  $tronPriceInUSD = $row['tronPriceInUSD'];
  $gasPriceAverage = $row['gasPriceAverage'];
  $gasPriceFast = $row['gasPriceFast'];
  $siteName=$row['siteName'];
  $siteURL=$row['siteURL'];	
  $etherscanAddressMain = $row['etherscanAddressMain'];
  $etherscanAddressTestnet = $row['etherscanAddressTestnet'];
  $etherscanTxMain  = $row['etherscanTxMain'];
  $etherscanTxTestnet  = $row['etherscanTxTestnet'];
  $infuraAPIMainnet  = $row['infuraAPIMainnet'];
  $infuraAPITestnet  = $row['infuraAPITestnet'];
  $network=$row['network'];
  $ethPriceBtc=$row['ethPiceInBtc'];
  $project_year=$row['project_year'];
  $ethPiceInUsd=$row['ethPiceInUsd'];
  $siteNetworkId=$row['siteNetworkId'];
  $site_version = $row['site_version'];
  $siteLogo = $row['siteLogo'];
  $participants_earning_eth = $row['participants_earning_eth'];
}

if($network==0){

  $etherscanAddress = $row['etherscanAddressTestnet'];
  $etherscanTx  = $row['etherscanTxTestnet'];
  $infuraAPI  = $row['infuraAPITestnet'];
	
	define('TRONGRID_V2_EVENT_API_URL','https://v2.api.shasta.trongrid.io/event/contract/');
  define('MAIN_CONTRACT_ADDRESS',$mainContractAddress);
  define('HOOK_CONTRACT_ADDRESS',$hookContractAddress);
} else {

  $etherscanAddress = $row['etherscanAddressMain'];
  $etherscanTx  = $row['etherscanTxMain'];
  $infuraAPI  = $row['infuraAPIMainnet'];

	define('TRONGRID_V2_EVENT_API_URL','https://v2.api.trongrid.io/event/contract/');
  define('MAIN_CONTRACT_ADDRESS',$mainContractAddress);
  define('HOOK_CONTRACT_ADDRESS',$hookContractAddress);

}

//getting default referrerID
$query = "SELECT * FROM forsage_event_reglevel";
$result = mysqli_query($conn,$query);
$row = mysqli_num_rows($result);
$freeReferrerID = 1;

$totalUsers=0;
if($row != NULL){
    $totalUsers = $row;
}
//$totalUsers = ($totalUsers + $freeReferrerID);

/*
for($i = $freeReferrerID; $i < $totalUsers; $i++){
    $query = "SELECT * FROM forsage_event_reglevel where referrerID = '".$i."'  ";
	
    $result = mysqli_query($conn,$query);
    $reg_count = mysqli_num_rows($result);
	
    if($reg_count > 0){
        if($reg_count < 3){
            $freeReferrerID = $i;
            break;
        }
    }
}
*/

/*
if(!isset($_GET['ts'])){
	include('version.php');
}
*/

$uw_query = "SELECT userWallet FROM forsage_event_reglevel where userID = '".$freeReferrerID."'  ";
$uw_result = mysqli_query($conn, $uw_query);
$uw_count = mysqli_num_rows($uw_result);

if($uw_count > 0){
  $uw_row = mysqli_fetch_assoc($uw_result);
  $freeReferrerWallet = $uw_row['userWallet'];
}



function clean($string) {
  $string = str_replace(' ', '', $string); // Remove all spaces.
  return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function ogEtoLongNumber($amountInLogE){
    
  $amountInLogE = (string)$amountInLogE;
  $noDecimalDigits = "";

  if(strrchr($amountInLogE, "E-")){
  
    $splitString = explode("E-",$amountInLogE); //split the string from 'e-'

    $noDecimalDigits = str_replace(".", "", $splitString[0]); //remove decimal point

    //how far decimals to move
     $zeroString = "";
    for($i=1; $i < $splitString[1]; $i++){
      $zeroString .= "0";
    }
    
    return  "0.".$zeroString.$noDecimalDigits;
    
  }
  else if(strrchr($amountInLogE, "E+")){

    $splitString = explode("E+", $amountInLogE); //split the string from 'e+'
    $ePower = (int)$splitString[1];

    $noDecimalDigits = str_replace(".","",$splitString[0]); //remove decimal point

    if($ePower >= count($noDecimalDigits)-1){
      $zerosToAdd = ($ePower ) - count($noDecimalDigits);

      for($i=0; $i <= $zerosToAdd; $i++){
        $noDecimalDigits .= "0";
      }

    }
    else{
      //this condition will run if the e+n is less than numbers
      $stringFirstHalf = array_slice($noDecimalDigits,0,$ePower+1);
      $stringSecondHalf = array_slice($noDecimalDigits,$ePower+1);
      
      return $stringFirstHalf.".".$stringSecondHalf;
    }
    
    return $noDecimalDigits;
  }
  
  return $amountInLogE;  //by default it returns stringify value of original number if its not logarithm number
}