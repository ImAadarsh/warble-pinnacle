<?php
error_reporting(0);
ini_set('display_errors', 0);
include 'admin/connect.php';
// include 'admin/session.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Shop Ad Admin DashBoard</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
    <style>
        body{
    margin: 0;
    padding: 0;
    font: 400 .875rem 'Open Sans', sans-serif;
    color: #bcd0f7;
    background: #1A233A;
    position: relative;
    height: 100%;
}
.invoice-container {
    padding: 1rem;
}
.invoice-container .invoice-header .invoice-logo {
    margin: 0.8rem 0 0 0;
    display: inline-block;
    font-size: 1.6rem;
    font-weight: 700;
    color: #bcd0f7;
}
.invoice-container .invoice-header .invoice-logo img {
    max-width: 130px;
}
.invoice-container .invoice-header address {
    font-size: 0.8rem;
    color: #8a99b5;
    margin: 0;
}
.invoice-container .invoice-details {
    margin: 1rem 0 0 0;
    padding: 1rem;
    line-height: 180%;
    background: #1a233a;
}
.invoice-container .invoice-details .invoice-num {
    text-align: right;
    font-size: 0.8rem;
}
.invoice-container .invoice-body {
    padding: 1rem 0 0 0;
}
.invoice-container .invoice-footer {
    text-align: center;
    font-size: 0.7rem;
    margin: 5px 0 0 0;
}

