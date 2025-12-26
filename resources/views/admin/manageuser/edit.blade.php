@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="page-heading">
        <h3>Edit User</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data User</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.manageuser.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru <small>(Kosongkan jika tidak ingin
                                mengubah)</small></label>
                        <input type="password" class="form-control" id="password" name="password"
                            autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        Batal
                    </a>

                </form>
            </div>
        </div>
    </div>
@endsection
