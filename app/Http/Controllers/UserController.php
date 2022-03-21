<?php

namespace App\Http\Controllers;
use App\Http\Requests\createUser;
use App\Http\Requests\deleteUser;
use App\Http\Requests\displayUser;
use App\Http\Requests\loginUser;
use App\Http\Requests\updateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login (loginUser $request){

        $validated = $request->validated();

        $user = User::where('email', [$request['email']])->first();

        if (!$user || ! Hash::check($request['password'], $user->password)){
            return  ['message' => 'Fail'];
        }else{
            return  [
                'message' => 'Success',
                'id' => $user->id,
                'type' => $user->type
            ];
        }
    }

    public function displayUser(displayUser $request){

        $user = User::find($request->id);
        return $user;
    }

    public function displayAllUsers(){
        $users = User::all();
        return $users;
    }

    public function displayBrands(){
            $users = User::where('type', 'Marque')->get();
        return $users;
    }

    public function displayAllUsersASC(){
        $users = User::orderBy('created_at')->get();
        return $users;
    }

    public function displayAllUsersDESC(){
        $users = User::orderByDesc('created_at')->get();
        return $users;
    }

    public function deleteUser(deleteUser $request){

        $validated = $request->validated();

        $user = User::find($request->id);

            $user->delete();

    }

    public function updateUser(updateUser $request){

        $validated = $request->validated();

        $user = User::find($request->id);

        if($request->password == ""){
            $request->password = $user->password;
        }else{
            $request->password = Hash::make($request->password);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'RC' => $request->RC,
            'NIF' => $request->NIF,
            'NIS' => $request->NIS,
            'AI' => $request->AI
        ]);
    }

    public function updateOneUser(updateUser $request){

        $validated = $request->validated();

        $user = User::find($request->id);

        if($request->password == ""){
            $request->password = $user->password;
            $request->password = $user->password;
        }else{
            $request->password = Hash::make($request->password);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'password' => $request->password,
            'RC' => $request->RC,
            'NIF' => $request->NIF,
            'NIS' => $request->NIS,
            'AI' => $request->AI
        ]);
    }

    public function createUser(createUser $request){

        $validated = $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'phone' => $request->phone,
            'RC' => $request->RC,
            'NIF' => $request->NIF,
            'NIS' => $request->NIS,
            'AI' => $request->AI
        ]);
    }

}
