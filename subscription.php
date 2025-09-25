<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Pawan PTE - Subscription Plans</title>
    <meta name="description"
        content="Choose the perfect PTE preparation plan with AI-powered feedback and practice tools" />
    <meta name="keywords" content="PTE, subscription, English test, preparation, practice" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', 'Roboto', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #12d3bf 0%, #0ba195 100%);
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .logo h1 {
            font-size: 24px;
            font-weight: 700;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 25px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        nav ul li a:hover {
            color: #fcc106;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(18, 211, 191, 0.9), rgba(11, 161, 149, 0.9)), url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 80px 0;
        }

        .hero h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        /* Pricing Section */
        .pricing-section {
            padding: 80px 0;
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .pricing-header h2 {
            font-size: 36px;
            color: #0ba195;
            margin-bottom: 15px;
        }

        .pricing-header p {
            font-size: 18px;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        .pricing-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .pricing-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            width: 100%;
            max-width: 350px;
            position: relative;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .pricing-card.featured {
            border: 2px solid #12d3bf;
            transform: scale(1.03);
            z-index: 1;
        }

        .pricing-card.featured:hover {
            transform: scale(1.06) translateY(-5px);
        }

        .pricing-card .card-header {
            padding: 30px 20px;
            text-align: center;
            background: linear-gradient(135deg, #12d3bf 0%, #0ba195 100%);
            color: white;
        }

        .pricing-card.featured .card-header {
            background: linear-gradient(135deg, #fcc106 0%, #f57c00 100%);
        }

        .pricing-card .price {
            font-size: 48px;
            font-weight: 700;
            margin: 0;
        }

        .pricing-card .price span {
            font-size: 18px;
            font-weight: 400;
        }

        .pricing-card .card-body {
            padding: 30px;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin: 0 0 30px;
        }

        .pricing-features li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .pricing-features li:last-child {
            border-bottom: none;
        }

        .pricing-features li i {
            color: #12d3bf;
            margin-right: 10px;
            font-size: 18px;
        }

        .pricing-card.featured .pricing-features li i {
            color: #fcc106;
        }

        .btn-subscribe {
            display: block;
            width: 100%;
            padding: 15px;
            text-align: center;
            background: #12d3bf;
            color: white;
            border-radius: 6px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-subscribe:hover {
            background: #0ba195;
            color: white;
        }

        .pricing-card.featured .btn-subscribe {
            background: #fcc106;
            color: #333;
        }

        .pricing-card.featured .btn-subscribe:hover {
            background: #f57c00;
            color: white;
        }

        .pricing-badge {
            position: absolute;
            top: 20px;
            right: -35px;
            background: #fcc106;
            color: #333;
            padding: 5px 40px;
            font-weight: 700;
            transform: rotate(45deg);
            font-size: 14px;
        }

        /* FAQ Section */
        .faq-section {
            padding: 80px 0;
            background: white;
        }

        .faq-section h2 {
            text-align: center;
            margin-bottom: 50px;
            color: #0ba195;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .faq-question {
            padding: 20px;
            background: #f9f9f9;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-answer.active {
            padding: 20px;
            max-height: 500px;
        }

        /* Payment Methods */
        .payment-methods {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .payment-method {
            width: 60px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .payment-method:hover {
            opacity: 1;
        }

        /* Footer */
        footer {
            background: #0ba195;
            color: white;
            padding: 40px 0 20px;
            text-align: center;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-bottom: 30px;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 20px;
        }

        .footer-section h3 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #fcc106;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 20px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #999;
        }

        .close-modal:hover {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }

        .btn-pay {
            display: block;
            width: 100%;
            padding: 15px;
            text-align: center;
            background: #12d3bf;
            color: white;
            border-radius: 6px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-pay:hover {
            background: #0ba195;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .pricing-cards {
                flex-direction: column;
                align-items: center;
            }

            .pricing-card {
                margin-bottom: 30px;
            }

            nav ul {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .hero h2 {
                font-size: 28px;
            }

            .hero p {
                font-size: 16px;
            }

            .pricing-header h2 {
                font-size: 28px;
            }

            .pricing-header p {
                font-size: 16px;
            }
        }

        /* User Section */
        .user-section {
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #12d3bf;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            margin-right: 15px;
        }

        .user-details h3 {
            margin-bottom: 5px;
        }

        .user-details p {
            color: #666;
            font-size: 14px;
        }

        .user-actions .btn-logout {
            padding: 8px 15px;
            background: #fcc106;
            color: #333;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        }

        /* Admin Panel */
        .admin-panel {
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 30px;
        }

        .admin-panel h3 {
            margin-bottom: 15px;
            color: #0ba195;
        }

        .admin-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }

        .stat-card h4 {
            font-size: 24px;
            color: #12d3bf;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #666;
            font-size: 14px;
        }

        /* Messages */
        .message {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <img src="https://via.placeholder.com/40" alt="Pawan PTE Logo">
                <h1>Pawan PTE</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Practice</a></li>
                    <li><a href="#">Materials</a></li>
                    <li><a href="#">Results</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h2>Unlock Your PTE Success</h2>
            <p>Choose the perfect subscription plan to access AI-powered practice tests, detailed feedback, and
                comprehensive study materials.</p>
        </div>
    </section>

    <!-- PHP User Section -->
    <div class="container">
        <?php
        // Simulate user authentication
        $isLoggedIn = true;
        $username = "John Doe";
        $userEmail = "john.doe@example.com";
        $userRole = "admin"; // Can be 'admin', 'subscriber', or 'guest'
        $currentPlan = "Premium"; // Can be 'Basic', 'Premium', 'VIP', or 'None'
        
        // Simulate subscription data
        $subscriptions = [
            "total" => 1245,
            "active" => 987,
            "revenue" => 38450
        ];

        // Display user info if logged in
        if ($isLoggedIn) {
            echo '<section class="user-section">';
            echo '<div class="user-info">';
            echo '<div class="user-avatar">' . substr($username, 0, 1) . '</div>';
            echo '<div class="user-details">';
            echo '<h3>' . $username . '</h3>';
            echo '<p>Current Plan: ' . $currentPlan . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="user-actions">';
            echo '<button class="btn-logout">Logout</button>';
            echo '</div>';
            echo '</section>';
        }

        // Display admin panel if user is admin
        if ($isLoggedIn && $userRole === "admin") {
            echo '<section class="admin-panel">';
            echo '<h3>Subscription Overview</h3>';
            echo '<div class="admin-stats">';
            echo '<div class="stat-card">';
            echo '<h4>' . $subscriptions['total'] . '</h4>';
            echo '<p>Total Subscriptions</p>';
            echo '</div>';
            echo '<div class="stat-card">';
            echo '<h4>' . $subscriptions['active'] . '</h4>';
            echo '<p>Active Subscriptions</p>';
            echo '</div>';
            echo '<div class="stat-card">';
            echo '<h4>$' . number_format($subscriptions['revenue']) . '</h4>';
            echo '<p>Total Revenue</p>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
        }
        ?>
    </div>

    <!-- Subscription Plans Section -->
    <section class="pricing-section">
        <div class="container">
            <div class="pricing-header">
                <h2>Choose Your Perfect Plan</h2>
                <p>Unlock AI-powered PTE preparation with features designed for your success</p>
            </div>

            <div class="pricing-cards">
                <!-- Basic Plan -->
                <div class="pricing-card">
                    <div class="card-header">
                        <h3>Basic</h3>
                        <div class="price">$19<span>/month</span></div>
                    </div>
                    <div class="card-body">
                        <ul class="pricing-features">
                            <li><i class="bi bi-check-circle-fill"></i> 50 AI-scored practice questions</li>
                            <li><i class="bi bi-check-circle-fill"></i> Basic performance analytics</li>
                            <li><i class="bi bi-check-circle-fill"></i> Vocabulary builder access</li>
                            <li><i class="bi bi-x-circle"></i> <span style="text-decoration: line-through;">Full mock
                                    tests</span></li>
                            <li><i class="bi bi-x-circle"></i> <span style="text-decoration: line-through;">Personalized
                                    study plan</span></li>
                            <li><i class="bi bi-x-circle"></i> <span style="text-decoration: line-through;">Priority
                                    support</span></li>
                        </ul>
                        <button class="btn-subscribe" data-plan="basic">Get Started</button>
                    </div>
                </div>

                <!-- Premium Plan (Featured) -->
                <div class="pricing-card featured">
                    <div class="pricing-badge">Most Popular</div>
                    <div class="card-header">
                        <h3>Premium</h3>
                        <div class="price">$39<span>/month</span></div>
                    </div>
                    <div class="card-body">
                        <ul class="pricing-features">
                            <li><i class="bi bi-check-circle-fill"></i> Unlimited AI-scored practice</li>
                            <li><i class="bi bi-check-circle-fill"></i> Detailed performance analytics</li>
                            <li><i class="bi bi-check-circle-fill"></i> 5 full mock tests</li>
                            <li><i class="bi bi-check-circle-fill"></i> Vocabulary builder & shadowing tools</li>
                            <li><i class="bi bi-check-circle-fill"></i> Personalized study plan</li>
                            <li><i class="bi bi-x-circle"></i> <span style="text-decoration: line-through;">1-on-1 tutor
                                    sessions</span></li>
                        </ul>
                        <button class="btn-subscribe" data-plan="premium">Get Started</button>
                    </div>
                </div>

                <!-- VIP Plan -->
                <div class="pricing-card">
                    <div class="card-header">
                        <h3>VIP</h3>
                        <div class="price">$79<span>/month</span></div>
                    </div>
                    <div class="card-body">
                        <ul class="pricing-features">
                            <li><i class="bi bi-check-circle-fill"></i> Unlimited AI-scored practice</li>
                            <li><i class="bi bi-check-circle-fill"></i> Advanced performance analytics</li>
                            <li><i class="bi bi-check-circle-fill"></i> Unlimited mock tests</li>
                            <li><i class="bi bi-check-circle-fill"></i> All study tools & materials</li>
                            <li><i class="bi bi-check-circle-fill"></i> 4 x 1-on-1 tutor sessions monthly</li>
                            <li><i class="bi bi-check-circle-fill"></i> Priority 24/7 support</li>
                        </ul>
                        <button class="btn-subscribe" data-plan="vip">Get Started</button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <p>All plans include a 7-day money-back guarantee</p>
                <div class="payment-methods">
                    <img src="https://via.placeholder.com/60x40/fff/999?text=VISA" alt="Visa" class="payment-method">
                    <img src="https://via.placeholder.com/60x40/fff/999?text=MC" alt="Mastercard"
                        class="payment-method">
                    <img src="https://via.placeholder.com/60x40/fff/999?text=PP" alt="PayPal" class="payment-method">
                    <img src="https://via.placeholder.com/60x40/fff/999?text=STRIPE" alt="Stripe"
                        class="payment-method">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2>Frequently Asked Questions</h2>

            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>How does the free trial work?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We offer a 7-day free trial for our Premium plan. You'll get full access to all Premium
                            features during this period. No credit card is required to start your trial.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Can I change or cancel my plan anytime?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, you can upgrade, downgrade, or cancel your subscription at any time. Changes to your
                            plan will take effect at the start of your next billing cycle.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>What payment methods do you accept?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank
                            transfers for certain regions.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>How does the AI scoring work?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our AI uses the same scoring algorithms as the official PTE test. It analyzes your responses
                            for content, pronunciation, fluency, and grammar to provide accurate scores and detailed
                            feedback.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Do you offer discounts for students?</span>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer a 15% student discount. Please contact our support team with proof of your
                            student status to get a discount code.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Payment Modal -->
    <div class="modal" id="paymentModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Complete Your Subscription</h2>
            <p>You are subscribing to: <strong id="selectedPlan">Premium Plan</strong></p>

            <form id="paymentForm" method="POST" action="process_subscription">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" id="cardNumber" name="card_number" placeholder="1234 5678 9012 3456" required>
                </div>

                <div class="form-group" style="display: flex; gap: 15px;">
                    <div style="flex: 1;">
                        <label for="expiry">Expiry Date</label>
                        <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" placeholder="123" required>
                    </div>
                </div>

                <input type="hidden" id="planType" name="plan_type" value="premium">

                <button type="submit" class="btn-pay">Pay Now</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Pawan PTE</h3>
                    <p>AI-powered PTE preparation with instant feedback and detailed analytics.</p>
                </div>

                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Practice Tests</a></li>
                        <li><a href="#">Study Materials</a></li>
                        <li><a href="#">Subscription Plans</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <ul>
                        <li><i class="bi bi-envelope"></i> support@pawanpte.com</li>
                        <li><i class="bi bi-telephone"></i> +1 (234) 567-8900</li>
                        <li><i class="bi bi-geo-alt"></i> 123 Education St, Learning City</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2023 Pawan PTE. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // DOM Elements
        const subscribeButtons = document.querySelectorAll('.btn-subscribe');
        const modal = document.getElementById('paymentModal');
        const closeModal = document.querySelector('.close-modal');
        const selectedPlanElement = document.getElementById('selectedPlan');
        const planTypeInput = document.getElementById('planType');
        const paymentForm = document.getElementById('paymentForm');
        const faqQuestions = document.querySelectorAll('.faq-question');

        // Plan data
        const plans = {
            basic: {
                name: 'Basic Plan',
                price: 19
            },
            premium: {
                name: 'Premium Plan',
                price: 39
            },
            vip: {
                name: 'VIP Plan',
                price: 79
            }
        };

        // Event Listeners
        subscribeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const planType = button.getAttribute('data-plan');
                openModal(planType);
            });
        });

        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        paymentForm.addEventListener('submit', (e) => {
            // Form validation would happen here before submission to PHP
            const cardNumber = document.getElementById('cardNumber').value;
            const expiry = document.getElementById('expiry').value;
            const cvv = document.getElementById('cvv').value;

            if (!isValidCardNumber(cardNumber)) {
                e.preventDefault();
                alert('Please enter a valid card number');
                return;
            }

            if (!isValidExpiry(expiry)) {
                e.preventDefault();
                alert('Please enter a valid expiry date (MM/YY)');
                return;
            }

            if (!isValidCVV(cvv)) {
                e.preventDefault();
                alert('Please enter a valid CVV');
                return;
            }

            // If validation passes, the form will submit to process_subscription
        });

        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('i');

                // Toggle active class
                answer.classList.toggle('active');

                // Change icon
                if (answer.classList.contains('active')) {
                    icon.classList.remove('bi-chevron-down');
                    icon.classList.add('bi-chevron-up');
                } else {
                    icon.classList.remove('bi-chevron-up');
                    icon.classList.add('bi-chevron-down');
                }
            });
        });

        // Functions
        function openModal(planType) {
            const plan = plans[planType];
            selectedPlanElement.textContent = plan.name + ' - $' + plan.price + '/month';
            planTypeInput.value = planType;
            modal.style.display = 'flex';
        }

        function isValidCardNumber(cardNumber) {
            // Simple validation - in real application, use a library
            return cardNumber.replace(/\s/g, '').length === 16;
        }

        function isValidExpiry(expiry) {
            return /^\d{2}\/\d{2}$/.test(expiry);
        }

        function isValidCVV(cvv) {
            return /^\d{3,4}$/.test(cvv);
        }

        // Initialize page with some animations
        document.addEventListener('DOMContentLoaded', () => {
            // Animate pricing cards on scroll
            const pricingCards = document.querySelectorAll('.pricing-card');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            pricingCards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        });
    </script>
</body>

</html>