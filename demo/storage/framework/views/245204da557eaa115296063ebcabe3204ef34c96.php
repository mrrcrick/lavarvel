

<!DOCTYPE html>
<html>
<body>

<h1>My First Heading</h1>

<?php echo e($gettimetable['Monday']['08:30'][1]); ?>

<table style="width:100%">
 
  
<tr>
<?php $__currentLoopData = $gettimetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day=>$value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 


    <th><?php echo e($day); ?>  </th>
    
  
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</tr>



	
	<?php $__currentLoopData = $gettimetable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
		
		<?php $__currentLoopData = $day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeslot=>$namesbooked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
			<tr><td><?php echo e($timeslot); ?> 
			<?php $__currentLoopData = $namesbooked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nam): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			
			<?php echo e($nam); ?></td></tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
       
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	
	</table>
	
	


</body>
</html>