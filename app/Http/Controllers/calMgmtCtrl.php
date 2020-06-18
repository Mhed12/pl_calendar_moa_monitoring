<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;
use App\Log_input;

class calMgmtCtrl extends Controller
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

        $data = DB::table('log_input')
        ->join('users', 'log_input.user_ID', '=', 'users.id')
        ->join('events', 'log_input.event_ID', '=', 'events.id')
        ->selectRaw("log_input.log_ID AS log_ID, events.id AS event_ID, events.event_name AS event_name, events.contact_person AS contact_person, events.venue AS venue,
                    DATE_FORMAT(events.e_start_date, '%b-%d-%Y') AS e_start_date,
                    DATE_FORMAT(events.e_start_date, '%Y-%m-%d') AS e_start_date_edit, 
                    DATE_FORMAT(events.e_start_time, '%h:%i %p') AS e_start_time,
                    DATE_FORMAT(events.e_start_time, '%H:%i') AS e_start_time_edit,
                    DATE_FORMAT(events.e_end_date, '%b-%d-%Y') AS e_end_date,
                    DATE_FORMAT(events.e_end_date, '%Y-%m-%d') AS e_end_date_edit,  
                    DATE_FORMAT(events.e_end_time, '%h:%i %p') AS e_end_time,
                    DATE_FORMAT(events.e_end_time, '%H:%i') AS e_end_time_edit, 
                    events.allDay AS allDay, users.division AS division")
        ->whereRaw("log_input.status = 'UPLOADED' OR log_input.status = 'UPDATED'")->get(); 

        return view('admin/calMgmt', ['data' => $data]); 

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
        //
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
    public function edit(Request $request)
    {
        //set status to 'DELETED' when the event was deleted 
        $log_ID   = $request->log_ID;
        $event_ID = $request->event_ID;

        if ($event = DB::table('events')->where('id','=', $event_ID)->delete())
        {   
            DB::table('log_input')
                ->where('log_ID', $log_ID)
                ->update(['status' => 'DELETED']);

            $notification = array(
                //Notification for success
                'alert-type' => 'success',
                'alert-message' => 'Schedule Deleted Successfully!'
            );
            return back()->with($notification);
        }else{
            //Notification for error
            $notification = array(
                'alert-type' => 'error',
                'alert-message' =>'Error! Deleting of schedule is not successful!'
                
            );
            return back()->with($notification);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   //updating of event
        $event_ID       = $request->event_ID;
        $log_ID         = $request->log_ID;
        $event_name     = $request->event_name;
        $cont_person    = $request->contact_person;
        $venue          = $request->venue;
        $e_start_date   = $request->e_start_date;
        $e_end_date     = $request->e_end_date;
        $e_start_time   = $request->e_start_time;
        $e_end_time     = $request->e_end_time;
        $allDay         = $request->allDay;
        //updating the event
        if($affected = DB::table('events')
              ->where('id', $event_ID)
              ->update(['event_name' => $event_name, 
                       'contact_person' => $cont_person, 'venue' => $venue,
                       'e_start_date' => $e_start_date, 'e_end_date' => $e_end_date,
                       'e_start_time' => $e_start_time, 'e_end_time' => $e_end_time,
                       'allDay' => $allDay]))
        {
            //set the status to updated
            if ($log_input_success = DB::table('log_input')
                ->where('log_ID', $log_ID)
                ->update(['status' => 'UPDATED']))
            {   
                $notification = array(
                //Notification for success
                'alert-type' => 'success',
                'alert-message' => 'Schedule Updated Successfully!');
                return back()->with($notification);
            }else{
                //Notification for error
                $notification = array(
                'alert-type' => 'error',
                'alert-message' =>'Error! Updating of schedule is not successful!');
                return back()->with($notification);
            }

        }else{
            $notification = array(
                //Notification for success
                'alert-type' => 'success',
                'alert-message' => 'Schedule Updated Successfully!');
                return back()->with($notification);
        }

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
