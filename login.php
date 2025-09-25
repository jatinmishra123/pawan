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
      min-height: 100vh;
      display: flex;
      flex-direction: column;
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
      margin-top: auto;
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
    }

    @media (max-width: 768px) {
      .social-login {
        flex-direction: column;
      }

      .login-left,
      .login-right {
        padding: 30px 20px;
      }
    }
  </style>
</head>

<body class="index-page">
  <?php include "header.php"; ?>
  <!-- Main Content -->
  <main style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 20px;">
    <div class="login-container">
      <div class="login-left">
        <div class="login-promo">

          <h2 class="fw-bold">Welcome to Pawan PTE</h2>
          <p class="mt-4">
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
        <div class="auth-tabs">
          <div class="auth-tab active" data-tab="login">Login</div>
          <div class="auth-tab" data-tab="register">Register</div>
        </div>

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
            <a href="#" id="forgot-password">Forgot password?</a>
          </div>

          <button type="submit" class="btn-login">Sign In</button>

          <div class="divider">
            <span>Or continue with</span>
          </div>

          <div class="social-login">
            <button type="button" class="social-btn">
              <i class="bi bi-google" style="color: #db4437"></i>
            </button>
            <button type="button" class="social-btn">
              <i class="bi bi-facebook" style="color: #4267b2"></i>
            </button>
            <button type="button" class="social-btn">
              <i class="bi bi-apple" style="color: #000"></i>
            </button>
          </div>
        </form>


        <!-- Registration Form -->
        <form id="register-form" class="auth-form">
          <div class="form-group">
            <label>User Type:</label><br>
            <input type="radio" name="user_type" value="student" checked> Student
          </div>

          <div class="login-header">
            <h2>Create an Account</h2>
            <p>Join us today to start your PTE preparation journey</p>
          </div>

          <div class="alert alert-danger" id="register-error-message">
            <i class="bi bi-exclamation-circle"></i> Please fix the errors
            below
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-icon">
                  <i class="bi bi-person"></i>
                  <input type="text" class="form-control" id="first-name" placeholder="First Name" required />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-icon">
                  <i class="bi bi-person"></i>
                  <input type="text" class="form-control" id="last-name" placeholder="Last Name" required />
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="input-icon">
              <i class="bi bi-envelope"></i>
              <input type="email" class="form-control" id="register-email" placeholder="Email address" required />
            </div>
          </div>
          <div class="form-group">
            <div class="input-icon">
              <i class="bi bi-geo-alt"></i>
              <input type="text" class="form-control" id="register-address" name="address"
                placeholder="Enter your address" required />
            </div>
          </div>
          <div class="form-group">
            <div class="input-icon">
              <i class="bi bi-telephone"></i>
              <input type="tel" class="form-control" id="register-number" name="number"
                placeholder="Enter your phone number" required />
            </div>
          </div>

          <div class="form-group">
            <div class="input-icon">
              <i class="bi bi-lock"></i>
              <input type="password" class="form-control" id="register-password" placeholder="Password" required />
            </div>
          </div>

          <div class="form-group">
            <div class="input-icon">
              <i class="bi bi-lock"></i>
              <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password"
                required />
            </div>
          </div>

          <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="terms" />
            <label class="form-check-label" for="terms">
              I agree to the <a href="#">Terms of Service</a> and
              <a href="#">Privacy Policy</a>
            </label>
          </div>

          <button type="submit" class="btn-login">Create Account</button>
        </form>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer id="footer" class="footer position-relative dark-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index
" class="logo d-flex align-items-center">
            <span class="sitename">Contact</span>
          </a>
          <div class="footer-contact pt-3">
            <p class="mt-3">
              <strong>Phone:</strong> <span>+1 5589 55488 55</span>
            </p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Quick Link</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#">Mock Test</a></li>
            <li><a href="#">Study Tool</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>PTE Course</h4>
          <ul>
            <li><a href="#">Voucher</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Contact</a></li>

          </ul>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>PTE Resources</h4>
          <ul>
            <li><a href="#">Study Materials Download</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>APP Download</h4>
          <ul>
            <li><a href="#">APEUni iOS APP</a></li>
            <li><a href="#">APEUni Android APP</a></li>
          </ul>
        </div>
      </div>
      <div class="container copyright text-center mt-4">
        <p>
          <strong class="px-1 sitename">MyWebsite</strong>
          <span>All Rights Reserved</span>
        </p>
      </div>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // Tab switching
      $('.auth-tab').click(function () {
        const tabName = $(this).data('tab');
        $('.auth-tab').removeClass('active');
        $(this).addClass('active');
        $('.auth-form').removeClass('active');
        $('#' + tabName + '-form').addClass('active');
      });

      // Helper: show error messages
      function showError(element, message) {
        element.html('<i class="bi bi-exclamation-circle"></i> ' + message).show();
        setTimeout(() => element.hide(), 5000);
      }

      // LOGIN
      $('#login-form').submit(function (e) {
        e.preventDefault();

        const email = $('#login-email').val().trim();
        const password = $('#login-password').val();
        const remember = $('#remember').is(':checked');

        if (!email || !password) {
          showError($('#login-error-message'), 'Please fill in all fields');
          return;
        }

        $.ajax({
          url: 'inc/auth.php',
          method: 'POST',
          data: { action: 'login', email, password, remember },
          dataType: 'json',
          success: function (response) {
            if (response.status === 'success') {
              window.location.href = response.redirect;
            } else {
              showError($('#login-error-message'), response.message);
            }
          },
          error: function () {
            showError($('#login-error-message'), 'Server error, please try again.');
          }
        });
      });

      // REGISTER
      $('#register-form').submit(function (e) {
        e.preventDefault();

        const first_name = $('#first-name').val().trim();
        const last_name = $('#last-name').val().trim();
        const email = $('#register-email').val().trim();
        const address = $('#register-address').val().trim();
        const number = $('#register-number').val().trim();
        const password = $('#register-password').val();
        const confirm_password = $('#confirm-password').val();
        const terms = $('#terms').is(':checked');
        const user_type = $('input[name="user_type"]:checked').val() || 'student'; // optional radio/hidden field

        if (!first_name || !last_name || !email || !address || !number || !password || !confirm_password) {
          showError($('#register-error-message'), 'Please fill in all fields');
          return;
        }

        if (!terms) {
          showError($('#register-error-message'), 'You must agree to the terms and conditions');
          return;
        }

        $.ajax({
          url: 'inc/auth.php',
          method: 'POST',
          data: {
            action: 'register',
            first_name,
            last_name,
            email,
            address,
            number,
            password,
            confirm_password,
            user_type
          },
          dataType: 'json',
          success: function (response) {
            if (response.status === 'success') {
              window.location.href = response.redirect;
            } else {
              showError($('#register-error-message'), response.message);
            }
          },
          error: function () {
            showError($('#register-error-message'), 'Server error, please try again.');
          }
        });
      });
    });
  </script>


</body>

</html>