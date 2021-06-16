
<?php include '..\sqlquries\connection.php' ?>


<?php include 'audio_header.php'; ?>

</div>
</div>

<div class="row" >
<div class="col-12 col-md-8 offset-md-2">
<div class="card" style="top:80px;background-color:RGB(150,52,125);color:#fff;">

 <?php
$audioid=$_GET['id'];
$qry="SELECT AVG(audiorr.rating),audio_music.* FROM audiorr INNER JOIN audio_music ON audio_music.id=audiorr.audioId where audio_music.id=$audioid";
$rslt=mysqli_query($conn,$qry);
if($rslt){
  while($audio=mysqli_fetch_array($rslt)){

 
?> 
<div class="row">
<div class="col-12 col-md-4">
<img src="..\adminpanel\audioimage\<?php echo $audio[3] ?>" style="width: 100%; height:450px; border-radius:5px">
</div>
<div class="col-12 col-md-8 "  style=" padding: 5vh;" >
 
  <?php
echo "<p> Rating  : ".round($audio[0])." /5";
$i=1;
 $j=1;
 $rated=round($audio[0]);
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
<h1><?php echo $audio[4] ?></h1>
<p  style="padding: 25px;">
  Artist :<?php echo $audio[5] ?><br>
  Album :<?php echo $audio[6] ?><br>
  Year :<?php echo $audio[7] ?><br>
  Genre :<?php echo $audio[8] ?><br>
  Language :<?php echo $audio[9] ?>
  
</p>
<br>
<Audio controls autoplay style="width: 100%;">
  <source src="..\adminpanel\audiosong\<?php echo $audio[2] ?>">
</Audio>

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
$squery="Select * from audiorr WHERE userId = $userId and audioId= $audioid";
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
    $q="SELECT user_table.userFname,user_table.userLname,audiorr.rating ,audiorr.review,audiorr.audioId FROM audiorr INNER JOIN user_table ON user_table.userId=audiorr.userId";
    $r=mysqli_query($conn,$q);
    while($data=mysqli_fetch_array($r)){
   if($audioid==$data[4]){
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

  $query = "INSERT INTO audiorr(audiorrId,rating,review,audioId,userId) VALUES (null,$rating,'$review',$audioid,$userId);";
  $result=mysqli_query($conn,$query);
  if($result){
    echo "<script>location.replace('refresh.php?id=".$audioid."&r=a');</script>";
  }

}

?>