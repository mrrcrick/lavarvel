

<!DOCTYPE html>
<html>
<body>

<h1>My First Heading</h1>

{{$gettimetable['Monday']['08:30'][1]}}
<table style="width:100%">
 
  
<tr>
@foreach ($gettimetable as $day=>$value) 


    <th>{{$day}}  </th>
    
  
@endforeach
</tr>



	
	@foreach ($gettimetable as $day) 
		
		@foreach ($day as $timeslot=>$namesbooked) 
			<tr><td>{{$timeslot}} 
			@foreach($namesbooked as $nam)
			
			{{$nam}}</td></tr>
            @endforeach
        @endforeach
       
    @endforeach
	
	</table>
	
	


</body>
</html>