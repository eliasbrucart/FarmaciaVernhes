function AddPharmacy(){
    var namePharmacy = $('.addPharmacy').val();

    var validateData = new FormData();
    validateData.append("namePharmacyToAdd", namePharmacy);

    $.ajax({
        url:hiddenPath+"ajax/admin_module_ajax.php",
        method: "POST",
		data: validateData,
		cache: false,
		contentType: false,
		processData: false,
        success:(response)=>{
            console.log("Add pharmacy response" + response);
        }
    });
}