@extends('layouts.app')

@section('title', 'Edit Data Barang')

@section('content')
<div class="page-heading">
    <h3>Edit Data Barang</h3>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-header">
            <h4>Form Edit Barang</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('checker.manageitem.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    {{-- <select name="user_id" id="user_id" class="form-control" required>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}" @if($item->user_id == $user->id) selected @endif>{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select> --}}
                </div>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang', $item->nama_barang) }}" required>
                </div>
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ old('kode_barang', $item->kode_barang) }}" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_input" class="form-label">Tanggal Input</label>
                    <input type="date" name="tanggal_input" id="tanggal_input" class="form-control" value="{{ old('tanggal_input', $item->tanggal_input ? $item->tanggal_input->format('Y-m-d') : '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_acc" class="form-label">Tanggal ACC</label>
                    <input type="date" name="tanggal_acc" id="tanggal_acc" class="form-control" value="{{ old('tanggal_acc', $item->tanggal_acc ? $item->tanggal_acc->format('Y-m-d') : '') }}">
                </div>
                <div class="mb-3">
                    <label for="deadline_acc" class="form-label">Deadline ACC</label>
                    <input type="date" name="deadline_acc" id="deadline_acc" class="form-control" value="{{ old('deadline_acc', $item->deadline_acc ? $item->deadline_acc->format('Y-m-d') : '') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('checker.manageitem.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
