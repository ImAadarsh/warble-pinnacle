<?php
include ("../admin/connect.php");
include ("../admin/session.php");

$data_array =  array(
    "code" => $_POST['code'],
    "discount" => $_POST['discount'],
    "count" => $_POST['count'], 
);

echo json_encode($data_array,true);
    $make_call = NODEAPIGET('coupon',$_SESSION['token'],json_encode($data_array,true),'POST');
    $response = json_decode($make_call, true);
    //  print_r($response);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='../coupons.php';
        </script>";
    }  

?>