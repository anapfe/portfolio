window.addEventListener('load', function() {

  var btn = document.querySelector('.menu-hamburger');
  btn.onclick = function() {
    document.querySelector(".menu-items").classList.toggle("show-menu");
  }

  var projectCaption = document.querySelectorAll('.project-caption');
  projectCaption.forEach(function(element)
  {
    element.addEventListener('mouseover', function() {
      var parent = element.parentElement;
      var child = parent.children[1];
      child.classList.add('show-caption');
    });
  });

  projectCaption.forEach(function(element)
  {
    element.addEventListener('mouseout', function() {
      element.classList.remove('show-caption');
    });
  });

  // current page menu
  try {
    var currentUrl = window.location.href;
    var menuItem = document.querySelectorAll(".menu-item");
    menuItem.forEach(function(element) {
      var child = element.children[0];
      var menuUrl = child.href;
      if (currentUrl === menuUrl) {
        child.classList.add('current-url');
      };
    });
  } catch(error) {
  };




});
