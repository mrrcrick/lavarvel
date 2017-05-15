<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\bookin as view_bookins;
use App\employee as emp;
Use App\shift as shift;
use DateTime;
use App\calendar;
use App\place as place_list;
use View;


class frcont extends Controller
{
	
	public static $validate=array();
	
	//get time database last updated
	public function dbupdatetime(){
		
		$updatetime=view_bookins::orderBy('created_at', 'desc')->first();
		
		
		
		return $updatetime->created_at;
	}	
	
	 public function shiftbar()
 {
	 
	 return view('shiftpanel');
 }
	
	
	//'add_bookin/{date}/{name_id}/{start}/{end}/{place_id}','frcont@add_bookin');
	
 public function addbookin($date,$id,$name,$start,$end,$place)
 {
	 $bookdate=new view_bookins;
	 
	 //$bookdate->slotstart=$start;
	 //$bookdate->slotfinish=$end;
	 
	
	 $starttime=$date.' '.$start;
	 $endtime=$date.' '.$end;
	 
	 //$sqldate =$date;
	 
	
	 //echo date("y-m-d H:i:s",$sqldatestart);
	 $bookdate->employee_id=$id;
	 $bookdate->shift_id=1;
	 $bookdate->hours=$this->workouthours($starttime,$endtime);
	 $bookdate->slotstart=$starttime;
	 $bookdate->slotfinish=$endtime;
	 $bookdate->place_id=$place;
	 $bookdate->save();
	 $this->workouthours($starttime,$endtime);
	 echo "ID in: ".$id;
	 echo "Place: ".$place;
	 return " record added";
 } 
 
 
  public function add_bookin($date,$id,$start,$end,$placeid)
 {
	 $bookdate=new view_bookins;
	 
	 //$bookdate->slotstart=$start;
	 //$bookdate->slotfinish=$end;
	 
	
	 $starttime=$date.' '.$start;
	 $endtime=$date.' '.$end;
	 
	 //$sqldate =$date;
	 
	
	 //echo date("y-m-d H:i:s",$sqldatestart);
	 $bookdate->employee_id=$id;
	 $bookdate->shift_id=1;
	 $bookdate->hours=$this->workouthours($starttime,$endtime);
	 $bookdate->slotstart=$starttime;
	 $bookdate->slotfinish=$endtime;
	 $bookdate->place_id=$placeid;
	 $bookdate->save();
	 $this->workouthours($starttime,$endtime);
	 echo "ID in: ".$id;
	 echo "Place: ".$place;
	 return " record added";
 } 
 

public function add_shift($numreq,$date,$id,$start,$end,$placeid)
{
$shift=new shift;
$shift->hr_length=1;
$shift->emp_required=1;
$shift->bookin_id=1;
$shift->place_id=1;
$shift->save();
return 'Shift added';	
}

 public function add_bookinsto_database($date,$id,$start,$end,$placeid)
 {
	 
 }
 
 
 
 
 
 public function getplaces()
  {
	  
	  $places=place_list::get();
	  return $places;
  }
 
 // work out time between start and finish return as a decimal i.e 1:30 = 1.5
  public function workouthours($starttime,$endtime)
  
  {
	  
	  
	   $datetime1 = new DateTime($starttime);
	$datetime2 = new DateTime($endtime);
	$interval = $datetime1->diff($datetime2);
	echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
	$hour=$interval->format('%h');
	$minutes=$interval->format('%i');
	$minutes=($minutes*60)/3600;
	echo "</br> ## ".$hour." hours ".$minutes." minutes ###";
	$timedec=$hour+$minutes;
	return $timedec;
	  
	  
  }
	
  
  public function bottomform($name)
  {
     if ($name=="blank" || $name==null)
	 {
		 $name="click to enter"."$"."please enter"."$"."please enter"."$"."blank";
	 }
	 $date_start_end_name = explode("$", $name);
	 //echo $date_start_end_name;
      // convert - date to / date i.e  4/7/18
	 $date_start_end_name[0]=date("y/m/d", strtotime($date_start_end_name[0]));
	 return view('bottomform')->with('info',$date_start_end_name);
  }
  
  
 // public function sidepanel mode,date,starttime,finish
  public function sidepanel($clicked_name,$selecteddate,$start,$finish){
	
	 //$date_start_end_name="";
	 
	 // check if no dates entered 
	 if ($clicked_name=="blank"){
		// changed query
		//$employeenames=emp::where('fname','like','j%')->get();
		$employeenames=emp::get();
		//->where('bookins.slotfinish','<','2016-10-03 11:00:00')->orWhere('bookins.slotfinish','>','2016-10-05 11:00:00')->get();
	 }
	 else
	 {
		//$date_start_end_name = explode("$", $bottompaneldata); 
				
				
				// do the where join here ********************
				$starttime=$selecteddate.$start;
	            $endtime=$selecteddate.$finish;
				
//
				//old
				//$employeenames=emp::join('bookins','bookins.employee_id','=','employees.id')
		        //->whereNotBetween('bookins.slotstart',[$starttime,$endtime])->get();
				//echo "\n S:".$starttime;
				//echo "\n E:".$endtime;
				
				//**$employeenames=view_bookins::join('employees','employees.id','=','bookins.employee_id')
				
				$employeenames=view_bookins::join('places','places.id','=','bookins.place_id')
				->leftjoin('shifts','shifts.id','=','bookins.shift_id')
				->join('employees','employees.id','=','bookins.employee_id')
		         
				->Where('bookins.slotfinish','>=',date("Y-m-d H:i:s", strtotime(       $starttime  )  ))
				->Where('bookins.slotstart','<=',date("Y-m-d H:i:s", strtotime(       $endtime  )  ))
				->get();
			
			$employeenames= $this->checkifemployeeavail($employeenames);	
	 }
	 
	 
	
	
	return $employeenames;


	
	

  }
  
