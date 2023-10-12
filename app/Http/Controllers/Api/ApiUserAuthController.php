<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiUserAuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string',
            'mobile_no' => 'required|string|digits:10|unique:users',
            'whatsapp_no' => 'required|string|digits:10|unique:users',
            'address' => 'nullable',
            'email' => 'nullable|email|unique:users',
            'discount' => 'nullable|numeric',
            'commission' => 'nullable|numeric',
            'account_balance' => 'nullable|numeric',
            'password' => 'required|string|min:6|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'error' =>  $validator->messages(),
            ], 200);
        }

        $user = User::create([
            'company_name' => $request->company_name,
            'mobile_no' => $request->mobile_no,
            'whatsapp_no' => $request->whatsapp_no,
            'address' => $request->address,
            'email' => $request->email,
            'role' => '3',
            // 'seller_id' => $request->seller_id,
            'requested_seller_id' => true,
            'discount' => $request->discount,
            'commission' => $request->commission,
            'account_balance' => $request->account_balance,
            'user_status' => false,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'success' => true,
            'message' => 'User created successfully.',
            'data' => ['user' => $user, 'token' => $token],
        ], 200);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'mobile_no' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response()->json([
                'success' => false,
                'message' => 'Login credentials are invalid.',
                'error' => 'Login credentials are invalid, Please try again',
            ], 200);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response()->json([
            'success' => true,
            'message' => 'Login Sucess.',
            'data' => ['user' => auth()->user(), 'token' => $token],
        ], 200);
    }

    public function generateSellerId(Request $request, User $user)
    {
        if (!empty($user)) {

            $user->update(['seller_id' => str_replace(' ', '', $user['company_name'] . '_' . $this->generateRandomString(4))]);

            return response()->json([
                'success' => true,
                'message' => 'Seller Id requested successfully',
                'data' => ['user' => $user],
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Error requesting Seller Id',
                'data' => ['user' => $user],
            ], 500);
        }
    }
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
