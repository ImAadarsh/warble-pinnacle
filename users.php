<?php
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
    $make_call = NODEAPIGET('user/active',$_SESSION['token'],json_encode($data,true),'POST');
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }  
}
if(isset($_GET['delete'])){
    $data = $_GET['delete'];
    $url = "user/".$data;
    echo $url;
    $make_call = callAPI($url,null,null,'DELETE');
    $response = json_decode($make_call, true);
    echo $response;
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }  
}
if(isset($_GET['inactivate'])){
    $data = array("id" => $_GET['inactivate'] );
    $make_call = NODEAPIGET('user/inactive',$_SESSION['token'],json_encode($data,true),'POST');
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }  
}
$make_call = NODEAPIGET('user',$_SESSION['token'],null,'GET');
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
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                            <th>Is Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($response['data'] as $data){
                                        
                                        ?>
                                        <tr>

                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $data['name'] ?></td>
                                            <td><?php echo $data['mobile'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php echo $data['userType'] ?></td>
                                            
                                            <td><?php 
                                            if($data['active']==true){
                                                echo "<h6 style='color:green'>Active</h6>";
                                            }else{
                                                echo "<h6 style='color:red'>Inactive</h6>";
                                            }
                                            ?></td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="users.php?activate=<?php echo $data['_id'] ?>">Activate
                                                        User</a>
                                                    <a class="dropdown-item"
                                                        href="users.php?inactivate=<?php echo $data['_id'] ?>">Inactivate
                                                        User</a>
                                                        <a class="dropdown-item"
                                                        href="users.php?delete=<?php echo $data['_id'] ?>">Delete
                                                        User</a>
                                                </div>
                                            </td>
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