<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LIST USER
    public function kelolauser()
    {
        $users = User::latest()->paginate(10);
        return view('dashboard.superadmin.kelolauser', compact('users'));
    }

    // FORM TAMBAH USER
    public function create()
    {
        return view('dashboard.superadmin.kelolauser.create');
    }

    // SIMPAN USER BARU
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'username'     => 'required|string|max:255|unique:users,username',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:6',
            'role'         => 'required',
            'spesialisasi' => 'nullable|string|max:255',
        ]);

        User::create([
            'name'         => $request->name,
            'username'     => $request->username,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'role'         => $request->role,
            'spesialisasi' => $request->spesialisasi,
        ]);

        return redirect()
            ->route('dashboard.superadmin.kelolauser')
            ->with('success', 'User berhasil ditambahkan');
    }

    // DETAIL USER
    public function show(User $user)
    {
    return view('dashboard.superadmin.kelolauser.read', compact('user'));
    }

    // FORM EDIT USER
    public function edit(User $user)
    {
    return view('dashboard.superadmin.kelolauser.edit', compact('user'));
    }

    // UPDATE USER
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'username'     => 'required|string|max:255|unique:users,username,' . $user->id,
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'role'         => 'required',
            'spesialisasi' => 'nullable|string|max:255',
        ]);

        $user->update($validated);

        return redirect()
            ->route('dashboard.superadmin.kelolauser')
            ->with('success', 'User berhasil diperbarui');
    }
    
    // HAPUS USER
    public function destroy(User $user)
    {
        if ($user->role === 'super_admin') {
            return back()->with('error', 'Super Admin tidak bisa dihapus');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus');
    }
}
