<?php


function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
}
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:LoginSignUp.php');
}
else{
    $UserEmailId = $_SESSION['login'];
    $sql =mysqli_query($con,"SELECT SocietyPin FROM tbluser1 WHERE UserEmailId='$UserEmailId'");
$sql_result = mysqli_fetch_assoc($sql);
$SocietyPin= $sql_result['SocietyPin'];
$sql1 =mysqli_query($con,"SELECT id FROM tbluser1 WHERE UserEmailId='$UserEmailId'");
$sql_result1 = mysqli_fetch_assoc($sql1);
$chid= $sql_result1['id'];
$catid=intval($_GET['cid']);

    

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>House Payment</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- this meta viewport is required for BOLT //-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<!-- BOLT Sandbox/test //-->
<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
<!-- BOLT Production/Live //-->
<!--// script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script //-->

</head>
<style type="text/css">
	.main {
		margin-left:30px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	.text {
		float:left;
		width:180px;
	}
	.dv {
		margin-bottom:5px;
	}
</style>
<body>
<div class="main">
	<div>
    	<img src="images/paytm.png" />
    </div>
    <div>
    	<h3>Pay Your Maintenance Bill</h3>
    </div>
	<form method = "POST" action="paytm/kit/pgRedirect.php">
    <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
    <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
    <div class="dv">
    <span class="text"><label>Order ID:</label></span>
    <span><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>"></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Customer ID:</label></span>
    <span><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Industry Type ID:</label></span>
    <span><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Channel:</label></span>
    <span><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB"></span>    
    </div>
    <?php
               $sql2 =mysqli_query($con,"SELECT total FROM tblindmaint WHERE id='$catid'");
               while($row2=mysqli_fetch_array($sql2))
{
	$tot=$row2['total'];
}
   ?> 
    <div class="dv">
    <span class="text"><label>txnAmount:</label></span>
    <span>

    	<input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $tot; ?>">


					</span>
    </div>
    
 
    
    <div><input value="Pay" type="submit"	onclick=""></div>
	</form>
</div>

</body>
</html>
	
