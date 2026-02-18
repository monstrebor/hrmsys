<section class="min-vh-100 d-flex justify-content-center align-items-center home-bg">
    <div class="col-md-5 col-lg-4">
        <?php require_once __DIR__ . '/../partials/notif.php'; ?>
        <div class="card shadow border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                <h4 class="mb-0 fw-bold">Hello world!</h4>
                <small>Student & Employee Management System</small>
            </div>

            <div class="card-body p-4">

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                <form method="POST">
                    <h1 class="text-center fw-bold">Register</h1>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control form-control-lg"
                            value="<?= $_SESSION['old']['name'] ?? '' ?>"
                            required>

                        <?php if (isset($_SESSION['errors']['name'])): ?>
                            <small class="text-danger"><?= $_SESSION['errors']['name'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control form-control-lg"
                            value="<?= $_SESSION['old']['email'] ?? '' ?>"
                            required>

                        <?php if (isset($_SESSION['errors']['email'])): ?>
                            <small class="text-danger"><?= $_SESSION['errors']['email'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary btn-lg">Register</button>
                    </div>
                </form>

                <?php unset($_SESSION['old']); ?>

            </div>

            <div class="card-footer text-center bg-white border-0 pb-4">
                <span class="text-muted">Already have an account?</span>
                <a href="index.php?url=login" class="fw-semibold text-decoration-none">
                    Login here
                </a>
            </div>
        </div>

    </div>
</section>