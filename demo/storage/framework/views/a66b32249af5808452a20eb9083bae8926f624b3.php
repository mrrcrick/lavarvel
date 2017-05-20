

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head><meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
</head>
<?php echo $__env->make('sidepanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo e(URL::asset('js/datetimepicker_css.js')); ?>"></script>

<script>
var divloaded="got it**************";

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

// Returns the four-digit year corresponding to the ISO week of the date.
Date.prototype.getWeekYear = function() {
  var date = new Date(this.getTime());
  date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
  return date.getFullYear();
}


window.onload = function(e){ 
  // document.getElementById("maindate").value=converttoukdate(date);
   
  <!---  jquery toggle side bar
    
}


//new get date function




// ajax request
function getrequestfromserver(url) {
	
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if (xmlhttp.status == 200) {
               datareceived = xmlhttp.responseText;
			   return datareceived;
           }
           else if (xmlhttp.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    }

    xmlhttp.open("GET",url, true);
    xmlhttp.send();
	
}


//extract the time from the date
function extracttimefromdate(datin)
{

var d = new Date(datin);
var time=(d.getHours() + ":" + d.getMinutes()+ d.getSeconds());
return time;
}


//imported from main_layout

//validate time 12 hours
function ValTime12hrs(time) {
  var regex = /^(0?[1-9]|1[012])(:[0-5]\d) [APap][mM]$/
  var match = time.match( regex );
  if ( match ) {
    var hour  = parseInt( match[1] );
    if ( !isNaN( hour) && hour <= 11 ) {
      return true;
    }
  }
  return false;
}


function setplace(selectedplace)
{
	
	// pass selected place 
	var e =selectedplace;
    place_id = e;
	
}




// add shift to data base check if a place id has been selected
function addshift()
{
	if(isNaN(place_id)){
	  alert("please select place");
	}
	else
	{
		window.open("http://localhost:8000/addbookin/"+formatphpDate(parent.date)+"/"+parent.selected_id+"/"+parent.name+"/"+getTwentyFourHourTime(parent.starttime)
	 +"/"+getTwentyFourHourTime(parent.endtime)+"/"+place_id, "Bottomoptions");  
     document.getElementById('mainpanel').contentWindow.location.reload();
		
		
	}
	}
	
	
	
	function converttoukdate(date)
	 {
		 
		
		
        <!--  alert(name.getAttribute("fname") +" "+name.getAttribute("lname")+" id:"+name.getAttribute("id")); -->
		<!--  window.open("http://localhost:8000/timetable/40/30/"+name.getAttribute("fname"), "mainwd"); -->
		parent.name=name.getAttribute("fname")+" "+name.getAttribute("lname");
		parent.selected_id=name.getAttribute("id");
		parent.refreshbottom();  
		
	 }
	//function getdateandconvert(datebxid)
	//{
	//	javascript:NewCssCal(datebxid);
	//	alert("DATE SET :"+datebxid.value);
	//	datebxid.value=date.toLocaleDateString();
//	}
// format to php date i.e 2004-5-9	
function formatphpDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}	

// format to uk date with // ie 04/33/1988
function formatukDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [day,month,year].join('/');
}


//convert to 24 hours
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



// clear the  timetable

function clearselecteddates()
{
	clearselection();
	
	
}


function setstarttime(start)
{
	//alert("start");
	starttime=start.value;
	//alert(start.value);
	clearselecteddates();
	starttime=start.value;
	colour1cell();
}

function setendtime(end)
{
	//alert("start");
	endtime=end.value;
	//alert(start.value);
	
	endtime=end.value;
	colourcells();
}




// This script is released to the public domain and may be used, modified and
// distributed without restrictions. Attribution not necessary but appreciated.
// Source: https://weeknumber.net/how-to/javascript 



function clearselection()
{
	
	var table = document.getElementById("timetable");
for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
	 col.style.backgroundColor = "#b8d1f3";   
   }
}
	
	
	
	
	
}


