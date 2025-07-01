$(document).ready(function () {
  $('#registerForm').submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: 'register.php',
      method: 'POST',
      data: {
        name: $('#name').val(),
        email: $('#email').val(),
        password: $('#password').val()
      },
      success: function (response) {
        alert(response);
        if (response === 'Registered successfully') {
          window.location.href = 'index.html';
        }
      }
    });
  });
});
