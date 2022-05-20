$(document).ready(function() {
    $('.bt_suma').on('click', function() {
        let cant = $("#cantProd").html().trim();
        cant = parseInt(cant) + 1;
        console.log(cant);
    });
});