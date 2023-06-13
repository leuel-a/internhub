<?php require_once "/opt/lampp/htdocs/internhub/views/partials/header.php" ?>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/nav.php" ?>

<main class="login-main">
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>
                <form action="../includes/login.inc.php" method="POST">
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" required name="email">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Enter your password " required name="password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="chooseAccountType" name="type">
                            <label for="chooseAccountType" class="text">Student</label>
                        </div>
                        <a href="#" class="text">Forgot password?</a>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Login Now" name="submit">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="/internhub/controllers/register.php" class="text signup-text">Register now</a>
                    </span>
                </div>

                <?php
                    $error_msg = array (
                        "incorrect_password" => "The password that you entered is incorrect",
                        "email_not_found" => "The email that you supplied is not correct"
                    );

                    if (isset($_GET['error'])) {
                        echo '<p style="color: red; text-align: center; font-size: 15px;">' . $error_msg[$_GET['error']] . "</p>";
                    }
                ?>
            </div>
        </div>
    </div>
</main>

<script src="../scripts/login.js"></script>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/footer.php" ?>
