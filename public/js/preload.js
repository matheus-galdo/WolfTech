var body = document.querySelector(".preload");

body.onload = function(){
    body.className = ''
    
    
}

let dropdownBtn = document.querySelector("#dropdownBtn")
let dropdown = document.querySelector(".dropdown")

dropdownBtn.onclick = () => {
    if(dropdown.className.indexOf("hide") < 0){
        dropdown.className += " hide"
    }else{
        dropdown.className = "dropdown"
        
    }
}

// if(screen.width > 800){
//     var logo = document.querySelector(".logo")
//     let urlStr = logo.src
//     logo.src = urlStr.replace('wolftech-min', 'wolftech-side')
// }


