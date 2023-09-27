<!DOCTYPE html>
<html>
<head>
    <title>Grocery List</title>
</head>
<body>
    <h1>Grocery List</h1>

    <form method="post" action="add_item.php">
        <label for="item_name">Add Item:</label>
        <input type="text" name="item_name" required>
        <button type="submit">Add</button>
    </form>

    <h2>Items:</h2>
    <?php
    include('config.php');
    
    $query = "SELECT * FROM items";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['item_name']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No items in the list.";
    }
    
    mysqli_close($conn);
    ?>
</body>
</html>
