<section class="full-screen-grid">
    <div class="box1">
        <div class="justify-left text-white ">
            <h1>Human Resource <br>Management <br>System</h1>
        </div>
    </div>

    <div class="box2 flex-column justify-center align-items-center">
        <?php require_once __DIR__ . '/../partials/notif.php'; ?>
        <form method="POST" class="login-card">
            <div class="header text-center mb-4">
                <div class="bcp-logo"></div>
                <h2 class="fw-bold">Login</h2>
                <p class="text-muted">Enter your credentials to continue</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control form-control-lg" required>

                <?php if (isset($_SESSION['errors']['email'])): ?>
                    <small class="text-danger"><?= $_SESSION['errors']['email'] ?></small>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" required>

                <?php if (isset($_SESSION['errors']['password'])): ?>
                    <small class="text-danger"><?= $_SESSION['errors']['password'] ?></small>
                <?php endif; ?>
            </div>

            <button type="submit" name="login" class="btn-login">
                Login
            </button>
        </form>
    </div>
</section>