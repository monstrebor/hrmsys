<div class="d-flex min-vh-100">
    <?php require_once __DIR__ . '/../../partials/sidebar.php'; ?>

    <main class="flex-grow-1 bg-light p-4">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1">Employee Portal</h2>
                    <p class="text-muted mb-0">
                        Welcome back, <?= htmlspecialchars($employee['name']) ?>
                    </p>
                </div>

                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#viewPayslipsModal">📄 View Payslips</a>
                    <a href="#" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                        data-bs-target="#requestLeaveModal">📝 Request Leave</a>
                    <a href="index.php?url=employer-profile" class="btn btn-outline-secondary btn-sm">⚙️ Edit Profile</a>
                </div>
            </div>

            <div class="position-relative mb-5">
                <div style="height: 220px; background: url('<?= $employee['cover_image'] ?? '/assets/img/default-cover.jpg' ?>') center/cover; border-radius: 8px;"></div>

                <div class="position-absolute" style="bottom: -60px; left: 30px;">
                    <img src="<?= $employee['profile_image'] ?? '/assets/img/default-avatar.png' ?>"
                        class="rounded-circle border border-4 border-white shadow"
                        width="120" height="120">
                </div>
            </div>

            <div class="row mt-5">

                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="mb-1"><?= htmlspecialchars($employee['name']) ?></h5>
                            <p class="text-muted mb-2"><?= htmlspecialchars($employee['position']) ?></p>

                            <span class="badge bg-success mb-3">
                                <?= htmlspecialchars($employee['employment_status']) ?>
                            </span>

                            <hr>

                            <p class="mb-1"><strong>Employee ID:</strong></p>
                            <p><?= htmlspecialchars($employee['employee_id']) ?></p>

                            <a href="index.php?url=profile" class="btn btn-primary btn-sm w-100">
                                Edit Personal Info
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Employee Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-2"><strong>Email:</strong><br><?= htmlspecialchars($employee['email']) ?></div>
                                <div class="col-md-6 mb-2"><strong>Type:</strong><br><?= htmlspecialchars($employee['employee_type']) ?></div>
                                <div class="col-md-6 mb-2"><strong>Department:</strong><br><?= htmlspecialchars($employee['department']) ?></div>
                                <div class="col-md-6 mb-2"><strong>Campus:</strong><br><?= htmlspecialchars($employee['campus']) ?></div>
                                <div class="col-md-6 mb-2"><strong>Date Hired:</strong><br><?= htmlspecialchars($employee['date_hired']) ?></div>
                                <div class="col-md-6 mb-2"><strong>Years in Service:</strong><br>
                                    <?= $employee['date_hired']
                                        ? date_diff(date_create($employee['date_hired']), date_create())->y
                                        : 0 ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5>📝 Leave Requests</h5>
                            <p class="text-muted">Apply & track leave</p>
                            <a href="#" class="btn btn-outline-primary btn-sm" data-bs-target="#requestLeaveModal" data-bs-toggle="modal">Request Leave</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5>💰 Payslips</h5>
                            <p class="text-muted">Salary history</p>
                            <a href="#" class="btn btn-outline-success btn-sm" data-bs-target="#viewPayslipsModal" data-bs-toggle="modal">View Payslips</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5>📅 Attendance</h5>
                            <p class="text-muted">View attendance</p>
                            <a href="#" class="btn btn-outline-warning btn-sm">View Logs</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5>🔐 Security</h5>
                            <p class="text-muted">Account protection</p>
                            <a href="index.php?url=profile-save-password" class="btn btn-outline-danger btn-sm">
                                Change Password
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Recent Activity</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">✔ Profile information updated</li>
                    <li class="list-group-item">✔ Last login recorded</li>
                    <li class="list-group-item">✔ Password changed successfully</li>
                </ul>
            </div>

        </div>
    </main>
    <?php require_once __DIR__ . '/view-payslips-modal.php'; ?>
    <?php require_once __DIR__ . '/request-leave-modal.php'; ?>
</div>