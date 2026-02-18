<nav class="top-navbar shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="index.php?url=home" class="navbar-brand d-flex align-items-center gap-2">
            <div class="icon1"></div>
            <div class="brand-text">SEMSYS</div>
        </a>

        <div class="d-flex align-items-center gap-2">
            <?php if (isset($_SESSION['user'])): ?>
                <div class="realtime" id="realtimeClock" aria-live="polite">--:--</div>

                <a href="index.php?url=profile" class="btn btn-outline-secondary nav-btn">
                    Profile
                </a>
                <a href="index.php?url=logout" class="btn btn-outline-danger nav-btn">
                    Logout
                </a>
            <?php else: ?>
                <a href="index.php?url=login" class="btn btn-primary nav-btn">
                    Login
                </a>
                <a href="index.php?url=register" class="btn btn-primary nav-btn">
                    Register
                </a>
            <?php endif; ?>
        </div>

    </div>
</nav>
