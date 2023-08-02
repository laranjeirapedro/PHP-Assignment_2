<?php
// Include database file
require ('./inc/header.php');

// Start the session
session_start();

if (!isset($_SESSION['user_id'])) {
  header('location:signin.php');
  exit();
} else {
  include ('./inc/database.php');
  $recordsObj = new database();

  if (isset($_POST['selectedRows']) && is_array($_POST['selectedRows']) && count($_POST['selectedRows']) === 1) {

    // Get the array of selected IDs
    $selectedId = $_POST['selectedRows'][0];

    // Call the method to update the selected record
    $postData = $_POST;
    $result = $recordsObj->updateRecord($selectedId, $postData);

    if ($result) {
      // Redirect to the same page after successful update
      header("Location: view.php?msg2=update");
      exit();
    } else {
      echo "Record update failed, please try again.";
    }
  }
}
?>

<main class="container">

  <section>
    <h2>Update Student Records
      <a style="float:right;" class="btn btn-success" href="view.php" role="button">Back</a>
      <button style="float:right;" type="submit" class="btn btn-primary" id="updateSelected">Update Selected</button>
    </h2>

    <!-- Wrap the table and Update Selected button in a form -->
    <div class="container">
    <form name="updateForm" method="post" enctype="multipart/form-data">
      <div class="table-responsive">
        <table class="table table-hover table-striped table-active">
          <thead>
            <tr>
              <th>Checkbox</th>
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
                <td><input type="checkbox" name="selectedRows[]" value="<?php echo $record['id'] ?>"></td>
                <td><?php echo $record['id'] ?></td>
                <td><input type="text" name="ufname" value="<?php echo $record['fname'] ?>"></td>
                <td><input type="text" name="ulname" value="<?php echo $record['lname'] ?>"></td>
                <td><input type="text" name="usubject" value="<?php echo $record['subject'] ?>"></td>
                <td><input type="text" name="uassignment" value="<?php echo $record['assignment'] ?>"></td>
                <td><input type="text" name="ugrade" value="<?php echo $record['grade'] ?>"></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
  </section>
</main>

<!-- Let's add our footer file. -->
<?php require ('./inc/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Handle the click event of the "Update Selected" button
    $('#updateSelected').on('click', function() {
      // Submit the form to update.php when the button is clicked
      $('form[name="updateForm"]').submit();
    });
  });
</script>