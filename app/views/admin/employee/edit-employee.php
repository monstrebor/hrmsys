<div class="d-flex min-vh-100">

    <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <main class="flex-grow-1 bg-light">
        <div class="container-fluid mt-4">
            <h3>Edit Employee: <?= htmlspecialchars($employee['name']) ?></h3>
            <form method="POST"
                action="index.php?url=admin-employees-update&id=<?= isset($employee['user_id']) ? htmlspecialchars($employee['user_id']) : '' ?>"
                enctype="multipart/form-data">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Account Information</h6>
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" class="form-control" value="<?= htmlspecialchars($employee['name']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" class="form-control" value="<?= htmlspecialchars($employee['email']) ?>" required>
                        </div>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Employee Information</h6>

                        <div class="mb-3">
                            <label for="employee_id">Employee ID</label>
                            <input id="employee_id" type="text" name="employee_id" class="form-control" value="<?= htmlspecialchars($employee['employee_id']) ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="employee_type">Employee Type</label>
                                <select id="employee_type" name="employee_type" class="form-select" required>
                                    <option value="Faculty" <?= $employee['employee_type'] === 'Faculty' ? 'selected' : '' ?>>Faculty</option>
                                    <option value="Staff" <?= $employee['employee_type'] === 'Staff' ? 'selected' : '' ?>>Staff</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="employment_status">Status</label>
                                <select id="employment_status" name="employment_status" class="form-select" required>
                                    <option value="Full-time" <?= $employee['employment_status'] === 'Full-time' ? 'selected' : '' ?>>Full-time</option>
                                    <option value="Part-time" <?= $employee['employment_status'] === 'Part-time' ? 'selected' : '' ?>>Part-time</option>
                                    <option value="Contractual" <?= $employee['employment_status'] === 'Contractual' ? 'selected' : '' ?>>Contractual</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="department">Department</label>
                            <input id="department" type="text" name="department" class="form-control" value="<?= htmlspecialchars($employee['department']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="position">Position</label>
                            <input id="position" type="text" name="position" class="form-control" value="<?= htmlspecialchars($employee['position']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="campus">Campus</label>
                            <input id="campus" type="text" name="campus" class="form-control" value="<?= htmlspecialchars($employee['campus']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_hired">Date Hired</label>
                            <input id="date_hired" type="date" name="date_hired" class="form-control" value="<?= htmlspecialchars($employee['date_hired']) ?>" required>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="index.php?url=employee-index" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </main>
</div>