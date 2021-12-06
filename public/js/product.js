function showCRUD(id){
    var d_crud = document.getElementById("display-crud-"+id);

    if (d_crud.style.display === "block") {
        d_crud.style.display = "none";
    } 
    else {
        d_crud.style.display = "block";
    }
}


//JavaScript function that enables or disables a submit button depending
//on whether a checkbox has been ticked or not.
function terms_changed(termsCheckBox){
    var ellipsis = document.getElementsByClassName("ellipsis-icon");
    var checkbox = document.getElementsByClassName("product-checkbox");
    //If the checkbox has been checked
    if(termsCheckBox.checked){
        //Set the disabled property to FALSE and enable the button.
        document.getElementById("select-multiple").disabled = false;
        for (var i = 0, max = ellipsis.length; i < max; i++) {
            ellipsis[i].style.display = "none";
        }
        for (var i = 0, max = checkbox.length; i < max; i++) {
            checkbox[i].style.display = "block";
        }
        document.getElementById("select-multiple").style.filter = "opacity(100%)";
    } else{
        //Otherwise, disable the submit button.
        document.getElementById("select-multiple").disabled = true;
        for (var i = 0, max = ellipsis.length; i < max; i++) {
            ellipsis[i].style.display = "block";
        }
        for (var i = 0, max = checkbox.length; i < max; i++) {
            checkbox[i].style.display = "none";
        }
        document.getElementById("select-multiple").style.filter = "opacity(50%)";
    }
}