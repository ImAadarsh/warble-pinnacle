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

?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <h2 class="h5 page-title">Welcome <?php echo $_SESSION['name'];?> !</h2>
                            </div>
                            <div class="col-auto">
                                <form class="form-inline">
                                    <div class="form-group d-none d-lg-inline">
                                        <label for="reportrange" class="sr-only">Date Ranges</label>
                                        <div id="reportrange" class="px-2 py-2 text-muted">
                                            <span class="small"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-sm"><span
                                                class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                                        <button type="button" class="btn btn-sm mr-2"><span
                                                class="fe fe-filter fe-16 text-muted"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow my-4">
                            <div class="card-body">
                                <div class="row align-items-center my-12">
                                    <div class="col-md-12">
                                        <!-- <div class="mx-4">
                                            <strong class="mb-0 text-uppercase text-muted">Earning</strong><br />
                                            <h3>$2,562.30</h3>
                                            <p class="text-muted">Etiam ultricies nisi vel augue. Curabitur ullamcorper
                                                ultricies nisi. Nam eget dui. Etiam rhoncus...</p>
                                        </div> -->
                                        <div class="row align-items-center">

                                            <div class="col-6">
                                                <div class="p-4">
                                                    <p class="small text-uppercase text-muted mb-0">Total Users

                                                    </p>
                                                    <?php
                                                    $make_call = NODEAPIGET('user',$_SESSION['token'],null,'GET');
                                                    $response = json_decode($make_call, true);
                                                    
                                                    ?>
                                                    <span class="h2 mb-0"><?php echo $response['count']; ?></span>
                                                    <p class="small mb-0">

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-4">
                                                    <p class="small text-uppercase text-muted mb-0">Total Dishes

                                                    </p>
                                                    <?php
                                                    $make_call = NODEAPIGET('dishes',$_SESSION['token'],null,'GET');
                                                    $response = json_decode($make_call, true);
                                                    
                                                    ?>
                                                    <span class="h2 mb-0"><?php echo $response['count']; ?></span>
                                                    <p class="small mb-0">

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-4">
                                                    <p class="small text-uppercase text-muted mb-0">Total Orders

                                                    </p>
                                                    <?php
                                                    $make_call = NODEAPIGET('placedOrder',$_SESSION['token'],null,'GET');
                                                    $response = json_decode($make_call, true);
                                                    
                                                    ?>
                                                    <span class="h2 mb-0"><?php echo $response['count']; ?></span>
                                                    <p class="small mb-0">

                                                    </p>
                                                </div>
                                            </div>
                                           
                                          
                                           
                                           
                                            <div class="col-6">
                                                <div class="p-4">
                                                    <p class="small text-uppercase text-muted mb-0">Emails Collected

                                                    </p>
                                                    <?php
                                                    $make_call = NODEAPIGET('feedback',$_SESSION['token'],null,'GET');
                                                    $response = json_decode($make_call, true);
                                                    
                                                    ?>
                                                    <span class="h2 mb-0"><?php echo $response['count']; ?></span>
                                                    <p class="small mb-0">

                                                    </p>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <!-- .col-md-8 -->
                            </div> <!-- end section -->
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->

                    <!-- / .row -->
                    <div class="row">
                        <!-- Recent orders -->

                    </div> <!-- end section -->
                </div>
            </div> <!-- .row -->
    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>