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
function SensorUpdateView(id){
        window.location="/update-sensors/"+id;
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
