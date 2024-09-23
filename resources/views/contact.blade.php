<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Ruang Tenang</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<header>
    <div class="logo">
        <h1>Logo</h1>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('articles') }}">Articles</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('aboutus') }}">About Us</a></li>
        </ul>
    </nav>
    <div class="auth-buttons">
        @auth
        <!-- Authenticated User Content -->
        <div class="dropdown">
            <button class="dropdown-button" onclick="toggleDropdown()">
                <span>{{ Auth::user()->name }}</span>
                <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            
            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="dropdown-menu hidden">
                <a href="{{ route('profile.edit') }}" class="dropdown-link">Profile</a>
                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-link">Log Out</button>
                </form>
            </div>
        </div>
        @endauth

        @guest
        <!-- Guest User Content -->
        <button class="auth-button" onclick="openLoginModal()">Login</button>
        <button class="auth-button" onclick="openSignUpModal()">Sign Up</button>
        @endguest
    </div>
</header>

    <!-- Contact Us Section -->
    <section class="contact-us">
        <h1>CONTACT US</h1>
        <p>Ingin hidup sehat? Ayok hubungi kami Ruang tenang</p>
        
        <div class="contact-container">
            <div class="form-container">
                <form action="#" method="post">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" required>
                    
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                    
                    <button type="submit">SUBMIT BUTTON</button>
                </form>
            </div>
            <div class="contact-info">
                <p><strong>Email</strong></p>
                <p>ruangtenang@gmail.com</p>
                
                <p><strong>Phone</strong></p>
                <p>+62 8123 245 6789</p>
                
                <p><strong>Address</strong></p>
                <p>Jl. Jamin Ginting Km. 11 No. 9C, Simpang Selayang, Kec. Medan Tuntungan, Kota Medan, Sumatera Utara 20135</p>
                
                <div class="social-media">
                    <a href="#">Instagram</a>
                    <a href="#">X</a>
                    <a href="#">Youtube</a>
                    <a href="#">Facebook</a>
                </div>
            </div>
        </div>
        
        <div class="map-container">
            <p><strong>SMK Telkom 1 Medan</strong></p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7895.854968864115!2d98.61840727994563!3d3.52204368950466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031257487ec36b7%3A0xf835dac8905a90db!2sTelkom%20School%20Medan!5e0!3m2!1sen!2sus!4v1709607433496!5m2!1sen!2sus" width="1300" height="300" style="border:10;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-info">
            <div class="contact-info">
                <p>Email: ruangtenang@gmail.com</p>
                <p>Phone: +62 813 245 6789</p>
                <p>Address: Jl. Jamin Ginting Km. 11 No. 9C, Simpang Selayang, Kec. Medan Tuntungan, Kota Medan, Sumatera Utara 20135</p>
            </div>
            <div class="social-media">
                <p>Follow us on:</p>
                <p>Instagram | YouTube | Facebook</p>
            </div>
            <div class="footer-nav">
                <p>Navigation:</p>
                <p>Home | Doctors | Articles | Contact | About Us</p>
            </div>
        </div>
        <p class="copyright">© 2024 All rights reserved.</p>
    </footer>

     <!-- Login Modal -->
   <div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeLoginModal()">&times;</span>
        <div class="modal-logo">
            <h2>Ruang Tenang</h2>
        </div>
        <form action="{{ route('login') }}" method="POST" class="login-form">
    @csrf
    <h3>Log In</h3>
    <p>Don't have an account? <a href="#" onclick="openSignUpModal()">Sign Up</a></p>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required>
    <div class="remember-me">
        <input type="checkbox" id="rememberMe" name="remember">
        <label for="rememberMe">Remember me</label>
    </div>
    <button type="submit" class="login1-btn">Log In</button>
    <a href="{{ route('password.request') }}" class="forgot-password">Forgot my password</a>
</form>

        </div>
    </div>

    <div id="signUpModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeSignUpModal()">&times;</span>
        <div class="modal-logo">
            <h2>Ruang Tenang</h2>
        </div>
        <form class="signup-form" action="{{ route('register') }}" method="POST">
        @csrf
            <h3>Sign Up</h3>
            <p>Already have an account? <a href="#" onclick="openLoginModal()">Log In</a></p>

            <!-- Profile Name -->
            <label for="profileName">Enter Your Name</label>
            <input type="text" id="name" type="text" name="name" :value="old('name')">

            <!-- Email -->
            <label for="email">Email</label>
            <input type="email" id="email" type="email" name="email" :value="old('email')" required autocomplete="username">

            <!-- Password -->
            <label for="password">Password</label>
            <input type="password" id="password" 
                            type="password"
                            name="password"
                            required autocomplete="new-password">

            <!-- Confirm Password -->
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="password_confirmation" 
                            type="password"
                            name="password_confirmation" required autocomplete="new-password">

            <!-- Gender -->
            <label for="gender">What's your gender?</label>
            <div class="gender-options">
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="female">Female</label>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male">Male</label>
            </div>

            <!-- Date of Birth -->
            <label for="dateOfBirth">What's your date of birth?</label>
            <input type="date" id="dateOfBirth" name="birthdate" required>

            <!-- Newsletter -->
            <label for="newsletter">
                <input type="checkbox" id="newsletter" name="newsletter">
                Share my registration data with Ruang Tenang's content providers for marketing purposes.
            </label>

            <!-- Terms and Conditions -->
            <p>By registering an account, you agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>

            <!-- Submit Button -->
            <button type="submit" class="signup-btn">Sign Up</button>
            
        </form>
    </div>
    </div>

    <script>
        function openLoginModal() {
            document.getElementById("loginModal").style.display = "block";
            document.getElementById("signUpModal").style.display = "none";
        }

        function closeLoginModal() {
            document.getElementById("loginModal").style.display = "none";
        }

        function openSignUpModal() {
            document.getElementById("signUpModal").style.display = "block";
            document.getElementById("loginModal").style.display = "none";
        }

        function closeSignUpModal() {
            document.getElementById("signUpModal").style.display = "none";
        }
        function toggleDropdown() {
    const dropdownMenu = document.getElementById('dropdownMenu');
    dropdownMenu.classList.toggle('hidden');
}

// Close dropdown when clicking outside of it
window.addEventListener('click', function(event) {
    const dropdownMenu = document.getElementById('dropdownMenu');
    const button = document.querySelector('.dropdown-button');
    if (!button.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
    }
});

    </script>
</body>
</html>