<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Website</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tan+Pearl:wght@400;700&display=swap">
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

    <main>
        <section class="hero">
            <div class="hero-text">
                <h2>Enjoy professional support and begin a new path to happiness</h2>
                <button class="get-started-btn" onclick="window.location.href='service.html'">Get Started</button>

            </div>
            <div class="hero-image">
                <img src="home.png" alt="Hero Image">
            </div>
        </section>

        <section class="cta-container">
            <div class="cta-box connect">
                <div class="images">
                    <img src="dokter1.jpeg" alt="Image 1">
                    <img src="dokter2.jpeg" alt="Image 2">
                    <img src="dokter3.jpeg" alt="Image 3">
                    <img src="dokter4.jpeg" alt="Image 4">
                </div>
                <a href="#"><h3>Connect with <br> 50+ <br> Professional Psychologists</h3></a>
            </div>
            <div class="cta-box read-articles">
                <a href="articles.html"><h3>Read Our Trending Articles</h3><span>&rarr;</span></a>
            </div>
        </section>
    </main> 

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
    </script>
</body>
</html>
