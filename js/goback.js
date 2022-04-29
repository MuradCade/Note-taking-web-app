$(document).ready(function(){

    // // redirect user
     $('.arrow-back').click(function(){
        window.location = "dashboard.php";
     });
    
    
    // //  update btn action
    $('#update-btn').click(function(){
        $('#notes-form').slideToggle();
        $('#displaying-note').hide();
    });
    
    $('.close-btn').click(function(){
        $('#notes-form').hide();
        $('#displaying-note').show();
        // console.log('clicked');
    });
})






