<!DOCTYPE html>
<html>


<body>
<?php
	$file = 'comments.txt';
  if(file_exists($file)){
	$getstuff = file_get_contents($file);
	echo $getstuff;
   }

?> 

</br> 



<form name="exampleform" action="page.php" method="post">
<p>Comments:</p> <textarea type="text" name="comment" id ="comm"></textarea></br>


<input type="submit" value="Submit Your Comments"/>

</form>

<?php


if(isset($_POST['comment'])){
	$comm = $_POST['comment'];
	$fp = fopen("comments.txt","a+") or exit("unable to open the file");
   if($fp != null)
   {
	fwrite($fp,$comm);
	fwrite($fp,'</br>');
    }
fclose($fp);
}


?>

</body>
</html>