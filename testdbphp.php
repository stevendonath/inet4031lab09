<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Northland Analytics PHP/MySQL Test Page</title>
</head>
<body>
	<h1>Northland Analytics PHP/MySQL Test Page</h1>
<?php

//this is the php object oriented style of creating a mysql connection
$conn = new mysqli('localhost', 'jens2259', 'jens2259', 'employees' );

//check for connection success
if ($conn->connect_error) {
        die("MySQL Connection Failed: " . $conn->connect_error);
   }
echo "MySQL Connection Succeeded<br><br>";

//create the SQL select statement, notice the funky string concat at the end to variablize the query
//based on using the GET attribute
$sql = "SELECT first_name,last_name,hire_date FROM employees where last_name = 'Weedman'";

//put the resultset into a variable, again object oriented way of doing things here
$result = $conn->query($sql);

//if there were no records found say so, otherwise create a while loop that loops through all rows
//and echos each line to the screen. You do this by creating some crazy looking echo statements
// in the form of HTMLText . row[column] . HTMLText . row[column].   etc...
// the dot "." is PHP's string concatenator operator
if ($result->num_rows > 0){
    echo "<p>Database Records Found.</p>";
//print rows of records found in the database if any
    while($row = $result->fetch_assoc()){
         echo "Employee: " . $row["first_name"]. " " . $row["last_name"]. " " . $row["hire_date"]. "<br>";
   }
 } else {
         echo "No Records Found";
 }

//always close the connection to the DB, don't leave 'em hanging
$conn->close();

?>
<br>
<a href="https://www.php.net/manual/en/book.mysqli.php" target="_blank">
Learn more about connecting PHP to MySQL here
</a>
</body>
</html>
