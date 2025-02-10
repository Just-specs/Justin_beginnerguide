<?php
session_start();
if (!isset($_SESSION['contacts'])) {
    $_SESSION['contacts'] = [];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="card text-center w-50 shadow">
            <div class="card-body">
                <h1 class="card-title text-start ms-3">Contacts</h1>
                <p class="card-text text-start ms-3">
                    This application is built using native PHP in performing basic CRUD functionality.
                </p>
                <a href="create.php" class="btn btn-primary btn-lg w-100">
                    <i class="bi bi-person-circle"></i> New Contact
                </a>
            </div>

            <div class="card-footer bg-white">
                <?php if (empty($_SESSION['contacts'])): ?>
                    <p class="text-muted">There are no contacts available.</p>
                <?php else: ?>
                    <?php foreach ($_SESSION['contacts'] as $index => $contact): ?>
                        <div class="d-flex align-items-center justify-content-between border-bottom py-2">
                            <div class="d-flex align-items-center">
                              
                                <i class="bi bi-person-circle fs-1 me-3"></i>
                                <div class="text-start">
                                    <h5 class="mb-1"><?php echo htmlspecialchars($contact['first_name'] . ' ' . $contact['last_name']); ?></h5>
                                    <p class="mb-0 text-muted">
                                        <?php echo htmlspecialchars($contact['email']); ?> | <?php echo htmlspecialchars($contact['contact_number']); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                
                                <a href="edit.php?id=<?php echo $index; ?>" class="btn btn-outline-success btn-sm me-2">
                                    <i class="bi bi-pencil"></i>
                                </a>
                               
                                <form action="delete.php" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?php echo $index; ?>">
                                    <button type="submitt" class="btn btn-outline-danger btn-sm me-2 "><i class="bi bi-trash"></i></button>
                                        
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
