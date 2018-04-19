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
