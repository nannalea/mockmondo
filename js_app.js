function toggle_menu(){
    const domMenu = document.getElementById('menu');
    if(domMenu.classList.contains('active')){
    domMenu.classList.remove('active')

    const nodeList = document.querySelectorAll(".push");
    for (let i = 0; i < nodeList.length; i++) {
    nodeList[i].style.marginLeft = "0px";
    }
    

    document.querySelector("#header-logo").style.marginLeft = "66px";
    // document.querySelector("#header-logo").classList.remove('active');

    // document.querySelector("header").style.marginLeft = "0px"
    // document.querySelector("main").style.marginLeft = "0px"
    // document.querySelector("footer").style.marginLeft = "0px"
    }
    else
    {
    domMenu.classList.add('active')

    const nodeList = document.querySelectorAll(".push");
    for (let i = 0; i < nodeList.length; i++) {
    nodeList[i].style.marginLeft = "240px";
    }

    document.querySelector("#header-logo").style.marginLeft = "240px";
    // document.querySelector("#header-logo").classList.add('active');

    // document.querySelector("header").style.marginLeft = "240px"
    // document.querySelector("main").style.marginLeft = "240px"
    // document.querySelector("footer").style.marginLeft = "240px"
    }
}



function toggle_modal(){
    const domMenu = document.getElementById('modal-container');
    if(domMenu.classList.contains('show')){
    domMenu.classList.remove('show')

    }
    else
    {

    domMenu.classList.add('show')
    // document.body.style.overflow = "hidden";
    }
}



function toggleDropdown() {
  document.getElementById("user-dropdown").classList.toggle("show");
  }
  
window.onclick = function(event) {
if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
    }
    }
}
}



function switchInput() {
  var fromInput = document.getElementById("from-input").value;
  var toInput = document.getElementById("to-input").value;

  var temp = fromInput;
    fromInput = toInput;
    toInput = temp;

  document.getElementById("from-input").value = fromInput;
  document.getElementById("to-input").value = toInput;
}


// function switch_language(){

//    const dk = document.getElementById("lang-dk");
//    const en = document.getElementById("lang-en");

//    if( dk.style.display == "none" )
//    { 
//       en.style.display = "none";
//       dk.style.display = "block";
//    } else {
//       dk.style.display = "block";
//       en.style.display = "none";
//    }
// }

function switch_form(){

   const signUp = document.getElementById("signup-form");
   const logIn = document.getElementById("login-form");

   if( logIn.style.display == "none" )
   {
      document.getElementById("login").reset();
      

      const formInputs = document.querySelectorAll(".form-input");
      for (let i = 0; i < formInputs.length; i++) {
      formInputs[i].style.backgroundColor = "";
      }

      signUp.style.display = "none";
      logIn.style.display = "block";
   }
   else
   {

      document.getElementById("login").reset();
      

      const formInputs = document.querySelectorAll(".form-input");
      for (let i = 0; i < formInputs.length; i++) {
      formInputs[i].style.backgroundColor = "";
      }

      signUp.style.display = "block";
      logIn.style.display = "none";
   }
}


function hide() {
    itemtToHide = document.getElementById('modal-container');

    document.getElementById("login").reset();

    const formInputs = document.querySelectorAll(".form-input");
    for (let i = 0; i < formInputs.length; i++) {
    formInputs[i].style.backgroundColor = "";
    }

    // document.body.style.overflow = "";
    itemtToHide.classList.remove("show");
}


var modal = document.getElementById('modal-container');
window.onclick = function(event) {
  if (event.target == modal ?? document ) {
    hide();
  }
}

window.onkeydown = keydown;
function keydown(event) {
  if (event.keyCode == 27) {

    if (document.getElementById("login") !== null) {
      hide() ;
    }

    const domMenu = document.getElementById('menu');if(domMenu.classList.contains('active')){
      
    domMenu.classList.remove('active')

    const nodeList = document.querySelectorAll(".push");
    for (let i = 0; i < nodeList.length; i++) {
    nodeList[i].style.marginLeft = "0px";
    }

    document.querySelector("#header-logo").style.marginLeft = "66px";

    }

  }
}


