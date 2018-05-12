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
                CURLOPT_URL => "http://ayanshani.com/api/yourProperties",
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
            'phoneNo' => 'required',
            
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
        $property['lat'] = $request->input('lat');
        $property['lon'] = $request->input('lon');
        $property['city'] = $request->input('city');
        $property['phoneNo'] = $request->input('phoneNo');
        $property['internet'] = $request->input('internet');
        $property['parking'] = $request->input('parking');
        $property['mess'] = $request->input('mess');
        $property['TvCabel'] = $request->input('TvCabel');
        $property['RoomCleaning'] = $request->input('RoomCleaning');
        $property['lundary'] = $request->input('lundary');
        $property['cctvCamear'] = $request->input('cctvCamear');

        $property['AirConditioning'] = $request->input('AirConditioning');
        $property['IroningFacilities'] = $request->input('IroningFacilities');
        $property['PrivateBathroom'] = $request->input('PrivateBathroom');
         $property['Refrigerator'] = $request->input('Refrigerator');
         $property['Telephone'] = $request->input('Telephone');
         $property['AirportShuttle'] = $request->input('AirportShuttle');
         $property['Wardrobe'] = $request->input('Wardrobe');
         $property['Towels'] = $request->input('Towels');
         $property['Heating'] = $request->input('Heating');
         $property['Restaurant'] = $request->input('Restaurant');
         $property['Shower'] = $request->input('Shower');
         $property['pic'] = $request->input('pic');
        
     
        
        
           
            $curl = curl_init();
           
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://ayanshani.com/api/createProperty",
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
            
            return view('adminAction.add-property-result')->with('result',$result);
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
                CURLOPT_URL => "http://ayanshani.com/api/createRoom",
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
        
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        $code = http_response_code();
        
            // var_dump($code);
            // var_dump($result);
            // var_dump($result["success"]);
            
            
            // exit();
            // if($result['error'])
            // {
            //     echo $result['error'];
            // }
            // if($result['success'])
            // {
            //     echo $result['success'];
            // }
           
            // var_dump($result['success']);
            // exit();
        curl_close($curl);

        // if ($code != 200) {
            return view('adminAction.add-room-result')->with('result',$result);
            
            
           
        // } 
        // elseif($code == 200) {
        //     return redirect('viewproperties')->with('success','Successful Room  addedd');
        // }



    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchSector(Request $request)
    {
        
        
        $validator = Validator::make($request->all(), [
            'sector' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $id = $request->input('sector');
        var_dump($id);
        exit();
        $curl = curl_init();
        $base_url = 'http://ayanshani.com/api/showpropertySector';
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
            
                // echo  $result[0]['id'];
                // echo  $result[0]['propertyType'];
                // echo  $result[1]['id'];
                // echo  $result[1]['propertyType']; 
                // return view('adminAction.showproperties')->with('result',$result);
                return view('Actionuser.usershowproperties')->with('result',$result);
               
          
        }
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchSectorFront(Request $request)
    {
        // $user = Auth::user();
        // $userID = $user->id;
        // $role = $user->role; 
        
        $validator = Validator::make($request->all(), [
            'sector' => 'required',
            
        ]);

        if ($validator->fails()) {
            //return redirect()->back()->with('error','Please Select the Sector');
             return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $id = $request->input('sector');
        
        $curl = curl_init();
        $base_url = 'http://ayanshani.com/api/showpropertySector';
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
            
            return view('main-page-search')->with('error',"NOT Available ");
        } else {
            
                // echo  $result[0]['id'];
                // echo  $result[0]['propertyType'];
                // echo  $result[1]['id'];
                // echo  $result[1]['propertyType']; 
                // return view('adminAction.showproperties')->with('result',$result);
                return view('main-page-search')->with('result',$result);
               
          
        }
    }
    
    
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchuni(Request $request)
    {
        
        
        $validator = Validator::make($request->all(), [
            'university' => 'required',
            
        ]);

        if ($validator->fails()) {
            // return redirect()->back()->with('error','Please Select the Univeristy');
             return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $id = $request->input('university');
        
        $curl = curl_init();
        $base_url = 'http://ayanshani.com/api/showpropertyUniversity';
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
           
            return view('main-page-search-uni')->with('error',"NOT Available ");
        } else {
            
            // echo sizeof($result['sector']);
            // var_dump($result);
            $data = sizeof($result['sector']);
            // $data = $result['sector'];
            //  var_dump($data);
            // exit();
            // if($data != 0)
            // {
                return view('main-page-search-uni')->with('result',$result);
            // }
            // else{
                
            //     return view('main-page-search-uni')->with('result',$result);
            // }
            
                // echo  $result[0]['propertyType'];
                // echo  $result[1]['id'];
                // echo  $result[1]['propertyType']; 
                // return view('adminAction.showproperties')->with('result',$result);
                // for ($i = 0; $i < sizeof($result); $i++)
                //     {

                //         echo $result['sector'][i]['id'];
                //         echo $result['sector'][i]['propertyType'];
                //     }
                // var_dump($result);
            //    $pic = $result['sector'][0]['pic'];
               
            //     echo '<img src="data:pic/png;base64,'.base64_encode($pic).'"/>';
            //     //  echo $result['sector'][0]['id'];
                //  echo $result['sector'][0]['propertyType'];
                //  echo $result['sector'][1]['id'];
                //  echo $result['sector'][1]['propertyType'];
                // echo $result['sector'][2]['id'];
                // echo $result['sector'][2]['propertyType'];
                // echo $result['sector2'][0]['id'];
                //  echo $result['sector2'][0]['propertyType'];
                //  echo $result['sector3'][0]['id'];
                //  echo $result['sector3'][0]['propertyType'];
                 //exit();
                
               
               
          
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
          CURLOPT_URL => "http://ayanshani.com/api/showproperty",
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
        $base_url = 'http://ayanshani.com/api/getProperty';
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



    // booking request

    public function bookinginfo($id)
    {
       
        
        $curl = curl_init();
        $base_url = 'http://ayanshani.com/api/request';
        $url = $base_url . '/' . $id;
        // var_dump($id);
        // exit();
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
        // var_dump($result);
        //      exit();
        curl_close($curl);
        
        if ($err) {
           
            return view('adminAction.bookingRequest')->with('error','something wrong');
        } else {
            

            return view('adminAction.bookingRequest')->with('result',$result);
        }
    }

    //End booking request







    public function viewrooms($id)
    {
        

       
        
        
        $curl = curl_init();
        $base_url = 'http://ayanshani.com/api/getRooms';
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


    public function confirm($id)
    {
        
        $curl = curl_init();
        $base_url = 'http://ayanshani.com/api/booked';
        $url = $base_url . '/' . $id;
       
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "PUT",
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
           
            return redirect()->back()->with('error','not booked');
        } else {
          
            return redirect()->back()->with('success','Successfull  Confirm Booked ');
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

    public function bookingRequest(Request $request)
    {
        
        
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role; 
        

        $validator = Validator::make($request->all(), [
                
            'room_id' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $property['user_id'] = $request->input('user_id');
        $property['room_id'] = $request->input('room_id');
        
       
        $property['role'] = $role;
        // var_dump($property);
        // exit();
        
            
            $curl = curl_init();
           
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://ayanshani.com/api/booking",
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
                    // 'Authorization' => 'Bearer '.csrf_field(),
                   
                    
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
            
            return redirect()->back()->with('success','Your Request has been noted, we will contact soon!');
            // return view('adminAction.returnproperty')->with('result',$result);
        }

    }






    public function checkStatus(Request $request)
    {
        
        
        $user = Auth::user();
        $userID = $user->id;
        $role = $user->role; 
        

        $validator = Validator::make($request->all(), [
                
            'room_id' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        $property['user_id'] = $request->input('user_id');
        $property['room_id'] = $request->input('room_id');
        
       
        $property['role'] = $role;
        // var_dump($property);
        // exit();
        
            
           
        $curl = curl_init();
           
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://ayanshani.com/api/status",
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
                // 'Authorization' => 'Bearer '.csrf_field(),
               
                
            ),
        ));
            $success= curl_exec($curl);
            $err = curl_error($curl);
            $erre= json_decode($err,true);
            $result= json_decode($success,true);
        //    var_dump($result);
        //    exit();
       

        if ($err) {
       
            return redirect()->back()->with('error','something Wrong');
       
       
        } else {
            
            //  var_dump($result);
            //  exit();
            return view('Actionuser.bookingstatus')->with('result',$result);
            // return view('adminAction.returnproperty')->with('result',$result);
        }

    }
    // public function booking(Request $request)
    // {

    //     $user = Auth::user();
    //     $userID = $user->id;
    //     $role = $user->role; 
        

    //     $validator = Validator::make($request->all(), [
                
    //         'room_id' => 'required',
            
           
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error'=>$validator->errors()], 401);            
    //     }
        
       
    //     @$booking->status = 'pending';
    //     $booking->user_id = $userID;
    //     $booking->room_id = $request->input('room_id');
       
           
    //         $curl = curl_init();
           
    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => "http://ayanshani.com/api/booking",
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => "",
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 30000,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => "POST",
    //             CURLOPT_POSTFIELDS => json_encode($booking),
    //             CURLOPT_HTTPHEADER => array(
    //                 // Set here requred headers
    //                 "accept: */*",
    //                 "accept-language: en-US,en;q=0.8",
    //                 "content-type: application/json",
    //                 'Authorization' => 'Bearer '.csrf_field(),
                   
                    
    //             ),
    //         ));
    //         $success= curl_exec($curl);
    //         $err = curl_error($curl);
    //         $erre= json_decode($err,true);
    //         $result= json_decode($success,true);
          
    //     curl_close($curl);

    //     if ($err) {
       
    //         return redirect()->back()->with('error','You have no permission for this page!');
       
       
    //     } else {
            
    //         return redirect()->back()->with('success','Your Request has been noted, we will contact soon!');
    //         // return view('adminAction.returnproperty')->with('result',$result);
    //     }

    // }




}
