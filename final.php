<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'./inc/header.php';
  Session::chckUserSession();

?>
<div class="card-body">
  <div class="content">
    <div class="content-header bg-info p-2 ml-5 mr-5">
      <h4 class="text-center text-white font-italic font-weight-light">Online Exam System</h4>
    </div>
    <div class="sub-content mr-5 ml-5 mt-2">
      <h3 class="text-center bg-light p-5 font-italic font-weight-light">Exam Compleated . Your Score Is:<?php 
      	if (isset($_SESSION['score'])) {
      		echo $_SESSION['score'];
      		unset($_SESSION['score']);
      	}
       ?></h3>
      <a href="starttest.php" class="d-block bg-danger p-1 h3 text-center text-white">Start Test</a>

    </div>
  </div>
</div>
<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'./inc/footer.php';
?>	