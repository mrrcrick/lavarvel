<html>
<style>
.top {
    position: relative;
    background-color: #2A2A29;
}

.top::after {
    position: absolute;
    content: '';
    top: 100%;
    left: 50%;
    margin: 0 0 0 -1em;
    border: 1em solid transparent;
    border-top: 0.5em solid #2A2A29;;
}

.lower {
    background-color: #f00;
}

</style>
<script>

function clearalldatepointers()
{
	//clearselecteddates();
	var header = document.getElementById("monhd");
	header.className="norm";
	var header = document.getElementById("tuehd");
	header.className="norm";
	var header = document.getElementById("wedhd");
	header.className="norm";
	var header = document.getElementById("thurhd");
	header.className="norm";
	var header = document.getElementById("frihd");
	header.className="norm";
	var header = document.getElementById("sathd");
	header.className="norm";
	var header = document.getElementById("sunhd");
	header.className="norm";
	
	
};
function setdaypointsel(headpoint)
{
	
	var dateselected=null;
	//alert("TOUCHED");
	// find day selected and get the date of that day
	clearalldatepointers();
	var dayselected=headpoint.getAttribute("selday");
	
	if (dayselected=="mon"){
		dateselected=document.getElementById("monday").getAttribute("date");
		var header = document.getElementById("monhd");
	    header.className="top";
	}
	if (dayselected=="tue"){
		dateselected=document.getElementById("tuesday").getAttribute("date");
		var header = document.getElementById("tuehd");
	    header.className="top";
	}
	if (dayselected=="wed"){
		dateselected=document.getElementById("wednesday").getAttribute("date");
		var header = document.getElementById("wedhd");
	    header.className="top";
	}
	if (dayselected=="thur"){
		dateselected=document.getElementById("thursday").getAttribute("date");
		var header = document.getElementById("thurhd");
	    header.className="top";
	}
	if (dayselected=="fri"){
		dateselected=document.getElementById("friday").getAttribute("date");
		var header = document.getElementById("frihd");
	    header.className="top";
	}
	if (dayselected=="sat"){
		dateselected=document.getElementById("saturday").getAttribute("date");
		var header = document.getElementById("sathd");
	    header.className="top";
	}
	if (dayselected=="sun"){
		dateselected=document.getElementById("sunday").getAttribute("date");
		var header = document.getElementById("sunhd");
	    header.className="top";
	}
	
	
	
	
	setdate(dateselected);
	 //var a=document.getElementById("monday").getAttribute("date");
	 //alert(a);
	
	
//	headpoint.className="top";
	
}



</script>



<body>

<table id="timetable" class="timetable" style="width:100%;" >
 
  <tr >
   <th >Time</th>
   <th id="monhd" selday="mon" style="text-align: center;" class="norm" OnClick="setdaypointsel(this)" >Monday<p></p></th>
   <th id="tuehd" selday="tue" style="text-align: center;" class="norm" OnClick="setdaypointsel(this)">Tuesday<p></p></th>
   <th id="wedhd" selday="wed" style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Wednesday<p></p></th>
   <th id="thurhd" selday="thur" style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Thursday<p></p></th>
   <th id="frihd" selday="fri" style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Friday<p></p></th>
   <th id="sathd"  selday="sat" style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Saturday<p></p></th>
   <th id="sunhd" selday="sun" style="text-align: center;"class="norm" OnClick="setdaypointsel(this)" >Sunday<p></p></th>
   
   
   
 </tr >


