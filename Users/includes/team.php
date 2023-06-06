<?php
  $conn = mysqli_connect($servername, $username,$password,$dbname);
  $query ="SELECT * FROM team ";
  $result = mysqli_query($conn,$query);
?>      
<!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title"><?php $data = mysqli_fetch_assoc($result);
            echo $data['title'];?>    
          </h3>
          <p class="section-description"><?php echo $data['description']; ?></p>
        </div>
        <?php?>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="images/<?php echo $data['images']?>" height="270" width="300"></div>
              <h4><?php echo $data['name']; ?></h4>
              <span><?php echo $data['designation'];?></span>
              <!-- <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>
            
          <?php while($data = mysqli_fetch_assoc($result)){?>
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="pic"><img src="images/<?php echo $data['images']?>" height="270" width="300"></div>
              <h4><?php echo $data['name']; ?></h4>
              <span><?php echo $data['designation'];?></span>
              <!-- <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>
          <?php } ?>
        </div>
      </div>

      </div>
    </section><!-- End Team Section -->