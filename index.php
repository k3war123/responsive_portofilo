<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lana | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: #fff;
            scroll-behavior: smooth;
        }

        .dancing-script {
            font-family: 'Dancing Script', cursive;
        }

        .bg-pattern {
            background-image: radial-gradient(rgba(236, 72, 153, 0.1) 2px, transparent 2px);
            background-size: 40px 40px;
        }

        .floating-text {
            position: absolute;
            font-family: 'Dancing Script', cursive;
            color: rgba(236, 72, 153, 0.1);
            pointer-events: none;
            z-index: -1;
        }

        .logo-animate {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .tech-icon {
            transition: all 0.3s ease;
        }

        .tech-icon:hover {
            transform: scale(1.2);
            filter: drop-shadow(0 0 8px rgba(236, 72, 153, 0.7));
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltip-text {
            visibility: hidden;
            width: 120px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 12px;
        }

        .tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        .fade-in {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: linear-gradient(135deg, #1a1a1a 0%, #111 100%);
            border-radius: 16px;
            width: 90%;
            max-width: 500px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.3);
            border: 1px solid rgba(236, 72, 153, 0.2);
            position: relative;
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .modal-header i {
            font-size: 50px;
            color: #ec4899;
            margin-bottom: 15px;
        }

        .modal-body {
            margin-bottom: 25px;
        }

        .modal-footer {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .modal-btn {
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .modal-btn-confirm {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            color: white;
            border: none;
        }

        .modal-btn-confirm:hover {
            background: linear-gradient(135deg, #db2777 0%, #ec4899 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(236, 72, 153, 0.4);
        }

        .modal-btn-edit {
            background: transparent;
            color: #ec4899;
            border: 1px solid #ec4899;
        }

        .modal-btn-edit:hover {
            background: rgba(236, 72, 153, 0.1);
            transform: translateY(-2px);
        }

        /* Success modal */
        .success-modal .modal-content {
            text-align: center;
        }

        .success-modal .modal-header i {
            color: #10b981;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .modal-content {
                padding: 20px;
            }

            .modal-footer {
                flex-direction: column;
                gap: 10px;
            }

            .modal-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body class="bg-black text-white">
    <!-- Background floating text elements -->
    <div class="floating-text text-6xl top-20 left-10 hidden md:block">create</div>
    <div class="floating-text text-7xl top-1/3 right-16 hidden md:block">develop</div>
    <div class="floating-text text-5xl bottom-1/4 left-1/4 hidden md:block">design</div>
    <div class="floating-text text-6xl bottom-40 right-1/4 hidden md:block">code</div>
    <div class="floating-text text-8xl top-1/2 left-1/2 hidden md:block">innovate</div>

    <!-- Navigation -->
    <nav class="fixed w-full bg-black bg-opacity-90 z-50 py-4 px-6 shadow-lg">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <div class="logo-animate text-2xl font-bold">
                    <span class="text-pink-500">L</span><span class="text-white">ana</span>
                </div>
            </div>

            <div class="hidden md:flex space-x-8">
                <a href="#home" class="text-white hover:text-pink-500 transition">Home</a>
                <a href="#about" class="text-white hover:text-pink-500 transition">About</a>
                <a href="#skills" class="text-white hover:text-pink-500 transition">Skills</a>
                <a href="#contact" class="text-white hover:text-pink-500 transition">Contact</a>
            </div>

            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-black bg-opacity-95 px-6 py-4">
            <div class="flex flex-col space-y-4">
                <a href="#home" class="text-white hover:text-pink-500 transition">Home</a>
                <a href="#about" class="text-white hover:text-pink-500 transition">About</a>
                <a href="#skills" class="text-white hover:text-pink-500 transition">Skills</a>
                <a href="#contact" class="text-white hover:text-pink-500 transition">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center bg-pattern pt-20">
        <div class="max-w-6xl mx-auto px-6 py-20">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 fade-in">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        <span class="text-white">Hello, This Is </span>
                        <span class="text-pink-500 dancing-script">Lana</span>
                    </h1>
                    <h2 class="text-2xl md:text-3xl text-pink-300 mb-6">
                        Full Stack Developer
                    </h2>
                    <p class="text-gray-300 mb-8 text-lg">
                        She build elegant, efficient digital experiences with code. Passionate about creating beautiful,
                        functional solutions that make an impact.
                    </p>
                    <a href="#contact"
                        class="bg-transparent border-2 border-pink-500 text-pink-500 px-8 py-3 rounded-full hover:bg-pink-500 hover:text-white transition duration-300 font-semibold inline-block">
                        Get In Touch
                    </a>
                </div>
                <div class="md:w-1/2 flex justify-center fade-in">
                    <div
                        class="w-64 h-64 md:w-80 md:h-80 bg-gradient-to-br from-pink-900 to-black rounded-full flex items-center justify-center shadow-2xl">
                        <div
                            class="w-60 h-60 md:w-72 md:h-72 rounded-full bg-black border-4 border-pink-500 flex items-center justify-center">
                            <i class="fas fa-code text-pink-500 text-9xl logo-animate"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 fade-in">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-5xl font-bold mb-10 text-center">
                <span class="text-white">About </span>
                <span class="text-pink-500 dancing-script">Her</span>
            </h2>

            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-2/5 flex justify-center mb-10 md:mb-0">
                    <div
                        class="w-full h-auto md:w-96 md:h-96 bg-gradient-to-tr from-pink-900 to-black p-4 rounded-2xl shadow-2xl">
                        <div class="w-full h-full bg-black rounded-lg flex items-center justify-center">
                            <i class="fas fa-laptop-code text-pink-500 text-7xl md:text-9xl"></i>
                        </div>
                    </div>
                </div>

                <div class="md:w-3/5">
                    <p class="text-gray-300 mb-6 text-lg">
                        She's a passionate developer with expertise across the full stack, from crafting beautiful
                        front-end experiences to building robust back-end systems.
                    </p>
                    <p class="text-gray-300 mb-6 text-lg">
                        Her journey in technology is driven by curiosity and a commitment to continuous learning. She
                        specializes in creating responsive, user-centric applications that balance form and function.
                    </p>
                    <p class="text-gray-300 mb-6 text-lg">
                        When she is not coding, you'll find her exploring new technologies, contributing to open source
                        projects, or mentoring aspiring developers.
                    </p>


                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-8">
                        <div class="bg-gradient-to-r from-pink-900 to-black p-4 rounded-lg">
                            <h3 class="text-pink-400 font-semibold mb-2">Frontend</h3>
                            <p class="text-sm text-gray-300">HTML, CSS, JavaScript, Vue.js, Bootstrap</p>
                        </div>
                        <div class="bg-gradient-to-r from-pink-900 to-black p-4 rounded-lg">
                            <h3 class="text-pink-400 font-semibold mb-2">Backend</h3>
                            <p class="text-sm text-gray-300">Laravel, MySQL, SQLite</p>
                        </div>
                        <div class="bg-gradient-to-r from-pink-900 to-black p-4 rounded-lg">
                            <h3 class="text-pink-400 font-semibold mb-2">Mobile</h3>
                            <p class="text-sm text-gray-300">Flutter, Dart</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-gradient-to-b from-black to-gray-900 fade-in">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl md:text-5xl font-bold mb-16 text-center">
                <span class="text-white">Technical </span>
                <span class="text-pink-500 dancing-script">Skills</span>
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8">
                <!-- HTML -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <i class="fab fa-html5 text-5xl text-orange-500 mb-3"></i>
                        <span class="text-white text-sm">HTML</span>
                    </div>
                    <span class="tooltip-text">HTML5 Markup</span>
                </div>

                <!-- CSS -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <i class="fab fa-css3-alt text-5xl text-blue-500 mb-3"></i>
                        <span class="text-white text-sm">CSS</span>
                    </div>
                    <span class="tooltip-text">CSS3 Styling</span>
                </div>

                <!-- JavaScript -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <i class="fab fa-js text-5xl text-yellow-400 mb-3"></i>
                        <span class="text-white text-sm">JavaScript</span>
                    </div>
                    <span class="tooltip-text">JavaScript</span>
                </div>

                <!-- Laravel -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <i class="fab fa-laravel text-5xl text-red-500 mb-3"></i>
                        <span class="text-white text-sm">Laravel</span>
                    </div>
                    <span class="tooltip-text">PHP Framework</span>
                </div>

                <!-- Vue.js -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <i class="fab fa-vuejs text-5xl text-green-400 mb-3"></i>
                        <span class="text-white text-sm">Vue.js</span>
                    </div>
                    <span class="tooltip-text">Vue.js Framework</span>
                </div>

                <!-- Bootstrap -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <i class="fab fa-bootstrap text-5xl text-purple-500 mb-3"></i>
                        <span class="text-white text-sm">Bootstrap</span>
                    </div>
                    <span class="tooltip-text">CSS Framework</span>
                </div>

                <!-- Tailwind CSS -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <i class="fab fa-css3 text-5xl text-cyan-400 mb-3"></i>
                        <span class="text-white text-sm">Tailwind CSS</span>
                    </div>
                    <span class="tooltip-text">Utility-first CSS</span>
                </div>

                <!-- Dart -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <img src="https://cdn.worldvectorlogo.com/logos/dart.svg" alt="Dart" class="h-12 w-12 mb-3">
                        <span class="text-white text-sm">Dart</span>
                    </div>
                    <span class="tooltip-text">Dart Programming</span>
                </div>

                <!-- Flutter -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <img src="https://cdn.worldvectorlogo.com/logos/flutter.svg" alt="Flutter"
                            class="h-12 w-12 mb-3">
                        <span class="text-white text-sm">Flutter</span>
                    </div>
                    <span class="tooltip-text">Cross-platform Mobile</span>
                </div>

                <!-- MySQL -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <img src="https://www.vectorlogo.zone/logos/mysql/mysql-official.svg" alt="MySQL"
                            class="h-12 w-12 mb-3">
                        <span class="text-white text-sm">MySQL</span>
                    </div>
                    <span class="tooltip-text">Relational Database</span>
                </div>


                <!-- SQLite -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <img src="https://cdn.worldvectorlogo.com/logos/sqlite.svg" alt="SQLite" class="h-12 w-12 mb-3">
                        <span class="text-white text-sm">SQLite</span>
                    </div>
                    <span class="tooltip-text">Lightweight Database</span>
                </div>

                <!-- Git -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <i class="fab fa-git-alt text-5xl text-orange-600 mb-3"></i>
                        <span class="text-white text-sm">Git</span>
                    </div>
                    <span class="tooltip-text">Version Control</span>
                </div>

                <!-- GitHub -->
                <div class="tooltip">
                    <div
                        class="tech-icon bg-gray-900 rounded-xl p-6 flex flex-col items-center justify-center shadow-lg hover:shadow-pink-500/30">
                        <i class="fab fa-github text-5xl text-gray-200 mb-3"></i>
                        <span class="text-white text-sm">GitHub</span>
                    </div>
                    <span class="tooltip-text">Code Collaboration</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 fade-in">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl md:text-5xl font-bold mb-16 text-center">
                <span class="text-white">Let's </span>
                <span class="text-pink-500 dancing-script">Connect</span>
            </h2>

            <div class="bg-gradient-to-tr from-pink-900 to-black p-8 rounded-2xl shadow-2xl">
                <form id="contactForm" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-pink-300 mb-1">Your Name</label>
                        <input type="text" id="name" name="name"
                            class="w-full bg-black bg-opacity-50 border border-pink-900 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-pink-500"
                            required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-pink-300 mb-1">Your Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full bg-black bg-opacity-50 border border-pink-900 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-pink-500"
                            required>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-pink-300 mb-1">Your Message</label>
                        <textarea id="message" name="message" rows="5"
                            class="w-full bg-black bg-opacity-50 border border-pink-900 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-pink-500"
                            required></textarea>
                    </div>
                

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-pink-500 to-pink-700 text-white font-semibold py-3 px-6 rounded-lg hover:from-pink-600 hover:to-pink-800 transition duration-300 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-black">
                        Send Message
                    </button>
                </form>

                <div class="mt-12 flex flex-wrap justify-center space-x-6 md:space-x-10">
                    <a href="#" class="text-pink-500 hover:text-pink-300 transition text-2xl">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="text-pink-500 hover:text-pink-300 transition text-2xl">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-pink-500 hover:text-pink-300 transition text-2xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-pink-500 hover:text-pink-300 transition text-2xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-pink-500 hover:text-pink-300 transition text-2xl">
                        <i class="fab fa-codepen"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black py-8 text-center border-t border-pink-900/30">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-pink-500 mb-4 text-2xl">
                <span class="font-bold">L</span>ana
            </div>
            <p class="text-gray-400 text-sm">
                Crafting digital experiences with code and creativity.
            </p>
            <p class="text-gray-500 text-xs mt-6">
                &copy; <span id="year"></span> Lana. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-envelope-circle-check"></i>
                <h3 class="text-2xl font-bold text-white">Confirm Your Message</h3>
            </div>
            <div class="modal-body">
                <p class="text-gray-300 mb-4">Please review your message before sending:</p>
                <div class="bg-black bg-opacity-50 p-4 rounded-lg mb-4">
                    <p class="text-pink-300 font-medium">Email: <span id="review-email" class="text-white"></span></p>
                    <p class="text-pink-300 font-medium mt-2">Message:</p>
                    <p id="review-message" class="text-gray-300 mt-1 whitespace-pre-line"></p>
                </div>
                <p class="text-sm text-gray-400">Your message will be sent to Lana's inbox.</p>
            </div>
            <div class="modal-footer">
                <button id="editMessageBtn" class="modal-btn modal-btn-edit">
                    <i class="fas fa-edit mr-2"></i> Edit
                </button>
                <button id="confirmSendBtn" class="modal-btn modal-btn-confirm">
                    <i class="fas fa-paper-plane mr-2"></i> Send
                </button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal success-modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-check-circle"></i>
                <h3 class="text-2xl font-bold text-white">Message Sent!</h3>
            </div>
            <div class="modal-body">
                <p class="text-gray-300 mb-6">Thank you for your message! I'll get back to you as soon as possible.</p>
                <p class="text-sm text-gray-400">A confirmation has been sent to your email address.</p>
            </div>
            <div class="modal-footer">
                <button id="closeSuccessModalBtn" class="modal-btn modal-btn-confirm">
                    <i class="fas fa-check mr-2"></i> OK
                </button>
            </div>
        </div>
    </div>
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function () {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });

        // Animate elements on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (elementPosition < windowHeight - 100) {
                    element.style.opacity = '1';
                }
            });
        }

        // Set current year in footer
        document.getElementById('year').textContent = new Date().getFullYear();

        // Form submission: show confirmation modal first
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            if (!name || !email || !message) {
                alert('Please fill in all fields.');
                return;
            }

            // Fill confirmation modal content
            document.getElementById('review-email').textContent = email;
            document.getElementById('review-message').textContent = message;

            // Show confirmation modal
            document.getElementById('confirmationModal').style.display = 'flex';
        });

        // Handle edit button in confirmation modal - close modal to allow edits
        document.getElementById('editMessageBtn').addEventListener('click', function () {
            document.getElementById('confirmationModal').style.display = 'none';
        });

        // Handle confirm send button - send AJAX request to server
        document.getElementById('confirmSendBtn').addEventListener('click', function () {
            const form = document.getElementById('contactForm');
            const name = form.name.value.trim();
            const email = form.email.value.trim();
            const message = form.message.value.trim();

            fetch('submit_contact.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ name, email, message })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById('confirmationModal').style.display = 'none';
                        document.getElementById('successModal').style.display = 'flex';
                        form.reset();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(() => {
                    alert('Error sending message. Please try again later.');
                });
        });

        // Close success modal
        document.getElementById('closeSuccessModalBtn').addEventListener('click', function () {
            document.getElementById('successModal').style.display = 'none';
        });

        // Close modals when clicking outside modal content
        window.addEventListener('click', function (event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        });

        // Initialize animations on load and scroll
        window.addEventListener('load', function () {
            animateOnScroll();

            const sections = document.querySelectorAll('section');
            sections.forEach((section, index) => {
                if (section.classList.contains('fade-in')) {
                    section.style.transitionDelay = `${index * 0.1}s`;
                }
            });
        });

        window.addEventListener('scroll', animateOnScroll);
    </script>

</body>

</html>