<div class="d-flex min-vh-100">

    <!-- SIDEBAR -->
    <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="flex-grow-1 bg-light p-4">

        <div class="card mx-auto" style="max-width: 600px;">
            <?php require_once __DIR__ . '/../partials/notif.php'; ?>
            <div class="card-body">
                <h3 class="card-title mb-3">My Profile</h3>

                <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <p><strong>Role:</strong> <?= $user['isAdmin'] ? 'Admin' : 'User' ?></p>
                <p><strong>Status:</strong> <?= $user['isActive'] ? 'Active' : 'Inactive' ?></p>

                <div class="d-flex gap-2 mt-3">
                    <a href="index.php?url=profile-edit" class="btn btn-primary">
                        Edit Profile
                    </a>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        Change Password
                    </button>
                </div>
            </div>
        </div>

        <?php require_once __DIR__ . '/change-password-modal.php'; ?>
    </main>
</div>