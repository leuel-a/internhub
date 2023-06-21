#!/usr/bin/node

$(() => {
  // I need to use an event delegation because the apply btns are actually
  // dynamically generated

  $('.internship-posts').on('click', '.apply', function () {
    const postID = $(this).data('post-id');
    const xhr = new XMLHttpRequest();

    xhr.open('GET', '../internhub/includes/apply.inc.php?postID='+ postID);
    xhr.send();

    xhr.onload = function() {
        alert(xhr.responseText);
    }
  })
});