// colour only 1 cell
function colour1cell(start)
	 {
	   // alert(parent.endtime);
	    var thisstarttime=getTwentyFourHourTime(start);
		
		 
		
		//alert(endtime24hrs);
       // alert(parent.date);
	//	alert(parent.starttime);
	//	alert(parent.endtime);
		
        var table = document.getElementById("timetable");
        for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
         for (var j = 0, col; col = row.cells[j]; j++) {
     //iterate through columns
     //columns would be accessed using the "col" variable assigned in the for loop
	 //alert("Date :"+col.getAttribute("date")+"Time :"+col.getAttribute("time"));
	 
	 
	        if (col.getAttribute("date")==date){
				 
				
				
				
	        
	         if (getTwentyFourHourTime(col.getAttribute("time"))==thisstarttime){
	          col.style.backgroundColor = "#66FF00"; 
		     }
			
			
				
				
				
				
			}
	      
	 
	 
	 }
   }
   
}









// colour 2 cells
function colourcells(start,end)
	 {
	   //alert(endtime);
	  


     	  var thisstarttime=getTwentyFourHourTime(start);
		
		 var thisendtime=getTwentyFourHourTime(end);
		
		//alert(endtime24hrs);
       // alert(parent.date);
		//alert(starttime);
		//alert(endtime);
			
        var table = document.getElementById("timetable");
        for (var i = 0, row; row = table.rows[i]; i++) {
			
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
         for (var j = 0, col; col = row.cells[j]; j++) {
     //iterate through columns
     //columns would be accessed using the "col" variable assigned in the for loop
	 //alert("Date :"+col.getAttribute("date")+"Time :"+col.getAttribute("time"));
	 
	 
	        if (col.getAttribute("date")==date){
				 
				
				
				
	        if (thisendtime !=null){ 
	         if (getTwentyFourHourTime(col.getAttribute("time"))>=thisstarttime && getTwentyFourHourTime(col.getAttribute("time"))<=thisendtime){
	          col.style.backgroundColor = "#66FF00"; 
		     }
			}
			
				
				
				
				
			}
	      
	 
	 
	 }
   }
   
}

    


function refreshmain()
{

	window.open("http://localhost:8000/timetable/"+weeknumber+"/"+timeintervalsmins+"/select/"+year+"/"+place_id); 
	//window.open("http://localhost:8000/timetable/01/30/select/2017/all");
	//"http://localhost:8000/timetable/"+weeknumber+"/"+timeintervalsmins+"/select/"+year+"/"+place_id;
}
		
	 
function getdateandconvert(datebxid)
	{
		
		//javascript:NewCssCal(datebxid);
	//	alert("DATE SET :"+datebxid.value);
		//datebxid.value=date.toLocaleDateString();
		
		mydate=new Date(document.getElementById(datebxid).value);
		
		weeknumber = minTwoDigits(mydate.getWeek());
		year=mydate.getFullYear();
		//alert(weeknumber);
		date=mydate;
		//document.getElementById(datebxid).value=converttoukdate(document.getElementById(datebxid).value);
		//document.getElementById(datebxid).value=converttoukdate(mydate);
		
		
	
		refreshmain();
	}

function setplace()
{
	
	
	var e = document.getElementById("place");
	
    var strUser = e.options[e.selectedIndex].value;
	place_name=e.options[e.selectedIndex].name;
	place_id=e.options[e.selectedIndex].value;
	
	document.getElementById('location').innerHTML=e.options[e.selectedIndex].innerHTML;
	
	 //setplace(strUser);
	
}

function gotoplace()
{
refreshmain();
}



</script>
<!--- Jquey -->
<script>
var dbl_clicked=false;


var sidepane="";


var today = new Date();
todaysdate=formatukDate(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate());


todaysweek=minTwoDigits(today.getWeek());
todaysyear=today.getFullYear();


var datareceived=null;
//var datetoconvert="";
var date=todaysdate;
var starttime="please select";
var endtime="please select";
var name="please select";
var selected_id=0;
var weeknumber=minTwoDigits(today.getWeek());
var year=today.getFullYear();
var place_id="all";
var place_name="all";
var selectedplace="";
var timeintervalsmins=60;
var curr_timetable=null;
var testfunc=null;
var timeupdated =null;
var names=null;
 $(document).ready(function(){
 
 $("#pressme").click(function() {
 
 $("#sidebarnav").toggle('slide');
 });

// add the each element toggle to id
//set inital variables

 place_id="all";
 place_name="all";
 selectedplace="";
 timeintervalsmins=60;
 $("#temp").load("http://localhost:8000/temp"); 
 });
</script>






