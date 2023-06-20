<header class="nav-header">
    <h1 class="logo">InternHuB</h1>
    <nav>
        <ul class="nav__links">
            <li class="page__links"><a href="/internhub/">Home</a></li>
            <li class="page__links"><a href="/internhub/controllers/about.php">About</a></li>
            <?php
                if (isset($_SESSION["studentID"])) {
                    echo '<li class="page__links"><a href="/internhub/controllers/my_internships.php">My Internships</a></li>';
                    echo '<li class="page__links"><a href="/internhub/includes/logout.inc.php">Log out</a></li>';
                } else if (isset($_SESSION["recruiterID"])) {
                    echo '<li class="page__links"><a href="/internhub/controllers/my_posts.php">My Posts</a></li>';
                    echo '<li class="page__links"><a href="/internhub/includes/logout.inc.php">Log out</a></li>';
                } else {
                    echo '<li class="page__links"><a href="/internhub/controllers/login.php">Login</a></li>';
                    echo '<li class="page__links"><a href="/internhub/controllers/register.php">Register</a></li>';
                }
            ?>
        </ul>
    </nav>
    <a href="#" class="cta"><button class="contact-btn">Contact</button></a>
</header>
