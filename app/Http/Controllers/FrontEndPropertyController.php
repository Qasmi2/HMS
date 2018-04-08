<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FrontEndPropertyController extends Controller
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
    public function getProperty(Request $request)
    {
        
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

        $registration['propertyType'] = $request->input('propertyType');
        $registration['propertyName'] = $request->input('propertyName');
        $registration['noOfRoom'] = $request->input('noOfRoom');
        $registration['streetAddress'] = $request->input('streetAddress');
        $registration['sector'] = $request->input('sector');
        $registration['Latitude'] = $request->input('Latitude');
        $registration['Longitude'] = $request->input('Longitude');
        $registration['city'] = $request->input('city');
        $registration['internet'] = $request->input('internet');
        $registration['parking'] = $request->input('parking');
        $registration['mess'] = $request->input('mess');
        $registration['TvCabel'] = $request->input('TvCabel');
        $registration['RoomCleaning'] = $request->input('RoomCleaning');
        $registration['lundary'] = $request->input('lundary');
        $registration['cctvCamear'] = $request->input('cctvCamear');
        
        $curl = curl_init();

        curl_setopt_array($curl, array(     
            CURLOPT_URL => "http://hms.com/api/createProperty",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($registration),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
       
        return redirect()->back();
        // return redirect('/errorMessage');
        // ->with('status', $err);
        } else {
        echo $response;
       
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
