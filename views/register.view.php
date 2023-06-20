<?php require_once "/opt/lampp/htdocs/internhub/views/partials/header.php" ?>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/nav.php" ?>

<main class="register-main">
    <div class="container">
        <div class="forms">
            <div class="form register">
                <span class="title">Register</span>
                <form action="../includes/register.inc.php" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" required name="name">
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" required name="email">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password " required name="pass">
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm your password " required name="passConfirm">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="chooseAccountType" name="type">
                            <label for="chooseAccountType" class="text">Student</label>
                        </div>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Register Now" name="submit">
                    </div>
                </form>

                <div class="register-signup">
                    <span class="text">Already have an account?
                        <a href="/internhub/controllers/login.php" class="text signup-text">Login now</a>
                    </span>
                </div>

                <?php
                    $error_msg = array (
                        "email_taken" => "Email is already taken, login please.",
                        "password_dont_match" => "Password does not match.",
                        "none" => "Successfully registered, please login"
                    );

                    if (isset($_GET['error'])) {
                        echo '<p style="color: red; text-align: center; font-size: 15px;">' . $error_msg[$_GET['error']] . "</p>";
                    }
                ?>
            </div>
        </div>
    </div>
</main>

<script src="../scripts/register.js"></script>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/footer.php" ?>
