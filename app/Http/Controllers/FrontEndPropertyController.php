<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * GET the properties.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProperty(Request $request)
    {
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role; 
        

        $validator = Validator::make($request->all(), [
          
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        
        $property['user_id'] = $request->input('user_id');
        $property['role'] = $request->input('role');
       
     
        
        
            
            $curl = curl_init();
           
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://hms.com/api/yourProperties",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($property),
                CURLOPT_HTTPHEADER => array(
                    // Set here requred headers
                    "accept: */*",
                    "accept-language: en-US,en;q=0.8",
                    "content-type: application/json",
                    'Authorization' => 'Bearer '.csrf_field(),
                   
                    
                ),
            ));
            $success= curl_exec($curl);
            $err = curl_error($curl);
            $erre= json_decode($err,true);
            $result= json_decode($success,true);
        
       

        curl_close($curl);

        if ($err) {
       
        return view('error')->with('error',$erre);
       
        } else {
            
        // var_dump($result);
        // exit();
    //    var_dump($result);
   
        // echo  $result[0]['id'];
        // echo  $result[0]['propertyType'];
       
        // echo sizeof($result);
        // exit();
        
            return view('adminAction.showproperties')->with('result',$result);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertProperty(Request $request)
    {
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role; 
        

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

        
        $property['user_id'] = $request->input('user_id');
        $property['role'] = $request->input('role');
        $property['propertyType'] = $request->input('propertyType');
        $property['propertyName'] = $request->input('propertyName');
        $property['noOfRoom'] = $request->input('noOfRoom');
        $property['streetAddress'] = $request->input('streetAddress');
        $property['sector'] = $request->input('sector');
        $property['Latitude'] = $request->input('Latitude');
        $property['Longitude'] = $request->input('Longitude');
        $property['city'] = $request->input('city');
        $property['internet'] = $request->input('internet');
        $property['parking'] = $request->input('parking');
        $property['mess'] = $request->input('mess');
        $property['TvCabel'] = $request->input('TvCabel');
        $property['RoomCleaning'] = $request->input('RoomCleaning');
        $property['lundary'] = $request->input('lundary');
        $property['cctvCamear'] = $request->input('cctvCamear');
     
        
        
            
            $curl = curl_init();
           
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://hms.com/api/createProperty",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($property),
                CURLOPT_HTTPHEADER => array(
                    // Set here requred headers
                    "accept: */*",
                    "accept-language: en-US,en;q=0.8",
                    "content-type: application/json",
                    'Authorization' => 'Bearer '.csrf_field(),
                   
                    
                ),
            ));
            $success= curl_exec($curl);
            $err = curl_error($curl);
            $erre= json_decode($err,true);
            $result= json_decode($success,true);
          
        curl_close($curl);

        if ($err) {
       
            return redirect()->back()->with('error','You have no permission for this page!');
       
       
        } else {
            return redirect()->back()->with('success','Property Success full addedd');
            // return view('adminAction.returnproperty')->with('result',$result);
        }

    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insertRoom(Request $request)
    {
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role; 
        

       
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
        $property['roomType'] = $request->input('roomType');
        $property['NameOfRoom'] = $request->input('NameOfRoom');
        $property['price'] = $request->input('price');
        $property['availableRoom'] = $request->input('availableRoom');
        $property['property_id'] = $request->input('property_id');
        $property['role'] = $role;   
            $curl = curl_init();
         
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://hms.com/api/createRoom",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($property),
                CURLOPT_HTTPHEADER => array(
                    // Set here requred headers
                    "accept: */*",
                    "accept-language: en-US,en;q=0.8",
                    "content-type: application/json",
                    'Authorization' => 'Bearer '.csrf_field(),
                   
                    
                ),
            ));
            $success= curl_exec($curl);
            $err = curl_error($curl);
            // $erre= json_decode($err,true);
            // $result= json_decode($success,true);
        
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        $code = http_response_code();
        

        curl_close($curl);

        if ($code != 201) {
            return redirect('viewproperties')->with('error','You have Some thing wrong!');
            return redirect()->route('viewproperties')
        ->with('error','You have no permission for this page!');
            
            exit();
        } else {
            return redirect('viewproperties')->with('success','Successful Room  addedd');
        }



    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchSector(Request $request)
    {
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role; 
        
        $validator = Validator::make($request->all(), [
            'sector' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $id = $request->input('sector');

        $curl = curl_init();
        $base_url = 'http://hms.com/api/showpropertySector';
        $url = $base_url . '/' . $id;
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
           
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $erre= json_decode($err,true);
        $result= json_decode($response,true);
        
        curl_close($curl);
   
        
        if ($err) {
            
            return view('Actionuser.usershowproperties')->with('error',"NOT Available ");
        } else {
            // var_dump($result);
            // exit();
                // echo  $result[0]['id'];
                // echo  $result[0]['propertyType'];
                // echo  $result[1]['id'];
                // echo  $result[1]['propertyType']; 
                // return view('adminAction.showproperties')->with('result',$result);
                return view('Actionuser.usershowproperties')->with('result',$result);
          
        }
    }



 /**
     * 
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function searchAllSector()
    {

        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://hms.com/api/showproperty",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
            
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
    
    public function propertyinfo($id)
    {

        
        $curl = curl_init();
        $base_url = 'http://hms.com/api/getProperty';
        $url = $base_url . '/' . $id;
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
            
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $erre= json_decode($err,true);
        $result= json_decode($response,true);
        
        curl_close($curl);
        
        if ($err) {
           
            return view('Actionuser.vewproperty')->with('error','something wrong');
        } else {
            // var_dump($result);
            // exit();
            return view('Actionuser.vewproperty')->with('result',$result);
        }
    }
    public function viewrooms($id)
    {

        
        $curl = curl_init();
        $base_url = 'http://hms.com/api/getRooms';
        $url = $base_url . '/' . $id;
       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
            
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $erre= json_decode($err,true);
        $result1= json_decode($response,true);
        
        curl_close($curl);
        
        if ($err) {
           
            return view('Actionuser.view-roomdetail')->with('error','something wrong');
        } else {
          
            return view('Actionuser.view-roomdetail')->with('result1',$result1);
        }
    }

   
    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goAddRoom($id)
    {

        return view('adminAction.add-room')->with('id',$id);

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
