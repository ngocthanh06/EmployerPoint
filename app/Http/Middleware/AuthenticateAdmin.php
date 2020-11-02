<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$token = JWTAuth::setRequest($request)->getToken()) {
            return api_errors(config('code.auth.token_absent'), [], 200, ['guard' => config('auth.guard_type.admin')]);
        }

        try {
            $this->authenticateByToken($token);
            if (empty(auth('admin')->user())) {
                throw new \Exception('admin not found');
            }
        } catch (TokenExpiredException $e) {
            // Token was expired but can be refreshed
            return $this->tryToRefreshTokenWhenExpired($request, $next);
        } catch (TokenBlacklistedException $e) {
            return $this->responseTokenBlacklisted();
        } catch (JWTException $e) {
            return $this->responseNeedToLoginAgain();
        } catch (\Exception $e) {
            return $this->responseUserNotFound();
        }

        return $next($request);
    }

    /**
     * Try to refresh token when current token was expired
     */
    private function tryToRefreshTokenWhenExpired($request, Closure $next)
    {
        try {
            $newToken = JWTAuth::refresh();
        } catch (TokenBlacklistedException $e) {
            return $this->responseTokenBlacklisted();
        } catch (JWTException $e) {
            return $this->responseNeedToLoginAgain();
        }

        // Re-authenticate with new token
        $this->authenticateByToken($newToken);

        // Get next response
        $response = $next($request);

        // Attach the token to the response back to the client
        $response->headers->set('Authorization', config('admin.token_type') . $newToken);

        return $response;
    }

    private function responseNeedToLoginAgain()
    {
        return api_errors(config('code.auth.token_invalid'), [], 200, ['guard' => config('auth.guard_type.admin')]);
    }

    private function responseTokenBlacklisted()
    {
        return api_errors(config('code.auth.token_blacklisted'), [], 200, ['guard' => config('auth.guard_type.admin')]);
    }

    private function responseUserNotFound()
    {
        return api_errors(config('code.user.admin_not_found'), [], 200, ['guard' => config('auth.guard_type.admin')]);
    }

    private function authenticateByToken($token)
    {
        Auth::guard('admin')->authenticate($token);
    }
}
