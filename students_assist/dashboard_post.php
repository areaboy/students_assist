<?php
error_reporting(0); 
?>



<?php
session_start();
include ('backend/session_authenticate.php');
include ('backend/settings.php');

$userid_sess =  htmlentities(htmlentities($_SESSION['uid_s'], ENT_QUOTES, "UTF-8"));
$fullname_sess =  htmlentities(htmlentities($_SESSION['fullname_s'], ENT_QUOTES, "UTF-8"));
$country_sess =   htmlentities(htmlentities($_SESSION['country_s'], ENT_QUOTES, "UTF-8"));
$country_nickname_sess =   htmlentities(htmlentities($_SESSION['country_nickname_s'], ENT_QUOTES, "UTF-8"));
$photo_sess =  htmlentities(htmlentities($_SESSION['photo_s'], ENT_QUOTES, "UTF-8"));
$address_sess =  htmlentities(htmlentities($_SESSION['address_s'], ENT_QUOTES, "UTF-8"));
$lat_sess = htmlentities(htmlentities($_SESSION['lat_s'], ENT_QUOTES, "UTF-8"));
$lng_sess = htmlentities(htmlentities($_SESSION['lng_s'], ENT_QUOTES, "UTF-8"));
$map_zoom_sess = htmlentities(htmlentities($_SESSION['map_zoom_s'], ENT_QUOTES, "UTF-8"));

$post_title = strip_tags($_GET['title']);
$notify_id = strip_tags($_GET['notifyId']);

if($post_title ==''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Direct Dashboard Page Access not Allowed...</div>";
exit();
}

if($notify_id  ==''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Direct Dashboard Page Access not Allowed...</div>";
exit();
}


// Ensure that only Alpha numeric Character are passed to prevent remote file inclusion Attack....
$post_title_vaidate = preg_replace("/[^a-zA-Z0-9]+/", "", $post_title);
$notify_id_vaidate = preg_replace("/[^a-zA-Z0-9]+/", "", $notify_id);




// update table notification with Unread for read Updates starts
include('backend/db_connection.php');


$update= $db->prepare('UPDATE notification_table set status =:status where id =:id');
$update->execute(array( 
':id' => $notify_id_vaidate,
':status' => 'read' 
));

?>




<!DOCTYPE html>
<html lang="en">

<head>
 <title><?php echo $title; $titlex = $title; ?> - Welcome <?php echo $fullname_sess; ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="<?php echo $description; ?>" />

<link rel="stylesheet" href="css/index_dashboard1.css">
<link rel="stylesheet" href="bootstraps/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstraps/bootstrap.min.js"></script>
<script src="javascript/moment.js"></script>
<script src="javascript/livestamp.js"></script>
 <script src="markdown/marked.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
<script>

// stopt all bootstrap drop down menu from closing on click inside
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});

</script>






<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img title='<?php  echo $titlex; ?>-logo' alt='<?php  echo $titlex; ?>-logo' class="img-rounded imagelogo_data" src="image/logo.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">


      <ul class="nav navbar-nav navbar-right">




<!--start post comments notification-->

<script>

$(document).ready(function(){

var userid_sess_data = '<?php echo $userid_sess; ?>';
$("#loader-notify_alert_posts").fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i></div>');
var datasend = {userid_sess_data:userid_sess_data};

//alert(userid_sess_data);
	
		$.ajax({
			
			type:'POST',
			url:'backend/notify_alert.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

//alert(msg);

$("#loader-notify_alert_posts").hide();
$("#result-notify_alert_posts").html(msg);
//setTimeout(function(){ $('#result-notify_alert_posts').html(''); }, 5000);	


			
	
}
			
		});
		
		

});


</script>


<li>
<span style='color:white;' class="dropdown fa fa-bell">
  <a style="color:white;font-size:14px;cursor:pointer;" title='Real-Time Notification System' class="btn1 btn-default1 dropdown-toggle"  data-toggle="dropdown">
  <span class="notify_count"><span id="loader-notify_alert_posts"></span><span id="result-notify_alert_posts"></span></span>
</a>

<ul class="dropdown-menu" style='width:350px;height: 400px;overflow-y : scroll;'>
<h4 style='color:blue;'>Real-Time Notification System</h4>
<button class="btn btn-primary" id="refresh_notify" title="Refresh Notification">Refresh Notification</button>
<br>


