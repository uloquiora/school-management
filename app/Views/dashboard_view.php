<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive School Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css'); ?>">
    <script defer src="<?= base_url('js/dashboard.js'); ?>"></script>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>School Dashboard</h2>
            <button class="toggle-btn" id="toggle-btn">&#9776;</button>
            <ul>
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/students">Students</a></li>
                <li><a href="#">Teachers</a></li>
                <li><a href="#">Classes</a></li>
                <li><a href="#">Exams</a></li>
                <li><a href="#">Attendance</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Welcome, Admin</h1>
                <button class="logout">Logout</button>
            </div>
            <div class="cards">
                <div class="card">
                    <h3>Total Students</h3>
                    <p>1200</p>
                </div>
                <div class="card">
                    <h3>Total Teachers</h3>
                    <p>80</p>
                </div>
                <div class="card">
                    <h3>Total Classes</h3>
                    <p>30</p>
                </div>
                <div class="card">
                    <h3>Pending Fees</h3>
                    <p>$15,000</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
