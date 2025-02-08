<?php
session_start();
if (!isset($_SESSION['tasks'])) {
  $_SESSION['tasks'] = [];
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Justin&Friends|To Do Application</title>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container-fluid vh-100">

    <div class="row vh-100 justify-content-center align-items-start">

      <div class="col col-auto p-3">

        <!-- Card -->
        <div class="card ">
          <div class="card-body">
            <h1 class="card-title">To Do Application</h1>
            <p class="card-text small text-secondary">This is a simple to do application that utilizes php in handling user operations

            </p>
            <!-- Input group -->
            <form class="input-group mb-3" action="operations/newtask.php" method="POST">
              <input type="text" class="form-control" name="task" required>
              <button class="btn btn-outline-success" type="submit" name="add">Add</button>
            </form>
            <!-- input-group -->

            <!-- task -->
            <div class="d-flex flex-column gap-3">
              <?php
              foreach ($_SESSION['tasks'] as $index => $task) {
              ?>
                <div class="d-flex align-items-center justify-content-between">
                  <form action="operations/mark_task.php" method="POST">
                    <div class="d-flex align-items-center gap-2">
                      <input value="<?php echo $index; ?>" hidden name="id">
                      <input type="checkbox" class="form-check-input mt-0" onchange="this.form.submit();">
                      <label class="form-check-label"><?php
                                                      echo $task['name'];
                                                      ?>

                      </label>
                      <small class="badge rounded-pill text-bg-warning"><?php echo $task['status']; ?>
                      </small>
                    </div>
                  </form>
                  <form action="operations/delete_task.php" method="POST">
                    <input value="<?php echo $index; ?>" hidden name="id">
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="bi bi-trash3"></i>
                    </button>
                  </form>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
        <!-- Card -->

        <!-- input -->







        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
          integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
          crossorigin="anonymous"></script>
</body>

</html>