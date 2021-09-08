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
                        <th>Transaction ID</th>
                        <th>Name</th>
                        <th class="text-center">Payment Method</th>
                        <th class="text-center">Payment ID</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Pdf</th>
                        <th class="text-center">deposit</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td><a href="">{{$row->meta['name'] ?? ''}}</a></td>
                            <td class="text-center">{{$row->meta['payment_method'] ?? ''}}</td>
                            <td class="text-center">{{$row->meta['payment_id'] ?? ''}}</td>
                            <td class="text-center">{{$row->meta['amount']}}{{$row->meta['currency']}}</td>
                            <td class="text-center">
                                @isset($row->meta['img'])
                                    <a href="{{ route('admin.wallet.img', $row->meta['img']) }}" class="btn btn-info btn-sm mb-2" title="Download Img" >
                                        <i class="fas fa-download"></i>
                                    </a>
                                @else    
                                    <a  class="btn btn-dark btn-sm mb-2 disabled" title="Download Pdf" disabled>
                                        <i class="fas fa-download"></i>
                                    </a>
                                @endisset
                            </td>
                            <td class="text-center">
                                @isset($row->meta['pdf'])
                                    <a href="{{ route('admin.wallet.pdf', $row->meta['pdf']) }}" class="btn btn-info btn-sm mb-2" title="Download Pdf" >
                                        <i class="fas fa-download"></i>
                                    </a>
                                @else    
                                    <a  class="btn btn-dark btn-sm mb-2 disabled" title="Download Pdf" disabled>
                                        <i class="fas fa-download"></i>
                                    </a>
                                @endisset
                               
                            </td>
                            <td class="text-center" style="color:green">{{ number_format((float)$row->amountFloat, 2, '.', '') }}$</td>
                            <td class="text-center" >
                               <span class="badge bg-success text-white">confirmed</span>
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