<div style="padding:30px 5%;">
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
    <h2 style="color:#6D5C7C;font-size:22px;font-weight:700;">Manage Users</h2>
    <a href="/createUser"
       style="background:#8A038C;color:white;padding:10px 22px;border-radius:8px;text-decoration:none;font-weight:600;font-size:14px;">
      + Create User
    </a>
  </div>

  <?php if ($message): ?>
    <div style="background:#e8f5e9;color:#2e7d32;border-radius:8px;padding:12px 16px;margin-bottom:20px;font-size:14px;">
      <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
  <?php endif; ?>

  <?php $error = $_GET['error'] ?? null; if ($error): ?>
    <div style="background:#fde8ef;color:#8A038C;border-radius:8px;padding:12px 16px;margin-bottom:20px;font-size:14px;">
      <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
    </div>
  <?php endif; ?>

  <!-- Staff table -->
  <h3 style="color:#6D5C7C;margin-bottom:12px;font-size:16px;">Staff</h3>
  <div style="overflow-x:auto;margin-bottom:40px;">
    <table style="width:100%;border-collapse:collapse;background:white;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.1);">
      <thead>
        <tr style="background:#6D5C7C;color:white;">
          <th style="padding:12px 16px;text-align:left;font-size:13px;">ID</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Name</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Email</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Role</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Has Password</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($staff as $member): ?>
        <tr style="border-bottom:1px solid #f0edf2;">
          <td style="padding:11px 16px;font-size:13px;color:#444;"><?= htmlspecialchars($member->staff_id, ENT_QUOTES, 'UTF-8') ?></td>
          <td style="padding:11px 16px;font-size:13px;color:#444;"><?= htmlspecialchars($member->first_name . ' ' . $member->surname, ENT_QUOTES, 'UTF-8') ?></td>
          <td style="padding:11px 16px;font-size:13px;color:#444;"><?= htmlspecialchars($member->email, ENT_QUOTES, 'UTF-8') ?></td>
          <td style="padding:11px 16px;font-size:13px;color:#444;"><?= htmlspecialchars($member->role, ENT_QUOTES, 'UTF-8') ?></td>
          <td style="padding:11px 16px;font-size:13px;color:<?= $member->password_hash ? '#2e7d32' : '#b71c1c' ?>;">
            <?= $member->password_hash ? 'Yes' : 'No' ?>
          </td>
          <td style="padding:11px 16px;display:flex;gap:8px;">
            <a href="/editUser?type=staff&id=<?= $member->staff_id ?>"
               style="background:#6D5C7C;color:white;padding:6px 14px;border-radius:6px;text-decoration:none;font-size:12px;font-weight:600;">Edit</a>
            <form method="POST" action="/deleteUser" onsubmit="return confirm('Delete this staff member?');" style="margin:0;">
              <input type="hidden" name="type" value="staff">
              <input type="hidden" name="id" value="<?= $member->staff_id ?>">
              <button type="submit" style="background:#8A038C;color:white;padding:6px 14px;border-radius:6px;border:none;font-size:12px;font-weight:600;cursor:pointer;">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Students table -->
  <h3 style="color:#6D5C7C;margin-bottom:12px;font-size:16px;">Students</h3>
  <div style="overflow-x:auto;">
    <table style="width:100%;border-collapse:collapse;background:white;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.1);">
      <thead>
        <tr style="background:#6D5C7C;color:white;">
          <th style="padding:12px 16px;text-align:left;font-size:13px;">ID</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Name</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Email</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Year</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Has Password</th>
          <th style="padding:12px 16px;text-align:left;font-size:13px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($students as $student): ?>
        <tr style="border-bottom:1px solid #f0edf2;">
          <td style="padding:11px 16px;font-size:13px;color:#444;"><?= htmlspecialchars($student->student_id, ENT_QUOTES, 'UTF-8') ?></td>
          <td style="padding:11px 16px;font-size:13px;color:#444;"><?= htmlspecialchars($student->first_name . ' ' . $student->surname, ENT_QUOTES, 'UTF-8') ?></td>
          <td style="padding:11px 16px;font-size:13px;color:#444;"><?= htmlspecialchars($student->email, ENT_QUOTES, 'UTF-8') ?></td>
          <td style="padding:11px 16px;font-size:13px;color:#444;"><?= htmlspecialchars($student->year_of_study ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
          <td style="padding:11px 16px;font-size:13px;color:<?= $student->password_hash ? '#2e7d32' : '#b71c1c' ?>;">
            <?= $student->password_hash ? 'Yes' : 'No' ?>
          </td>
          <td style="padding:11px 16px;display:flex;gap:8px;">
            <a href="/editUser?type=student&id=<?= $student->student_id ?>"
               style="background:#6D5C7C;color:white;padding:6px 14px;border-radius:6px;text-decoration:none;font-size:12px;font-weight:600;">Edit</a>
            <form method="POST" action="/deleteUser" onsubmit="return confirm('Delete this student?');" style="margin:0;">
              <input type="hidden" name="type" value="student">
              <input type="hidden" name="id" value="<?= $student->student_id ?>">
              <button type="submit" style="background:#8A038C;color:white;padding:6px 14px;border-radius:6px;border:none;font-size:12px;font-weight:600;cursor:pointer;">Delete</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
