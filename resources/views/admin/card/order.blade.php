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
                        <th>Order ID</th>
                        <th>Card Type</th>
            
                        <th class="text-center">email</th>
                        <th class="text-center">payment_method</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td><a href="">{{ $order->cardType->type }}</a></td>
                            
                            <td class="text-center">{{ $order->email }}</td>
                            <td class="text-center">{{ $order->payment_method }}</td>
                            <td class="text-center">{{ $order->created_at }}</td>

                         
                            <td class="text-center" >
                                <a href="{{ route('admin.card.order.show', $order->id) }}" class="btn btn-info btn-sm mb-2" title="show">
                                    <i class="fas fa-eye"></i>
                                </a>
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