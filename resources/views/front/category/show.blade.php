@extends('front.layout.template')

@section('content')
        <!-- Page content-->
        <div class="container mt-4">
            <div>
                <div class="card mb-4 shadow-sm">
                    <a>
                        <img class="card-img-top featured-img" src="{{ asset('storage/public/back/'. $article->image) }}" alt="..." />
                    </a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $article->created_at->format('d-m-Y') }} | {{ $article->User->name }}</div>
                        <div class="small text-muted">{{ $article->category->name }}</div>
                        <h2 class="card-title">{{ $article->name }}</h2>
                        <p class="card-text">
                            {!! $article->desc !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
@endsection