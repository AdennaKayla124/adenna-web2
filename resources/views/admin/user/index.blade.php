@extends('layouts.admin.app') {{-- Sesuaikan dengan nama layout master Anda jika bukan 'layouts.app' --}}

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
            </ol>
        </nav>
        <h2 class="h4">Data User</h2>
        <p class="mb-0">List data seluruh user.</p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('user.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://w3.org"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Tambah User
        </a>
    </div>
</div>

<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="border-gray-200">NO</th>
                <th class="border-gray-200">NAME</th>
                <th class="border-gray-200">EMAIL</th>
                <th class="border-gray-200">PASSWORD</th>
                <th class="border-gray-200">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataUser as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><span class="fw-normal">{{ $row->name }}</span></td>
                <td><span class="fw-normal">{{ $row->email }}</span></td>
                <td><span class="fw-normal text-wrap" style="max-width: 200px; display: inline-block; word-break: break-all;">{{ $row->password }}</span></td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('user.edit', $row->id) }}" class="btn btn-sm btn-info text-white me-2">
                            <span class="fas fa-edit me-1"></span> Edit
                        </a>
                        <form action="{{ route('user.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <span class="fas fa-trash-alt me-1"></span> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data user.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
