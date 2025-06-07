<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }
        .color-box {
            padding: 20px;
            margin-bottom: 15px;
            color: white;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <?php
        $connect = mysqli_connect('localhost', 'root', '', 'color');

        if(!$connect){
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = 'SELECT * FROM colors';
        $result = mysqli_query($connect, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $colors = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach ($colors as $color) {
                $name = $color['Name'];
                $hex = $color['Hex'];

                echo '<div class="color-box" style="background:' . $hex . ';">';
                echo $name . ' (' . $hex . ')';
                echo '</div>';
            }
        } else {
            echo "No colors found.";
        }

        mysqli_close($connect);
    ?>
</body>
</html>
