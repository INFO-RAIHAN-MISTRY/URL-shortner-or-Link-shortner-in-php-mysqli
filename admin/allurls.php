<?php 
  require_once'./components/header.php';
?>
     <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All URLs</h4>
                  <p class="card-description">
                    View all links are here. you can delete links by pressing buttons.
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
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Email</th>
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
                          $selectQuery = mysqli_query($conn, "SELECT * FROM `urls` WHERE 1");
                          while ($result = mysqli_fetch_assoc($selectQuery)) {
                            ?>
                            <tr>
                              <td><?php echo($result['email']); ?></td>
                              <td><?php echo($result['text']); ?></td>
                              <td>http://localhost/urlshortner/<?php echo($result['short']); ?></td>
                              <td><?php echo($result['main_link']); ?></td>
                              <td><?php echo($result['date']); ?></td>
                              <td><?php echo($result['hit_count']); ?></td>
                              <td>
                                <?php
                                    if ($result['status'] == 1) {
                                        ?>
                                            <a class="badge badge-success">Active</a>
                                        <?php
                                    }else{
                                      ?>
                                      <a class="badge badge-danger">In-Active</a>
                                      <?php
                                    }
                                ?>
                              </td>
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

