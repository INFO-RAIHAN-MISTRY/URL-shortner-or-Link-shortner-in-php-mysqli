<?php
    include'./header.php';
    include'./connection.php';
 ?>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="d-flex justify-content-center">
                <div class="col-auto">
                    <form class="form-group" method="post" action="./bakend.php" enctype="multipart/form-data">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row mb-4 px-3">
                                <h3 class="mb-0 mr-4 mt-2">Sign Up with</h3>
                            </div>
                            <?php 
                                if (isset($_GET['msg'])) {
                                    ?>
                                    <div class="alert alert-dismissible alert-secondary">
                                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            <?php echo $_GET['msg']; ?>
                                        </div>
                                    <?php
                                }
                            ?>
                            <div class="row px-3 mb-4">
                                <div class="line"></div>
                                <div class="line"></div>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Full Name</h6></label>
                                <input class="mb-4" type="text" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Email Address</h6></label>
                                <input class="mb-4" type="email" name="email" placeholder="Enter a valid email address" required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                                <input class="mb-4" type="password" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Confirm Password</h6></label>
                                <input class="mb-4" type="password" name="cpassword" placeholder="Enter password" required>
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Upload Profile Pic</h6></label>
                                <input class="mb-4" type="file" name="file" required>
                            </div>
                            <div class="row mb-3 mt-2 px-3">
                                <input class="btn btn-primary" type="submit" value="Register" name="submit">
                            </div>
                            <div class="row mb-4 px-3">
                                <small class="font-weight-bold">have an account? <a href="./login.php" class="text-danger ">Login Here</a></small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-light border-top py-4">
                <div class="row px-3">
                    <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>
<?php
    include'footer.php';
?>