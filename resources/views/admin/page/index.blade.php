@extends('theme.default')
@section('title', $title)
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection    

@section('content')
<a href="{{ route('admin.pages.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i
    class="fab fa-d-and-d fa-sm text-white-50"></i>Create Page</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table_id" class=" table table-stribed text-left">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Slug</th>
                        <th class="text-center">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $key => $page)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-center ">{{$page->title_en}}</td>
                            <td class="text-center ">{{$page->slug}}</td>
                            <td>
                                <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-info btn-sm mb-2" title="edit"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" class="d-inline-block" >
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm mb-2" title="delete"  type="submit" onclick="return confirm('هل انت متأكد؟')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
        
    
    </div>
</div>
    


@endsection


@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection