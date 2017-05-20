

<HTML>
<BODY>
<b> Select Date:  <input style="width:100px;" name="Date" id="maindate" value=""onchange="getdateandconvert('maindate')" onclick="javascript:NewCssCal('maindate','yyyyMMdd');" ></input></b>
<img src="<?php echo e(URL::asset('js/images2/cal.gif')); ?>" onclick="javascript:NewCssCal('maindate','yyyyMMdd');" style="cursor:pointer"/>
<span>
<b> Place </b> <select name="place" id="place" onClick="setplace()" >
<option name="all"  id="all" value="all">All </option>
<?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listofplaces): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
<option  name="<?php echo e($listofplaces['Name']); ?>" value="<?php echo e($listofplaces['id']); ?>" id="<?php echo e($listofplaces['id']); ?>">
<?php echo e($listofplaces['Name']); ?></option> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</select>
</span>
<span>
<b> Name </b> <select name="names" id="names" onClick="setname()" >
<option name="None"  id="None" value="0">All </option>
<?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listofnames): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
<option  name="<?php echo e($listofnames['fname']); ?>" value="<?php echo e($listofnames['id']); ?>" id="<?php echo e($listofnames['id']); ?>">
<?php echo e($listofnames['fname']); ?> <?php echo e($listofnames['lname']); ?></option> 
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<b>Position</b><input name="position" id="position"></input> <b>Location: </b><span id="location"> </span>
</select></select><button type="button" onClick="refreshmain()"> Find </button>
</span>
<div >
<input type="button" id="addbutton" onClick ="add_shift()" name="add" class="add"  value="ADD" ></input>
 <button value="edit" id="edit" name="edit" class="edit" >EDIT</button> 
<button value="delete" id="deletebutton" name="delete" class="delete">DELETE</button>
<button value="cancel" id="cancel" name="cancel" class="cancel" onClick="clearselecteddates()" >CANCEL</button>
<div>
<b>STARTTIME: <input id="starthour" type="number"style="width:43px;"  value="09" OnChange="valtimebox1(this)"><b>:</b><input id="startminutes" type="number"style="width:43px;" value="00" OnChange="valtimebox1(this)"></input> <select id="starttimefor">
  <option>AM</option>
  <option>PM</option>
 <option>24hrs</option>
</select>
<b> ENDTIME: <input id="endhour" type="number"style="width:43px;" value="09" OnChange="valtimebox2(this)"><b>:</b><input id="endminutes" type="number"style="width:43px;" value="09" OnChange="valtimebox2(this)"></input><select id="endtimefor">
  <option>AM</option>
  <option>PM</option>
 <option>24hrs</option>
</select>
</div>
  <b>Date start:</b>  <b>Date End:</b> 


</div>
<script>
    
 document.getElementById('addbutton').style.visibility = 'hidden';
 document.getElementById('deletebutton').style.visibility = 'hidden';  
 document.getElementById('cancel').style.visibility = 'hidden'; 
 document.getElementById('edit').style.visibility = 'hidden';
</script>





</BODY>
<HTML>