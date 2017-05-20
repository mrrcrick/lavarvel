

<!DOCTYPE html>
<html>

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






<body>

<h1>Time table</h1>

<table class="timetable">
 
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
	
	<td>
     <?php $__currentLoopData = $gettimetable[$dayinweek[0]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>"> <?php echo e($names); ?><div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 <!--- Tuesday -->
	 <td>
	 <?php $__currentLoopData = $gettimetable[$dayinweek[1]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>"><?php echo e($names); ?><div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 <!--- Wednesday -->
	 <td>
	 <?php $__currentLoopData = $gettimetable[$dayinweek[2]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>"><?php echo e($names); ?><div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 <!--- Thursdsday -->
	 <td>
	 <?php $__currentLoopData = $gettimetable[$dayinweek[3]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>"><?php echo e($names); ?><div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 <!--- Friday -->
	 <td>
	 <?php $__currentLoopData = $gettimetable[$dayinweek[4]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>"><?php echo e($names); ?><div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 <!--- Saturday -->
	 <td>
	 <?php $__currentLoopData = $gettimetable[$dayinweek[5]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>"><?php echo e($names); ?><div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	  <td>
	 <?php $__currentLoopData = $gettimetable[$dayinweek[6]][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $names): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	 <div class="<?php echo e($names); ?>"><?php echo e($names); ?><div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	 </td>
	 
	 
	 
	 </tr>
	
   
   
   
   
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


 



</table>
	
	


</body>
</html>