<script>

$(document).ready(function(){


var userid_sess_data = '<?php echo $userid_sess; ?>';
var username_sess_data = '<?php echo $userid_sess; ?>';

var sender_id=userid_sess_data;
var sender_username=username_sess_data;


if(sender_id ==''){
alert('something is wrong with Senders Id');
}


else{


$("#loader-load-notify-post").fadeIn(400).html('<br><div style="color:white;background:#ec5574;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i>&nbsp;Please Wait,Loading Your Notification Alerts...</div>');
var datasend = {sender_id:sender_id, sender_username:sender_username};


	
		$.ajax({
			
			type:'POST',
			url:'backend/notification_load.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-load-notify-post").hide();
$("#result-load-notify-post").html(msg);
//setTimeout(function(){ $('#result-load-notify-post(''); }, 5000);				

//location.reload();	
}
			
		});
		
		}


});










$(document).ready(function(){

  $('#refresh_notify').click(function () {
var userid_sess_data = '<?php echo $userid_sess; ?>';
var username_sess_data = '<?php echo $userid_sess; ?>';

var sender_id=userid_sess_data;
var sender_username=username_sess_data;


if(sender_id ==''){
alert('something is wrong with Senders Id');
}


else{


$("#loader-load-notify-post").fadeIn(400).html('<br><div style="color:white;background:#ec5574;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i>&nbsp;Please Wait,Loading Your Notification Alerts...</div>');
var datasend = {sender_id:sender_id, sender_username:sender_username};


	
		$.ajax({
			
			type:'POST',
			url:'backend/notification_load.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-load-notify-post").hide();
$("#result-load-notify-post").html(msg);
//setTimeout(function(){ $('#result-load-notify-post(''); }, 5000);				

//location.reload();	
}
			
		});
		
		}





// start notify 1


var userid_sess_data = '<?php echo $userid_sess; ?>';
$("#loader-notify_alert_posts").fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i></div>');
var datasend = {userid_sess_data:userid_sess_data};

//alert(userid_sess_data);
	
		$.ajax({
			
			type:'POST',
			url:'backend/notify_alert.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

//alert(msg);

$("#loader-notify_alert_posts").hide();
$("#result-notify_alert_posts").html(msg);
//setTimeout(function(){ $('#result-notify_alert_posts').html(''); }, 5000);	


			
	
}
			
		});
		


// end notify 1


});


});


</script>



<!-- form START-->
<div id="loader-load-notify-post"></div>
<div id="result-load-notify-post"></div>


<!--form ENDS-->

<p></p>

</ul></span>
&nbsp;&nbsp;
</li>


<!--end post comments notifications-->





 <li class="navgate_no"><a title='Go Back to Dashboard' href="dashboard.php" style="color:white;font-size:14px;">
<button class="category_post1">Go Back to Dashboard</button></a></li>

 <li style='display:none;' class="navgate_no"><a title='My Profile' href="my_profile.php" style="color:white;font-size:14px;">
<button class="category_post1">My Profile</button></a></li>


 <li style='display:none;'class="navgate_no"><a title='Logout' href="logout.php" style="color:white;font-size:14px;">
<button class="category_post1">Logout</button></a></li>


             
<li class="navgate"><img style="max-height:40px;max-width:40px;" class="img-circle" width="40px" height="40px"
 src="backend/user_photos/<?php echo $photo_sess; ?>" >



<span class="dropdown">
  <a style="color:white;font-size:14px;cursor:pointer;" title='View More Data' class="btn1 btn-default1 dropdown-toggle"  data-toggle="dropdown">
<br><?php echo $fullname_sess; ?>
  <span class="caret"></span>(More)</a>

<ul class="dropdown-menu col-sm-12">
<li><a title='My Profile' href="my_profile.php">My Profile</a></li>
<li><a title='Logout' href="logout.php">Logout</a></li>

</ul></span>

</li>



      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->





<div class='row'>
<br><br><br>


<center><h4>Welcome 
<b style='color:purple'> <?php echo $fullname_sess; ?></b>  to
 <b style='color:purple'><?php echo $title; ?></b> -- Connectng all <b style='color:purple'>Students </b> and sharing informations together..</h4></center><br>



