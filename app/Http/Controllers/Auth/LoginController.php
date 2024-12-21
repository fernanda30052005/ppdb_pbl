<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(auth()->attempt($request->only(['email', 'password']))) {

            $user = auth()->user();
            if ($user->role === 'admin') {
                alert()->success('Success Message', 'Selamat datang ' .$user->name);
                return redirect()->route('admin.dashboard.index');
            } 
            elseif ($user->role === 'user') {
                // alert()->success('Success Message', 'Selamat datang ' .$user->name);
                return redirect()->route('dashboard.index');
            } 
            elseif ($user->role === 'umkm') {
                // alert()->success('Success Message', 'Selamat datang ' .$user->name);
                return redirect()->route('umkm.dashboard.index');
            } 
        }

        alert()->error('Error Message', 'Wrong Email or Password');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        Auth::logout();
        return redirect()->route('dashboard.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
