<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Log_input;


class homeCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Date( year, [(month) - 1], day, hour, minutes)

        $dataCal = DB::table('log_input')
                        ->join('users', 'log_input.user_ID', '=', 'users.id')
                        ->join('events', 'log_input.event_ID', '=', 'events.id')
                        ->selectRaw("events.event_name AS event_name,
                                DATE_FORMAT(events.e_start_date, '%Y, %m-1, %e') AS e_start_date, 
                                DATE_FORMAT(events.e_start_time, '%k, %i') AS e_start_time,
                                DATE_FORMAT(events.e_end_date, '%Y, %m-1, %e') AS e_end_date, 
                                DATE_FORMAT(events.e_end_time, '%k, %i') AS e_end_time, 
                                events.allDay AS allDay, users.division AS division")
                        ->whereRaw("log_input.status = 'UPLOADED' OR log_input.status = 'UPDATED'")->get();
        
        $activeMoa = DB::table('moas')
                        ->selectRaw("COUNT(*) AS 'activeMoa'")
                        ->whereRaw("date_expiration > CURDATE()")->get();
        $two_months = DB::table('moas')
                        ->selectRaw("COUNT(*) AS 'two_months'")
                        ->whereRaw("date_expiration <= DATE_ADD(CURDATE(), INTERVAL 2 MONTH) AND date_expiration > DATE_ADD(CURDATE(), INTERVAL 1 MONTH)")->get();
        $one_month  = DB::table('moas')
                        ->selectRaw("COUNT(*) AS 'one_month'")
                        ->whereRaw("date_expiration <= DATE_ADD(CURDATE(), INTERVAL 1 MONTH) AND date_expiration >= CURDATE()")->get();                                  
        $expiredMoa = DB::table('moas')
                        ->selectRaw("COUNT(*) AS 'expiredMoa'")
                        ->whereRaw("date_expiration <= CURDATE()")->get();  
        return view('home', ['dataCal' => $dataCal, 'activeMoa' => $activeMoa,
                              'two_months' => $two_months, 'one_month' => $one_month,
                              'expiredMoa' => $expiredMoa
                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate if there is similar start and end dates
        $data=DB::table('events')->
        select(DB::raw("COUNT(*) AS 'sameNum'"))
        ->whereRaw("e_start_date LIKE '" .$request->e_start_date . "' OR e_start_date LIKE '" .$request->e_end_date . "' OR e_end_date LIKE '" .$request->e_start_date. "' OR e_start_date LIKE '" .$request->e_end_date . "'")
        ->get();
        foreach($data as $row){
        $sameNum = $row->sameNum;
        }
        
        if($sameNum == 0)
        {
            //adding of event
            $event = new Event;
            $event->event_name = $request->event_name;
            $event->venue = $request->venue;
            $event->contact_person = $request->contact_person;
            
            if(($request->allDay) == true ){//checkbox is checked
                $event->e_start_date = $request->e_start_date;
                $event->e_end_date = $request->e_end_date;
            }else{//checkbox is unchecked
                $event->e_start_date = $request->e_start_date;
                $event->e_start_time = $request->e_start_time;
                $event->e_end_date = $request->e_end_date;
                $event->e_end_time = $request->e_end_time;
            }

            $event->allDay = $request->allDay;
            
            if ($event->save())
            {  
                //input for log_input table
                //get the id of a specific event that inserted previously 
                $event_ID=DB::table('events')->
                select(DB::raw("MAX(id) as event_ID"))->get();
                foreach($event_ID as $event_id)
                
                    //insert log_input table
                    $log = new Log_input;
                    $log->event_ID=$event_id->event_ID;
                    $log->user_ID=(Auth::user()->id);
                    $log->status='UPLOADED';
                    $log->save();
                
                $notification = array(
                    //Notification for success
                    'alert-type' => 'success',
                    'alert-message' => 'Schedule Added Successfully!'
                );
                return back()->with($notification);
            }else{
                //Notification for error
                $notification = array(
                    'alert-type' => 'error',
                    'alert-message' =>'Error! Adding of schedule is not successful!'
                    
                );
                return back()->with($notification);
            }
        }else if($sameNum > 0){
            //Notification for error
             $notification = array(
            'alert-type' => 'error',
            'alert-message' =>'Error! The Start Date or End Date of your schedule was already in used in other Event!');
            return back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
