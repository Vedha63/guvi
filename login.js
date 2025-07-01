$(document).ready(function () {
  $('#loginForm').submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: 'php/login.php',
      method: 'POST',
      dataType: 'json',
      data: {
        email: $('#email').val(),
        password: $('#password').val()
      },
      success: function (res) {
        if (res.status === 'success') {
          localStorage.setItem('userSession', JSON.stringify({ email: res.email }));
          window.location.href = 'profile.html';
        } else {
          alert(res.message);
        }
      }
    });
  });
});
