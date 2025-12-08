<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function table(Request $request)
    {
        $search = $request->search ?? null;

        $users = User::where('username' , 'like', "%{$search}%")->get();

        return view('users.index', compact('users'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }

    public function login(Request $request)
    {
        // Validate the incoming request data
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) { 
            // Authentication passed, redirect to intended page
            return redirect()->route('dashboard.index');
        }

        // Authentication failed, redirect back with error message
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:255|unique:users,username',
                'role' => 'required|in:staff,admin,manager,owner',
                'password' => 'required|string|min:6|confirmed',
            ]);

            User::create([
                'username' => $request->username,
                'role' => $request->role,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('users.index')
                ->with('success', 'User berhasil ditambahkan.');

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validasi gagal, tetap balikin ke form dengan error
            return back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {

            // Kesalahan lain yang entah muncul dari mana
            return back()->with('error', 'Terjadi kesalahan saat menambahkan user.')
                        ->withInput();
        }
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
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $request->validate([
                'username' => 'required|string|max:255|unique:users,username,' . $id,
                'role' => 'required|in:staff,admin,manager,owner',
                'password' => 'nullable|string|min:6|confirmed',
            ]);

            $user->username = $request->username;
            $user->role = $request->role;

            // Password hanya di-update kalau diisi
            if (!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect()->route('users.index')
                ->with('success', 'User berhasil diperbarui.');

        } catch (\Illuminate\Validation\ValidationException $e) {

            return back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {

            return back()->with('error', 'Terjadi kesalahan saat memperbarui user.')
                        ->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            if (auth()->user()->id == $user->id) {
                return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
            }
            $user->delete();

            return redirect()->route('users.index')
                ->with('success', 'User berhasil dihapus.');

        } catch (\Exception $e) {

            return back()->with('error', 'Terjadi kesalahan saat menghapus user.');
        }
    }
}
