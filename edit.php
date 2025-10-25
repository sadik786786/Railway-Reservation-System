<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM reservations WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Reservation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="edit.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="text-center mb-4">Edit Reservation</h2>
    <form method="POST" class="card p-4 shadow">
      <div class="mb-3">
        <label>Passenger Name</label>
        <input type="text" name="passenger_name" class="form-control" value="<?php echo $row['passenger_name']; ?>" required>
      </div>
      <div class="mb-3">
        <label>Train Name</label>
        <input type="text" name="train_name" class="form-control" value="<?php echo $row['train_name']; ?>" required>
      </div>
      <div class="mb-3">
        <label>Source</label>
        <input type="text" name="source" class="form-control" value="<?php echo $row['source']; ?>" required>
      </div>
      <div class="mb-3">
        <label>Destination</label>
        <input type="text" name="destination" class="form-control" value="<?php echo $row['destination']; ?>" required>
      </div>
      <div class="mb-3">
        <label>Date of Journey</label>
        <input type="date" name="date_of_journey" class="form-control" value="<?php echo $row['date_of_journey']; ?>" required>
      </div>
      <div class="mb-3">
        <label>Seat No</label>
        <input type="text" name="seat_no" class="form-control" value="<?php echo $row['seat_no']; ?>" required>
      </div>
      <div class="d-flex justify-content-between">
        <a href="index.php" class="btn btn-secondary">Back</a>
        <button type="submit" name="update" class="btn btn-success">Update</button>
      </div>
    </form>

    <?php
      if(isset($_POST['update'])){
        $p = $_POST['passenger_name'];
        $t = $_POST['train_name'];
        $s = $_POST['source'];
        $d = $_POST['destination'];
        $date = $_POST['date_of_journey'];
        $seat = $_POST['seat_no'];

        $conn->query("UPDATE reservations SET 
          passenger_name='$p', train_name='$t', source='$s', destination='$d', date_of_journey='$date', seat_no='$seat'
          WHERE id=$id");
        echo "<script>alert('Reservation updated successfully!');window.location='index.php';</script>";
      }
    ?>
  </div>
</body>
</html>
