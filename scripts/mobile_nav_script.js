var isOpen = false

function toggleDropdown() {
    if(isOpen){
        document.getElementById("dropdownContent").style.display = "none";
        isOpen = false;
    }else{
        document.getElementById("dropdownContent").style.display = "block";
        isOpen = true;
    }
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        document.getElementById("dropdownContent").style.display = "none";
        isOpen = false;
    }
}