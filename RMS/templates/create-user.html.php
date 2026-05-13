<div style="padding:30px 5%;max-width:700px;margin:0 auto;">
  <div style="display:flex;align-items:center;gap:16px;margin-bottom:24px;">
    <a href="/manageUsers" style="color:#8A038C;text-decoration:none;font-size:20px;">&larr;</a>
    <h2 style="color:#6D5C7C;font-size:22px;font-weight:700;">Create New User</h2>
  </div>

  <?php if ($message): ?>
    <div style="background:#e8f5e9;color:#2e7d32;border-radius:8px;padding:12px 16px;margin-bottom:20px;font-size:14px;">
      <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
      <a href="/manageUsers" style="color:#2e7d32;font-weight:600;margin-left:8px;">Back to list</a>
    </div>
  <?php endif; ?>

  <!-- Type tabs -->
  <div style="display:flex;gap:0;border-radius:8px;overflow:hidden;border:1.5px solid #90829B;margin-bottom:28px;max-width:280px;">
    <button onclick="switchType('student')" id="tab-student"
            style="flex:1;padding:10px;background:#8A038C;color:white;border:none;font-family:poppins,sans-serif;font-size:14px;font-weight:600;cursor:pointer;">
      Student
    </button>
    <button onclick="switchType('staff')" id="tab-staff"
            style="flex:1;padding:10px;background:white;color:#6D5C7C;border:none;font-family:poppins,sans-serif;font-size:14px;font-weight:600;cursor:pointer;">
      Staff
    </button>
  </div>

  <form method="POST" action="/createUser">
    <input type="hidden" name="type" id="userType" value="student">

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">User ID (8 digits)</label>
        <input type="number" name="user_id" required style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Email</label>
        <input type="email" name="email" required style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;margin-bottom:16px;">
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">First Name</label>
        <input type="text" name="first_name" required style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Middle Name</label>
        <input type="text" name="middle_name" style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Surname</label>
        <input type="text" name="surname" required style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Phone Number</label>
        <input type="text" name="phone_number" required style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
      <div style="text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Current Address</label>
        <input type="text" name="current_address" required style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
    </div>

    <!-- Student-only fields -->
    <div id="studentFields">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
        <div style="text-align:left;">
          <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Year of Study</label>
          <input type="number" name="year_of_study" min="1" max="5" style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
        </div>
        <div style="text-align:left;">
          <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Home Address</label>
          <input type="text" name="home_address" style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
        </div>
      </div>
      <div style="margin-bottom:16px;text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Course</label>
        <select name="course_id" style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
          <?php foreach ($courses as $course): ?>
            <option value="<?= $course->course_id ?>"><?= htmlspecialchars($course->course_title, ENT_QUOTES, 'UTF-8') ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <!-- Staff-only fields -->
    <div id="staffFields" style="display:none;">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
        <div style="text-align:left;">
          <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Role</label>
          <select name="role" style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
            <option value="ML/PT">Module Leader / Personal Tutor</option>
            <option value="AD">Admin</option>
          </select>
        </div>
        <div style="text-align:left;">
          <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Specialism</label>
          <input type="text" name="specialism" style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
        </div>
      </div>
      <div style="margin-bottom:16px;text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Module Leader Code (optional)</label>
        <input type="text" name="mod_leader" style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;">
      </div>
    </div>

    <div style="margin-bottom:24px;text-align:left;">
      <label style="display:block;color:#6D5C7C;font-weight:600;font-size:13px;margin-bottom:5px;">Password</label>
      <input type="password" name="password" required minlength="8"
             style="width:100%;padding:10px;border-radius:7px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:13px;box-sizing:border-box;"
             placeholder="Minimum 8 characters">
    </div>

    <button type="submit"
            style="background:#8A038C;color:white;border-radius:8px;padding:12px 32px;font-size:15px;font-weight:600;cursor:pointer;font-family:poppins,sans-serif;border:none;">
      Create User
    </button>
  </form>
</div>

<script>
function switchType(type) {
  document.getElementById('userType').value = type;
  document.getElementById('studentFields').style.display = type === 'student' ? 'block' : 'none';
  document.getElementById('staffFields').style.display   = type === 'staff'   ? 'block' : 'none';
  document.getElementById('tab-student').style.background = type === 'student' ? '#8A038C' : 'white';
  document.getElementById('tab-student').style.color      = type === 'student' ? 'white'   : '#6D5C7C';
  document.getElementById('tab-staff').style.background  = type === 'staff'   ? '#8A038C' : 'white';
  document.getElementById('tab-staff').style.color       = type === 'staff'   ? 'white'   : '#6D5C7C';
}
</script>
