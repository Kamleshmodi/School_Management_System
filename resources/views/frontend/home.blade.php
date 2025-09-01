<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduManage Pro | School Management System</title>
    <link rel="shortcut icon" type="png" href="images/icon/favicon.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
        <!-- Libraries Stylesheet -->
        <link href=" {{ asset('assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href=" {{ asset('assets/frontend/lib/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href=" {{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">


    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        html, body {
            width: 100%;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }
        
        /* Header Styles */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 20px;
        }
        
        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: #166088;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .logo-text i {
            margin-right: 10px;
            color: #4fc3f7;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin: 0 15px;
            position: relative;
        }
        
        nav ul li a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
            padding: 5px 0;
        }
        
        nav ul li a.active {
            color: #4fc3f7;
        }
        
        nav ul li a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #4fc3f7;
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }
        
        nav ul li a:hover:after,
        nav ul li a.active:after {
            width: 100%;
        }
        
        .get-started {
            background: #4fc3f7;
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 2px solid #4fc3f7;
        }
        
        .get-started:hover {
            background: transparent;
            color: #4fc3f7;
        }
        
        /* Main Content */
        main {
            padding-top: 80px; /* Space for fixed header */
        }
        
        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 50px 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
        }
        
        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            width: 100%;
        }
        
        .hero-text {
            flex: 1;
            padding-right: 50px;
        }
        
        .hero-text h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #166088;
            line-height: 1.3;
        }
        
        .hero-text p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .hero-image {
            flex: 1;
            text-align: center;
        }
        
        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* Sections */
        .section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 50px;
            color: #166088;
            position: relative;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: #4fc3f7;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Popular Subjects */
        .courses {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .course-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        
        .course-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            width: calc(25% - 20px);
            min-width: 200px;
            text-align: center;
        }
        
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .course-card a {
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .course-card img {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }
        
        /* About Section */
        .about {
            display: flex;
            align-items: center;
            gap: 50px;
        }
        
        .about-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease;
        }
        
        .about-image img:hover {
            transform: scale(1.05);
        }
        
        .about-text {
            flex: 1;
        }
        
        .about-text h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #166088;
        }
        
        .about-text p {
            margin-bottom: 15px;
            line-height: 1.8;
            color: #666;
        }
        
        /* Stats */
        .stats {
            background: linear-gradient(135deg, #4a6fa5 0%, #166088 100%);
            color: white;
            padding: 50px 20px;
            text-align: center;
        }
        
        .stats p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        
        .stats-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            min-width: 200px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.2);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        /* Team Section */
        .team-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 50px;
        }
        
        .team-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.3s ease;
            width: 300px;
            text-align: center;
            padding: 30px 20px;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .team-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #4fc3f7;
            margin-bottom: 20px;
        }
        
        .team-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #166088;
        }
        
        .team-quote {
            font-style: italic;
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        
        .rating {
            font-size: 1.2rem;
            color: #FFD700;
            margin-top: 10px;
        }
        
        /* Services */
        .services-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }
        
        .service-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px 20px;
            text-align: center;
            transition: all 0.3s ease;
            width: 250px;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .service-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }
        
        .service-card p {
            font-weight: 500;
            color: #333;
        }
        
        /* Reviews */
        .reviews {
            background: #f8f9fa;
            padding: 80px 20px;
        }
        
        .reviews-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 50px;
        }
        
        .review-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            transition: all 0.3s ease;
            width: 350px;
        }
        
        .review-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .reviewer {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .reviewer img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }
        
        .reviewer-info h4 {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .reviewer-info h5 {
            color: #4fc3f7;
            font-size: 0.9rem;
        }
        
        .stars {
            margin-top: 5px;
        }
        
        .stars img {
            width: 15px;
            height: 15px;
        }
        
        .review-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: #166088;
        }
        
        .review-content {
            color: #666;
            line-height: 1.6;
        }
        
        /* Contact Form */
        .contact-form {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 50px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        
        .form-group .required {
            color: #dc3545;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #4fc3f7;
            box-shadow: 0 0 0 3px rgba(79, 195, 247, 0.2);
            outline: none;
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .submit-btn {
            background: #4fc3f7;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            background: #166088;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Feedback */
        .feedback {
            text-align: center;
            margin: 80px 0 30px;
        }
        
        .feedback-title {
            font-size: 2.5rem;
            color: #166088;
            position: relative;
            margin-bottom: 15px;
        }
        
        .feedback-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: #4fc3f7;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .feedback-desc {
            margin-bottom: 50px;
            color: #666;
        }
        
        /* Marquee */
/* Marquee */
.marquee {
    background: linear-gradient(to right, #4a6fa5, #166088);
    padding: 20px 0;
    color: white;
    font-size: 1.1rem;
    margin-top: 50px;
    overflow: hidden; /* Important for marquee effect */
    white-space: nowrap; /* Prevents text from wrapping */
    position: relative;
}

.marquee-content {
    display: inline-block;
    padding-left: 100%; /* Start off-screen */
    animation: marquee 30s linear infinite;
}


        @keyframes marquee {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
        
        @keyframes wave {
            0% { transform: rotate(0deg); }
            10% { transform: rotate(-5deg); }
            20% { transform: rotate(10deg); }
            30% { transform: rotate(-5deg); }
            40% { transform: rotate(10deg); }
            50% { transform: rotate(0deg); }
            100% { transform: rotate(0deg); }
        }
        
        /* Footer */
        footer {
            background: #2e3d49;
            color: white;
            padding: 50px 20px 20px;
        }
        
        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-col {
            flex: 1;
            min-width: 300px;
            margin-bottom: 30px;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        
        .footer-logo i {
            margin-right: 10px;
            color: #4fc3f7;
        }
        
        .social-links {
            display: flex;
            margin: 20px 0;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 15px;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
        }
        
        .social-links a:hover {
            background: #4fc3f7;
            transform: translateY(-5px);
        }
        
        .contact-info {
            margin: 15px 0;
            display: flex;
            align-items: center;
        }
        
        .contact-info i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .newsletter-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        
        .newsletter-desc {
            margin-bottom: 20px;
        }
        
        .newsletter-form {
            display: flex;
        }
        
        .newsletter-input {
            flex: 1;
            padding: 12px 15px;
            border: none;
            border-radius: 30px 0 0 30px;
            font-size: 1rem;
            outline: none;
        }
        
        .newsletter-btn {
            padding: 12px 20px;
            background: #4fc3f7;
            color: white;
            border: none;
            border-radius: 0 30px 30px 0;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .newsletter-btn:hover {
            background: #166088;
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            margin-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.5);
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .about {
                flex-direction: column;
            }
            
            .course-card {
                width: calc(33.33% - 20px);
            }
        }
        
        @media (max-width: 768px) {
            nav ul {
                display: none;
            }
            
            .hero-container {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-text {
                padding-right: 0;
                margin-bottom: 40px;
            }
            
            .course-card {
                width: calc(50% - 20px);
            }
            
            .contact-form {
                padding: 30px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
        
        @media (max-width: 576px) {
            .course-card {
                width: 100%;
            }
            
            .section-title, .feedback-title {
                font-size: 2rem;
            }
            
            .hero-text h1 {
                font-size: 2rem;
            }
        }

        /*** Testimonial ***/
.testimonial-carousel::before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    height: 100%;
    width: 0;
    background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
    z-index: 1;
}

.testimonial-carousel::after {
    position: absolute;
    content: "";
    top: 0;
    right: 0;
    height: 100%;
    width: 0;
    background: linear-gradient(to left, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
    z-index: 1;
}

@media (min-width: 768px) {
    .testimonial-carousel::before,
    .testimonial-carousel::after {
        width: 200px;
    }
}

@media (min-width: 992px) {
    .testimonial-carousel::before,
    .testimonial-carousel::after {
        width: 300px;
    }
}

.testimonial-carousel .owl-item .testimonial-text,
.testimonial-carousel .owl-item.center .testimonial-text * {
    transition: .5s;
}

.testimonial-carousel .owl-item.center .testimonial-text {
    background: var(--primary) !important;
}

.testimonial-carousel .owl-item.center .testimonial-text * {
    color: #FFFFFF !important;
}

.testimonial-carousel .owl-dots {
    margin-top: 24px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
}

.testimonial-carousel .owl-dot {
    position: relative;
    display: inline-block;
    margin: 0 5px;
    width: 15px;
    height: 15px;
    border: 1px solid #CCCCCC;
    transition: .5s;
}

.testimonial-carousel .owl-dot.active {
    background: var(--primary);
    border-color: var(--primary);
}
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <header id="header">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo-text animate__animated animate__fadeInLeft"><i class="fas fa-graduation-cap"></i> Adrash Vidya Mandir</a>
            <nav>
                <ul class="animate__animated animate__fadeInRight">
                    <li><a class="active" href="#home">Home</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                    {{-- <li><a href="#Gallery">Gallery</a></li> --}}
                    
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <a class="get-started" href="{{ route('login') }}">Login</a>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section id="home" class="hero">
            <div class="hero-container" data-aos="fade-up">
                <div class="hero-text">
                    <h1>The beautiful thing about learning is that nobody can take it away from you</h1>
                    <p>Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include teaching, training, storytelling, discussion and directed research!</p>
                    <a href="#services" class="get-started">Explore Services</a>
                </div>
                <div class="hero-image" data-aos="fade-left">
                    <img src="{{ asset('assets/frontend/images/photo1.jpg') }}" alt="Students Learning">
                </div>
            </div>
        </section>

        <!-- Popular Subjects -->
        <section class="courses">
            <h2 class="section-title" data-aos="fade-up">Popular Subjects</h2>
            <div class="course-grid">
                <div class="course-card" data-aos="fade-up" data-aos-delay="100">
                    <a href="#">
                        <img src="{{ asset('assets/frontend/images/courses/book.png') }}" alt="JEE Preparation">
                        JEE Preparation
                    </a>
                </div>
                <div class="course-card" data-aos="fade-up" data-aos-delay="200">
                    <a href="#">
                        <img src="{{ asset('assets/frontend/images/courses/d1.png') }}" alt="GATE Preparation">
                        GATE Preparation
                    </a>
                </div>
                <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                    <a href="#">
                        <img src=" {{ asset('assets/frontend/images/courses/paper.png') }}" alt="Sample Papers">
                        Sample Papers
                    </a>
                </div>
                <div class="course-card" data-aos="fade-up" data-aos-delay="400">
                    <a href="#">
                        <img src="  {{ asset('assets/frontend/images/courses/d1.png') }}" alt="Daily Quiz">
                        Daily Quiz
                    </a>
                </div>
                <div class="course-card" data-aos="fade-up" data-aos-delay="100">
                    <a href="#">
                        <img src="{{ asset('assets/frontend/images/courses/computer.png') }}" alt="Computer Courses">
                        Computer Courses
                    </a>
                </div>
                <div class="course-card" data-aos="fade-up" data-aos-delay="200">
                    <a href="#">
                        <img src=" {{ asset('assets/frontend/images/courses/data.png') }}" alt="Data Structures">
                        Data Structures
                    </a>
                </div>
                <div class="course-card" data-aos="fade-up" data-aos-delay="300">
                    <a href="#">
                        <img src="{{ asset('assets/frontend/images/courses/algo.png') }}" alt="Algorithm">
                        Algorithm
                    </a>
                </div>
                <div class="course-card" data-aos="fade-up" data-aos-delay="400">
                    <a href="#">
                        <img src="{{ asset('assets/frontend/images/courses/projects.png') }}" alt="Projects">
                        Projects
                    </a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="section">
            <h2 class="section-title" data-aos="fade-up">About Us</h2>
            <div class="about" data-aos="fade-up">
                <div class="about-image">
                    <img src=" {{ asset('assets/frontend/images/extra/e3.jpg') }}" alt="About Us">
                </div>
                <div class="about-text">
                    <h2>What you think about us?</h2>
                    <p>Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include teaching, training, storytelling, discussion and directed research.</p>
                    <p>Educational website can include websites that have games, videos or topic related resources that act as tools to enhance learning and supplement classroom teaching. These websites help make the process of learning entertaining and attractive to the student, especially in today's age.</p>
                    <p>Using HTML(HyperText Markup Language), CSS(Cascading Style Sheet), JavaScript, we can make learning more easier and in a interesting way.</p>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats">
            <p data-aos="fade-up">We're increasing this data every year</p>
            <div class="stats-grid">
                <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-number">1154</div>
                    <div>Enrolled Students</div>
                </div>
                <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number">62</div>
                    <div>Total Courses</div>
                </div>
                <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-number">489</div>
                    <div>Placed Students</div>
                </div>
                <div class="stat-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-number">527</div>
                    <div>Total Projects</div>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section id="portfolio" class="section">
            <h2 class="section-title" data-aos="fade-up">Our Portfolio</h2>
            <div class="content" data-aos="fade-up">
                <p>"Education is the passport to the future, for tomorrow belongs to those who prepare for it today." "Your attitude, not your aptitude, will determine your altitude." "If you think education is expensive, try ignorance." "The only person who is educated is the one who has learned how to learn …and change."</p>
            </div>
        </section>

        <!-- Team Section -->
        <section id="team" class="section">
            <h2 class="section-title" data-aos="fade-up">Our Team</h2>
            <div class="team-grid">
                <div class="team-card" data-aos="fade-up" data-aos-delay="100">
                    <img src=" {{ asset('assets/frontend/images/t1.jpg') }}" alt="Roshan Kumar">
                    <h3 class="team-name">Kamlesh Kumar</h3>
                    <p class="team-quote">"You can teach a student a lesson for a day; but if you can teach him to learn by creating curiosity, he will continue the learning process as long as he lives"</p>
                    <div class="rating">★★★★☆</div>
                </div>
                <div class="team-card" data-aos="fade-up" data-aos-delay="200">
                    <img src=" {{ asset('assets/frontend/images/creator/roshan2.jpeg') }}" alt="Roshan Kumar">
                    <h3 class="team-name">Sachin Nagar</h3>
                    <p class="team-quote">"Real education should consist of drawing the goodness and the best out of our own students. What better books can there be than the book of humanity"</p>
                    <div class="rating">★★★★☆</div>
                </div>
                <div class="team-card" data-aos="fade-up" data-aos-delay="300">
                    <img src=" {{ asset('assets/frontend/images/creator/roshan2.jpeg') }}" alt="Roshan Kumar">
                    <h3 class="team-name">Ashish Kumar</h3>
                    <p class="team-quote">"Teaching is not about filling a bucket, but lighting a fire of curiosity, kindness, and courage."</p>
                    <div class="rating">★★★★☆</div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="section">
            <h2 class="section-title" data-aos="fade-up">Our Services</h2>
            <div class="services-grid">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <img src=" {{ asset('assets/frontend/images/icon/computer-courses.png') }}" alt="Computer Courses">
                    <p>Free Online Computer Courses</p>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <img src=" {{ asset('assets/frontend/images/icon/brainbooster.png') }}" alt="Competitive Exams">
                    <p>Building Concepts for Competitive Exams</p>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <img src=" {{ asset('assets/frontend/images/icon/online-tutorials.png') }}" alt="Video Lectures">
                    <p>Online Video Lectures</p>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="400">
                    <img src=" {{ asset('assets/frontend/images/icon/papers.jpg') }}" alt="Sample Papers">
                    <p>Sample Papers of Various Competitive Exams</p>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="500">
                    <img src=" {{ asset('assets/frontend/images/icon/p3.png') }}" alt="Performance Report">
                    <p>Performance and Ranking Report</p>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="600">
                    <img src=" {{ asset('assets/frontend/images/icon/discussion.png') }}" alt="Discussion">
                    <p>Discussion with Our Tutors & Mentors</p>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="700">
                    <img src=" {{ asset('assets/frontend/images/icon/q1.png') }}" alt="Brain Teasing">
                    <p>Daily Brain Teasing Questions to Improve IQ</p>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="800">
                    <img src=" {{ asset('assets/frontend/images/icon/help.png') }}" alt="Online Support">
                    <p>24x7 Online Support</p>
                </div>
            </div>
        </section>

        <!-- Reviews Section -->
        <section class="reviews">
            <h2 class="section-title" data-aos="fade-up">What the Students Say About Us?</h2>
            <div class="reviews-grid">
                <div class="review-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="reviewer">
                        <img src=" {{ asset('assets/frontend/images/creator/humanNotExist1.jpg') }}" alt="Sophie Daniel">
                        <div class="reviewer-info">
                            <h4>Sophie Daniel</h4>
                            <h5>Java</h5>
                            <div class="stars">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <h4 class="review-title">Review:</h4>
                    <p class="review-content">I did Java Fundamenetal course with Rishab Sir. It was a great experience. The brain teasers and assignments, actually the whole lot of content was really good. Some problems were challenging yet interesting. Was explained very well where ever I stuck...</p>
                </div>
                <div class="review-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="reviewer">
                        <img src=" {{ asset('assets/frontend/images/creator/humanNotExist2.jpg') }}" alt="Clayton Clair">
                        <div class="reviewer-info">
                            <h4>Clayton Clair</h4>
                            <h5>C/C++</h5>
                            <div class="stars">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <h4 class="review-title">Review:</h4>
                    <p class="review-content">When I was watching "Dear Zindagi", I could relate Sharukh Khan to Arnav Bhaiya. The way Sharukh Khan was giving life lessons to Alia Bhatt, in the same way Arnav Bhaiya will give coding life lessons which will guide you throughout your code life...</p>
                </div>
                <div class="review-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="reviewer">
                        <img src=" {{ asset('assets/frontend/images/creator/humanNotExist3.jpg') }}" alt="Devyn Sethi">
                        <div class="reviewer-info">
                            <h4>Devyn Sethi</h4>
                            <h5>JEE</h5>
                            <div class="stars">
                                <img src="  {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <h4 class="review-title">Review:</h4>
                    <p class="review-content">LearnEd was an amazing experience for me. I belong to electronics department and had a little experience in coding but I think it has helped me think things through in a much more analytical manner. Coding is important no matter which branch you are in. It gives you a better understanding about how to approach a problem...</p>
                </div>
                <div class="review-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="reviewer">
                        <img src=" {{ asset('assets/frontend/images/creator/humanNotExist4.jpg') }}" alt="Rylee Phillips">
                        <div class="reviewer-info">
                            <h4>Rylee Phillips</h4>
                            <h5>Python</h5>
                            <div class="stars">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                                <img src=" {{ asset('assets/frontend/images/icon/star.png') }}" alt="star">
                            </div>
                        </div>
                    </div>
                    <h4 class="review-title">Review:</h4>
                    <p class="review-content">This was my first complete course at coding blocks. I attended the Python course in Winter 2020 and loved it which made me join the full course. Shubham bhaiya and Ayush Bhaiya(TA) have good knowledge about the field and were very helpful in making us understand the concepts. I would certainly recommend this to anyone...</p>
                </div>
            </div>
        </section>
        <

        <!-- Gallery Section -->
        {{-- <section id="Gallery" class="section">
            <h2 class="section-title" data-aos="fade-up">Gallery</h2>
            <div class="content" data-aos="fade-up">
                <p>"Education is the passport to the future, for tomorrow belongs to those who prepare for it today." "Your attitude, not your aptitude, will determine your altitude." "If you think education is expensive, try ignorance." "The only person who is educated is the one who has learned how to learn …and change."</p>
            </div>
        </section> --}}
                <!-- Testimonial Start -->
    {{-- <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src=" {{ asset('assets/frontend/images/creator/humanNotExist1.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src=" {{ asset('assets/frontend/images/creator/humanNotExist2.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src=" {{ asset('assets/frontend/images/creator/humanNotExist4.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src=" {{ asset('assets/frontend/images/creator/humanNotExist3.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End --> --}}


        <!-- Contact Section -->
        <section id="contact" class="section">
            <h2 class="section-title" data-aos="fade-up">Contact Us</h2>
            <div class="contact-form" data-aos="fade-up">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div style="flex: 1;">
                                <label for="first-name">First Name <span class="required">*</span></label>
                                <input type="text" id="first-name" class="form-control" required>
                            </div>
                            <div style="flex: 1;">
                                <label for="last-name">Last Name <span class="required">*</span></label>
                                <input type="text" id="last-name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message <span class="required">*</span></label>
                        <input type="text" id="message" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="details">Additional Details</label>
                        <textarea id="details" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section>
{{-- 
        <!-- Feedback Section -->
        <section class="feedback">
            <h2 class="feedback-title" data-aos="fade-up">Give Feedback</h2>
            <p class="feedback-desc" data-aos="fade-up">Please share your valuable feedback to us</p>
            <div class="contact-form" data-aos="fade-up">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="feedback-name">Your Name</label>
                        <input type="text" id="feedback-name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="feedback-email">Email</label>
                        <input type="email" id="feedback-email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="feedback-details">Additional Details</label>
                        <textarea id="feedback-details" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section> --}}

        <!-- Marquee -->
        <div class="marquee">
            <div class="marquee-content">
                "Education is the passport to the future, for tomorrow belongs to those who prepare for it today." "Your attitude, not your aptitude, will determine your altitude." "If you think education is expensive, try ignorance." "The only person who is educated is the one who has learned how to learn …and change."
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-logo">
                    <i class="fas fa-graduation-cap"></i> EduManage Pro
                </div>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="contact-info">
                    <i class="fas fa-map-marker-alt"></i>
                    <span> Adrash Vidhya Mandir Sr. Sec. Sirohi, Sirohi, Rajasthan-342001</span>
                </div>
                <div class="contact-info">
                    <i class="fas fa-phone-alt"></i>
                    <span>+91-1234-567-890</span>
                </div>
                <div class="contact-info">
                    <i class="fas fa-envelope"></i>
                    <span>avm@gmail.com</span>
                </div>
            </div>
            <div class="footer-col">
                <h3 class="newsletter-title">Our Newsletter</h3>
                <p class="newsletter-desc">Enter Your Email to get our News and updates.</p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Enter Your Email">
                    <button type="submit" class="newsletter-btn">Submit</button>
                </form>
            </div>
        </div>
        <p class="copyright">Copyright © 2025 Created By Kamlesh Kumar, All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src=" {{ asset('assets/frontend/lib/aos/aos.js') }}"></script>
        <script src=" {{ asset('assets/frontend/lib/smooth-scroll/smooth-scroll.polyfills.min.js') }}"></script>
        <script src=" {{ asset('assets/frontend/lib/smooth-scroll/smooth-scroll.min.js') }}"></script>
        <script src=" {{ asset('assets/frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            once: true,
            duration: 800
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.style.background = '#166088';
                header.style.padding = '10px 0';
                document.querySelector('.logo-text').style.color = 'white';
                const links = document.querySelectorAll('nav ul li a');
                links.forEach(link => {
                    link.style.color = 'white';
                });
                document.querySelector('.get-started').style.background = 'white';
                document.querySelector('.get-started').style.color = '#166088';
                document.querySelector('.get-started').style.borderColor = 'white';
            } else {
                header.style.background = 'white';
                header.style.padding = '15px 0';
                document.querySelector('.logo-text').style.color = '#166088';
                const links = document.querySelectorAll('nav ul li a');
                links.forEach(link => {
                    link.style.color = '#333';
                });
                document.querySelector('.get-started').style.background = '#4fc3f7';
                document.querySelector('.get-started').style.color = 'white';
                document.querySelector('.get-started').style.borderColor = '#4fc3f7';
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active link highlighting
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('nav ul li a');

        window.addEventListener('scroll', function() {
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (pageYOffset >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });

        // Form submission animation
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                    
                    setTimeout(() => {
                        submitBtn.innerHTML = '<i class="fas fa-check"></i> Sent!';
                        
                        setTimeout(() => {
                            submitBtn.innerHTML = 'Send Message';
                            this.reset();
                        }, 2000);
                    }, 1500);
                }
            });
        });

        // Newsletter subscription
        const newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const submitBtn = this.querySelector('button[type="submit"]');
                const emailInput = this.querySelector('input[type="email"]');
                
                if (emailInput.value) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    
                    setTimeout(() => {
                        submitBtn.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
                        emailInput.value = '';
                        
                        setTimeout(() => {
                            submitBtn.innerHTML = 'Submit';
                        }, 2000);
                    }, 1500);
                }
            });
        }
    </script>
</body>
</html>