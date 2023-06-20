#!/usr/bin/python3

$(() => {
	$(".internship-posts").on('click', '.save', function () {
		const postID = $(this).data('post-id');
		const xhr = new XMLHttpRequest();

		xhr.open('GET', '../internhub/includes/save.inc.php?postID=' + postID);
		xhr.send();

    xhr.onload = function() {
        alert(xhr.responseText);
    }
	})
})
