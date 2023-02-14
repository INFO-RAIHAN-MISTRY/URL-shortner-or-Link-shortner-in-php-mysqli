<?php 
  include'./components/header.php';
  $email = $_SESSION['email'];
  $selectQuery = mysqli_query($conn, "SELECT `name` FROM `users` WHERE email = '$email'");
  $result = mysqli_fetch_assoc($selectQuery);
?>
     <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?php echo $result['name'];?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white" type="button">
                     <i class="mdi mdi-calendar"></i> <?php echo "Date : " . date("l") ." of ". date("d.m.Y"); ?>
                    </button>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="../admin/images/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-12 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Links</p>
                      <p class="fs-30 mb-2">
                        <?php
                        $email = $_SESSION['email'];
                          $selectQuery = mysqli_query($conn, "SELECT * FROM `urls` WHERE email = '$email'");
                            if ($totallinks = mysqli_num_rows($selectQuery)) {
                              echo '<span class="number">'.$totallinks.'</span>';
                            }
                            else{
                              echo '<span class="number">0</span>';
                            }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Active Links</p>
                      <p class="fs-30 mb-2">
                        <?php
                          $email = $_SESSION['email'];
                          $selectQuery = mysqli_query($conn, "SELECT * FROM `urls` WHERE email = '$email' && status = '1'");
                            if ($activelinks = mysqli_num_rows($selectQuery)) {
                              echo '<span class="number">'.$activelinks.'</span>';
                            }
                            else{
                              echo '<span class="number">0</span>';
                            }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Inactive Links</p>
                      <p class="fs-30 mb-2">
                        <?php
                          $email = $_SESSION['email'];
                          $selectQuery = mysqli_query($conn, "SELECT * FROM `urls` WHERE email='$email' && status = '0'");
                            if ($inactivelinks = mysqli_num_rows($selectQuery)) {
                              echo '<span class="number">'.$inactivelinks.'</span>';
                            }
                            else{
                              echo '<span class="number">0</span>';
                            }
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php
  include'./components/footer.php';
?>

