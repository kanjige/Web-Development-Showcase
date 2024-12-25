<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 9a</title>
<head>
<body>
    <div style="text-align: center;">
    <h2>EveDB</h2>
    <nav><a style="margin-left: 25px;" href="https://www.cs.ryerson.ca/~e12wong/index">Home</a></nav>
    <br>
</div>
</body>

<?php include ('connect.php'); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$drop = "DROP TABLE IF EXISTS albums;";

if (mysqli_query($connect, $drop)) {
    echo "Table dropped successfully: " . $drop . "<br>";
} else {
    echo "Error dropping table: " . mysqli_error($connect) . "<br>";
}



$albums = "CREATE TABLE albums (
    PictureNum INT PRIMARY KEY,
    Subject VARCHAR(50) NOT NULL,
    Location VARCHAR(50) NOT NULL,
    Date DATE NOT NULL,
    PictureURL VARCHAR(200) NOT NULL
);";

if (mysqli_query($connect, $albums)) {
    echo "Table Successfully Created<br>";
} else {
    echo "Error: " . $albums . "<br>" . mysqli_error($connect);
}

$inserts = [
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (1, 'Under Blue', 'Ontario', '2024-11-27', 'underblue.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (2, 'Bunka', 'California', '2017-12-13', 'bunka.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (3, 'Otogi', 'California', '2018-02-06', 'otogi.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (4, 'Blue', 'Kanto', '2018-03-7', 'blue.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (5, 'Kaizin', 'Sichuan', '2022-03-16', 'kaizin.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (6, 'Smile', 'California', '2020-02-12', 'smile.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (7, 'Kaikai Kitan/ Ao no Waltz', 'Ontario', '2020-12-23', 'kaikaiwaltz.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (8, 'Gunjo Sanka/ Yuseboushi', 'Seoul', '2021-09-30', 'gunjoyusei.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (9, 'Bokurano', 'Seoul', '2023-03-22', 'bokurano.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (10, 'Wonder Word', 'Kanto', '2015-08-17', 'wonderword.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (11, 'Round Robin', 'Kanto', '2014-08-12', 'roundrobin.png');",
    "INSERT INTO albums (PictureNum, Subject, Location, Date, PictureURL) VALUES (12, 'Official Number', 'Sichuan', '2016-10-19', 'officialnumber.png');"
];

foreach ($inserts as $query) {
    if (mysqli_query($connect, $query)) {
        echo "Data Successfully Inserted: $query <br>";
    } else {
        echo "Error inserting data: $query <br>" . mysqli_error($connect) . "<br>";
    }
}
?>



