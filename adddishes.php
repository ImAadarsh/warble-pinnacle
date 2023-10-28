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


                <div class="card shadow mb-4">
                    <a href="dashboard.php">
                        <button type="button" class="btn btn-primary">Dashboard</button>
                    </a>
                    <div class="card-header">
                        <strong class="card-title">Add Dish </strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="controllers/adddish.php" method="POST" enctype="multipart/form-data">
                                    
                                    <div class="form-group mb-3">

                                        <label for="simpleinput">Name</label>
                                        <input required type="text" id="simpleinput" class="form-control" placeholder="Name"
                                            name="name" value="">
                                    </div>
                                    <div class="form-group mb-3">

                                        <label for="simpleinput">Price</label>
                                        <input required type="text" id="simpleinput" class="form-control" placeholder="Price"
                                            name="price" value="">
                                    </div>
                                    <div class="form-group mb-3">

                                        <label for="simpleinput">Day</label>
                                        <select required  id="simpleinput" class="form-control" placeholder="Price"
                                            name="day" value="">
                                            <option value="sun">Sunday</option>
                                            <option value="mon">Monday</option>
                                            <option value="tue">Tuesday</option>
                                            <option value="wed">Wednesday</option>
                                            <option value="thu">Thursday</option>
                                            <option value="fri">Friday</option>
                                            <option value="sat">Saturday</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="simpleinput">Food Type</label>
                                    <select required  id="simpleinput" class="form-control" placeholder="Price"
                                        name="food_type" value="">
                                        <option value="veg">Veg</option>
                                        <option value="non_veg">Non Veg</option>
                                    </select>
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="simpleinput">Food Time</label>
                                    <select required  id="simpleinput" class="form-control" placeholder="Price"
                                        name="food_time" value="">
                                        <option value="lunch">Lunch</option>
                                        <option value="dinner">Dinner</option>
                                    </select>
                                    </div>
                                    <div class="form-group mb-3">
                                    <label for="simpleinput">Food Description</label>
                                    <textarea required  id="simpleinput" class="form-control" placeholder="Description Of the Food."
                                        name="description" value=""></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Image 1</label>
                                        <input required type="file" id="simpleinput" class="form-control"
                                            placeholder="Shipping Charge" name="image1">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Image 2</label>
                                        <input required type="file" id="simpleinput" class="form-control"
                                            placeholder="Shipping Charge" name="image2">
                                    </div>
                                    <input type="submit" id="example-palaceholder" class="btn btn-primary" name="update"
                                        value="Submit">


                            </div>
                        </div> <!-- /.col -->
                        </form>
                    </div>
                </div>
            </div>





    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>