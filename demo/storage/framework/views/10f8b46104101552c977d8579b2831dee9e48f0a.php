

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head><meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
</head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo e(URL::asset('js/datetimepicker_css.js')); ?>"></script>

<script>
var dbl_clicked=false;
var date="";
var name="blank";
var sidepane="";
var starttime="";
var endtime="";
window.onload = function(e){ 
   document.getElementById("maindate").value=parent.converttoukdate(parent.date);
  
  <!---  jquery toggle side bar
  
  
  
  
  
   
   
}


function testchildfunc()
{
	alert("TESTCHILD");
}



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
	    starttime=parent.getTwentyFourHourTime(start);
		
		 
		
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
	 
	 
	        if (col.getAttribute("date")==parent.date){
				 
				
				
				
	        
	         if (parent.getTwentyFourHourTime(col.getAttribute("time"))==starttime){
	          col.style.backgroundColor = "#66FF00"; 
		     }
			
			
				
				
				
				
			}
	      
	 
	 
	 }
   }
   
}









// colour 2 cells
function colourcells(start,end)
	 {
	   // alert(parent.endtime);
	    starttime=parent.getTwentyFourHourTime(start);
		
		 endtime=parent.getTwentyFourHourTime(end);
		
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
	 
	 
	        if (col.getAttribute("date")==parent.date){
				 
				
				
				
	        if (endtime !=null){ 
	         if (parent.getTwentyFourHourTime(col.getAttribute("time"))>=starttime && parent.getTwentyFourHourTime(col.getAttribute("time"))<=endtime){
	          col.style.backgroundColor = "#66FF00"; 
		     }
			}
			
				
				
				
				
			}
	      
	 
	 
	 }
   }
   
}

    



		
	 
function getdateandconvert(datebxid)
	{
		
		datetoconvert = document.getElementById(datebxid).value;
		converteddate=new Date(datetoconvert);
		var selecteddate=converteddate.toLocaleDateString();
		document.getElementById(datebxid).value=selecteddate;
		parent.weeknumber=parent.minTwoDigits((converteddate.getWeek()));
		parent.year=(converteddate.getWeekYear())
		parent.date=selecteddate;
		
		parent.refreshmain();
	}

function setplace()
{
	
	
	var e = document.getElementById("place");
	
    var strUser = e.options[e.selectedIndex].value;
	parent.place_name=e.options[e.selectedIndex].name;
	document.getElementById('location').innerHTML=e.options[e.selectedIndex].innerHTML;
	
	parent.setplace(strUser);
	
}

function gotoplace()
{
	parent.refreshmain();
}



</script>
<!--- Jquey -->
<script>

 $(document).ready(function(){
 
 $("#pressme").click(function() {
 
 $("#sidebarnav").toggle('slide');
 });





 
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
<b> Select Date:  <input name="Date" id="maindate" onchange="getdateandconvert('maindate')"></input></b>
<img src="<?php echo e(URL::asset('js/images2/cal.gif')); ?>" onclick="javascript:NewCssCal('maindate');" style="cursor:pointer"/>

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
	<div id="sidebarnav" class="sidebar">
	
	
	 
	<table style="width:100%" border:2px>
	<tr><th><b>Names:</b></th></tr>
	<?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namesclicked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
    <tr>
	
	<td><div class="name" id="<?php echo e($namesclicked['id']); ?>"   status="<?php echo e($namesclicked['status']); ?>" date="" starttime="" endtime=""
 	fname="<?php echo e($namesclicked['fname']); ?>" lname="<?php echo e($namesclicked['lname']); ?>" onclick ="getselname(this)" >  
	<?php echo e($namesclicked['fname']); ?> <?php echo e($namesclicked['lname']); ?></td><td> <?php echo e($namesclicked['status']); ?> </td>
	</div>
	
	
	</tr>
   </table>
	
	
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	
	
	
	
	
	
	
	
	
	
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


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
	
			
			
			
	 function getselcell(name)
	 {
		 
		 if (!dbl_clicked){
			parent.date=name.getAttribute("date");
			parent.endtime="Please enter end time"; 
			parent.starttime=name.getAttribute("time"); 
			clearselection();
			colour1cell(parent.starttime);
			dbl_clicked=true;
			
			parent.refreshbottom();
		 }
		 else
		 {
			 parent.endtime=name.getAttribute("time"); 
			 colourcells(parent.starttime,parent.endtime);
			 dbl_clicked=false;
			 parent.refreshbottom();
			 parent.refreshside();
			 
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