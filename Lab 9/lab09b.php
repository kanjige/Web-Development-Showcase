<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9b</title>
<head>
<body>
    <div style="text-align: center;">
    <h2>EveDB</h2>
    <nav><a style="margin-left: 25px;" href="https://www.cs.ryerson.ca/~e12wong/index">Home</a></nav>
    <br>
</div>
</body>

<?php include ('connect.php');

$query = "SELECT *
FROM albums
ORDER BY Date DESC;";
$result = mysqli_query($connect, $query);

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

mysqli_close($connect);
?>