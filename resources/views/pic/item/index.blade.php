@extends('layouts.app')

@section('title', 'ACC Barang')

@section('content')
    <div class="page-heading">
        <h3>ACC Data Barang</h3>
    </div>

    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Barang Menunggu ACC</h4>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Checker</th>
                                <th>Tanggal Input</th>
                                <th>Deadline ACC</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->user->name ?? '-' }}</td>
                                    <td>{{ $item->tanggal_input->format('d-m-Y') }}</td>
                                    <td>{{ $item->deadline_acc->format('d-m-Y') }}</td>
                                    <td>
                                        @if ($item->tanggal_acc)
                                            <span class="badge bg-success">Sudah ACC</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Menunggu ACC</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$item->tanggal_acc)
                                            <form action="{{ route('pic.item.approve', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-sm btn-success"
                                                    onclick="return confirm('Yakin ingin ACC barang ini?')">
                                                    ACC
                                                </button>
                                            </form>
                                        @else
                                            <button class="btn btn-sm btn-secondary" disabled>
                                                ACC
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        Tidak ada data menunggu ACC
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
