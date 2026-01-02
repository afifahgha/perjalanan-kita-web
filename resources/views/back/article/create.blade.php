@extends('back.layout.template')

@section('content')
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Articles</h1>
      </div>

    <div class="mt-3">
        @if ($errors->any())
            <div class="my-3">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        <form action="{{ url('article') }}" method="post" enctype="multipart/form-data">
            {{-- csrf ini untuk keamanan web supaya ga ada hacker yang coba masuk --}}
            @csrf 
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="name">Title</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" hidden>-- Choose --</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="myeditor" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image">Image (Max 2MB)</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="publish_date">Publish Date</label>
                    <input type="date" name="publish_date" id="publish_date" class="form-control">
                </div>
            </div>

            <div class="float-end">
                <td>
                    <a href="{{ url('article') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </td>
            </div>
        </form>
        </div>

    </div>
    </main>
@endsection

{{-- Push digunakan untuk mengisi halaman stack supaya halaman utaman tetap rapi --}}
@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
@endpush