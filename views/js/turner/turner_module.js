$(function(){
    var date = new Date();

    var monthToCalendar = date.getMonth()+1;

    var actualDate = date.getDate()+"/"+monthToCalendar+"/"+date.getFullYear();

    console.log("actualDate" + actualDate.toString());

    $(".actualDateSpan").text(actualDate);

    //var actualDateToDBFormat = monthToCalendar+"/"+date.getDate()+"/"+date.getFullYear();
    const actualDateToDBFormat = date.toLocaleDateString("en-US", { // you can use undefined as first argument
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
      })

    console.log("actualDateToDBFormat " + actualDateToDBFormat);

    GetTodayPharmacies();

    function GetTodayPharmacies(){
        var validateData = new FormData();
        validateData.append("getTodayPharmacies", true);
        validateData.append("actualDateToDBFormat", actualDateToDBFormat);

        $.ajax({
            url:hiddenPath+"ajax/turner_module_ajax.php",
            method: "POST",
            data: validateData,
            cache: false,
            contentType: false,
            processData: false,
            success:(response)=>{
                var parseJSON = JSON.parse(response);
                for(var i = 0; i < parseJSON.length; i++){
                    if(parseJSON[i].fullDay == 1){
                        $('.pharmacy24Name').text(parseJSON[i].name_pharmacy);
                        GetPharmacyAddress(parseJSON[i].id_pharmacy, parseJSON[i].fullDay);
                    }else{
                        $('.pharmacyName').text(parseJSON[i].name_pharmacy);
                        GetPharmacyAddress(parseJSON[i].id_pharmacy, parseJSON[i].fullDay);

                    }
                }
            }
        });
    }

    function GetPharmacyAddress(idPharmacy, fullDay){
        var validateData = new FormData();
        validateData.append("getTodayPharmacyAddress" , true);
        validateData.append("idTodayPharmacy", idPharmacy);

        $.ajax({
            url:hiddenPath+"ajax/turner_module_ajax.php",
            method: "POST",
            data: validateData,
            cache: false,
            contentType: false,
            processData: false,
            success: (response)=>{
                var parseJSON = JSON.parse(response);
                if(fullDay == 1){
                    $('.pharmacy24Address').text(parseJSON);
                }else{
                    $('.pharmacyAddress').text(parseJSON);
                }
            }
        });

    }
});