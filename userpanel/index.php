<?php include '..\sqlquries\connection.php' ?>


<?php include 'header.php';?>


  <!-- Loader -->
  
    <div class="container">
      <div class="tm-search-form-container" style="background-color:RGB(150,52,125)">
        <form action="audio_index.php" method="POST" class="form-inline">
  
            <div style="background-color:#cc41ff;border-radius:10px; padding:15px;"  class="text-center col-12 col-md-3 "><div style="width: 100%;height:80px;"><h3 class="text-center" style="color:#fff; padding:20px;font-weight:bolder">HOME<h3></div></div>
            <div style="background-color:transparent;" class="text-center col-12 col-md-9"  ><input name="searchindex" class="form-inline form-control float-sm-left float-left"  type="text" style="padding:5px; width:70%; background-color:#fff;margin: 10px; "><button name="index-btn" style="margin-top: 10px;background-color:#cc41ff;border:none;float:left" class="btn btn-primary form-inline float-sm-left float-left" >Search</button></div>
            </form>
          </div>
          <br>
       

         

      <div class="row tm-albums-container grid">
        
<!-- audio  -->
        <div class="col-md-12 col-12">
          <h5>Latest Audio Songs Upload By Admin  </h5>
</div>
        <?php
             $query='SELECT * FROM `audio_music` ORDER BY id DESC LIMIT 4';
             $result=mysqli_query($conn,$query);
             if($result){
               while($data=mysqli_fetch_array($result)){
            ?>
        <div class="col-sm-12 col-12 col-md-6 col-lg-3 col-xl-3 tm-album-col">
          <figure class="effect-sadie">
            <img style="height: 300px;" src="..\adminpanel\audioimage\<?php echo $data[2]?>" alt="Image" class="img-fluid">
            <figcaption>
              <a href="audio_player.php?id=<?php echo $data[0]?>">
              <h2 style="color: white;" class=" text-uppercase"><?php echo $data[3]?></h2>
              
              <p style="color: white;">
        
              Artist : <?php echo $data[4]?><br>
              Album  : <?php echo $data[5]?><br>
              Year   : <?php echo $data[6]?>
             
            </p>
            </a>
            </figcaption>
          </figure>
        </div>

        <?php }} ?>
   <!-- Audio Data -->
      </div>

<!-- Video -->
<div class="row">
          <div class="col-md-12 col-12">
          <h5>Latest Video Songs Upload By Admin  </h5>
</div>
            <?php
             $query='SELECT * FROM `video_music` ORDER BY id DESC LIMIT 6';
             $result=mysqli_query($conn,$query);
             if($result){
               while($data=mysqli_fetch_array($result)){
            ?>
         <div class="col-sm-12 col-12 col-md-6 col-lg-3 col-xl-3 tm-album-col">
          <figure class="effect-sadie">
            <img style="height: 300px;" src="..\adminpanel\videoimage\<?php echo $data[2]?>" alt="Image" class="img-fluid">
            
            <figcaption>
              <a href="video_player.php?id=<?php echo $data[0]?>">
              <h2 style="color: white;" class=" text-uppercase"><?php echo $data[3]?></h2>
              
              <p style="color: white;">
        
              Artist : <?php echo $data[4]?><br>
              Album  : <?php echo $data[5]?><br>
              Year   : <?php echo $data[6]?>
             
            </p>
            </a>
            </figcaption>
          </figure>
        </div>
            <?php 
             }
            }else{
              echo "<div class='col-12 col-md-12'style='height:200px';><h4 class='text-center' >No Song Uploaded Yet</h4></div>";
            }
            ?>
          
         <!-- /Content Row -->
          
        </div>
   <!-- Video Data -->
   <div class="row">
      
          <div class="col-md-12">
          <h3 class="text-center text-bold">INFORMATION</h3>
      
          <div class="tm-tag-line">
          <p class="text-center" style="padding: 25px;">
         Sound.com is one of the most trusted production music libraries in the world.  With a wide variety of high-quality music and world-class customer service, we have clients from all over the world who use our music in everything from personal web videos to major network television broadcasts and major feature films.  In addition to the music that we provide to our clients, Sound.com also has been at the forefront of innovations in the music industry since its inception in 2018. 

In 2020 Sound.com entered into an agreement with YouTube that revolutionizes how people use music and videos on the internet.  Under this new agreement, all the tracks in the Freeplay Music library will be FREE for use on YouTube (personal use only).

Most importantly, we here at Sound.com care deeply about the music we provide and the customers who utilize our services.  We've designed our website to provide the most accessible and easy-to-understand licensing process possible, and our hands-on customer support is always glad to assist whenever needed.

Whatever your music needs may be, we're here to meet them.
         </p></div>
        </div>
      </div>

     
      <?php include 'footer.php' ?>
    </div> <!-- .container -->

  </div> <!-- .main -->

  <!-- load JS -->
  <script src="js/jquery-3.2.1.slim.min.js"></script> <!-- https://jquery.com/ -->
  <script>

    /* DOM is ready
    ------------------------------------------------*/
    $(function () {

      if (renderPage) {
        $('body').addClass('loaded');
      }

      $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright
    });

  </script>
</body>
</html>