// function showInfo(){

// 	var activeInput = event.target;
//     var validationInfo = event.target.nextElementSibling;
    
//     validationInfo.style.display = "block";
    
// }

// function hideInfo(){

// 	var activeInput = event.target;
//     var validationInfo = event.target.nextElementSibling;
    
//     validationInfo.style.display = "none";
// }
   
// function hideInfos(){
  
//   var validationInfos = document.querySelectorAll(".valid-info-input");
    
//     for (let i = 0; i < validationInfos.length; i++) {
//       validationInfos.style.display = "none";
//     }   
// }



// ############# SHOW FLIGHT RESULTS #############
function show_from_results(){
  // Variable:
  const the_input = document.querySelector("#from-input")
  if( the_input.value.length > 0 ){
      document.querySelector("#from-results").style.display ="block"
      get_cities_from()
  }else{
      document.querySelector("#from-results").style.display ="none"
  }
}

  // document.querySelector("#from-results").style.display ="block"
  // Also: querySelectorAll()
  // Alternative: getElementById().add.

// #############################

function hide_from_results(){
  document.querySelector("#from-results").style.display ="none"
}

// #############################

// ASYNC = Allows the browser to do many things at once
// AJAX FETCH = Gets data in the background of the page (no reload of the page)
// conn = short for connexion (connecting to the server, getting the data stored there, returning to the user(client))

async function get_cities_from(){
  let conn = await fetch('api-get-cities.php')
  let data = await conn.json() // [{"city_name":"a"},{"city_name":"b"}]
  let div_city = `<div class="from-city">
                    <img src="images/#img#">
                    <h3>xxx <p>yyy</p> </h3>
                  </div>`    
  let all_cities = ""
  //        0                1                    2
  // [{"city_name":"a"},{"city_name":"b"}, {"city_name":"c"}]
  for( let i = 0; i < data.length; i++ ){
    let city = data[i] // {"city_name":"a"}
    let city_name = city.city_name
    console.log(city_name)
    let copy_div_city = div_city
    copy_div_city = copy_div_city.replace("xxx", city_name)
    copy_div_city = copy_div_city.replace("yyy", city.city_airport)
    copy_div_city = copy_div_city.replace("#img#", city.city_image)
    all_cities += copy_div_city
  }
  console.log(data)
  document.querySelector("#from-results").insertAdjacentHTML("afterbegin", all_cities)
}



// ########## TO ############

function show_to_results(){
  // Variable:
  const the_input = document.querySelector("#to-input")
  if( the_input.value.length > 0 ){
      document.querySelector("#to-results").style.display ="block"
      get_cities_to()
  }else{
      document.querySelector("#to-results").style.display ="none"
  }
}

function hide_to_results(){
  document.querySelector("#to-results").style.display ="none"
}


async function get_cities_to(){
  let conn = await fetch('api-get-cities.php')
  let data = await conn.json() // [{"city_name":"a"},{"city_name":"b"}]
  let div_city = `<div class="to-city">
                    <img src="images/#img#">
                    <h3>xxx <p>yyy</p> </h3>
                  </div>`    
  let all_cities = ""
  //        0                1                    2
  // [{"city_name":"a"},{"city_name":"b"}, {"city_name":"c"}]
  for( let i = 0; i < data.length; i++ ){
    let city = data[i] // {"city_name":"a"}
    let city_name = city.city_name
    console.log(city_name)
    let copy_div_city = div_city
    copy_div_city = copy_div_city.replace("xxx", city_name)
    copy_div_city = copy_div_city.replace("yyy", city.city_airport)
    copy_div_city = copy_div_city.replace("#img#", city.city_image)
    all_cities += copy_div_city
  }
  console.log(data)
  document.querySelector("#to-results").insertAdjacentHTML("afterbegin", all_cities)
}
