// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.
$(document).ready(function () {

    $(".card-header").on("click", function(){
        let tableContent = $(this).siblings().children(".card-body").html().trim();
        if(tableContent == ""){
            $(".elemento-salud").trigger("change");
        }
    })

	$(".elemento-salud").on("change", function (e) {
		let value = $(this).val();
        let userId = this.dataset.userid;
        getElementsByUser(userId, value);
	});
});

function getElementsByUser(id, value) {
	let action = "";
	switch (value) {
		case "Control":
			action = "ControlsByUser";
			break;
		case "Indicadores":
			action = "IndicatorsByUser";
			break;
		case "Condicion":
			action = "ConditionsByUser";
			break;
		case "Laboratorio":
			action = "LaboratoryResultsByUser";
			break;
		default:
            action = "ControlsByUser";
			break;
	}
	$("#" + id + "-card-body").load(
		"https://localhost:7240/Family/" + action + "?userId=" + id
	);
}
