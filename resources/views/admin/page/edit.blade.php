@extends('theme.default')
@section('title', $title)
    
@section('content')

</div>




<div class="row justify-content-center">
    <div class="card mb-4 col-md-8 mt-3">
        
        <div class="card-body mt-4">
            <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <h3>Update Page:</h3>
                <div class="form-group row">
                    <label for="title_en" class="col-md-4 col-form-label text-md-right">Title EN:</label>

                    <div class="col-md-6">
                        <input id="title_en" value="{{$page->title_en}}" type="text" class="form-control  @error('title_en') is-invalid @enderror" name="title_en"  autocomplete="title_en">

                        @error('title_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title_ar" class="col-md-4 col-form-label text-md-right">Title Ar:</label>

                    <div class="col-md-6">
                        <input id="title_ar" value="{{$page->title_ar}}" type="text" class="form-control @error('title_ar') is-invalid @enderror" name="title_ar"  autocomplete="title_ar">

                        @error('title_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            

             

                <div class="form-group row">
                    <label for="content_en" class="col-md-4 col-form-label text-md-right">Content En:</label>

                    <div class="col-md-8">
                        <textarea id="content_en" 
                                  type="text" 
                                  class="form-control summernote @error('content_en') is-invalid @enderror" 
                                  name="content_en" 
                                  autocomplete="content_en">{{$page->content_en}}</textarea>

                        @error('content_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content_ar" class="col-md-4 col-form-label text-md-right">Content Ar:</label>

                    <div class="col-md-8">
                        <textarea id="content_ar" 
                                  type="text" 
                                  class="form-control summernote @error('content_ar') is-invalid @enderror" 
                                  name="content_ar" 
                                  autocomplete="content_ar">{{$page->content_en}}</textarea>

                        @error('content_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
               

           

            
              


                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')


<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>

@endsection