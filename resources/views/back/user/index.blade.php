@extends('back.layout.template')

@section('content')
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
      </div>

    <div class="mt-3">
        @if (auth()->user()->role == 1)
        <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Register</button>
        @endif

        @if ($errors->any())
            <div class="my-3">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
            </div>
            </div>
        @endif

        @if(session('success'))
        <div class="my-3">
                <div class="alert alert-success">
                    {{ session('success') }}
            </div>
            </div>
        @endif

        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($users as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="text-center">{{ $item->email }}</td>
                    <td>
                        <div class="text-center">
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $item->id }}">Edit</button>

                            {{-- Jika yang login memiliki role = 1 atau admin--}}
                            @if (auth()->user()->role == 1)
                                {{-- Pastikan siapapun yang login, dia ga bisa hapus dirinya sendiri --}}
                                @if ($item->id != auth()->user()->id)
                                {{-- Tombol delete akan tampil jika admin login, tapi ga bisa hapus dirinya sendiri --}}
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}">Delete</button>
                                @endif
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    {{-- Panggil modal create user --}}
    @include('back.user.create-modal')

    {{-- Panggil modal delete user --}}
    @include('back.user.delete-modal')

    {{-- Panggil modal update user --}}
    @include('back.user.update-modal')
    
 </main>
@endsection