<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head><meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">

	



<script language="JavaScript">

    
function addbookin(){
	    
	
		parent.addshift();
	

}
	
</script>







<title>bottomform</title></head>

<body>


Date <input name="Date" id="SelectedDate"  onClick="GetDate(this);"   value="<?php echo e($info[0]); ?>"  /> 
Start time&nbsp;<input name="starttime"  id="starttime" value="<?php echo e($info[1]); ?>" class="datebox" >
End Time<input name="endtime" id="endtime" value="<?php echo e($info[2]); ?>" class="datebox" >
 Name <input name="names" id="name" class="namebox" value="<?php echo e($info[3]); ?>">

<br><br>
<input type="button" onClick ="addbookin();" name="add" class="add"  value="ADD" ></input> <button value="edit" name="edit" class="edit" >EDIT/CHANGE</button> 
<button value="delete" name="delete" class="delete">DELETE</button>
<button value="cancel" name="cancel" class="cancel" onClick="parent.clearselecteddates()" >CANCEL</button>

<br>

<br>
<br>

  

</body></html>