<?php

namespace App\Services;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserService implements UserInterface
{

    public function login(Request $request){
        try{
            $login = $request->validate([
                'email'=>'required|string',
                'password'=>'required|string'
            ]);

            if(!Auth::attempt($login)){
                return response(['message'=>'Invalid login credentials.']);
            }

            $accessToken = Auth::user()->createToken('authToken')->accessToken;
            return response(['user'=>Auth::user(),'access_token'=>$accessToken]);
        }catch(Exception $ex){
            return json_encode(['message'=>$ex->getMessage()]);
        }
    }

    public function create(Request $request){
        try{

            //validate parameters
            $validator =  Validator::make($request->all(), [
                'txt_name' => 'required|string|max:225'
            ]);

            //if validation fails, return error message
            if ($validator->fails()) {
                return response()->json([
                    "success" => false,
                    "message" => $validator->errors(),
                ], 422);
            }

            $dateOfBirth ='';
            if(!empty($request->get('txt_birth_date'))){
                $dateOfBirth = date('d-m-y',strtotime($request->get('txt_birth_date')));
            }

            $bookingDate ='';
            if(!empty($request->get('bookingDate'))){
                $bookingDate = date('d-m-y',strtotime($request->get('bookingDate')));
            }

            //start db transaction
            DB::beginTransaction();

            $user = new User();
            $user->name = $request->get('txt_name');
            $user->gender = $request->get('maleFemail');
            $user->designation = $request->get('txt_designation');
            $user->date_of_birth = $dateOfBirth;
            $user->age = $request->get('txt_age');
            $user->nic_number = $request->get('txt_nic');
            $user->contact_number = $request->get('txt_contact');
            $user->land_phone_number = $request->get('txt_land_contact');
            $user->email = $request->get('txt_email');
            $user->password = $request->get('txt_password');
            $user->save();

            $timeSlot = new TimeSlot();
            $timeSlot->user_id = $user->id;
            $timeSlot->booking_date = $bookingDate;
            $timeSlot->morning = $request->get('txt_morning');
            $timeSlot->afternoon = $request->get('txt_afternoon');
            $timeSlot->evening = $request->get('txt_evening');
            $timeSlot->save();

             //commit db transaction
             DB::commit();

            //json return
            return response()->json([
                "success" =>  true,
                'message' => 'User created!'
            ], 200);

        }catch(Exception $ex){
            DB::rollback();
            echo $ex->getMessage();
            exit;
        }
    }

    public function update(Request $request){

    }

    public function delete( $id){

    }

    public function view($id){

    }

    public function list(){
        try{
            return User::all();
        }catch(Exception $ex){
            return json_encode($ex->getMessage());
        }
    }
}
