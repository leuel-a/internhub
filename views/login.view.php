<?php require_once "/opt/lampp/htdocs/internhub/views/partials/header.php" ?>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/nav.php" ?>

<main class="login-main">
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>
                <form action="#">
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Enter your password " required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="chooseAccountType">
                            <label for="chooseAccountType" class="text">Student</label>
                        </div>
                        <a href="#" class="text">Forgot password?</a>
                    </div>
                    <div class="input-field button">
                        <input type="button" value="Login Now">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="/internhub/controllers/register.php" class="text signup-text">Register now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../scripts/login.js"></script>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/footer.php" ?>
