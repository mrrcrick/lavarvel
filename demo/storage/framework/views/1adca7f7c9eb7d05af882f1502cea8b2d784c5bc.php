<?php $__env->startSection('leftnav'); ?>
<style>
.shift{
		 
		 
	 }	  


</style>



<div id="sidebarnav" class="sidebar">
	
	<table id="shifts" style="width:100%"   border:2px>
	<tr><th><b>Shifts:</b></th></tr>
	<td>
		<div id="shift" class="shift">
		<div id="shiftdate">Date:</div> 
		shiftstart:<input id="shiftstart"  type="text" style="width:40px;height:20px;">
		</input> 
		shiftend:<input id="shiftfinish"  type="text" style="width:40px;height:20px;">
		</input><p>
		Duration <input id="duration" type="text" style="width:20px;height:20px;"> Weeks <input type="checkbox" id="shiftweeks" value="weeks"> Years <input type="checkbox" id="shiftyears" value="years"></br>
		number needed:<input id="numberneeded"  type="text" style="width:40px;height:20px;">
		</input><p>
		Place: <span id="shift_place"  type="text">
		</span><p>
		Employees:
		<div id="shiftemployees"  type="text">
		</div>
		rate:<input id="rate"  type="text" style="width:40px;height:20px;">
		</input>
		<p>
		<button style="height:30px; width:200px;" OnClick="addshiftplace(this)">Add place</button>
		<button style="height:30px; width:200px;" OnClick="addshiftname(this)">Add employee</button>
		<button style="height:30px; width:200px;" Onclick="add_shift_to_database()">Add Shift</button>
         
		</div>
	</td>
	
	</table>
	
	
	 
	<table id="namelist" style="width:100%"  class="timetable" border:2px>
	
	
	
		
	<tr><th><b>Names:</b></th></tr>
	
    
	<tr >
	
	
	
	
	</tr>
	
   </table>
	
	

	
	</div>
	<script>
		function addshiftplace(ele)
		{
		 //alert("add shiftplace");
		 var shiftplace=place_name;
		 document.getElementById("shift_place").innerHTML=shiftplace;
		}
		function addshiftname(ele)
		{
		var namelist = document.getElementById("names");
		 var shiftname=document.getElementById("shiftemployees").innerHTML+namelist.options[namelist.selectedIndex].text +'</br>';
		 document.getElementById("shiftemployees").innerHTML=shiftname;
		  namelist.options[name_id].value
		 
		 //e.options[e.selectedIndex].value;
		 
		}
		
		
		
		function add_shift_to_database()
		{
					alert(formatphpDate(date)+"/"+name_id+"/"+getTwentyFourHourTime(starttime)
					 +"/"+getTwentyFourHourTime(endtime)+"/"+place_id);
					if(place_id==0){
					  alert("PLEASE ENTER A PLACE")
					}
					else
					{
						
						
						var xmlhttp = new XMLHttpRequest();
					
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
						   if (xmlhttp.status == 200) {
							   datareceived = xmlhttp.responseText;
							   return datareceived;
						   }
						   else if (xmlhttp.status == 400) {
							  //alert('There was an error 400');
						   }
						   else {
							   //alert('something else other than 200 was returned');
							   //window.open(formatphpDate(date)+"/"+name_id+"/"+getTwentyFourHourTime(starttime)
					// +"/"+getTwentyFourHourTime(endtime)+"/"+place_id);
						   }
						}
					}

					xmlhttp.open("GET","http://localhost:8000/addshift/1/1/1/1/1/1", true);
				   // xmlhttp.send();
						  
					 
						
						
					}
					window.open("http://localhost:8000/addshift/1/1/1/1/1/1");  
     
					place_id="all";
				 
					name_id=0;
					refreshmain();
							
							
			
			
			
			
		}
</script>

	<?php $__env->stopSection(); ?>