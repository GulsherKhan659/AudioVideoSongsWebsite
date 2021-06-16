<?php 
if($_GET['r']=='v'){
    echo "<script>location.replace('video_player.php?id=".$_GET['id']."');</script>";

}elseif($_GET['r']=='a'){
    echo "<script>location.replace('audio_player.php?id=".$_GET['id']."');</script>";

}else{
    echo "<script>location.replace('index.php');</script>";
}
?>