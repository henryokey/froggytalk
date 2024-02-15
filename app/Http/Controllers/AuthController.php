<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\HttpStatusCode;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

      /**
     * Handle the incoming request.
     */
    public function login(Request $request): JsonResponse
    {
        try {

            /** @var User $user */
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) { // @phpstan-ignore-line
                return $this->failure(
                    message: 'The provided credentials are incorrect.',
                    status: 422
                );
            }

            $token = $user->createToken('Token Name')->plainTextToken;

            return $this->success(
                message: 'Login suceessful',
                data: [

                    'access_token' => $token,
                ],
                status: 200
            );
        } catch (\Throwable $th) {

            return $this->failure(
                message: $th->getMessage(),
                status: 500
            );
        }
    }
}
