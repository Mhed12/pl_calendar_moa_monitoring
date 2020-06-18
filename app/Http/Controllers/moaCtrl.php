<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Moa;
class moaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all moas
        $dataMoa = DB::table('moas')
                        ->selectRaw("par_id, par_name, par_description, par_opr,
                        DATE_FORMAT(date_signed, '%b-%d-%Y') AS date_signed,
                        DATE_FORMAT(date_expiration, '%b-%d-%Y') AS date_expiration,
                        DATE_FORMAT(date_signed, '%Y-%m-%d') AS date_signed_edit,
                        DATE_FORMAT(date_expiration, '%Y-%m-%d') AS date_expiration_edit")->get();
        //active MOA
        $dataMoa_am = DB::table('moas')
                        ->selectRaw("par_id, par_name, par_description, par_opr,
                        DATE_FORMAT(date_signed, '%b-%d-%Y') AS date_signed,
                        DATE_FORMAT(date_expiration, '%b-%d-%Y') AS date_expiration,
                        DATE_FORMAT(date_signed, '%Y-%m-%d') AS date_signed_edit,
                        DATE_FORMAT(date_expiration, '%Y-%m-%d') AS date_expiration_edit")
                        ->whereRaw("date_expiration > CURDATE()")->get();
        //two month before expiration
        $dataMoa_tm = DB::table('moas')
                        ->selectRaw("par_id, par_name, par_description, par_opr,
                        DATE_FORMAT(date_signed, '%b-%d-%Y') AS date_signed,
                        DATE_FORMAT(date_expiration, '%b-%d-%Y') AS date_expiration,
                        DATE_FORMAT(date_signed, '%Y-%m-%d') AS date_signed_edit,
                        DATE_FORMAT(date_expiration, '%Y-%m-%d') AS date_expiration_edit")
                        ->whereRaw("date_expiration <= DATE_ADD(CURDATE(), INTERVAL 2 MONTH) AND date_expiration > DATE_ADD(CURDATE(), INTERVAL 1 MONTH)")->get();
        //one month before expiration
        $dataMoa_om = DB::table('moas')
                        ->selectRaw("par_id, par_name, par_description, par_opr,
                        DATE_FORMAT(date_signed, '%b-%d-%Y') AS date_signed,
                        DATE_FORMAT(date_expiration, '%b-%d-%Y') AS date_expiration,
                        DATE_FORMAT(date_signed, '%Y-%m-%d') AS date_signed_edit,
                        DATE_FORMAT(date_expiration, '%Y-%m-%d') AS date_expiration_edit")
                        ->whereRaw("date_expiration <= DATE_ADD(CURDATE(), INTERVAL 1 MONTH) AND date_expiration >= CURDATE()")->get();
        //expired moa
        $dataMoa_ed = DB::table('moas')
                        ->selectRaw("par_id, par_name, par_description, par_opr,
                        DATE_FORMAT(date_signed, '%b-%d-%Y') AS date_signed,
                        DATE_FORMAT(date_expiration, '%b-%d-%Y') AS date_expiration,
                        DATE_FORMAT(date_signed, '%Y-%m-%d') AS date_signed_edit,
                        DATE_FORMAT(date_expiration, '%Y-%m-%d') AS date_expiration_edit")
                        ->whereRaw("date_expiration <= CURDATE()")->get();
        return view('moa', ['dataMoa' => $dataMoa, 'dataMoa_am' => $dataMoa_am, 'dataMoa_tm' => $dataMoa_tm, 'dataMoa_om' => $dataMoa_om, 'dataMoa_ed' => $dataMoa_ed]);
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
                    //adding of moa
            $moa = new Moa;
            $moa->par_name = $request->par_name;
            $moa->par_opr = $request->par_opr;
            $moa->par_description = $request->par_description;
            $moa->date_signed = $request->date_signed;
            $moa->date_expiration = $request->date_expiration;


            if ($moa->save())
            {  
                //input for log_input table
                //get the id of a specific moa that inserted previously 
                
                $notification = array(
                    //Notification for success
                    'alert-type' => 'success',
                    'alert-message' => 'MOA Added Successfully!'
                );
                return back()->with($notification);
            }else{
                //Notification for error
                $notification = array(
                    'alert-type' => 'error',
                    'alert-message' =>'Error! Adding of MOA is not successful!'
                    
                );
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
    public function update(Request $request)
    {
        $par_id             = $request->par_id;
        $par_name           = $request->par_name;
        $par_opr            = $request->par_opr;
        $par_description    = $request->par_description;
        $date_signed        = $request->date_signed;
        $date_expiration    = $request->date_expiration;

        //updating the MOA
        if($affected = DB::table('moas')
              ->where('par_id', $par_id)
              ->update(['par_name' => $par_name, 
                       'par_opr' => $par_opr, 'par_description' => $par_description,
                       'date_signed' => $date_signed, 'date_expiration' => $date_expiration]))
        { 
            $notification = array(
            //Notification for success
            'alert-type' => 'success',
            'alert-message' => 'MOA Updated Successfully!');
            return back()->with($notification);

        }else{
            $notification = array(
            //Notification for success
            'alert-type' => 'success',
            'alert-message' => 'MOA Updated Successfully!');
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
          //set status to 'DELETED' when the event was deleted 
          $par_id   = $request->par_id;
  
          if ($event = DB::table('moas')->where('par_id','=', $par_id)->delete())
          {   
              $notification = array(
                  //Notification for success
                  'alert-type' => 'success',
                  'alert-message' => 'MOA Deleted Successfully!'
              );
              return back()->with($notification);
          }else{
              //Notification for error
              $notification = array(
                  'alert-type' => 'error',
                  'alert-message' =>'Error! MOA of schedule is not successful!'
                  
              );
              return back()->with($notification);
          }
    }
}
