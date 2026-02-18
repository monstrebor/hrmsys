<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Employee List</h5>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Campus</th>
                        <th>Status</th>
                        <th>Date Hired</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($employees)): ?>
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">
                                No employees found.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($employees as $index => $emp): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($emp['employee_id']) ?></td>
                                <td>
                                    <strong><?= htmlspecialchars($emp['name']) ?></strong><br>
                                    <small class="text-muted"><?= htmlspecialchars($emp['email']) ?></small>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        <?= htmlspecialchars($emp['employee_type']) ?>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($emp['department']) ?></td>
                                <td><?= htmlspecialchars($emp['position']) ?></td>
                                <td><?= htmlspecialchars($emp['campus']) ?></td>
                                <td>
                                    <span class="badge <?= $emp['isActive'] ? 'bg-success' : 'bg-secondary' ?>">
                                        <?= $emp['isActive'] ? 'Active' : 'Inactive' ?>
                                    </span>
                                </td>
                                <td><?= date('M d, Y', strtotime($emp['date_hired'])) ?></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="index.php?url=admin-employees-view&id=<?= $emp['user_id'] ?>"
                                            class="btn btn-outline-primary">
                                            View
                                        </a>
                                        <a href="index.php?url=admin-employees-edit&id=<?= $emp['user_id'] ?>"
                                            class="btn btn-outline-secondary">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>