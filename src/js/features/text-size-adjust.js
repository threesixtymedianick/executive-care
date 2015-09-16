$(document).ready(function () {

    //min font size
    var min=0.5;  
 
    //max font size
    var max=2; 
     
    //grab the default font size
    var reset = "0.625em"; 
     
    //font resize these elements
    var elm = $('p, h1, h2, h3');  
     
    //set the default font size and remove px from the value
    var size = 1; 
     
    //Increase font size
    $('#larger').click(function() {
        //if the font size is lower or equal than the max value
        if (size<=max) {
             console.log("larger");
            //increase the size
            size = size + 0.1;
             
            //set the font size
            elm.css({'fontSize' : size + "em"});
        }
         
        //cancel a click event
        return false;   
         
    });
 
    $('#smaller').click(function() {
 
        //if the font size is greater or equal than min value
        if (size>=min) {
             
            //decrease the size
            size = size - 0.1;
             
            //set the font size
            elm.css({'fontSize' : size + "em"});
        }
         
        //cancel a click event
        return false;   
         
    });
});