<div class="col-lg-4" data-aos="fade-left">
<!-- Search widget-->
<div class="card mb-4 shadow-sm">
    <div class="card-header">Search</div>
    <div class="card-body">
        <form action="{{ route('article.search') }}" method="post">
            @csrf
            <div class="input-group">
                <input class="form-control" type="text" name="keyword" placeholder="Search Article..."/>
                <button class="btn btn-primary" id="button-search" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

<!-- Categories widget-->
<div class="card mb-4 shadow-sm">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="list-unstyled mb-0">
            @foreach ($categories as $item)
                <span><a href="{{ url('category/'.$item->slug) }}" class="btn btn-primary me-1 mb-2" style="opacity: 1;">{{ $item->name }}</a></span>
            @endforeach
        </div>
    </div>
</div>

{{-- Popular article --}}
<div class="card mb-4 shadow-sm">
    <div class="card-header">Popular Article</div>
    <div class="card-body">
       @foreach ($popular_post as $item)
           <div class="card mb-2">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/public/back/'.$item->image) }}" alt="{{ $item->name }}" class="img-fluid">
                    </div>

                    <div class="col-md-8">
                        <p class="card-title">
                            <a href="{{ route('post.show', $item->slug) }}">{{ $item->name }}</a>
                        </p>
                    </div>
                </div>
           </div>
       @endforeach
    </div>
</div>

</div>