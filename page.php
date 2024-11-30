<?php
//Fetch the JASON data
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = file_get_contents($url);
//decode the JASON data and put it in array
$result = json_decode($response, true);

$data=$result['results'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page.css"> 
    <title>Student info</title>
</head>
<body>
    <!-- create main tag with class has container name -->
    <main class="container">
        <!-- create name for the table -->
        <h1>Student Statistics: IT Bachelor Program</h1>
        <!-- create table  -->
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>the_programs</th>
                    <th>Nationality</th>
                    <th>College</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //check if the array is not empty
                if (!empty($data)) {
                    //use for loop to print data in the table
                    for ($i=0;$i<count($data); $i++) {
                        for($j=0;$j<count($data[$i]); $j++){
                        echo "<tr>";
                        echo "<td>" . $data[$i]['year'] . "</td>";
                        echo "<td>" . $data[$i]['semester'] . "</td>";
                        echo "<td>" . $data[$i]['the_programs'] . "</td>";
                        echo "<td>" . $data[$i]['nationality'] . "</td>";
                        echo "<td>" . $data[$i]['colleges'] . "</td>";
                        echo "<td>" . $data[$i]['number_of_students'] . "</td>";
                        echo "</tr>";
                    }
                }
                } else {
                    //if the array is empty will print data is not available 
                    echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