@foreach($gettimetable[$dayinweek[0]] as $key=>$timeslot)
  
	
	<tr>
	<!--- Times -->
	<td class="bc"><b>{{$key}}</b></td>
	<!--- Monday -->
	
	<td id="monday" selday="mon" name="{{$dayinweek[0]}}" class="monday" value="dd" date="{{$dayinweek[0]}}" time="{{$key}}" onclick ="getselcell(this)" >
	 <p></p>
     @foreach($gettimetable[$dayinweek[0]][$key] as $names)
	 <div class="{{$names['fname']}}" value="{{$names['fname']}}" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > {{$names['fname']}} {{$names['lname']}}
	 </div>
	 
	 <div style="text-align:center;" ><tp>&#x25B6 Start: {{$names['starttime']}} Finish: {{$names['endtime']}}</tp>
	 </div>
	  <div style="text-align:center" > <tp  ><b>{{$names['place']}}</b></tp></div>
	 @endforeach
	 
	 </td>
	 <td id="tuesday" selday="tue" class="Tuesday" date="{{$dayinweek[1]}}" time="{{$key}}" onclick ="getselcell(this)" >
	 <p></p>
     @foreach($gettimetable[$dayinweek[1]][$key] as $names)
	 <div class="{{$names['fname']}}" value="{{$names['fname']}}" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > {{$names['fname']}} {{$names['lname']}}
	 </div>
	 <div style="text-align:center;" ><tp> &#x25B6 Start: {{$names['starttime']}} Finish: {{$names['endtime']}}</tp>
	 </div>
	  <div style="text-align:center" > <tp  ><b>{{$names['place']}}</b></tp></div>
	 @endforeach
	 
	 </td>
	 <td id="wednesday" selday="wed" class="Wednesday" date="{{$dayinweek[2]}}" time="{{$key}}" onclick ="getselcell(this)" >
	<p></p>
     @foreach($gettimetable[$dayinweek[2]][$key] as $names)
	 <div class="{{$names['fname']}}" value="{{$names['fname']}}" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > {{$names['fname']}} {{$names['lname']}}
	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: {{$names['starttime']}} Finish: {{$names['endtime']}}</tp>
	 </div>
	<div style="text-align:center" > <tp  ><b>{{$names['place']}}</b></tp></div>
	 @endforeach
	 
	 </td>
	<td id="thursday" selday="thur" class="Thursday" date="{{$dayinweek[3]}}" time="{{$key}}" onclick ="getselcell(this)" >
	<p></p>
     @foreach($gettimetable[$dayinweek[3]][$key] as $names)
	 <div class="{{$names['fname']}}" value="{{$names['fname']}}" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > {{$names['fname']}} {{$names['lname']}}
	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: {{$names['starttime']}} Finish: {{$names['endtime']}}</tp>
	 </div>
	<div style="text-align:center" > <tp  ><b>{{$names['place']}}</b></tp></div>
	 @endforeach
	 
	 </td>
	 <td id="friday" selday="fri" class="friday" date="{{$dayinweek[4]}}" time="{{$key}}" onclick ="getselcell(this)" >
	<p></p>
     @foreach($gettimetable[$dayinweek[4]][$key] as $names)
	 <div class="{{$names['fname']}}" value="{{$names['fname']}}" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > {{$names['fname']}} {{$names['lname']}}
	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: {{$names['starttime']}} Finish: {{$names['endtime']}}</tp>
	 </div>
	<div style="text-align:center" > <tp  ><b>{{$names['place']}}</b></tp></div>
	 @endforeach
	 
	 </td>
	 <td id="saturday" selday="sat" class="saturday" date="{{$dayinweek[5]}}" time="{{$key}}" onclick ="getselcell(this)" >
	<p></p>
     @foreach($gettimetable[$dayinweek[5]][$key] as $names)
	 <div class="{{$names['fname']}}" value="{{$names['fname']}}" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > {{$names['fname']}} {{$names['lname']}}
	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: {{$names['starttime']}} Finish: {{$names['endtime']}}</tp>
	 </div>
	<div style="text-align:center" > <tp  ><b>{{$names['place']}}</b></tp></div>
	 @endforeach
	 
	 </td>
	 <td id="sunday" selday="sun" class="sunday" date="{{$dayinweek[6]}}" time="{{$key}}" onclick ="getselcell(this)" >
	<p></p>
     @foreach($gettimetable[$dayinweek[6]][$key] as $names)
	 <div class="{{$names['fname']}}" value="{{$names['fname']}}" onclick ="getselname(this)"  style="text-align:center;background-color: #3d3d29;" > {{$names['fname']}} {{$names['lname']}}
	 </div>
	 <div style="text-align:center;" ><tp>&#x25B6 Start: {{$names['starttime']}} Finish: {{$names['endtime']}}</tp>
	 </div>
	<div style="text-align:center" > <tp  ><b>{{$names['place']}}</b></tp></div>
	 @endforeach
	 
	 </td>
	      
	 
	 </tr>
	
   
   
   
   
   
   @endforeach
</table>
<body>
<script>


</script>
</html>

