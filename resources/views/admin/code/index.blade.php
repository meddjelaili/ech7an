@extends('theme.default')
@section('title', $title)
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection    

@section('content')

</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table_id" class=" table table-stribed text-left">
                <thead>
                    <tr>
                        <th>Card Type</th>
                        <th>Price</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Sold</th>
                        <th class="text-center">Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cardTypes as $cardType)
                        <tr>
                            <td><a href="">{{$cardType->type}}</a></td>
                            <td>{{$cardType->price}}$</td>
                            @if ($cardType->codes->count() <= 0)
                                <td class="text-center" style="color: rgb(116, 30, 30)">{{ $cardType->codes->count() }}</td>
                            @else   
                                <td class="text-center" style="color: rgb(30, 107, 49)">{{ $cardType->codes->count() }}</td>
                            @endif
                            <td class="text-center">null</td>
                            <td class="text-center">
                                @switch($cardType->status)
                                    @case(0)
                                        <span class="badge bg-success text-white">Active</span>
                                        @break
                                    @case(1)
                                        <span class="badge bg-danger text-white">Inactive</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                <a href="{{ route('admin.code.show',$cardType->id) }}" class="btn btn-info btn-sm mb-2" title="show codes"><i class="fa fa-code"></i></a>
                                @switch($cardType->status)
                                    @case(0)
                                        <a href="{{ route('admin.cardType.status',$cardType->id) }}" class="btn btn-danger btn-sm mb-2" title="inactive"><i class="fas fa-check-circle"></i></a>
                                        @break
                                    @case(1)
                                        <a href="{{ route('admin.cardType.status',$cardType->id) }}" class="btn btn-success btn-sm mb-2" title="active"><i class="fa fa-check-circle"></i></a>
                                        @break

                                @endswitch
            
                                <form action="{{ route('admin.cardType.destroy', $cardType->id) }}" method="POST" class="d-inline-block" >
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