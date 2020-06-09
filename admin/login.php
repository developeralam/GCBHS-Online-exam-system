<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'/../lib/Session.php';
  Session::checkAdminLogin();
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>GCBHS Online exam system login page</title>
  </head>
  <body>
    <div class="container">
      <div class="card w-75 m-auto">
        <div class="card-header">
          <h2 class="text-center font-style-italic">GCBHS Online Exam System Login Page</h2>
        </div>
        <div class="card-body">
          <div class="login-form w-75 m-auto">
            <form action="" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email Address">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password">
              </div>
              <div id="state">
                
              </div>
              <input type="submit" id="admin-login" class="btn btn-dark" value="Login">
            </form>
          </div>
        </div>
        <div class="card-footer">
          <h3 class="text-center">Copyright &copy; All Rights Resurved by GCBHS</h3>
        </div>
      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Custom Js -->
    <script src="../js/main.js"></script>
  </body>
</html>