<?php
include ("../admin/connect.php");
include ("../admin/session.php");

$data_array =  array(
    "pincode" => $_POST['pincode'],
);

echo json_encode($data_array,true);
    $make_call = NODEAPIGET('pincode/save',$_SESSION['token'],json_encode($data_array,true),'POST');
    $response = json_decode($make_call, true);
    //  print_r($response);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='../pincodes.php';
        </script>";
    }  

?>