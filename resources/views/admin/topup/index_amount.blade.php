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
                        <th>Name</th>
                        <th>Price</th>
                        <th class="text-center">Stock</th>
                        {{-- <th class="text-center">Sold</th> --}}
                        <th class="text-center">Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($amounts as $amount)
                        <tr>
                            <td><a href="">{{$amount->amount}}</a></td>
                            <td>{{$amount->price}}$</td>
                            @if ($amount->stock <= 0)
                                <td class="text-center" style="color: rgb(116, 30, 30)">
                                    <input type="hidden"  value="{{ $amount->stock }}">
                                    <form action="{{ route('admin.topUp.amount.stock',$amount->id) }}" method="POST">
                                        @csrf
                                        <input type="number" min="0" value="{{ $amount->stock }}" name="stock" style="width: 55px;color: rgb(116, 30, 30)">
                                        <button type="submit" class="btn btn-danger" title="Add to stock"><i class="fas fa-plus-circle"></i></button>
                                    </form>
                                </td>
                            @else   
                                <td class="text-center" >
                                    <input type="hidden"  value="{{ $amount->stock }}">

                                    <form action="{{ route('admin.topUp.amount.stock',$amount->id) }}" method="POST">
                                        @csrf
                                        <input type="number" min="0" value="{{ $amount->stock }}" name="stock" style="width: 55px;color: rgb(30, 107, 49)">
                                        <button type="submit" class="btn btn-success" title="Add to stock"><i class="fas fa-plus-circle"></i></button>
                                    </form>
                                </td>
                            @endif
                            <td class="text-center">
                                @switch($amount->status)
                                    @case(0)
                                        <span class="badge bg-success text-white">Active</span>
                                        @break
                                    @case(1)
                                        <span class="badge bg-danger text-white">Inactive</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                
                                @switch($amount->status)
                                    @case(0)
                                        <a href="{{ route('admin.topUp.amount.status',$amount->id) }}" class="btn btn-danger btn-sm mb-2" title="inactive"><i class="fas fa-check-circle"></i></a>
                                        @break
                                    @case(1)
                                        <a href="{{ route('admin.topUp.amount.status',$amount->id) }}" class="btn btn-success btn-sm mb-2" title="active"><i class="fa fa-check-circle"></i></a>
                                        @break

                                @endswitch
            
                                <form action="{{ route('admin.topUp.amount.destroy', $amount->id) }}" method="POST" class="d-inline-block" >
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