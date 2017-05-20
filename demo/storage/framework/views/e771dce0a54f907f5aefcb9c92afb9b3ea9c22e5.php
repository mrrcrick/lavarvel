

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


function testcolour1cell()
{
	        date=name.getAttribute("date");
			endtime="Please enter end time"; 
			starttime=name.getAttribute("time"); 
			clearselection();
			colour1cell(starttime);
			dbl_clicked=true;
	
}





//new add shift

function add_shift()
{
	alert(formatphpDate(date)+"/"+name_id+"/"+getTwentyFourHourTime(starttime)
	 +"/"+getTwentyFourHourTime(endtime)+"/"+place_id);
	if(place_id==0){
	  alert("PLEASE ENTER A PLACE")
	}
	else
	{
		
		
		var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
           if (xmlhttp.status == 200) {
               datareceived = xmlhttp.responseText;
			   return datareceived;
           }
           else if (xmlhttp.status == 400) {
              //alert('There was an error 400');
           }
           else {
               //alert('something else other than 200 was returned');
			   //window.open(formatphpDate(date)+"/"+name_id+"/"+getTwentyFourHourTime(starttime)
	// +"/"+getTwentyFourHourTime(endtime)+"/"+place_id);
           }
        }
    }

    xmlhttp.open("GET","http://localhost:8000/add_bookin/"+formatphpDate(date)+"/"+name_id+"/"+getTwentyFourHourTime(starttime)
	 +"/"+getTwentyFourHourTime(endtime)+"/"+place_id, true);
     xmlhttp.send();
		  
     
		
		
	}
	place_id="all";
 
    name_id=0;
	refreshmain();
	}











// add shift to data base check if a place id has been selected
function addshift()
{
	if(isNaN(place_id)){
	  alert("please select place");
	}
	else
	{
		window.open("http://localhost:8000/addbookin/"+formatphpDate(date)+"/"+selected_id+"/"+name+"/"+getTwentyFourHourTime(starttime)
	 +"/"+getTwentyFourHourTime(endtime)+"/"+place_id);  
     
		
		
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
	refreshside();
	
}


function setstarttime(start)
{
	//alert("start");
	starttime=start;
	clearselection();
	colour1cell(starttime);
	dbl_clicked=true;
	
}

function setendtime(end)
{
	
	//alert("End ");
	endtime=end;
	colourcells(starttime,endtime);
    dbl_clicked=false;
			 
	refreshside();
	document.getElementById('addbutton').style.visibility = 'visible';
	document.getElementById('cancel').style.visibility = 'visible'; 
	
	
	
}



// Convert a time in hh:mm format to minutes
function timeToMins(time) {
  var b = time.split(':');
  return b[0]*60 + +b[1];
}

// Convert minutes to a time in format hh:mm
// Returned value is in range 00  to 24 hrs
function timeFromMins(mins) {
  function z(n){return (n<10? '0':'') + n;}
  var h = (mins/60 |0) % 24;
  var m = mins % 60;
  return z(h) + ':' + z(m);
}




function clearselection()
{
	//refreshside();
	var table = document.getElementById("timetable");
for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
	 col.style.backgroundColor = "#b8d1f3";   
	 col.style.cssText=".timetable th{background-color: #2A2A29;color: white;}";
           col.style.textAlign = "center";
   }
}
	
	
	
	
	
}


