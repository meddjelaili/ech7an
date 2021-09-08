@extends('theme.default')
@section('title', $title)
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection    

@section('content')

</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.code.store',$cardType->id) }}" method="POST" >
            @csrf
            
            <h3>Add Code:</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> this Code has already been taken.</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group row">
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>CODE</th>
                        <th>Serial Number <sup style="color:rgb(184, 46, 46)">optional</sup></th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="addMoreInputFields[0][code]" placeholder="Enter code" class="form-control" /></td>
                        <td ><input type="number" min="1" name="addMoreInputFields[0][serial_number]" placeholder="Enter serial number" class="form-control"/></td>
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i></button></td>
                    </tr>
                </table>
            </div>

            <div class="form-group row">
                    <textarea  cols="120" rows="4" name="codes" 
placeholder="DDJEURBTEGRO
DDJEURBTEGRO2
DDJEURBTEGRO3
DDJEURBTEGRO4"></textarea>
  
                    
            </div>



            <div class="form-group row mb-0">
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
        
    
</div>

    
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table_id" class=" table table-stribed text-left">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Serial Number</th>
                        <th>Created at</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($codes as $code)
                        <tr>
                            <td><b>{{$code->code}}</b></td>
                            <td><b>{{$code->serial_number}}</b></td>
                            <td>{{$code->created_at}}</td>
                            
                            <td>
                                <form action="{{ route('admin.code.destroy', $code->id) }}" method="POST" class="d-inline-block" >
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



    {{-- add more input type --}}

    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
                '][code]" placeholder="Enter Enter code" class="form-control" required="" /></td><td><input type="number" min="1"  name="addMoreInputFields[' + i +
                '][serial_number]" placeholder="Enter serial number" class="form-control"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fas fa-trash"></i></button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
@endsection

