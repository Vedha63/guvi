$(document).ready(function () {
  const session = JSON.parse(localStorage.getItem('userSession'));
  if (!session) {
    alert('Please login first.');
    window.location.href = 'index.html';
    return;
  }

  $.ajax({
    url: 'php/profile.php',
    method: 'POST',
    dataType: 'json',
    data: { email: session.email },
    success: function (data) {
      if (data.status === 'success') {
        $('#dob').val(data.profile.dob);
        $('#age').val(data.profile.age);
        $('#contact').val(data.profile.contact);
      } else {
        alert(data.message);
      }
    }
  });

  $('#profileForm').submit(function (e) {
    e.preventDefault();
    $.ajax({
      url: 'php/updateProfile.php',
      method: 'POST',
      data: {
        email: session.email,
        dob: $('#dob').val(),
        age: $('#age').val(),
        contact: $('#contact').val()
      },
      success: function (res) {
        alert(res);
      }
    });
  });
});