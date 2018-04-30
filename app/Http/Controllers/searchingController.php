<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\propertyResource;
use App\property;
use Validator;
use DB;


class searchingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $property = DB::table('properties')->get();
        $property  =DB::select('SELECT * FROM properties');

        return response()->json( $property, 201);
    }

    /**
     * Show the property of the sectors
     *
     * @return \Illuminate\Http\Response
     */
    public function sector($id)
    {
          // $property = DB::table('properties')->get();
          
          $property = DB::table('properties')->where('sector', $id)->get();
          

          return response()->json( $property, 201);
    }
/**
     * Show the property of the University
     *
     * @return \Illuminate\Http\Response
     */
    public function univerity($id)
    {
          // $property = DB::table('properties')->get();
          if($id == "BAHRIA" || $id =="AIR")
          {

            $property ['sector'] = DB::table('properties')->where('sector', "F-8,Islamabad")
             ->orwhere('sector', "E-11,Islamabad")
            ->orwhere('sector', "F-7,Islamabad")
            ->orwhere('sector', "F-6,Islamabad")->get();
            
            //$property ['sector1'] = DB::table('properties')->where('sector', "F-8,Islamabad" )->get();
            // $property ['sector2'] = DB::table('properties')->where('sector', "F-10,Islamabad" )->get();
            // $property ['sector3'] = DB::table('properties')->where('sector', "E-11,Islamabad" )->get();
            // $property ['sector4'] = DB::table('properties')->where('sector', "F-7,Islamabad" )->get();
            // $property ['sector5'] = DB::table('properties')->where('sector', "F-6,Islamabad" )->get();
             return response()->json( $property, 201);
          }

          if($id == "NUST" || $id =="FAST" || $id =="ISLAMIC")
          {
            
            $property ['sector'] = DB::table('properties')->where('sector', "H-11,Islamabad" )
            ->orwhere('sector', "I-12,Islamabad")
            ->orwhere('sector', "I-10,Islamabad")
            ->orwhere('sector', "G-10,Islamabad")
            ->orwhere('sector', "G-11,Islamabad")
            ->get();

            // $property ['sector2'] = DB::table('properties')->where('sector', "I-12,Islamabad" )->get();
            // $property ['sector3'] = DB::table('properties')->where('sector', "I-10,Islamabad" )->get();
            // $property ['sector4'] = DB::table('properties')->where('sector', "G-10,Islamabad" )->get();
            // $property ['sector5'] = DB::table('properties')->where('sector', "G-11,Islamabad" )->get();
            return response()->json( $property, 201);
          }

          if($id == "FEDRAL" || $id =="CASE")
          {
            
            $property ['sector'] = DB::table('properties')->where('sector', "G-6,Islamabad" )
            ->orwhere('sector', "G-7,Islamabad")
            ->orwhere('sector', "F-6,Islamabad")
            ->orwhere('sector', "F-7,Islamabad")
            ->orwhere('sector', "G-5,Islamabad")
            ->get();
            // $property ['sector2'] = DB::table('properties')->where('sector', "G-7,Islamabad" )->get();
            // $property ['sector3'] = DB::table('properties')->where('sector', "F-6,Islamabad" )->get();
            // $property ['sector4'] = DB::table('properties')->where('sector', "F-7,Islamabad" )->get();
            // $property ['sector5'] = DB::table('properties')->where('sector', "G-5,Islamabad" )->get();
            return response()->json( $property, 201);
          }
          if($id == "COMSAT" || $id =="ABASYN")
          {
            
            $property ['sector'] = DB::table('properties')->where('sector', "khanapull" )
            ->orwhere('sector', "margallatown")
            ->orwhere('sector', "tarmari")
            ->orwhere('sector', "alipur")
           
            ->get();
            // $property ['sector2'] = DB::table('properties')->where('sector', "margallatown" )->get();
            // $property ['sector3'] = DB::table('properties')->where('sector', "tarmari" )->get();
            // $property ['sector4'] = DB::table('properties')->where('sector', "alipur" )->get();
  
            return response()->json( $property, 201);
          }



          $property = DB::table('properties')->where('sector', $id)->get();
          

          return response()->json( $property, 201);
    }
    
    public function sectorall(Request $request)
    {
          // $property = DB::table('properties')->get();
          
          $property = DB::table('properties')->get();
          

          return response()->json( $property, 201);
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
