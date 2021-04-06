
    function Navfuction() {
  var x = document.getElementById("myNav");
  if (x.className === "Nav") {
    x.className += " responsive";
  } else {
    x.className = "Nav";
  }
}