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
    var psw=  /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if(password.value.match(psw) && password==confirm_password)
        {
            $("#reg_submit").submit();
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
    }
};
// use ExistsEmail/User for Register later
datasensorform=0;
function sensordataform(){
    if(datasensorform==0){
        $("#manualinsert").removeClass("d-none")
        $("#autoinsert").addClass("d-none")
        datasensorform=1;
    }
    else{
        $("#manualinsert").addClass("d-none")
        $("#autoinsert").removeClass("d-none")
        datasensorform=0;
    }
}
