<?php
  ////set headers to NOT cache a page
  // header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  // header("Pragma: no-cache"); //HTTP 1.0
  // header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  // //or, if you DO want a file to cache, use:
  // header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'/../lib/Session.php';
  Session::init();
  include_once $filepath.'/../lib/Database.php';
  include_once $filepath.'/../helper/Exam.php';
  include_once $filepath.'/../helper/admin.php';
  include_once $filepath.'/../helper/User.php';
  include_once $filepath.'/../helper/Process.php';

  $db= new Database();
  $exam = new Exam();
  $admin = new Admin();
  $user = new User();
  $pro = new Process();

  //Logout
  if (isset($_GET['action']) && $_GET['action'] == "logout") {
    Session::destroy();
    header("Location:index.php");
    exit();
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Online Exam System</title>
  </head>
  <body>
    <div class="container">
      <!-- header start -->
      <div class="header bg-success p-3">
        <h2 class="text-white text-center font-weight-light font-italic">Gazipur Cantonment Board High School Online Exam System</h2>
      </div>
      <!-- header end -->
      <div class="card">
        <div class="card-header">
          <div class="float-left">
            <a href="profile.php" class="btn btn-info btn-sm">Profile</a>
            <a href="exam.php" class="btn btn-dark btn-sm">Exam</a>
            <a href="?action=logout" class="btn btn-danger btn-sm">Logout</a>
          </div>
          <div class="float-right">
            <a href="login.php" class="btn btn-success btn-sm">Login</a>
            <a href="register.php" class="btn btn-primary btn-sm">Register</a>
          </div>
        </div>