<?php

namespace App\Http\Controllers;

use App\Models\RawUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $rawUsers = RawUser::all();
        return view('admin.user.index', compact('users', 'rawUsers'));
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){

        $validated = $request->validate(['name' => 'required', 'surname' => 'required', 'role' => 'required', 'unique_code' => 'required']);

        RawUser::create($validated);

        return redirect('/admin/users');


    }
    public function show($id){

    }
    public function edit($id){

    }
    public function update(Request $request, $id){

    }
    public function destroy($id){

    }
}