.invoice-status {
    text-align: center;
    padding: 1rem;
    background: #272e48;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 1rem;
}
.invoice-status h2.status {
    margin: 0 0 0.8rem 0;
}
.invoice-status h5.status-title {
    margin: 0 0 0.8rem 0;
    color: #8a99b5;
}
.invoice-status p.status-type {
    margin: 0.5rem 0 0 0;
    padding: 0;
    line-height: 150%;
}
.invoice-status i {
    font-size: 1.5rem;
    margin: 0 0 1rem 0;
    display: inline-block;
    padding: 1rem;
    background: #1a233a;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}
.invoice-status .badge {
    text-transform: uppercase;
}

@media (max-width: 767px) {
    .invoice-container {
        padding: 1rem;
    }
}

.card {
    background: #272E48;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

.custom-table {
    border: 1px solid #2b3958;
}
.custom-table thead {
    background: #2f71c1;
}
.custom-table thead th {
    border: 0;
    color: #ffffff;
}
.custom-table > tbody tr:hover {
    background: #172033;
}
.custom-table > tbody tr:nth-of-type(even) {
    background-color: #1a243a;
}
.custom-table > tbody td {
    border: 1px solid #2e3d5f;
}

.table {
    background: #1a243a;
    color: #bcd0f7;
    font-size: .75rem;
}
.text-success {
    color: green !important;
    font-size: 25px !important;
}
.custom-actions-btns {
    margin: auto;
    display: flex;
    justify-content: flex-end;
}
.custom-actions-btns .btn {
    margin: .3rem 0 .3rem .3rem;
}

    </style>
</head>
<body class="vertical  light  ">
    <div class="wrapper">
        <?php
include 'admin/navbar.php';

// echo $_SESSION['token'];
if(isset($_GET['id'])){
    $data = array("id" => $_GET['id']);
    $make_call = NODEAPIGET('placedOrder/uid',$_SESSION['token'],json_encode($data,true),'POST');
    $response = json_decode($make_call, true);
    $data = $response['data'][0];
    $uid = array("id" => $data['user'] );
                                            $call_user = NODEAPIGET('user/uid',$_SESSION['token'],json_encode($uid,true),'POST');
                                            $cuser = json_decode($call_user, true);
                                            {$user = $cuser['data'][0];}
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }  
}

?>

<div class="container">
    <div class="row gutters">
    	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    		<div class="card">
    			<div class="card-body p-0">
    				<div class="invoice-container">
    					<div class="invoice-header">
    
    						<!-- Row start -->
    						<div class="row gutters">
    							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    								<div class="custom-actions-btns mb-5">
                                    <form action="https://v2.convertapi.com/convert/html/to/pdf?Secret=u6u6kBHRctlmYLMO&download=attachment" method="post" enctype="multipart/form-data">
            <input hidden type="url" name="File" value="https://admin.holatiffin.com/details.php?id=<?php echo $_GET['id'] ?>"/>
            <i class="icon-download"></i> <input class="btn btn-primary" type="submit" value="Download"/>
        </form>							
    									</a>
    									<a href="orders.php" class="btn btn-secondary">
    										<i class="icon-printer"></i> Back
    									</a>
    								</div>
    							</div>
    						</div>
    						<!-- Row end -->
    
    						<!-- Row start -->
    						<div class="row gutters">
    							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
    								<a href="https://Holatiffin.com" class="invoice-logo">
    									Holatiffin.com
    								</a>
    							</div>
    							<div class="col-lg-6 col-md-6 col-sm-6">
    								<address class="text-right">
    									Hola Tiffin<br>
    									Info@holatiffin.com<br>
    									+1 (857) 335-6203
    								</address>
    							</div>
    						</div>
    						<!-- Row end -->
    
    						<!-- Row start -->
    						<div class="row gutters">
    							<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    								<div class="invoice-details">
    									<address>
    										<?php echo $user['name'] ?><br>
                                            <?php echo $user['email'] ?><br>
                                            <?php echo $user['mobile'] ?><br>
    										<?php echo $data['address'] ?> <?php echo $data['city'] ?><br>
                                            <?php echo $data['state'] ?> <?php echo $data['zipCode'] ?>
    									</address>
    								</div>
    							</div>
    							<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    								<div class="invoice-details">
    									<div class="invoice-num">
    										<div>Invoice - #<?php echo $data['_id'] ?> </div>
    										<div><?php echo date('Y-m-d H:i:s', strtotime($data['orderDate'])) ?></div>
                                            <td></td>
    									</div>
    								</div>													
    							</div>
    						</div>
    						<!-- Row end -->
    
    					</div>
    
    					<div class="invoice-body">
    
    						<!-- Row start -->
    						<div class="row gutters">
    							<div class="col-lg-12 col-md-12 col-sm-12">
    								<div class="table-responsive">
    									<table class="table custom-table m-0">
    										<thead>
    											<tr>
    												<th>Items</th>
    												<th>Delivery Date</th>
    												<th>Quantity</th>
    												<th>Sub Total</th>
    											</tr>
    										</thead>
    										<tbody>
                                                <?php 
                                                usort($data['orderedItems'], function($a, $b) {
                                                    return strtotime($a['deliveryDates']) - strtotime($b['deliveryDates']);
                                                });
                                                foreach ($data['orderedItems'] as $items){
                                                 ?>
                                              <?php 
$uid = array("id" => $items['foodItemId'] );
$dishcall = NODEAPIGET('dishes/byid',$_SESSION['token'],json_encode($uid,true),'POST');
$d = json_decode($dishcall, true);
$dish = $d['data'];
                                              ?>

    											<tr>
    												<td>
                                                        <!-- <?php print_r($d['data']['price']); ?> -->
    													<?php echo $dish['name'] ?>
    													<p class="m-0 text-muted">
                                                           <b><?php echo $dish['day'][0] ?></b> - <?php echo $dish['food_time'] ?>
    													</p>
    												</td>
    												<td><?php echo date('Y-M-d', strtotime($items['deliveryDates'])) ?></td>
    												<td>1</td>
    												<td>$ <?php echo $dish['price'] ?></td>
    											</tr>
                                                <?php 
                                                }

                                                ?>
                                                <tr>
    												<td>&nbsp;</td>
    												<td colspan="2">
    													<p>
    														Subtotal<br>
    														Tip &amp;<br>
    													
    													</p>
    													<h5 class="text-success"><strong  style="color: #FF3;">Grand Total</strong></h5>
    												</td>			
    												<td>
    													<p>
                                                        <?php echo $data['totalPaid']-$data['tip'] ?><br>
    														<?php echo $data['tip'] ?><br>
    													
    													</p>
    													<h5 class="text-success"><strong  style="color: #FF3;">$ <?php echo $data['totalPaid']?></strong></h5>
    												</td>
    											</tr>
    										</tbody>
    									</table>
    								</div>
    							</div>
    						</div>
    						<!-- Row end -->
    
    					</div>
    
    					<div class="invoice-footer">
    						Thank you for your Business.
    					</div>
    
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

    <?php include "admin/footer.php"; ?>