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
                        <th>Full Name</th>
                        <th>E-mail</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Nationality</th>
                        <th class="text-center">Country</th>
                        <th class="text-center">City</th>
                        <th class="text-center">Adress</th>
                        <th class="text-center">Website</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merchants as $row)
                        <tr>
                            <td><a href="">{{ $row->full_name }}</a></td>
                            <td>{{ $row->user->email }}</td>
                            <td class="text-center">{{ $row->phone }}</td>
                            <td class="text-center">{{ $row->nationality }}</td>
                            <td class="text-center">{{ $row->country  }}</td>
                            <td class="text-center">{{ $row->city }}</td>
                            <td class="text-center">{{ $row->adress }}</td>
                            <td class="text-center">
                                <a href="{{ $row->website }}" class="btn  {{ $row->website == null ? 'btn-dark disabled' : 'btn-info' }} btn-sm mb-2 " title="Website">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td class="text-center" >
                        
                                <a href="{{ route('admin.merchant.delete', $row->id) }}" class="btn btn-danger btn-sm mb-2" title="delete">
                                    <i class="fas fa-trash"></i>
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