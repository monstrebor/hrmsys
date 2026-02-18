<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-5 col-lg-4">

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">

                <h4 class="text-center fw-bold mb-1">Set Your Password</h4>
                <p class="text-center text-muted mb-4">
                    Create a secure password to access your account
                </p>

                <form method="POST" action="index.php?url=save-password" onsubmit="return validateForm()">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" id="password" name="password" class="form-control" required minlength="8">
                        <small class="text-muted">Minimum 8 characters</small>

                        <div class="progress mt-2">
                            <div id="strengthBar" class="progress-bar"></div>
                        </div>
                        <small id="strengthText" class="fw-semibold"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" id="confirmPassword" class="form-control" required>
                        <small id="matchError" class="text-danger d-none">
                            Passwords do not match
                        </small>
                    </div>

                    <button class="btn btn-primary w-100 py-2 fw-semibold">
                        Set Password
                    </button>
                </form>

            </div>
        </div>

        <p class="text-center text-muted small mt-3">
            © <?= date('Y') ?> SEMSYS
        </p>
    </div>
</div>
