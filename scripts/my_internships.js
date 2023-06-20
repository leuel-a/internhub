#!/usr/bin/node

$(() => {
  const xhr = new XMLHttpRequest();

  xhr.open('GET', '../includes/my_internships.fetch.php');
  xhr.send();

  xhr.onload = function () {
    if (xhr.status === 200) {
      const data = JSON.parse(xhr.responseText);
      console.log(data);
      const posts = $('.internship-posts');
      posts.empty();
      load_myInternships(data, 'recruiter');
    } else {
      console.log('Error: ' + xhr.status);
    }
  };
});

function load_myInternships (data, type = 'applied') {
  const count = 0;

  for (const post of data) {
    aDate = post.aDate;
    appStatus = post.appStatus;
    title = post.postTitle;
    description = post.postDescription;
    requirement = post.postRequirement.split(';');
    qualifications = post.postQualifications.split(';');
    benefits = post.postBenefits.split(';');
    deadline = post.deadline;

    const parent = $('.internship-posts');
    const newPost = $('<div class="internship-post"></div>');
    const newPostTitleHeader = $('<div class="post-title"></div>');
    const newPostTitle = $('<h1>'+ title +'</h1>')

    // Status of application post
    console.log(appStatus);
    const titleSub = $('<div class="title-sub"></div>');
    if (appStatus === 'applied') {
      const statusSpan = $('<span class="status apply">Applied</span>');
      titleSub.append(statusSpan);
    } else {
      const statusSpan = $('<span class="status saved">Saved</span>');
      titleSub.append(statusSpan);
    }

    const date = $('<div class="date">' + aDate + '</div>')
    titleSub.append(date);

    newPostTitleHeader.append(newPostTitle);
    newPostTitleHeader.append(titleSub);
    newPost.append(newPostTitleHeader);
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
    const saveBtn = $('<button class="btn save">Save</button>');
    const applyBtn = $('<button class="btn apply">Apply</button>');
    const rid = $('<input type="hidden" value=' + post.rID + '>');

    postAction.append(saveBtn);
    postAction.append(applyBtn);
    postAction.append(rid);

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
