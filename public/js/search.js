//  Show sensors search
function SearchByName() {
    let name = $("#search").val()
    let searchby = $("#searchby").find(":selected").val();
    window.location = "/showsensor/" + searchby + "/" + name;
}
$("#search").on("keypress", function (e) {
    if (e.keyCode == 13) {
        SearchByName();
    }
})


// Operator search

function OperatorSearch() {
    let value = $("#operator_value").val()
    let search = $("#operatorcolumn").find(":selected").val();
    window.location = "/operator/" + search + "/" + value;
}
$("#operator_value").on("keypress", function (e) {
    if (e.keyCode == 13) {
        OperatorSearch();
    }
})

function RestoreSearch() {
    let value = $("#restore_value").val()
    let search = $("#restore_column").find(":selected").val();
    window.location = "/restore/" + search + "/" + value;
}
$("#restore_value").on("keypress", function (e) {
    if (e.keyCode == 13) {
        RestoreSearch();
    }
})
