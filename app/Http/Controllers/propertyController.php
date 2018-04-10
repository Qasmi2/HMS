<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\property;
use Validator;
use DB;
class propertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * get the the property Name  of the admin
     */
    public function index()
    {
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role;
        if($role == 'admin'){

            // $property = property::paginate(10);
            //return collection of articles as a resource
            // return propertyResource::collection($property);
            // $propertyID  = DB::table('properties')->where('user_id','=',$userID)->value('id');
            // $propertyID = DB::table('properties')->pluck('propertyType');
            // $propertyID  = DB::table('properties')->where('id',$userID)->get();
            // $propertyID = DB::table('properties')->lists('property_id',$userID);
            $propertyID = DB::table('properties')->where('user_id', $userID)->pluck('id');
            // $propertyID = DB::table('properties')->where('user_id', $userID)->pluck('propertyType');
            // $propertyID = DB::table('properties')->where('user_id', $userID)->get();

            return response()->json( $propertyID, 201);
        }
        else{
            return response()->json(['error'=>'Unauthorised amin'], 401);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Get all the property Info of the admin 
     */
    public function showAllProperty()
    {
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role;
        if($role == 'admin'){

        
            $property = DB::table('properties')->where('user_id', $userID)->get();

            return response()->json( $property, 201);
        }
        else{
            return response()->json(['error'=>'Unauthorised amin'], 401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * insert the property info of the admin
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role;
        if($role == 'admin'){
            
            $validator = Validator::make($request->all(), [
                'propertyType' => 'required',
                'propertyName' => 'required',
                'noOfRoom' => 'required',
                'streetAddress' => 'required',
                'sector' => 'required',
                'city' =>'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }


            $hostal = $request->isMethod('put') ? property::findOrFail 
            ($request->property_id) : new property;
           
            // $hostal->id = $request->input('property_id');
            $hostal->propertyType = $request->input('propertyType');
            $hostal->propertyName = $request->input('propertyName');
            $hostal->noOfRoom = $request->input('noOfRoom');
            $hostal->streetAddress = $request->input('streetAddress');
            $hostal->sector = $request->input('sector');
            $hostal->Latitude = $request->input('Latitude');
            $hostal->Longitude = $request->input('Longitude');
            $hostal->city = $request->input('city');
            $hostal->internet = $request->input('internet');
            $hostal->parking = $request->input('parking');
            $hostal->mess = $request->input('mess');
            $hostal->TvCabel = $request->input('TvCabel');
            $hostal->RoomCleaning = $request->input('RoomCleaning');
            $hostal->lundary = $request->input('lundary');
            $hostal->cctvCamear = $request->input('cctvCamear');

            $hostal->user_id = $userID;
           if($hostal->save()){
    
            // return new propertyResource($hostal);
               return response()->json($hostal, 201);
            
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
     * Get the specifice property info of the admin
     */
    public function show($id)
    {
        $user = Auth::user();
    
        $role = $user->role;
        if($role == 'admin'){
            if($property = property::findorFail($id)){

                // return new propertyResource($property);
                return response()->json($property, 201);
            }
            else{
                return response()->json(['error'=>'some Error'], 401);   
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
     * Updated the specific property info of the admin
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $role = $user->role;
        if($role == 'admin'){
            
            $property = property::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'propertyType' => 'required',
                'propertyName' => 'required',
                'noOfRoom' => 'required',
                'streetAddress' => 'required',
                'sector' => 'required',
                'city' =>'required',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);            
            }
            
            if( $property->update($request->all()) );
            {
                return response()->json($property, 201);
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
     * Delete the specific property info of the admin
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $userID = $user->id;
        
        $role = $user->role;
        if($role == 'admin'){
            $property = property::findorFail($id);
            if($property->delete()){

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
