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
    public function index()
    {
        
        $user = Auth::user();
        $role = $user->role;
        if($role == 'admin'){

            $room = room::paginate(10);
            //return collection of articles as a resource
            // return propertyResource::collection($property);

            return response()->json($room, 201);
        }
        else{
            return response()->json(['error'=>'Unauthorised amin'], 401);
        }
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
        // $propertyID ['id'] = DB::table('properties')->where('user_id','=',$userID)->value('id');
        
       

        $role = $user->role;
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
            $Room->property_id  = $request->input('property_id');

           if($Room->save()){
    
            // return new propertyResource($hostal);
               return response()->json($Room, 201);
            
           }
           else{
            return response()->json(['error'=>'Something wrong Not Save into database'], 401);
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
