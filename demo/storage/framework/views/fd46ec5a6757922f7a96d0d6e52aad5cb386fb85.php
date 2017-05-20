

<!DOCTYPE html>
<html>
<body>

<h1>Time table</h1>

<table border="1">
 
  
<tr>
<?php $__currentLoopData = $gettimetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day=>$value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 


    <th><?php echo e($day); ?></th>
    
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

</tr>
<!--------------------  make rows for 7 day data Monday--------------------->
<tr>
<td><table border="1" >

<?php $__currentLoopData = $gettimetable[$dayinweek[0]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$timeslot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <tr>
  
   <td ><?php echo e($key); ?></br>
     <?php $__currentLoopData = $timeslot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peoplebooked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	   <?php echo e($peoplebooked); ?>

	    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </td>
   </tr>
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


</tr>


</table></td>

<!--------------------  make rows for 7 day data Tuesday--------------------->


<td><table border="1" >

<?php $__currentLoopData = $gettimetable[$dayinweek[1]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$timeslot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <tr>
  
   <td><?php echo e($key); ?></br>
     <?php $__currentLoopData = $timeslot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peoplebooked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	   <?php echo e($peoplebooked); ?></br>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </td>
   </tr>
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>





</table></td>

<!------------------------------------------------------>
<td><table border="1" >

<?php $__currentLoopData = $gettimetable[$dayinweek[2]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$timeslot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <tr>
  
   <td><?php echo e($key); ?></br>
     <?php $__currentLoopData = $timeslot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peoplebooked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	   <?php echo e($peoplebooked); ?>

	    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </td>
   </tr>
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>





</table></td>
<!----------------------------------------------------------->
<!------------------------------------------------------>
<td><table border="1" >

<?php $__currentLoopData = $gettimetable[$dayinweek[3]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$timeslot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <tr>
  
   <td><?php echo e($key); ?></br>
     <?php $__currentLoopData = $timeslot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peoplebooked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	   <?php echo e($peoplebooked); ?>

	    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </td>
   </tr>
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>





</table></td>
<!----------------------------------------------------------->
<!------------------------------------------------------>
<td><table border="1" >

<?php $__currentLoopData = $gettimetable[$dayinweek[4]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$timeslot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <tr>
  
   <td><?php echo e($key); ?></br>
     <?php $__currentLoopData = $timeslot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peoplebooked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	   <?php echo e($peoplebooked); ?>

	    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </td>
   </tr>
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>





</table></td>
<!----------------------------------------------------------->
<!------------------------------------------------------>
<td><table border="1" >

<?php $__currentLoopData = $gettimetable[$dayinweek[5]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$timeslot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <tr>
  
   <td><?php echo e($key); ?></br>
     <?php $__currentLoopData = $timeslot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peoplebooked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	   <?php echo e($peoplebooked); ?>

	    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </td>
   </tr>
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>





</table></td>
<!----------------------------------------------------------->

<!------------------------------------------------------>
<td><table border="1" >

<?php $__currentLoopData = $gettimetable[$dayinweek[6]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$timeslot): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <tr>
  
   <td><?php echo e($key); ?></br>
     <?php $__currentLoopData = $timeslot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peoplebooked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	   <?php echo e($peoplebooked); ?>

	    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
   </td>
   </tr>
   
   <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>





</table></td>
<!----------------------------------------------------------->


</tr>

</table>
	
	


</body>
</html>