<div class="flex-grow-1 ml-16 transition-all">

    <?php require_once __DIR__ . '/../../partials/sidebar.php'; ?>
    <?php require_once __DIR__ . '/../../partials/navbar.php'; ?>


    <main class="flex-grow-1 bg-light p-4">
        <div class="container-fluid">
            <?php require_once __DIR__ . '/../../partials/notif.php'; ?>
            <h2 class="mb-0 text-center">Employees Management</h2>
            <div class="d-flex justify-content-end align-items-center mb-4">
                <button class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#createEmployeeModal">
                    ➕ Create Employee
                </button>
            </div>

            <div class="card shadow-sm border-0">
                <?php require_once __DIR__ . '/table-employee.php';?>
            </div>
            <hr class="my-5">
        </div>
    </main>
    <?php require_once __DIR__ . '/create-employee-modal.php'; ?>
</div>