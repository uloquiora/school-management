<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css'); ?>"> <!-- Using the same CSS for the dashboard -->
    <link rel="stylesheet" href="<?= base_url('css/create_student.css'); ?>"> <!-- Specific CSS for the create student form -->
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
            <!-- Header -->
            <div class="header">
                <h1>Create Student</h1>
                <a href="/logout" class="logout">Logout</a>
            </div>

            <!-- Create Student Form -->
            <form action="/students/store" method="POST" class="create-student-form">
                <h2>Create New Student</h2>

                <!-- Display validation errors if any -->
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="error-message">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Student Name -->
                <div>
                    <label for="name">Student Name:</label>
                    <input type="text" id="name" name="name" value="<?= old('name') ?>" required>
                </div>

                <!-- Student Email -->
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= old('email') ?>" required>
                </div>

                <!-- Student Phone -->
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?= old('phone') ?>" required>
                </div>

                <!-- Submit Button -->
                <button type="submit">Create Student</button>
            </form>

            <a href="/students" class="back-btn">Back to Student List</a>
        </div>
    </div>
    
    <script src="<?= base_url('js/dashboard.js'); ?>"></script> <!-- Include JS for sidebar toggle -->
</body>
</html>
