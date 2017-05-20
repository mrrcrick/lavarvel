<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>

  <title>timetablelayout</title>
  <script>
  window.onload = function(e){ 
   
	refreshmain();
	refreshbottom();
	
}
  </script>
  
  
  
  
  
</head><body>
<script type="text/javascript" src="<?php echo e(URL::asset('js/datetimepicker_css.js')); ?>"></script>
<script>

// set timetable

function clearselecteddates()
{
	document.getElementById("mainpanel").contentWindow.clearselection();
	
	
}













// This script is released to the public domain and may be used, modified and
// distributed without restrictions. Attribution not necessary but appreciated.
// Source: https://weeknumber.net/how-to/javascript 

// Returns the ISO week of the date.
Date.prototype.getWeek = function() {
  var date = new Date(this.getTime());
   date.setHours(0, 0, 0, 0);
  // Thursday in current week decides the year.
  date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
  // January 4 is always in week 1.
  var week1 = new Date(date.getFullYear(), 0, 4);
  // Adjust to Thursday in week 1 and count number of weeks from date to week1.
  return 1 + Math.round(((date.getTime() - week1.getTime()) / 86400000
                        - 3 + (week1.getDay() + 6) % 7) / 7);
}


function setplace(selectedplace)
{
	
	// pass selected place 
	var e =selectedplace;
    place_id = e;
	
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
	
	
	
	document.getElementById("mainpanel").src="http://localhost:8000/timetable/"+weeknumber+"/"+timeintervalsmins+"/select/"+year+"/"+place_id;
}
	
var today = new Date();
todaysdate=formatukDate(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate());


todaysweek=minTwoDigits(today.getWeek());
todaysyear=today.getFullYear();



var date=todaysdate;
var starttime="please select";
var endtime="please select";
var name="please select";
var selected_id=0;
var weeknumber=minTwoDigits(today.getWeek());;
var year=today.getFullYear();
var place_id="all";
var place_name="all";
var selectedplace="";
var timeintervalsmins=60;
var curr_timetable=null;
var testfunc=null;
	
	
	
</script>

<iframe name="sideoptions" id="sideoptions" src="http://localhost:8000/sidepanel/blank/$blank$blank$blank$blank" height="500" width="200">
</iframe>

<!--<iframe name="mainwds" id="mainwds" src="/* http://localhost:8000/timetable/40/30/select" */ height="500" width="800">
</iframe> -->

<iframe name="mainpanel" id="mainpanel" src="http://localhost:8000/timetable/01/30/select/2017/all" height="500" width="870">
</iframe>



<br>

<iframe name="Bottomoptions" id="Bottomoptions" src="http://localhost:8000/bottom/blank" height="200" width="1000">

</iframe><br>
<script>
 
 
 //"http://localhost:8000/timetable/06/30/select/2017"
</script>

<br>

<br>

<br>

</body></html>