

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head><meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
</head>
<script>
var dbl_clicked=false;
var date="";
var name="blank";
var sidepane="";
var starttime="";
var endtime="";

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



</script>



<script type="text/javascript" src="<?php echo e(URL::asset('js/datetimepicker_css.js')); ?>"></script>




<style style="text/css">
  .timetable{
		width:70%; 
		border-collapse:collapse; 
	}
	.timetable td{ 
		padding:7px; border:#4e95f4 1px solid;
	}
	/* Define the default color for all the table rows */
	.timetable tr{
		background: #b8d1f3;
	}
    .timetable tr:hover {
          background-color: #ffff99;
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
<div>
<b> Select Date  <input name="Date" id="maindate" onchange="getdateandconvert('maindate')"></input></b>
<img src="<?php echo e(URL::asset('js/images2/cal.gif')); ?>" onclick="javascript:NewCssCal('maindate');" style="cursor:pointer"/></br>
<b>Date start:</b> <?php echo e($fromdate); ?> <b>Date End:</b> <?php echo e($todate); ?></br> </div> 
<section>

<div id="main_panel">
<h1>Time table</h1>

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
	<td><?php echo e($key); ?></td>
	<!--- Monday -->
	
	<td class="Mon" date="<?php echo e($dayinweek[0]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	
     <?php $__currentLoopData = $gettimetable[$dayinweek[0]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>" value="<?php echo e($names); ?>" onclick ="getselname(this)"  > <?php echo e($names); ?></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 
	 <!--- Tuesday -->
	 <td class="Tue" date="<?php echo e($dayinweek[1]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	 <?php $__currentLoopData = $gettimetable[$dayinweek[1]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>" value="<?php echo e($names); ?>" onclick ="getselname(this)" date="<?php echo e($dayinweek[1]); ?>" time="<?php echo e($key); ?>"><?php echo e($names); ?></div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 <!--- Wednesday -->
	 <td class="Wed" date="<?php echo e($dayinweek[2]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	 <?php $__currentLoopData = $gettimetable[$dayinweek[2]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>" value="<?php echo e($names); ?>" onclick ="getselname(this)" date="<?php echo e($dayinweek[2]); ?>" time="<?php echo e($key); ?>" ><?php echo e($names); ?></div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 <!--- Thursdsday -->
	 <td class="Thur" date="<?php echo e($dayinweek[3]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	 <?php $__currentLoopData = $gettimetable[$dayinweek[3]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>" value="<?php echo e($names); ?>" onclick ="getselname(this)" date="<?php echo e($dayinweek[3]); ?>" time="<?php echo e($key); ?>"><?php echo e($names); ?></div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 <!--- Friday -->
	 <td class="Fri" date="<?php echo e($dayinweek[4]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	 <?php $__currentLoopData = $gettimetable[$dayinweek[4]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>" value="<?php echo e($names); ?>" onclick ="getselname(this)" date="<?php echo e($dayinweek[4]); ?>" time="<?php echo e($key); ?>" ><?php echo e($names); ?></div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 <!--- Saturday -->
	 <td class="Sat" date="<?php echo e($dayinweek[5]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	 <?php $__currentLoopData = $gettimetable[$dayinweek[5]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>" value="<?php echo e($names); ?>" onclick ="getselname(this)" date="<?php echo e($dayinweek[5]); ?>" time="<?php echo e($key); ?>"><?php echo e($names); ?></div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>                                                        
	 <!----Sunday -->
	<td class="Sun" date="<?php echo e($dayinweek[6]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	 <?php $__currentLoopData = $gettimetable[$dayinweek[6]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>" value="<?php echo e($names); ?>" onclick ="getselname(this)" date="<?php echo e($dayinweek[6]); ?>" time="<?php echo e($key); ?>"><?php echo e($names); ?></div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 
	 
	 
	      
	 
	 </tr>
	
   
   
   
   
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</table>



</section>
 <script language="javascript">

       document.getElementById('maindate').setAttribute('value', parent.date);
			
	 function getselcell(name)
	 {
		 
		 if (!dbl_clicked){;
			parent.date=name.getAttribute("date");
			parent.endtime="Please enter end time"; 
			parent.starttime=name.getAttribute("time"); 
			
			
			dbl_clicked=true;
			parent.refreshbottom();
		 }
		 else
		 {
			 parent.endtime=name.getAttribute("time"); 
			 
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