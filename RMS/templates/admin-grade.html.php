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
    <form action="admin-grade.php" method="post">
        <label for="studentID">Student ID:</label>
        <input type="text" id="studentID" name="studentID" required><br><br>
        
        <label for="assignmentID">Assignment ID:</label>
        <input type="text" id="assignmentID" name="assignmentID" required><br><br>
        
        <input type="submit" value="Approve Grade">
    </form>
</body>
</html>
