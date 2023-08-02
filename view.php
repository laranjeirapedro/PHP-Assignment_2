
<?php
  // Include database file
  require ('./inc/header.php');

    include ('./inc/database.php');
    $recordsObj = new database();
?>

<main class="container">
  <?php
    if (isset($_GET['msg1']) && $_GET['msg1'] === "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            Your Registration added successfully
          </div>";
    }
  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
      $(".alert .close").on("click", function(e) {
          $(this).parent().hide();
      });
  });
  </script>
  <section>
    <h2>Student Records
      <a href="delete.php" style="float:right;"><button class="btn btn-danger">Remove<i class="fas fa-plus"></i></button></a>
      <a href="update.php" style="float:right;"><button class="btn btn-primary">Update<i class="fas fa-plus"></i></button></a>
      <a href="add.php" style="float:right;"><button class="btn btn-success">Add<i class="fas fa-plus"></i></button></a>
    </h2>
    <table class="table table-hover table-striped table-active">
      <thead>
      <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Subject</th>
        <th>Assignment</th>
        <th>Grade</th>
      </tr>
      </thead>
      <tbody>
      <?php
      $records = $recordsObj->displayData();
      foreach ($records as $record) {
        ?>
        <tr>
          <td><?php echo $record['id'] ?></td>
          <td><?php echo $record['fname'] ?></td>
          <td><?php echo $record['lname'] ?></td>
          <td><?php echo $record['subject'] ?></td>
          <td><?php echo $record['assignment'] ?></td>
          <td><?php echo $record['grade'] ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </section>
</main>

<?php require ('./inc/footer.php'); ?>
</body>
</html>