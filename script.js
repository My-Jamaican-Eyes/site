function enter_tour(){
var modal = document.getElementById('myModal');
var list_title = document.getElementsByClassName('card-title');
var list_text = document.getElementsByClassName('card-text');

for (var i = 0, len = list_title.length; i < len; ++i) {
    list_title[i].onclick=function () {
        modal.style.display = "block";
        var modal_div=document.getElementsByClassName("modal-content"); 
        var content = document.getElementsByClassName("for_read");
        var text = document.createTextNode("This just got added");

        content55555.appendChild(text);
    }
}

// // Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
}
}
enter_tour();
