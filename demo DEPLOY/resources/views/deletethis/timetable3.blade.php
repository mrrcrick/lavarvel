

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


@foreach($gettimetable[$dayinweek[0]] as $key=>$timeslot)
  
	
	<tr>
	<!--- Times -->
	<td>{{$key}}</td>
	
	<td>
     @foreach($gettimetable[$dayinweek[0]][$key] as $names)
	 <div class="{{$names}}"> {{$names}}<div>

      @endforeach
	 </td>
	 <!--- Tuesday -->
	 <td>
	 @foreach($gettimetable[$dayinweek[1]][$key] as $names)
	 <div class="{{$names}}">{{$names}}<div>
     @endforeach
	 </td>
	 <!--- Wednesday -->
	 <td>
	 @foreach($gettimetable[$dayinweek[2]][$key] as $names)
	 <div class="{{$names}}">{{$names}}<div>
     @endforeach
	 </td>
	 <!--- Thursdsday -->
	 <td>
	 @foreach($gettimetable[$dayinweek[3]][$key] as $names)
	 <div class="{{$names}}">{{$names}}<div>
     @endforeach
	 </td>
	 <!--- Friday -->
	 <td>
	 @foreach($gettimetable[$dayinweek[4]][$key] as $names)
	 <div class="{{$names}}">{{$names}}<div>
     @endforeach
	 </td>
	 <!--- Saturday -->
	 <td>
	 @foreach($gettimetable[$dayinweek[5]][$key] as $names)
	 <div class="{{$names}}">{{$names}}<div>
     @endforeach
	 </td>
	  <td>
	 @foreach($gettimetable[$dayinweek[6]][$key] as $names)
	 <div class="{{$names}}">{{$names}}<div>
     @endforeach
	 </td>
	 
	 
	 
	 </tr>
	
   
   
   
   
   
   @endforeach


 



</table>
	
	


</body>
</html>