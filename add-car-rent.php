<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}
include("database.php");

// if ($_SESSION['email'] == '') {
// 	header("location:Login_admin.php");
// }

if ($_SESSION['email'] == '') {
    header("location:Login.php");
}

$view = "Select * from add_car_rent";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['delete'];
    $editimg = "select * from add_car_rent where id='$id'";
    $img1 = mysqli_query($db, $editimg);
    $return = mysqli_fetch_array($img1);
    unlink('image/' . $return['image']);

    $sql = "delete from add_car_rent where id='$id' ";
    mysqli_query($db, $sql);
    header("location:add-car-rent.php");
}

if (isset($_REQUEST['btnsubmit'])) {
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'Car-Service-Project/image/' . $image);
    $carname = $_REQUEST['carname'];
    $dayprice = $_REQUEST['dayprice'];
    $dayfuelprice = $_REQUEST['dayfuelprice'];
    $weekprice = $_REQUEST['weekprice'];
    $weekfuelprice = $_REQUEST['weekfuelprice'];
    $monthprice = $_REQUEST['monthprice'];
    $monthfuelprice = $_REQUEST['monthfuelprice'];

    $sql = " insert into add_car_rent(image,name,dprice,dfuelcharge,wprice,wfuelprise,mprice,mfuelprice) values ('$image','$carname','$dayprice','$dayfuelprice','$weekprice','$weekfuelprice','$monthprice','$monthfuelprice') ";
    mysqli_query($db, $sql);

    echo "<script>
        alert('Data insert Successfully..');
    </script>";
    header("location:add-car-rent.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <style>
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

        .table-container {
            border: 1px solid #000;
            border-radius: 10px;
            padding: 10px;
            margin: auto;
            margin-right: 10px;
            margin-left: 10px;
            margin-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("sidenavbar.php"); ?>


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
                                <label for="formFile" class="form-label">Upload Car Photo</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" name="carname" placeholder="" required>
                                <label for="floatingInput">Enter Car Name</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" name="dayprice" placeholder="" required>
                                <label for="floatingInput">Enter Day Wise Price</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" name="dayfuelprice" placeholder="" required>
                                <label for="floatingInput">Enter Day Wise Fuel Price</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" name="weekprice" placeholder="" required>
                                <label for="floatingInput">Enter Week Wise Price</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" name="weekfuelprice" placeholder="" required>
                                <label for="floatingInput">Enter Week Wise Fuel Price</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" name="monthprice" placeholder="" required>
                                <label for="floatingInput">Enter month Wise Price</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control rounded-3" autocomplete="off" id="floatingInput" name="monthfuelprice" placeholder="" required>
                                <label for="floatingInput">Enter month Wise Fuel Price</label>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary text-white mt-2 rounded-3 text-dark" name="btnsubmit">Submit </button>
                            </div>
                        </form>
                    </div>
                    <div style="overflow-x:auto;">
                        <div class="table-container">
                            <h1 class="text-center p-3">Add car Booking Data</h1>
                            <table id="example" class="display dataTable table-dark table-bordered text-center" style="width: 100%;">
                                <thead>
                                    <tr class="text-white">
                                        <th>image</th>
                                        <th>name</th>
                                        <th>Day Price</th>
                                        <th>Day Fuel Price</th>
                                        <th>Week price</th>
                                        <th>Week Fuel Price</th>
                                        <th>Month Price</th>
                                        <th>Month Fuel Price</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($GetData)) {
                                    ?>
                                        <tr class="table-light border-bottom border-dark">
                                            <td><img class="rounded-circle" src="Car-Service-Project/image/<?php echo $row['image']; ?>" width="70" height="70"></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['dprice'] ?></td>
                                            <td><?php echo $row['dfuelcharge'] ?></td>
                                            <td><?php echo $row['wprice'] ?></td>
                                            <td><?php echo $row['wfuelprise'] ?></td>
                                            <td><?php echo $row['mprice'] ?></td>
                                            <td><?php echo $row['mfuelprice'] ?></td>
                                            <td><a href="add-car-rent-edit.php?edit=<?php echo $row['id'] ?>" class="fs-2 text-dark active" role="button" aria-pressed="true"><i class='bx bx-edit'></i></a></td>
                                            <td><a href="add-car-rent.php?delete=<?php echo $row['id'] ?>" onclick=" return confirm('Are You Sure Record Delete !!!') " class="fs-2 text-dark active" role="button" aria-pressed="true"><i class='bx bx-trash'></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
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