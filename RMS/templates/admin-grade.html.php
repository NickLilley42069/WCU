<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Grade Approval</title>
</head>
<body>
    <h1>Approve Student Grade</h1>
    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
    <form action="/adminGrade" method="post">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required><br><br>
        
        <label for="assignment_id">Assignment ID:</label>
        <input type="text" id="assignment_id" name="assignment_id" required><br><br>
        
        <input type="submit" value="Approve Grade">
    </form>
</body>
</html>