  // takes a list of employee names filtered by bookins dates i.e 26-27 June and attaches shift info
   public function attachshiftinfo($employee_data)
   {
	 //  $employeenames=view_bookins::join('places','places.id','=','bookins.place_id')->join('employees','employees.id','=','bookins.employee_id')
	  // echo ("shift data");
	  $shiftlist=view_bookins::join('shifts','shifts.id','=','bookins.shift_id')->where('bookins.shift_id','=','2')->join('employees','employees.id','=','bookins.employee_id')
	  ->pluck('fname','lname');
	 


	 return $shiftlist;
	  
   
   }
	  
   public function checkifemployeeavail($employeelist)
   {
	   
	  // echo ("DATE SELECTED: ".$dateselected);
	     $employeesandstatus=array();
	     $employeenames=emp::get(); 
		 $namelistindex=0;
		foreach ($employeenames as $namelist){
		 //attach the shift data
		 
		 $employeesandstatus[$namelistindex]['fname']=$namelist->fname;
		 $employeesandstatus[$namelistindex]['lname']=$namelist->lname;
		
		 $employeesandstatus[$namelistindex]['slotstart']=0;
		 $employeesandstatus[$namelistindex]['slotfinish']=0;
		 $employeesandstatus[$namelistindex]['place']=0;
		 $employeesandstatus[$namelistindex]['id']=$namelist->id;
		 $employeesandstatus[$namelistindex]['status']="avail";
		 $employeesandstatus[$namelistindex]['shiftid']="n\a";
		 $employeesandstatus[$namelistindex]['required']="n\a";
		// $employeesandstatus[$namelistindex]['required']="n\a";
		
   		foreach($employeelist as $employee)
				{
					//echo "name: ".$employee->fname." ".$employee->lname."</br>";
					
					
					if ($employee->id==$namelist->id)
					{
						
						$employeesandstatus[$namelistindex]['status']="Booked";
						$employeesandstatus[$namelistindex]['place']=$employee->Name;
						$employeesandstatus[$namelistindex]['slotstart']=$employee->slotstart;
		                $employeesandstatus[$namelistindex]['slotfinish']=$employee->slotfinish;
						$employeesandstatus[$namelistindex]['shiftid']=$employee->shift_id;
						$employeesandstatus[$namelistindex]['required']=$employee->emp_required;
					}
					
					
					
					
					
				}
		 $namelistindex++;
   }
   
   
   return $employeesandstatus;
		 
	
	
   }
 





 

  


  // make the day of week columns   
   public function makedates($week_numb_in,$year)
   {
	  date_default_timezone_set("Europe/London");
	 // add the time slots to each day of the week
	 //$currentWeekNumber = date('W');
	
	
	$currentWeekNumber = $week_numb_in;
	//echo 'Week number:' . $currentWeekNumber."</br>";


	//$thisYear = date('Y');
	$thisYear=$year;
	$weekNum = ($currentWeekNumber);
	$weeks=array();

	
	

	// monday 
	$mon = date("Y-m-d H:i:s", strtotime("$thisYear-W$weekNum-1"));
    $weeks[]=$mon;
	//echo "Monday :".date_format(date_create($mon), 'd-m-y')."</br>";
	// Tuesday
	$tue = date("Y-m-d H:i:s", strtotime("$thisYear-W$weekNum-2"));
	$weeks[]=$tue;

	// Wednesday
	$wed = date("Y-m-d H:i:s", strtotime("$thisYear-W$weekNum-3"));
	$weeks[]=$wed;

	// Thursday
	$thur = date("Y-m-d H:i:s", strtotime("$thisYear-W$weekNum-4"));
	$weeks[]=$thur;

	// Friday
	$fri = date("Y-m-d H:i:s", strtotime("$thisYear-W$weekNum-5"));
	$weeks[]=$fri;

	// Saturday
	$sat = date("Y-m-d H:i:s", strtotime("$thisYear-W$weekNum-6"));
	$weeks[]=$sat;

	// Sunday
	$sun = date("Y-m-d H:i:s", strtotime("$thisYear-W$weekNum-7"));
    $weeks[]=$sun; 
	   
	return $weeks;   
	   
   }
   
   
   
   
   
