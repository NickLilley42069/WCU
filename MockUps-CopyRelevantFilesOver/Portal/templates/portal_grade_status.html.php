<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade Status</title>
</head>
<body>
    <h1>Your Approved Grades</h1>

    <?php if ($student_id): ?>
        <?php if (!empty($approved_grades)): ?>
            <table border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>Assignment</th>
                        <th>Your Grade</th>
                        <th>Pass Grade</th>
                        <th>Status</th>
                        <th>Date Approved</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($approved_grades as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['assignment']->assignment_brief ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($item['student_assignment']->grade ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($item['assignment']->pass_grade ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php if (is_numeric($item['student_assignment']->grade) && is_numeric($item['assignment']->pass_grade) && $item['student_assignment']->grade >= $item['assignment']->pass_grade): ?>
                                    <span style="color: green;">Passed</span>
                                <?php else: ?>
                                    <span style="color: red;">Failed</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($item['student_assignment']->date_of_return ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No approved grades yet. Check back soon!</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Please log in to view your grades.</p>
    <?php endif; ?>
</body>
</html>
