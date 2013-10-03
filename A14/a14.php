<!DOCTYPE html>
<html>
<body>

<?php

//Connect to Database test
$mysqli = new mysqli("localhost","root","","test");

//Connection Error
if($mysqli -> connect_errno){
	echo "FAILURE:(".$mysqli->connect_errno.")".$my->connect_error;
}


//Create tables query
$res = $mysqli->query("CREATE TABLE Comments(entries VARCHAR(50))");
//Insert data query
$entry = "INSERT INTO Comments (entries) VALUES ('$_POST[comment]')";
$boolean = mysqli_query($mysqli, $entry);

//Insert Error
if($boolean){
	echo "Comment added to table.";
}else{
	die('Error: ' .mysqli_error($mysqli));
}	
?> 

<form name="exampleform" action="a14.php" method="post">
<p>Comments:</p> <textarea type="text" name="comment" id ="comm"></textarea></br>
<input type="submit" value="Submit Your Comments"/>
</form>


<?php
//Output table entries
$q = "SELECT entries FROM Comments";
$result = mysqli_query($mysqli, $q);
$arr = Array();
while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $arr[] =  $row['entries'];  
}
foreach($arr as $value){
echo "$value <br>";
}
 
mysqli_close($mysqli);
?>

</body>
</html>