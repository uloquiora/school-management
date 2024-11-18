<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/dashboard.css'); ?>"> <!-- Use the same dashboard CSS -->
    <link rel="stylesheet" href="<?= base_url('css/create_student.css'); ?>"> <!-- Use the same create student CSS -->
</head>
<body>

    <!-- Dashboard -->
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
                <h1>Edit Student</h1>
                <a href="<?= site_url('logout') ?>" class="logout">Logout</a>
            </div>

            <!-- Display validation errors if any -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="error-messages">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Edit Student Form -->
            <form action="<?= site_url('students/update/'.$student['id']) ?>" method="post" class="create-student-form">
                <?= csrf_field() ?>

                <!-- Student Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?= esc($student['name']) ?>" required>
                </div>

                <!-- Student Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= esc($student['email']) ?>" required>
                </div>

                <!-- Student Phone -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?= esc($student['phone']) ?>" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Update Student</button>
            </form>

        </div>
    </div>

    <script>
        // Toggle Sidebar
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        }
    </script>

</body>
</html>
