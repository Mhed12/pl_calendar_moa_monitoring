<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;

class reqstatusCtrl extends Controller
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
        /*Date Formats
        *    DATE_FORMAT(date,format)
        *    eg.:
        *    DATE_FORMAT(e_start_date, '%b-%d-%Y')
        *    Feb-18-2020
        *    DATE_FORMAT(e_start_time, '%h:%i %p')
        *    10:25 AM
        *
        *    DATE - format YYYY-MM-DD
        *    DATETIME - format: YYYY-MM-DD HH:MI:SS
        *    TIMESTAMP - format: YYYY-MM-DD HH:MI:SS
        *    YEAR - format YYYY or YY
        */
        //$data = Event::all();
        //return view('reqStatus.index', compact('data'));
        $user_ID = Auth::user()->id;
         $data = DB::table('log_input')
                    ->join('users', 'log_input.user_ID', '=', 'users.id')
                    ->join('events', 'log_input.event_ID', '=', 'events.id')
                    ->selectRaw("events.event_name AS event_name, events.contact_person AS contact_person, events.venue AS venue,
                                DATE_FORMAT(events.e_start_date, '%b-%d-%Y') AS e_start_date, 
                                DATE_FORMAT(events.e_start_time, '%h:%i %p') AS e_start_time,
                                DATE_FORMAT(events.e_end_date, '%b-%d-%Y') AS e_end_date, 
                                DATE_FORMAT(events.e_end_time, '%h:%i %p') AS e_end_time, 
                                events.allDay AS allDay, log_input.status AS status")
                    ->whereRaw($user_ID." = users.id")->get();                                                 
        //return view('reqStatus', compact('data'));                    
        return view('reqStatus', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('reqStatus.create');
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
