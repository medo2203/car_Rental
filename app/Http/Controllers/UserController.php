<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::all();
        return view('User.profile', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('User.edit');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'username' => 'required|string|max:255',
            'fullName' => ['required', 'string', 'regex:/^[a-zA-Z]+\s[a-zA-Z]+$/'],
            'email' => 'required|email',
            'age' => 'required|integer|gt:18|lt:100',
            'CIN' => 'required|regex:/^[a-zA-Z]{2}[0-9]{0,10}$/',
        ];

        // Add validation rules for the file upload
        if ($request->hasFile('profile_image')) {
            $rules['profile_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
        $validatedData = $request->validate($rules);
        
        $user = User::findOrFAil($id);

        $user->fullName = $request->input('fullName');
        $user->age = $request->input('age');
        $user->CIN = $request ->input('CIN');

        if ($request->hasFile('photo')) {
            $rules['profile_image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $fileName = time() . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $requestData["photo"] = '/storage/' . $path;
            if ($user->photo !== null && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }
        } else {
            $requestData["photo"] = $user->photo;
        }
        $user->update($requestData);
        return redirect(route('User.show', $id))->with('flash_message', 'Member Updated!');
    }
    /**
     * Update the specified resource in storage.
     */
    
    public function destroy(string $id)
    {
        //
    }
}
