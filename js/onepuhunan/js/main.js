var date = new Date(),
    year = date.getFullYear(),
    month = date.getMonth(),
    day = date.getUTCDate()-1,
    months = [ "Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];

document.getElementById('daymonth').innerHTML = months[month] + " " + day;
document.getElementById('year').innerHTML = year;

var clockH = $(".hours");
var clockM = $(".minutes");

