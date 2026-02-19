<aside id="sidebar" class="sidebar bg-primary text-white vh-100 position-fixed top-0 start-0 shadow-lg transition-all w-16 hover:w-64 z-50">
    <div class="d-flex flex-column align-items-center justify-content-center py-4 border-bottom border-light">
        <img src="/hrmsys/public/assets/images/bcp-logo.png" alt="BCP Logo" class="rounded-circle shadow mb-2 w-16 h-16">
        <h5 class="fw-bold mb-0 text-center text-xs hidden group-hover:block">BCP Bulacan</h5>
        <small class="opacity-75 text-center hidden group-hover:block"><?= $_SESSION['user']['name'] ?? 'User'; ?></small>
    </div>

    <ul class="nav flex-column px-2 py-3 gap-1">
        <li>
            <a href="index.php?url=dashboard" class="nav-link text-white rounded hover:bg-white hover:bg-opacity-10">
                <i class="fas fa-tachometer-alt me-2"></i><span class="nav-text hidden group-hover:inline">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="#" class="nav-link text-white rounded hover:bg-white hover:bg-opacity-10">
                <i class="fas fa-user-graduate me-2"></i><span class="nav-text hidden group-hover:inline">Students</span>
            </a>
        </li>

        <li>
            <a href="index.php?url=employee-index" class="nav-link text-white rounded hover:bg-white hover:bg-opacity-10">
                <i class="fas fa-users me-2"></i><span class="nav-text hidden group-hover:inline">Employees</span>
            </a>
        </li>

        <li>
            <a href="index.php?url=user-index" class="nav-link text-white rounded hover:bg-white hover:bg-opacity-10">
                <i class="fas fa-user-cog me-2"></i><span class="nav-text hidden group-hover:inline">Users</span>
            </a>
        </li>

        <li class="mt-3 border-top border-light pt-3">
            <a href="logout.php" class="nav-link text-danger bg-white bg-opacity-10 rounded">
                <i class="fas fa-sign-out-alt me-2"></i><span class="nav-text hidden group-hover:inline">Logout</span>
            </a>
        </li>
    </ul>
</aside>
