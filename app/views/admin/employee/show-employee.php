<div class="d-flex min-vh-100">

    <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="flex-grow-1 bg-light">
        
        <div class="position-relative">
            <div style="
                height: 260px;
                background: url('<?= $employee['cover_image'] ?? '/assets/img/default-cover.jpg' ?>') center/cover;
            "></div>

            <div class="position-absolute" style="bottom: -60px; left: 40px;">
                <img src="
                <?= $employee['profile_image'] ?? '/assets/img/default-avatar.png' ?>
                "class="rounded-circle border border-4 border-white shadow"
                     width="140" height="140">
            </div>
        </div>

        <div class="container-fluid mt-5 pt-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="mb-0"><?= htmlspecialchars($employee['name']) ?></h3>
                    <small class="text-muted">
                        <?= $employee['employee_type'] ?> · <?= $employee['department'] ?>
                    </small>
                </div>

                <a href="index.php?url=employee-index" class="btn btn-outline-secondary">
                    ← Back
                </a>
            </div>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Employee Details</h6>

                            <p class="mb-1"><strong>ID:</strong> <?= $employee['employee_id'] ?></p>
                            <p class="mb-1"><strong>Status:</strong> <?= $employee['employment_status'] ?></p>
                            <p class="mb-1"><strong>Campus:</strong> <?= $employee['campus'] ?></p>
                            <p class="mb-1"><strong>Position:</strong> <?= $employee['position'] ?></p>
                            <p class="mb-0"><strong>Date Hired:</strong> <?= $employee['date_hired'] ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Account Information</h6>

                            <p class="mb-1"><strong>Email:</strong> <?= $employee['email'] ?></p>
                            <p class="mb-1">
                                <strong>Account Status:</strong>
                                <?= $employee['isActive'] ? 'Active' : 'Inactive' ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>
