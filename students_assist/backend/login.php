<?php
error_reporting(0);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
if ($email == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Email is Empty.</div>";
exit();
}
if ($password == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Password is Empty..</div>";
exit();
}

include('db_connection.php');
$result = $db->prepare('SELECT * FROM users_table where email = :email');

		$result->execute(array(
			':email' => $email

    ));

$count = $result->rowCount();

$row = $result->fetch();

if( $count == 1 ) {
$password = strip_tags($_POST['password']);

//start hashed passwordless Security verify
if(password_verify($password,$row["password"])){
            //echo "Password verified and ok";

// initialize session if things where ok

session_start();
session_regenerate_id();
$timer = time();

// initialize session

$_SESSION['uid_s'] = $row['userid'];
$_SESSION['fullname_s'] = $row['fullname'];
$_SESSION['photo_s'] = $row['photo'];
$_SESSION['country_s'] = $row['country'];
$_SESSION['address_s'] = $row['address'];
$_SESSION['lat_s'] = $row['lat'];
$_SESSION['lng_s'] = $row['lng'];
$_SESSION['map_zoom_s'] = $row['map_zoom'];
$_SESSION['country_nickname_s'] = $row['country_nickname'];

echo "<div style='background:green;padding:8px;color:white;border:none;'>Login sucessful <img src='image/loader.gif'></div>";
echo "<script>window.location='dashboard.php'</script>";
}
else{

echo "<div style='background:red;padding:8px;color:white;border:none;'>Password does not match..</div>";

}


}
else {

echo "<div style='background:red;padding:8px;color:white;border:none;'>User with this Email does not Exist</div>";
}
?>

<?php ob_end_flush(); ?>
