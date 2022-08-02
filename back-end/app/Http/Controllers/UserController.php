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
        try {
            $query = DB::table('users');

            if ($request->email) {
                $query->where('email', '=', $request->email);
            }

            if ($request->username) {
                $query->where('username', '=', $request->username);
            }

            $Users = $query->get();

            return response()->json($Users)->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json($error)->setStatusCode(500);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function createUser(Request $request)
    {
        try {
            $bodyContent = json_decode($request->getContent());

            $User = UserModel::create([
                'first_name' => $bodyContent->first_name,
                'last_name' => $bodyContent->last_name,
                'username' => $bodyContent->username,
                'email' => $bodyContent->email,
                'gender' => $bodyContent->gender,
                'dob' => $bodyContent->dob,
            ]);

            $User->save();
            return response()->json($User)->setStatusCode(200);
        } catch (Exception $error) {
            return response()->json($error)->setStatusCode(500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse|object
     */
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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|object
     */
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
