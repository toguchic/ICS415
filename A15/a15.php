<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
</head>
<body>

<?php

//Connect to Database test
$mysqli = new mysqli("localhost","root","","test");

//Connection Error
if($mysqli -> connect_errno){
	echo "FAILURE:(".$mysqli->connect_errno.")".$my->connect_error;
}


//Create tables query
$res = $mysqli->query("CREATE TABLE Comments(username VARCHAR(50), entries VARCHAR(50))");
//Insert data query
$entry = "INSERT INTO Comments (username,entries) VALUES ('$_POST[username]','$_POST[comment]')";
$boolean = mysqli_query($mysqli, $entry);


//Insert Error
if($boolean){
	echo "Comment added to table.";
}else{
	die('Error: ' .mysqli_error($mysqli));
}	
?> 

<form name="exampleform" action="a15.php" method="post">
Username: <input type="text" name="username"><br>
<p>Comments:</p> <textarea type="text" name="comment" id ="comm"></textarea></br>
<input type="submit" value="Submit Your Comments"/>
</form>


<?php
//Set cookies
setcookie('username',$_POST['username']);


//Output table entries
$q = "SELECT * FROM Comments";
$result = mysqli_query($mysqli,$q);

echo"<b>Username  Comments</b>";
echo "<table><tr>";
// Print the data
while($row = mysqli_fetch_row($result)){
    echo "<tr>";
    foreach($row as $column) {
        echo "<td>$column</td>";
    }
    echo "</tr>";
}


echo "</table>";

//Summary
$user = "SELECT DISTINCT username FROM Comments";
$re = mysqli_query($mysqli, $user);
$arr = Array();

while ($e = mysqli_fetch_array($re, MYSQL_ASSOC)){
    $arr[] = $e['username'];
}
 
$comcount = Array();
foreach($arr as $val){
 $c = "SELECT COUNT(*) FROM Comments WHERE username='$val'";
  $ce = mysqli_query($mysqli, $c);
 while( $er = mysqli_fetch_array($ce, MYSQL_ASSOC)){
   $comcount[]=$er['COUNT(*)'];
}
}

if($ce){
	echo "Comment added to table.";
}else{
	die('Error: ' .mysqli_error($mysqli));
}

//Print SUmmary 
echo "<p>Username:";

foreach($arr as $value){
echo " $value   |";
}
echo "</p>";
echo "<p>Comments:";
foreach($comcount as $pr){
echo " $pr  |";
}
echo "</p>";


mysqli_close($mysqli);
?>

</body>
</html>