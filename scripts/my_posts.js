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
  $('#submit-new-post').on('submit',  function(event) {
    event.preventDefault();

    const formData = $(this).serialize();

    // Send AJAX request to server
    $.ajax({
      type: 'POST',
      url: '../includes/my_posts.inc.php',
      data: formData,
      success: (response) => {
        console.log(response);
        // location.reload();
      }, error: (xhr, status, error) => {
        // Handle error incase of the user submitted bad data
      }
    });
  });
});
