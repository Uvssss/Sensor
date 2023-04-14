form = 0;
function showsensorform() {
    if (form == 0) {
        $("#sensorform").removeClass("d-none")
        $("#sensortable").addClass("d-none")
        form = 1;
        console.log($("#sensortable"))
        console.log($("#sensorform"))
    }
    else {
        $("#sensorform").addClass("d-none")
        $("#sensortable").removeClass("d-none")
        form = 0;
    }
};
datasensorform = 0;
function sensordataform() {
    if (datasensorform == 0) {
        $("#manualinsert").removeClass("d-none")
        $("#autoinsert").addClass("d-none")
        datasensorform = 1;
    }
    else {
        $("#manualinsert").addClass("d-none")
        $("#autoinsert").removeClass("d-none")
        datasensorform = 0;
    }
}
