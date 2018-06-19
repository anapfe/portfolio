window.addEventListener('load', function() {

  // menu izq
  var item = document.querySelectorAll('.dropdown');
  item.forEach(function(element)
  {
    element.addEventListener('click', function() {
      var link = element.children[0];
      var arrow = link.children[0];
      arrow.classList.toggle('rotate');
      var child = element.children[1];
      child.classList.toggle('show');
    });
  });

  // select current page
  try {
    var currentUrl = window.location.href;
    var menuSubItem = document.querySelectorAll(".menu-subitem");
    menuSubItem.forEach(function(elem) {
      var menuItem = elem.children[0];
      var menuUrl = menuItem.href;
      var parent = elem.parentElement;
      if (currentUrl === menuUrl) {
        parent.classList.add('show');
        menuItem.style.fontWeight = "700";
      };
    });
  } catch(error) {
  };

  // select all
  try {
    var all = document.querySelector('#selectAll');
    all.addEventListener('click', function() {
      var selected = document.querySelectorAll('.select');
      selected.forEach(function(elem) {
        if (elem.checked == true) {
          elem.checked = false;
        } else {
          elem.checked = true;
        }
      });
    });
  } catch(error) {

  };

  // validacion de login

  function createSpan() {
    var spanError = document.createElement("span");
    spanError.className = "errors";
    return spanError;
  }
  function deleteSpan(id) {
    var div = document.querySelector(id);
    var span = document.querySelector(id + " " + 'span');
    if (div && span) {
      div.removeChild(span);
    }
  }
  function isEmpty(obj) {
    for (var key in obj) {
      if (obj.hasOwnProperty(key))
      return false;
    }
    return true;
  }

  if (window.location.pathname === '/login' ) {
    var form = document.querySelector('.login_form');
    var email = document.querySelector('#email');
    var password = document.querySelector('#password');
    var regexMail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var regexVacio = /^[a-z0-9]+$/i;

    var errors = {};

    email.addEventListener('blur', function() {
      if (errors.email) {
        delete errors.email;
      };
      deleteSpan('.email');
      var emailValue = document.querySelector('#email').value;
      var emailDiv = document.querySelector('.email');
      var spanError = createSpan();
      if (emailValue == "") {
        errors.email = "Ingresá un email";
      } else if ( !regexMail.test(emailValue) ) {
        errors.email = "Ingresá un email válido";
      } else {
        email.style.backgroundColor = "#e5ffe5";
      };

      if (errors.email) {
        spanError.innerHTML = errors.email;
        emailDiv.appendChild(spanError);
        email.style.backgroundColor = '#ffe5e5';
      };
    });

    password.addEventListener('blur', function () {
      if (errors.password) {
        delete errors.password;
      }
      deleteSpan('.password');
      var passwordValue = document.querySelector('#password').value;
      var passwordDiv = document.querySelector('.password');
      var spanError = createSpan();
      if ( !regexVacio.test(passwordValue) ) {
        errors.password = "Ingresá una contraseña";
      } else if ( passwordValue.length < 6 ) {
        errors.password = "La contraseña debe tener al menos 6 caracteres";
      } else {
        password.style.backgroundColor = '#e5ffe5';
      };

      if (errors.password) {
        spanError.innerHTML = errors.password;
        passwordDiv.appendChild(spanError);
        password.style.backgroundColor = '#ffe5e5';
      };
    });

    form.addEventListener('submit', function (event) {
      if (!isEmpty(errors)) {
        event.preventDefault();
      } else {
        errors = [];
      };
    });
  };

  // aviso de eliminación
  var del = document.querySelectorAll('.delete');
  del.forEach(function(element) {
    element.addEventListener('click', function(event) {
      var result = confirm("Estás por borrar un proyecto. No se puede deshacer");
      if (result == false) {
        event.preventDefault();
      };
    });
  });

  // validacion de carga de proyecto

  try {
    var form = document.querySelector('.form-project');
    var title = document.querySelector('#title');
    var year = document.querySelector('#year');
    var client = document.querySelector('#client');
    var description = document.querySelector('#description');
    var primary_img = document.querySelector('#primary_img');

    var errors = {};

    title.addEventListener('blur', function() {
      if (errors.title) {
        delete errors.title;
      };
      deleteSpan('.title');
      var titleValue = document.querySelector('#title').value;
      var titleDiv = document.querySelector('.title');
      var spanError = createSpan();
      if (titleValue == "") {
        errors.title = "El campo es requerido";
      } else {
        title.style.backgroundColor = "#e5ffe5";
      };

      if (errors.title) {
        spanError.innerHTML = errors.title;
        errorDiv.appendChild(spanError);
        title.style.backgroundColor = '#ffe5e5';
      };
    });

    year.addEventListener('blur', function() {
      if (errors.year) {
        delete errors.year;
      };
      deleteSpan('.year');
      var yearValue = document.querySelector('#year').value;
      var yearDiv = document.querySelector('.year');
      var spanError = createSpan();
      if (yearValue == "") {
        errors.year = "El campo es requerido";
      } else {
        year.style.backgroundColor = "#e5ffe5";
      };

      if (errors.year) {
        spanError.innerHTML = errors.year;
        errorDiv.appendChild(spanError);
        year.style.backgroundColor = '#ffe5e5';
      };
    });

    client.addEventListener('blur', function() {
      if (errors.client) {
        delete errors.client;
      };
      deleteSpan('.client');
      var clientValue = document.querySelector('#client').value;
      var clientDiv = document.querySelector('.client');
      var spanError = createSpan();
      if (clientValue == "") {
        errors.client = "El campo es requerido";
      } else {
        client.style.backgroundColor = "#e5ffe5";
      };

      if (errors.client) {
        spanError.innerHTML = errors.client;
        errorDiv.appendChild(spanError);
        client.style.backgroundColor = '#ffe5e5';
      };
    });

    description.addEventListener('blur', function() {
      if (errors.description) {
        delete errors.description;
      };
      deleteSpan('.description');
      var descriptionValue = document.querySelector('#description').value;
      var descriptionDiv = document.querySelector('.description');
      var spanError = createSpan();
      if (descriptionValue == "") {
        errors.description = "El campo es requerido";
      } else {
        description.style.backgroundColor = "#e5ffe5";
      };

      if (errors.description) {
        spanError.innerHTML = errors.description;
        errorDiv.appendChild(spanError);
        description.style.backgroundColor = '#ffe5e5';
      };
    });

    form.addEventListener('submit', function (event) {
      if (!isEmpty(errors)) {
        event.preventDefault();
      } else {
        errors = {};
      };
    });

  } catch(error) {

  };

});
