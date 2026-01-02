@extends('back.layout.template')

@section('content')
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Articles</h1>
      </div>

    <div class="mt-3">
            @if ($errors->any())
            <div class="my-3">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
            </div>
            </div>
        @endif

        <form action="{{ url('article/'.$article->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input type="hidden" name="old_image" value="{{ $article->image }}">

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="name">Title</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $article->name) }}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $item)
                                @if ($item->id == $article->category_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>  
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="desc">Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{ old('desc', $article->desc) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image">Image (Max 2MB)</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <div class="mt-1">
                        <small>Old Picture</small><br>
                        <img src="{{ asset('storage/public/back/'.$article->image) }}" alt="" width="100px">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="publish_date">Publish Date</label>
                    <input type="date" name="publish_date" id="publish_date" class="form-control" value="{{ old('publish_date', $article->publish_date) }}">
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

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
@endpush