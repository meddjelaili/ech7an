@extends('theme.default')
@section('title', $title)
    
@section('content')

</div>




<div class="row justify-content-center">
    <div class="card mb-4 col-md-8 mt-3">
        
        <div class="card-body mt-4">
            <form action="{{ route('admin.card.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Card Information:</h3>
                <div class="form-group row">
                    <label for="title_en" class="col-md-4 col-form-label text-md-right">Title EN:</label>

                    <div class="col-md-6">
                        <input id="title_en" type="text" class="form-control  @error('title_en') is-invalid @enderror" name="title_en"  autocomplete="title_en">

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
                        <input id="title_ar" type="text" class="form-control @error('title_ar') is-invalid @enderror" name="title_ar"  autocomplete="title_ar">

                        @error('title_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="region_en" class="col-md-4 col-form-label text-md-right">Region En:</label>

                    <div class="col-md-6">
                        <input id="region_en" type="text" class="form-control @error('region_en') is-invalid @enderror" name="region_en"  autocomplete="region_en">

                        @error('region_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="region_ar" class="col-md-4 col-form-label text-md-right">Region Ar:</label>

                    <div class="col-md-6">
                        <input id="region_ar" type="text" class="form-control @error('region_ar') is-invalid @enderror" name="region_ar"  autocomplete="region_ar">

                        @error('region_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note_en" class="col-md-4 col-form-label text-md-right">Important Note En:</label>

                    <div class="col-md-6">
                        <input id="note_en" type="text" class="form-control @error('note_en') is-invalid @enderror" name="note_en"  autocomplete="note_en">

                        @error('note_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note_ar" class="col-md-4 col-form-label text-md-right">Important Note Ar:</label>

                    <div class="col-md-6">
                        <input id="note_ar" type="text" class="form-control @error('note_ar') is-invalid @enderror" name="note_ar"  autocomplete="note_ar">

                        @error('note_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="instruction_en" class="col-md-4 col-form-label text-md-right">Instruction En:</label>

                    <div class="col-md-8">
                        <textarea id="instruction_en" 
                                  type="text" 
                                  class="form-control summernote @error('instruction_en') is-invalid @enderror" 
                                  name="instruction_en" 
                                  autocomplete="instruction_en">{{ old('instruction_en') }}</textarea>

                        @error('instruction_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="instruction_ar" class="col-md-4 col-form-label text-md-right">Instruction Ar:</label>

                    <div class="col-md-8">
                        <textarea id="instruction_ar" 
                                  type="text" 
                                  class="form-control summernote @error('instruction_ar') is-invalid @enderror" 
                                  name="instruction_ar" 
                                  autocomplete="instruction_ar">{{ old('instruction_ar') }}</textarea>

                        @error('instruction_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
               

                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-right">Image</label>

                    <div class="col-md-6">
                        <input id="cover_image" accept="image/*" type="file"  onchange="readCoverImage(this);" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" value="{{ old('cover_image') }}" autocomplete="cover_image">
                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <img id="cover-image-thumb" class="img-fluid  mt-2 " src="" style="width:120px;height:160px;border-radius: .9rem;background-color: #b3acac;border: 1px solid #dddfeb;">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="popular" class="col-md-4 col-form-label text-md-right ">Popular Game cards:</label>

                    <div class="col-md-2">
                        <input id="popular" type="checkbox" class="form-control" name="popular"  value="1">
                    </div>
                </div>

                <hr>
                <h3>Card Type:</h3>

                <div class="form-group row">
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Type Name</th>
                            <th>Price</th>
                            <th>Merchant Price</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="addMoreInputFields[0][type]" placeholder="Enter name" class="form-control" required=""/></td>
                            <td ><input type="number" name="addMoreInputFields[0][price]" step="0.001" placeholder="Enter price" class="form-control" required=""/></td>
                            <td ><input type="number" name="addMoreInputFields[0][merchant_price]" step="0.001" placeholder="Enter merchant price" class="form-control" required=""/></td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </table>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function readCoverImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#cover-image-thumb')
                .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>


{{-- add more input type --}}

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][type]" placeholder="Enter name" class="form-control" required="" /></td><td><input type="number" step="0.001" name="addMoreInputFields[' + i +
            '][price]" placeholder="Enter price" class="form-control" required=""/></td> <td ><input type="number" step="0.001" name="addMoreInputFields[' + i + '][merchant_price]" step="0.001" placeholder="Enter merchant price" class="form-control" required=""/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fas fa-trash"></i></button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

@endsection