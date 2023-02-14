<?php
    include'./header.php';
 ?>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row">
                            <img src="https://i.imgur.com/CXQmsmF.png" class="logo">
                        </div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                            <img src="./assets/images/pic1.png" class="image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <form method="post" action="./bakend.php" class="form-group">
                            <div class="row mb-4 px-3">
                                <h3 class="mb-0 mr-4 mt-2">Sign in with</h3>
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
                                <label class="mb-1"><h6 class="mb-0 text-sm">Email Address</h6></label>
                                <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address">
                            </div>
                            <div class="row px-3">
                                <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                                <input type="password" name="password" placeholder="Enter password">
                            </div>
                            <div class="row px-3 mb-4">
                                <p>Hard to remember password, <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a></p>
                            </div>
                            <div class="row mb-2 px-3">
                                <button type="submit" name="login" class="btn btn-outline-info">Login</button>
                            </div>
                            <div class="row mb-4 px-3">
                                <small class="font-weight-bold">Don't have an account? <a href="./register.php" class="text-danger ">Register</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-info py-4">
                <div class="row px-3">
                    <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
                </div>
            </div>
        </div>
    </div>
<?php
    include'./footer.php';
 ?>