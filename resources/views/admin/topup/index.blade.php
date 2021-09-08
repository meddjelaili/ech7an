@extends('theme.default')
@section('title', $title)
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection    

@section('content')
<a href="{{ route('admin.topUp.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i
    class="fab fa-d-and-d fa-sm text-white-50"></i> Add Top Up</a>
</div>



<div class="card shadow mb-4">
    <div class="card-body">
 
        <div class="table-responsive">
            <table id="table_id" class=" table table-stribed text-left">
                <thead>
                    <tr>
                        <th>Top Up Name</th>
                        <th class="text-center">Amounts</th>
                        <th class="text-center">Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topUps as $topUp)
                        <tr>
                            <td><a href="">{{$topUp->title_en}}</a></td>
                            <td class="text-center">{{ $topUp->topUpAmounts->count() }}</td>
                            <td class="text-center">
                                @switch($topUp->status)
                                    @case(0)
                                        <span class="badge bg-success text-white">Active</span>
                                        @break
                                    @case(1)
                                        <span class="badge bg-danger text-white">Inactive</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                @switch($topUp->status)
                                    @case(0)
                                <a href="{{ route('admin.topUp.status',$topUp->id) }}" class="btn btn-danger btn-sm mb-2" title="inactive"><i class="fas fa-check-circle"></i></a>
                                        @break
                                    @case(1)
                                        <a href="{{ route('admin.topUp.status',$topUp->id) }}" class="btn btn-success btn-sm mb-2" title="active"><i class="fa fa-check-circle"></i></a>
                                        @break

                                @endswitch
                                <a href="{{ route('admin.topUp.edit', $topUp->id) }}" class="btn btn-info btn-sm mb-2" title="edit"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('admin.topUp.destroy', $topUp->id) }}" method="POST" class="d-inline-block" >
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