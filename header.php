<header id="header" class="header d-flex align-items-center fixed-top bg-light shadow-sm">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    <a href="index" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="logo" style="max-height:60px;">
    </a>
    <nav id="navmenu" class="navmenu text-bold">
      <ul class="d-flex list-unstyled mb-0 align-items-center">
        <li class="me-3"><a href="index" class="">Home</a></li>
        <li class="me-3">
          <a href="news" id="ptePracticeLink"><span>PTE Practice</span></a>
        </li>
        <li class="me-3"><a href="students-life">Course</a></li>
        <li class="me-3"><a href="news">Circle</a></li>
        <li class="me-3"><a href="alumni">Teacher Mode</a></li>
        <li class="me-3"><a href="login" class="active">Login</a></li>
        <li><a href="login" class="btn-sm active">Sign Up</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>


<!-- Login Warning Modal -->
<div class="modal fade" id="loginWarningModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4 rounded-4 shadow-lg"
      style="border:none; background-color:#fff8f0; max-width: 350px;">
      <div class="modal-body">
        <!-- Warning Icon -->
        <i class="bi bi-exclamation-triangle-fill mb-3" style="font-size: 2.5rem; color: #ff5722;"></i>

        <!-- Title -->
        <h5 class="mb-2" style="color:#d84315; font-weight:600;">Authentication Required</h5>

        <!-- Message -->
        <p class="mb-4" style="color:#5d4037; font-size:0.95rem; margin:0;">
          Login required to access PTE Practice.
        </p>

        <!-- Login Button -->
        <button type="button" class="btn login-btn" id="goToLoginBtn" style="border-radius:25px; font-weight:600; padding:8px 25px; 
                       background: linear-gradient(to right, #ff9800, #ff5722); 
                       color:#fff; border:none; box-shadow:0 4px 8px rgba(255,87,34,0.3); 
                       transition:all 0.3s ease;">
          Login Now
        </button>
      </div>
    </div>
  </div>
</div>

<style>
  /* Button hover effect */
  .login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(255, 87, 34, 0.4);
  }

  /* Smooth scale effect for modal */
  #loginWarningModal .modal-dialog {
    transform: scale(0.85);
    transition: transform 0.2s ease-in-out, opacity 0.2s ease-in-out;
  }

  #loginWarningModal.show .modal-dialog {
    transform: scale(1);
  }
</style>





<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
  // Replace with server-side login check (PHP/Laravel)
  const isLoggedIn = false; // false means user is NOT logged in

  const pteLink = document.getElementById('ptePracticeLink');
  const loginModal = new bootstrap.Modal(document.getElementById('loginWarningModal'));

  pteLink.addEventListener('click', function (e) {
    if (!isLoggedIn) {
      e.preventDefault();
      loginModal.show();
    } else {
      window.location.href = 'news'; // Replace with your PTE Practice page URL
    }
  });

  document.getElementById('goToLoginBtn').addEventListener('click', function () {
    window.location.href = 'login'; // Replace with your login page URL
  });
</script>