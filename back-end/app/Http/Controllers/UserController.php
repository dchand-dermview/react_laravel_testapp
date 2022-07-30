<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function getUsers()
    {
        try {
            $Users = UserModel::get();
            return response()->json($Users)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json($Users)->setStatusCode(500);
        }
    }

    public function getRandomUser() {
        $randomInt = rand(1,100);
        try {
            $Users = UserModel::where('id', '=', $randomInt)->get();
            return response()->json($Users)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json($Users)->setStatusCode(500);
        }
    }

    public function getUserById($id) {
        try {
            $Users = UserModel::where('id', '=', $id)->get();
            return response()->json($Users)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json($Users)->setStatusCode(500);
        }
    }

    public function getUserByUsername($username) {
        try {
            $Users = UserModel::where('username', '=', $username)->get();
            return response()->json($Users)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json($Users)->setStatusCode(500);
        }
    }


}

/*
TODO

post create
patch update
get a given page - {{base_url}}/{{users_endpoint}}?page={{page}}&limit={{limit}}
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