// colour only 1 cell
function colour1cell(start)
	 {
		//alert("start time in: "+start);
	   // alert(parent.endtime);
	    var thisstarttime=getTwentyFourHourTime(start);
		
	
        var table = document.getElementById("timetable");
        for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
         for (var j = 0, col; col = row.cells[j]; j++) {
     //iterate through columns
     //columns would be accessed using the "col" variable assigned in the for loop
	 //alert("Date :"+col.getAttribute("date")+"Time :"+col.getAttribute("time"));
	         //split date
	 
	       col.style.cssText=".timetable th{background-color: #2A2A29;color: white;}";
           col.style.textAlign = "center";
	          
	         //split the date to get actual date not time
			 
            
	        if (col.getAttribute("date")==date){
				 
			
			
			var checktime=Number(timeToMins(getTwentyFourHourTime(col.getAttribute("time"))));
			
			var enteredtime=Number(timeToMins(thisstarttime));
			
			// check if time falls within timeslot start and end interval i.e 9:33 is within 9:30 interval
	         if ((enteredtime>=checktime) && (enteredtime<=(checktime+(timeintervalsmins-1)))){
	          col.style.backgroundColor = "#66FF00"; 
			  //alert("entered tim: "+enteredtime+ " checktime :"+checktime);
			  
		     }
			// check if in between i.e 8:30
			   
				
				
				
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
	     // alert(col.style.backgroundColor);
	        col.style.cssText=".timetable th{background-color: #2A2A29;color: white;";
			col.style.textAlign = "center";
	          
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
// alert(name_id);
 $("#main_panel").load("http://localhost:8000/timetable/"+weeknumber+"/"+timeintervalsmins+"/"+name_id+"/"+year+"/"+place_id); 

}
	
// extract the time and date put date in array0 and time in array 1
function splittimeanddate(dateandtime)
{
  var sepdatetime=dateandtime.split(" ");
  
  var extracteddate=sepdatetime[0];
  var extractedtime=sepdatetime[1];
  date=extracteddate+" 00:00:00";
  starttime=extractedtime;
  //alert("date: "+date+" time: "+starttime);
  //colour1cell("9:00");

}	

function setdate(datein)
{
	document.getElementById("maindate").value=datein;
	date=datein;
	
}




function getdateandconvert(datebxid)
	{
	
	    mydate=new Date(date);
		weeknumber = minTwoDigits(mydate.getWeek());
		year=mydate.getFullYear();
		refreshmain();
		
	}

function setname()
{
	
	
	var e = document.getElementById("names");
	
    var strUser = e.options[e.selectedIndex].value;
	name=e.options[e.selectedIndex].name;
	name_id=e.options[e.selectedIndex].value;
	
}

function setplace()
{
	
	
	var e = document.getElementById("place");
	
    var strUser = e.options[e.selectedIndex].value;
	place_name=e.options[e.selectedIndex].innerHTML;
	place_id=e.options[e.selectedIndex].value;
	
	document.getElementById('location').innerHTML=e.options[e.selectedIndex].innerHTML;
	
	 //setplace(strUser);
	
}
//take take from table and put it in start hours and minutes
function putstarttimein(timein)
{
	
	 
    var timehour=timein.split(":");
	document.getElementById("starthour").value=minTwoDigits(timehour[0]);
	var timemin=timehour[1].split(" ");
	document.getElementById("startminutes").value=timemin[0];
}
function putendtimein(timein)
{
	var endtimein=getTwentyFourHourTime(timein);
	var timehour=endtimein.split(":");
	document.getElementById("endhour").value=timehour[0];
	var timemin=timehour[1].split(" ");
	document.getElementById("endminutes").value=(timemin[0]);
	var timetype=document.getElementById("endtimefor");
	var selectedtimefor = timetype.options[timetype.selectedIndex].value;	
	timetype.selectedIndex=2;
	selectedtimefor ="";
}
function gotoplace()
{
refreshmain();
}

function gotoname()
{
refreshmain();
}
// validate and update when starttime entered
function valtimebox1(timebox)
{
	var timetype=document.getElementById("starttimefor");
	var selectedtimefor = timetype.options[timetype.selectedIndex].value;	
	//alert (selectedtimefor );
	
	
	
	
	
if (timebox.value.toString().length==1){	
	timebox.value=minTwoDigits(timebox.value);	
}




// check if 24hr clock
if (timebox.value>12)
{
	timetype.selectedIndex=2;
	selectedtimefor ="";
	
}
var whichbox=timebox.id.toString();
if (whichbox=="starthour"){	
	starttime=timebox.value+":"+document.getElementById("startminutes").value+" "+selectedtimefor ;
	
}
else
{
	starttime=document.getElementById("starthour").value+":"+timebox.value+" "+selectedtimefor ;
}

//alert(starttime);
// check if 24hrs
setstarttime(starttime);

//document.getElementById('starttimefor').text="www";
}



//validate and update when end time entered

function valtimebox2(timebox)
{
	var timetype=document.getElementById("endtimefor");
	var selectedtimefor = timetype.options[timetype.selectedIndex].value;	
	//alert (selectedtimefor );
	// check if 24hr clock
if (timebox.value>12)
{
	timetype.selectedIndex=2;
	selectedtimefor ="";
}
	
	
if (timebox.value.toString().length==1){	
	timebox.value=minTwoDigits(timebox.value);	
}
var whichbox=timebox.id.toString();
if (whichbox=="endhour"){	
	endtime=timebox.value+":"+document.getElementById("endminutes").value+" "+selectedtimefor ;
	
}
else
{
	endtime=document.getElementById("endhour").value+":"+timebox.value+" "+selectedtimefor ;
}


// check if 24hrs
setendtime(endtime);

//document.getElementById('starttimefor').text="www";
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
var date=today;
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
var name_id=0;
 $(document).ready(function(){
 
	 $("#pressme").click(function() {
	 
	 $("#sidebarnav").toggle('slide');
	 });
	 
	//  $("#viewshifts").click(function() {
	 
	// $("#shift_col").toggle('slide');
	// });
	// viewshifts

	// add the each element toggle to id
	//set inital variables

	 place_id="all";
	 place_name="all";
	 selectedplace="";
	 timeintervalsmins=60;
	 name_id=0;
	 //$("#temp").load("http://localhost:8000/temp"); 
	 //$("#shiftpanel").load("http://localhost:8000/shiftbar");
	 //load timetable
	
	 //document.getElementById("starthour").value="ssss";
	 $("#main_panel").load("http://localhost:8000/timetable/"+weeknumber+"/"+timeintervalsmins+"/"+"name"+"/"+year+"/"+place_id); 
	 $("#topcontrol").load("http://localhost:8000/topbar/");
	 
	 
	 
	 
 
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
		color: #696969;
		
		
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
 
}

.namebar{
  float: left;
  width: 200px;
 
}



.topcontrol {
    margin: auto;
    width: 100%;
   
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
	
	
	



<body>
<!-- <button id="pressme"> hello </button> <button id="viewshifts"> View shift</button></br> -->
<div class="topcontrol" id="topcontrol" >
<!-- top bar goes here -->

<p>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>
</div>

    <?php echo $__env->yieldContent('leftnav'); ?>
	

	

<div class="centrescreen">


<div id="main_panel" class="mainpanel" style="width:100%;">
<!--- table goes here -->










</div>



<body>
















</div>


 <script language="javascript">

     
	
	
	
	//refresh the side nav load name and shift data
	function refreshside()
{
	var currentshiftid=0;
	var newshift=true;
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
					var shiftli=jQuery.parseJSON(datareceived);
					$.each(obj, function(key,value) {
						//console.log("aaaaaa");
						
					   //currentshiftid=value.shiftid;
					
						   
						   
						  //alert(value.fname+" "+value.lname+" "+value.status);
						  $('#namelist').append('<tr style="text-align:center;background-color: #3d3d29;"  > <td id="'+value.id+'" onClick="getselname(this)">'+
						  value.fname+" "+value.lname+" "+value.status+
						  '<p>'+'</td> </tr>');
						  $('#namelist').append('<tr> <td><tp> Time: '+extracttimefromdate(value.slotstart)+" "+extracttimefromdate(value.slotfinish)+'</tp></td> </tr>');
						  $('#namelist').append('<tr> <td><tp> Place: '+value.place+'</tp></td> </tr>');
						    
							
						
							
							
						
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
		 setdaypointsel(name);
		 if (!dbl_clicked){
			
			date=name.getAttribute("date");
			endtime="Please enter end time"; 
			starttime=name.getAttribute("time"); 
			clearselection();
			colour1cell(starttime);
			putstarttimein(starttime);
			dbl_clicked=true;
			
			//parent.refreshbottom();
		 }
		 else
		 {
			 endtime=name.getAttribute("time"); 
			 colourcells(starttime,endtime);
			 dbl_clicked=false;
			 //parent.refreshbottom();
			 putendtimein(endtime);
			 refreshside();
			 document.getElementById('addbutton').style.visibility = 'visible';
			 document.getElementById('cancel').style.visibility = 'visible'; 
			  <!-- sendinfo=date+"$"+starttime+"$"+endtime+"$"+"ggggg"; -->
			  <!--window.open("http://localhost:8000/bottom/"+sendinfo, "Bottomoptions");-->
		 }
		 
		
		 
		 
		
		
		
		
	 }
	 function getselname(name)
	 {
		 
		// if (2>7){
		// sidepane=sidepane+name.getAttribute("value")+" ";
		name_id=name.id;
		$("#names").val(name.id);
		
		//window.open("http://localhost:8000/sidepanel/"+sidepane, "sideoptions"); 
	// }		
		
	 }
	 
	 
	
    
</script>	
	


</body>
</html>