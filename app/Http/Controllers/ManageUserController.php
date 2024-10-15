<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageUser\StoreNewAkun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users-management.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users-management.add');
    }

    public function store(StoreNewAkun $request)
    {
        $user = new User();
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        return redirect()->route('users-management.index')->with('success', 'Akun Baru berhasil dibuat!');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users-management.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('users-management.index')->with('success', 'Akun berhasil diperbarui!');
    }

    public function disable_user($id)
    {
        $user = User::find($id);
        $user->is_active = false;
        $user->save();

        return redirect()->route('users-management.index')->with('success', 'Akun berhasil dinonaktifkan!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users-management.index')->with('success', 'Akun berhasil dihapus!');
    }
}