<!--Start Left-->
<div class='col-sm-0'>

</div>

<!--End Left-->










<!--Start Center-->
<div class='col-sm-12'>


  <script>
        
   




// Get Data for Comment
$(document).ready(function(){
$('.comment_btns').click(function(){



var postid = $(this).data('postid');
var title = $(this).data('title');
$('.postid_p').html(postid);
$('.title_p').html(title);
//$('.title_value').val(title).value;
var post_id = postid;


var comment_count = $(this).data('comment_countx');
//$("#comment_totalx_"+postid).html(comment_count);
$("#comment_totalx").html(comment_count);

if(post_id == ''){
alert('Post Id cannot be empty');
return false;
}
$("#loader-comment").fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Loading Comments.</span>');
        $.ajax({
            url: 'backend/comment_loading.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'html',
            success: function(data){
$("#result_comment").html(data);
$("#loader-comment").hide();

            }
        });

});
});





// Get Data for Comment for Post Pagination
$(document).ready(function(){
//$('.comment_btns2').click(function(){
$(document).on( 'click', '.comment_btns2', function(){ 


var postid = $(this).data('postid');
var title = $(this).data('title');
$('.postid_p').html(postid);
$('.title_p').html(title);
//$('.title_value').val(title).value;
var post_id = postid;


var comment_count = $(this).data('comment_countx');
//$("#comment_totalx_"+postid).html(comment_count);
$("#comment_totalx").html(comment_count);

if(post_id == ''){
alert('Post Id cannot be empty');
return false;
}
$("#loader-comment").fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Loading Comments.</span>');
        $.ajax({
            url: 'backend/comment_loading.php',
            type: 'post',
            data: {post_id:post_id},
            dataType: 'html',
            success: function(data){
$("#result_comment").html(data);
$("#loader-comment").hide();

            }
        });

});
});




// post comments


$(document).ready(function(){
$(document).on( 'click', '.comment_send_btn', function(){ 
 //$("."comment_send_btn").click(function(){
var postid = $(this).data('postid');
var id = this.id; 
var comdesc = $('#comdesc').val();

if(comdesc == ''){
alert('comment cannot be empty');
return false;
}
        // AJAX Request


$("#loader_comments_send").fadeIn(400).html('<br><div style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending Comments.</div>');

        $.ajax({
            url: 'backend/comment.php',
            type: 'post',
            data: {postid:postid,comdesc:comdesc},
            dataType: 'json',
            success: function(data){

                var comment = data['comment'];
                var comdesc = data['comdesc'];
                var comment_username = data['comment_username'];
                 var comment_fullname = data['comment_fullname'];
 var comment_photo = data['comment_photo'];
 var comment_time = data['comment_time'];
//$("#comment_total").text(comment);
$("#comment_total_"+postid).text(comment);

$("#comment_totalx").html(comment);

var com_counting =comment;
if(com_counting > 0){
$("#no_comment_hide").hide();
}

  var comment_json = "<div class='comment_css' style=''>" +
                   
 "<img style='border-style: solid; border-width:3px; border-color:#ec5574; width:40px;height:40px; max-width:40px;max-height:40px;border-radius: 50%;' src='backend/user_photos/" + comment_photo +" '/><br>" +
      "<span style='font-size:14px;text-align:left;color:#ec5574;'><b>Name</b>: " + comment_fullname + "</span><br>" +              
                    "<b style='font-size:12px;text-align:left;'>Comment: </b>" + comdesc + "<br>" +
"<span style='color:#800000'><b> <span class='fa fa-calendar'></span>Time:</b> <span data-livestamp='" + comment_time + "'></span></span>"+
                    "</div>";
$("#result_comments_send").append(comment_json)
alert('Comment Added Successfully');

$('#comdesc').val('');

$("#loader_comments_send").hide();

            }
        });

    });

});







