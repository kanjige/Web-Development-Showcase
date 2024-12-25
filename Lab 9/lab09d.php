<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9d</title>
<head>
<body>
    <div style="text-align: center;">
    <h2>EveDB</h2>
    <nav><a style="margin-left: 25px;" href="https://www.cs.ryerson.ca/~e12wong/index">Home</a></nav>
    <br>
</div>
</body>

<?php
include('connect.php');

$years = "SELECT DISTINCT YEAR(Date) AS year FROM albums ORDER BY year DESC;";
$resultyears = mysqli_query($connect, $years);

$locs = "SELECT DISTINCT Location FROM albums ORDER BY Location ASC;";
$resultlocs = mysqli_query($connect, $locs);

if ($resultyears && $resultlocs) {
    echo '<div class="flex-container">';
    echo '<form method="post" action="https://webdev.cs.torontomu.ca/~e12wong/lab09/lab09d.php">';

    if (mysqli_num_rows($resultyears) > 0) {
        echo '<div class="flex-item">';
        echo '<p>Select Date:</p>';
        while ($row = mysqli_fetch_assoc($resultyears)) {
            echo "<input type='radio' name='date' value='" . $row['year'] . "' id='" . $row['year'] . "'>";
            echo "<label for='" . $row['year'] . "'>" . $row['year'] . "</label><br>";
        }
        echo '</div>';
    }


    if (mysqli_num_rows($resultlocs) > 0) {
        echo '<div class="flex-item">';
        echo '<p>Select Location:</p>';
        while ($row = mysqli_fetch_assoc($resultlocs)) {
            echo "<input type='radio' name='location' value='" . $row['Location'] . "' id='" . $row['Location'] . "'>";
            echo "<label for='" . $row['Location'] . "'>" . $row['Location'] . "</label><br>";
        }
        echo '<br>';
    }

    echo '<button type="submit">Submit</button>';
    echo '</form>';
} else {
    echo "Error fetching data.";
}
echo '<br><br></div><br><br>';


echo '<style>
    .flex-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    .flex-item {
        border: 1px solid #ccc;
        padding: 15px;
        background-color: #f9f9f9;
        width: 250px;
        text-align: center;
        box-shadow: 0 4px 8px #c1ccde;
    }
    .flex-item img {
        border: 1px solid #ccc;
        width: 225px;
        border-radius: 8px;
    }
</style>';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["location"]) && isset($_POST["date"])) {
    $loc = mysqli_real_escape_string($connect, $_POST["location"]);
    $year = mysqli_real_escape_string($connect, $_POST["date"]);

    $query = "SELECT * FROM albums WHERE Location = '$loc' AND YEAR(Date) = '$year';";
    $result = mysqli_query($connect, $query);

    echo '<div class="flex-container">';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="flex-item">';
            echo "<p><strong>Picture Number:</strong> " . $row['PictureNum'] . "</p>";
            echo "<p><strong>Subject:</strong> " . $row['Subject'] . "</p>";
            echo "<p><strong>Location:</strong> " . $row['Location'] . "</p>";
            echo "<p><strong>Date:</strong> " . $row['Date'] . "</p>";
            echo "<p><img src='https://www.cs.torontomu.ca/~e12wong/lab09/" . $row['PictureURL'] . "' alt='Image' width='100px'></p>";
            echo '</div>';
        }
    } else {
        echo "No records found.";
    }

    echo '</div>';
}

mysqli_close($connect);

?>