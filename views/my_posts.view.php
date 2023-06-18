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
            <h2>Jobs Posted : <span id="np"><?= mysqli_num_rows($jobs_posted) ?></span></h2>
        </div>
        <div class="add-new-post">
            <p>You can add a new post here <a href="#"><button id="add-btn">Add</button></a></p>
        </div>
    </div>
    <div class="new-post">
        <div class="directions">
            <p><strong>Enter all the information in the given fields</strong>. <br><br> For the<span id="text-format"> Description, Requirements, Qualifications, and Benefit </span>enter one entry per line.</p>
        </div>
        <form action="" method="POST" id="submit-new-post">
            <label for="postTitle">Title</label>
            <input type="text" name="postTitle" id="postTitle">
            <label for="postDescription">Description</label>
            <textarea name="postDescription" id="postDescription" cols="30" rows="3"></textarea>
            <label for="postRequirement">Post Requirements</label>
            <textarea name="postRequirement" id="postRequirement" class="postRequirement" cols="30" rows="10"></textarea>
            <label for="postQualification">Qualification</label>
            <textarea name="postQualification" id="postQualification" cols="30" rows="10"></textarea>
            <label for="postBenefit">Benefit</label>
            <textarea name="postBenefit" id="postBenefit" cols="30" rows="10"></textarea>
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline">
            <div class="form-btn">
                <button id="close-btn">close</button>
                <input type="submit" name="submit" id="submit">
            </div>
        </form>
    </div>
    <div class="internship-posts"></div>
</div>

<script src="../scripts/my_posts.js"></script>

<?php require_once "/opt/lampp/htdocs/internhub/views/partials/footer.php" ?>
