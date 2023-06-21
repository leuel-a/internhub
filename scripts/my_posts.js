#!/usr/bin/node

$(document).ready(() => {
  $('.new-post').hide();
  $('#add-btn').on('click', () => {
    $('.new-post').show();
  });

  $('#close-btn').on('click', () => {
    console.log('Close Clicked');
    $('.new-post').hide();
  });
});

// Handle submitting a new post
$(() => {
  $('#submit-new-post').on('submit', function (event) {
    event.preventDefault();

    const formData = $(this).serialize();

    // Send AJAX request to server
    $.ajax({
      type: 'POST',
      url: '../includes/my_posts.inc.php',
      data: formData,
      success: (response) => {
        const posts = $('.internship-posts');
        posts.empty();

        const xhr = new XMLHttpRequest();

        xhr.open('GET', '../includes/my_posts.fetch.inc.php');
        xhr.send();

        xhr.onload = function () {
          if (xhr.status === 200) {
            const numPosts = $('#np');
            const data = JSON.parse(xhr.responseText);
            numPosts.text(data.length);
            console.log(data.length);
            load_posts(data, 'recruiter');
          } else {
            console.log('Error: ' + xhr.status);
          }
        };
      },
      error: (xhr, status, error) => {
        // Handle error incase of the user submitted bad data
      }
    });
  });
});

// Upon page load the jobs posted by the recruiter need to be
// fetched from the server. After that get the get the information
// and dynamically render the screen and output all the job posts

$(() => {
  const xhr = new XMLHttpRequest();

  xhr.open('GET', '../includes/my_posts.fetch.inc.php');
  xhr.send();

  xhr.onload = function () {
    if (xhr.status === 200) {
      const data = JSON.parse(xhr.responseText);
      console.log(data);
      const posts = $('.internship-posts');
      posts.empty();
      load_posts(data, 'recruiter');
    } else {
      console.log('Error: ' + xhr.status);
    }
  };
});

function load_posts (data, type = 'student') {
  const count = 0;

  for (const post of data) {
    title = post.postTitle;
    description = post.postDescription;
    requirement = post.postRequirement.split(';');
    qualifications = post.postQualifications.split(';');
    benefits = post.postBenefits.split(';');
    deadline = post.deadline;

    const parent = $('.internship-posts');
    const newPost = $('<div class="internship-post"></div>');
    const newPostTitle = $('<div class="post-title"><h1>' + title + '</h1></div>');

    newPost.append(newPostTitle);
    parent.append(newPost);

    const newDescription = $('<div class="post-description"><p>' + description + '</p></div>');
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
    const newDeadlineHeader = $('<h3>Deadline: ' + deadline + '</h3>');

    newDeadline.append(newDeadlineHeader);
    newPost.append(newDeadline);

    const postAction = $('<div class="post-action"></div>');
    const saveBtn = $('<button class="btn apply">Save</button>');
    const applyBtn = $('<button class="btn apply">Apply</button>');

    postAction.append(saveBtn);
    postAction.append(applyBtn);

    if (type === 'student') {
      newPost.append(postAction);
    }
  }
}

function arrayToUL (array) {
  const newList = $('<ul></ul>');

  for (const element of array) {
    if (element.length === 0) {
      continue;
    }
    const value = $('<li>' + element + '</li>');
    newList.append(value);
  }
  return newList;
}
