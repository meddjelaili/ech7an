@extends('theme.default')
@section('title', $title)
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection    

@section('content')
<a href="{{ route('admin.roles.create') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i
    class="fab fa-d-and-d fa-sm text-white-50"></i> Add Permission</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table_id" class=" table table-stribed text-left">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">Wallet</th>
                        <th class="text-center">deposit/withdraw</th>
                        <th class="text-center">Merchant</th>
                        <th class="text-center">Permission</th>
                        <th class="text-center">Option</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-center ">{{$user->name}}</td>
                            <td class="text-center ">{{$user->email}}</td>
                            <td class="text-center ">{{$user->balanceFloat}}$</td>
                            <td class="text-center ">
                                <form action="{{ route('admin.user.wallet',$user->id) }}" method="POST">
                                    @csrf
                                    <input type="number" value="0.0" step="0.001" name="deposit_withdraw" style="width: 55px;color: rgb(116, 30, 30)">
                                    <button type="submit" class="btn btn-danger" title="Change Wallet Balance" style="font-size: 10px"><i class="fas fa-exchange-alt"></i></button>
                                </form>
                            </td>
                            <td class="text-center"> 
                                @if ($user->isMerchant())
                                    <span class="badge bg-success text-white">Yes</span>
                                @else 
                                    <span class="badge bg-dark text-white">no</span>
                                @endif
                            </td>

                            @if (!empty($user->getRoleNames()))
                                <td class="text-center">
                                    @forelse ($user->getRoleNames() as $v)
                                        <span class="badge bg-success text-white">{{$v}}</span>
                                    @empty
                                        <span class="badge bg-dark text-white">user</span>
                                    @endforelse
                                </td>
                            @else 
                            @endif

                            @if ($user->id != Auth::id())
                            <td class="text-center">
                                <a href="{{ route('admin.user.permission', $user->id) }}" class="btn btn-info btn-sm mb-2" title="permission" style="font-size: 10px;width: 90px;">
                                    permission
                                </a>
                                <a href="{{ route('admin.user.nopermission', $user->id) }}" class="btn btn-danger btn-sm mb-2" title="no permission" style="font-size: 10px;width: 90px;">
                                    no permission
                                </a>
                            </td>
                            
                            <td class="text-center">
                                @switch($user->status)
                                @case(0)
                                    <a href="{{ route('admin.user.status',$user->id) }}" class="btn btn-danger btn-sm mb-2" title="inactive"><i class="fas fa-check-circle"></i></a>
                                    @break
                                @case(1)
                                    <a href="{{ route('admin.user.status',$user->id) }}" class="btn btn-success btn-sm mb-2" title="active"><i class="fa fa-check-circle"></i></a>
                                    @break

                                @endswitch
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline-block" >
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm mb-2" title="delete"  type="submit" onclick="return confirm('هل انت متأكد؟')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            @endif
                            

                           
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