<nav class="bg-primary text-white p-3 flex-shrink-0" style="width: 250px;">
    <div class="text-center mb-4">
        <div class="icon1 mx-auto mb-2"></div>
        <h4 class="fw-bold">SEMSYS</h4>
        <small>Welcome, <?= $_SESSION['user']['name']; ?></small>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="index.php?url=dashboard" class="nav-link text-white">🏠 Dashboard</a>
        </li>
        <li class="nav-item mb-2">
            <a href="index.php?url=employee-portal" class="nav-link text-white">👥 Employee Portal</a>
        </li>
    </ul>
</nav>