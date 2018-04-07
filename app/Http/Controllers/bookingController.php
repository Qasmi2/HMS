<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\booking;
use App\room;
use Validator;
use DB;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role;
        if($role == 'user'){

            $validator = Validator::make($request->all(), [
                
                'room_id' => 'required',
                
               
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }
             
            $booking = $request->isMethod('put') ? booking::findOrFail 
            ($request->booking_id) : new booking;
            $status="pending";
            $booking->status =  $status;
            $booking->user_id = $userID;
            $booking->room_id = $request->input('room_id');
            
            if($booking->save())
            {
                return response()->json(['Success' =>'Your request has been recorded we will contect soon'],201);
            }
            else{
                return response()->json(['error'=>'Room data  inserting error  '], 401);  
            }
        } else{
            return response()->json(['error'=>'unauthorized User  '], 401);  
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
        
        $user = Auth::user();
        $role = $user->role;
        if($role == 'admin'){

            $validator = Validator::make($request->all(), [
                
                'status' => 'required',
               
            ]);
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }

            $booking = booking::findOrFail($id);
            $status = $booking->status = $request->input('status');
            if($status = 'confirm'){
                $availibility = room::findOrFail($id);
                $availibility->availableRoom = 0;
                if( $booking->update($request->all()) );
                {
                    $availibility->update();
                    return response()->json(['Success' =>'room has been booked '],201);
                }
                
            }
            if($status = 'reject') {

                if( $booking->update($request->all()) );
                {
                    return respnse()->json(['error' =>'Soory Your request has been Rejected'],201);
                }
                
            }
           
        }
        else{
        return response()->json(['error'=>'Unauthorised amin'], 401);
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
        
        
    }
}
