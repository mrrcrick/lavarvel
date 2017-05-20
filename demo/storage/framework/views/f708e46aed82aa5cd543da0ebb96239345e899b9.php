<!DOCTYPE html>
<html lang="en">
<style style="text/css">
  
		
   .name:hover {
          background-color: #ffff99;
    }
	table, th, td {
    border: 1px solid black;
    
}



</style>

    <head>
        
          
    </head>
    <body>
    <div id="names"> <?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $namesclicked): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
	<table style="width:100%" border:2px>
    <tr>
	
	<td><div class="name" id="<?php echo e($namesclicked['id']); ?>" fname="<?php echo e($namesclicked['fname']); ?>" lname="<?php echo e($namesclicked['lname']); ?>" onclick ="getselname(this)" >  
	<?php echo e($namesclicked['fname']); ?> <?php echo e($namesclicked['lname']); ?></td><td> <?php echo e($namesclicked['status']); ?> </td>
	</div>
	
	
	</tr>
   </table>
	
	
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</div>
	
	 <script language="javascript">

       
			
	 function getselname(name)
	 {
		 
		
		
        <!--  alert(name.getAttribute("fname") +" "+name.getAttribute("lname")+" id:"+name.getAttribute("id")); -->
		<!--  window.open("http://localhost:8000/timetable/40/30/"+name.getAttribute("fname"), "mainwd"); -->
		parent.name=name.getAttribute("fname")+" "+name.getAttribute("lname");
		parent.selected_id=name.getAttribute("id");
		parent.refreshbottom();  
		
	 }
			
    
</script>
    </body>
</html>
