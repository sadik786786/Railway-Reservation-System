<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Railway Reservation System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="text-center mb-4">🚆 Railway Reservation System</h2>
    <div class="d-flex justify-content-end mb-3">
      <a href="add.php" class="btn btn-primary">+ Add Reservation</a>
    </div>

    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Passenger</th>
          <th>Train</th>
          <th>From</th>
          <th>To</th>
          <th>Date</th>
          <th>Seat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM reservations";
          $result = $conn->query($sql);
          $num = 1;
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$num}</td>
                      <td>{$row['passenger_name']}</td>
                      <td>{$row['train_name']}</td>
                      <td>{$row['source']}</td>
                      <td>{$row['destination']}</td>
                      <td>{$row['date_of_journey']}</td>
                      <td>{$row['seat_no']}</td>
                      <td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='index.php?delete={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Delete this record?\")'>Delete</a>
                      </td>
                    </tr>";
                    $num = $num + 1;
            }
          } else {
            echo "<tr><td colspan='8' class='text-center'>No reservations found</td></tr>";
          }

          // DELETE operation
          if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $conn->query("DELETE FROM reservations WHERE id=$id");
            header("Location: index.php");
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
