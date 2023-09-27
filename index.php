<!DOCTYPE html>
<html>
<head>
    <title>Grocery List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            margin-top: 20px;
            color: #555;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

        form {
            display: inline;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #ff5555;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 5px 10px;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #4caf50;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        button[type="submit"]:hover, button[type="button"]:hover, a:hover {
            background-color: #333;
        }
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
                echo "<button type='submit'>Remove</button>";
                echo "</form>";
                echo "</li>";
            }
        } else {
            echo "No items in the list.";
        }

        mysqli_close($conn);
        ?>
    </ul>
</body>
</html>
