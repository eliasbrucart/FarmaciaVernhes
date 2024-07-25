function AddPharmacy(){
    var namePharmacy = $('.addPharmacy').val();
    var addressPharmacy = $('.addressPharmacy').val();
    var fullDayPharmacy = $('.fullDayPharmacy').is(":checked");

    console.log("fullDayPharmacy " + fullDayPharmacy);

    switch(fullDayPharmacy){
        case "true":
            fullDayPharmacy = 1;
            break;
        case "false":
            fullDayPharmacy = 0;
            break;
        default:
            break;
    }

    var validateData = new FormData();
    validateData.append("namePharmacyToAdd", namePharmacy);
    validateData.append("addressPharmacyToAdd", addressPharmacy);
    validateData.append("fullDayPharmacy", fullDayPharmacy);

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

function SaveAll(){
    location.reload();
}