$(document).ready(function(){

 //$(".plike_btns").click(function(){
$(document).on( 'click', '.plike_btns', function(){ 

 var post_id = this.id; 
var id = post_id;
var title = $(this).data('title');

if(id == ''){
alert('Post Id cannot be empty');
return false;
}
        // AJAX Request


$("#loader-plike_"+id).fadeIn(400).html('<span style="color:;background:;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending your Likes.</span>');

        $.ajax({
            url: 'backend/post_like.php',
            type: 'post',
            data: {post_id:post_id, title:title},
            dataType: 'json',
            success: function(data){

var msg = data['msg'];
if(msg=='failed'){
alert('You Already Like This Posts');
$("#loader-plike_"+id).hide();
}
if(msg=='success'){
                var like = data['like'];       
$("#plike_total_"+id).text(like);
alert('Like Sent Successfully');
$("#loader-plike_"+id).hide();
}

            }
        });
    });
});

// post like ends



</script>






        <div class="content">

            <?php


            $rowpage = 1;
            $limit = 0;

$res= $db->prepare("SELECT count(*) as totalcount FROM posts_table WHERE title_seo=:title_seo");
$res->execute(array(':title_seo' =>$post_title_vaidate));
$t_row = $res->fetch();
$totalcount = $t_row['totalcount'];

if($totalcount == 0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>No Post Found.</div>";
//exit();
}


$result = $db->prepare("SELECT * FROM posts_table WHERE title_seo=:title_seo order by id desc limit :row1, :rowpage");
$result->bindValue(':rowpage', (int) trim($rowpage), PDO::PARAM_INT);
$result->bindValue(':row1', (int) trim($limit), PDO::PARAM_INT);
$result->bindValue(':title_seo', trim($post_title_vaidate), PDO::PARAM_STR);
//$result->bindValue(':uid', trim($projectid), PDO::PARAM_INT);
$result->execute();

$count_post = $result->rowCount();

while($row = $result->fetch()){


$id = htmlentities(htmlentities($row['id'], ENT_QUOTES, "UTF-8"));
$postid = $id;
$title = htmlentities(htmlentities($row['title'], ENT_QUOTES, "UTF-8"));
$title_seo = htmlentities(htmlentities($row['title_seo'], ENT_QUOTES, "UTF-8"));
$content = htmlentities(htmlentities($row['content'], ENT_QUOTES, "UTF-8"));
$fullname = htmlentities(htmlentities($row['fullname'], ENT_QUOTES, "UTF-8"));
$userphoto = htmlentities(htmlentities($row['userphoto'], ENT_QUOTES, "UTF-8"));
$timer1 = htmlentities(htmlentities($row['timer'], ENT_QUOTES, "UTF-8"));
$post_userid = htmlentities(htmlentities($row['userid'], ENT_QUOTES, "UTF-8"));
//$image = htmlentities(htmlentities($row['image'], ENT_QUOTES, "UTF-8"));
$microcontent = substr($content, 0, 120)."...";
$microtitle = substr($title, 0, 80)."..";
$points = htmlentities(htmlentities($row['points'], ENT_QUOTES, "UTF-8"));
$total_comment = htmlentities(htmlentities($row['total_comments'], ENT_QUOTES, "UTF-8"));
$t_like = htmlentities(htmlentities($row['total_like'], ENT_QUOTES, "UTF-8"));
$country_nickname = htmlentities(htmlentities($row['country_nickname'], ENT_QUOTES, "UTF-8"));
$country_name = htmlentities(htmlentities($row['country_name'], ENT_QUOTES, "UTF-8"));

$category = htmlentities(htmlentities($row['data'], ENT_QUOTES, "UTF-8"));
if($category == 'Offering Help'){
$cat= "<span  style='background:purple;color:white;padding:6px;border:none;'>$category</span>";
}

if($category == 'Seeking Help'){

$cat= "<span  style='background:green;color:white;padding:6px;border:none;'>$category</span>";
}


//style='display:inline-block;height:600px;'
      ?>

                    <div class="post col-sm-4_no well" id="post_<?php echo $id; ?>">


<img style='max-height:60px;max-width:60px;' class='img-circle' src='backend/user_photos/<?php echo $userphoto; ?>' alt='User Image'>

<span style='color:blue;'><b>Created By: </b> <?php echo $fullname;?></span>

<a class='readmore_btn2 pull-right' title='Visit Users Profile' style='color:white;' href='user_profile.php?userid=<?php echo $post_userid; ?>'>Visit Users Profile</a>
<br>

<div>Help Category Status: <?php echo $cat; ?></div>

<h3 style='font-size:18px;color:<?php echo $header_color; ?>'>Title: <?php echo $microtitle; ?></h3>

<b style='font-size:14px;color:#800000'>Content Description:</b> <?php echo $content; ?><br>

<span style='color:fuchsia;'><b> Points Awarded So Far for Users Contributions: </b> <span class='point_count'><?php echo $points; ?> (Points)</span></span> <br>


<span>

&nbsp;<span data-comment_countx='<?php echo $total_comment; ?>' data-title='<?php echo $title; ?>' data-postid='<?php echo $postid; ?>' id="<?php echo $postid; ?>" data-toggle='modal' data-target='#myModal_comments' style="color:#800000;font-size:26px;cursor:pointer;" title="Comments" class="fa fa-comments-o comment_btns" title='Comments' data-toggle='modal' data-target='#myModal_comments' id='<?php echo $postid; ?>' data-total_comment='<?php echo $total_comment; ?>'> <span style='font-size:14px;'>Comments</span>  </span>
<span style='font-size:14px;color:#800000;'>(<span id="comment_total_<?php echo $postid; ?>"><?php echo $total_comment; ?></span>)</span>

</span>


<span>

<span data-title='<?php echo $title; ?>' style="font-size:26px;color:#800000;cursor:pointer;" class="plike_btns fa fa-heart-o" id="<?php echo $postid; ?>" title="Like">
&nbsp;<span id="<?php echo $postid; ?>"  style="color:#800000;" /></span>
<span style='font-size:14px'>(<span id="plike_total_<?php echo $postid; ?>"><?php echo $t_like; ?></span>)</span>
</span> 

<span id="loader-plike_<?php echo $postid; ?>"></span>
</span>

<br>
<span style='color:#800000;'><b> Created Since: </b> <span data-livestamp="<?php echo $timer1;?>"></span></span> <br>





<button style='display:none' class='readmore_btn btn btn-warning'><a title='Click to Comment and Like' style='color:white;' 
href='dashboard_post.php?title=<?php echo $title_seo; ?>'>Click to Comment and Like </a></button>
<br>


         
</div>





            <?php

                }
            ?>
