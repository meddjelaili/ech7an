@extends('theme.default')
@section('title', $title)
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection    

@section('content')
<a href="{{ route('admin.coupon.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i
    class="fa fa-gift fa-sm text-white-50"></i> Coupon</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table_id" class=" table table-stribed text-left">
                <thead>
                    <tr>
                        <th>Coupon</th>
                        <th class="text-center">Types</th>
                        <th class="text-center">Discount</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $coupon)
                        <tr>
                            <td>{{$coupon->coupon}}</td>
                            @if ($coupon->topUp_id != null)
                                <td class="text-center">
                                    <span class="badge bg-primary text-white">{{ $coupon->topUp->title_en }}</span>    
                                </td>
                            @elseif ($coupon->card_id != null)
                                <td class="text-center">
                                    <span class="badge bg-info text-white">{{ $coupon->card->title_en }}</span>    
                                </td>
                            @else    
                                <td class="text-center">
                                    <span class="badge bg-warning text-white">Public</span>    
                                </td>
                            @endif
                            <td class="text-center">{{ $coupon->discount }}%</td>
   
  
                            <td>
      
                                <form action="{{ route('admin.coupon.destroy', $coupon->id) }}" method="POST" class="d-inline-block" >
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