
@extends('layouts.admin.app')

@section('content')

<style>
    /* GIRLY PINK THEME */
    .pink-page {
        --pink: #e98aaa;
        --pink-dark: #d96f96;
        --pink-light: #fff0f5;
        --purple-light: #f4efff;
    }

    .pink-page .page-title {
        color: #bd6689;
        font-weight: 700;
    }

    .pink-page .subtitle {
        color: #a78b98;
    }

    .pink-page .breadcrumb-item,
    .pink-page .breadcrumb-item a {
        color: #d17c9d;
    }

    .pink-page .main-card {
        border: 1px solid #f8dce7;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(220, 140, 170, 0.12);
    }

    .pink-page .card-header-pink {
        background: linear-gradient(120deg, #fff0f5, #f9f0ff);
        border-bottom: 1px solid #f8dce7;
        padding: 20px;
    }

    .pink-page .btn-pink {
        background: linear-gradient(135deg, #e995b2, #d77da0);
        border: none;
        color: white;
        border-radius: 12px;
        padding: 10px 18px;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(217, 111, 150, 0.2);
        transition: 0.3s;
    }

    .pink-page .btn-pink:hover {
        background: #d96f96;
        color: white;
        transform: translateY(-2px);
    }

    .pink-page .total-badge {
        background: #ffe3ed;
        color: #c45f86;
        border-radius: 20px;
        padding: 9px 15px;
        font-weight: 600;
    }

    .pink-page table thead th {
        background: #fff5f8;
        color: #bd6689;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 12px;
        white-space: nowrap;
    }

    .pink-page table tbody td {
        padding: 15px 12px;
        color: #806b76;
        border-color: #fceaf0;
        font-size: 13px;
        vertical-align: middle;
    }

    .pink-page table tbody tr:hover {
        background: #fff8fa;
    }

    .pink-page .customer-name {
        color: #bd6689;
        font-weight: 700;
    }

    .pink-page .gender-male {
        background: #e8f3ff;
        color: #6595c5;
        border-radius: 20px;
        padding: 6px 12px;
    }

    .pink-page .gender-female {
        background: #ffe3ed;
        color: #d16d96;
        border-radius: 20px;
        padding: 6px 12px;
    }

    .pink-page .btn-edit {
        background: #f0eaff;
        color: #9b83cc;
        border: none;
        border-radius: 9px;
    }

    .pink-page .btn-edit:hover {
        background: #dfd3ff;
        color: #8066b8;
    }

    .pink-page .btn-delete {
        background: #ffe5eb;
        color: #dc7895;
        border: none;
        border-radius: 9px;
    }

    .pink-page .btn-delete:hover {
        background: #ffd0dc;
        color: #c95c7c;
    }

    .pink-page .empty-state {
        color: #d58aa5;
        padding: 45px 15px;
    }

    .pink-page .pagination .page-link {
        color: #ce799a;
        border-color: #f8dce7;
    }

    .pink-page .pagination .page-item.active .page-link {
        background: #e995b2;
        border-color: #e995b2;
        color: white;
    }

    .pink-page .pagination .page-link:hover {
        background: #fff0f5;
    }

    .pink-page .decoration {
        color: #e9a1bb;
    }
</style>

<div class="pink-page">

    <div class="py-4">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent mb-0">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="fas fa-home decoration"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Data Pelanggan
                </li>
            </ol>
        </nav>

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

            <div>
                <h1 class="h4 page-title mb-2">
                    <i class="fas fa-heart decoration me-2"></i>
                    Data Pelanggan
                    <i class="fas fa-heart decoration ms-1"></i>
                </h1>

                <p class="subtitle mb-0">
                    Manage your lovely customers with love! ♡
                </p>
            </div>

            <a href="{{ route('pelanggan.create') }}"
               class="btn btn-pink mt-3 mt-md-0">
                <i class="fas fa-plus me-2"></i>
                Tambah Pelanggan
                <i class="fas fa-heart ms-1"></i>
            </a>

        </div>

        {{-- Main Card --}}
        <div class="row">
            <div class="col-12 mb-4">

                <div class="card main-card border-0">

                    {{-- Card Header --}}
                    <div class="card-header-pink">

                        <div class="d-flex justify-content-between align-items-center flex-wrap">

                            <div>
                                <h5 class="mb-1 fw-bold" style="color:#bd6689;">
                                    <i class="fas fa-heart me-2"></i>
                                    Lovely Customer List
                                </h5>

                                <small style="color:#b18c9d;">
                                    Here are all your lovely customers ♡
                                </small>
                            </div>

                            <span class="total-badge mt-2 mt-md-0">
                                <i class="fas fa-users me-1"></i>
                                {{ $dataPelanggan->total() }} Customers
                                <i class="fas fa-heart ms-1"></i>
                            </span>

                        </div>

                    </div>

                    {{-- Card Body --}}
                    <div class="card-body p-3 p-md-4">

                        <div class="table-responsive">
                            <form method="GET"
      action="{{ route('pelanggan.index') }}"
      class="mb-3">

<div class="row">
    <div class="col-md-3">
        <label class="form-label fw-bold" style="color:#bd6689;">
            <i class="fas fa-filter me-1"></i>
            Filter Gender
        </label>

        <select name="gender"
                class="form-select"
                onchange="this.form.submit()">
            <option value="">All</option>
            <option value="Male"
                {{ request('gender') == 'Male' ? 'selected' : '' }}>
                Male
            </option>
            <option value="Female"
                {{ request('gender') == 'Female' ? 'selected' : '' }}>
                Female
            </option>
        </select>
    </div>
</div>

<div class="row">
    {{-- Filter Gender --}}
    <div class="col-md-3">
        <label class="form-label fw-bold" style="color:#bd6689;">
            <i class="fas fa-filter me-1"></i>
            Filter Gender
        </label>

        <select name="gender"
                class="form-select"
                onchange="this.form.submit()">
            <option value="">All</option>

            <option value="Male"
                {{ request('gender') == 'Male' ? 'selected' : '' }}>
                Male
            </option>

            <option value="Female"
                {{ request('gender') == 'Female' ? 'selected' : '' }}>
                Female
            </option>
        </select>
    </div>

    {{-- Search --}}
    <div class="col-md-3">
        <label class="form-label fw-bold" style="color:#bd6689;">
            <i class="fas fa-search me-1"></i>
            Search Pelanggan
        </label>

        <div class="input-group">
            <input type="text"
                   name="search"
                   class="form-control"
                   value="{{ request('search') }}"
                   placeholder="Search">

            <button type="submit" class="input-group-text">
                <i class="fas fa-search"></i>
            </button>

            @if(request('search'))
                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                   class="btn btn-outline-secondary ms-2">
                    Clear
                </a>
            @endif
        </div>
    </div>
</div>
</form>


</form>
                            <table id="table-pelanggan"
                                   class="table table-hover align-middle mb-0">

                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Birthday</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse($dataPelanggan as $item)

                                    <tr>

                                        {{-- Nomor --}}
                                        <td>
                                            {{ $dataPelanggan->firstItem() + $loop->index }}
                                        </td>

                                        {{-- First Name --}}
                                        <td class="customer-name">
                                            <i class="fas fa-heart decoration me-1"></i>
                                            {{ $item->first_name }}
                                        </td>

                                        {{-- Last Name --}}
                                        <td>
                                            {{ $item->last_name }}
                                        </td>

                                        {{-- Birthday --}}
                                        <td>
                                            <i class="fas fa-gift decoration me-1"></i>
                                            {{ $item->birthday }}
                                        </td>

                                        {{-- Gender --}}
                                        <td>
                                            @if($item->gender == 'Male')
                                                <span class="gender-male">
                                                    <i class="fas fa-mars me-1"></i>
                                                    Male
                                                </span>
                                            @elseif($item->gender == 'Female')
                                                <span class="gender-female">
                                                    <i class="fas fa-venus me-1"></i>
                                                    Female
                                                </span>
                                            @else
                                                <span class="badge bg-light text-secondary">
                                                    {{ $item->gender }}
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Email --}}
                                        <td>
                                            <i class="far fa-envelope decoration me-1"></i>
                                            {{ $item->email }}
                                        </td>

                                        {{-- Phone --}}
                                        <td>
                                            <i class="fas fa-phone decoration me-1"></i>
                                            {{ $item->phone }}
                                        </td>

                                        {{-- Action --}}
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">

                                                {{-- Edit --}}
                                                <a href="{{ route('pelanggan.edit', ['pelanggan' => $item->pelanggan_id]) }}"
                                                   class="btn btn-sm btn-edit"
                                                   title="Edit Pelanggan">
                                                    <i class="fas fa-pen"></i>
                                                </a>

                                                {{-- Delete --}}
                                                <form action="{{ route('pelanggan.destroy', ['pelanggan' => $item->pelanggan_id]) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this lovely customer?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-sm btn-delete"
                                                            title="Hapus Pelanggan">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                </form>

                                            </div>
                                        </td>

                                    </tr>

                                    @empty

                                    {{-- Empty State --}}
                                    <tr>
                                        <td colspan="8" class="text-center empty-state">

                                            <i class="fas fa-heart fa-3x mb-3"></i>

                                            <h5 class="fw-bold">
                                                Oops! No Customers Yet ♡
                                            </h5>

                                            <p class="mb-0">
                                                Belum ada data pelanggan.
                                                Yuk, tambahkan pelanggan pertamamu!
                                            </p>

                                        </td>
                                    </tr>

                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-between align-items-center flex-wrap mt-4">

                            <small class="subtitle mb-2">
                                Showing
                                {{ $dataPelanggan->firstItem() ?? 0 }}
                                -
                                {{ $dataPelanggan->lastItem() ?? 0 }}
                                of
                                {{ $dataPelanggan->total() }} customers
                                <i class="fas fa-heart decoration ms-1"></i>
                            </small>

                            <div>
                                {{ $dataPelanggan->links('pagination::bootstrap-5') }}
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        {{-- Footer Decoration --}}
        <div class="text-center mt-2 mb-3">
            <small style="color:#d99ab1;">
                Made with <i class="fas fa-heart"></i> for lovely customers ♡
            </small>
        </div>

    </div>

</div>

@endsection
