<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'./inc/header.php';
  $db = new Database();
  //Registration
  $msg = '';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $name = mysqli_real_escape_string($db->link, $_POST['name']);
     $email = mysqli_real_escape_string($db->link, $_POST['email']);
     $password = mysqli_real_escape_string($db->link, $_POST['password']);
     $c_password = mysqli_real_escape_string($db->link, $_POST['c-password']);
     $password = md5($password);
     $c_password = md5($c_password);
     if (empty($name) or empty($email) or empty($password) or empty($c_password)) {
       $msg = '<div class="alert alert-danger text-center h5 font-weight-bold">Field Must Not Be Empty</div>';
     }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $msg = '<div class="alert alert-danger text-center h5 font-weight-bold">Email Is Not Valid</div>'; 
     }else if($password !== $c_password){
      $msg = '<div class="alert alert-danger h5 text-center font-weight-bold">Password and Confirm Password Does Not Match</div>';
     }else{
      $query = "INSERT INTO tbl_user(name, email, password) VALUES('$name', '$email', '$password')";
      $result = $db->insert($query);
      if ($result) {
        $msg = '<div class="alert h5 alert-success text-center h4 font-weight-bold">Registration Successfull</div>';
      }else{
        $msg = '<div class="alert h5 alert-danger text-white font-weight-bold">Something Went Wrong</div>';
      }
    }
  }
  
?>
<div class="card-body">
  <div class="content">
    <div class="content-header bg-info p-2 ml-5 mr-5">
      <h4 class="text-center text-white font-italic font-weight-light">Online Exam System - User Registration</h4>
    </div>
    <div class="error-message ml-5 mr-5 mt-2">
      <?php
        if (isset($msg)) {
          echo $msg;
        }
      ?>
    </div>

        <div class="registration-form m-5 border border-dashed-dark p-5">
          <form action="" method="post">
            <div class="fomr-group">
              <label for="name" class="font-weight-bold">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your name">
            </div>
            <div class="form-group">
              <label for="email" class="font-weight-bold">Email : </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
            </div>
            <div class="form-group">
              <label for="password" class="font-weight-bold">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
            </div>
            <div class="form-group">
              <label for="c-password" class="font-weight-bold">Confirm Password</label>
              <input type="password" class="form-control" name="c-password" id="c-password" placeholder="Enter Confirm Password">
            </div>
            <input type="submit" class="btn btn-success" value="Register">
          </form>
    </div>
  </div>
</div>
<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'./inc/footer.php';
?>