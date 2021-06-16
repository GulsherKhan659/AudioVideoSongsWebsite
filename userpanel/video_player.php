
<?php include '..\sqlquries\connection.php' ?>

<?php include 'video_header.php'; ?>

</div>
</div>

<div class="row" >
<div class="col-12 col-md-8 offset-md-2">
<div class="card" style="top:80px;background-color:RGB(150,52,125);color:#fff;">

 <?php
$videoid=$_GET['id'];
$qry="SELECT AVG(videorr.rating),video_music.* FROM videorr INNER JOIN video_music ON video_music.id=videorr.videoId where video_music.id=$videoid";
$rslt=mysqli_query($conn,$qry);
if($rslt){
  while($video=mysqli_fetch_array($rslt)){

 
?> 
<div class="row">
<div class="col-12 col-md-12 "  style=" padding: 5vh;" >
<Video poster="..\adminpanel\videoimage\<?php echo $video[3] ?>" controls style="height:50vh;width:100%;background-color:#000"  >
  <source  src="..\adminpanel\videosong\<?php echo $video[2] ?>" type="video/mp4">
</Video>
<h3><?php echo $video[4] ?></h3> 
  <?php
echo "<p> Rating  : ".round($video[0])." /5";
$i=1;
 $j=1;
 $rated=round($video[0]);
 while($i<=5){
 if($j<=$rated){
 ?>
 
 <i class="fa fa-star" style="color:#FDCC0D" aria-hidden="true"></i>
  <?php
$j++; 
}else{
  ?>
  <i class="fa fa-star"   aria-hidden="true"></i>
  <?php
 
 }
 $i++;
}?>
</p>

<p  style="padding: 5px;">
  Artist :<?php echo $video[5] ?><br>
  Album :<?php echo $video[6] ?><br>
  Year :<?php echo $video[7] ?><br>
  Genre :<?php echo $video[8] ?><br>
  Language :<?php echo $video[9] ?>
  
</p>


</div>

</div>
<?php
}
}

?>
</div><!--   card -->
 </div>
</div>

                 

<?php

$userId=$_SESSION['userId'];
$squery="Select * from videorr WHERE userId = $userId and videoId= $videoid";
$sresult=mysqli_query($conn,$squery);
if(!mysqli_fetch_array($sresult)>0){
  
?>
<div class="col-12 col-md-10 offset-md-2" style="top:85px;color: #fff;">
               <form method="post">
               <label for="starsInput">Rate & Review This Song</label>
                <div id="review"></div>
                <input type="hidden" name="rating" readonly id="starsInput" class="form-control form-control-sm">
                <textarea name="review" style="width: 60vw;height:250px" placeholder="Write A Review Here"></textarea><input type="submit" class="btn  " name="btn-review" value="Review" style="margin-bottom:30px;color:white;background-color:RGB(150,52,125)">
               </form>
</div>
<?php
} 
?>
<div class="col-12 col-md-8 offset-md-2" style="top:85px; color: #fff;">
<div  style="background-color:RGB(150,52,125);">

<?php
   echo "<div class='row'>";
    $q="SELECT user_table.userFname,user_table.userLname,videorr.rating ,videorr.review,videorr.videoId FROM videorr INNER JOIN user_table ON user_table.userId=videorr.userId";
    $r=mysqli_query($conn,$q);
    while($data=mysqli_fetch_array($r)){
   if($videoid==$data[4]){
 ?>
<div class="col-4 col-md-2" style="padding: 10px;">
  <div class="float-right"  style=" width: 100px;height:100px;border-radius:100px;background-color:white"></div>
  </div>
  <div class="col-8 col-md-10" style="padding: 20px;">
  <p class="text-uppercase">
    <?php echo $data[0]."  ".$data[1]?>
  </p>
  <p>
  Rated Song : 
 <?php
 $i=1;
 $j=1;
 $rated=$data[2];
 while($i<=5){
 if($j<=$rated){
 ?>
 
 <i class="fa fa-star" style="color:#FDCC0D" aria-hidden="true"></i>
  <?php
$j++; 
}else{
  ?>
  <i class="fa fa-star"   aria-hidden="true"></i>
  <?php
 
 }
 $i++;
}
  
 echo "</p><p>$data[3]</p></div>";
}
}
echo "</div></div>";
?>

</div>
</div>
    

 <script src="rating-star-icons\dist\rating.js"></script>
  
  <script>
     $("#review").rating({
        "value": 2,
        "click": function (e) {
            console.log(e);
            $("#starsInput").val(e.stars);
        }
     });
    /* DOM is ready
    ------------------------------------------------*/
    $(function () {

if (renderPage) {
  $('body').addClass('loaded');
}
 
  $("#myDiv").removeClass('tm-welcome-section');
});

var element =document.getElementById(myDiv);
    element.style.width=null;
    element.style.height=0;
  </script>
</body>
</html>
<?php 

if(isset($_POST['btn-review'])){
  $rating=$_POST['rating'];
  $review=$_POST['review'];

  $query = "INSERT INTO videorr(videorrId,rating,review,videoId,userId) VALUES (null,$rating,'$review',$videoid,$userId);";
  $result=mysqli_query($conn,$query);
  if($result){
    echo "<script>location.replace('refresh.php?id=".$videoid."&r=v');</script>";
  }

}

?>

