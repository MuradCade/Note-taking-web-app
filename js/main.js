let note_form = document.getElementById("notes-form");
let notes_card = document.getElementById("notes-card");
let createNote =  document.getElementById("createnote");

createNote.addEventListener("click",function(){
       if(note_form.style.display = "none"){
           note_form.style.display = "block";
           notes_card.style.display = "none";

       }
       else{
           notes_card.style.display = "block";
           note_form.style.display = "none";
       }
});


// display image that selected
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};