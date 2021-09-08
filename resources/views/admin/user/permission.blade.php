@extends('theme.default')
@section('title', $title)
    
@section('content')

</div>

<div class="container-fluid">



    <div class="row">

        <div class="col-lg-12">

           

            


            <!-- User Details -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Permissions for: <span class="badge bg-success text-white">{{$user->name}}</span></h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.user.permission', $user->id)}}" method="POST">
                        @csrf
                            <div class="row"> 
                                <div class="col-md-5">
                                    <label for="form-label">Select Permissions</label>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple'))!!}
                                </div>
                            
                            </div>

                            <button type="submit" class="btn btn-primary mt-5" style="float: right">update</button>
                    </form>
                        
                </div>
            </div>

        </div>

        <div class="col-lg-6">

        
        </div>

    </div>

</div>


@endsection

@section('script')


<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>


@endsection