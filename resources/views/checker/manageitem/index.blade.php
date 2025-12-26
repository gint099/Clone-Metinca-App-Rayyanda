@extends('layouts.app')

@section('title', 'Kelola Data Barang')

@section('content')
<div class="page-heading">
    <h3>Kelola Data Barang</h3>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>List Semua Data Barang</h4>
            <a href="{{ route('checker.manageitem.create') }}" class="btn btn-primary">Tambah Barang</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Nama User</th>
                            <th>Tanggal Input</th>
                            <th>Tanggal ACC</th>
                            <th>Deadline ACC</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->user->name ?? '-' }}</td>
                            <td>{{ $item->tanggal_input }}</td>
                            <td>{{ $item->tanggal_acc ?? '-' }}</td>
                            <td>{{ $item->deadline_acc }}</td>
                            <td>
                                <a href="{{ route('checker.manageitem.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('checker.manageitem.destroy', $item->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
