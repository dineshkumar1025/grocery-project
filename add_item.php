<?php
include('config.php');

if (isset($_POST['item_name'])) {
    $item_name = $_POST['item_name'];
    
    $query = "INSERT INTO items (item_name) VALUES ('$item_name')";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
