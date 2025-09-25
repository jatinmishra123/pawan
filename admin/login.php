<?php
session_start()
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - pawan PTE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
  <link href="assets/css/main.css" rel="stylesheet" />

  <style>
    :root {
      --primary-color: #29d2bf;
      --secondary-color: #2c3e50;
      --accent-color: #ff6b6b;
      --light-bg: #f8f9fa;
      --dark-text: #333;
      --light-text: #6c757d;
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4efe9 100%);
      color: var(--dark-text);
      padding-top: 80px;
      min-height: 100vh;
    }

    /* Header Styles */
    .header {
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      padding: 15px 0;
    }

    .logo {
      text-decoration: none;
      color: var(--secondary-color);
      font-weight: 700;
      font-size: 24px;
    }

    .logo i {
      color: var(--primary-color);
      margin-right: 10px;
    }

    .navmenu ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
    }

    .navmenu li {
      position: relative;
      margin: 0 12px;
    }

    .navmenu a {
      color: var(--dark-text);
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
      padding: 10px 0;
    }

    .navmenu a:hover,
    .navmenu a.active {
      color: var(--primary-color);
    }

    /* Mega dropdown styles */
    .mega-dropdown {
      position: absolute;
      left: -600px;
      top: 140%;
      width: 1300px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      padding: 25px;
      z-index: 1000;
      display: none;
      grid-template-columns: repeat(4, 1fr);
      gap: 5px;
    }

    .navmenu li:hover .mega-dropdown {
      display: grid;
      animation: fadeIn 0.3s ease;
    }

    .mega-dropdown .left-mega-menu {
      width: calc(1000px - 10px);
      margin-left: 10px;
      display: flex;
    }

    .mega-dropdown .right-mega-menu {
      width: calc(300px - 10px);
      margin-left: 10px;
      background-color: #efececff;
      color: #fff;
    }

    .mega-dropdown-column h3 {
      color: var(--secondary-color);
      width: 240px;
      font-size: 18px;
      margin-bottom: 6px;
      padding-bottom: 6px;
      border-bottom: 2px solid var(--primary-color);
    }

    .mega-dropdown-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .mega-dropdown-links li {
      margin-bottom: 0px;
    }

    .mega-dropdown-links a {
      color: var(--dark-text);
      text-decoration: none;
      padding: 8px 0;
      display: block;
      transition: all 0.2s;
      border-radius: 4px;
      padding-left: 10px;
    }

    .mega-dropdown-links a:hover {
      color: var(--primary-color);
      background: var(--light-bg);
      padding-left: 15px;
    }

    .ai-score {
      color: #e74c3c;
      font-weight: 500;
      font-size: 0.85em;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Login Container */
    .login-container {
      max-width: 900px;
      margin: 40px auto;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      display: flex;
    }

    .login-left {
      flex: 1;
      background: linear-gradient(135deg,
          var(--primary-color) 0%,
          var(--secondary-color) 100%);
      color: white;
      padding: 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .login-right {
      flex: 1;
      padding: 50px;
    }

    .login-header h2 {
      font-weight: 700;
      margin-bottom: 15px;
      color: var(--secondary-color);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      padding: 14px 16px;
      border-radius: 8px;
      border: 1px solid #ddd;
      font-size: 16px;
      transition: all 0.3s;
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(41, 210, 191, 0.2);
    }

    .input-icon {
      position: relative;
    }

    .input-icon i {
      position: absolute;
      left: 15px;
      top: 14px;
      color: var(--light-text);
    }

    .input-icon input {
      padding-left: 45px;
      width: 100%;
    }

    .btn-login {
      background: linear-gradient(135deg,
          var(--primary-color) 0%,
          var(--secondary-color) 100%);
      color: white;
      border: none;
      padding: 14px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      width: 100%;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(41, 210, 191, 0.4);
    }

    .divider {
      display: flex;
      align-items: center;
      margin: 25px 0;
    }

    .divider::before,
    .divider::after {
      content: "";
      flex: 1;
      border-bottom: 1px solid #ddd;
    }

    .divider span {
      padding: 0 15px;
      color: var(--light-text);
      font-size: 14px;
    }

    .social-login {
      display: flex;
      gap: 15px;
      margin-bottom: 25px;
    }

    .social-btn {
      flex: 1;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ddd;
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s;
    }

    .social-btn:hover {
      background: var(--light-bg);
    }

    .social-btn i {
      font-size: 18px;
    }

    .login-footer {
      text-align: center;
      margin-top: 20px;
    }

    .login-footer a {
      color: var(--primary-color);
      text-decoration: none;
      transition: all 0.3s;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }

    .checkbox-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .form-check-input:checked {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .alert {
      padding: 12px 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      display: none;
    }

    .alert-danger {
      background-color: #ffebee;
      color: #d32f2f;
      border: 1px solid #ffcdd2;
    }

    /* Footer Styles */
    .footer {
      background: var(--secondary-color);
      color: white;
      padding: 50px 0 20px;
      margin-top: 60px;
    }

    .footer-about .logo {
      color: white;
      font-size: 24px;
      margin-bottom: 15px;
      display: inline-block;
    }

    .footer-links h4 {
      color: white;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .footer-links ul {
      list-style: none;
      padding: 0;
    }

    .footer-links li {
      margin-bottom: 10px;
      position: relative;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.8);
      text-decoration: none;
      transition: 0.3s;
      display: block;
      padding: 5px 0;
    }

    .footer-links a:hover {
      color: var(--primary-color);
      padding-left: 5px;
    }

    .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      color: white;
      margin-right: 10px;
      transition: 0.3s;
    }

    .social-links a:hover {
      background: var(--primary-color);
    }

    .copyright {
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding-top: 20px;
      margin-top: 30px;
      text-align: center;
    }

    /* Tabs for Login/Register */
    .auth-tabs {
      display: flex;
      margin-bottom: 25px;
      border-bottom: 1px solid #ddd;
    }

    .auth-tab {
      padding: 12px 25px;
      cursor: pointer;
      font-weight: 600;
      color: var(--light-text);
      border-bottom: 3px solid transparent;
    }

    .auth-tab.active {
      color: var(--primary-color);
      border-bottom: 3px solid var(--primary-color);
    }

    .auth-form {
      display: none;
    }

    .auth-form.active {
      display: block;
    }

    @media (max-width: 992px) {
      .login-container {
        flex-direction: column;
        max-width: 500px;
      }

      .login-left {
        padding: 30px;
      }

      .mega-dropdown {
        width: 700px;
        grid-template-columns: repeat(2, 1fr);
        left: -100px;
      }
    }

    @media (max-width: 768px) {
      .social-login {
        flex-direction: column;
      }

      .login-left,
      .login-right {
        padding: 30px 20px;
      }

      .mega-dropdown {
        width: 300px;
        grid-template-columns: 1fr;
        left: -50px;
      }

      .navmenu ul {
        flex-direction: column;
        align-items: center;
      }

      .navmenu li {
        margin: 5px 0;
        width: 100%;
        text-align: center;
      }
    }
  </style>
</head>

<body class="index-page">
  <!-- Main Content -->
  <main>
    <div class="login-container">
      <div class="login-left">
        <div class="login-promo">
          <h2>Welcome to Admin</h2>
          <p>
            Join thousands of students who have improved their PTE scores with
            our AI-powered platform.
          </p>
          <ul class="mt-4">
            <li>AI-powered scoring</li>
            <li>Personalized feedback</li>
            <li>Comprehensive practice materials</li>
            <li>Expert instructors</li>
          </ul>
        </div>
      </div>

      <div class="login-right">
        <!-- Login Form -->
        <form id="login-form" class="auth-form active">
          <div class="login-header">
            <h2>Sign In to Your Account</h2>
            <p>Enter your credentials to access your dashboard</p>
          </div>

          <div class="alert alert-danger" id="login-error-message">
            <i class="bi bi-exclamation-circle"></i> Invalid email or password
          </div>

          <div class="form-group">
            <div class="input-icon">
              <i class="bi bi-envelope"></i>
              <input type="email" class="form-control" id="login-email" placeholder="Email address" required />
            </div>
          </div>

          <div class="form-group">
            <div class="input-icon">
              <i class="bi bi-lock"></i>
              <input type="password" class="form-control" id="login-password" placeholder="Password" required />
            </div>
          </div>

          <div class="checkbox-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember" />
              <label class="form-check-label" for="remember">Remember me</label>
            </div>
          </div>

          <button type="submit" class="btn-login">Sign In</button>


      </div>
      </form>
    </div>
    </div>
  </main>

  <!-- Footer -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // Helper: show error messages
      function showError(element, message) {
        element
          .html('<i class="bi bi-exclamation-circle"></i> ' + message)
          .fadeIn();
        setTimeout(() => element.fadeOut(), 5000);
      }

      // LOGIN
      $('#login-form').on('submit', function (e) {
        e.preventDefault();

        const email = $('#login-email').val().trim();
        const password = $('#login-password').val();
        const remember = $('#remember').is(':checked');
        const $btn = $('.btn-login');
        const $errorBox = $('#login-error-message');

        if (!email || !password) {
          showError($errorBox, 'Please fill in all fields');
          return;
        }

        // disable button & show loading
        $btn.prop('disabled', true).text('Signing in...');

        $.ajax({
          url: 'inc/auth_check.php',
          method: 'POST',
          data: { action: 'login', email, password, remember },
          dataType: 'json',
          success: function (response) {
            if (response.status === 'success') {
              window.location.href = response.redirect;
            } else {
              showError($errorBox, response.message || 'Invalid credentials');
            }
          },
          error: function (xhr, status, error) {
            console.log("AJAX Error:", status, error);
            showError($errorBox, 'Server error, please try again.');
          },
          complete: function () {
            // re-enable button
            $btn.prop('disabled', false).text('Sign In');
          }
        });
      });

      // Allow pressing Enter key to submit
      $('#login-email, #login-password').keypress(function (e) {
        if (e.which === 13) {
          $('#login-form').submit();
        }
      });
    });
  </script>

</body>

</html>