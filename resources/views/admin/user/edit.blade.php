
@extends('layouts.admin.app')

@section('content')
<div class="py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 mb-1">Edit User</h2>
            <p class="text-gray-700 mb-0">Perbarui informasi pengguna.</p>
        </div>

        <a href="{{ route('user.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card border-0 shadow">
        <div class="card-header">
            <h5 class="mb-0">Form Edit User</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Kosongkan jika tidak ingin mengganti password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select
                        name="role"
                        id="role"
                        class="form-select @error('role') is-invalid @enderror"
                        required
                    >
                        <option value="">-- Pilih Role --</option>

                        <option value="Super Admin"
                            {{ old('role', $user->role) == 'Super Admin' ? 'selected' : '' }}>
                            Super Admin
                        </option>

                        <option value="Pelanggan"
                            {{ old('role', $user->role) == 'Pelanggan' ? 'selected' : '' }}>
                            Pelanggan
                        </option>

                        <option value="Mitra"
                            {{ old('role', $user->role) == 'Mitra' ? 'selected' : '' }}>
                            Mitra
                        </option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
