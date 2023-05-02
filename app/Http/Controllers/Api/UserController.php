<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        if (count($user) > 0) {
            $responce = [
                'message' => count($user) . ' users found',
                'status' => 1,
                "data" => $user
            ];
            return response()->json($responce, 200);
        } else {
            $responce = [
                'message' => ' No users found',
                'status' => 0
            ];
            return response()->json($responce, 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $validator = FacadesValidator::make($request->all(), [

            "name" => ["required"],
            'email' => ['required', 'email', 'unique:users,email'],
            "password" => ["required", 'min:8', 'confirmed'],
            'password_confirmation' => ['required']

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $data = [
                'role_id' => '2',
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),


            ];
            DB::beginTransaction();

            try {
                $user = User::create($data);
                DB::commit();
            } catch (\Exception $e) {
                print_r($e->getmessage());
                $user = null;
            }
            if ($user != null) {
                return response()->json([
                    'name' => $user->name,
                    'email' => $user->email,
                    'message' => "user registration completed"
                ], 200);
            } else {
                return response()->json([
                    'message' => 'server error'
                ], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            $response = [
                "message" => "user not found",
                'status' => 0
            ];
        } else {
            $response = [
                "message" => "user found",
                'status' => 1,
                'data' => $user
            ];
        }
        return response()->json($response, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json([
                'status' => 0,
                'message' => 'user record not found'
            ], 404);
        } else {
            DB::beginTransaction();
            try {
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->contact = $request['contact'];
                $user->pincode = $request['pincode'];
                $user->address = $request['address'];
                $user->status = $request['status'];
                $user->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $user = null;
            }
            if (is_null($user)) {
                return response()->json([
                    'message' => "Inter server error",
                    'error_msg' => $e->getMessage(),
                ], 404);
            } else {
                return response()->json([
                    'message' => 'user updated'
                ], 200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            $response = [
                "message" => "user does not exits",
                'status' => 0
            ];
            $respCode = 404;
        } else {

            DB::beginTransaction();
            try {
                $user->delete();
                DB::commit();
                $response = [
                    "message" => "user deleted successfully",
                    'status' => 1
                ];
                $respCode = 200;
            } catch (\Exception $err) {
                DB::rollBack();
                $response = [
                    "message" => "internal server error",
                    'status' => 0
                ];
                $respCode = 500;
            }
        }
        return response()->json($response, $respCode);
    }
}
