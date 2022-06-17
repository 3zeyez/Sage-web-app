function allow() {
  var niv = document.getElementById('niv').value;
  var section = document.getElementById('section');
  if (['2', '3', '4'].includes(niv)) {
    section.disabled = false;
  } else {
    section.selectedIndex = 0;
    section.disabled = true;
  }
}

function check_search(search) {
  if (document.getElementById(search).value == '') {
    alert("Bar de recherche est vide!");
    return false;
  }
}

function cross(className) {
  list = document.getElementsByClassName(className);
  if (list[1].checked) {
    list[0].style = "text-decoration: line-through; color: #e8e8e8;";
  } else {
    list[0].style = "text-decoration: none; color: #000;";
  }
}