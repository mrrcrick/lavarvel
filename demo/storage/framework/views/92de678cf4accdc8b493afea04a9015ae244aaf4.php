<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>

  <title>timetablelayout</title>
</head><body>
<script type="text/javascript" src="<?php echo e(URL::asset('js/datetimepicker_css.js')); ?>"></script>
<script>
var date="Please enter";
var starttime="please select";
var endtime="please select";
var name="please select";
var selected_id=0;
var weeknumber=1;
var year=0;
var place_id=0;
var selectedplace="";

function setplace(selectedplace)
{
	
	// pass selected place 
	var e =selectedplace;
    place_id = e;
	
}




function refreshbottom()
{
	sendinfo=date+"$"+starttime+"$"+endtime+"$"+name;
	
	<!-- convert dates to right format -->
	
	 
	
	 window.frames['Bottomoptions'].document.getElementById('SelectedDate').value=formatukDate(date);
	 window.frames['Bottomoptions'].document.getElementById('starttime').value=starttime;
	 window.frames['Bottomoptions'].document.getElementById('endtime').value=endtime;
	 window.frames['Bottomoptions'].document.getElementById('name').value=name;
	<!-- window.open("http://localhost:8000/bottom/"+sendinfo, "Bottomoptions");  -->
}
function refreshside()
{
	
	
    
	
	sendinfo=formatphpDate(date)+"$"+getTwentyFourHourTime(starttime)+"$"+getTwentyFourHourTime(endtime)+"$"+name;
	
	
	
	window.open("http://localhost:8000/sidepanel/date_start_end_name/"+sendinfo, "sideoptions");

}
function refreshmain()
{
	<!-- window.open("http://localhost:8000/timetable/"+weeknumber+"/30/select/"+year, "mainpanel");
	
	
	document.getElementById("mainpanel").src="http://localhost:8000/timetable/"+weeknumber+"/30/select/"+year;
}
function addshift()
{
	
	window.open("http://localhost:8000/addbookin/"+formatphpDate(parent.date)+"/"+parent.selected_id+"/"+parent.name+"/"+getTwentyFourHourTime(parent.starttime)
	+"/"+getTwentyFourHourTime(parent.endtime)+"/"+place_id, "Bottomoptions");  
    document.getElementById('mainpanel').contentWindow.location.reload();
	}
	
	
	
	function converttoukdate(date)
	 {
		 
		
		
        <!--  alert(name.getAttribute("fname") +" "+name.getAttribute("lname")+" id:"+name.getAttribute("id")); -->
		<!--  window.open("http://localhost:8000/timetable/40/30/"+name.getAttribute("fname"), "mainwd"); -->
		parent.name=name.getAttribute("fname")+" "+name.getAttribute("lname");
		parent.selected_id=name.getAttribute("id");
		parent.refreshbottom();  
		
	 }
	function getdateandconvert(datebxid)
	{
		javascript:NewCssCal(datebxid);
		
		datebxid.value=date.toLocaleDateString();
	}
	
function formatphpDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}	
function formatukDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [day,month,year].join('/');
}



function getTwentyFourHourTime(amPmString) { 
    var time=amPmString;

var hours = Number(time.match(/^(\d+)/)[1]);
var minutes = Number(time.match(/:(\d+)/)[1]);
var AMPM = time.match(/\s(.*)$/)[1].toLowerCase();

if (AMPM == "pm" && hours < 12) hours = hours + 12;
if (AMPM == "am" && hours == 12) hours = hours - 12;
var sHours = hours.toString();
var sMinutes = minutes.toString();
if (hours < 10) sHours = "0" + sHours;
if (minutes < 10) sMinutes = "0" + sMinutes;

var rettime=(sHours +':'+sMinutes);
return rettime;
}		
	
/* For a given date, get the ISO week number
 *
 * Based on information at:
 *
 *    http://www.merlyn.demon.co.uk/weekcalc.htm#WNR
 *
 * Algorithm is to find nearest thursday, it's year
 * is the year of the week number. Then get weeks
 * between that date and the first day of that year.
 *
 * Note that dates in one year can be weeks of previous
 * or next year, overlap is up to 3 days.
 *
 * e.g. 2014/12/29 is Monday in week  1 of 2015
 *      2012/1/1   is Sunday in week 52 of 2011
 */
function getWeekNumber(d) {
    // Copy date so don't modify original
    d = new Date(+d);
    d.setHours(0,0,0,0);
    // Set to nearest Thursday: current date + 4 - current day number
    // Make Sunday's day number 7
    d.setDate(d.getDate() + 4 - (d.getDay()||7));
    // Get first day of year
    var yearStart = new Date(d.getFullYear(),0,1);
    // Calculate full weeks to nearest Thursday
    var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
    // Return array of year and week number
    return [d.getFullYear(), weekNo];
}

// ADD 0 TO NUMBER less than 10 i.e 4 =04 needed in order for date to work
function minTwoDigits(n) {
  return (n < 10 ? '0' : '') + n;
}

	
	
	
	
	
	
	
</script>

<iframe name="sideoptions" id="sideoptions" src="http://localhost:8000/sidepanel/blank/$blank$blank$blank$blank" height="500" width="200">
</iframe>

<!--<iframe name="mainwds" id="mainwds" src="/* http://localhost:8000/timetable/40/30/select" */ height="500" width="800">
</iframe> -->

<iframe name="mainpanel" id="mainpanel" src="http://localhost:8000/timetable/01/30/select/2017" height="500" width="800">
</iframe>



<br>

<iframe name="Bottomoptions" id="Bottomoptions" src="http://localhost:8000/bottom/blank" height="200" width="1000">

</iframe><br>
<script>
 refreshbottom();
 
</script>

<br>

<br>

<br>

</body></html>