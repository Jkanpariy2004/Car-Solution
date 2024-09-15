<?php
    include('database.php');

    $oneMonthAgo = date('Y-m-d', strtotime('-1 month'));

    $sql = "delete from old_car where created_at < '$oneMonthAgo'";

    if (mysqli_query($db, $sql)) {
        echo "Records deleted successfully";
    } else {
        echo "Error deleting records: " . mysqli_error($conn);
    }
?>