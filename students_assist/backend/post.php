<?php
//error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

session_start();
$userid_sess =  htmlentities(htmlentities($_SESSION['uid_s'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname_s'], ENT_QUOTES, "UTF-8"));
$country_sess =   htmlentities(htmlentities($_SESSION['country_s'], ENT_QUOTES, "UTF-8"));
$country_nickname_sess =   htmlentities(htmlentities($_SESSION['country_nickname_s'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo_s'], ENT_QUOTES, "UTF-8"));
$address_sess =  htmlentities(htmlentities($_SESSION['address_s'], ENT_QUOTES, "UTF-8"));
$lat_sess = strip_tags($_SESSION['lat_s']);
$lng_sess = strip_tags($_SESSION['lng_s']);
$map_zoom_sess = strip_tags($_SESSION['map_zoom_s']);


include('db_connection.php');

$title_post = strip_tags($_POST['titleo']);
$category = strip_tags($_POST['category']);
$desco = strip_tags($_POST['desco']);

$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$mt = microtime(true);
$mdx = md5($mt);
$uidx = uniqid();
$userid = $uidx.$timer.$mdx;
$tit = $uidx.$timer.$mdx;




if ($title_post == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;' id='alerts_st'>Post Title is empty</div>";
exit();
}

if ($desco == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;' id='alerts_st'>Post Description is empty</div>";
exit();
}


if ($category == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;' id='alerts_st'>Help Category is empty</div>";
exit();
}

echo "hhhh";
$points='100';
$statement = $db->prepare('INSERT INTO posts_table
(title,title_seo,content,fullname,timer,userid,userphoto,points,total_comments,total_like,country_nickname,country_name,data)

                          values
(:title,:title_seo,:content,:fullname,:timer,:userid,:userphoto,:points,:total_comments,:total_like,:country_nickname,:country_name,:data)');

$statement->execute(array( 
':title' => $title_post,
':title_seo' => $tit,
':content' => $desco,		
':fullname' => $fullname_sess,
':timer' => $timer,
':userid' =>$userid_sess,
':userphoto' =>$photo_sess,
':points' =>$points,
':total_comments' =>'0',
':total_like' =>'0',
':country_nickname' =>$country_nickname_sess,
':country_name' =>$country_sess,
':data' => $category

));


$stmtx = $db->query("SELECT LAST_INSERT_ID()");
$lastInserted_Id = $stmtx->fetchColumn();


// get users points and make updates
$result_u = $db->prepare('SELECT * FROM users_table where userid =:userid');
$result_u->execute(array(':userid' => $userid_sess));
$nosofrows_u = $result_u->rowCount();
$row_u = $result_u->fetch();
$user_point = $row_u['points'];
$user_point_added = $user_point + 100;	

// update users Tables for users points
$result = $db->prepare('UPDATE users_table set points=:points where userid =:userid');
$result->execute(array(':points' => $user_point_added, ':userid' => $userid_sess));

// update posts table for users points
$result = $db->prepare('UPDATE posts_table set points=:points where userid =:userid');
$result->execute(array(':points' => $user_point_added, ':userid' => $userid_sess));


// send post broadcast notifications to all Users

$result = $db->prepare('SELECT * FROM users_table');
$result->execute(array());
$nosofrows = $result->rowCount();


if($nosofrows > 0){
//foreach($row['data'] as $v1){
while($row = $result->fetch()){

$reciever_userid = $row['id'];
$reciever_userid2 = $row['userid'];
		    
//insert into notification table	

$statement1 = $db->prepare('INSERT INTO notification_table
(post_id,userid,fullname,photo,reciever_id,status,type,timing,title,title_seo)
                        values
(:post_id,:userid,:fullname,:photo,:reciever_id,:status,:type,:timing,:title,:title_seo)');
$statement1->execute(array( 

':post_id' => $lastInserted_Id,
':userid' => $userid_sess,
':fullname' => $fullname_sess,
':photo' => $photo_sess,
':reciever_id' => $reciever_userid2,
':status' => 'unread',
':type' => 'post',
':timing' => $timer,
':title' => $title_post,
':title_seo' => $tit
));

}
}

if($statement){
echo  "<script>alert('Content Successfully Posted');</script>";
echo "<div style='background:green;padding:8px;color:white;border:none;'>Content Successfully Posted..</div>";
echo "<script>
location.reload();
</script>
";

}else{
echo "<div id='alerts_st' style='background:red;padding:8px;color:white;border:none;'>Content Posting  Failed...</div>";
}



}


?>



