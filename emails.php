<?php
error_reporting(0);
ini_set('display_errors', 0);
include 'admin/connect.php';
include 'admin/session.php';
include 'admin/header.php';
?>

<body class="vertical  light  ">
    <div class="wrapper">
        <?php
include 'admin/navbar.php';
include 'admin/aside.php';
// echo $_SESSION['token'];
if(isset($_GET['activate'])){
    $data = array("id" => $_GET['activate']);
    $make_call = NODEAPIGET('shop/active',$_SESSION['token'],json_encode($data,true),'POST');
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }  
}
if(isset($_GET['inactivate'])){
    $data = array("id" => $_GET['inactivate'] );
    $make_call = NODEAPIGET('shop/inactive',$_SESSION['token'],json_encode($data,true),'POST');
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }  
}
$make_call = NODEAPIGET('feedback',$_SESSION['token'],null,'GET');
    $response = json_decode($make_call, true);
    if($response['message']){
        // echo "<script>alert('".$response['message']."')
        // </script>
        // ";
    }
    
?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <!-- <div class="row justify-content-center"> -->

                <!-- / .row -->
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Email</th>
                                            <th> Subject</th>
                                            <th>Message</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($response['data'] as $data){


                                        
                                        ?>
                                        <tr>

                                            <td><?php echo $count ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php echo $data['subject'] ?></td>
                                            <td><?php echo $data['message'] ?></td>
                                        
                                        </tr>
                                        <?php
                                        $count= $count+1; 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
    </div>
    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>