<style style="text/css">
  .timetable{
		width:100%; 
		border-collapse:collapse; 
	}
	.timetable td{ 
		padding:1px; border:white 1px solid;
		 color: white;
	   	font-size:small;
		 vertical-align: top;
		 white-space:nowrap;
		 padding-bottom: 0.5cm;
	}
	/* Define the default color for all the table rows */
	.timetable tr{
		background: #F8F8F8 ;
	}
    .timetable tr:hover {
          background-color: #ffff99;
    }
	
	 .timetable th{
          background-color: #2A2A29;
		  color: white;
    }
	tp
	{
		color: black;
		
		
	}
	.bc
	{
		background-color: #2A2A29;
		
	}
	
	tbody tr:nth-child(odd) {
   background-color: #E8E8E8 ;
}
mt{
	
	
	
	
	
}

.sidebar{
  float: left;
  width: 200px;
  background-color: blue;
}
.topcontrol {
    margin: auto;
    width: 100%;
    border: 3px solid green;
    padding: 10px;
}
.centrescreen
{
	 float: left;
  width: 200px;
	
	
	
	
}

.alien
{
background-color: blue;	
}

.bottompanel
{
	
	clear:both;
	margin: auto;
    width: 100%;
    border: 3px solid green;
    padding: 10px;

	
}






table th{
          background-color: #2A2A29;
		  color: white;
    }
	

</style>

<link href="<?php echo e(asset('css/htmlDatePicker.css')); ?>" rel="stylesheet" type="text/css" >

<script type="text/javascript" src="<?php echo e(URL::asset('js/htmlDatePicker.js')); ?>"></script>

<script type="text/javascript"><!--
		var today = new Date();
		
		DisablePast = false;
		range_start = new Date(today.getFullYear(),today.getMonth(),8);
		range_end = new Date(today.getFullYear(),today.getMonth(),5);
	
	--></script>
	
	
	<div class="topcontrol" id="topcontrol" >
<b> Select Date:  <input name="Date" id="maindate" value="<?php echo e($fromdate); ?>"onchange="getdateandconvert('maindate')"></input></b>
<img src="<?php echo e(URL::asset('js/images2/cal.gif')); ?>" onclick="javascript:NewCssCal('maindate','yyyyMMdd');" style="cursor:pointer"/>

<b> Place </b> <select name="place" id="place" onClick="setplace()" >
<option name="all"  id="all" value="all">All </option>
<?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listofplaces): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
<option  name="<?php echo e($listofplaces['Name']); ?>" value="<?php echo e($listofplaces['id']); ?>" id="<?php echo e($listofplaces['id']); ?>">
<?php echo e($listofplaces['Name']); ?></option> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

</select>
<button type="button" onclick="gotoplace()"> View place</button>
<b>Position</b><input name="position" id="position"></input> <b>Location: </b><span id="location"> </span>

</br>
<b>Date start:</b> <?php echo e($fromdate); ?> <b>Date End:</b> <?php echo e($todate); ?></br> </div> 
<section>
</div>
<body>
    <?php echo $__env->yieldContent('leftnav'); ?>
	

<div class="centrescreen">


<div id="main_panel" class="mainpanel">


<table id="timetable" class="timetable">
 
  <tr>
   <th>Time</th>
   <th>Monday</th>
   <th>Tuesday</th>
   <th>Wednesday</th>
   <th>Thursday</th>
   <th>Friday</th>
   <th>Saturday</th>
   <th>Sunday</th>
   
   
   
 </tr>


