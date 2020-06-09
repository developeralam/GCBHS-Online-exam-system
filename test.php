<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'./inc/header.php';
  Session::chckUserSession();
  $number = $exam->getQueRows();
  
  if (isset($_GET['q'])) {
    $qNo = (int)$_GET['q'];
  }else{
    header("Location:exam.php");
  }

//Submit Ans
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $pro->processAns($_POST);
    
  }


?>
<div class="card-body">
  <div class="content">
    <div class="content-header bg-info p-2 ml-5 mr-5">
      <h4 class="text-center text-white font-italic font-weight-light">Online Exam System - Question No <?php echo $qNo; ?> of <?php echo $number; ?></h4>
    </div>
    <div class="sub-content mr-5 ml-5 mt-2">
      <form action="" method="post">
        <h3 class="bg-light p-1 text-center">Ques: 1 <?php echo $exam->getQuebynumber($qNo); ?></h3>
        <form action="" method="post">
            <?php
                $selected_row = $exam->getAnsbynumber($qNo);
                while ($data = $selected_row->fetch_assoc()) {
            ?>
              <input type="radio" name="ans" value="<?php echo $data['ans_id']; ?>"> <?php echo $data['ansName'] ?><br>
            
            <?php
              }
            ?>
            <input type="hidden" name="qNo" value="<?php echo $qNo; ?>">
            <input type="submit" class="btn btn-primary" value="Next Question"> 
        </form>

    </div>
  </div>
</div>
<?php
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath.'./inc/footer.php';
?>