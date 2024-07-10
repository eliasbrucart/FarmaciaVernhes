$(function(){
    var date = new Date();

    var monthToCalendar = date.getMonth()+1;

    var actualDate = date.getDate()+"/"+monthToCalendar+"/"+date.getFullYear();

    console.log("actualDate" + actualDate.toString());

    $(".actualDateSpan").text(actualDate);
});