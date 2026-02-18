<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your SEMSYS Account</title>
</head>
<body style="font-family: Arial, sans-serif; background-color:#f3f4f6; padding: 20px;">
    <div style="max-width:600px; margin:auto; background:#fff; padding:30px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="color:#1d4ed8;">🎉 Welcome, <?= $name ?>!</h2>
        <p>You have been added to SEMSYS. Here are your login details:</p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Password:</strong> <?= $password ?></p>
        <p><strong>Role:</strong> <?= $role ?></p>
        <p>🔒 Please change your password after your first login for security.</p>
        <div style="text-align:center; margin-top:20px;">
            <a href="http://localhost/semsys/public/index.php?url=login" 
               style="display:inline-block; padding:12px 24px; background:#2563eb; color:#fff; border-radius:6px; text-decoration:none;">
               Login Now
            </a>
        </div>
        <p style="font-size:12px; color:#6b7280; margin-top:20px;">
            If you didn't expect this email, you can ignore it.
        </p>
    </div>
</body>
</html>
