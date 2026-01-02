@extends('back.layout.template')

@section('top-search')
<input class="form-control form-control-dark w-100"
       type="text"
       placeholder="Search"
       aria-label="Search">
@endsection

@section('content')
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="card text-bg-primary mb-3" style="max-width: 100%;">
              <div class="card-header">Total Article</div>
              <div class="card-body">
                <h5 class="card-title">{{ $total_articles }} Articles</h5>
                <p class="card-text">
                  <a href="{{ url('article') }}" class="text-white">View</a>
                </p>
              </div>
          </div>
        </div>

        <div class="col-6">
          <div class="card text-bg-secondary mb-3" style="max-width: 100%;">
            <div class="card-header">Total Category</div>
            <div class="card-body">
              <h5 class="card-title">{{ $total_categories }} Categories</h5>
              <p class="card-text">
                  <a href="{{ url('categories') }}" class="text-white">View</a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <h4>Latest Articles</h4>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Publish Date</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($latest_article as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->publish_date }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="col-6">
          <h4>Pupolar Articles</h4>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Views</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($popular_article as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->views }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </main>
@endsection