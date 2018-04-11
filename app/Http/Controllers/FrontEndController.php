<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use View;
use Response;

class FrontEndController extends Controller
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
    public function getregisters(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            // return response()->json(['error'=>$validator->errors()], 401);           
            return view('main-page')->with($validator); 
        }

     
          
        
        $registration['name'] = $request->input('name');
        $registration['email'] = $request->input('email');
        $registration['password'] = $request->input('password');
        $registration['c_password'] = $request->input('c_password');
        $registration['role'] = $request->input('role');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://hms.com/api/register",
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
        $success= curl_exec($curl);
        $err = curl_error($curl);
        $erre= json_decode($err,true);
        $result= json_decode($success,true);
        if( http_response_code() == 201 ) 
        {
            return view('main-page');
        }
        if( http_response_code() == 401 ) 
        {
            return view('error');
        }
        
        // var_dump($response);
        // var_dump($err);
        // var_dump($erre);
        // var_dump($result);
        
        // if ($erre ) {
       
        // //    return response()
        // //     ->view('error', $erre);
        // // return response()->json(['error'=>$erre], 401);
        
        // return view('error')->with('erre' , $erre);
        //     } else {
       
            return view('error')->with($result);
            
            // return  array($result);
            // return Redirect::to('/')->with('message', 'Successfull Register');
            
            // return response()
            // ->view('error', $result);
            // return view('error')->with('result' , $result);

            // return response()->json(['success'=>$result], 401);
            // return view('error')->with('result' , $result);
            
        // }

        curl_close($curl);

   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'email' => 'required|email',
            'password' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
       
        $registration['email'] = $request->input('email');
        $registration['password'] = $request->input('password');
       

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://hms.com/api/login",
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

        $result= json_decode($response,true);
        $error = json_decode($err,true);
        
        // return Redirect::back()->withErrors($err)->withInput();
        curl_close($curl);

        // if ($err) {
        // echo "cURL Error #:" . $err;
        // // return Redirect::back()->withErrors(['msg', 'The Message']);
        // // return Redirect::back()->withErrors($err)->withInput();
        // } else {
        // echo $response;
        // }

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


       // return response(view('error',array('error'=>$validator)),200,['Content-Type' => 'application/json']);
            // return response(view('error')->with('error', array('name' => $validator)));
        //    return  View::make('error', $validator);
            // return response()->view('error')->json(['error'=>$validator->errors()], 401);     
            // return Redirect::to('auth.register')->with('message', 'Registeration Failed');  
            // $tes = json(['error'=>$validator->errors()]);
            // return response()
            // ->view('auth.register', $tes);
            //  ->header('Content-Type', $type);