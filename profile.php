

   
        <!-- <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
        
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/responsive.css"> -->
		 <!--================Home Banner Area =================-->
        
		<!-- <h1 class="h3 mb-4 text-gray-800">Profile</h1>
		<div class="container-fluid home_banner_area"> -->

          <!-- Page Heading -->
		  <!-- <h1 class="h3 mb-4 text-gray-800">Profile</h1> -->
		  <!-- <section class=" home_banner_area"> -->


		  <?php
include ("includes/header.php");
?>
<?php
                  $login_name=$_SESSION['user_name'];
                  // $last_name=$_SESSION['last_name'];
                  $select_check="SELECT * FROM users";
                  $select_check_result=mysqli_query($connection,$select_check);
                  if($select_check_result)
                  {
                      
                    while ($rows=mysqli_fetch_array($select_check_result)) 
                    {
                      if($login_name==$rows['user_name'])
                      {
                          // $confid=$rows['id'];
                          $profile_photo = $rows['profile_picture'];
                      }
                    }
                }
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> <br> -->


            <div class="home_banner_area ">
              <div class="box_1620">
                <div class="banner_inner d-flex align-items-center">
                  <div class="banner_content">
                    <div class="media">
                      <div class="d-flex">
                        <?php
                        if($profile_photo)
                        {
                        ?>                
                        <img style="border-radius:15px;"  src="img/<?php echo $profile_photo;?>" height="650px" width="650px" alt="">

                        <?php
                        }
                        else
                        {
                        ?><i class="fas fa-user fa-10x"></i><?php
                        }
                        ?>
                            <!-- <img style="border-radius:15px;"  src="img/personal.jpg" alt=""> -->
                      </div>
                        <div class="media-body">
                          <div class="personal_text">
                            <h6>Welcome</h6>
                              <h3>
                              <?php echo $_SESSION['user_name'];?>
                              </h3>
                              <h3>
                                <?php echo $_SESSION['last_name'];?>
                              </h3>
                              <ul class="list basic_info" type="none">
                              <li><i class="fas fa-envelope fa-2x"></i>  <label for="" style="font-size:20px;"><?php echo $_SESSION['mail'];?></label></li>
                              <li><i class="fas fa-map-marker-alt fa-2x"></i>  <label for="" style="font-size:20px;"><?php echo $_SESSION['address'];?></label></li>
                              <li><i class="fas fa-phone-alt fa-2x"></i>  <label for="" style="font-size:20px;"><?php echo $_SESSION['phone'];?></label></li>
                              </ul>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                 </div>
            </div> 

            
        
        </div>
        <!-- /.container-fluid -->
        
      </div>
      <!-- End of Main Content -->

<?php
include ("includes/footer.php");
?>