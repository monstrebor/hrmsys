<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "SEMS | Student & Employee Management System" ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/hrmsys/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/hrmsys/public/assets/css/styles.css">
    <link rel="stylesheet" href="/hrmsys/public/assets/css/login.css">
    <link rel="stylesheet" href="/hrmsys/public/assets/css/partials.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<body>

    <?php
    $url = $_GET['url'] ?? 'home';
    $publicRoutes = ['login', 'register'];
    ?>
    <?php if (in_array($url, $publicRoutes)) : ?>
        <main>
            <?= $content ?? '' ?>
        </main>
    <?php elseif ($url === 'home') : ?>
        <main>
            <?= $content ?? '' ?>
        </main>
    <?php else : ?>
        <?= $content ?? '' ?>
    <?php endif; ?>


    <script src="/hrmsys/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/hrmsys/public/assets/js/scripts.js"></script>
    <script src="/hrmsys/public/assets/js/sidebar.js"></script>
    <script src="/hrmsys/public/assets/js/editUserModal.js"></script>
    <script src="/hrmsys/public/assets/js/changePasswordModal.js"></script>
    <script src="/hrmsys/public/assets/js/currentTime.js"></script>
</body>

</html>