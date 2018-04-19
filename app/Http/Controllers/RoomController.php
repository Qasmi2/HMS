<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\room;
use Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        // $userID =$request->input('user_id');
        // $role = $request->input('role');
        // if($role == 'admin'){

            // $room = room::paginate(10);
            // finding property_ID of the auth user 
            // $propertyID = DB::table('properties')->where('user_id', $userID)->pluck('id');
            
            // $ROOMS = DB::table('rooms')->where('property_id', $propertyID)->pluck('id');
            // $room = DB::table('rooms')->where('property_id','=', $propertyID)->get();
            //return collection of articles as a resource
            // return propertyResource::collection($property);
            $room = DB::table('rooms')->where('property_id','=', $id)->get();
            return response()->json($room, 201);
        // }
        // else{
        //     return response()->json(['error'=>'Unauthorised amin'], 401);
        // }
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
     * store the room of the property of the admin 
     */
    public function store(Request $request)
    {
        
        $role = $request->input('role');
        
        // $propertyID ['id'] = DB::table('properties')->where('user_id','=',$userID)->value('id');

        // var_dump($role);
        // exit();
        if($role == 'admin'){

            $validator = Validator::make($request->all(), [
                'roomType' => 'required',
                'NameOfRoom' => 'required',
                'price' => 'required',
                'availableRoom' => 'required',
                'property_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }

            $Room = $request->isMethod('put') ? room::findOrFail 
            ($request->room_id) : new room;

            $Room->roomType = $request->input('roomType');
            $Room->NameOfRoom = $request->input('NameOfRoom');
            $Room->price = $request->input('price');
            $Room->availableRoom = $request->input('availableRoom');
            // $Room->bookedRoom = $request->input('bookedRoom');
            $propertyId = $Room->property_id  = $request->input('property_id');
            
            
            $noOfRoom = DB::table('properties')->where('id', '=', $propertyId )->value('noOfRoom');
            $room = DB::table('rooms')->where('property_id','=', $propertyId)->pluck('id')->count();
            
            if($room < $noOfRoom)
            {
                if($Room->save()){
    
                    // return new propertyResource($hostal);
                       return response()->json($Room, 201);
                    
                   }
                   else{
                    return response()->json(['error'=>'Something wrong Not Save into database'], 401);
                }
            }else{
             
                return response()->json(['error'=>'No of Room of your Property have been completed'], 401);

            }
        }
        else{
            return response()->json(['error'=>'Unauthorised amin'], 401);
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
         
        $user = Auth::user();
        $role = $user->role;
        if($role == 'admin'){

            if($room = room::findorFail($id)){

                // return new propertyResource($property);
                return response()->json($room, 201);
            }
            else{
                return response()->json(['error'=>'try to Searching the room is not available '], 401);   
            }
        }
        else{
            return response()->json(['error'=>'Unauthorised amin'], 401);
        }

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
            
            $room= room::findOrFail($id);

           
            $validator = Validator::make($request->all(), [
                'roomType' => 'required',
                'NameOfRoom' => 'required',
                'price' => 'required',
                'availableRoom' => 'required',
                'property_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }
            
            if( $room->update($request->all()) );
            {
                return response()->json($room, 201);
            }
            return response()->json(['error'=>'Not update'], 401);
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
        $user = Auth::user();
        $userID = $user->id;
        
        $role = $user->role;
        if($role == 'admin'){
            $room = room::findorFail($id);
            if($room->delete()){

                // return new propertyResource($property);
                return response()->json(['success'=>'deleted'], 201);
                
            }else{
                return response()->json(['error'=>'Not deleted'], 401);
            }
        }
        else{
            return response()->json(['error'=>'Unauthorised amin'], 401);
        }
    }
}
