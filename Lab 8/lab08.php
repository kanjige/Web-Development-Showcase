<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="https://www.cs.ryerson.ca/~e12wong/lab08/lab08.php" />
    <title>Lab 8</title>
    
    <style>
        div {
            height: 200px;
            line-height: 200px;
            text-align: center;
            text-shadow: 0px 0px 10px white;
            font-size: 50px;
        }
        section {
            text-align: center; 
        }
        table {
            border-collapse: collapse;
            margin: auto;
            width: 50%;
        }
        td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
        button {
            width: 80px;
            heigth: 80px;
        }
        img {
            width: 60px;
            height: 60px;
        }

    </style>
</head>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $hour = date('G');

    if ($hour >= 5 && $hour < 12) {
        echo "<div style=\"background-image: url('morning.jpg'); color: black;\">Good Morning</div>";
    } elseif ($hour >= 12 && $hour < 17) {
        echo "<div style=\"background-image: url('afternoon.jpg'); color: black;\">Good Afternoon</div>";
    } elseif ($hour >= 17 && $hour < 21) {
        echo "<div style=\"background-image: url('evening.gif'); color: black;\">Good Evening</div>";
    } else {
        echo "<div style=\"background-image: url('night.gif'); color: white;\">Good Night</div>";
    }
?>

<nav> <br>
    <a href="https://www.cs.ryerson.ca/~e12wong/index">Home</a>
</nav>


<section>
    <h3>Problem 2</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="row">Rows</label><br>
        <input type="text" name="row" required><br><br>
        <label for="column">Columns</label><br>
        <input type="text" name="column" required><br><br>
        <input type="submit"><br><br>
    </form>
</section> 


<?php
    if (isset($_POST["row"]) && isset($_POST["column"])) {
        $row = $_POST["row"];
        $col = $_POST["column"];

        if (!is_numeric($row) || !is_numeric($col) || ($row < 3 || $row > 12) || ($col < 3 || $col > 12)) {
            echo "<p style='text-align: center;'>Row and Column size must be between 3 and 12</p>";
        }

        if (is_numeric($row) && is_numeric($col) && ($row >= 3 && $row <= 12) && ($col >= 3 && $col <= 12)) {
            echo "<table>";
            for ($rownum = 1; $rownum <= $row; $rownum++) {
                echo "<tr>";
                for ($colnum = 1; $colnum <= $col; $colnum++) {
                    echo "<td>";
                    echo $rownum * $colnum;
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
?>

<hr>

<section>
    <h3>Problem 3</h3>
    <p>Select, Submit, and Reload page to view image</p>
    <p>
        <img src="mail.gif" alt="mail">
        <img src="turkey3.gif" alt="turkey3">
        <img src="turkey4.gif" alt="turkey4">
        <img src="turkey5.gif" alt="turkey5">
        <img src="turkey6.gif" alt="turkey6">
    </p>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="img"> 
            <option>mail</option>
            <option>turkey3</option>
            <option>turkey4</option>
            <option>turkey5</option>
            <option>turkey6</option>
        </select>
        <input type="submit">
    </form>

<?php
    // Set cookie if form is submitted
    if (isset($_POST["img"])) {
        setcookie('selected', $_POST["img"], time() + 86400);
    }

    // Retrieve the selected image from the cookie
    $img = isset($_COOKIE['selected']) ? $_COOKIE['selected'] : null;

    echo "<fig style='position: fixed; top: 3%; right: 0; padding: 10px; width: 80px; height: auto; background-color:white; opacity: 70%'>";
    if ($img) {
        echo "<img src='$img.gif' width='120' height='120'>";
        echo "<figcaption style='color: black; text-align: center;'>current image: $img.gif</figcaption>";
    } else {
        echo "<figcaption style='background:white; color:black; text-align: center; opacity: 70%;'> Image not selected</figcaption>";
    }
    echo "</fig>";
?>

