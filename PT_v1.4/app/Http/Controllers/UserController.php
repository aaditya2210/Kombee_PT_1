<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
{
    $users = User::paginate(10); // Fetch users with pagination
    return view('users.index', compact('users'));
}

    public function create()
    {
        $roles = Role::all(); 
        return view('users.create', compact('roles'));
        // return view('users.create');
    }

    public function store(Request $request)
    {
        //dd('Request received'); // Debugging line

        try {
            $request->validate([
                'first_name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
                'contact_number' => 'required|digits:10',
                'postcode' => 'required|digits:6', 
                'gender' => 'required', 
                'hobbies' => 'required|array', 
                'role' => 'required|array', 'files' => 'required|array',
                 'files.*' => 'file|mimes:jpeg,png,pdf,doc,docx|max:2048',
                'state_id' => 'required|exists:states,id',
                'city_id' => 'required|exists:cities,id',
            ]);
    
            //dd('Validation passed, creating user...'); // Debugging line
        } catch (ValidationException $e) {
            dd($e->errors()); // Print validation errors
        }





        $fileNames = []; 
        if ($request->hasFile('files')) { 
            foreach ($request->file('files') as $file) { 
                $fileName = $file->getClientOriginalName(); 
                $file->storeAs('uploads', $fileName);
                 $fileNames[] = $fileName; 
                } 
            }


        //dd('Validation passed, creating user...');



        // dd([ 
        //     'first_name' => $request->first_name, 
        //     'last_name' => $request->last_name, 
        //     'email' => $request->email, 
        //     'password' => Hash::make($request->password),
        //      'contact_number' => $request->contact_number, 
        //      'postcode' => $request->postcode, 
        //      'gender' => $request->gender,
        //       'hobbies' => json_encode($request->hobbies), 
        //       'role' => json_encode($request->role), 
        //       'files' => json_encode($fileNames),
        //        'state_id' => $request->state_id,
        //         'city_id' => $request->city_id,
        //      ]);








        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact_number' => $request->contact_number,
            'postcode' => $request->postcode,
            'gender' => $request->gender,
            'hobbies' => json_encode($request->hobbies),
            'role' => json_encode($request->role),
            'files' => json_encode($fileNames),
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,

            
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'first_name' => 'required|alpha',
        'last_name' => 'required|alpha',
        'email' => 'required|email',
        'contact_number' => 'required|numeric',
        'state_id' => 'required|exists:states,id', 
        'city_id' => 'required|exists:cities,id'
    ]);

    $user = User::findOrFail($id);
    $user->update($request->all());

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}
}
