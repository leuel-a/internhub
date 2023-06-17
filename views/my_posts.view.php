<?php require_once "/opt/lampp/htdocs/internhub/views/partials/header.php" ?>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/nav.php" ?>

<div class="my-posts">
    <?php
        require_once "../includes/dbh.inc.php";

        $recruiterID = $_SESSION['recruiterID'];
        $query = "SELECT * FROM recruiter_posts WHERE rID = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("location: ../controllers/register.php?error=stmt_error");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $recruiterID);
        mysqli_stmt_execute($stmt);

        $result_data = mysqli_stmt_get_result($stmt);
        $all_posts = mysqli_fetch_all($result_data);
    ?>
    <div class="my-post">
        <div class="post-title">
            <h1>Post 1</h1>
        </div>
        <div class="post-description">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit nemo exercitationem, quam veritatis quis aliquam!</p>
        </div>
        <div class="post-requirements">
            <ul>
                <ul>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, doloribus!</ul>
                <ul>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, doloribus!</ul>
                <ul>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, doloribus!</ul>
                <ul>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, doloribus!</ul>
                <ul>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat, doloribus!</ul>
            </ul>
        </div>
        <div class="post-action">
            <button class="btn delete">Save</button>
        </div>
    </div>
</div>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/footer.php" ?>
