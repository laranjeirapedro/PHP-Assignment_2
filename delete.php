<?php
  // Include database file
  require ('./inc/header.php');

  // Start the session
  session_start();

  if (!isset($_SESSION['user_id'])) {
		header('location:signin.php');
		exit();
	}else {
    include ('./inc/database.php');
    $recordsObj = new database();


    if (isset($_POST['selectedRows']) && is_array($_POST['selectedRows'])) {

      // Get the array of selected IDs
      $selectedIds = $_POST['selectedRows'];

      // Call a method in the database class to delete the selected records
      $deletedRowsCount = 0;  
      foreach ($selectedIds as $id) {
        $result = $recordsObj->deleteRecord($id);
        if ($result) {
            $deletedRowsCount++;
        }
      }
      if ($deletedRowsCount > 0) {
        // Redirect to the same page to update the data after successful deletion
        header("Location: view.php?msg3=delete");
        exit();
      } else {
          echo "Record(s) do not delete, please try again.";
      }
    }
  }
?>

  <main class="container">

  <section>
    <h2>Remove Student Records
      <a style="float:right;" class="btn btn-success" href="view.php" role="button">Back</a>
      <button style="float:right;" type="submit" class="btn btn-danger" id="deleteSelected">Delete Selected</button>
    </h2>

    <!-- Wrap the table and Delete Selected button in a form -->
    <form name="deleteForm" method="post">
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
          <td><?php echo $record['fname'] ?></td>
          <td><?php echo $record['lname'] ?></td>
          <td><?php echo $record['subject'] ?></td>
          <td><?php echo $record['assignment'] ?></td>
          <td><?php echo $record['grade'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
      </table>
    </form>
  </section>
</main>

<!-- Let's add our footer file. -->
<?php require ('./inc/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Handle the click event of the "Delete Selected" button
  $('#deleteSelected').on('click', function() {
    // Get the selected checkboxes
    var selectedRows = $('input[name="selectedRows[]"]:checked').map(function() {
      return this.value;
    }).get();

    // Send the selected IDs to the server to delete the records
    $.ajax({
      url: 'delete.php',
      type: 'POST',
      data: { selectedRows: selectedRows },
      success: function() {
        // Reload the page after successful deletion
        window.location.reload();
      },
      error: function() {
        alert('Error occurred while deleting records.');
      }
    });
  });
});
</script>