<?php $__currentLoopData = $gettimetable[$dayinweek[0]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$timeslot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  
	
	<tr>
	<!--- Times -->
	<td class="bc"><b><?php echo e($key); ?></b></td>
	<!--- Monday -->
	
	<td class="Mon" date="<?php echo e($dayinweek[0]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	
     <?php $__currentLoopData = $gettimetable[$dayinweek[0]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	  <div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td class="Tue" date="<?php echo e($dayinweek[1]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	
     <?php $__currentLoopData = $gettimetable[$dayinweek[1]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp> &#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	  <div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td class="Wed" date="<?php echo e($dayinweek[2]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	
     <?php $__currentLoopData = $gettimetable[$dayinweek[2]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	<div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	<td class="Thur" date="<?php echo e($dayinweek[3]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	
     <?php $__currentLoopData = $gettimetable[$dayinweek[3]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	<div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td class="Wed" date="<?php echo e($dayinweek[4]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	
     <?php $__currentLoopData = $gettimetable[$dayinweek[4]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	<div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td class="Wed" date="<?php echo e($dayinweek[5]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	
     <?php $__currentLoopData = $gettimetable[$dayinweek[5]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	<div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td class="Wed" date="<?php echo e($dayinweek[6]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	
     <?php $__currentLoopData = $gettimetable[$dayinweek[6]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	<div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	      
	 
	 </tr>
	
   
   
   
   
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</table>



</section>
<div id="temp"> 
    
 </div>
</div>
<button id="pressme"> hello </button></br>
<div id="bottompanel" class="bottompanel">  

<title>bottomform</title></head>

<body>


Date <input name="Date" id="SelectedDate"  onClick="GetDate(this);"   value=""  /> 
Start time&nbsp;<input name="starttime"  id="starttime" value="" class="datebox" >
End Time<input name="endtime" id="endtime" value="" class="datebox" >
 Name <input name="names" id="name" class="namebox" value="">

<br><br>
<input type="button" onClick ="addbookin();" name="add" class="add"  value="ADD" ></input> <button value="edit" name="edit" class="edit" >EDIT/CHANGE</button> 
<button value="delete" name="delete" class="delete">DELETE</button>
<button value="cancel" name="cancel" class="cancel" onClick="parent.clearselecteddates()" >CANCEL</button>
















</div>


 <script language="javascript">

       document.getElementById('maindate').setAttribute('value', parent.date);
	
	
	
	//refresh the side nav
	function refreshside()
{
	
	sendinfo=formatphpDate(date)+"$"+getTwentyFourHourTime(starttime)+"$"+getTwentyFourHourTime(endtime)+"$"+name;
	var side_name=name;
	var side_date=formatphpDate(date);
	var side_starttime=getTwentyFourHourTime(starttime);
	var side_endtime=getTwentyFourHourTime(endtime);
	//mode,date,starttime,finish
	var url=("http://localhost:8000/sidepanel/"+side_name+"/"+side_date+"/"+side_starttime+"/"+side_endtime);
	 var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if (xmlhttp.status == 200) {
            // $("#namerows").hmtl("<tr></tr>");
             $('#namelist').html("<tr><th><b>Names:</b></th></tr><tr ></tr>");
			  datareceived = xmlhttp.responseText;
			   //alert(datareceived);
			   //loop through each object
			  
					var obj = jQuery.parseJSON(datareceived);
					$.each(obj, function(key,value) {
					  //alert(value.fname+" "+value.lname+" "+value.status);
					  $('#namelist').append('<tr style="text-align:center;background-color: #3d3d29;"  > <td>'+value.fname+" "+value.lname+" "+value.status+'</td> </tr>');
					  var checkplace=(String(value.place));
					  if (value.place==0){
						  
						  //alert(value.slotstart +" "+slotfinish);
					    }
						else
						{
							$('#namelist').append('<tr> <td><tp>'+extracttimefromdate(value.slotstart)+" "+extracttimefromdate(value.slotfinish)+'</tp></td> </tr>');
						  $('#namelist').append('<tr> <td><tp>'+value.place+'</tp></td> </tr>');
							
							
							
							
						}
					}); 
				   
			   
           }
           else if (xmlhttp.status == 400) {
              alert('There was an error 400');
           }
           else {
               alert('something else other than 200 was returned');
           }
        }
    }

    xmlhttp.open("GET",url, true);
    xmlhttp.send();


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
	
	
	
	
			
			
			
	 function getselcell(name)
	 {
		 
		 if (!dbl_clicked){
			
			date=name.getAttribute("date");
			endtime="Please enter end time"; 
			starttime=name.getAttribute("time"); 
			clearselection();
			colour1cell(starttime);
			dbl_clicked=true;
			
			//parent.refreshbottom();
		 }
		 else
		 {
			 endtime=name.getAttribute("time"); 
			 colourcells(starttime,endtime);
			 dbl_clicked=false;
			 //parent.refreshbottom();
			 refreshside();
			 
			  <!-- sendinfo=date+"$"+starttime+"$"+endtime+"$"+"ggggg"; -->
			  <!--window.open("http://localhost:8000/bottom/"+sendinfo, "Bottomoptions");-->
		 }
		 
		 
		 
		 
		
		
		
		
	 }
	 function getselname(name)
	 {
		 
		 if (2>7){
		 sidepane=sidepane+name.getAttribute("value")+" ";
		
		
		window.open("http://localhost:8000/sidepanel/"+sidepane, "sideoptions"); 
	 }		
		
	 }
	 
	 
	
    
</script>	
	


</body>
</html>