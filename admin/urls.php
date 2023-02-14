<?php 
  require_once'./components/header.php';
?>
     <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Generate URLs</h4>
                  <p class="card-description">
                    It's easy to generate a short URL, by just filling the form.
                  </p>
                  <?php 

                    if (isset($_POST['generate'])) {
                      
                      $main_link = mysqli_real_escape_string($conn, $_POST['main_link']);
                      $short_link = mysqli_real_escape_string($conn, $_POST['short_link']);
                      $text = mysqli_real_escape_string($conn, $_POST['text']);
                      $email = $_SESSION['email'];

                      $selectQuery = mysqli_query($conn, "SELECT * FROM `urls` WHERE short = '$short_link'");
                      if (mysqli_num_rows($selectQuery) > 0) {
                        ?>
                          <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            Oops, Short Link already Exist, Please try again using another short name !
                          </div>
                        <?php
                        
                      }else{
                        $insertQuery = mysqli_query($conn, "INSERT INTO `urls`(`email`, `main_link`, `short`, `text`) VALUES ('$email','$main_link','$short_link','$text')");
                        if ($insertQuery) {
                          ?>
                            <div class="alert alert-dismissible alert-success">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              Yeh, URL successfully generated. Please activate The link.
                            </div>
                          <?php
                        }else{
                          ?>
                          <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            Oops, URL not generate!
                          </div>
                          <?php
                        }
                      }
                    }

                  ?>
                  <form class="form-inline" method="post" action="">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Main Link</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="icon-link menu-icon"></i></div>
                      </div>
                      <input type="link" name="main_link" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Main Link">
                    </div>
        
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Short Link</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="icon-link menu-icon"></i></div>
                      </div>
                      <input type="link" name="short_link" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Short Link">
                    </div>

                    <label class="sr-only" for="inlineFormInputGroupUsername2">Subject</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                      </div>
                      <input type="text" name="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Subject">
                    </div>
                    <button type="submit" name="generate" class="btn btn-primary mb-3 mx-3">Generate</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">My URLs</h4>
                  <p class="card-description">
                    View all your links here. you can active or deactive links by pressing buttons.
                  </p>
                  <?php
                    if(isset($_GET['type']) && $_GET['type']=='delete'){
                      $short=mysqli_real_escape_string($conn,$_GET['short']);
                      $deleteQuery = mysqli_query($conn,"delete from urls where short='$short'");
                      if ($deleteQuery) {
                        ?>
                            <div class="alert alert-dismissible alert-primary">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              Yeh, URL deleted successfully!
                            </div>
                        <?php
                      }else{
                        ?>
                            <div class="alert alert-dismissible alert-danger">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              Oops, URL not delete, please try again!
                            </div>
                        <?php
                      }
                    }
                  ?>
                  <?php
                    if(isset($_GET['type']) && $_GET['type']=='status'){
                      $id=mysqli_real_escape_string($conn,$_GET['id']);
                      $status=mysqli_real_escape_string($conn,$_GET['status']);
                      if($status=='active'){
                        mysqli_query($conn,"update urls set status='1' where id='$id'");
                      }else{
                        mysqli_query($conn,"update urls set status='0' where id='$id'");
                      }
                    }
                  ?>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Subject</th>
                          <th>Short Link</th>
                          <th>Main Link</th>
                          <th>Date</th>
                          <th>Hit-Count</th>
                          <th>Active/Inactive</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $email = $_SESSION['email'];
                          $selectQuery = mysqli_query($conn, "SELECT * FROM `urls` WHERE email = '$email'");
                          while ($result = mysqli_fetch_assoc($selectQuery)) {
                            ?>
                            <tr>
                              <td><?php echo($result['text']); ?></td>
                              <td>http://localhost/urlshortner/<?php echo($result['short']); ?></td>
                              <td><?php echo($result['main_link']); ?></td>
                              <td><?php echo($result['date']); ?></td>
                              <td><?php echo($result['hit_count']); ?></td>
                              <td><?php
                                  if($result['status']==1){
                                    ?>
                                    <a class="badge badge-success" href="?id=<?php echo $result['id']?>&type=status&status=deactive" data-toggle="tooltip" data-placement="botom" title="Currently Active">Active</a>
                                    <?php
                                  }else{
                                    ?>
                                    <a class="badge badge-danger" href="?id=<?php echo $result['id']?>&type=status&status=active" data-toggle="tooltip" data-placement="botom" title="Currently Deactive">Deactive</a>
                                    <?php
                                  }
                              ?></td>
                              <td><a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="botom" title="Delete Link" href="?short=<?php echo $result['short']?>&type=delete"><i class="mdi mdi-delete"></i></a></td>
                            </tr>
                            <?php
                          }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
<?php
  require_once'./components/footer.php';
?>

