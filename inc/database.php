<?php

class database{
  private $servername = "localhost";
  private $username   = "root";
  private $password   = "";
  private $database   = "students_record";
  public  $con;


  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
    }
  }

  // Insert customer data into customer table
  public function insertData($post)
  {
    $fname = $this->con->real_escape_string($_POST['fname']);
    $lname = $this->con->real_escape_string($_POST['lname']);
    $subject = $this->con->real_escape_string($_POST['subject']);
    $assignment = $this->con->real_escape_string($_POST['assignment']);
    $grade = $this->con->real_escape_string($_POST['grade']);
    $query="INSERT INTO records(fname,lname,subject,assignment,grade) VALUES('$fname','$lname','$subject','$assignment','$grade')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:view.php?msg1=insert");
    }else{
      echo "Registration failed try again!";
    }
  }

  // Delete customer data from customer table
  public function deleteRecord($id)
  {
    $query = "DELETE FROM records WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:view.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
  }

  // Fetch customer records for show listing
  public function displayData()
  {
    $query = "SELECT * FROM records";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }else{
      echo "No found records";
      return array();
    }
  }

  // Fetch single data for edit from customer table

  public function displayRecordById($id)
  {
    $query = "SELECT * FROM records WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }

  // Update data into Students table
  public function updateRecord($id, $postData)
  {
    $fname = $this->con->real_escape_string($postData['ufname']);
    $lname = $this->con->real_escape_string($postData['ulname']);
    $subject = $this->con->real_escape_string($postData['usubject']);
    $assignment = $this->con->real_escape_string($postData['uassignment']);
    $grade = $this->con->real_escape_string($postData['ugrade']);
  
    if (!empty($id) && !empty($postData)) {
      // Add the missing comma after 'grade'
      $query = "UPDATE records SET fname = '$fname', lname = '$lname', subject = '$subject', assignment = '$assignment', grade = '$grade' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql == true) {
        return true; // Indicate successful update
      } else {
        return false; // Indicate update failure
      }
    }
    return false; // Indicate update failure if ID or postData is empty
  }
}