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
                    <h6 class="m-0 font-weight-bold text-primary">New Permission</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.roles.store')}}" method="POST">
                        @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Permission Name</label>
            
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name"  autocomplete="name">
            
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                               
                                
                                @foreach ($permission as $row)

                                    <div class="col-md-5">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"  name="permission" value="{{$row->id}}">
                                                <label class="form-check-label" for="">{{$row->name}}</label>
                                            </div>
                                    </div>
                                   

                                @endforeach
                            
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">New</button>
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