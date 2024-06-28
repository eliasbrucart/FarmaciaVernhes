function AddPharmacy(){
    var namePharmacy = $('.addPharmacy').val();
    var addressPharmacy = $('.addressPharmacy').val();

    var validateData = new FormData();
    validateData.append("namePharmacyToAdd", namePharmacy);
    validateData.append("addressPharmacyToAdd", addressPharmacy);

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