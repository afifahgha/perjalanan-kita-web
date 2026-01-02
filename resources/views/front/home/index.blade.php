@extends('front.layout.template')

@section('pageheader')
    @include('front.layout.pageheader')
@endsection

@section('content')
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4 shadow-sm" data-aos="fade-in">
                        <a href="{{ url('post/'.$latest_post->slug) }}">
                            <img class="card-img-top featured-img" src="{{ asset('storage/public/back/'. $latest_post->image) }}" alt="..." />
                        </a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $latest_post->created_at->format('d-m-Y') }} | {{ $latest_post->User->name }}</div>
                            <div class="small text-muted">{{ $latest_post->category->name }}</div>
                            <h2 class="card-title">{{ $latest_post->name }}</h2>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($latest_post->desc), 150) }}
                            </p>
                            <a class="btn btn-primary" href="{{ url('post/'.$latest_post->slug) }}">Read more →</a>
                        </div>
                    </div>
                    
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        @foreach ($articles as $item)
                            <div class="col-lg-6" data-aos="fade-up">
                            <!-- Blog post-->
                            <div class="card mb-4 shadow-sm">
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
                        @endforeach 
                    </div>
                    <!-- Pagination-->
                    <div class="pagination justify-content-center my-4">
                        {{ $articles->links() }}
                    </div>
                </div>
                <!-- Side widgets-->
                @include('front.layout.sidewidget')
            </div>
        </div>
@endsection

@section('footer')
    @include('front.layout.footer')
@endsection