@extends('back.layout.template')

{{-- Kode untuk menampilkan datatable dari CDN --}}
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.bootstrap5.css">
@endpush

@section('content')
{{-- Header --}}
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Articles</h1>
    </div>
    
    {{-- Tombol tambah artikel --}}
    <div class="mt-3">
        <a href="{{ url('article/create') }}" class="btn btn-success mb-2">Create</a>
        {{-- Tampilkan error jika ada input yang tidak valid --}}
        @if ($errors->any())
            <div class="my-3">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif
        {{-- Alert Success --}}
        <div class="swal" data-swal="{{ session('success') }}"></div>
    </div>


    <table class="table table-striped table-bordered" id="dataTable">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th class="text-center">Views</th>
                <th class="text-center">Publish Date</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>
            {{-- Datanya akan di isi oleh Datatables dari Database --}}
        </tbody>
    </table>

    </div>
    </main>
@endsection

@push('js')
{{-- Library JS --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Alert Success dari sweetalert2 --}}
<script>
    const swal = $('.swal').data('swal');
    if(swal){
        Swal.fire({
            'title': 'Success!',
            'text': swal,
            'icon': 'success',
            showConfirmButton:false,
            'timer': 2000
        })
    }
    // Delete Article
   function deleteArticle(e) {
    let id = e.getAttribute('data-id');
    
    Swal.fire({
        title: 'Are You Sure?',
        text: "You won't be able to delete this Article!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => { 
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: '/article/' + id,
                dataType: 'json',
                success: function (response) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.href = '/article';
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    }); 
}
</script>

{{-- DataTables --}}
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            lengthMenu: [5, 10, 50, 100],
            pageLength: 5,
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'category_id',
                    name: 'category_id'
                },
                {
                    data: 'author',
                    name: 'author'
                },
                {
                    data: 'views',
                    name: 'views',
                    className: 'text-center'
                },
                {
                    data: 'publish_date',
                    name: 'publish_date',
                    className: 'text-center'
                },
                {
                    data: 'button',
                    name: 'button'
                },
            ]
        });
    });
</script>
@endpush