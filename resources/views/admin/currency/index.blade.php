@extends('theme.default')
@section('title', $title)
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection    

@section('content')
<a href="{{ route('admin.currency.default') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i
    class="fab fa-d-and-d fa-sm text-white-50"></i> Default</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table_id" class=" table table-stribed text-left">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th class="text-center">Symbol</th>
                        <th class="text-center">Exchange rate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($currencies as $currency)
                        <tr>
                            <td><a>{{$currency['name']}}</a></td>
                            <td class="text-center">{{$currency['code']}}</td>
                            <td class="text-center">{{$currency['symbol']}}</td>
                         
                                <td class="text-center" >
                                    <form action="{{ route('admin.currency.store') }}" method="POST">
                                        @csrf

                                        @switch($currency['code'])
                                            @case('EUR')
                                                <span class="badge badge-info">Example: 0.85€</span>
                                                @break
                                            @case('DZD')
                                                <span class="badge badge-info">Example: 180dz</span>
                                                @break
                                            @default
                                                <span class="badge badge-info">Default currency</span>
                                        @endswitch
                                        <input type="hidden" value="{{ $currency['code'] }}" name="currency_code">
                                        <input type="number" 
                                                step="0.0000000000001" 
                                                id="exchange_rate" 
                                                name="exchange_rate" 
                                                value="{{ $currency['exchange_rate'] }}" 
                                                style="width: 100px;color: rgb(30, 107, 49)"
                                                {{ currency()->config('default') == $currency['code'] ? 'disabled' : '' }}
                                                >
                                        <button type="submit" 
                                                class="btn btn-success" 
                                                title="exchange" 
                                                {{ currency()->config('default') == $currency['code'] ? 'disabled' : '' }}
                                                >
                                            <i class="fas fa-exchange-alt"></i>
                                        </button>
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