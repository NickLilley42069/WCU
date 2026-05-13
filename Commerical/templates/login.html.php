<div style="display:flex;justify-content:center;align-items:center;min-height:65vh;padding:40px 16px;">
  <div style="background:#fff;border-radius:16px;padding:48px 56px;box-shadow:0 8px 30px rgba(0,0,0,0.18);min-width:360px;max-width:460px;width:100%;">
    <div style="margin-bottom:24px;">
      <h2 style="color:#6D5C7C;font-size:24px;font-weight:700;">Welcome back</h2>
      <p style="color:#80748C;font-size:14px;margin-top:4px;">Woodland's University College</p>
    </div>

    <!-- Tabs -->
    <div style="display:flex;gap:0;border-radius:8px;overflow:hidden;border:1.5px solid #90829B;margin-bottom:28px;">
      <button onclick="showTab('student')" id="tab-student"
              style="flex:1;padding:10px;background:#8A038C;color:white;border:none;font-family:poppins,sans-serif;font-size:14px;font-weight:600;cursor:pointer;">
        Student
      </button>
      <button onclick="showTab('staff')" id="tab-staff"
              style="flex:1;padding:10px;background:white;color:#6D5C7C;border:none;font-family:poppins,sans-serif;font-size:14px;font-weight:600;cursor:pointer;">
        Staff
      </button>
    </div>

    <?php if ($error): ?>
      <div style="background:#fde8ef;color:#8A038C;border-radius:8px;padding:10px 14px;margin-bottom:18px;font-size:14px;">
        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
      </div>
    <?php endif; ?>

    <!-- Student login form -->
    <div id="panel-student">
      <form method="POST" action="/login">
        <input type="hidden" name="login_type" value="student">
        <div style="margin-bottom:16px;text-align:left;">
          <label style="display:block;color:#6D5C7C;font-weight:600;font-size:14px;margin-bottom:6px;">Email address</label>
          <input type="email" name="email" required
                 style="width:100%;padding:11px 14px;border-radius:8px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:14px;box-sizing:border-box;"
                 placeholder="your@email.com">
        </div>
        <div style="margin-bottom:24px;text-align:left;">
          <label style="display:block;color:#6D5C7C;font-weight:600;font-size:14px;margin-bottom:6px;">Password</label>
          <input type="password" name="password" required
                 style="width:100%;padding:11px 14px;border-radius:8px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:14px;box-sizing:border-box;"
                 placeholder="••••••••">
        </div>
        <button type="submit"
                style="width:100%;background:#8A038C;color:white;border-radius:8px;padding:13px;font-size:15px;font-weight:600;cursor:pointer;font-family:poppins,sans-serif;border:none;">
          Sign in
        </button>
      </form>
    </div>

    <!-- Staff redirect panel -->
    <div id="panel-staff" style="display:none;text-align:center;">
      <p style="color:#80748C;font-size:14px;margin-bottom:20px;">Staff access the RMS portal to manage records and administration.</p>
      <a href="http://localhost:3300/login"
         style="display:inline-block;background:#8A038C;color:white;border-radius:8px;padding:13px 28px;font-size:15px;font-weight:600;text-decoration:none;font-family:poppins,sans-serif;">
        Go to Staff Login
      </a>
    </div>

  </div>
</div>

<script>
function showTab(tab) {
  document.getElementById('panel-student').style.display = tab === 'student' ? 'block' : 'none';
  document.getElementById('panel-staff').style.display  = tab === 'staff'   ? 'block' : 'none';
  document.getElementById('tab-student').style.background = tab === 'student' ? '#8A038C' : 'white';
  document.getElementById('tab-student').style.color     = tab === 'student' ? 'white'   : '#6D5C7C';
  document.getElementById('tab-staff').style.background  = tab === 'staff'   ? '#8A038C' : 'white';
  document.getElementById('tab-staff').style.color       = tab === 'staff'   ? 'white'   : '#6D5C7C';
}
</script>
