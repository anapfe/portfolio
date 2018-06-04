window.addEventListener('load', function() {

  function ajaxMail() {
    var email = document.querySelector('#email').value;
    var password = document.querySelector('#password').value;
    var csrf = document.querySelector('csrf-token').content;

    var url = '';

    axios.post(url, {
      email: email,
      password: password,
      'XSRF-TOKEN': csrf
    })
  }

  var loginForm = document.querySelector('.login_form');
  loginForm.addEventListener('submit', function (event) {
    event.preventDefault();
    ajaxMail();
  })
});
