<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Reservation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="add.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="text-center mb-4">Add New Reservation</h2>
    <form method="POST" class="card p-4 shadow">
      <div class="mb-3">
        <label>Passenger Name</label>
        <input type="text" name="passenger_name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Train Name</label>
        <input type="text" name="train_name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Source</label>
        <input type="text" name="source" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Destination</label>
        <input type="text" name="destination" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Date of Journey</label>
        <input type="date" name="date_of_journey" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Seat No</label>
        <input type="text" name="seat_no" class="form-control" required>
      </div>
      <div class="d-flex justify-content-between">
        <a href="index.php" class="btn btn-secondary">Back</a>
        <button type="submit" name="save" class="btn btn-success">Save</button>
      </div>
    </form>

    <?php
      if(isset($_POST['save'])){
        $p = $_POST['passenger_name'];
        $t = $_POST['train_name'];
        $s = $_POST['source'];
        $d = $_POST['destination'];
        $date = $_POST['date_of_journey'];
        $seat = $_POST['seat_no'];

        $sql = "INSERT INTO reservations (passenger_name, train_name, source, destination, date_of_journey, seat_no)
                VALUES ('$p','$t','$s','$d','$date','$seat')";
        if($conn->query($sql)){
          echo "<script>alert('Reservation added successfully!');window.location='index.php';</script>";
        } else {
          echo "Error: " . $conn->error;
        }
      }
    ?>
  </div>
</body>
</html>