<center>
<div id="loader_posts" class="loader_posts"></div>
<div id="nomore_content_check_no"></div>
            <input type="hidden" id="row_limit" value="0">
            <input type="hidden" id="total_count" value="<?php echo $totalcount; ?>">
<br><br>
<button style='display:none;'  id="loadmore_btn" title='Load More Content' class="loadmore_css col-sm-12">Load More Content</button>
<br><br>
</center>
<div class="col-sm-12">.</div>
<br class="col-sm-12"><br class="col-sm-12">



</div>








</div>
<!--End Center-->





</div>
<!--Row-->









<!-- Comments starts here -->


<div class="container_map">

  <div class="modal fade" id="myModal_comments" role="dialog">
    <div class="modal-dialog modal-lg  modal-appear-center1 pull-right1_no modaling_sizing1  full-screen-modal_no">
      <div class="modal-content">
        <div class="modal-header" style="color:black;background:#c1c1c1">
 

      
 <button type="button" class="close btn btn-warning" data-dismiss="modal">Close</button>

      <h4 class="modal-title">Comments System For:  <span style='color:purple' class='title_p'></span></h4>

<center><b>Total Comments: </b> <span id="comment_totalx"></span></center><br>

        </div>
        <div class="modal-body">


<!-- start-->

<!--start comment-->



<div id="result_comment"></div>
<div id="loader-comment"></div>




<!--end comment-->


<!-- end -->





        </div>
      

   <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


      </div>


      </div>
    </div>
  </div>
</div>



<!-- Comments modal ends here -->



<!-- footer Section start -->

<footer class=" navbar_footer text-center footer_bgcolor">

<div class="row">
        <div class="col-sm-12">


<p class="footer_text1"><?php echo $titlex; ?></p>
<p class="footer_text2"><?php  echo $description; ?></p>
<br>

        </div>



        </div>

<br/>
  <p></p>
</footer>

<!-- footer Section ends -->


   
</body>
</html>


