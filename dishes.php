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
if(isset($_GET['delete'])){
    $data = array("id" => $_GET['delete']);
    $make_call = NODEAPIGET('dishes/delete',$_SESSION['token'],json_encode($data,true),'POST');
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }  
}
$make_call = NODEAPIGET('dishes',$_SESSION['token'],null,'GET');
    $response = json_decode($make_call, true);
    
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
                                            <th>V/N</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Price</th>
                                            <th>Images</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($response['data'] as $data){
                                    
                                        ?>
                                        <tr>

                                            <td><?php echo $count ?></td>
                                            <td><?php echo $data['name'] ?></td>
                                            <td><?php  if($data['food_type']=='veg'){
                                                echo "<b style='color: green'>Veg</b>";
                                            }else{
                                                echo "<b style='color: red'>Non Veg</b>";
                                            } ?></td>
                                            <td><?php echo $data['day'][0] ?></td>
                                            <td><?php echo $data['food_time'] ?></td>
                                            <td>$ <?php echo $data['price'] ?></td>
                                            <td>
                                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" target="_blank"
                                                        href="<?php echo $data['image1'] ?>">Image 1
                                                        </a>
                                                        <a target="_blank" class="dropdown-item"
                                                        href="<?php echo $data['image2'] ?>">Image 2
                                                        </a>
                                                   
                                                </div>
                                            </td>
                                          
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a target="_blank" class="dropdown-item"
                                                        href="dishes.php?delete=<?php echo $data['_id'] ?>">Delete
                                                        </a>
                                                   
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