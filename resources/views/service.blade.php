<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aboutus.css">
    <title>Document</title>
</head>
<body>

<header>
    <div class="logo">
        <h1>Logo</h1>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('create') }}">Create</a></li>
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

        <!-- Login Modal -->
   <div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeLoginModal()">&times;</span>
        <div class="modal-logo">
            <h2>Ruang Tenang</h2>
        </div>
        <form class="login-form">
            <h3>Log In</h3>
            <p>Don't have an account? <a href="#" onclick="openSignUpModal()">Sign Up</a></p>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            <div class="remember-me">
                <input type="checkbox" id="rememberMe">
                <label for="rememberMe">Remember me</label>
            </div>
            <button type="submit" class="login-btn">Log In</button>
            <a href="#" class="forgot-password">Forgot my password</a>
        </form>
    </div>
</div>

    <div id="signUpModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeSignUpModal()">&times;</span>
            <div class="modal-logo">
                <h2>Ruang Tenang</h2>
            </div>
            <form class="signup-form">
                <h3>Sign Up</h3>
                <p>Already have an account? <a href="#" onclick="openLoginModal()">Log In</a></p>
                <label for="profileName">Profile Name</label>
                <input type="text" id="profileName" name="profileName" placeholder="Enter your profile name">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password">
                <label for="gender">What's your gender?</label>
                <div class="gender-options">
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                </div>
                <label for="role">What's your role?</label>
                <div class="role-options">
                    <input type="radio" id="user" name="role" value="user">
                    <label for="user">User</label>
                    <input type="radio" id="psychologist" name="role" value="psychologist">
                    <label for="psychologist">Psychologist</label>
                </div>
                <label for="dateOfBirth">What's your date of birth?</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth">
                <label for="newsletter">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    Share my registration data with Ruang Tenang's content providers for marketing purposes.
                </label>
                <p>By registering an account, you agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
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
    </script>

    <h1>wahyu</h1>

</body>
</html>