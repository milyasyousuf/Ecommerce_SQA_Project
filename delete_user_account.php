<?php 

include 'config.php';

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}
else{

	if($_SESSION["type"]==="admin") {
	  header("location:admin.php");
	}
	#echo $_SESSION['username'];
	#echo "delete from users WHERE email ='".$_SESSION['username']."232'";
	$result = $mysqli->query("delete from users WHERE email ='".$_SESSION['username']."'");
	#echo $result;
	session_destroy();
	echo '<h1>Your account sucessfully deleted! Redirecting...</h1>';
	header("Refresh: 3; url=index.php");


}

?>