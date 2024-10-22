<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unitowner Management System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h1>HarBnb</h1>

    <!-- Add Unitowner Form -->
    <div class="card mb-4">
      <div class="card-header">Add New Unitowner</div>
      <div class="card-body">
        <form action="handle_forms.php" method="POST">
          <div class="mb-3">
            <label for="owner_name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" class="form-control" name="contact" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <button type="submit" class="btn btn-primary" name="addUnitowner">Add Unitowner</button>
        </form>
      </div>
    </div>

    <!-- Unitowner List -->
    <h3>Unitowner List</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Fetch all unitowners
        $unitowners = Unitowner::getAllUnitowners($pdo);
        if ($unitowners) {
          foreach ($unitowners as $unitowner) {
            ?>
            <tr>
              <td><?php echo htmlspecialchars($unitowner['unitowner_id']); ?></td>
              <td><?php echo htmlspecialchars($unitowner['owner_name']); ?></td>
              <td><?php echo htmlspecialchars($unitowner['contact']); ?></td>
              <td><?php echo htmlspecialchars($unitowner['email']); ?></td>
              <td>
                <a href="edit_unitowner.php?unitownerId=<?php echo htmlspecialchars($unitowner['unitowner_id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="handle_forms.php?deleteUnitowner=true&unitownerId=<?php echo htmlspecialchars($unitowner['unitowner_id']); ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
            <?php
          }
        } else {
          echo '<tr><td colspan="5">No unitowners found.</td></tr>';
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
