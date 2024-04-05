<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{


    public function storeSession(Request $request)
    {
        $ipAddress = $request->ip();
        if (Session::has('rate_limit_' . $ipAddress)) {
            return view('session')->with('error', 'Rate limit exceeded');

        }
        Session::put('rate_limit_' . $ipAddress, true);
    }



    public function clearSession()
    {
        $ipAddress = request()->ip();
        $key = 'rate_limit_' . $ipAddress;

        Session::forget($key);

        // Optionally, you can check if the key still exists after removal
        if (Session::has($key)) {
            return response()->json(['error' => 'Failed to clear session']);
        }

        return response()->json(['success' => 'Session cleared']);
    }

}
