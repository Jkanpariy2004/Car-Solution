<?php
session_start();

$_SESSION['timeout'] = time() + 10800;
if (isset($_SESSION['timeout']) && time() > $_SESSION['timeout']) {
    session_unset();
    session_destroy();

    header("Location:Login.php");
}
include("database.php");


if ($_SESSION['email'] == '') {
    header("location:Login.php");
}

$view = "Select * from old_car";
$GetData = mysqli_query($db, $view);

if (isset($_REQUEST['deleteall'])) {
    $id = $_REQUEST['deleteall'];

    // Get the current date
    $currentDate = date('Y-m-d');

    // Calculate the date 1 month ago
    $oneMonthAgo = date('Y-m-d', strtotime('-1 month'));

    // Construct SQL to delete records older than 1 month
    // $sql = "DELETE FROM old_car WHERE id='$id' AND created_at <= '$oneMonthAgo'";
    $sql = "DELETE FROM old_car WHERE created_at <= '$oneMonthAgo'";

    // Execute the delete query
    mysqli_query($db, $sql);

    // Redirect to the appropriate page
    header("location:used-car.php");
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
    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
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

        .img-fluid {
            width: 50%;
            height: auto;
            object-fit: fill;
            max-height: 240px;
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


                <div class="table-container">
                    <div class="container-fluid" style="overflow-x:scroll;">
                        <h1 class="text-center p-3">Old Car Data Data</h1>
                        <table id="example" class="display dataTable table-dark table-bordered text-center" style="width: 100%;">
                            <thead>
                                <tr class="text-white">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    <th>Address</th>
                                    <th>Car Name</th>
                                    <th>Model Name</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($GetData)) {
                                ?>
                                    <tr class="table-light border-bottom border-dark">
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['mobile'] ?></td>
                                        <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['car_name'] ?></td>
                                        <td><?php echo $row['model_name'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#photoModal<?php echo $row['id']; ?>">
                                                View Photos
                                            </button>
                                        </td>
                                        <div class="modal fade" id="photoModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="photoModalLabel">Photos</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        $images = explode(",", $row['photo']);
                                                        foreach ($images as $image) {
                                                            echo "<img src='Car-Service-Project/image/" . trim($image) . "' class='img-fluid'>";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <td><?php echo $row['price'] ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                                        <td><?php echo date('h:i A', strtotime($row['created_at'])); ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="text-center mt-5">
                            <a id="deleteAllBtn" class="btn btn-success" name="deleteall">Delete all records from 1 month ago</a>
                            <script>
                                document.getElementById('deleteAllBtn').addEventListener('click', function() {
                                    if (confirm('Are you sure you want to delete all records from 1 month ago?')) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', 'delete_old_records.php', true);
                                        xhr.send();

                                        xhr.onload = function() {
                                            if (xhr.status == 200) {
                                                location.reload();
                                            }
                                        };
                                    }
                                });
                            </script>
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