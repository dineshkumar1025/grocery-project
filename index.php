<!DOCTYPE html>
<html>
<head>
    <title>Grocery List</title>
    <style>
        <!-- ... Your existing CSS code ... -->
    </style>
</head>
<body>
    <h1>Grocery List</h1>

    <form method="post" action="add_item.php">
        <label for="item_name">Add Item:</label>
        <input type="text" name="item_name" required>
        <button type="submit">Add</button>
    </form>

    <h2>Items:</h2>
    <ul>
        <?php
        include('config.php');

        if (isset($_POST['remove_item_id'])) {
            $remove_item_id = $_POST['remove_item_id'];
            $query = "DELETE FROM items WHERE id = $remove_item_id";
            $result = mysqli_query($conn, $query);

            if ($result) {
                header("Location: index.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        $query = "SELECT * FROM items";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $item_id = $row['id'];
                $item_name = $row['item_name'];

                echo "<li>{$item_name} ";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='remove_item_id' value='$item_id'>";
                echo "<button type='submit' class='remove-button'>Remove</button>"; // Added 'remove-button' class
                echo "</form>";
                echo "</li>";
            }
        } else {
            echo "No items in the list.";
        }

        mysqli_close($conn);
        ?>
    </ul>

    <!-- Include your JavaScript file here -->
    <script src="script.js"></script>
</body>
</html>
