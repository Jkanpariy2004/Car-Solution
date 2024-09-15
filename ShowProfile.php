<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Mechanic-Login.php");
}
include("database.php");

if ($_SESSION['username'] == '') {
    header("location:Mechanic-Login.php");
}

$session = $_SESSION['username'];
$sql = "select * from mechanic_register where username='$session'";
$check = mysqli_query($db, $sql);

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['delete'];
    $sql = "delete from mechanic_register where id='$id' ";
    mysqli_query($db, $sql);
    header("location:Mechanic-id-reg.php");
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
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img src="img/logo.png" class="rounded-circle" alt="" height="50" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">Mechanic Dashboard</div>
            </a>

            <hr class="sidebar-divider d-none d-md-block">
            <!-- Heading -->
            <div class="sidebar-heading">
                Service
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="mechanic.php">
                    <i class='bx bx-user'></i>
                    <span>Service Request</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Show Profile
            </div>
            <li class="nav-item active">
                <a class="nav-link" href="ShowProfile.php">
                    <i class='bx bx-user'></i>
                    <span>Show Profile</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            
            <!-- Heading -->
            <div class="sidebar-heading">
                Logout
            </div>
            <li class="nav-item active">
                <a class="nav-link" href="logout_mechanic.php">
                    <i class='bx bx-log-out-circle'></i>
                    <span>Logout</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

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
                        <h1 class="blink">Car Solution Mechanic Dashboard</h1>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <div class="box my-5">
                    <?php
                    if (mysqli_num_rows($check)) {
                        $row = mysqli_fetch_array($check);
                    ?>
                        <table class="table table-hover">
                            <tr>
                                <td colspan="2" class="text-center p-4">
                                    <img class="rounded-circle" src="Car-service-project/image/<?php echo $row['photo']; ?>" width="200" height="200">
                                </td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>
                                    <?php echo $row["name"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email id:</th>
                                <td>
                                    <?php echo $row["email"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Phone Number:</th>
                                <td>
                                    <?php echo $row["phone_number"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Username:</th>
                                <td>
                                    <?php echo $row["username"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Password:</th>
                                <td>
                                    <?php echo $row["password"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Confirm Password:</th>
                                <td>
                                    <?php echo $row["conpassword"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <a href="ShowProfile.php?delete=<?php echo $row['id']; ?>" class="btn btn-success active" role="button" aria-pressed="true">Delete Account</a>
                                    <a href="ShowProfile_edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-success active" role="button" aria-pressed="true">Edit Profile</a>
                                </td>
                            </tr>
                        </table>
                    <?php
                    }
                    ?>
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

</body>

</html>