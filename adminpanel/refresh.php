<?php 
$val=$_GET['val'];
if($val==1){
    echo "<script>window.location.replace('audio_music.php');</script>";
}elseif($val==2){
    echo "<script>window.location.replace('video_music.php');</script>";
}
?>