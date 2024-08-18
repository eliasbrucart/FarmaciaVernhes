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

    GetTodayPharmacies(actualDateToDBFormat);

    $('.videoPharmacy24hs').show();
    $('.videoPharmacy12hs').hide();

    var twoVideos = false;

    document.getElementById('videoPharmacy24hs').addEventListener('ended',Activate12hsVideo,false);
    document.getElementById('videoPharmacy12hs').addEventListener('ended',Activate24hsVideo,false);

    function Activate12hsVideo(e){
        GetTodayPharmacies(actualDateToDBFormat);
        if(twoVideos){
            $('.videoPharmacy24hs').hide();
            $('.videoPharmacy12hs').show();
            $('.videoPharmacy12hs').trigger('play');
        }else{
            $('.videoPharmacy24hs').trigger('play');
        }
    }

    function Activate24hsVideo(e){
        GetTodayPharmacies(actualDateToDBFormat);
        $('.videoPharmacy12hs').hide();
        $('.videoPharmacy24hs').show();
        $('.videoPharmacy24hs').trigger('play');
    }

    function Show24hsVideo(){
        $('.videoPharmacy24hs').show();
        twoVideos = false;
        $('.videoPharmacy24hs').trigger('play');
    }

    function ActivateBothVideos(){
        $('.videoPharmacy24hs').show();
        $('.videoPharmacy12hs').hide();
        twoVideos = true;
        $('.videoPharmacy24hs').trigger('play');
    }

    setInterval(function(){
        if(CheckDateChanged(actualDateToDBFormat)){
            console.log("Cambio la fecha!");

            actualDate = date.getDate()+"/"+monthToCalendar+"/"+date.getFullYear();

            $(".actualDateSpan").text(actualDate);

            var newDateDBFormat = 0;
    
            newDateDBFormat = UpdateDate();
    
            SaveDate(newDateDBFormat);

            GetTodayPharmacies(newDateDBFormat);

            //location.reload();
        }
        console.log("Chequeando cambio de fecha a cada minuto!");
        //GetTodayPharmacies(actualDateToDBFormat);
    }, 60000); //half hour
    
    //GetTodayPharmacies(actualDateToDBFormat);
    
    console.log("GetSavedDate func " + GetSavedDate());

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
                //console.log(parseJSON);
                if(parseJSON.length > 1){
                    //ActivateBothVideos();
                    twoVideos = true;
                    for(var i = 0; i < parseJSON.length; i++){
                        GetPharmacyFileRoutes(parseJSON[i].id_pharmacy, parseJSON[i].fullDay);
                    }
                }else{
                    Show24hsVideo();
                    GetPharmacyFileRoutes(parseJSON[0].id_pharmacy, parseJSON[0].fullDay);
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
                //var videoPharmacy24 = document.getElementById('videoPharmacy24hs');
                if(fullDay == 1){
                    $('.pharmacy24Address').text(parseJSON);
                }else{
                    $('.pharmacyAddress').text(parseJSON);
                }
            }
        });

    }

    function GetPharmacyFileRoutes(idPharmacy, fullDay){
        var validateData = new FormData();
        validateData.append("getTodayPharmacyFileRoutes" , true);
        validateData.append("idTodayPharmacy", idPharmacy);

        $.ajax({
            url:hiddenPath+"ajax/turner_module_ajax.php",
            method: "POST",
            data: validateData,
            cache: false,
            contentType: false,
            processData: false,
            success: (response)=>{

                var videoPharmacy24 = document.getElementById('videoPharmacy24hs');
                var videoPharmacy12hs = document.getElementById('videoPharmacy12hs');
                var parseResponse = JSON.parse(response);
                
                console.log("response get pharmacy file routes " + parseResponse[0]);
                console.log("response get pharmacy file routes " + parseResponse[1]);

                if(fullDay == 1){ //es array
                    //console.log("videos full " + videoFile[i].fulldayvideo);
                    //$('.pharmacy24Address').text(parseJSON);
                    videoPharmacy24.src = parseResponse[0];
                }else{
                    //console.log("videos half " + videoFile[i].halfdayvideo);
                    videoPharmacy12hs.src = parseResponse[1];
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