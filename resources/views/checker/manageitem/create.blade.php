@extends('layouts.app')

@section('title', 'Tambah Data Barang')

@section('content')
<div class="page-heading">
    <h3>Tambah Data Barang</h3>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-header">
            <h4>Form Tambah Barang</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('checker.manageitem.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    {{-- <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">-- Pilih User --</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" id="kode_barang" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_input" class="form-label">Tanggal Input</label>
                    <input type="date" name="tanggal_input" id="tanggal_input" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_acc" class="form-label">Tanggal ACC</label>
                    <input type="date" name="tanggal_acc" id="tanggal_acc" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="deadline_acc" class="form-label">Deadline ACC</label>
                    <input type="date" name="deadline_acc" id="deadline_acc" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('checker.manageitem.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
