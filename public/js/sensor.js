function SearchByName(){
    let name=$("#search").val()
    let searchby=$("#searchby").find(":selected").val();
    window.location="/showsensor/"+searchby+"/"+name;
}
$("#search").on("keypress",function (e){
    if(e.keyCode == 13){
        SearchByName();
    }
})
