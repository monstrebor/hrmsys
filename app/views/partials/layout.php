<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "SEMS | Student & Employee Management System" ?></title>
    <link rel="stylesheet" href="/semsys/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/semsys/public/assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>

    <?php
    $url = $_GET['url'] ?? 'home';
    $publicRoutes = ['login', 'register'];
    ?>
    <?php if (in_array($url, $publicRoutes)) : ?>
        <?php require_once __DIR__ . '/navbar.php'; ?>
        <main>
            <?= $content ?? '' ?>
        </main>
    <?php elseif ($url === 'home') : ?>
        <main>
            <?= $content ?? '' ?>
        </main>
    <?php else : ?>
        <?php require_once __DIR__ . '/navbar.php'; ?>
        <div class="d-flex">
            <?php require_once __DIR__ . '/sidebar.php'; ?>
            <main class="flex-grow-1 bg-light p-4" style="min-height: 100vh;">
                <?= $content ?? '' ?>
            </main>
        </div>
    <?php endif; ?>


    <script src="/semsys/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/semsys/public/assets/js/scripts.js"></script>
    <script src="/semsys/public/assets/js/editUserModal.js"></script>
    <script src="/semsys/public/assets/js/changePasswordModal.js"></script>
    <script src="/semsys/public/assets/js/realTime.js"></script>
</body>

</html>