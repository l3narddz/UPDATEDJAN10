<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.png">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Users.css">


    </script>
</head>
<body>

</body>

<?php include'header.php'; ?>
<main>
<section>
  <h1 class="slideInDown animated">List of Appointments</h1>
  <!--User table-->
  <div class="table-responsive slideInRight animated" style="max-height: 400px;">
    <table class="table">
      <thead class="table-primary">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Date</th>
          <th>Time-Start</th>
          <th>Time-End</th>
          <th>Action</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody class="table-secondary">
        <br>
        <button id = "appoitnmentBtn" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#appointmentModal">New Appointment</button>
     <?php
          //Connect to database
          require'connectDB.php';

            $sql = "SELECT * FROM appointment_tbl WHERE isActive=1 ORDER BY appointmentID DESC";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result))
            {
          ?>
                      <TR>
                      <TD><?php echo $row['name'];?></TD>
                      <TD><?php echo $row['email'];?></TD>
                      <TD><?php echo $row['date'];?></TD>
                      <TD><?php echo date("g:ia", strtotime($row['timeStart']));?></TD>
                      <TD><?php echo date("g:ia", strtotime($row['timeEnd']));?></TD>
                      <td><select id="action" name="action">
                      <option selected></option>
                      <option value="edit">Edit</option>
                      <option value="cancel">Cancel</option>
                      </select></td>
                      <td><span class="pending">Pending</span></td>

                      </TR>
        <?php
                }
        ?>
      </tbody>
    </table>
  </div>
</section>
</main>
</body>
</html>
