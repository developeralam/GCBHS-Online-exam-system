<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'./inc/header.php';
  Session::chckUserLogin();
  //Login part


?>
<div class="card-body">
  <div class="content">
    <div class="content-header bg-info p-2 ml-5 mr-5">
      <h4 class="text-center text-white font-italic font-weight-light">Online Exam System - User Login</h4>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="content-left border border-dashed-info mt-5 ml-5">
          <img src="img/left-home.png" class="w-75" alt="">
        </div>
      </div>
      <div class="col-7">
        <div class="content-right border border-dashed-info mr-5 mt-5 p-4">
          <form action="" method="post">
            <div class="form-group">
              <label for="username" class="font-weight-bold">Username : </label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username">
            </div>
            <div class="form-group">
              <label for="password" class="font-weight-bold">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
            </div>
            <input type="submit" id="login" class="btn btn-success" value="Login">
          </form>
          <div id="state" class="mt-1"></div>
          <h5 class="font-italic">New User ? <a href="register.php">Sign Up</a> Free</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'./inc/footer.php';
?>