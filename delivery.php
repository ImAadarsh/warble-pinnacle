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
if(isset($_GET['delivery_date'])){
    $data = array("date" => $_GET['delivery_date']);
    $make_call = NODEAPIGET('placedOrder/delivery',$_SESSION['token'],json_encode($data,true),'POST');
    $response = json_decode($make_call, true);
    // print_r($response['orders'][0]['user']);
    // if($response['message']){
    //     echo "<script>alert('".$response['message']."')
    //     </script>
    //     ";
    // }  
}
?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <!-- <div class="row justify-content-center"> -->
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="delivery.php" method="GET"
                                    enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Date of Delivery</label>
                                        <input required type="date" id="simpleinput" class="form-control"
                                             name="delivery_date">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="submit" id="example-palaceholder" class="btn btn-primary"
                                            value="Submit">
                                    </div>
                            </div> <!-- /.col -->
                            </form>
                        </div>
                    </div>
                <!-- / .row -->
                <?php if(isset($_GET['delivery_date'])){ ?>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                    <h3>Orders to be delivered on <?php echo date('Y-m-d D', strtotime($_GET['delivery_date'])) ?></h3>
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Food Item</th>
                                            <th>Spicy Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                        $count = 1;
    foreach($response['orders'] as $data) {

        foreach($data['orderedItems'] as $food) {



            ?>
                                        <tr>

                                            <td><?php echo $count ?></td>
                                            <td><?php echo $data['user']['name'] ?></td>
                                            <td><?php echo $data['user']['mobile'] ?></td>
                                            <td><?php echo $data['address'] ?> <br> <?php echo $data['city'] ?> <?php echo $data['state'] ?> <br> <?php echo $data['zipCode'] ?></td>
                                            <td><?php echo $food['foodItemId']['name'] ?></td>
                                            <td><?php
                                            if($data['spicy_level']=="medium"){
                                                echo "<b style='color: orange;'>Medium</b>";
                                            }else if($data['spicy_level']=="spicy"){
                                                echo "<b style='color: red;'>Spicy</b>";
                                            }else{
                                                $r = rand(0,1);
                                                if($r==0){
                                                    echo "<b style='color: orange;'>Medium</b>";
                                                }else{
                                                    echo "<b style='color: red;'>Spicy</b>";
                                                }
                                            }
                                            echo $data['spicy_level'] ?></td>
                                        </tr>
                                        <?php
                                                 $count = $count + 1;
        }

    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
                <?php } ?>
            </div> <!-- .col-12 -->
    </div>
    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>