

<!DOCTYPE html>
<html>
<body>

<h1>Time table</h1>

<table border="1">
 
  
<tr>
@foreach ($gettimetable as $day=>$value) 


    <th>{{$day}}</th>
    
    
@endforeach

</tr>
<!--------------------  make rows for 7 day data Monday--------------------->
<tr>
<td><table border="1" >

@foreach($gettimetable[$dayinweek[0]] as $key=>$timeslot)
  <tr>
  
   <td >{{$key}}</br>
     @foreach ($timeslot as $peoplebooked)
	   {{$peoplebooked}}
	    @endforeach
   </td>
   </tr>
   
   @endforeach


</tr>


</table></td>

<!--------------------  make rows for 7 day data Tuesday--------------------->


<td><table border="1" >

@foreach($gettimetable[$dayinweek[1]] as $key=>$timeslot)
  <tr>
  
   <td>{{$key}}</br>
     @foreach ($timeslot as $peoplebooked)
	   {{$peoplebooked}}</br>
	    @endforeach
   </td>
   </tr>
   
   @endforeach





</table></td>

<!------------------------------------------------------>
<td><table border="1" >

@foreach($gettimetable[$dayinweek[2]] as $key=>$timeslot)
  <tr>
  
   <td>{{$key}}</br>
     @foreach ($timeslot as $peoplebooked)
	   {{$peoplebooked}}
	    @endforeach
   </td>
   </tr>
   
   @endforeach





</table></td>
<!----------------------------------------------------------->
<!------------------------------------------------------>
<td><table border="1" >

@foreach($gettimetable[$dayinweek[3]] as $key=>$timeslot)
  <tr>
  
   <td>{{$key}}</br>
     @foreach ($timeslot as $peoplebooked)
	   {{$peoplebooked}}
	    @endforeach
   </td>
   </tr>
   
   @endforeach





</table></td>
<!----------------------------------------------------------->
<!------------------------------------------------------>
<td><table border="1" >

@foreach($gettimetable[$dayinweek[4]] as $key=>$timeslot)
  <tr>
  
   <td>{{$key}}</br>
     @foreach ($timeslot as $peoplebooked)
	   {{$peoplebooked}}
	    @endforeach
   </td>
   </tr>
   
   @endforeach





</table></td>
<!----------------------------------------------------------->
<!------------------------------------------------------>
<td><table border="1" >

@foreach($gettimetable[$dayinweek[5]] as $key=>$timeslot)
  <tr>
  
   <td>{{$key}}</br>
     @foreach ($timeslot as $peoplebooked)
	   {{$peoplebooked}}
	    @endforeach
   </td>
   </tr>
   
   @endforeach





</table></td>
<!----------------------------------------------------------->

<!------------------------------------------------------>
<td><table border="1" >

@foreach($gettimetable[$dayinweek[6]] as $key=>$timeslot)
  <tr>
  
   <td>{{$key}}</br>
     @foreach ($timeslot as $peoplebooked)
	   {{$peoplebooked}}
	    @endforeach
   </td>
   </tr>
   
   @endforeach





</table></td>
<!----------------------------------------------------------->


</tr>

</table>
	
	


</body>
</html>