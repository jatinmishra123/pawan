<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pawan Pte - Ace your Pte Scorre </title>
  <link rel="icon" type="image/x-icon" href="/static/favicon.ico">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href=" rel=" stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <style>
    .hero-gradient {
      background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    }

    .btn-primary {
      background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .testimonial-card {
      transition: all 0.3s ease;
    }

    .testimonial-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
  </style>
</head>

<body class="font-sans antialiased text-gray-800">
  <!-- Navigation -->
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0 flex items-center">
            <a href="index" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="Logo" style="max-height:120px; margin-bottom:10px;">
            </a>
          </div>

        </div>
        <div class="hidden md:ml-6 md:flex md:items-center md:space-x-8">
          <a href="#" class="text-gray-600 px-3 py-2 text-sm font-medium">Home</a>
          <a href="#" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm fontmedium">Courses</a>
          <a href="#" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm fontmedium">About Us</a>
          <a href="#" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm fontmedium">Vouchers</a>
          <a href="contact" class="text-gray-500 hover:text-indigo-600 px-3 py-2 text-sm fontmedium">Contact</a>
          <a href="login " class="btn-primary text-white px-6 py-2 rounded-md text-sm fontmedium">Enroll Now</a>
        </div>
        <div class="-mr-2 flex items-center md:hidden">
          <button type="button"
            class="inline-flex items-center justify-center p-2 rounded-md
text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ringinset focus:ring-indigo-500">
            <i data-feather="menu"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>
  <!-- Hero Section -->
  <div class="hero-gradient text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
      <div class="md:flex md:items-center md:justify-between">
        <div class="md:w-1/2 mb-12 md:mb-0" data-aos="fade-right">
          <h1 class="text-4xl md:text-5xl font-bold mb-6">Ace Your PTE Score with Pawan
            PTE – Learn Smart, Score High!</h1>
          <p class="text-xl mb-8 opacity-90">Join thousands of students who have
            successfully passed their PTE exams with our proven teaching methods.</p>
          <div class="flex space-x-4">
            <a href="#" class="btn-primary text-white px-8 py-3 rounded-md text-lg fontmedium">Start Learning</a>
            <a href="#" class="bg-white text-indigo-600 px-8 py-3 rounded-md text-lg fontmedium">Learn More</a>
          </div>
        </div>
        <div class="md:w-1/2" data-aos="fade-left">
          <img src="http://static.photos/education/1024x576/1" alt="Happy students learning"
            class="rounded-lg shadow-xl">
        </div>
      </div>
    </div>
  </div>
  <!-- Features Section -->
  <div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Advanced AI-Powered PTE Tools</ h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">Comprehensive scoring and
            feedback system for all PTE question types</p>
      </div>
      <div class="grid md:grid-cols-4 gap-8">
        <div class="bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all" data-aos="fadeup">
          <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center
mb-6">
            <i data-feather="mic" class="text-indigo-600 w-8 h-8"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Speaking Module</h3>
          <ul class="text-gray-600 space-y-2">
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Read Aloud with pronunciation scoring</span>
            </li>
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Describe Image content analysis</span>
            </li>
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Retell Lecture fluency assessment</span>
            </li>
          </ul>
        </div>
        <div class="bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all" data-aos="fadeup" data-aos-delay="100">
          <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center
mb-6">
            <i data-feather="edit" class="text-indigo-600 w-8 h-8"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Writing Module</h3>
          <ul class="text-gray-600 space-y-2">
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Essay scoring (grammar, vocab)</span>
            </li>
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Summarize written text evaluation</span>
            </li>
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Templates for high-scoring answers</span>
            </li>
          </ul>
        </div>
        <div class="bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all" data-aos="fadeup" data-aos-delay="200">
          <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center
mb-6">
            <i data-feather="headphones" class="text-indigo-600 w-8 h-8"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Listening Module</h3>
          <ul class="text-gray-600 space-y-2">
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Summarize spoken text scoring</span>
            </li>
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Highlight correct summary</span>
            </li>
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Dictation accuracy analysis</span>
            </li>
          </ul>
        </div>
        <div class="bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-all" data-aos="fadeup" data-aos-delay="300">
          <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center
mb-6">
            <i data-feather="book" class="text-indigo-600 w-8 h-8"></i>
          </div>
          <h3 class="text-xl font-bold mb-3">Reading Module</h3>
          <ul class="text-gray-600 space-y-2">
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Fill in blanks (drag & drop)</span>
            </li>
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Re-order paragraphs scoring</span>
            </li>
            <li class="flex items-start">
              <i data-feather="check" class="text-green-500 mr-2 w-4 h-4 mt-0.5"></i>
              <span>Reading comprehension stats</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="mt-12 text-center" data-aos="fade-up">
        <a href="#" class="inline-flex items-center btn-primary text-white px-8 py-3 roundedmd text-lg font-medium">
          Try All Features <i data-feather="arrow-right" class="ml-2 w-5 h-5"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- AI Practice Section -->
  <div class="bg-indigo-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="md:flex items-center">
        <div class="md:w-1/2 mb-12 md:mb-0" data-aos="fade-right">
          <h2 class="text-3xl font-bold text-gray-900 mb-6">Instant AI Scoring & Feedback</ h2>
            <ul class="space-y-4 text-lg text-gray-700 mb-8">
              <li class="flex items-start">
                <div class="bg-indigo-100 p-1 rounded-full mr-3 mt-1">
                  <i data-feather="check" class="text-indigo-700 w-4 h-4"></i>
                </div>
                <span>Real-time evaluation for all PTE tasks</span>
              </li>
              <li class="flex items-start">
                <div class="bg-indigo-100 p-1 rounded-full mr-3 mt-1">
                  <i data-feather="check" class="text-indigo-700 w-4 h-4"></i>
                </div>
                <span>Detailed breakdown of scoring criteria</span>
              </li>
              <li class="flex items-start">
                <div class="bg-indigo-100 p-1 rounded-full mr-3 mt-1">
                  <i data-feather="check" class="text-indigo-700 w-4 h-4"></i>
                </div>
                <span>Targeted improvement suggestions</span>
              </li>
              <li class="flex items-start">
                <div class="bg-indigo-100 p-1 rounded-full mr-3 mt-1">
                  <i data-feather="check" class="text-indigo-700 w-4 h-4"></i>
                </div>
                <span>Progress tracking & analytics</span>
              </li>
            </ul>
            <div class="flex flex-col sm:flex-row gap-4">
              <a href="#" class="btn-primary text-white px-8 py-3 rounded-md text-lg fontmedium text-center">
                Get Started Free
              </a>
              <a href="#" class="bg-white text-indigo-600 border border-indigo-600 px-8 py-3
rounded-md text-lg font-medium text-center flex items-center justify-center">
                <i data-feather="play" class="mr-2 w-5 h-5"></i> Demo Video
              </a>
            </div>
        </div>
        <div class="md:w-1/2" data-aos="fade-left">
          <div class="bg-white p-4 rounded-xl shadow-xl border border-indigo-100">
            <img src="http://static.photos/technology/1024x576/2" alt="PTE Scoring
Dashboard" class="rounded-lg w-full">
            <p class="text-center mt-4 text-gray-600">Our AI scoring dashboard provides
              detailed analysis for each attempt</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Practice Tools Section -->
  <div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Integrated Practice Tools</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Our platform includes everything
          you need for complete PTE preparation</p>
      </div>
      <div class="grid md:grid-cols-4 gap-6">
        <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100" data-aos="fadeup">
          <div class="flex items-center mb-4">
            <div class="bg-indigo-100 p-2 rounded-lg mr-4">
              <i data-feather="file-text" class="text-indigo-600 w-6 h-6"></i>
            </div>
            <h3 class="text-lg font-bold">Practice Tests</h3>
          </div>
          <p class="text-gray-700">Full-length mock tests with realistic PTE timing and
            interface</p>
        </div>
        <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100" data-aos="fadeup" data-aos-delay="100">
          <div class="flex items-center mb-4">
            <div class="bg-indigo-100 p-2 rounded-lg mr-4">
              <i data-feather="clock" class="text-indigo-600 w-6 h-6"></i>
            </div>
            <h3 class="text-lg font-bold">Time Management</h3>
          </div>
          <p class="text-gray-700">Built-in timers help you master the PTE time constraints</ p>
        </div>
        <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100" data-aos="fadeup" data-aos-delay="200">
          <div class="flex items-center mb-4">
            <div class="bg-indigo-100 p-2 rounded-lg mr-4">
              <i data-feather="database" class="text-indigo-600 w-6 h-6"></i>
            </div>
            <h3 class="text-lg font-bold">Question Bank</h3>
          </div>
          <p class="text-gray-700">3000+ questions covering all PTE task types and difficulty
            levels</p>
        </div>
        <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100" data-aos="fadeup" data-aos-delay="300">
          <div class="flex items-center mb-4">
            <div class="bg-indigo-100 p-2 rounded-lg mr-4">
              <i data-feather="activity" class="text-indigo-600 w-6 h-6"></i>
            </div>
            <h3 class="text-lg font-bold">Progress Analytics</h3>
          </div>
          <p class="text-gray-700">Track improvements across all PTE sections with detailed
            charts</p>
        </div>
      </div>
      <div class="mt-12 text-center">
        <a href="#" class="inline-flex items-center text-indigo-600 font-medium text-lg">
          Explore All Practice Tools <i data-feather="arrow-right" class="ml-2 w-5 h-5"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- Courses Section -->
  <div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Our PTE Courses</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Choose the program that fits your
          needs and schedule.</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-up">
          <div class="bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full text-sm fontmedium inline-block mb-6">Basic
          </div>
          <h3 class="text-2xl font-bold mb-4">PTE Foundation</h3>
          <p class="text-gray-600 mb-6">Perfect for beginners starting their PTE journey.</p>
          <div class="mb-6">
            <span class="text-4xl font-bold">$120</span>
            <span class="text-gray-500">/month</span>
          </div>
          <ul class="space-y-3 mb-8">
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>30 classes per month</span>
            </li>
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>Basic study materials</span>
            </li>
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>Group Classes</span>
            </li>
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>Weekly practice tests</span>
            </li>
          </ul>
          <a href="#" class="btn-primary text-white w-full py-3 rounded-md text-lg fontmedium block text-center">Enroll
            Now</a>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg transform scale-105" data-aos="fadeup" data-aos-delay="100">
          <div class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-medium
inline-block mb-6">Popular</div>
          <h3 class="text-2xl font-bold mb-4">PTE Intensive</h3>
          <p class="text-gray-600 mb-6">Our most popular course for serious test-takers.</p>
          <div class="mb-6">
            <span class="text-4xl font-bold">$300</span>
            <span class="text-gray-500">/month</span>
          </div>
          <ul class="space-y-3 mb-8">
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>27 classes per month</span>
            </li>
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>Premium study materials</span>
            </li>
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>Daily practice tests</span>
            </li>
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>1-on-1 coaching sessions</span>
            </li>
          </ul>
          <a href="#" class="btn-primary text-white w-full py-3 rounded-md text-lg fontmedium block text-center">Enroll
            Now</a>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-up" data-aosdelay="200">
          <div class="bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full text-sm fontmedium inline-block mb-6">
            Advanced</div>
          <h3 class="text-2xl font-bold mb-4">PTE Mastery</h3>
          <p class="text-gray-600 mb-6">For students aiming for the highest possible
            scores.</p>
          <div class="mb-6">
            <span class="text-4xl font-bold">$499</span>
            <span class="text-gray-500">/month</span>
          </div>
          <ul class="space-y-3 mb-8">
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>Unlimited classes</span>
            </li>
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>All premium materials</span>
            </li>
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>Personalized study plan</span>
            </li>
            <li class="flex items-center">
              <i data-feather="check" class="text-green-500 mr-2"></i>
              <span>Weekly 1-on-1 sessions</span>
            </li>
          </ul>
          <a href="#" class="btn-primary text-white w-full py-3 rounded-md text-lg fontmedium block text-center">Enroll
            Now</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Learning System Section -->
  <div class="bg-indigo-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="md:flex items-center">
        <div class="md:w-1/2 mb-12 md:mb-0" data-aos="fade-right">
          <img src="http://static.photos/education/1024x576/5" alt="PTE Learning System" class="rounded-xl shadow-2xl">
        </div>
        <div class="md:w-1/2 md:pl-12" data-aos="fade-left">
          <h2 class="text-3xl font-bold mb-6">Smart Learning System</h2>
          <p class="text-xl mb-8 opacity-90">Our AI adapts to your weaknesses and creates
            personalized learning paths</p>
          <ul class="space-y-6 mb-8">
            <li class="flex items-start">
              <div class="bg-white bg-opacity-20 p-2 rounded-full mr-4">
                <i data-feather="zap" class="w-5 h-5"></i>
              </div>
              <div>
                <h4 class="font-bold text-lg mb-1">Weakness Detection</h4>
                <p class="opacity-90">Identifies your problem areas based on practice
                  data</p>
              </div>
            </li>
            <li class="flex items-start">
              <div class="bg-white bg-opacity-20 p-2 rounded-full mr-4">
                <i data-feather="clipboard" class="w-5 h-5"></i>
              </div>
              <div>
                <h4 class="font-bold text-lg mb-1">Custom Study Plans</h4>
                <p class="opacity-90">AI generates focus areas tailored to your needs</p>
              </div>
            </li>
            <li class="flex items-start">
              <div class="bg-white bg-opacity-20 p-2 rounded-full mr-4">
                <i data-feather="trending-up" class="w-5 h-5"></i>
              </div>
              <div>
                <h4 class="font-bold text-lg mb-1">Predictive Scoring</h4>
                <p class="opacity-90">Calculates your potential test score based on current
                  performance</p>
              </div>
            </li>
          </ul>
          <a href="#" class="btn-primary bg-white text-indigo-600 px-8 py-3 rounded-md textlg font-medium inline-block">
            See How It Works
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonials -->
  <div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Success Stories</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">Hear from our students who
          achieved their dream scores.</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="testimonial-card bg-gray-50 p-8 rounded-lg" data-aos="fade-up">
          <div class="flex items-center mb-6">
            <img src="http://static.photos/people/200x200/1" alt="Student" class="w-16 h-16
rounded-full mr-4">
            <div>
              <h4 class="font-bold">Sarah Lim</h4>
              <p class="text-gray-600">Scored 85 in PTE</p>
            </div>
          </div>
          <p class="text-gray-700 italic">"Pawan Pte's teaching methods are exceptional. I
            improved my score by 20 points in just 2 months!"</p>
          <div class="flex mt-4">
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
          </div>
        </div>
        <div class="testimonial-card bg-gray-50 p-8 rounded-lg" data-aos="fade-up" data-aosdelay="100">
          <div class="flex items-center mb-6">
            <img src="http://static.photos/people/200x200/2" alt="Student" class="w-16 h-16
rounded-full mr-4">
            <div>
              <h4 class="font-bold">Raj Patel</h4>
              <p class="text-gray-600">Scored 79 in PTE</p>
            </div>
          </div>
          <p class="text-gray-700 italic">"The intensive course was exactly what I needed. The
            teachers are knowledgeable and supportive."</p>
          <div class="flex mt-4">
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
          </div>
        </div>
        <div class="testimonial-card bg-gray-50 p-8 rounded-lg" data-aos="fade-up" data-aosdelay="200">
          <div class="flex items-center mb-6">
            <img src="http://static.photos/people/200x200/3" alt="Student" class="w-16 h-16
rounded-full mr-4">
            <div>
              <h4 class="font-bold">Wei Chen</h4>
              <p class="text-gray-600">Scored 90 in PTE</p>
            </div>
          </div>
          <p class="text-gray-700 italic">"The personalized attention and study materials
            helped me achieve my target score in record time."</p>
          <div class="flex mt-4">
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
            <i data-feather="star" class="text-yellow-400 w-5 h-5"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- CTA Section -->
  <div class="hero-gradient text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl font-bold mb-6" data-aos="fade-up">Ready to Start Your PTE
        Journey?</h2>
      <p class="text-xl mb-8 max-w-3xl mx-auto" data-aos="fade-up" data-aosdelay="100">Join our next batch and take the
        first step towards your dream score.</p>
      <a href="#" class="btn-primary text-white px-8 py-3 rounded-md text-lg font-medium
inline-block" data-aos="fade-up" data-aos-delay="200">Book a Free Trial Class</a>
    </div>
  </div>
  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4">Pawan Pte</h3>
          <p class="text-gray-400">India’s trusted PTE mentor guiding you to 65+, 79+, and
            beyond.</p>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">PTE Practice </a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Mock Test</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Study Tools</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
          <ul class="space-y-2">
            <li class="flex items-center">
              <i data-feather="map-pin" class="mr-2 w-5 h-5"></i>
              <span class="text-gray-400">Chandigarh | Training Students Across the
                World</span>
            </li>
            <li class="flex items-center">
              <i data-feather="phone" class="mr-2 w-5 h-5"></i>
              <span class="text-gray-400">+91 8222908523
                +91 87083320075
              </span>
            </li>
            <li class="flex items-center">
              <i data-feather="mail" class="mr-2 w-5 h-5"></i>
              <span class="text-gray-400">pawanpteclasses@gmail.com</span>
            </li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white">
              <i data-feather="facebook" class="w-6 h-6"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
              <i data-feather="instagram" class="w-6 h-6"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
              <i data-feather="linkedin" class="w-6 h-6"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
              <i data-feather="youtube" class="w-6 h-6"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
        <p>© 2023 Pawan Pte. All rights reserved.</p>
      </div>
    </div>
  </footer>
  <script>
    AOS.init();
    feather.replace();
  </script>
</body>

</html>