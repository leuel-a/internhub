<?php require_once "/opt/lampp/htdocs/internhub/views/partials/header.php" ?>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/nav.php" ?>

<main class="register-main">
    <div class="container">
        <div class="forms">
            <div class="form register">
                <span class="title">Register</span>
                <form action="#">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password " required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password " required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="chooseAccountType">
                            <label for="chooseAccountType" class="text">Student</label>
                        </div>
                    </div>
                    <div class="input-field button">
                        <input type="button" value="Register Now">
                    </div>
                </form>

                <div class="register-signup">
                    <span class="text">Already have an account?
                        <a href="/internhub/controllers/login.php" class="text signup-text">Login now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../scripts/register.js"></script>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/footer.php" ?>
