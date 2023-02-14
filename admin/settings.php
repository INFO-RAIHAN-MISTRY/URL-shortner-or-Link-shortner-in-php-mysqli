<?php 
  require_once'./components/header.php';
?>
     <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 mb-5">
                <h3 class="font-weight-bold">SETTINGs</h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
            </div>
          </div>
          <?php
              if (isset($_POST['submit'])) {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $opassword = mysqli_real_escape_string($conn, $_POST['opassword']);
                $npassword = mysqli_real_escape_string($conn, $_POST['npassword']);

                $email = $_SESSION['email'];
                $selectQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");
                $passwordhash = password_hash($npassword, PASSWORD_BCRYPT);
                $passwordQuery = mysqli_fetch_assoc($selectQuery);
                $hashPassword = $passwordQuery['password'];
                $matchPassword = password_verify($opassword, $hashPassword);
                if ($matchPassword) {
                      $updateQuery = mysqli_query($conn, "UPDATE `users` SET `name`='$name',`password`='$passwordhash' WHERE 1");

                      if ($updateQuery) {
                        ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Yeh!</strong> User name & password updated properly.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        <?php
                      }else{
                        ?>
                        <div class="alert alert-dismissible alert-danger">
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          <strong>Oops,</strong> Username & Password doesn't Update !!
                        </div>
                        <?php
                      }
                    }else{
                      ?>
                      <div class="alert alert-dismissible alert-danger">
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          <strong>Oops,</strong> Password Incorrect !!
                        </div>
                      <?php
                    }
              }
          ?>
          <div class="row">
              <div class="col-md-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Profile Pic</h4>
                    <form class="forms-sample">
                      <div class="card-body text-center">
                        <?php 
                           $email = $_SESSION['email'];
                            $selectQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");
                            $result = mysqli_fetch_assoc($selectQuery);
                        ?>
                          <img src="../<?php echo $result['image']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                          <h5 class="my-3"><?php echo $result['name']; ?></h5>
                          <p class="text-muted mb-1"><?php echo $result['email']; ?></p>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic Details</h4>
                    <form class="forms-sample" method="post" action="">
                    <div class="row">
                      <div class="form-group col">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" name="name" class="form-control" id="exampleInputUsername1" value="<?php echo $result['name']; ?>" required>
                      </div>
                      <div class="form-group col">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $result['email']; ?>" readonly required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col">
                        <label for="exampleInputPassword1">Old Password</label>
                        <input type="password" name="opassword" class="form-control" id="exampleInputPassword1" placeholder="Old Password">
                      </div>
                      <div class="form-group col">
                        <label for="exampleInputConfirmPassword1">New Password</label>
                        <input type="password" name="npassword" class="form-control" id="exampleInputConfirmPassword1" placeholder="New Password">
                      </div>
                    </div>
                      <button class="btn btn-outline-primary btn-block" type="submit" name="submit">UPDATE  !</button>
                  </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php
  require_once'./components/footer.php';
?>

