<div class="flex-grow-1 ml-16 transition-all">
    <?php require_once __DIR__ . '/../partials/sidebar.php'; ?>
    <?php require_once __DIR__ . '/../partials/navbar.php'; ?>

    <main class="bg-light p-20">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Students</h5>
                            <p class="card-text display-6">120</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Employees</h5>
                            <p class="card-text display-6">35</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Pending Tasks</h5>
                            <p class="card-text display-6">8</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h4>Recent Activity</h4>
                <ul class="list-group">
                    <li class="list-group-item">New student registered: John Doe</li>
                    <li class="list-group-item">Employee Jane Smith updated record</li>
                    <li class="list-group-item">Password reset for user Mike Lee</li>
                </ul>
            </div>

        </div>