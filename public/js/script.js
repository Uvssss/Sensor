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


$(document).ready(function(){
    $(".hoverDiv").hover(function(){
        $(this).css("background", "#f5f5f5");
    }, function(){
        $(this).css("background", "#fff");
    });
});
