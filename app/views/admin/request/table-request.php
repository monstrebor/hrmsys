<div class="card shadow-sm">
    <div class="card-body">

        <h5 class="mb-3 fw-bold">All Requests</h5>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($requests)): ?>
                        <?php foreach ($requests as $index => $request): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= htmlspecialchars($request['user_name']); ?></td>
                                <td><?= htmlspecialchars($request['request_type']); ?></td>
                                <td><?= htmlspecialchars($request['title']); ?></td>

                                <td>
                                    <?php
                                    $badge = match ($request['status']) {
                                        'Approved' => 'success',
                                        'Rejected' => 'danger',
                                        'Cancelled' => 'secondary',
                                        'Completed' => 'info',
                                        default => 'warning'
                                    };
                                    ?>
                                    <span class="badge bg-<?= $badge; ?>">
                                        <?= $request['status']; ?>
                                    </span>
                                </td>

                                <td>
                                    <?= date('M d, Y', strtotime($request['created_at'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No requests found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>