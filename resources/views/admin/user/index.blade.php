
@extends('layouts.admin.app')

@section('content')
<div class="py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 mb-1">Data User</h2>
            <p class="text-gray-700 mb-0">
                List seluruh pengguna sistem.
            </p>
        </div>

        <a href="{{ route('user.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Tambah User
        </a>
    </div>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($dataUser as $user)
                            <tr>
                                <td>{{ $dataUser->firstItem() + $loop->index }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>********</td>

                                <td>
                                    @if ($user->role == 'Super Admin')
                                        <span class="badge bg-danger">
                                            Super Admin
                                        </span>
                                    @elseif ($user->role == 'Pelanggan')
                                        <span class="badge bg-primary">
                                            Pelanggan
                                        </span>
                                    @elseif ($user->role == 'Mitra')
                                        <span class="badge bg-success">
                                            Mitra
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            Belum diatur
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a
                                        href="{{ route('user.edit', $user->id) }}"
                                        class="btn btn-sm btn-info text-white"
                                    >
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form
                                        action="{{ route('user.destroy', $user->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    Belum ada data user.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $dataUser->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
