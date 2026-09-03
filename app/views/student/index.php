<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basim's Student Hub</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #1f2937;
        }

        .navbar {
            background: #111827;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            color: white;
            margin: 0;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 850px;
            margin: 60px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.10);
        }

        .card h1 {
            margin-top: 0;
            font-size: 32px;
        }

        .welcome {
            font-size: 18px;
            line-height: 1.6;
        }

        .info {
            margin-top: 25px;
        }

        .info p {
            padding: 12px;
            background: #f9fafb;
            border-radius: 8px;
        }

        .profile-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .profile-btn:hover {
            background: #374151;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <h2>Student Hub</h2>

        <div class="nav-links">
            <a href="<?= site_url('student'); ?>">Home</a>
            <a href="<?= site_url('student/profile'); ?>">Student Profile</a>
        </div>
    </nav>

    <div class="container">

        <div class="card">

            <h1>Welcome to My Student Hub</h1>

            <p class="welcome">
                Hello! I am <strong><?= $name; ?></strong>.
                This is my Student Information Page created using the
                LavaLust PHP Framework.
            </p>

            <div class="info">
                <p><strong>Student ID:</strong> <?= $student_id; ?></p>
                <p><strong>Course:</strong> <?= $course; ?></p>
                <p><strong>Year Level:</strong> <?= $year; ?></p>
                <p><strong>Section:</strong> <?= $section; ?></p>
            </div>

            <a class="profile-btn" href="<?= site_url('student/profile'); ?>">
                View My Full Profile
            </a>

        </div>

        <footer>
            MATUAN, BASIM A. | LavaLust Laboratory Activity 3
        </footer>

    </div>

</body>
</html>