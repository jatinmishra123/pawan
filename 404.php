<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Text-to-Speech Practice - NiceSchool</title>
  <meta name="description" content="Practice English pronunciation with our AI-powered text-to-speech tool" />
  <meta name="keywords" content="text to speech, english pronunciation, practice, AI speech" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
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
      font-size: 1.2rem;
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

    .test-item.active {
      background: #acb8caff;
      color: white;
      border-color: #acb8caff;
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
      /* Move to right side */
      top: 70%;
      /* Vertically center */
      transform: translateY(-50%);
      /* Proper center alignment */
      z-index: 1001;
      background: #12d3bf;
      /* Updated color */
      color: white;
      width: 50px;
      /* slightly bigger */
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      font-size: 24px;
      /* arrow size */
    }

    /* Optional: right arrow inside using CSS pseudo-element */
    .toggle-selector::after {
      content: '→';
      /* right arrow */
      display: block;
      color: white;
      font-weight: bold;
    }


    .search-box {
      position: relative;
      margin-bottom: 20px;
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
  </style>
</head>

<body class="contact-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index
" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png.jpeg" alt="logo">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index
">Home</a></li>
          <li class="dropdown">
            <a href="about
"><span>About</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="about
">About Us</a></li>
              <li><a href="admissions
">Admissions</a></li>
              <li><a href="academics
">Academics</a></li>
              <li><a href="faculty-staff
">Faculty &amp; Staff</a></li>
              <li>
                <a href="campus-facilities
">Campus &amp; Facilities</a>
              </li>
            </ul>
          </li>

          <li><a href="students-life
">Students Life</a></li>
          <li><a href="news
">News</a></li>
          <li><a href="events
">Events</a></li>
          <li><a href="alumni
">Alumni</a></li>
          <li class="dropdown">
            <a href="#"><span>More Pages</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="news-details
">News Details</a></li>
              <li><a href="event-details
">Event Details</a></li>
              <li><a href="privacy
">Privacy</a></li>
              <li><a href="terms-of-service
">Terms of Service</a></li>
              <li><a href="404
">Error 404</a></li>
              <li><a href="starter-page
">Starter Page</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#"><span>Dropdown</span>
              <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown">
                <a href="#"><span>Deep Dropdown</span>
                  <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="contact
">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/education/showcase-1.webp)">
      <div class="container position-relative">
        <h1>Text-to-Speech Practice</h1>
        <p>
          Improve your English pronunciation with our AI-powered text-to-speech tool.
        </p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index
">Home</a></li>
            <li class="current">TTS Practice</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- End Page Title -->
    <section>
      <!-- Requires Bootstrap 5 CSS/JS (example uses CDN) -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

      <style>
        /* small styles to mimic gradient icon background and spacing */
        .sd-card {
          background: white;
          border-radius: .5rem;
          padding: .75rem;
          display: flex;
          box-shadow: 0 1px 3px rgba(0, 0, 0, .06);
        }

        .sd-icon {
          width: 44px;
          height: 44px;
          flex: 0 0 44px;
          display: flex;

        }

        .sd-title {
          font-weight: 600;
          font-size: .95rem;
          margin-bottom: .125rem;
        }

        .sd-desc {
          font-size: .82rem;
          color: #6c757d;
          margin: 0;
        }

        .sd-grow {
          flex: 1 1 auto;
          min-width: 0;
          /* enable truncation when needed */
        }

        .sd-cta {
          white-space: nowrap;
        }

        /* small close icon */
        .sd-close {
          color: #6c757d;
          font-size: 1rem;
          margin-left: .5rem;
          cursor: pointer;
        }



        /* accessible focus */
        .sd-cta:focus,
        .sd-close:focus {
          outline: 3px solid rgba(13, 110, 253, .15);
          outline-offset: 2px;
        }
      </style>

      <div class="box-div">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="sd-card " role="region" aria-label="Stage Goal tip">
                <!-- left SVG icon -->
                <div class="sd-icon" aria-hidden="true">
                  <!-- use the same SVG path or substitute your own -->
                  <svg fill="none" width="28" height="28" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                      <linearGradient id="benefit8_grad" x1="0.5" y1="0" x2="0.5" y2="1">
                        <stop offset="0%" stop-color="#E7B380"></stop>
                        <stop offset="100%" stop-color="#DA9059"></stop>
                      </linearGradient>
                      <clipPath id="benefit8_clip">
                        <rect width="28" height="28" rx="0"></rect>
                      </clipPath>
                    </defs>
                    <g clip-path="url(#benefit8_clip)">
                      <path
                        d="M27.678 5.656l-3.444 3.43h-3.99l-.63.63-2.394 2.38-1.484 1.484-1.26 1.26a.929.929 0 01-.7.28.924.924 0 01-.686-.308c-.364-.378-.322-.994.056-1.372l2.506-2.506.196-.196 2.408-2.394.644-.644V3.752l1.19-1.19 2.254-2.24c.028-.028.056-.056.098-.084l.028-.014c.028-.028.07-.042.098-.056h.014a.683.683 0 01.098-.042l.028-.014c.028-.014.07-.014.098-.028h.014c.028 0 .056-.014.098-.014h.154c.028 0 .056.014.084.014h.028c.028.014.07.014.098.028h.014l.084.042.028.014c.028.014.056.042.084.056l.014.014c.028.014.042.042.07.056l.014.014c.028.028.042.056.07.084q.014.028 0 0c.014.028.042.056.056.084 0 .014.014.014.014.028.014.028.028.07.042.098.014.028.014.07.028.112v.028c0 .042.014.084.014.126l.07 3.22h.07l3.164.07a.886.886 0 01.574.238c.056.056.112.126.154.196.042.07.07.14.084.224.042.322-.042.63-.252.84zM13.622 6.818c-4.214 0-7.644 3.416-7.644 7.616 0 4.2 3.43 7.616 7.644 7.616s7.644-3.416 7.644-7.616a7.482 7.482 0 00-.588-2.926l-2.758 2.758v.168a4.281 4.281 0 01-4.284 4.312 4.302 4.302 0 01-4.326-4.284 4.3 4.3 0 014.27-4.326l2.814-2.8a7.22 7.22 0 00-2.772-.518zm12.04 3.696a2.024 2.024 0 01-1.428.588h-1.54a9.672 9.672 0 01.602 3.332c0 5.306-4.34 9.632-9.674 9.632s-9.674-4.326-9.674-9.632 4.34-9.632 9.674-9.632a9.55 9.55 0 013.248.56v-1.61c0-.532.21-1.05.588-1.428l.644-.63a13.562 13.562 0 00-4.48-.756C6.146.938.07 6.986.07 14.434S6.146 27.93 13.608 27.93c7.462 0 13.552-6.048 13.552-13.496 0-1.568-.28-3.122-.812-4.606l-.686.686z"
                        fill="url(#benefit8_grad)"></path>
                    </g>
                  </svg>
                </div>

                <!-- main text block -->
                <div class="sd-grow">
                  <div class="sd-title">Stage Goal</div>
                  <p class="sd-desc mb-0">Ask the teacher for your current stage goal to clarify your current learning
                    priorities and methods.</p>
                </div>

                <!-- CTA and close -->
                <div class="d-flex align-items-center gap-2">
                  <button type="button" class="btn btn-sm btn-outline-danger sd-cta" id="askStageBtn">Ask Now</button>

                  <!-- optional close icon (uses Bootstrap icon from CDN or you can replace) -->
                  <button type="button" class="btn p-0 sd-close" aria-label="Close tip" id="closeTipBtn">
                    <!-- simple X SVG -->
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

            <div class="col-md-12 mt-5">
              <div class="row">
                <!-- left -->
                <div class="col-sm-1">
                  <img src="https://dl26yht2ovo33.cloudfront.net/public/admin/practice_assets/q_images/ra_s_ai.png"
                    width="68" height="68" alt="Practice Icon">
                </div>
                <div class="col-sm-11">
                  <div class="sd-1">
                    <h4 class="sd-title1"><b>Read Aloud </b><button type="button" class="btn btn-sm btn-info text-light"
                        id="askStageBtn"><i class="bi bi-mortarboard" style="margin-right:10px;"></i>Study
                        Guide</button></h4>
                    <p class="sd-desc1 mb-0">Look at the text below. In 40 seconds, you must read this text aloud as
                      naturally and clearly as possible. You have 40 seconds to read aloud.
                    </p>
                  </div>
                </div>

                <!-- main text block -->
              </div>
            </div>

            <div class="col-md-12">
              <hr>
            </div>

          </div>
        </div>

      </div>


      <script>
        // Example JS for interactions
        document.getElementById('askStageBtn').addEventListener('click', function () {
          // replace with any action: open modal, send request, etc.
          alert('Asking the teacher for your current stage goal...');
        });

        document.getElementById('closeTipBtn').addEventListener('click', function () {
          // hide the tip card
          this.closest('.sd-card').remove();
        });
      </script>



    </section>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Text-to-Speech Practice Section -->
    <section id="tts" class="tts-section" style="background-color:#FAFAFA;">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <p class="mb-4">Practice Your Pronunciation <button class="btn btn-info btn-sm text-light">Shadow</button>
            </p>
          </div>
          <div class="col-md-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-sm text-light float-end" data-bs-toggle="modal"
              data-bs-target="#exampleModal">
              Tested(2345)
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Confirm exam information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="">
                      <!-- Exam Date -->
                      <div class="mb-3">
                        <label for="examdate" class="form-label">Exam Date <span
                            class="text-danger">(required)</span></label>
                        <input type="date" class="form-control" id="examdate" required>
                      </div>

                      <!-- Exam Type -->
                      <div class="mb-3">
                        <label class="form-label">Exam Type <span class="text-danger">(required)</span></label><br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="examtype" id="pteaukvi" value="PTEA/UKVI"
                            required>
                          <label class="form-check-label" for="pteaukvi">PTEA / UKVI</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="examtype" id="ptecore" value="PTE Core">
                          <label class="form-check-label" for="ptecore">PTE Core</label>
                        </div>
                      </div>

                      <!-- More Information -->
                      <div class="mb-3">
                        <label for="examinfo" class="form-label">More information</label>
                        <textarea class="form-control" id="examinfo" rows="3"
                          placeholder="Please share more information with us"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-info text-light">Confirm</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-12">
            <p class="text-danger">Time: 00:00</p><div class="box-text" style="border:1px dotted #000; height:150px; width:100%;">

            </div>

          </div>
          <div class="col-md-12 mt-5 mb-5">
            <div class="box-text" style="background-color: #FF6666; height:150px; width:100%;">
              <p class="text-center text-light" style="padding-top:50px;">Microphone permission is not granted.</p>
              <button class="btn btn-outline-light btn-sm text-center" style="margin-left:550px;">Help</button>
            </div>

          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-sm-8">
                <div class="multi-btn">
                  <!-- Top buttons -->
                  <button class="btn btn-sm btn-disabled" disabled>Submit</button>
                  <button class="btn btn-sm btn-outline-primary">Re-do</button>
                  <button class="btn btn-sm btn-outline-info">
                    <i class="bi bi-translate"></i> Translation
                  </button>
                  <button class="btn btn-sm btn-outline-info"><i class="bi bi-pencil" style="margin-right:5px;"></i>Zen
                    Practice</button>
                  <button class="btn btn-sm btn-outline-info"><i class="bi bi-mic-fill"></i> Shadowing</button>
                  <button class="btn btn-sm btn-outline-info"><i class="bi bi-chat-right-dots"
                      style="margin-right:5px;"></i>One Line Mode</button>

                  <br><br>

                  <div class="input-group" style="width:300px; display:inline-flex; vertical-align:middle;">
                    <input type="text" class="form-control" placeholder="Question Co...">
                    <button class="btn btn-outline-info">Search</button>
                  </div>

                  <!-- Previous & Next -->
                  <button class="btn btn-disabled ms-2" disabled>Previous</button>
                  <button class="btn btn-outline-info ms-2">Next</button>
                </div>
              </div>
              <div class="col-sm-4"></div>
            </div>
          </div>
          <div class="col-md-12 mt-5">
            <!-- Tabs -->
            <ul class="nav nav-tabs custom-tabs" id="myTab" role="tablist">
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

            <!-- Tab Content -->
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="discussion" role="tabpanel">
                <h5>Discussion Content</h5>
                <p>Here is the discussion area with messages.</p>
              </div>
              <div class="tab-pane fade" id="board" role="tabpanel">
                <h5>Board Content</h5>
                <p>Here is the board area.</p>
              </div>
              <div class="tab-pane fade" id="me" role="tabpanel">
                <h5>Me Content</h5>
                <p>Here is your personal area.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- End Text-to-Speech Practice Section -->

    <!-- Toggle Selector Button -->
    <!-- Toggle Selector -->
    <div class="toggle-selector" id="toggleSelector" data-bs-toggle="modal" data-bs-target="#testSelectorModal">
    </div>

  </main>

  <footer id="footer" class="footer position-relative dark-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index
" class="logo d-flex align-items-center">
            <span class="sitename">NiceSchool</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3">
              <strong>Phone:</strong> <span>+1 5589 55488 55</span>
            </p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nobis illum</h4>
          <ul>
            <li><a href="#">Ipsam</a></li>
            <li><a href="#">Laudantium dolorum</a></li>
            <li><a href="#">Dinera</a></li>
            <li><a href="#">Trodelas</a></li>
            <li><a href="#">Flexo</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>
        © <span>Copyright</span>
        <strong class="px-1 sitename">NiceSchool</strong>
        <span>All Rights Reserved</span>
      </p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Test Selector Modal -->
  <div class="modal fade" id="testSelectorModal" tabindex="-1" aria-labelledby="testSelectorModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="testSelectorModalLabel"><i class="bi bi-card-text me-2"></i>Select Practice Text
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text" class="form-control" placeholder="Search tests..." id="testSearch">
          </div>

          <h6 class="category-title">Beginner</h6>
          <div class="test-item"
            data-text="Hello, my name is John. I am learning English. I like to practice speaking every day.">
            Basic Introduction
          </div>
          <div class="test-item"
            data-text="The weather is nice today. I would like to go to the park. Do you want to come with me?">
            Weather & Invitation
          </div>
          <div class="test-item"
            data-text="I enjoy reading books and watching movies. My favorite food is pizza. What do you like to eat?">
            Hobbies & Preferences
          </div>

          <h6 class="category-title">Intermediate</h6>
          <div class="test-item"
            data-text="The quick brown fox jumps over the lazy dog. This sentence contains every letter in the English alphabet.">
            Alphabet Practice
          </div>
          <div class="test-item"
            data-text="She sells seashells by the seashore. The shells she sells are surely seashells.">
            Tongue Twister 1
          </div>
          <div class="test-item" data-text="How much wood would a woodchuck chuck if a woodchuck could chuck wood?">
            Tongue Twister 2
          </div>

          <h6 class="category-title">Advanced</h6>
          <div class="test-item"
            data-text="The phenomenon of photosynthesis is fundamentally important for biological systems, converting solar energy into chemical energy.">
            Scientific Concept
          </div>
          <div class="test-item"
            data-text="Despite the inclement weather conditions, the expedition team persevered and ultimately achieved their objective.">
            Complex Narrative
          </div>
          <div class="test-item"
            data-text="The intricacies of linguistic phonology present considerable challenges for second language acquisition.">
            Linguistics Topic
          </div>

          <h6 class="category-title">Business English</h6>
          <div class="test-item"
            data-text="We would like to schedule a meeting to discuss the quarterly financial report and strategic planning for the upcoming fiscal year.">
            Meeting Request
          </div>
          <div class="test-item"
            data-text="The stakeholders require a comprehensive analysis of market trends and consumer behavior before approving the proposed budget allocation.">
            Business Analysis
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info text-light" id="applyTestBtn">Apply Selected Text</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Text-to-Speech Practice JS -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Elements
      const toggleSelector = document.getElementById('toggleSelector');
      const textDisplay = document.getElementById('textDisplay');
      const userTextInput = document.getElementById('userTextInput');
      const clearBtn = document.getElementById('clearBtn');
      const useTextBtn = document.getElementById('useTextBtn');
      const speakBtn = document.getElementById('speakBtn');
      const recordBtn = document.getElementById('recordBtn');
      const scoreDisplay = document.getElementById('scoreDisplay');
      const scoreValue = document.getElementById('scoreValue');
      const feedbackArea = document.getElementById('feedbackArea');
      const feedbackContent = document.getElementById('feedbackContent');
      const nextBtn = document.getElementById('nextBtn');
      const testItems = document.querySelectorAll('.test-item');
      const testSearch = document.getElementById('testSearch');
      const applyTestBtn = document.getElementById('applyTestBtn');

      // Variables
      let currentText = '';
      let recognition;
      let synthesis = window.speechSynthesis;
      let selectedTestItem = null;

      // Initialize speech recognition
      try {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) {
          throw new Error('Speech recognition not supported in this browser');
        }

        recognition = new SpeechRecognition();
        recognition.continuous = false;
        recognition.lang = 'en-US';
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;

        recognition.onresult = function (event) {
          const speechResult = event.results[0][0].transcript;
          const accuracyScore = calculateScore(currentText, speechResult);

          // Display score
          scoreValue.textContent = accuracyScore;
          scoreDisplay.classList.remove('d-none');

          // Generate feedback
          generateFeedback(currentText, speechResult, accuracyScore);
          feedbackArea.classList.remove('d-none');

          // Show next button
          nextBtn.classList.remove('d-none');

          // Stop recording UI
          recordBtn.classList.add('d-none');
          speakBtn.classList.remove('d-none');
        };

        recognition.onerror = function (event) {
          console.error('Speech recognition error', event.error);
          alert('Error with speech recognition: ' + event.error);
          recordBtn.classList.add('d-none');
          speakBtn.classList.remove('d-none');
        };

        recognition.onend = function () {
          if (recordBtn.classList.contains('speaking')) {
            recordBtn.classList.remove('speaking');
          }
        };
      } catch (e) {
        console.error('Speech recognition initialization failed', e);
        speakBtn.disabled = true;
        textDisplay.textContent = 'Speech recognition is not supported in your browser. Please try Chrome or Edge.';
      }

      // Test item selection
      testItems.forEach(item => {
        item.addEventListener('click', function () {
          // Remove active class from all items
          testItems.forEach(i => i.classList.remove('active'));
          // Add active class to clicked item
          this.classList.add('active');
          selectedTestItem = this;
        });
      });

      // Apply selected test text
      applyTestBtn.addEventListener('click', function () {
        if (selectedTestItem) {
          userTextInput.value = selectedTestItem.dataset.text;
          // Close the modal
          bootstrap.Modal.getInstance(document.getElementById('testSelectorModal')).hide();
        } else {
          alert('Please select a test text first');
        }
      });

      // Test search functionality
      testSearch.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        const categories = document.querySelectorAll('.category-title');

        categories.forEach(category => {
          let hasVisibleItems = false;
          const nextElement = category.nextElementSibling;

          if (nextElement) {
            const testItems = nextElement.querySelectorAll('.test-item');

            testItems.forEach(item => {
              const testTitle = item.textContent.toLowerCase();
              if (testTitle.includes(searchTerm)) {
                item.style.display = 'block';
                hasVisibleItems = true;
              } else {
                item.style.display = 'none';
              }
            });

            // Show or hide category based on visible items
            category.style.display = hasVisibleItems ? 'block' : 'none';
          }
        });
      });

      // Clear text button
      clearBtn.addEventListener('click', function () {
        userTextInput.value = '';
        userTextInput.focus();
      });

      // Use text button
      useTextBtn.addEventListener('click', function () {
        if (userTextInput.value.trim() === '') {
          alert('Please enter some text first');
          return;
        }

        currentText = userTextInput.value;
        textDisplay.textContent = currentText;
        speakBtn.disabled = false;

        // Hide previous results
        scoreDisplay.classList.add('d-none');
        feedbackArea.classList.add('d-none');
        nextBtn.classList.add('d-none');
      });

      // Speak button
      speakBtn.addEventListener('click', function () {
        if (!synthesis) {
          alert('Text-to-speech is not supported in your browser.');
          return;
        }

        // Stop any ongoing speech
        synthesis.cancel();

        // Create utterance
        const utterance = new SpeechSynthesisUtterance(currentText);
        utterance.lang = 'en-US';
        utterance.rate = 0.9; // Slightly slower for clarity

        // Speak the text
        synthesis.speak(utterance);

        // Change UI to show speaking state
        speakBtn.innerHTML = '<i class="bi bi-pause-circle me-2"></i>Pause';
        speakBtn.classList.add('speaking');

        // Change button function to pause
        speakBtn.onclick = pauseSpeech;

        // Show record button after speech ends
        utterance.onend = function () {
          speakBtn.innerHTML = '<i class="bi bi-play-circle me-2"></i>Hear Again';
          speakBtn.classList.remove('speaking');
          speakBtn.onclick = speakBtnClick;
          recordBtn.classList.remove('d-none');
        };
      });

      // Record button
      recordBtn.addEventListener('click', function () {
        if (!recognition) {
          alert('Speech recognition is not available in your browser.');
          return;
        }

        // Start recording
        try {
          recognition.start();
          recordBtn.innerHTML = '<i class="bi bi-stop-circle me-2"></i>Stop Recording';
          recordBtn.classList.add('speaking');
        } catch (error) {
          console.error('Recognition start failed', error);
          alert('Could not start microphone. Please check permissions.');
        }
      });

      // Next button
      nextBtn.addEventListener('click', function () {
        // Reset UI
        userTextInput.value = '';
        textDisplay.textContent = 'Type text in the input below or select a test from the left panel';
        speakBtn.disabled = true;
        scoreDisplay.classList.add('d-none');
        feedbackArea.classList.add('d-none');
        nextBtn.classList.add('d-none');
        recordBtn.classList.add('d-none');

        // Remove active class from test items
        testItems.forEach(item => item.classList.remove('active'));
        selectedTestItem = null;
      });

      // Function to pause speech
      function pauseSpeech() {
        if (synthesis.speaking) {
          synthesis.pause();
          speakBtn.innerHTML = '<i class="bi bi-play-circle me-2"></i>Resume';
          speakBtn.onclick = resumeSpeech;
        }
      }

      // Function to resume speech
      function resumeSpeech() {
        if (synthesis.paused) {
          synthesis.resume();
          speakBtn.innerHTML = '<i class="bi bi-pause-circle me-2"></i>Pause';
          speakBtn.onclick = pauseSpeech;
        }
      }

      // Default speak button click handler
      function speakBtnClick() {
        speakBtn.click();
      }

      // Calculate score based on similarity
      function calculateScore(expected, actual) {
        // Simple implementation - in a real app, this would use more advanced algorithms
        const expectedWords = expected.toLowerCase().split(/\s+/);
        const actualWords = actual.toLowerCase().split(/\s+/);

        let matchedWords = 0;

        // Check each word
        for (let i = 0; i < expectedWords.length; i++) {
          const expectedWord = expectedWords[i].replace(/[^\w]/g, '');
          if (i < actualWords.length) {
            const actualWord = actualWords[i].replace(/[^\w]/g, '');
            if (actualWord === expectedWord) {
              matchedWords++;
            }
          }
        }

        // Calculate score (words correct vs total words)
        const wordScore = Math.round((matchedWords / expectedWords.length) * 70);

        // Add bonus for overall similarity (up to 30 points)
        const similarity = stringSimilarity(expected.toLowerCase(), actual.toLowerCase());
        const similarityScore = Math.round(similarity * 30);

        const totalScore = Math.min(wordScore + similarityScore, 100);

        return totalScore;
      }

      // Generate feedback based on the score
      function generateFeedback(expected, actual, score) {
        feedbackContent.innerHTML = '';

        if (score >= 90) {
          feedbackContent.innerHTML = '<p class="correct">Excellent pronunciation! You spoke very clearly.</p>';
        } else if (score >= 70) {
          feedbackContent.innerHTML = '<p class="correct">Good job! Your pronunciation is mostly accurate.</p>';
        } else if (score >= 50) {
          feedbackContent.innerHTML = '<p>Not bad! With a little more practice, you\'ll improve.</p>';
        } else {
          feedbackContent.innerHTML = '<p class="incorrect">Keep practicing! Try to listen carefully to each word.</p>';
        }

        feedbackContent.innerHTML += `<p>You said: <strong>"${actual}"</strong></p>`;
        feedbackContent.innerHTML += `<p>Expected: <strong>"${expected}"</strong></p>`;
      }

      // Simple string similarity algorithm
      function stringSimilarity(s1, s2) {
        let longer = s1;
        let shorter = s2;
        if (s1.length < s2.length) {
          longer = s2;
          shorter = s1;
        }
        const longerLength = longer.length;
        if (longerLength === 0) {
          return 1.0;
        }
        return (longerLength - editDistance(longer, shorter)) / parseFloat(longerLength);
      }

      function editDistance(s1, s2) {
        s1 = s1.toLowerCase();
        s2 = s2.toLowerCase();

        const costs = [];
        for (let i = 0; i <= s1.length; i++) {
          let lastValue = i;
          for (let j = 0; j <= s2.length; j++) {
            if (i === 0) {
              costs[j] = j;
            } else if (j > 0) {
              let newValue = costs[j - 1];
              if (s1.charAt(i - 1) !== s2.charAt(j - 1)) {
                newValue = Math.min(Math.min(newValue, lastValue), costs[j]) + 1;
              }
              costs[j - 1] = lastValue;
              lastValue = newValue;
            }
          }
          if (i > 0) {
            costs[s2.length] = lastValue;
          }
        }
        return costs[s2.length];
      }
    });
  </script>
</body>

</html>