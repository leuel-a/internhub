#!/usr/bin/node

$(() => {
    const xhr = new XMLHttpRequest();

  xhr.open('GET', '../internhub/includes/index.fetch.inc.php');
  xhr.send();

  xhr.onload = function() {
      if (xhr.status === 200) {
        const data = JSON.parse(xhr.responseText);
        const posts = $('.internship-posts');
        posts.empty();
        load_posts(data);
      } else {
        console.log("Error: " + xhr.status);
      }
  }
});


function load_posts(data, type="student") {
    for (const post of data) {
        id = post.postID
        title = post.postTitle;
        description = post.postDescription;
        requirement = post.postRequirement.split(";");
        qualifications = post.postQualifications.split(";");
        benefits = post.postBenefits.split(";");
        deadline = post.deadline;

        const parent = $('.internship-posts');
        const newPost = $('<div class="internship-post"></div>');
        const newPostTitle = $('<div class="post-title"><h1>' + title  + '</h1></div>');

        newPost.append(newPostTitle);
        parent.append(newPost);

        const newDescription = $('<div class="post-description"><p>' + description +'</p></div>');
        newPost.append(newDescription);

        const newRequirements = $('<div class="post-requirements"></div>');
        const newRequirementsHeader = $('<h3>Requirements</h3>');
        const newRequirementsList = arrayToUL(requirement);

        newRequirements.append(newRequirementsHeader);
        newRequirements.append(newRequirementsList);

        newPost.append(newRequirements);

        const newQualifications = $('<div class="post-qualifications"></div>');
        const newQualificationsHeader = $('<h3>Qualifications</h3>');
        const newQualificationsList = arrayToUL(qualifications);

        newRequirements.append(newQualificationsHeader);
        newRequirements.append(newQualificationsList);

        newPost.append(newQualifications);

        const newBenefits = $('<div class="post-benefits"></div>');
        const newBenefitsHeader = $('<h3>Benefits</h3>');
        const newBenefitsList = arrayToUL(benefits);

        newBenefits.append(newBenefitsHeader);
        newBenefits.append(newBenefitsList);

        newPost.append(newBenefits);

        const newDeadline = $('<div class="deadline"></div>');
        const newDeadlineHeader = $('<h3>Deadline: '+ deadline +'</h3>');

        newDeadline.append(newDeadlineHeader);
        newPost.append(newDeadline);

        const postAction = $('<div class="post-action"></div>');
        const saveBtn = $('<button class="btn save" data-post-id="' + id + '">Save</button>');
        const applyBtn = $('<button class="btn apply" data-post-id="' + id + '">Apply</button>');

        postAction.append(saveBtn);
        postAction.append(applyBtn);

        if (type === "student"){
            newPost.append(postAction);
        }
    }
}

function arrayToUL(array) {
    const newList = $('<ul></ul>');

    for (const element of array) {
        if (element.length === 0) {
        continue;
        }
        const value = $('<li>'+ element +'</li>')
        newList.append(value);
    }
    return newList;
}
