<!doctype html>
<html>
<head>

<title></title>
</head>
<body>
<?php echo $__env->make('info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<p style="color:white;">TEXT*****************************************************************************************:</p>
    <p style="color:white;">TEXT*****************************************************************************************:</p>
	<p style="color:white;">TEXT*****************************************************************************************:</p>
    <div class="container" id="loadeddiv" class="alien" style=" width:300px; background-color: yellow;">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
	
	<script>
	
        alert("loaded div**************: "+place_id);
		
		
		
	</script>
</body>
</html>