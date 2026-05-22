<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars Records</title>

    <style>
        table {
            border-collapse: collapse;
            width: 70%;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>

<h2>Cars Database Records</h2>

<?php

require_once("settings.php");

// Connect to database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query
$query = "SELECT * FROM cars";

// Execute query
$result = mysqli_query($conn, $query);

// Check if records exist
if (mysqli_num_rows($result) > 0) {

    echo "<table>";

    // Table headings
    echo "<tr>";
    echo "<th>Car ID</th>";
    echo "<th>Make</th>";
    echo "<th>Model</th>";
    echo "<th>Price</th>";
    echo "<th>Year</th>";
    echo "</tr>";

    // Fetch and display rows
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        echo "<td>" . $row['car_id'] . "</td>";
        echo "<td>" . $row['make'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['yom'] . "</td>";

        echo "</tr>";
    }

    echo "</table>";

} else {

    echo "There are no cars to display.";

}


mysqli_close($conn);

?>

</body>
</html>