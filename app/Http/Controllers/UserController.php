<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userRepository;
    
    public function index()
    {
        $users = User::get();
        return $users;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required| min:6'
        ]);

        if ($validator->fails()) {
            return $validator->message();
        }
        $data = $request->all();
        return User::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
    }
}
