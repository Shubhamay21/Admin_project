<?php
  $conn = mysqli_connect($servername, $username,$password,$dbname);
  $query ="SELECT * FROM about ";
  $result = mysqli_query($conn,$query);
  
  ?>      
<section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row about-container">
        <div class="section-header">
            <?php       $conn = mysqli_connect($servername, $username,$password,$dbname);
              $query ="SELECT * FROM about ";
              $result = mysqli_query($conn,$query);
              $data = mysqli_fetch_assoc($result);
            ?>
          <h3 class="section-title"><?php echo $data['title'];?></h3>
          <p class="section-description"><?php echo $data['description'] ?></p>        
        </div>
          <div class="col-lg-6 content order-lg-1 order-2">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            </div>
          
            <?php
                  $conn = mysqli_connect($servername, $username,$password,$dbname);
                  $query ="SELECT * FROM about ";
                  $result = mysqli_query($conn,$query);
                while($data = mysqli_fetch_array($result)){?>
       
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title"><a href=""><?php echo $data['subtitle'];?></a></h4>
              <p class="description"><?php echo $data['sub_des'] ?></p>
            </div>
            <?php } ?> 
        
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            </div>
          </div>
          <?php       $conn = mysqli_connect($servername, $username,$password,$dbname);
              $query ="SELECT * FROM about ";
              $result = mysqli_query($conn,$query);
              $data = mysqli_fetch_assoc($result);
            ?>
        
          <div class="col-lg-6 order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"><img src="images/<?php echo $data['images']?>" height="500" width="600"></div>
         
          
        </div>

      </div>
    </section><!-- End About Section -->