<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $name; ?> - Student Profile</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eef2ff;
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
            margin: 50px auto;
            padding: 20px;
        }

        .profile-card {
            background: white;
            border-radius: 18px;
            padding: 40px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #111827;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: bold;
        }

        .profile-header h1 {
            margin: 5px 0;
        }

        .profile-header p {
            color: #6b7280;
        }

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .detail-box {
            background: #f9fafb;
            padding: 18px;
            border-radius: 10px;
            border-left: 4px solid #111827;
        }

        .detail-box strong {
            display: block;
            margin-bottom: 6px;
            color: #374151;
        }

        .email {
            grid-column: 1 / 3;
        }

        .back-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 20px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .back-btn:hover {
            background: #374151;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            color: #6b7280;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px 20px;
                flex-direction: column;
                gap: 10px;
            }

            .nav-links a {
                margin: 0 8px;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .email {
                grid-column: auto;
            }
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

        <div class="profile-card">

            <div class="profile-header">

                <div class="avatar">
                    BM
                </div>

                <h1><?= $name; ?></h1>

                <p>Student Profile</p>

            </div>

            <div class="details">

                <div class="detail-box">
                    <strong>Student ID</strong>
                    <?= $student_id; ?>
                </div>

                <div class="detail-box">
                    <strong>Course</strong>
                    <?= $course; ?>
                </div>

                <div class="detail-box">
                    <strong>Year Level</strong>
                    <?= $year; ?>
                </div>

                <div class="detail-box">
                    <strong>Section</strong>
                    <?= $section; ?>
                </div>

                <div class="detail-box email">
                    <strong>Email</strong>
                    <?= $email; ?>
                </div>

            </div>

            <a class="back-btn" href="<?= site_url('student'); ?>">
                ← Back to Student Home
            </a>

        </div>

        <footer>
            MATUAN, BASIM A. | LavaLust Laboratory Activity 3
        </footer>

    </div>

</body>
</html>