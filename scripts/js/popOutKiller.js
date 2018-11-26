function popOutKiller(id){
  var modal = document.getElementById('gameBody');
  // When the user clicks on this div, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        1.style.display = "none";
      }
  }
}
