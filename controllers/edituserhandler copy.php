<?php
include ("../admin/connect.php");
include ("../admin/session.php");

$data_array =  array(
    "uid"=> $_POST["id"],
    "email" => $_POST['email'],
    "name" => $_POST['name'],
    "mobile" => $_POST['mobile'],
    "userType" => $_POST['user_type'],
);

echo json_encode($data_array,true);
    // $make_call = NODEAPIPOST(json_encode($data_array,true), 'user/signup');
    $make_call = NODEAPIGET('user/update',$_SESSION['token'],json_encode($data_array,true),'POST');
    $response = json_decode($make_call, true);
     print_r($response);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='../users.php';
        </script>";
    }  

?>