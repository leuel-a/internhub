<?php

require_once "/opt/lampp/htdocs/internhub/views/partials/header.php";

// Require all files for the database and error handlers
require_once "../includes/dbh.inc.php";
require_once "../includes/functions.my_posts.inc.php";
require_once "../functions.php";

$jobs_posted = get_jobs_posted_by_id($conn, $_SESSION['recruiterID']);
?>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/nav.php" ?>
<div class="container">
    <div class="top-information">
        <div class="top-info-text">
            <h1>Jobs Posted : <?= mysqli_num_rows($jobs_posted) ?></h1>
        </div>
        <div class="add-new-post">
            <p>You can add a new post here <a href="#"><button id="add-btn">Add</button></a></p>
        </div>
    </div>
    <div class="new-post">
        <div class="directions">
            <p>Enter all the information in the given fields</p>
        </div>
        <form action="" method="POST" id="submit-new-post">
            <label for="postTitle">Title</label>
            <input type="text" name="postTitle"><br>
            <label for="postDescription">Description</label>
            <textarea name="postDescription" id="postDescription"></textarea><br>
            <label for="postRequirement">Post Requirements</label>
            <textarea name="postRequirement" id="postRequirement" class="postRequirement"></textarea>
            <input type="submit" name="submit">
        </form>
        <div class="exit">
            <a href="#"><button id="close-btn">close</button></a>
        </div>
    </div>
    <div class="internship-posts">
        <?php
            $rows = mysqli_fetch_all($jobs_posted);
            // Dynamically render the output to match the posts posted
            // by the particular recruiter
        ?>
        <div class="internship-post">
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
                <button class="btn save">Save</button>
                <button class="btn apply">Apply</button>
            </div>
        </div>
        <div class="internship-post">
            <div class="post-title">
                <h1>Post 2</h1>
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
                <button class="btn save">Save</button>
                <button class="btn apply">Apply</button>
            </div>
        </div>
        <div class="internship-post">
            <div class="post-title">
                <h1>Post 3</h1>
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
                <button class="btn save">Save</button>
                <button class="btn apply">Apply</button>
            </div>
        </div>
    </div>
</div>

<script src="../scripts/my_posts.js"></script>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/footer.php" ?>
