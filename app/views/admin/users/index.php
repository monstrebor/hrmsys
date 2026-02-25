<div class="flex-grow-1 ml-16 transition-all">

    <?php require_once __DIR__ . '/../../partials/sidebar.php'; ?>
    <?php require_once __DIR__ . '/../../partials/navbar.php'; ?>

    <main class="bg-light min-vh-100 py-5 px-4">
        <div class="container-fluid">

            <?php require_once __DIR__ . '/../../partials/notif.php'; ?>

            <h2 class="text-center fw-bold display-4">
                Users Management
            </h2>
            <div class="d-flex flex-column flex-md-row justify-content-end align-items-center mb-4">
                <button class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#createUserModal">
                    ➕ Create User
                </button>
            </div>

            <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5">
                <div class="card-body p-4">
                    <?php require_once __DIR__ . '/user-table.php'; ?>
                </div>
            </div>

            <h4 class="mb-3 text-muted fw-semibold">Deactivated Accounts</h4>
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="card-body p-4">
                    <?php require_once __DIR__ . '/deactivated-accounts.php'; ?>
                </div>
            </div>

        </div>
    </main>

    <?php require_once __DIR__ . '/create-user-modal.php'; ?>
    <?php require_once __DIR__ . '/edit-user-modal.php'; ?>
</div>