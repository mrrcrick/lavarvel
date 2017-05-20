<html>
<script>

function clearalldatepointers()
{
	//clearselecteddates();
	var header = document.getElementById("monhd");
	header.className="norm";
	var header = document.getElementById("tuehd");
	header.className="norm";
	var header = document.getElementById("wedhd");
	header.className="norm";
	var header = document.getElementById("thurhd");
	header.className="norm";
	var header = document.getElementById("frihd");
	header.className="norm";
	var header = document.getElementById("sathd");
	header.className="norm";
	var header = document.getElementById("sunhd");
	header.className="norm";
	
	
};
function setdaypointsel(headpoint)
{
	
	var dateselected=null;
	//alert("TOUCHED");
	// find day selected and get the date of that day
	clearalldatepointers();
	var dayselected=headpoint.getAttribute("id");
	
	if (dayselected=="monhd"){
		dateselected=document.getElementById("monday").getAttribute("date");
	}
	if (dayselected=="tuehd"){
		dateselected=document.getElementById("tuesday").getAttribute("date");
	}
	if (dayselected=="wedhd"){
		dateselected=document.getElementById("wednesday").getAttribute("date");
	}
	if (dayselected=="thurhd"){
		dateselected=document.getElementById("thursday").getAttribute("date");
	}
	if (dayselected=="frihd"){
		dateselected=document.getElementById("friday").getAttribute("date");
	}
	if (dayselected=="sathd"){
		dateselected=document.getElementById("saturday").getAttribute("date");
	}
	if (dayselected=="sunhd"){
		dateselected=document.getElementById("sunday").getAttribute("date");
	}
	
	
	
	
	setdate(dateselected);
	 //var a=document.getElementById("monday").getAttribute("date");
	 //alert(a);
	
	
	headpoint.className="top";
	
}



</script>

<style>
.top {
    position: relative;
    background-color: #2A2A29;
}

.top::after {
    position: absolute;
    content: '';
    top: 100%;
    left: 50%;
    margin: 0 0 0 -1em;
    border: 1em solid transparent;
    border-top: 0.5em solid #2A2A29;;
}

.lower {
    background-color: #f00;
}

</style>

<body>

<table id="timetable" class="timetable" style="width:100%;" >
 
  <tr >
   <th >Time</th>
   <th id="monhd" style="text-align: center;" class="norm" OnClick="setdaypointsel(this)" >Monday<p></p></th>
   <th id="tuehd"style="text-align: center;" class="norm" OnClick="setdaypointsel(this)">Tuesday<p></p></th>
   <th id="wedhd"style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Wednesday<p></p></th>
   <th id="thurhd"style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Thursday<p></p></th>
   <th id="frihd"style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Friday<p></p></th>
   <th id="sathd"style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Saturday<p></p></th>
   <th id="sunhd"style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Sunday<p></p></th>
   
   
   
 </tr >


<?php $__currentLoopData = $gettimetable[$dayinweek[0]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$timeslot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  
	
	<tr>
	<!--- Times -->
	<td class="bc"><b><?php echo e($key); ?></b></td>
	<!--- Monday -->
	
	<td id="monday" name="<?php echo e($dayinweek[0]); ?>" class="monday" value="dd" date="<?php echo e($dayinweek[0]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	 <p></p>
     <?php $__currentLoopData = $gettimetable[$dayinweek[0]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	  <div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td id="tuesday" class="Tuesday" date="<?php echo e($dayinweek[1]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	 <p></p>
     <?php $__currentLoopData = $gettimetable[$dayinweek[1]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp> &#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	  <div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td id="wednesday" class="Wednesday" date="<?php echo e($dayinweek[2]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	<p></p>
     <?php $__currentLoopData = $gettimetable[$dayinweek[2]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	<div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	<td id="thursday" class="Thursday" date="<?php echo e($dayinweek[3]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	<p></p>
     <?php $__currentLoopData = $gettimetable[$dayinweek[3]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	<div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td id="friday" class="friday" date="<?php echo e($dayinweek[4]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	<p></p>
     <?php $__currentLoopData = $gettimetable[$dayinweek[4]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	<div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td id="saturday" class="saturday" date="<?php echo e($dayinweek[5]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	<p></p>
     <?php $__currentLoopData = $gettimetable[$dayinweek[5]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names['fname']); ?>" value="<?php echo e($names['fname']); ?>" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > <?php echo e($names['fname']); ?> <?php echo e($names['lname']); ?>

	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: <?php echo e($names['starttime']); ?> Finish: <?php echo e($names['endtime']); ?></tp>
	 </div>
	<div style="text-align:center" > <tp  ><b><?php echo e($names['place']); ?></b></tp></div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 
	 </td>
	 <td id="sunday" class="sunday" date="<?php echo e($dayinweek[6]); ?>" time="<?php echo e($key); ?>" onclick ="getselcell(this)" >
	<p></p>
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
<body>
<script>


</script>
</html>

