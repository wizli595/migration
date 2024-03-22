<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MigrationController extends Controller
{
    public function index()
    {
        // $users = DB::select('select * from users');
        $users = DB::table("users")->get();

        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function addUser(Request $request)
    {

        $userData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $name = $userData['name'];
        $email = $userData['email'];
        $password = bcrypt($userData['password']);
        DB::insert('insert into users (name, email,password) values (?, ?,?)', [$name, $email, $password]);

        // DB::table('users')->insert([
        //     'name' => $name,
        //     'email' => $email,
        // ]);

        return redirect('/user')->with('success', 'User created successfully!');
    }
    public function edit(String $id)
    {
        $user = DB::select('select * from users where id =?', [$id]);
        // $user =DB::table('users')->where('id','=',$id)->get();
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, String $id)
    {
        $userData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|required|min:6',
        ]);


        $name = $userData['name'];
        $email = $userData['email'];

        $password = isset($userData['password']) ? bcrypt($userData['password']) : null;

        $sql = 'update users set name = ?, email = ?' . ($password ? ', password = ?' : '') . ' where id = ?';
        $parameters = [$name, $email];
        if ($password) $parameters[] = $password;
        $parameters[] = $id;


        DB::update($sql, $parameters);

        // $updateData = [
        //     'name' => $userData['name'],
        //     'email' => $userData['email'],
        // ];
        // if (isset($userData['password'])) {
        //     $updateData['password'] = bcrypt($userData['password']);
        // }

        // DB::table('users')->where('id', $id)->update($updateData);

        return redirect('/user')->with('success', 'User updated successfully!');
    }
    public function delete($id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        // DB::table('user')->delete($id);
        return redirect('/user')->with('success', 'User deleted successfully!');
    }
}
