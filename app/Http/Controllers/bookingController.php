<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        

            $validator = Validator::make($request->all(), [
                
                
               
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }

            $booking = $request->isMethod('put') ? booking::findOrFail 
            ($request->booking_id) : new booking;
            
            $booking->status = $request->input('status')->default('pending');
            $booking->user_id = $userID;
            $booking->room_id = $requist->input('room_id');
            
            
            if($booking->save())
            {
                return respnse()->json(['Success' =>'Your request has been recorded we will contect soon'],201);
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

            $booking->status = $request->input('status');
            if( $booking->update($request->all()) );
            {
                return respnse()->json(['Success' =>'room has been booked '],201);
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
