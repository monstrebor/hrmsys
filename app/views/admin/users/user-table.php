<div class="card-body">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($users as $user): ?>

                    <?php if ($user['id'] == $_SESSION['user']['id']) continue; ?>

                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td>
                            <?php if ($user['isAdmin']): ?>
                                <span class="badge bg-primary">Admin</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">User</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                        <td class="text-end">
                            <button
                                class="btn btn-sm btn-outline-secondary btn-edit"
                                data-id="<?= $user['id'] ?>"
                                data-name="<?= htmlspecialchars($user['name'], ENT_QUOTES) ?>"
                                data-email="<?= htmlspecialchars($user['email'], ENT_QUOTES) ?>"
                                data-role="<?= $user['isAdmin'] ?>">
                                Edit
                            </button>
                            <form method="POST"
                                action="index.php?url=admin-users-delete"
                                class="d-inline"
                                onsubmit="return confirm('Deactivate this user?');">

                                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Deactivate
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>