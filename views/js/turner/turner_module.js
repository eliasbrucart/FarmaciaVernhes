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

    //UpdateDate();

    //SaveDate(); //dentro de interval
    //console.log("Check Date Changed " + CheckDateChanged());

    //console.log("new date DB Format " + newDateDBFormat);

    //CheckDateChanged(actualDateToDBFormat);

    setInterval(function(){
        if(CheckDateChanged(actualDateToDBFormat)){
            console.log("Cambio la fecha!");

            actualDate = date.getDate()+"/"+monthToCalendar+"/"+date.getFullYear();

            $(".actualDateSpan").text(actualDate);

            var newDateDBFormat = 0;
    
            newDateDBFormat = UpdateDate();
    
            SaveDate(newDateDBFormat);

            GetTodayPharmacies(newDateDBFormat);

            location.reload();
        }
        console.log("Chequeando cambio de fecha a cada minuto!");
    }, 1800000); //half hour

    GetTodayPharmacies(actualDateToDBFormat);

    console.log("GetSavedDate func " + GetSavedDate());

    /*setInterval(function(){
        console.log("Me ejecuto al iniciar el dia!");
        if(actualDateToDBFormat != GetSavedDate()){
            SaveDate();
        }
    }, 60000);*/

    function GetTodayPharmacies(actualDate){
        var validateData = new FormData();
        validateData.append("getTodayPharmacies", true);
        validateData.append("actualDateToDBFormat", actualDate);

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

    function SaveDate(date){
        localStorage.setItem("actualDate", date);

        console.log("Save Date in local storage " + localStorage.getItem("actualDate"));
    }

    function GetSavedDate(){
        return localStorage.getItem("actualDate");
    }

    function UpdateDate(){
        var date = new Date();

        const actualDateToDBFormat = date.toLocaleDateString("en-US", { // you can use undefined as first argument
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
        })

        return actualDateToDBFormat;
    }
    
    function CheckDateChanged(actualDate){
        var date = new Date();

        const actualDateToDBFormat = date.toLocaleDateString("en-US", { // you can use undefined as first argument
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
        })

        console.log("actualDateToDBFormat in checkDateChanged " + actualDateToDBFormat);

        if(actualDateToDBFormat != actualDate){
            return true;
        }else{
            return false;
        }
    }
});