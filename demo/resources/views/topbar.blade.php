

<HTML>
<BODY>
<b> Select Date:  <input style="width:100px;" name="Date" id="maindate" value=""onchange="getdateandconvert('maindate')" onclick="javascript:NewCssCal('maindate','yyyyMMdd');" ></input></b>
<img src="{{URL::asset('js/images2/cal.gif')}}" onclick="javascript:NewCssCal('maindate','yyyyMMdd');" style="cursor:pointer"/>
<span>
<b> Place </b> <select name="place" id="place" onClick="setplace()" >
<option name="all"  id="all" value="all">All </option>
@foreach ($places as $listofplaces) 
<option  name="{{$listofplaces['Name']}}" value="{{$listofplaces['id']}}" id="{{$listofplaces['id']}}">
{{$listofplaces['Name']}}</option> 
@endforeach
</select>
</span>
<span>
<b> Name </b> <select name="names" id="names" onClick="setname()" >
<option name="None"  id="None" value="0">All </option>
@foreach ($names as $listofnames) 
<option  name="{{$listofnames['fname']}}" value="{{$listofnames['id']}}" id="{{$listofnames['id']}}">
{{$listofnames['fname']}} {{$listofnames['lname']}}</option> 
@endforeach
 <b>Location: </b><span id="location"> </span>
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