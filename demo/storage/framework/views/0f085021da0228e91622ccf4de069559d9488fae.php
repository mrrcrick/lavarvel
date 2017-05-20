<html>
<body>
<table id="timetable" class="timetable" style="width:100%;" >
 
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
<body>
</html>

