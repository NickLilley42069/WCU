<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enrollment Status</title>
</head>
<body>
    <h1>Your Enrollment Status</h1>

    <?php if ($student_id): ?>
        <?php if ($enrollment_status): ?>
            <div class="status-card">
                <p><strong>Status:</strong> <?php echo htmlspecialchars(ucfirst($enrollment_status->status), ENT_QUOTES, 'UTF-8'); ?></p>
                <p><strong>Date:</strong> <?php echo htmlspecialchars($enrollment_status->date_added ?? '', ENT_QUOTES, 'UTF-8'); ?></p>

                <?php if ($enrollment_status->status === 'accepted'): ?>
                    <p style="color: green;"><strong>Congratulations! Your enrollment has been accepted.</strong></p>
                <?php elseif ($enrollment_status->status === 'rejected'): ?>
                    <p style="color: red;"><strong>Unfortunately, your enrollment has been rejected.</strong></p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>No enrollment status available. Please contact admissions.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Please log in to view your enrollment status.</p>
    <?php endif; ?>
</body>
</html>
