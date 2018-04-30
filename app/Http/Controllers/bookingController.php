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
        // $user = Auth::user();

        $userID =$request->input('user_id');
        $roomID = $request->input('room_id');
        $role = $request->input('role');
         
            
        if($role == 'user'){

            $validator = Validator::make($request->all(), [
                
                'room_id' => 'required',
                
               
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }
             

            

            // $booking = $request->isMethod('put') ? booking::findOrFail 
            // ($request->booking_id) : new booking;

            $book = $request->isMethod('put') ? booking::findOrFail 
            ($request->booking_id) : new booking;
           
            @$status = "pending";
            $book->status = $status;
            $book->user_id = $request->input('user_id');
            $book->room_id = $request->input('room_id');

            // $booking->status="pending";
           
            if($book->save())
            {
                return response()->json(['success' =>'Your request has been recorded we will contect soon'],201);
            }
            else{
                return response()->json(['success'=>'Room data  inserting error  '], 401);  
            }
        } else{
            return response()->json(['success'=>'unauthorized User  '], 401);  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($propertyid)
    {
        // $property = DB::table('properties')->where('user_id', $id)->get();
        // //  $propertyID = DB::select('select id FROM properties WHERE user_id = $id');
        // $proer = DB::select('select id.rooms, from rooms');
       // $rooms = DB::table('rooms')->where('property_id', $id)->get();
        //  $room = DB::table('rooms')->where('property_id','=', $propertyid)->pluck('id');
        //  $bookedRoom = DB::select('SELECT bookings.room_id FROM bookings INNER JOIN rooms ON bookings.room_id = $room');
        // $bookedRoom = DB::select(' SELECT room_id FROM bookings where EXISTS (select id FROM rooms where property_id = 1)');
        //$bookedRoom = DB::table('bookings')->where('property_id', $id)->get();
        //$bookedRoom = DB::table('rooms','bookings')->where('rooms.property_id', $propertyid and 'bookings.room_id', 'rooms.id')->get();
        $x =  DB::table('bookings')->select('room_id')->get();
        $d=[];
        foreach($x as $xs)
        {
            $d[] = $xs->room_id; 

        }
        $bookedRoom = DB::table('rooms')->where('rooms.property_id', $propertyid) ->wherein('rooms.id', $d)
        ->get();
        
        
//select * from rooms where rooms.property_id = 1 and rooms.id NOT IN(select bookings.room_id from bookings)
        //select * from rooms, bookings where rooms.property_id = 1 and bookings.room_id= rooms.id

    //     var_dump( $bookedRoom );
    //    exit();
        // $bookedRoom = DB::select('select room_id From bookings')->where('select id from rooms where property_id', '=', $propertyid )->get();
        // var_dump($bookedRoom);
        // exit();
        return response()->json($bookedRoom, 201);
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
