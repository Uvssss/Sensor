function changeurl(element)
{
    if(element==='sensors')
    {
        window.location="/sensors"
    }
    if(element==='insertdata')
    {
        window.location="/insertdata"
    }
    if(element==='getdata')
    {
        window.location="/showdata"
    }
    if(element=== 'settings')
    {
        window.location="/profile"
    }
    if(element=='showdata'){
        window.location="/showdata"
    }
}
 // Before i forget add authentication scripts
 function CheckPassword()
{
    password=document.getElementById("password");
    confirm_password=document.getElementById("password-confirm")
    var psw=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    if(password.value.match(psw) && password==confirm_password)
        {
            return true;
        }
    else
        {
            return false;
        }
}
form=0;
function showsensorform(){
    if(form==0){
        $("#sensorform").removeClass("d-none")
        $("#sensortable").addClass("d-none")
        form=1;
        console.log($("#sensortable"))
        console.log($("#sensorform"))
    }
    else{
        $("#sensorform").addClass("d-none")
        $("#sensortable").removeClass("d-none")
        form=0;
        console.log($("#sensortable"))
        console.log($("#sensorform"))
    }
};


document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
    toggle.addEventListener('click', ()=>{
    // show navbar
    nav.classList.toggle('show')
    // change icon
    toggle.classList.toggle('bx-x')
    // add padding to body
    bodypd.classList.toggle('body-pd')
    // add padding to header
    headerpd.classList.toggle('body-pd')
    })
    }
    }

    showNavbar('header-toggle','nav-bar','body-pd','header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))

     // Your code to run since DOM is loaded and ready
    });
