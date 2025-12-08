@extends('layouts.app')

@section('content')

@section('title', 'Tambah User')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h2 id="header-title" class="text-3xl font-bold text-blue-600 mb-1">Tambah User</h2>
            <p id="welcome-message" class="text-gray-500">Isi dengan benar, jangan bikin masalah baru.</p>
        </div>
    </div>
@endsection

<section id="section-create" class="page-section active">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="bg-white rounded-2xl p-6 card-shadow">
            <h3 class="text-xl font-semibold mb-4">Form Tambah User</h3>

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
                        value="{{ old('username') }}"
                        class="mt-2 w-full border rounded-lg px-3 py-2"
                        required
                    />
                </div>

                <div>
                    <label class="text-sm text-gray-600 font-medium">Role</label>
                    <select name="role" class="mt-2 w-full border rounded-lg px-3 py-2" required>
                        <option value="">Pilih Role</option>
                        <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                        <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>Owner</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-600 font-medium">Password</label>
                    <input 
                        name="password"
                        type="password"
                        class="mt-2 w-full border rounded-lg px-3 py-2"
                        required
                    />
                </div>

                <div>
                    <label class="text-sm text-gray-600 font-medium">Konfirmasi Password</label>
                    <input 
                        name="password_confirmation"
                        type="password"
                        class="mt-2 w-full border rounded-lg px-3 py-2"
                        required
                    />
                </div>

            </div>

            <div class="mt-6 flex space-x-3">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700">
                    Simpan User
                </button>
                <a href="{{ route('users.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Batal
                </a>
            </div>
        </div>
    </form>
</section>

@endsection
