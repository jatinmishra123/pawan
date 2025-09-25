<!DOCTYPE html>

<html lang="en">



<head>


  <meta charset="utf-8" />


  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Text-to-Speech Practice - NiceSchool</title>


  <meta name="description" content="Practice English pronunciation with our AI-powered text-to-speech tool" />


  <meta name="keywords" content="text to speech, english pronunciation, practice, AI speech" />




  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />


  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    /* Your CSS styles here (same as before) */

    body {

      font-family: 'Poppins', sans-serif;

      padding-top: 76px;

      background-color: #a4c9edff !important;
    }

    a {
      text-decoration: none !important;
    }

    header#header {
      background-color: white !important;
    }

    .tts-section {
      padding: 60px 0;
      background-color: #f8f9fa;
    }

    .practice-card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      padding: 30px;
      margin-bottom: 30px;
    }

    .score-display {
      font-size: 2.5rem;
      font-weight: bold;
      color: #0d6efd;
      text-align: center;
      margin: 20px 0;
    }

    .text-input-area {
      margin: 20px 0;
    }

    .btn-speak {
      padding: 12px 30px;
      font-size: 1.0rem;
      border-radius: 50px;
      display: block;
      margin: 20px auto;
      transition: all 0.3s;
    }

    .speaking {
      animation: pulse 1.5s infinite;
      background-color: #198754;
      border-color: #198754;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.05);
      }

      100% {
        transform: scale(1);
      }
    }

    .feedback-area {
      margin-top: 20px;
      padding: 15px;
      border-radius: 8px;
      background-color: #f8f9fa;
    }

    .correct {
      color: #198754;
    }

    .incorrect {
      color: #dc3545;
    }

    .text-display {
      font-size: 1.5rem;
      text-align: center;
      margin: 20px 0;
      padding: 15px;
      background-color: #f0f8ff;
      border-radius: 8px;
      border-left: 4px solid #0d6efd;
      min-height: 100px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Modal Styles */
    .modal-content {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .modal-body {
      padding: 25px;
      max-height: 60vh;
      overflow-y: auto;
    }

    .test-item {
      padding: 15px;
      margin: 10px 0;
      background: #f8f9fa;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s;
      border: 1px solid #e9ecef;
    }

    .test-item:hover {
      background: #e9ecef;
      transform: translateX(5px);
    }

    .test-item.selected {
      background: #0d6efd;
      color: white;
      border-color: #0d6efd;
    }

    .category-title {
      font-weight: 600;
      margin: 20px 0 15px;
      padding-bottom: 8px;
      border-bottom: 2px solid #e9ecef;
      color: #495057;
    }

    .toggle-selector {
      position: fixed;
      right: 20px;
      top: 70%;
      transform: translateY(-50%);
      z-index: 1001;
      background: #12d3bf;
      color: white;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      font-size: 24px;
    }

    .toggle-selector::after {
      content: '→';
      display: block;
      color: white;
      font-weight: bold;
    }

    .search-box {
      position: relative;
    }

    .search-box i {
      position: absolute;
      left: 15px;
      top: 12px;
      color: #6c757d;
    }

    .search-box input {
      padding-left: 40px;
      border-radius: 50px;
      border: 1px solid #ced4da;
    }

    /* Added styles for functionality */
    .text-display-area {
      border: 1px dotted #000;
      min-height: 150px;
      padding: 15px;
      margin-bottom: 20px;
      background-color: white;
    }

    .microphone-permission {
      background-color: #FF6666;
      height: 150px;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
    }

    .timer {
      font-size: 1.2rem;
      font-weight: bold;
      color: #dc3545;
    }

    .btn-disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }

    /* Header styles */
    .header {
      background: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .page-title {
      padding: 80px 0 60px;
      background-size: cover;
      background-position: center;
      color: white;
      text-align: center;
      position: relative;
    }

    .page-title::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.6);
    }

    .page-title .container {
      position: relative;
      z-index: 1;
    }

    /* Footer styles */
    .footer {
      background: #343a40;
      color: white;
      padding: 60px 0 30px;
    }

    .footer a:hover {
      color: white;
    }

    .social-links a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      margin-right: 10px;
    }

    /* SMS Notification Styles */
    .sms-container {
      position: fixed;
      top: 100px;
      right: 20px;
      width: 320px;
      z-index: 9999;
    }

    .sms-message {
      background: white;
      border-radius: 18px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 12px 16px;
      margin-bottom: 12px;
      animation: slideIn 0.3s ease-out;
      border: 1px solid #e5e5e5;
      position: relative;
      max-width: 280px;
      margin-left: auto;
    }

    .sms-message.info {
      background: #d1ecf1;
      border-color: #bee5eb;
    }

    .sms-message.warning {
      background: #fff3cd;
      border-color: #ffeaa7;
    }

    .sms-message.success {
      background: #d4edda;
      border-color: #c3e6cb;
    }

    .sms-message.error {
      background: #f8d7da;
      border-color: #f5c6cb;
    }

    .sms-content {
      font-size: 14px;
      line-height: 1.4;
      color: #333;
    }

    .sms-time {
      font-size: 11px;
      color: #6c757d;
      text-align: right;
      margin-top: 4px;
    }

    .sms-close {
      position: absolute;
      top: 8px;
      right: 8px;
      background: none;
      border: none;
      font-size: 14px;
      cursor: pointer;
      color: #6c757d;
      padding: 0;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
    }

    .sms-close:hover {
      background: rgba(0, 0, 0, 0.1);
    }

    @keyframes slideIn {
      from {
        transform: translateX(100%);
        opacity: 0;
      }

      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    /* Text input area */
    .text-input-container {
      margin-top: 20px;
      padding: 15px;
      background: #f8f9fa;
      border-radius: 8px;
    }

    .speak-text-btn {
      margin-top: 15px;
    }

    /* Loading indicator */
    .loading {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    /* Fix for modal backdrop issue */
    body.modal-open {
      overflow: hidden;
      padding-right: 0 !important;
    }

    /* Improved button states */
    .btn:disabled {
      cursor: not-allowed;
      opacity: 0.65;
    }

    /* Improved text display */
    .text-display-area {
      transition: all 0.3s ease;
    }

    .text-display-area.highlight {
      background-color: #fff3cd;
      border-color: #ffeaa7;
    }

    /* Practice history styles */
    .history-item {
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      background-color: #f8f9fa;
    }

    /* Speed score indicator */
    .speed-score {
      font-size: 1rem;
      color: #6c757d;
      margin-top: 10px;
    }

    .speed-feedback {
      margin-top: 5px;
      font-style: italic;
    }

    /* Modal styles */
    .modal-body {
      padding: 20px;
    }

    .test-item {
      padding: 12px 15px;
      margin: 8px 0;
      background: #f8f9fa;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s;
      border: 1px solid #e9ecef;
    }

    .test-item:hover {
      background: #e9ecef;
      transform: translateX(5px);
    }

    .test-item.selected {
      background: #0d6efd;
      color: white;
      border-color: #0d6efd;
    }

    .category-title {
      font-weight: 600;
      margin: 20px 0 10px;
      padding-bottom: 5px;
      border-bottom: 2px solid #e9ecef;
      color: #495057;
      font-size: 1.1rem;
    }

    .search-box {
      position: relative;
    }

    .search-box i {
      position: absolute;
      left: 12px;
      top: 10px;
      color: #6c757d;
    }

    .search-box input {
      padding-left: 35px;
      border-radius: 20px;
    }

    #testsContainer {
      padding-right: 5px;
    }

    #testsContainer::-webkit-scrollbar {
      width: 6px;
    }

    #testsContainer::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }

    #testsContainer::-webkit-scrollbar-thumb {
      background: #c1c1c1;
      border-radius: 10px;
    }

    #testsContainer::-webkit-scrollbar-thumb:hover {
      background: #a8a8a8;
    }

    /* New styles for improved UX */
    #recordBtn {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background-color: #0d6efd;
      color: white;
      border: none;
      font-size: 1.2rem;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
    }

    #recordBtn:hover {
      background-color: #0a58ca;
      transform: scale(1.05);
    }

    #recordBtn:active {
      transform: scale(1);
    }

    #recordBtn.recording {
      background-color: #dc3545;
      animation: pulse-red 1.5s infinite;
    }

    @keyframes pulse-red {
      0% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.1);
      }

      100% {
        transform: scale(1);
      }
    }

    .submit-floating-btn {
      position: fixed;
      bottom: 50%;
      left: 50%;
      transform: translate(-50%, 50%);
      z-index: 1000;
    }

    .feedback-comparison {
      display: flex;
      justify-content: space-around;
      margin-top: 20px;
      gap: 20px;
    }

    .feedback-column {
      flex: 1;
      background-color: #f0f8ff;
      padding: 15px;
      border-radius: 8px;
      border-left: 4px solid #0d6efd;
    }

    .feedback-column.user-speech {
      border-left-color: #198754;
    }

    .correct-word {
      color: green;
      font-weight: bold;
    }

    .incorrect-word {
      color: red;
      font-weight: bold;
    }

    .correct-word-user {
      color: green;
    }

    .incorrect-word-user {
      color: red;
    }
  </style>
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;0,900&display=swap"
    rel="stylesheet" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/css/main.css" rel="stylesheet" />
