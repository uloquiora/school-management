<!-- app/Views/students/index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List - Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
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
                <h1>Students List</h1>
                <a href="<?= site_url('logout') ?>" class="logout">Logout</a>
            </div>

            <!-- Display validation errors if any -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div style="color: red;">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <table>
                <tr>
                    <th>Name</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= esc($student['name']) ?></td>
                    <td><?= esc($student['email']) ?></td>
                    <td><?= esc($student['phone']) ?></td>
                    <td>
                        <a href="/students/edit/<?= $student['id'] ?>">Edit</a> |
                        <a href="/students/delete/<?= $student['id'] ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

            <a href="<?= site_url('students/create') ?>" class="add-student-btn">Add New Student</a>
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
