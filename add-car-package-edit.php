<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}
$db = mysqli_connect('localhost', 'root', '', 'car_service');

if ($_SESSION['email'] == '') {
    header("location:Login.php");
}

if (isset($_REQUEST['edit'])) {
    $id = $_REQUEST['edit'];
    $sql = "select * from add_car_package where id='$id'";
    $result = mysqli_query($db, $sql);
    $return = mysqli_fetch_array($result);
}

$view = "Select * from add_car_package";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['btnsubmit'])) {
    $im = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'Car-Service-Project/image/' . $im);

    if ($im == '') {
        $im = $return['image'];
    } else {
        unlink('Car-Service-Project/image/' . $return['image']);
    }

    $daata = "update add_car_package set image='$im' where id='$id'";
    mysqli_query($db, $daata);
    header("location:add-car-package.php");
}

if (isset($_POST['btnsubmit'])) {
    $pno = $_POST['pno'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pdetails = $_POST['pdetails'];
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $s3 = $_POST['s3'];
    $s4 = $_POST['s4'];
    $s5 = $_POST['s5'];
    $s6 = $_POST['s6'];
    $s7 = $_POST['s7'];
    $s8 = $_POST['s8'];
    $s9 = $_POST['s9'];
    $s10 = $_POST['s10'];

    $sql = "UPDATE add_car_package SET packege_no='$pno', packege_name='$pname', price='$pprice', detail='$pdetails', s_1='$s1', s_2='$s2', s_3='$s3', s_4='$s4', s_5='$s5', s_6='$s6', s_7='$s7', s_8='$s8', s_9='$s9', s_10='$s10' WHERE id='$id'";

    if (mysqli_query($db, $sql)) {
        echo '<script>alert("Data updated successfully");</script>';
    } else {
        echo '<script>alert("Error: Unable to update data");</script>';
    }
    header("location:add-car-package.php");
}

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['delete'];

    $sql = "DELETE FROM add_car_package WHERE id='$id'";
    mysqli_query($db, $sql);
    header("location:car-package.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Solution Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="icon/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <style>
        .table-container {
            border: 1px solid #000;
            border-radius: 10px;
            padding: 5px;
            margin: auto;
            margin-right: 5px;
            margin-left: 5px;
            margin-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
        }

        .box {
            margin: auto;
            margin-top: 50px;
            width: 100%;
            padding: 15px;
            max-width: 500px;
            background: white;
            border-radius: 4px;
            box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include("sidenavbar.php");
        ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <div class="text-center w-100">
                        <h1 class="blink">Car Solution Admin Dashboard</h1>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="box">
                        <form action="" method="post" enctype="multipart/form-data">
                            <h1 class="text-center">Add Data</h1>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Service Photo</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>
                            <div class="text-center">
                                <img src="Car-Service-Project/image/<?php echo $return['image']; ?>" alt="" height="100px" width="100px">
                                <?php echo $return['image']; ?>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['packege_no'] ?>" name="pno" placeholder="" required>
                                <label for="floatingInput">Enter Packege Number</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['packege_name'] ?>" name="pname" placeholder="" required>
                                <label for="floatingInput">Enter Package Name</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['price'] ?>" name="pprice" placeholder="" required>
                                <label for="floatingInput">Enter Package Price</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['detail'] ?>" name="pdetails" placeholder="" required>
                                <label for="floatingInput">Enter Package details</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_1'] ?>" name="s1" placeholder="" required>
                                <label for="floatingInput">Enter Service 1</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_2'] ?>" name="s2" placeholder="" required>
                                <label for="floatingInput">Enter Service 2</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_3'] ?>" name="s3" placeholder="" required>
                                <label for="floatingInput">Enter Service 3</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_4'] ?>" name="s4" placeholder="" required>
                                <label for="floatingInput">Enter Service 4</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_5'] ?>" name="s5" placeholder="" required>
                                <label for="floatingInput">Enter Service 5</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_6'] ?>" name="s6" placeholder="" required>
                                <label for="floatingInput">Enter Service 6</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_7'] ?>" name="s7" placeholder="" required>
                                <label for="floatingInput">Enter Service 7</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_8'] ?>" name="s8" placeholder="" required>
                                <label for="floatingInput">Enter Service 8</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_9'] ?>" name="s9" placeholder="" required>
                                <label for="floatingInput">Enter Service 9</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" value="<?php echo $return['s_10'] ?>" name="s10" placeholder="" required>
                                <label for="floatingInput">Enter Service 10</label>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary text-white mt-2 rounded-3 text-dark" name="btnsubmit">Submit </button>
                            </div>
                        </form>
                    </div>

                    <div class="table-container">
                        <div class="container-fluid" style="overflow-x:scroll;">
                            <h1 class="text-center p-3">Car Packages Data</h1>
                            <table id="example" class="display dataTable table-dark table-bordered text-center" style="width: 100%; overflow-x: auto;">
                                <thead>
                                    <tr class="text-white">
                                        <th>image</th>
                                        <th>Package No.</th>
                                        <th>Package Name</th>
                                        <th>Price</th>
                                        <th>Details</th>
                                        <th>Service 1</th>
                                        <th>Service 2</th>
                                        <th>Service 3</th>
                                        <th>Service 4</th>
                                        <th>Service 5</th>
                                        <th>Service 6</th>
                                        <th>Service 7</th>
                                        <th>Service 8</th>
                                        <th>Service 9</th>
                                        <th>Service 10</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($GetData)) {
                                    ?>
                                        <tr class="table-light border-bottom border-dark">
                                            <td><img src="Car-Service-Project/image/<?php echo $row['image']; ?>" width="100" height="100"></td>
                                            <td><?php echo $row['packege_no'] ?></td>
                                            <td><?php echo $row['packege_name'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><?php echo $row['detail'] ?></td>
                                            <td><?php echo $row['s_1'] ?></td>
                                            <td><?php echo $row['s_2'] ?></td>
                                            <td><?php echo $row['s_3'] ?></td>
                                            <td><?php echo $row['s_4'] ?></td>
                                            <td><?php echo $row['s_5'] ?></td>
                                            <td><?php echo $row['s_6'] ?></td>
                                            <td><?php echo $row['s_7'] ?></td>
                                            <td><?php echo $row['s_8'] ?></td>
                                            <td><?php echo $row['s_9'] ?></td>
                                            <td><?php echo $row['s_10'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
        <script>
            new DataTable('#example');
        </script>

</body>

</html>