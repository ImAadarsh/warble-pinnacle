<?php
include ("../admin/connect.php");
include ("../admin/session.php");

$data_array =  array(   
    "description" => $_POST['description'],
    "name" => $_POST['name'],
    "food_time" => $_POST['food_time'],
    "food_type" => $_POST['food_type'],
    "price" => $_POST['price'],
    "day" => $_POST['day'],
    "image1" => curl_file_create( $_FILES['image1']['tmp_name'], $_FILES['image1']['type'], $_FILES['image1']['name']),
    "image2" => curl_file_create( $_FILES['image2']['tmp_name'], $_FILES['image2']['type'], $_FILES['image2']['name']),
);

// echo json_encode($data_array,true);
//     // $make_call = NODEAPIPOST(json_encode($data_array,true), 'user/signup');
//     $make_call = callAPI1('dishes',$_SESSION['token'],json_encode($data_array,true),'POST');
    // $response = json_decode($make_call, true);
    //  print_r($response);
    // if($response['message']){
    //     echo "<script>alert('".$response['message']."')
    //     window.location.href='../adddishes.php';
    //     </script>";
    // }  
    $token = "Authorization: Bearer ".$_SESSION['token']."";
    $bearer = array($token);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://127.0.0.1:5001/dishes',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $data_array,
      CURLOPT_HTTPHEADER => $bearer,
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $res = json_decode($response, true);
    print_r($res);
   if($res['message']){
       echo "<script>alert('".$res['message']."')
       window.location.href='../adddishes.php';
       </script>";
   } 
    
?>