</head>

<body class="contact-page">
  <header id="header" class="header d-flex align-items-center fixed-top bg-light -sm">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="logo" style="max-height:60px;">
      </a>
      <nav id="navmenu" class="navmenu text-bold">
        <ul class="d-flex list-unstyled mb-0 align-items-center">
          <li class="me-3"><a href="alumni" class="">Home</a></li>
          <nav id="navmenu" class="navmenu text-bold">
            <ul class="d-flex list-unstyled mb-0 align-items-center">
              <li class="nav-item dropdown me-3">
                <a class="nav-link dropdown-toggle" href="#" id="ptePracticeLink" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  PTE Practice
                </a>
                <ul class="dropdown-menu border-0 shadow-lg rounded-3 p-2" aria-labelledby="ptePracticeLink">
                  <li><a class="dropdown-item" href="news">Read Aloud <span class="badge bg-danger">AI Score</span></a>
                  </li>
                  <li><a class="dropdown-item" href="news2">Repeat Sentence <span class="badge bg-danger">AI
                        Score</span></a></li>
                  <li><a class="dropdown-item" href="#">Describe Image <span class="badge bg-danger">AI Score</span></a>
                  </li>
                </ul>
              </li>

              <li class="me-3"><a href="#">Mock Test</a></li>
              <li class="me-3"><a href="#">Study Tools</a></li>
              <li class="me-3"><a href="#">PTE Voucher</a></li>
              <li class="me-3"><a href="#">Business</a></li>
              <li class="me-3"><a href="contact">Contact-Us</a></li>

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

          <style>
            /* CSS for dropdown menu on hover */
            .nav-item.dropdown .dropdown-menu {
              display: none;
            }

            .nav-item.dropdown:hover .dropdown-menu {
              display: block;
            }

            .dropdown-menu .dropdown-item {
              font-size: 1rem;
              padding: 5px 1rem;
              color: #212529;
            }

            .dropdown-menu .dropdown-item:hover {
              background-color: #839cb6ff;
              color: #000;
            }

            .dropdown-menu .row {
              margin: 0;
            }

            .dropdown-menu .col-md-2,
            .dropdown-menu .col-md-4 {
              padding: 0 1rem;
            }

            .badge {
              vertical-align: text-top;
            }
          </style>
          <!-- <li class="me-3"><a href="students-life">Exam Vouchers</a></li>
          <li class="me-3"><a href="news">Study Tools</a></li>
          <li class="me-3"><a href="alumni">Guides</a></li> -->
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
  <div class="sms-container" id="smsContainer"></div>
  <main class="main">
    <div class="page-title dark-background" style="background-color: rgba(87, 197, 214, 0.1)">
      <div class="container position-relative mb-5">
        <h1 class="text-info">Text-to-Speech Practice</h1>
        <p class="text-info">
          Improve your English pronunciation with our AI-powered text-to-speech tool.
        </p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="alumni">Home</a></li>
            <li class="current text-info">TTS Practice</li>
          </ol>
        </nav>
      </div>
    </div>
    <section>
      <section class="pt-4">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="sd-card" role="region" aria-label="Stage Goal tip"
                style="background: white; border-radius: 10px; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                <div class="d-flex align-items-center width">
                  <div class="sd-icon me-3" aria-hidden="true">
                    <svg fill="none" width="28" height="28" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient id="benefit8_grad" x1="0.5" y1="0" x2="0.5" y2="1">
                          <stop offset="0%" stop-color="#E7B380"></stop>
                          <stop offset="100%" stop-color="#DA9059"></stop>
                        </linearGradient>
                      </defs>
                      <g>
                        <path
                          d="M27.678 5.656l-3.444 3.43h-3.99l-.63.630-2.394 2.380-1.484 1.484-1.26 1.26a.929.929 0 01-.7.280.924.924 0 01-.686-.308c-.364-.378-.322-.994.056-1.372l2.506-2.506-.196-.196-2.408-2.394-.644-.644V3.752l-1.19-1.19-2.254-2.24c-.028-.028-.056-.056-.098-.084l-.028-.014c-.028-.028-.07-.042-.098-.056h-.014a.683.683 0 01-.098-.042l-.028-.014c-.028-.014-.07-.014-.098-.028h-.014c-.028 0-.056.014-.084.014h-.028c-.028.014-.07.014-.098.028h-.014l-.084.042-.028.014c-.028.014-.056.042-.084.056l-.014.014c-.028.014-.042.042-.07.056l-.014.014c-.028.028-.042.056-.07.084q-.014.028 0 0c-.014.028-.042.056-.056.084 0 .014-.014.014-.014.028-.014.028-.028.07-.042.098-.014.028-.014.07-.028.112v.028c0 .042-.014.084-.014.126l-.07 3.22h-.070l-3.164.070a.886.886 0 01-.574.238c-.056.056-.112.126-.154.196-.042.070-.07.14-.084.224-.042.322.042.63.252.84zM13.622 6.818c-4.214 0-7.644 3.416-7.644 7.616 0 4.200 3.430 7.616 7.644 7.616s7.644-3.416 7.644-7.616a7.482 7.482 0 00-.588-2.926l-2.758 2.758v.168a4.281 4.281 0 01-4.284 4.312 4.302 4.302 0 01-4.326-4.284 4.3 4.3 0 014.270-4.326l2.814-2.800a7.22 7.22 0 00-2.772-.518zm12.040 3.696a2.024 2.024 0 01-1.428.588h-1.54a9.672 9.672 0 01.602 3.332c0 5.306-4.340 9.632-9.674 9.632s-9.674-4.326-9.674-9.632 4.34-9.632 9.674-9.632a9.55 9.55 0 013.248.56v-1.61c0-.532.21-1.05.588-1.428l.644-.63a13.562 13.562 0 00-4.48-.756C6.146.938.07 6.986.07 14.434S6.146 27.93 13.608 27.93c7.462 0 13.552-6.048 13.552-13.496 0-1.568-.28-3.122-.812-4.606l-.686.686z"
                          fill="url(#benefit8_grad)"></path>
                      </g>
                    </svg>
                  </div>
                  <div class="sd-grow flex-grow-1">
                    <div class="sd-title fw-bold">Stage Goal
                    </div>
                    <p class="sd-desc mb-0">Ask the teacher for your current stage goal to clarify
                      your current learning priorities and methods.</p>
                  </div>
                  <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-sm btn-outline-danger sd-cta" id="askStageBtn">Ask Now</button>
                    <button type="button" class="btn p-0 sd-close" aria-label="Close tip" id="closeTipBtn">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mt-5">
              <div class="row">
                <div class="col-sm-1">
                  <img src="https://dl26yht2ovo33.cloudfront.net/public/admin/practice_assets/q_images/ra_s_ai.png"
                    width="68" height="68" alt="Practice Icon">
                </div>
                <div class="col-sm-11">
                  <div class="sd-1">
                    <h4 class="sd-title1"><b>Read Aloud
                      </b><button type="button" class="btn btn-sm btn-info text-light" id="studyGuideBtn"><i
                          class="bi bi-mortarboard" style="margin-right:10px;"></i>Study Guide</button></h4>
                    <p class="sd-desc1 mb-0">Look at the text below. In 40 seconds, you must read
                      this text aloud as naturally and clearly as possible. You have 40 seconds to
                      read aloud.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mt-3">
              <hr>
            </div>
          </div>
        </div>
      </section>
      <section id="tts" class="tts-section" style="background-color:#FAFAFA;">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <p class="mb-4">Practice Your Pronunciation <button class="btn btn-info btn-sm text-light"
                  id="shadowBtn">Shadow</button>
              </p>
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-info btn-sm text-light float-end" data-bs-toggle="modal"
                data-bs-target="#examInfoModal">
                Tested(<span id="testedCount">0</span>)
              </button>
            </div>
            <div class="col-md-12">
              <p class="timer" id="timer">Time: 00:40</p>

              <div class="text-display-area mb-3" id="textDisplay">
                Select a text from the right panel to begin practice.
              </div>

              <div class="d-flex justify-content-end" id="submitFloatingBtn" style="display: none;">
                <button class="btn btn-outline-info" id="submitBtn">Submit Score</button>
              </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
              <button class="btn btn-primary rounded-circle p-4 shadow" id="recordBtn" disabled>
                <i class="bi bi-mic-fill" style="font-size: 2rem;"></i>
                <span id="recordBtnText">Speak</span>
              </button>
            </div>

            <div class="col-md-12 text-input-container">
              <div class="row">
                <!-- <div>
                  <label for="customTextInput" class="form-label">Or enter your own text:</label>
                  <textarea class="form-control" id="customTextInput" rows="3"
                    placeholder="Type your text here..."></textarea>
                </div> -->
              </div>
              <div class="align-items-end ">
                <button class="btn btn-info btn-sm text-light speak-text-btn" id="speakTextBtn">
                  <i class="bi bi-play-circle"></i> Speak Text
                </button>
              </div>
            </div>
            <div class="col-md-12 mt-5" id="microphonePermissionBox" style="display: none;">
              <div class="microphone-permission">
                <p class="text-center">Microphone permission is not granted.</p>
                <button class="btn btn-outline-light btn-sm" id="microphoneHelpBtn">Help</button>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-sm-8">
                  <div class="multi-btn">
                    <button class="btn btn-sm btn-outline-primary" id="redoBtn">Re-do</button>
                    <button class="btn btn-sm btn-outline-info" id="translationBtn">
                      <i class="bi bi-translate"></i> Translation
                    </button>
                    <button class="btn btn-sm btn-outline-info" id="zenPracticeBtn">
                      <i class="bi bi-pencil" style="margin-right:5px;"></i>Zen Practice
                    </button>
                    <button class="btn btn-sm btn-outline-info" id="shadowingBtn">
                      <i class="bi bi-mic-fill"></i> Shadowing
                    </button>
                    <button class="btn btn-sm btn-outline-info" id="oneLineModeBtn">
                      <i class="bi bi-chat-right-dots" style="margin-right:5px;"></i>One Line Mode
                    </button>
                    <br><br>
                    <div class="input-group" style="width:300px; display:inline-flex; vertical-align:middle;">
                      <input type="text" class="form-control" id="questionSearch" placeholder="Question Co...">
                      <button class="btn btn-outline-info" id="searchBtn">Search</button>
                    </div>
                    <button class="btn btn-outline-secondary ms-2" id="prevBtn" disabled>Previous</button>
                    <button class="btn btn-outline-info ms-2" id="nextBtn">Next</button>
                  </div>
                </div>
                <div class="col-sm-4"></div>
              </div>
            </div>
            <div class="col-md-12 mt-5">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="discussion-tab" data-bs-toggle="tab" data-bs-target="#discussion"
                    type="button" role="tab">Discussion</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="board-tab" data-bs-toggle="tab" data-bs-target="#board" type="button"
                    role="tab">Board</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="me-tab" data-bs-toggle="tab" data-bs-target="#me" type="button"
                    role="tab">Me</button>
                </li>
              </ul>
              <div class="tab-content border border-top-0 p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="discussion" role="tabpanel">
                  <h5>Discussion Content</h5>
                  <p>Here is the discussion area with messages.</p>
                </div>
                <div class="tab-pane fade" id="board" role="tabpanel">
                  <h5>Board Content</h5>
                  <p>Here is the board area.</p>
                </div>
                <div class="tab-pane fade" id="me" role="tabpanel">
                  <h5>Your Practice History</h5>
                  <div id="practiceHistory">
                    <p>Your practice history will appear here.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="toggle-selector" id="toggleSelector" data-bs-toggle="modal" data-bs-target="#testSelectorModal">
      </div>
  </main>
  <div class="modal fade" id="examInfoModal" tabindex="-1" aria-labelledby="examInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="examInfoModalLabel">Confirm exam information</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="examInfoForm">
            <div class="mb-3">
              <label for="examdate" class="form-label">Exam Date <span class="text-danger">(required)</span></label>
              <input type="date" class="form-control" id="examdate" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Exam Type <span class="text-danger">(required)</span></label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="examtype" id="pteaukvi" value="PTEA/UKVI" required>
                <label class="form-check-label" for="pteaukvi">PTEA / UKVI</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="examtype" id="ptecore" value="PTE Core">
                <label class="form-check-label" for="ptecore">PTE Core</label>
              </div>
            </div>
            <div class="mb-3">
              <label for="examinfo" class="form-label">More information</label>
              <textarea class="form-control" id="examinfo" rows="3"
                placeholder="Please share more information with us"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-info text-light" id="confirmExamBtn">Confirm</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="scoreReportModal" tabindex="-1" aria-labelledby="scoreReportModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="scoreReportModalLabel">
            <i class="bi bi-clipboard-data-fill me-2"></i>Practice Report
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="scoreReportContainer"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="testSelectorModal" tabindex="-1" aria-labelledby="testSelectorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="testSelectorModalLabel">
            <i class="bi bi-card-text me-2"></i>Read Aloud
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div class="filter-bar bg-light p-3 border-bottom">
            <div class="d-flex flex-wrap gap-3 align-items-center">
              <div class="filter-item">
                <span class="filter-label fw-medium text-dark">All</span>
                <select class="form-select form-select-sm">
                  <option selected>Core P</option>
                  <option>Core A</option>
                  <option>Core B</option>
                </select>
              </div>
              <div class="filter-item">
                <span class="filter-label fw-medium text-dark">New 1L</span>
                <select class="form-select form-select-sm">
                  <option selected>Mark ▼</option>
                  <option>Important</option>
                  <option>Reviewed</option>
                </select>
              </div>
              <div class="filter-item">
                <span class="filter-label fw-medium text-dark">Prac Status ▼</span>
                <select class="form-select form-select-sm">
                  <option selected>All</option>
                  <option>Practiced</option>
                  <option>Not Practiced</option>
                </select>
              </div>
              <div class="filter-item">
                <span class="filter-label fw-medium text-dark">Shadowing ▼</span>
                <select class="form-select form-select-sm">
                  <option selected>All</option>
                  <option>With Shadowing</option>
                  <option>Without Shadowing</option>
                </select>
              </div>
              <div class="search-box ms-auto">
                <div class="input-group input-group-sm" style="width: 200px;">
                  <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search text-muted"></i>
                  </span>
                  <input type="text" class="form-control border-start-0 mb-9" placeholder="Search questions...">
                </div>
              </div>
            </div>
          </div>
          <div class="questions-info px-3 py-2 bg-light border-bottom">
            <small class="text-muted">Done 532, Found 1436 Questions</small>
          </div>
          <div id="testsContainer" style="max-height: 300px; overflow-y: auto; margin-left:30px;">
            <div class="question-item" data-id="338">
              <div class="question-info">
                <span class="question-number text-primary fw-bold">#338</span>
                <div class="question-title fw-medium">Parent Teacher Conferences</div>
              </div>
              <div class="question-actions">
                <span class="question-price text-success fw-bold">$838</span>
                <button class="btn btn-sm btn-outline-secondary btn-shadow">Shadow</button>
              </div>
            </div>
            <div class="question-item" data-id="1445">
              <div class="question-info">
                <span class="question-number text-primary fw-bold">#1445</span>
                <div class="question-title fw-medium">Diapers</div>
              </div>
              <div class="question-actions">
                <span class="question-price text-success fw-bold">$1445</span>
                <button class="btn btn-sm btn-outline-secondary btn-shadow">Shadow</button>
              </div>
            </div>
            <div class="question-item" data-id="1444">
              <div class="question-info">
                <span class="question-number text-primary fw-bold">#1444</span>
                <div class="question-title fw-medium">Reptiles</div>
              </div>
              <div class="question-actions">
                <span class="question-price text-success fw-bold">$1444</span>
                <button class="btn btn-sm btn-outline-secondary btn-shadow">Shadow</button>
              </div>
            </div>
            <div class="question-item" data-id="1443">
              <div class="question-info">
                <span class="question-number text-primary fw-bold">#1443</span>
                <div class="question-title fw-medium">Extracting Carbon Dioxide</div>
              </div>
              <div class="question-actions">
                <span class="question-price text-success fw-bold">$1443</span>
                <button class="btn btn-sm btn-outline-secondary btn-shadow">Shadow</button>
              </div>
            </div>
            <div class="question-item" data-id="1442">
              <div class="question-info">
                <span class="question-number text-primary fw-bold">#1442</span>
                <div class="question-title fw-medium">Himalayan Glaciers</div>
              </div>
              <div class="question-actions">
                <span class="question-price text-success fw-bold">$1442</span>
                <button class="btn btn-sm btn-outline-secondary btn-shadow">Shadow</button>
              </div>
            </div>
            <div class="question-item" data-id="1441">
              <div class="question-info">
                <span class="question-number text-primary fw-bold">#1441</span>
                <div class="question-title fw-medium">Blood Pressure</div>
              </div>
              <div class="question-actions">
                <span class="question-price text-success fw-bold">$1441</span>
                <button class="btn btn-sm btn-outline-secondary btn-shadow">Shadow</button>
              </div>
            </div>
            <div class="question-item" data-id="1440">
              <div class="question-info">
                <span class="question-number text-primary fw-bold">#1440</span>
                <div class="question-title fw-medium">The Solar System</div>
              </div>
              <div class="question-actions">
                <span class="question-price text-success fw-bold">$1440</span>
                <button class="btn btn-sm btn-outline-secondary btn-shadow">Shadow</button>
              </div>
            </div>
            <div class="question-item" data-id="1439">
              <div class="question-info">
                <span class="question-number text-primary fw-bold">#1439</span>
                <div class="question-title fw-medium">Global Warming</div>
              </div>
              <div class="question-actions">
                <span class="question-price text-success fw-bold">$1439</span>
                <button class="btn btn-sm btn-outline-secondary btn-shadow">Shadow</button>
              </div>
            </div>
          </div>
          <div class="reset-section bg-light p-3 border-top">
            <h6 class="reset-title fw-bold mb-3">Reset Prac Status</h6>
            <div class="reset-item d-flex justify-content-between align-items-center mb-2">
              <span class="reset-text text-muted">Practice * 104</span>
              <button class="btn btn-sm btn-outline-primary">Practice</button>
            </div>
            <div class="reset-item d-flex justify-content-between align-items-center mb-2">
              <span class="reset-text text-muted">Practice * 49</span>
              <button class="btn btn-sm btn-outline-primary">Practice</button>
            </div>
            <div class="reset-item d-flex justify-content-between align-items-center mb-2">
              <span class="reset-text text-muted">Practice * 33</span>
              <button class="btn btn-sm btn-outline-primary">Practice</button>
            </div>
            <div class="reset-item d-flex justify-content-between align-items-center mb-2">
              <span class="reset-text text-muted">Practice * 40</span>
              <button class="btn btn-sm btn-outline-primary">Practice</button>
            </div>
            <div class="reset-item d-flex justify-content-between align-items-center mb-2">
              <span class="reset-text text-muted">Practice * 49</span>
              <button class="btn btn-sm btn-outline-primary">Practice</button>
            </div>
            <div class="reset-item d-flex justify-content-between align-items-center">
              <span class="reset-text text-muted">Practice * 29</span>
              <button class="btn btn-sm btn-outline-primary">Practice</button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-info" id="applyTestBtn">Apply Selected</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // --- State Variables ---
      let currentText = "";
      let userRecordingBlob = null;
      let userSpeechResult = "";
      let userTimeTaken = 0;
      let recognition = null;
      let isRecording = false;
      let microphonePermissionGranted = false;
      let timerInterval = null;
      let timeLeft = 40;
      let practiceStartTime = null;
      let currentQuestionId = null;
      let allTestItems = [];
      let selectedQuestion = null;
      let isShadowing = false;
      let mediaRecorder;
      let audioChunks = [];

      const dummyQuestions = {
        "338": "Parent teacher i am jatin mishra Can you upload the image again here so I can extract and give you the clean text?.",
        "1445": "Diapers are essential for infant hygiene and care, providing comfort and convenience for parents.",
        "1444": "Reptiles are a class of cold-blooded vertebrates, including snakes, lizards, and turtles.",
        "1443": "Extracting carbon dioxide from the atmosphere is a crucial step in combating climate change.",
        "1442": "Himalayan glaciers are melting at an alarming rate, threatening the water supply for millions.",
        "1441": "Blood pressure is the force of blood pushing against the walls of the arteries during each heartbeat.",
        "1440": "The solar system is a vast and fascinating place, consisting of our Sun, eight planets, and countless other celestial objects.",
        "1439": "Global warming refers to the long-term rise in Earth's average temperature due to the increased concentration of greenhouse gases in the atmosphere."
      };

      // --- DOM Elements ---
      const textDisplay = document.getElementById("textDisplay");
      const timer = document.getElementById("timer");
      const microphonePermissionBox = document.getElementById("microphonePermissionBox");
      const microphoneHelpBtn = document.getElementById("microphoneHelpBtn");
      const redoBtn = document.getElementById("redoBtn");
      const translationBtn = document.getElementById("translationBtn");
      const zenPracticeBtn = document.getElementById("zenPracticeBtn");
      const shadowingBtn = document.getElementById("shadowingBtn");
      const oneLineModeBtn = document.getElementById("oneLineModeBtn");
      const prevBtn = document.getElementById("prevBtn");
      const nextBtn = document.getElementById("nextBtn");
      const questionSearch = document.getElementById("questionSearch");
      const speakTextBtn = document.getElementById("speakTextBtn");
      const customTextInput = document.getElementById("customTextInput");
      const smsContainer = document.getElementById("smsContainer");
      const practiceHistory = document.getElementById("practiceHistory");
      const testedCount = document.getElementById("testedCount");
      const askStageBtn = document.getElementById("askStageBtn");
      const closeTipBtn = document.getElementById("closeTipBtn");
      const studyGuideBtn = document.getElementById("studyGuideBtn");
      const shadowBtn = document.getElementById("shadowBtn");
      const testSelectorModal = new bootstrap.Modal(document.getElementById("testSelectorModal"));
      const testsContainer = document.getElementById("testsContainer");
      const applyTestBtn = document.getElementById("applyTestBtn");
      const modalTestSearch = document.querySelector("#testSelectorModal .search-box input");
      const scoreReportContainer = document.getElementById("scoreReportContainer");
      const recordBtn = document.getElementById('recordBtn');
      const recordBtnText = document.getElementById('recordBtnText');
      const submitFloatingBtn = document.getElementById('submitFloatingBtn');
      const submitBtn = document.getElementById('submitBtn');

      // --- Initialization ---
      function init() {
        checkMicrophonePermission();
        setupEventListeners();
        setupSpeechRecognition();
        loadTestedCount();
        loadPracticeHistory();
        showSMS("Welcome to Text-to-Speech Practice", "info");
        recordBtn.disabled = true;
      }

      // --- API and Data Handling ---
      function loadTestedCount() {
        const dummyCount = localStorage.getItem("testedCount") || 0;
        testedCount.textContent = dummyCount;
      }

      function savePracticeResult(score, userSpeech, timeTaken) {
        const historyItem = {
          question_id: currentQuestionId || "Custom",
          score: score,
          time_taken: timeTaken,
          attempt: 1,
          created_at: new Date().toISOString(),
        };
        const history = JSON.parse(localStorage.getItem("practiceHistory") || "[]");
        history.unshift(historyItem);
        localStorage.setItem("practiceHistory", JSON.stringify(history.slice(0, 5)));
        localStorage.setItem("testedCount", parseInt(localStorage.getItem("testedCount") || 0) + 1);

        loadTestedCount();
        loadPracticeHistory();
      }

      function loadPracticeHistory() {
        const history = JSON.parse(localStorage.getItem("practiceHistory") || "[]");
        displayPracticeHistory(history);
      }

      function getQuestionText(id) {
        return new Promise((resolve, reject) => {
          if (dummyQuestions[id]) {
            resolve({
              success: true,
              text: dummyQuestions[id]
            });
          } else {
            reject({
              success: false,
              message: "Question not found"
            });
          }
        });
      }

      function displayPracticeHistory(history) {
        if (history.length === 0) {
          practiceHistory.innerHTML = "<p>No practice history yet. Start practicing to see your results here.</p>";
          return;
        }
        let html = '<div class="list-group">';
        history.forEach((item) => {
          const date = new Date(item.created_at).toLocaleDateString();
          const time = new Date(item.created_at).toLocaleTimeString();
          html += `
                        <div class="list-group-item history-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Score: ${Math.round(item.score)}/90</h6>
                                <small>${date} ${time}</small>
                            </div>
                            <p class="mb-1">Time: ${item.time_taken.toFixed(1)}s | Attempt: ${item.attempt}</p>
                            <small>Question ID: ${item.question_id}</small>
                        </div>
                    `;
        });
        html += "</div>";
        practiceHistory.innerHTML = html;
      }

      // --- UI and Modal Management ---
      function showSMS(message, type = "info") {
        const sms = document.createElement("div");
        sms.className = `sms-message ${type}`;
        const now = new Date();
        const timeString = now.toLocaleTimeString([], {
          hour: "2-digit",
          minute: "2-digit",
        });
        sms.innerHTML = `
                    <button class="sms-close"><i class="bi bi-x"></i></button>
                    <div class="sms-content">${message}</div>
                    <div class="sms-time">${timeString}</div>
                `;
        smsContainer.appendChild(sms);

        const closeBtn = sms.querySelector(".sms-close");
        closeBtn.addEventListener("click", () => sms.remove());

        setTimeout(() => sms.remove(), 5000);
      }

      function setupTestSelectorModal() {
        const modalQuestionItems = document.querySelectorAll("#testsContainer .question-item");
        allTestItems = Array.from(modalQuestionItems).map((item) => ({
          id: item.dataset.id,
          title: item.querySelector(".question-title").textContent.trim(),
          element: item,
        }));

        modalQuestionItems.forEach((item) => {
          item.classList.remove("selected");
          item.removeEventListener("click", selectQuestion);
          item.addEventListener("click", selectQuestion);
        });

        modalTestSearch.addEventListener("input", function () {
          const searchTerm = this.value.toLowerCase().trim();
          allTestItems.forEach((item) => {
            const isVisible = item.title.toLowerCase().includes(searchTerm);
            item.element.style.display = isVisible ? "flex" : "none";
          });
        });

        function selectQuestion() {
          if (selectedQuestion) {
            selectedQuestion.element.classList.remove("selected");
          }
          this.classList.add("selected");
          selectedQuestion = allTestItems.find((q) => q.id === this.dataset.id);
        }
      }

      applyTestBtn.addEventListener("click", function () {
        if (selectedQuestion) {
          currentQuestionId = selectedQuestion.id;
          getQuestionText(currentQuestionId)
            .then((data) => {
              currentText = data.text;
              textDisplay.innerHTML = `<p>${currentText}</p>`;
              recordBtn.disabled = false;
              isShadowing = false;
              showSMS(
                "The selected text has been loaded successfully. Click the mic to start recording.",
                "success"
              );
              testSelectorModal.hide();
            })
            .catch((error) => {
              console.error("Error fetching question text:", error);
              showSMS("Failed to load question text. Please try again.", "error");
            });
        } else {
          showSMS("Please select a question first.", "warning");
        }
      });

      // --- Core Functionality ---
      function checkMicrophonePermission() {
        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
          microphonePermissionBox.querySelector("p").textContent = "Microphone access is not supported in your browser.";
          microphonePermissionBox.style.display = "block";
          showSMS("Your browser does not support microphone access", "error");
          return;
        }

        navigator.mediaDevices.getUserMedia({
          audio: true
        })
          .then((stream) => {
            microphonePermissionGranted = true;
            microphonePermissionBox.style.display = "none";
            stream.getTracks().forEach((track) => track.stop());
          })
          .catch((err) => {
            console.error("Microphone permission denied:", err);
            microphonePermissionGranted = false;
            microphonePermissionBox.style.display = "block";
            showSMS("Microphone access is required for speech practice", "warning");
          });
      }

      function setupSpeechRecognition() {
        if (!("SpeechRecognition" in window) && !("webkitSpeechRecognition" in window)) {
          shadowingBtn.disabled = true;
          shadowBtn.disabled = true;
          showSMS("Speech recognition is not supported in your browser", "warning");
          return;
        }

        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        recognition = new SpeechRecognition();
        recognition.continuous = false;
        recognition.lang = "en-US";
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;

        recognition.onstart = () => {
          recordBtn.classList.add('recording');
          recordBtnText.textContent = "Recording...";
          isRecording = true;
          showSMS("Recording started. Speak now...", "info");
          practiceStartTime = Date.now();
        };

        recognition.onresult = (event) => {
          isRecording = false;
          clearInterval(timerInterval);
          userSpeechResult = event.results[0][0].transcript;
          userTimeTaken = (Date.now() - practiceStartTime) / 1000;

          if (mediaRecorder && mediaRecorder.state !== 'inactive') {
            mediaRecorder.stop();
          }

          stopRecordingUI();
          showSMS("Recording ended. Click 'Submit' to see your score.", "info");
          submitFloatingBtn.style.display = 'block';
        };

        recognition.onerror = (event) => {
          isRecording = false;
          console.error("Speech recognition error:", event.error);
          showSMS(`Speech recognition error: ${event.error}`, "error");
          stopRecordingUI();
        };

        recognition.onend = () => {
          isRecording = false;
          stopRecordingUI();
        };
      }

      function startRecording() {
        if (!microphonePermissionGranted) {
          showSMS("Please grant microphone permission first", "warning");
          return;
        }
        if (!recognition) {
          showSMS("Speech recognition is not available in your browser", "error");
          return;
        }
        if (!currentText) {
          showSMS("Please select a text or enter your own text first.", "warning");
          return;
        }

        recordBtn.classList.add('recording');
        recordBtn.disabled = true;

        audioChunks = [];
        navigator.mediaDevices.getUserMedia({
          audio: true
        })
          .then(stream => {
            mediaRecorder = new MediaRecorder(stream);
            mediaRecorder.ondataavailable = event => {
              audioChunks.push(event.data);
            };
            mediaRecorder.onstop = () => {
              userRecordingBlob = new Blob(audioChunks, {
                type: 'audio/webm'
              });
              stream.getTracks().forEach(track => track.stop());
            };
            mediaRecorder.start();
          })
          .catch(err => {
            console.error('MediaRecorder setup failed:', err);
            showSMS("Could not set up audio recording.", "error");
          });

        try {
          recognition.start();
          startTimer();
        } catch (error) {
          console.error("Recognition start failed:", error);
          showSMS("Could not start microphone. Please check permissions.", "error");
          stopRecordingUI();
        }
      }

      function stopRecordingUI() {
        recordBtn.classList.remove('recording');
        recordBtnText.textContent = "Speak";
        recordBtn.disabled = false;
        redoBtn.disabled = false;
        if (mediaRecorder && mediaRecorder.state !== 'inactive') {
          mediaRecorder.stop();
        }
      }

      // Function to start the loading state on the button
      function startLoading(btn) {
        btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Generate AI Score';
        btn.disabled = true;
      }

      // Function to stop the loading state
      function stopLoading(btn, text) {
        btn.innerHTML = text;
        btn.disabled = false;
      }

      // Modified handleSubmission function to stop loading after processing
      function handleSubmission(btn) {
        if (!userSpeechResult) {
          showSMS("Please complete a recording first.", "warning");
          stopLoading(btn, "Submit Score"); // Stop loading on error
          return;
        }

        const scoreResult = calculatePTEScore(currentText, userSpeechResult, userTimeTaken);
        showResultsInModal(scoreResult, userSpeechResult, userTimeTaken, userRecordingBlob);
        savePracticeResult(scoreResult.totalScore, userSpeechResult, userTimeTaken);
        submitFloatingBtn.style.display = 'none';
        stopLoading(btn, "Submit Score"); // Stop loading after successful processing
      }

      function startTimer() {
        timeLeft = 40;
        timer.textContent = `Time: 00:${timeLeft.toString().padStart(2, "0")}`;
        clearInterval(timerInterval);
        timerInterval = setInterval(() => {
          timeLeft--;
          timer.textContent = `Time: 00:${timeLeft.toString().padStart(2, "0")}`;
          if (timeLeft <= 0) {
            clearInterval(timerInterval);
            if (isRecording) {
              recognition.stop();
            }
            timer.textContent = "Time's up!";
            showSMS("Time has expired. Please try again.", "info");
          }
        }, 1000);
      }

      // --- Scoring and Feedback ---
      function calculatePTEScore(expected, actual, timeTaken) {
        // Calculate raw scores out of 30 for each category
        const contentScore30 = calculateContentScore(expected, actual);
        const pronunciationScore30 = calculatePronunciationScore(expected, actual);
        const fluencyScore30 = calculateFluencyScore(expected, actual, timeTaken);

        // Scale each score to be out of 90, as per the screenshot
        const contentScore90 = Math.round(contentScore30 / 30 * 90);
        const pronunciationScore90 = Math.round(pronunciationScore30 / 30 * 90);
        const fluencyScore90 = Math.round(fluencyScore30 / 30 * 90);

        // Calculate the total score as the sum of the scaled scores
        const totalScore = contentScore90 + pronunciationScore90 + fluencyScore90;

        // The total score should be the average of the three component scores, scaled to 90.
        // Based on the example (64+52+64 = 180, and total score is 59), the total score is not a direct sum.
        // It looks like the average of the 3 component scores (out of 90) is used as the final score.
        // Let's use the average logic to match the example.
        const finalTotalScore = (contentScore90 + pronunciationScore90 + fluencyScore90) / 3;

        return {
          totalScore: Math.round(finalTotalScore),
          contentScore: contentScore90,
          pronunciationScore: pronunciationScore90,
          fluencyScore: fluencyScore90,
        };
      }

      function calculateContentScore(expected, actual) {
        const expectedWords = expected.toLowerCase().split(/\s+/);
        const actualWords = actual.toLowerCase().split(/\s+/);
        const expectedLength = expectedWords.length;

        if (actualWords.length === 0 || actual === '') {
          return 0;
        }

        let matchedWords = 0;
        const tempActual = [...actualWords];

        for (let i = 0; i < expectedWords.length; i++) {
          const expectedWord = expectedWords[i].replace(/[^\w]/g, "");
          const index = tempActual.indexOf(expectedWord);
          if (index !== -1) {
            matchedWords++;
            tempActual.splice(index, 1);
          }
        }

        const score = (matchedWords / expectedLength) * 30;
        return score;
      }

      function calculatePronunciationScore(expected, actual) {
        const expectedWords = expected.toLowerCase().split(/\s+/);
        const actualWords = actual.toLowerCase().split(/\s+/);
        const expectedLength = expectedWords.length;
        const actualLength = actualWords.length;

        if (actualLength === 0) {
          return 0;
        }

        let correctlyPronouncedWords = 0;
        for (let i = 0; i < Math.min(expectedLength, actualLength); i++) {
          const expectedWord = expectedWords[i].replace(/[^\w]/g, "");
          const actualWord = actualWords[i] ? actualWords[i].replace(/[^\w]/g, '') : '';

          if (actualWord === expectedWord) {
            correctlyPronouncedWords++;
          }
        }

        const accuracy = correctlyPronouncedWords / expectedLength;
        return accuracy * 30;
      }

      function calculateFluencyScore(expected, actual, timeTaken) {
        const expectedWordCount = expected.split(/\s+/).length;
        const actualWordCount = actual.split(/\s+/).length;

        if (actualWordCount === 0) {
          return 0;
        }

        const wpm = expectedWordCount / (timeTaken / 60);

        let speedFactor;
        if (wpm >= 220 && wpm <= 260) {
          speedFactor = 1; // Perfect speed
        } else if (wpm > 200 && wpm < 220 || wpm > 260 && wpm < 200) {
          speedFactor = 0.8; // Good speed, but not perfect
        } else {
          speedFactor = 0.5; // Poor speed
        }

        const pausePenalty = Math.abs(actualWordCount - expectedWordCount) / expectedWordCount;

        return Math.max(0, 30 * speedFactor * (1 - pausePenalty));
      }

      function showResultsInModal(scoreResult, userSpeech, timeTaken, audioBlob) {
        const scoreContainer = document.getElementById("scoreReportContainer");
        const wordCount = currentText.split(/\s+/).length;
        const wpm = Math.round(wordCount / (timeTaken / 60));

        const audioUrl = audioBlob ? URL.createObjectURL(audioBlob) : '';

        const resultsHTML = `
                    <h5 class="text-center text-primary fw-bold">AI Score Report</h5>
                    <div class="score-display">
                        <div>Your Score</div>
                        <div>${Math.round(scoreResult.totalScore)}/90</div>
                    </div>
                    <div class="container mt-3">
                        <div class="card shadow-sm rounded-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">Score Breakdown</h5>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-4 mb-3">
                                        <div class="p-3 border rounded bg-light">
                                            <h6 class="text-muted">Content</h6>
                                            <p class="fs-5 fw-bold text-dark mb-0">
                                                ${scoreResult.contentScore}/90
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="p-3 border rounded bg-light">
                                            <h6 class="text-muted">Pronunciation</h6>
                                            <p class="fs-5 fw-bold text-dark mb-0">
                                                ${scoreResult.pronunciationScore}/90
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="p-3 border rounded bg-light">
                                            <h6 class="text-muted">Fluency</h6>
                                            <p class="fs-5 fw-bold text-dark mb-0">
                                                ${scoreResult.fluencyScore}/90
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="feedback-area">
                        <div class="feedback-content">
                            <p class="text-center mt-3"><strong>Listen to your recording:</strong></p>
                            <div class="text-center">
                                <audio controls src="${audioUrl}"></audio>
                            </div>
                            <hr>
                            <p class="text-center fw-bold">Word-by-word analysis:</p>
                            ${generateFeedbackWords(currentText, userSpeech)}
                            <hr>
                            <p class="text-center"><strong>Overall Feedback:</strong></p>
                            ${getOverallFeedback(scoreResult.totalScore)}
                        </div>
                        <div class="speed-score">
                            Speaking speed: ${wpm} words per minute
                        </div>
                        ${getSpeedFeedback(wpm)}
                    </div>
                `;

        scoreContainer.innerHTML = resultsHTML;
        const scoreReportModal = new bootstrap.Modal(document.getElementById('scoreReportModal'));
        scoreReportModal.show();
      }

      function getOverallFeedback(score) {
        if (score >= 80)
          return '<p class="correct">Excellent! Your pronunciation, fluency, and content accuracy are at a high level.</p>';
        if (score >= 60)
          return '<p class="correct">Good job! Your speech is mostly accurate with good fluency.</p>';
        if (score >= 40)
          return "<p>Not bad! With more practice, you'll improve pronunciation and fluency.</p>";
        return '<p class="incorrect">Keep practicing! Focus on reading exactly what\'s on screen and maintaining a natural pace.</p>';
      }

      function generateFeedbackWords(expected, actual) {
        const expectedWords = expected.toLowerCase().split(/\s+/);
        const actualWords = actual.toLowerCase().split(/\s+/);
        let resultHtml = '<div class="text-center">';

        for (let i = 0; i < expectedWords.length; i++) {
          const expectedWord = expectedWords[i].replace(/[^\w]/g, "");
          const actualWord = actualWords[i] ? actualWords[i].replace(/[^\w]/g, "") : '';

          if (expectedWord === actualWord) {
            resultHtml += `<span class="correct-word">${expectedWords[i]} </span>`;
          } else {
            resultHtml += `<span class="incorrect-word">${expectedWords[i]} </span>`;
          }
        }
        resultHtml += '</div>';
        return resultHtml;
      }

      function getSpeedFeedback(wpm) {
        if (wpm >= 280 && wpm <= 260)
          return '<p class="correct speed-feedback">Your speaking speed is perfect for PTE!</p>';
        if ((wpm >= 160 && wpm < 180) || (wpm > 190 && wpm <= 200))
          return '<p class="speed-feedback">Your speaking speed is good, but try to speak a bit faster/slower.</p>';
        if (wpm > 200)
          return '<p class="incorrect speed-feedback">Your speech is too fast. Try to adjust your pace.</p>';
        if (wpm < 190)
          return '<p class="incorrect speed-feedback">Your speech is too slow. Try to adjust your pace.</p>';
        return '<p class="incorrect speed-feedback">Your speaking speed needs significant improvement for PTE.</p>';
      }

      // --- Event Handlers ---
      function setupEventListeners() {
        microphoneHelpBtn.addEventListener("click", () => showSMS("To use speech recognition, please allow microphone access in your browser settings.", "info"));
        recordBtn.addEventListener("click", () => {
          if (isRecording) {
            recognition.stop();
          } else {
            startRecording();
          }
        });

        document.getElementById("submitBtn").addEventListener("click", () => {
          const submitBtn = document.getElementById("submitBtn");
          startLoading(submitBtn);

          setTimeout(() => {
            handleSubmission(submitBtn);
          }, 2000); // 2-second delay
        });

        redoBtn.addEventListener("click", handleRedo);
        translationBtn.addEventListener("click", () => showSMS("Translation feature would be implemented here.", "info"));
        zenPracticeBtn.addEventListener("click", () => showSMS("Zen Practice mode activated. Focus on your pronunciation without distractions.", "info"));
        oneLineModeBtn.addEventListener("click", () => showSMS("One Line Mode activated. Text will be displayed one line at a time.", "info"));
        shadowingBtn.addEventListener("click", handleShadowing);
        speakTextBtn.addEventListener("click", handleSpeakText);
        customTextInput.addEventListener("input", handleCustomTextInput);
        askStageBtn.addEventListener("click", () => showSMS("Asking the teacher for your current stage goal...", "info"));
        closeTipBtn.addEventListener("click", () => (document.querySelector(".sd-card").style.display = "none"));
        studyGuideBtn.addEventListener("click", () => showSMS("Opening study guide...", "info"));
        shadowBtn.addEventListener("click", handleShadow);

        document.getElementById("toggleSelector").addEventListener("click", setupTestSelectorModal);
      }

      function handleRedo() {
        if (currentText) {
          textDisplay.innerHTML = `<p>${currentText}</p>`;
          recordBtn.disabled = false;
          startTimer();
          showSMS("Practice restarted. Good luck!", "info");
        } else {
          showSMS("No text selected to redo.", "warning");
        }
      }

      function handleSpeakText() {
        const customText = customTextInput.value.trim();
        if (!customText) {
          showSMS("Please enter some text to speak.", "warning");
          return;
        }
        const utterance = new SpeechSynthesisUtterance(customText);
        window.speechSynthesis.speak(utterance);
        showSMS("Speaking your custom text...", "info");
      }

      function handleCustomTextInput() {
        const customText = customTextInput.value.trim();
        if (customText) {
          currentText = customText;
          textDisplay.innerHTML = `<p>${currentText}</p>`;
          currentQuestionId = null;
          clearInterval(timerInterval);
          recordBtn.disabled = false;
        }
      }

      function handleShadow() {
        if (!currentText) {
          showSMS("Please select a text first.", "warning");
          return;
        }
        isShadowing = true;
        if (window.speechSynthesis.speaking) {
          window.speechSynthesis.cancel();
        }
        const utterance = new SpeechSynthesisUtterance(currentText);
        utterance.rate = 0.9;
        window.speechSynthesis.speak(utterance);
        shadowBtn.innerHTML = '<i class="bi bi-pause-circle me-2"></i>Pause';
        shadowBtn.classList.add("speaking");
        showSMS("Playing text for shadow practice...", "info");
        utterance.onend = () => {
          shadowBtn.innerHTML = "Shadow";
          shadowBtn.classList.remove("speaking");
          isShadowing = false;
          startRecording();
        };
      }

      function handleShadowing() {
        if (isRecording) {
          recognition.stop();
        } else {
          startRecording();
        }
      }

      init();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>