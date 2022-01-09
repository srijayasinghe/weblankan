<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\UserInterface;


class UserController extends Controller
{
    public function loginAction(Request $request, UserInterface $userInterface){
        return $userInterface->login($request);
    }

    public function userListAction(UserInterface $userInterface){
        $userList =  $userInterface->list();

        $index = 0;
        $data = [];
        foreach($userList as $user){
            //set return dataset
            $data[$index] = array(
                'id' => $user['id'],
                'name' => $user['name'],
                'designation' => $user['designation'],
                'contact_number' => $user['contact_number'],
                'view'=>$user['id']
            );
            $index++;
        }
        //json return
        return response()->json([
            "success" =>  true, 'data' => $data
        ], 200);
    }

    public function addAction(Request $request, UserInterface $userInterface){
        return $userInterface->create($request);
    }
}
