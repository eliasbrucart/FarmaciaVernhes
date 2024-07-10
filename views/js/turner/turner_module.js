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
                console.log("Get Today Pharmacies " + response);
            }
        });
    }
});