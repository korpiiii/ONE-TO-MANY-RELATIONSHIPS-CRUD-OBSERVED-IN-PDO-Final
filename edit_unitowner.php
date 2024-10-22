<?php
require_once 'dbConfig.php';
require_once 'models.php';

// Get the unitownerId from the query string
if (isset($_GET['unitownerId'])) {
    $unitowner = Unitowner::getUnitownerById($pdo, $_GET['unitownerId']);
} else {
    die('Invalid request.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Unitowner</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2>Edit Unitowner</h2>
    <form action="handle_forms.php" method="POST">
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($unitowner['unitowner_id']); ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($unitowner['owner_name']); ?>" required>
      </div>
      <div class="mb-3">
        <label for="contact" class="form-label">Contact</label>
        <input type="text" class="form-control" name="contact" value="<?php echo htmlspecialchars($unitowner['contact']); ?>" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($unitowner['email']); ?>" required>
      </div>
      <button type="submit" class="btn btn-primary" name="updateUnitowner">Update Unitowner</button>
    </form>
  </div>
</body>
</html>
