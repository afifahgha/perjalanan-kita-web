@extends('front.layout.template')

@section('content')
    <!-- Page content-->
    <div class="container mt-4">
        <div class="mb-3">
            <form action="{{ route('category.search') }}" method="post">
                @csrf
                <input type="hidden" name="category_slug" value="{{ $category->slug }}">
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search Article..."/>
                    <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                </div>
            </form>
        </div>

        @if ($keyword)
            <a href="{{ url('/articles') }}" class="btn btn-secondary btn-sm ms-auto mb-2">Reset</a>
        @endif

        <div class="row">
            @forelse ( $articles as $item )
                <div class="col-4">
                        <div class="card mb-4 shadow-sm" data-aos="fade-up">
                        <a href="{{ url('post/'.$item->slug) }}">
                            <img class="card-img-top post-img" src="{{ asset('storage/public/back/'. $item->image) }}" alt="..." />
                        </a>
                        <div class="card-body card-height">
                            <div class="small text-muted">{{ $item->created_at->format('d-m-Y') }} | {{ $item->User->name }}</div>
                            <div class="small text-muted">{{ $item->category->name }}</div>
                            <h2 class="card-title h4">{{ $item->name }}</h2>
                            <p class="card-text">{{ Str::limit(strip_tags($item->desc), 150) }}</p>
                            <a class="btn btn-primary card-btn" href="{{ url('post/'.$item->slug) }}">Read more →</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Not Found</p>
            @endforelse
        </div>
        <!-- Pagination-->
        <div class="pagination justify-content-center my-4">
            {{ $articles->links() }}
        </div>
    </div>
@endsection