#!/usr/bin/node

$(document).ready(() => {
  $('.showHidePw').on('click', () => {
    const type = $('.inputfield-text').attr('type');
    if (type === 'password') {
      $('.inputfield-text').attr('type', 'text');
      $('.inputfield-text').eq(1).removeClass('uil-eye-slash').addClass('uil-eye');
    } else {
      $('.inputfield-text').attr('type', 'password');
      $('.inputfield-text').eq(1).removeClass('uil-eye').addClass('uil-eye-slash');
    }
  });
});
