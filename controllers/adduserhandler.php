<?php
include ("../admin/connect.php");
include ("../admin/session.php");

$data_array =  array(
    "email" => $_POST['email'],
    "name" => $_POST['name'],
    "mobile" => $_POST['mobile'],
    "userType" => $_POST['user_type'],
    "password" => $_POST['password'], 
);

echo json_encode($data_array,true);
    $make_call = NODEAPIPOST(json_encode($data_array,true), 'user/signup');
    $response = json_decode($make_call, true);
    //  print_r($response);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='../users.php';
        </script>";
    }  

?>