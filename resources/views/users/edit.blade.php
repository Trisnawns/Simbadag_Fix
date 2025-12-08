@extends('layouts.app')

@section('content')

@section('title', 'Edit User')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 id="header-title" class="text-3xl font-bold text-blue-600 mb-1">Edit User</h2>
            <p id="welcome-message" class="text-gray-500">Pastikan datanya benar, jangan bikin drama baru.</p>
        </div>
    </div>
@endsection

<section id="section-edit" class="page-section active">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl p-6 card-shadow">
            <h3 class="text-xl font-semibold mb-4">Edit User</h3>

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="text-sm text-gray-600 font-medium">Username</label>
                    <input 
                        name="username"
                        value="{{ old('username', $user->username) }}"
                        class="mt-2 w-full border rounded-lg px-3 py-2"
                        required 
                    />
                </div>

                <div>
                    <label class="text-sm text-gray-600 font-medium">Role</label>
                    <select name="role" class="mt-2 w-full border rounded-lg px-3 py-2" required>
                        <option value="">Pilih Role</option>
                        <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="manager" {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>Manager</option>
                        <option value="owner" {{ old('role', $user->role) == 'owner' ? 'selected' : '' }}>Owner</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-600 font-medium">Password Baru</label>
                    <input 
                        name="password"
                        type="password"
                        class="mt-2 w-full border rounded-lg px-3 py-2"
                        placeholder="Biarkan kosong jika tidak diganti"
                    />
                </div>

                <div>
                    <label class="text-sm text-gray-600 font-medium">Konfirmasi Password</label>
                    <input 
                        name="password_confirmation"
                        type="password"
                        class="mt-2 w-full border rounded-lg px-3 py-2"
                        placeholder="Ulangi password"
                    />
                </div>

            </div>

            <div class="mt-6 flex space-x-3">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700">
                    Update User
                </button>
                <a href="{{ route('users.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Kembali
                </a>
            </div>
        </div>
    </form>
</section>

@endsection
