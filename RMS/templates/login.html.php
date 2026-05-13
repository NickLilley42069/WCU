<div style="display:flex;justify-content:center;align-items:center;min-height:75vh;">
  <div style="background:#fff;border-radius:16px;padding:48px 56px;box-shadow:0 8px 30px rgba(0,0,0,0.18);min-width:360px;max-width:440px;width:100%;">
    <div style="margin-bottom:28px;">
      <h2 style="color:#6D5C7C;font-size:24px;font-weight:700;">Staff Login</h2>
      <p style="color:#80748C;font-size:14px;margin-top:4px;">Woodland's University College &mdash; RMS</p>
    </div>

    <?php if ($error): ?>
      <div style="background:#fde8ef;color:#8A038C;border-radius:8px;padding:10px 14px;margin-bottom:18px;font-size:14px;">
        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="/login">
      <div style="margin-bottom:16px;text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:14px;margin-bottom:6px;">Email address</label>
        <input type="email" name="email" required
               style="width:100%;padding:11px 14px;border-radius:8px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:14px;box-sizing:border-box;outline:none;"
               placeholder="your@email.com">
      </div>
      <div style="margin-bottom:24px;text-align:left;">
        <label style="display:block;color:#6D5C7C;font-weight:600;font-size:14px;margin-bottom:6px;">Password</label>
        <input type="password" name="password" required
               style="width:100%;padding:11px 14px;border-radius:8px;border:1.5px solid #90829B;font-family:poppins,sans-serif;font-size:14px;box-sizing:border-box;outline:none;"
               placeholder="••••••••">
      </div>
      <button type="submit"
              style="width:100%;background:#8A038C;color:white;border-radius:8px;padding:13px;font-size:15px;font-weight:600;cursor:pointer;font-family:poppins,sans-serif;border:none;transition:background 0.2s;">
        Sign in
      </button>
    </form>

    <p style="margin-top:20px;font-size:13px;color:#80748C;">
      Not a staff member? <a href="http://localhost:8080/login" style="color:#8A038C;font-weight:600;">Student login</a>
    </p>
  </div>
</div>
