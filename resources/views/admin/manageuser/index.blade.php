@extends('layouts.app')
@section('title', 'Kelola User & Admin')
@section('content')
    <div class="page-heading">
        <h3>Kelola User & Admin</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4>Daftar User</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ in_array($user->email, ['admin@example', 'admin@gmail.com']) ? 'Admin' : 'User' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.manageuser.edit', $user->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        @if ($user->id !== auth()->id())
                                            <form action="{{ route('admin.manageuser.destroy', $user->id) }}" method="POST"
                                                style="display:inline-block"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        @endif
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

@push('scripts')
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script>
@endpush
