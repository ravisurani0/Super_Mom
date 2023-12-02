<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Mail\SignupMail;
use App\Model\Cms;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Exception;
use Illuminate\Support\Facades\Log;

class ApiUserAuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string',
            'mobile_no' => 'required|string|digits:10|unique:users',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'error' =>  $validator->messages(),
                'data' => []
            ], 400);
        }


        DB::beginTransaction();
        try {
            $emailVerifyOTP =  $this->generateRandomString(4);
            $user = User::create([
                'company_name' => $request->company_name,
                'mobile_no' => $request->mobile_no,
                'address' => $request->address,
                'email' => $request->email,
                'role' => '3',
                'user_status' => false,
                'login_otp' => $emailVerifyOTP,
                'password' => bcrypt($request->password),
            ]);
            $applogo =  Cms::where('cms_key', 'app_logo')->pluck('cms_value')->first();

            Mail::to($user->email)->send(new SignupMail($user, $applogo));

            $token = $user->createToken('API Token')->accessToken;

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User created successfully.',
                'data' => ['user' => $user, 'otp' => $emailVerifyOTP, 'token' => $token,],
            ], 200);
        } catch (Exception $e) {
            Log::info('signup test', ['getLine' => $e->getLine(), 'message' => $e->getMessage()]);
            DB::rollback();
            return response()->json([
                'message' => $e->getMessage(),
                'error' =>  $e->getMessage(),
                'data' => []
            ], 400);
        }
    }

    public function otpVerify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'error' =>  $validator->messages(),
                'data' => []
            ], 400);
        }

        try {
            DB::beginTransaction();
            $user = User::where('email', $request->email)->first();

            if ($user && $user->login_otp == $request->otp) {

                User::where('email', $request->email)->update([
                    'email_verified_at' => now(),
                    'login_otp' => null,
                    'is_email_verified' => true,
                ]);

                $user = User::where('email', $request->email)->first();
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'OTP verify successfully.',
                    'data' => ['user' => $user],
                ], 200);
            } else {
                DB::rollback();
                return response()->json([
                    'message' => 'Invalid OTP.',
                    'data' => ['Invalid OTP, Please try again.'],
                ], 400);
            }
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => $e->getMessage(),
                'error' =>  $e->getMessage(),
                'data' => []
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'mobile_no' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response()->json([
                'message' => 'Invalid credentials.',
                'error' =>  ['Invalid login credentials, Please try again.'],
                'data' => []
            ], 400);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response()->json([
            'success' => true,
            'message' => 'Login Sucess.',
            'data' => ['user' => auth()->user(), 'token' => $token],
        ], 200);
    }

    public function generateSellerId(Request $request)
    {

        $user = auth()->user();

        if (empty($user)) {

            return response()->json([
                'message' => 'Seller not found.',
                'error' =>  ['Requested seller not found.'],
                'data' => []
            ], 400);
        } elseif ($user->seller_id != null) {

            $message = 'Seller already has Seller Id.';

            if (!$user->user_status) {
                $message  = "Seller Id is not approved.";
            }
            DB::commit();

            return response()->json([
                'message' => $message,
                'error' =>  [$message],
                'data' => []
            ], 403);
        } else {

            DB::beginTransaction();
            try {
                $user->update(['seller_id' => str_replace(' ', '', $user['company_name'] . '_' . $this->generateRandomString(4))]);

                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => 'Seller Id generated successfully',
                    'data' => ['user' => $user],
                ], 200);
            } catch (Exception $e) {
                DB::rollback();
                return response()->json([
                    'message' => $e->getMessage(),
                    'error' =>  $e->getMessage(),
                    'data' => []
                ], 400);
            }
        }
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789';
        // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function profile()
    {
        $user = auth()->user();

        if (empty($user)) {
            return response()->json([
                'message' => 'Requested seller not found.',
                'error' =>  ['Requested seller not found.'],
                'data' => []
            ], 400);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'User Profile.',
                'data' => ['userDetails' => $user],
            ], 200);
        }
    }

    public function resetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // 'mobile_no' => 'required|string|digits:10',
            'email' => 'required|email|exists:users,email'
        ]);


        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'error' =>  $validator->messages(),
                'data' => []
            ], 400);
        }

        $userDetails = User::where('email', $request->email)->first();

        if ($userDetails) {
            $emailVerifyOTP =  $this->generateRandomString(4);


            $user = User::where('id', $userDetails->id)
                ->update(['login_otp' => $emailVerifyOTP,]);

            $data = User::where('email', $request->email)->select('company_name', 'login_otp')->first();

            // $appLogo =  Cms::where('cms_key', 'app_logo')->pluck('cms_value')->first();
            $applogo =  Cms::where('cms_key', 'app_logo')->pluck('cms_value')->first();
            Mail::to($userDetails->email)->send(new ResetPassword($data, $applogo));

            return response()->json([
                'success' => true,
                'message' => 'Password Reset OTP sent successfully.',
                'data' => ['Password Reset OTP sent successfully.'],
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found with given Mobile No.',
                'error' =>  ['User not found with given Mobile No.'],
                'data' => []
            ], 400);
        }
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'mobile_no' => 'required|string|digits:10',
            'email' => 'required|email|exists:users,email',
            // 'otp' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'error' =>  $validator->messages(),
                'data' => []
            ], 400);
        }

        $userDetails = User::where('email', $request->email)->first();

        if ($userDetails) {
            // if ($userDetails->login_otp !=  $request->otp) {
            //     return response()->json([
            //         'message' => 'Invalid OTP.',
            //         'error' =>  ['Invalid OTP.'],
            //         'data' => []
            //     ], 400);
            // } else {

                $user = User::where('id', $userDetails->id)
                    ->update([
                        'password' => bcrypt($request->password),
                        'login_otp' => null
                    ]);

                if ($user) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Password updated successfully.',
                        'data' => ['Password updated successfully.'],
                    ], 200);
                }

                return response()->json([
                    'message' => 'Password not updated.',
                    'error' => ['Password not updated.'],
                    'data' => [],
                ], 400);
            // }
        } else {
            return response()->json([
                'message' => 'User not found with given Email.',
                'error' =>  ['User not found with given Email.'],
                'data' => []
            ], 400);
        }
    }

    public function resendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'error' =>  $validator->messages(),
                'data' => []
            ], 400);
        }

        $userDetails = User::where('email', $request->email)->first();

        if ($userDetails) {
            $emailVerifyOTP =  $this->generateRandomString(4);

            $user = User::where('id', $userDetails->id)->update(['login_otp' => $emailVerifyOTP]);
            $data = User::where('email', $request->email)->select('company_name', 'login_otp')->first();
            $applogo =  Cms::where('cms_key', 'app_logo')->pluck('cms_value')->first();
            Mail::to($userDetails->email)->send(new ResetPassword($data, $applogo));

            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully.',
                'data' => ['OTP sent successfully.'],
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found with given Email address.',
                'error' =>  ['User not found with given Email address.'],
                'data' => []
            ], 400);
        }
    }
}
