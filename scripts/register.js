const container = document.querySelector('.container');
const showHidePw = document.querySelectorAll('.showHidePw');
const pwFields = Array.from(document.querySelectorAll('.password'));

showHidePw.forEach(eyeIcon => {
  eyeIcon.addEventListener('click', () => {
    pwFields.forEach(pwField => {
      if (pwField.type === 'text') {
        pwField.type = 'password';
        showHidePw.forEach(icon => {
          icon.classList.replace('uil-eye', 'uil-eye-slash');
        });
      } else {
        pwField.type = 'text';

        showHidePw.forEach(icon => {
          icon.classList.replace('uil-eye-slash', 'uil-eye');
        });
      }
    });
  });
});
