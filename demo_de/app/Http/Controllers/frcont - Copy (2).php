<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\bookin as view_bookins;
use App\employee as emp;
use DateTime;
use App\calendar;

class frcont extends Controller
{
	
	public static $validate=array();
	
	
	
 public function addbookin($date,$id,$name,$start,$end)
 {
	 $bookdate=new view_bookins;
	 
	 //$bookdate->slotstart=$start;
	 //$bookdate->slotfinish=$end;
	 
	 $converteddate=$this->dateconvdatetomsqlfor($date,$start);
	 $starttime=$this->dateconvdatetomsqlfor($date,$start);
	 $endtime=$this->dateconvdatetomsqlfor($date,$end);
	 
	 //$sqldate =$date;
	 
	 echo $starttime;
	 //echo date("y-m-d H:i:s",$sqldatestart);
	 $bookdate->employee_id=$id;
	 $bookdate->shift_id=1;
	 $bookdate->hours=$this->workouthours($starttime,$endtime);
	 //$bookdate->emp_name=$name;
	 $bookdate->slotstart=$starttime;
	 $bookdate->slotfinish=$endtime;
	 $bookdate->save();
	 $this->workouthours($starttime,$endtime);
	 echo "ID in: ".$id;
	 return " record added";
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
  
  
 // public function sidepanel
  public function sidepanel($clicked_name,$bottompaneldata){
	 echo 'side '.$bottompaneldata;
	 $date_start_end_name="";
	 
	 // check if no dates entered 
	 if ($clicked_name=="blank"){
		// changed query
		//$employeenames=emp::where('fname','like','j%')->get();
		$employeenames=emp::get();
		//->where('bookins.slotfinish','<','2016-10-03 11:00:00')->orWhere('bookins.slotfinish','>','2016-10-05 11:00:00')->get();
	 }
	 else
	 {
		$date_start_end_name = explode("$", $bottompaneldata); 
				
				
				// do the where join here ********************
				$starttime=$this->dateconvdatetomsqlfor($date_start_end_name[0],$date_start_end_name[1]);
	            $endtime=$this->dateconvdatetomsqlfor($date_start_end_name[0],$date_start_end_name[2]);
				echo 'start '.$starttime;
				echo 'end '.$endtime;
//
				//old
				//$employeenames=emp::join('bookins','bookins.employee_id','=','employees.id')
		        //->whereNotBetween('bookins.slotstart',[$starttime,$endtime])->get();
				//echo "\n S:".$starttime;
				//echo "\n E:".$endtime;
				
				$employeenames=view_bookins::join('employees','employees.id','=','bookins.employee_id')
		        //->whereBetween('bookins.slotstart',[date("Y-m-d H:i:s", strtotime(       $starttime  )  )  , date("Y-m-d H:i:s", strtotime(         $endtime      )) ])
				->Where('bookins.slotfinish','>=',date("Y-m-d H:i:s", strtotime(       $starttime  )  ))
				->Where('bookins.slotstart','<=',date("Y-m-d H:i:s", strtotime(       $endtime  )  ))
				->get();
				
			$employeenames= $this->checkifemployeeavail($employeenames);	
	 }
	 
	 
	 // foreach ($employeenames as $emp_name) {
      // echo $emp_name->fname." ".$emp_name->lname."</br>";
	   
	   
      // }
	  
	  
	  // split text into array
   //   $sidepanelnames=explode(" ",$clicked_name);
	 // echo 'NAME';
	  
		 // echo $splitnames[1];
		 
		//echo "</br> Name: ".$sidenamescut;
	//	  foreach ($sidepanelnames as $namestosplitup){
		//  $takenames=explode(",",$namestosplitup);
		//  echo "NAME: ".($takenames[0])." HOURS: ".($takenames[1])."</br>";
		 // }
	  
	  return view('sidepanel')->with('names',$employeenames)->with('info',$date_start_end_name);
  }
	  
   public function checkifemployeeavail($employeelist)
   {
	   
	  // echo ("DATE SELECTED: ".$dateselected);
	     $employeesandstatus=array();
	     $employeenames=emp::get(); 
		 $namelistindex=0;
		foreach ($employeenames as $namelist){
		 $employeesandstatus[$namelistindex]['fname']=$namelist->fname;
		 $employeesandstatus[$namelistindex]['lname']=$namelist->lname;
		 $employeesandstatus[$namelistindex]['id']=$namelist->id;
		 $employeesandstatus[$namelistindex]['status']="Available";
		 foreach($employeelist as $employee)
				{
					//echo "name: ".$employee->fname." ".$employee->lname."</br>";
					
					
					if ($employee->id==$namelist->id)
					{
						
						$employeesandstatus[$namelistindex]['status']="Booked";
					}
					
					
					
					
					
				}
		 $namelistindex++;
   }
   
   
   return $employeesandstatus;
		 
	
	
   }
 





 

    public function dateconvdatetomsqlfor($datein,$time)
	{
	    
		//echo "DATE IN: ".$datein." ";
		$dateconv=explode("-",$datein);
		$reverseddate=array_reverse($dateconv);
		$dateformat=implode("-",$reverseddate);
		//echo "</br>".date("Y-m-d H:i:s",strtotime($dateformat." ".$time))."     ";
		$newdateformat=date("Y-m-d H:i:s",strtotime($dateformat." ".$time));
		return $newdateformat;
	}


  // make the day of week columns   
   public function makedates($week_numb_in)
   {
	 date_default_timezone_set("Europe/London");
	 // add the time slots to each day of the week
	 //$currentWeekNumber = date('W');
	
	
	$currentWeekNumber = $week_numb_in;
	//echo 'Week number:' . $currentWeekNumber."</br>";


	$thisYear = date('Y');
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
   
   
   public function maketimetable($monday,$sunday,$timeints)
   {
   
   date_default_timezone_set("Europe/London");
     //echo $monday;
	 
	 // add 1 day to the end date just ensure we get all the hours between i.e sunday 23:59
	 $sunday=date('Y-m-d H:i:s', strtotime($sunday . ' +1 day'));
	 
	 //$end=new DateTime($sunday);
	 
	  //$new_time = new DateTime($newdate);
	  
	 //$sunday->add(new DateInterval("PT 23 H"));
	// echo "</br>*sunday plus ".($new_time)."*</br>";
	 
   
   // test database booked in table
   //$bookedinnames=p::table('bookins')->whereBetween('slotstart', array('2016-10-03', '2016-10-09'))->get();
   //echo "sunday ".$sunday;
   //$bookedinnames=view_bookins::whereBetween('slotstart', array($monday, $sunday))->get();
   
   $bookedinnames=view_bookins::join('employees','employees.id','=','bookins.employee_id')
   ->whereBetween('slotstart', array($monday, $sunday))->get();

 
   
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
    $dayinweek=$this->makedates(40);
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
						$namesbooked[]=($bnam->fname." ".$bnam->lname).",".date("H:i",strtotime($bnam->slotstart))."-".date("H:i",strtotime($bnam->slotfinish));
						
						
					}
        
				
				
				
				
				
				
				
					
					
				}
      
				
				
			}
      
        
        
        
    

        
    }
$dayofweekindice++;
	}
  
	   
	   
	 return $date;  
	   
   }
   
	// **************************************************
	public function maketab($week,$timegaps,$name)
	{
     
	 
	 $dayinweek=$this->makedates($week);
	

	 $gettimetable=$this->maketimetable($dayinweek[0],$dayinweek[6],$timegaps);
	 

     $timetable=$this;
     $fromdate=date("d/m/y",strtotime($dayinweek[0]));
     $enddate=date("d/m/y",strtotime($dayinweek[6]));


     
    	 
	 return view ('timetable4')->with('gettimetable',$gettimetable)->with('dayinweek',$dayinweek)->
	 with('timetable',$timetable)->with('fromdate',$fromdate)->with('todate',$enddate)  ;
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
