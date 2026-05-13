<div style="padding:30px 5%;max-width:700px;margin:0 auto;">
  <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;">
    <a href="/manageUsers" style="color:#8A038C;text-decoration:none;font-size:20px;">&larr;</a>
    <h2 style="color:#6D5C7C;font-size:22px;font-weight:700;">
      Edit <?= ucfirst(htmlspecialchars($type, ENT_QUOTES, 'UTF-8')) ?>
    </h2>
  </div>

  <?php if ($message): ?>
    <div style="background:#e8f5e9;color:#2e7d32;border-radius:8px;padding:12px 16px;margin-bottom:20px;font-size:14px;">
      <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
  <?php endif; ?>

  <?php if (!$user): ?>
    <p style="color:#b71c1c;">User not found.</p>
  <?php else: ?>

  <form method="POST" action="/editUser">
    <input type="hidden" name="type" value="<?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="id" value="<?= htmlspecialchars($type === 'student' ? $user->student_id : $user->staff_id, ENT_QUOTES, 'UTF-8') ?>">

    <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;margin-bottom:16px;">
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">First Name</label>
        <input type="text" name="first_name" required value="<?= htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8') ?>"
               style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Middle Name</label>
        <input type="text" name="middle_name" value="<?= htmlspecialchars($user->middle_name ?? '', ENT_QUOTES, 'UTF-8') ?>"
               style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Surname</label>
        <input type="text" name="surname" required value="<?= htmlspecialchars($user->surname, ENT_QUOTES, 'UTF-8') ?>"
               style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Email</label>
        <input type="email" name="email" required value="<?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?>"
               style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Phone Number</label>
        <input type="text" name="phone_number" required value="<?= htmlspecialchars($user->phone_number, ENT_QUOTES, 'UTF-8') ?>"
               style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
    </div>

    <div style="margin-bottom:16px;text-align:left;">
      <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Current Address</label>
      <input type="text" name="current_address" required value="<?= htmlspecialchars($user->current_address, ENT_QUOTES, 'UTF-8') ?>"
             style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
    </div>

    <?php if ($type === 'staff'): ?>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Role</label>
        <select name="role" style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
          <option value="ML/PT" <?= $user->role === 'ML/PT' ? 'selected' : '' ?>>Module Leader / Personal Tutor</option>
          <option value="AD" <?= $user->role === 'AD' ? 'selected' : '' ?>>Admin</option>
        </select>
      </div>
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Specialism</label>
        <input type="text" name="specialism" value="<?= htmlspecialchars($user->specialism, ENT_QUOTES, 'UTF-8') ?>"
               style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
    </div>
    <?php endif; ?>

    <div style="margin-bottom:8px;text-align:left;">
      <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">New Password <span style="font-weight:400;color:#80748C;">(leave blank to keep current)</span></label>
      <input type="password" name="password" minlength="8"
             style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;"
             placeholder="Minimum 8 characters">
    </div>
    <p style="color:#80748C;font-size:12px;margin-bottom:20px;text-align:left;">
      Password set: <strong><?= $user->password_hash ? 'Yes' : 'No' ?></strong>
    </p>

    <button type="submit"
            style="background:#8A038C;color:white;border-radius:8px;padding:12px 32px;font-size:15px;font-weight:600;cursor:pointer;font-family:poppins,sans-serif;border:none;">
      Save Changes
    </button>
  </form>

  <?php endif; ?>
</div>
