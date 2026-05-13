<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Enrolment Approval</title>
</head>
<body>
    <h1>Approve Student Enrolment</h1>
    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
    <form action="/adminEnrolment" method="post" enctype="multipart/form-data">
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required><br><br>
        
        <label for="decision">Decision:</label>
        <select id="decision" name="decision" required>
            <option value="accept">Accept</option>
            <option value="reject">Reject</option>
        </select><br><br>
        
        <label for="offer_letter">Offer Letter (DOCX):</label>
        <input type="file" id="offer_letter" name="offer_letter" accept=".docx"><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