   ///////////////////////////////////////////////////
   
   
   public function maketimetable($monday,$sunday,$timeints,$name,$weeknumber,$year,$place)
   {
   $bookedinnames = new view_bookins;
  
   date_default_timezone_set("Europe/London");
     //echo $monday;
	 //$name=0;
	 // add 1 day to the end date just ensure we get all the hours between i.e sunday 23:59
	 $sunday=date('Y-m-d H:i:s', strtotime($sunday . ' +1 day'));
	 
	 //$end=new DateTime($sunday);
	 
	  //$new_time = new DateTime($newdate);
	  
	 //$sunday->add(new DateInterval("PT 23 H"));
	// echo "</br>*sunday plus ".($new_time)."*</br>";
	 
   
   $bookedinnames2=view_bookins::join('employees','employees.id','=','bookins.employee_id')->join('places','places.id','=','bookins.place_id')
   ->whereBetween('slotstart', array($monday, $sunday));
 
   
   if  ($place!='all'){
   
	 //$bookedinnames=view_bookins::join('employees','employees.id','=','bookins.employee_id')->join('places','places.id','=','bookins.place_id')
  // ->whereBetween('slotstart', array($monday, $sunday))->where('place_id','=',$place)->get();  
   $bookedinnames2->where('place_id','=',$place)->get(); 
	   
   }
    if ($name!=0)
	{
		
		$bookedinnames2->where('employees.id','=',$name); 
	}

//where([['status', '=', '1'],['subscribed', '<>', '1'],])
   
   $bookedinnames=$bookedinnames2->get();
   //$bookedinnames->get();
   $start=null;
   $end=null;
   
  // foreach ($bookedinnames as $bnam)
  // {
//	   echo$bnam->employee."</br>";
//	   echo$bnam->slotstart."</br>";
//	   echo$bnam->slotfinish."</br>";
	   //$start=strtotime($bnam->slotstart);
       //$end=strtotime($bnam->slotfinish);
  // }
   
   
   
  
   $start=strtotime('2013-01-19 07:00:00');
   $end=strtotime('2013-01-19 17:00:00');
   // set time gaps i.e 30 mins  9:30 10:00 and make a cut off inside gap i.e 9:30-9:59
   $timegaps=$timeints;
   $timegapminusminute=$timegaps-1;
  // echo "time gaps: ".$timegapminusminute;
  // echo "</br>";
// user time table arrays
   $slot=array(); //time slots i.e 9:30
   $namesfortimesegs=array(); //ay to hold different names in the time slot

   // date_default_timezone_set("Europe/London");

 //$end=strtotime("13:00:00");
// loop through time to set up a name array for each chosen timeslot
    for ($i=$start;$i<=$end;$i = $i + $timegaps*60)
    {

     //write your if conditions and implement your logic here
         $timesegs=date('g:i A',$i);
         $slot["$timesegs"]=$namesfortimesegs;
         //echo date('g:i A',$i)."</br>";

    }
    $dayinweek=$this->makedates($weeknumber,$year);
//	echo $dayinweek[0];
//	echo $dayinweek[1];
//	echo $dayinweek[2];
//	echo $dayinweek[3];
//	echo $dayinweek[4];
//	echo $dayinweek[5];
//	echo $dayinweek[6];
	
   $date=array($dayinweek[0]=>$slot,
   $dayinweek[1]=>$slot,
   $dayinweek[2]=>$slot,
   $dayinweek[3]=>$slot,
   $dayinweek[4]=>$slot,
   $dayinweek[5]=>$slot,
   $dayinweek[6]=>$slot);
  
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// insert  a name into a time slot 
    //$timein=date("H:i",strtotime("08:30"));
    //$timeout=date("H:i",strtotime("16:30"));
	
	 $timein=date("H:i",$start);
     $timeout=date("H:i",$end);
	
	
  //  $worker="Henry";
   // $bookin=False;
    $dayofweekindice=0;
// loop through time slots if  time in = to and time out <less than or equal add name to time slot
    foreach ($date as &$day) {
        
       // echo $dayofweekindice;
      foreach ($day as $timeslot=>&$namesbooked) {
      //  echo "$timeslot\n"; //uncomment this for testing the output of right time slots
        
	
			//*****loop through database query
			
			foreach ($bookedinnames as $bnam)
			{
				//echo$bnam->employee."</br>";
				//echo$bnam->slotstart."</br>";
				//echo$bnam->slotfinish."</br>";
				//$start=strtotime($bnam->slotstart);
				//$end=strtotime($bnam->slotfinish);
				
				  // check if time in matches time slot#
				//$checktimein=date("H:i",strtotime($timeslot));
				//echo "</br> ***CHECK INDEX ".$dayofweekindice." **** </br>";
				// Check if right day in timetable 
				
				
				
				//testing 
				//echo "Day compared  :".$dayinweek[$dayofweekindice]." compared with :".date("Y-m-d", strtotime($bnam->slotstart))."</br>";
                if (date("Y-m-d",strtotime($dayinweek[$dayofweekindice]))==date("Y-m-d", strtotime($bnam->slotstart)))
				
				{
					//testing echo '** day matches '.$dayinweek[$dayofweekindice].' and '.date("D M j", strtotime($bnam->slotstart))."</br>";
					// see if time in  and out of worker/booking matches a time slot 
                   // if ($checktimein>=date("H:i",strtotime($bnam->slotstart))) //check start time
					//	$bookin=True;
					//if($checktimein>=date("H:i",strtotime($bnam->slotfinish))) // check end time
						//$bookin=False;
					//echo $timeslot."</br>";	
					//.echo date("H:i",strtotime($timeslot+date("H:i:s",00:00:00)))."</br>";
					//echo date("H:i",strtotime("+".$timegapminusminute." minutes",strtotime($timeslot)))."</br>";
					// check timeslot in range against database times in have to add time gap -1 to make sure it is in time gap range i.e 9:33 is is 
					// inside 9:30 range of time slot not 10:00
					
					if (date(" H:i",strtotime("+".$timegapminusminute." minutes",strtotime($timeslot))) >=date(" H:i",strtotime($bnam->slotstart)) && date(" H:i",strtotime("+ 0 minutes",strtotime($timeslot))) <=date(" H:i",strtotime($bnam->slotfinish)))
					{
						
						//$namesbooked[]=$bnam->emp_name.",".date("H:i",strtotime($bnam->slotstart))."-".date("H:i",strtotime($bnam->slotfinish));
						// changed employee to emp_name
						//$namesbooked[]=($bnam->fname." ".$bnam->lname).",".date("H:i",strtotime($bnam->slotstart))."-".date("H:i",strtotime($bnam->slotfinish));
						 $namesbooked[]= array("fname"=>$bnam->fname, "lname"=>$bnam->lname, 
						 "starttime"=>date("H:i",strtotime($bnam->slotstart)),"endtime"=>date("H:i",strtotime($bnam->slotfinish)),"place"=>$bnam->Name); 
						 
						//$namesbooked[]['fname']=($bnam->fname);
                        //$namesbooked[]['lname']=$bnam->lname;
						//$namesbooked[]['starttime']=date("H:i",strtotime($bnam->slotstart));
						//$namesbooked[]['endtime']= date("H:i",strtotime($bnam->slotfinish));
					}
        
				
				
				
				
				
				
				
					
					
				}
      
				
				
			}
      
        
        
        
    

        
    }
$dayofweekindice++;
	}
  
	   
	   
	 return $date;  
	   
   }
   
	// **************************************************
	public function maketab($week,$timegaps,$namein,$year,$place)
	{
     
	 
	 $dayinweek=$this->makedates($week,$year);
	
    
	 $gettimetable=$this->maketimetable($dayinweek[0],$dayinweek[6],$timegaps,$namein,$week,$year,$place);
	 

     $timetable=$this;
     $fromdate=$dayinweek[0];
     $enddate=$dayinweek[6];

     $placelist=($this->getplaces());
     $names=emp::get();
    
	 return view ('tabledata')->with('gettimetable',$gettimetable)->with('dayinweek',$dayinweek)->
	 with('timetable',$timetable)->with('fromdate',$fromdate)->with('todate',$enddate)->with('places',$placelist)->with('names',$names)  ;
	}
	
	
	
	
	
	
	
	
	
	public function topbar()
	{
		
	 $placelist=($this->getplaces());
     $names=emp::get();
	return view ('topbar')->with('names',$names)->with('places',$placelist);	
	}
	
	public function mainwindow()
	{
		return view ('timetablelayout');
	}
	
	public function shwfrm()
	{
		return view('frm');
	}
	
	
	
	
}
