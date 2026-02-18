<div class="d-flex min-vh-100">

    <!-- SIDEBAR -->
    <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="flex-grow-1 bg-light p-4">
        <div class="container-fluid">
            <?php require_once __DIR__ . '/../../partials/notif.php'; ?>
            <h2 class="mb-0 text-center">Users Management</h2>
            <div class="d-flex justify-content-end align-items-center mb-4">
                <button class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#createUserModal">
                    ➕ Create User
                </button>
            </div>

            <div class="card shadow-sm border-0">
                <?php require_once __DIR__ . '/user-table.php'; ?>
            </div>
            <hr class="my-5">

            <h4 class="mb-3 text-muted">Deactivated Accounts</h4>
            <?php require_once __DIR__ . '/deactivated-accounts.php'; ?>
        </div>
    </main>
    <?php require_once __DIR__ . '/create-user-modal.php'; ?>
    <?php require_once __DIR__ . '/edit-user-modal.php'; ?>
</div>