<?php include '..\sqlquries\connection.php'; 

$id = $_GET['id'];
$user=$_GET['user'];
if(isset($id) && $user==1){
 $query1 = "delete from user_table where userId = $id";
 $result = mysqli_query($conn,$query1);
 if($result){
     header("Location:userview.php");
 }
 
}elseif(isset($id) && $user==2)  {
    $query2 = "delete from audio_music where id = $id";
    $result2 = mysqli_query($conn,$query2);
    if($result2){
        header("Location:deltaudio.php");
        }
  }elseif(isset($id) && $user==3)  {
    $query2 = "delete from video_music where id = $id";
    $result2 = mysqli_query($conn,$query2);
    if($result2){
        header("Location:deltvideo.php");
        }
  }else{
      header("Location:index.php");
}
 

?>
