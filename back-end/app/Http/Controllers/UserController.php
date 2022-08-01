<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function getUsers(Request $request)
    {
        if ($request->email) {
            try {
                $Users = UserModel::where('email', '=', $request->email)->get();
                return response()->json($Users)->setStatusCode(200);
            } catch (Exception $e) {
                return response()->json($Users)->setStatusCode(500);
            }
        }

        if ($request->username) {
            try {
                $Users = UserModel::where('username', '=', $request->username)->get();
                return response()->json($Users)->setStatusCode(200);
            } catch (Exception $e) {
                return response()->json($Users)->setStatusCode(500);
            }
        }

        try {
            $Users = UserModel::get();
            return response()->json($Users)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json($Users)->setStatusCode(500);
        }
    }

    public function getRandomUser()
    {
        $randomInt = rand(1, 100);
        try {
            $Users = UserModel::where('id', '=', $randomInt)->get();
            return response()->json($Users)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json($Users)->setStatusCode(500);
        }
    }

    public function getUserById($id)
    {
        try {
            $Users = UserModel::where('id', '=', $id)->get();
            return response()->json($Users)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json($Users)->setStatusCode(500);
        }
    }

//    public function getUserByUsername($username)
//    {
//
//    }
}

/*
TODO

post create
patch update

need to add the "?email=data" etc to all the endpoints so it can differenciate

get filtering by email - {{base_url}}/{{users_endpoint}}?email={{email}}
get filtering by username - {{base_url}}/{{users_endpoint}}?username={{username}}
get filtering by email and username - {{base_url}}/{{users_endpoint}}?email={{email}}&username={{username}}

add user status'
get by id - {{base_url}}/{{statuses_endpoint}}/{{status_id}}
get all - {{base_url}}/{{statuses_endpoint}}


add user role

*/


// Test database connection
//        if(DB::connection()->getDatabaseName())
//        {
//            echo "conncted sucessfully to database ".DB::connection()->getDatabaseName();
//        }
