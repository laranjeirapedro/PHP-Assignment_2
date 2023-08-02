<?php

  // Include database file
  require ('./inc/header.php');

  include ('./inc/database.php');
  $recordsObj = new database();


  // Insert Record in records table
  if(isset($_POST['submit'])) {
    $recordsObj->insertData($_POST);
  }
?>

<main>
  <section class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
        <div class="card">
          <div class="card-header bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="m-0">Insert Data</h2>
                <a class="btn btn-success" href="view.php" role="button">Back</a>
            </div>
          </div>
          <div class="card-body bg-light">
            <form action="add.php" method="POST">
              <div class="form-group">
                <label for="name">First Name:</label>
                <input type="text" class="form-control" name="fname" placeholder="Enter First Name" required="">
              </div>
              <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required="">
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Enter Subject Name" required="">
              </div>
              <div class="form-group">
                <label for="salary">Assignment:</label>
                <input type="text" class="form-control" name="assignment" placeholder="Enter Assignment" required="">
              </div>
              <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" class="form-control" name="grade" placeholder="Enter Grade" required="">
              </div>
              <input type="submit" name="submit" class="btn btn-success" style="float:right;" value="Submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

  <?php require ('./inc/footer.php'); ?>
</body>
</html>