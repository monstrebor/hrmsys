<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employee Account Created</title>
</head>
<body>
    <h2>Hello <?= htmlspecialchars($name) ?>,</h2>

    <p>Your employee account for <strong>Bestlink College of the Philippines</strong> has been created.</p>

    <p><strong>Employee ID:</strong> <?= htmlspecialchars($employee_id) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Temporary Password:</strong> <?= htmlspecialchars($password) ?></p>

    <p>Please log in and change your password immediately.</p>

    <br>
    <p>— SEMSYS Administrator</p>
</body>
</html>
