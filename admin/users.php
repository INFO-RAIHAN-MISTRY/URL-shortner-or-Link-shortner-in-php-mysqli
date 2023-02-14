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
                  <h4 class="card-title">Total Users</h4>
                  <?php
                    if(isset($_GET['type']) && $_GET['type']=='delete'){
                      $email=mysqli_real_escape_string($conn,$_GET['email']);
                      $deleteQuery = mysqli_query($conn,"DELETE FROM `users` WHERE email='$email'");
                      if ($deleteQuery) {
                        ?>
                            <div class="alert alert-dismissible alert-primary">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              Yeh, User deleted successfully!
                            </div>
                        <?php
                      }else{
                        ?>
                            <div class="alert alert-dismissible alert-danger">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              Oops, User not delete, please try again!
                            </div>
                        <?php
                      }
                    }
                  ?>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                       		<th>User</th>
                       		<th>Email</th>
                       		<th>Name</th>
                       		<th>DOJ</th>
                       		<th>User Role</th>
                       		<th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php  
                      		$selectQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE 1");
                      		while ($result=mysqli_fetch_assoc($selectQuery)) {
                      			?>
                      				<tr>
			                          <td class="py-1">
			                            <img src="../<?php echo($result['image']); ?>" alt="image"/>
			                          </td>
			                          <td><?php echo($result['email']); ?></td>
			                          <td><?php echo($result['name']); ?></td>
			                          <td><?php echo($result['date']); ?></td>
			                          <td><?php echo($result['role']); ?></td>
			                          <td><a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="botom" title="Delete User" href="?email=<?php echo $result['email']?>&type=delete"><i class="mdi mdi-delete"></i></a></td>
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