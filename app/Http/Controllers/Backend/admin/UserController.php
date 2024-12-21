<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::where('role', 'user')->get();                                                         
    
        return view('pages.backend.admin.user.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backend.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request);
    
        $data = $request->validated();
    
        $data['password'] = bcrypt($data['password']);
    
        User::create($data);

        alert()->success('Berhasil', 'data ditambahkan' );
    
        return redirect()->route('admin.user.index');
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
    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.backend.admin.user.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->validated();

        $item = User::findOrFail($id);

        if ($request->input('password') != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $item->password;
        }

        $item->update($data);

        alert()->success('Berhasil', 'data diperbarui' );

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        alert()->success('Berhasil', 'data dihapus' );

        return redirect()->route('admin.user.index');
    }
}
