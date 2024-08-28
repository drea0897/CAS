<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Sidebar</title>
</head>
<body>
    <div class="sidebar">
        <div class="menu-icon" aria-label="Toggle sidebar">
            <i class="bi bi-list" aria-hidden="true"></i>
        </div>
        <div class="user">
            <div class="user-avatar">
                <img src="assets/logo.png" alt="User Avatar" id="avatar">
                <input type="file" id="file-input" accept="image/*">
                <label for="file-input" aria-label="Change avatar">
                    <i class="bi bi-pencil-fill" aria-hidden="true"></i>
                </label>
            </div>
            <div class="user-info">
                <p class="namee"><br><?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : ''; ?></p>
            </div>
        </div>
        <div class="hr"></div>
        <ul class="menu one">
            <li>
                <a href="index.php" data-page="index">
                    <i class="bi bi-house" aria-hidden="true"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="profile.php" data-page="profile">
                    <i class="bi bi-person-circle" aria-hidden="true"></i>
                    <span>Account</span>
                </a>
            </li>
            <li>
                <a href="services.php" data-page="services">
                    <i class="bi bi-tools" aria-hidden="true"></i>
                    <span>Services</span>
                </a>
            </li>
            <li>
                <a href="contact.php" data-page="contact">
                    <i class="bi bi-telephone" aria-hidden="true"></i>
                    <span>Contact us</span>
                </a>
            </li>
            <li>
                <a href="guidelines.php" data-page="guidelines">
                    <i class="bi bi-journal-check" aria-hidden="true"></i>
                    <span>Guidelines</span>
                </a>
            </li>
        </ul>
        <div class="hr"></div>
        <ul class="menu two">
            <li>
                <a href="help.php" data-page="help">
                    <i class="bi bi-info-circle" aria-hidden="true"></i>
                    <span>Help/FAQ</span>
                </a>
            </li>
            <li>
                <?php if (isset($_SESSION['user_id'])): ?>
                <a href="backend/logout.php" data-page="logout">
                    <i class="bi bi-box-arrow-left" aria-hidden="true"></i>
                    <span>Logout</span>
                </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <!-- Main content goes here -->
    </div>
</body>
</html>
