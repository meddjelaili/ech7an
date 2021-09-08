@extends('theme.default')
@section('title', $title)
    
@section('content')

</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="row justify-content-center">
    <div class="card mb-4 col-md-8 mt-3">
        
        <div class="card-body mt-4">
            <form action="{{ route('admin.topUp.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Top Up Information:</h3>
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
                    <label for="popular" class="col-md-4 col-form-label text-md-right ">Popular Top Up Games:</label>

                    <div class="col-md-2">
                        <input id="popular" type="checkbox" class="form-control" name="popular" value="1">
                    </div>
                </div>
                
                <hr>
                <h3>Order Information:</h3>

                <div class="form-group row">
                    <table class="table table-bordered" id="dynamicAddRemoveInfo">
                        <tr>
                            <th>Name</th>
                            <th>Placeholder</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="addMoreInfoFields[0][name]" placeholder="Example: Player ID" class="form-control" required=""/></td>
                            <td ><input type="text"  name="addMoreInfoFields[0][placeholder]" placeholder="Example: Please enter Player ID" class="form-control" required=""/></td>
                            <td><button type="button" name="add" id="dynamic-info" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i></button></td>
                        </tr>
                    </table>
                </div>

               

                <hr>
                <h3 class="mt-2">Top Up Amount:</h3>

                <div class="form-group row">
                    <table class="table table-bordered" id="dynamicAddRemoveAmount">
                        <tr>
                            <th>Amount Name</th>
                            <th>Price</th>
                            <th>Merchant Price</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="addMoreAmountFields[0][amount]" placeholder="Enter name" class="form-control" required=""/></td>
                            <td ><input type="number"  name="addMoreAmountFields[0][price]" step="0.001" placeholder="Enter price" class="form-control" required=""/></td>
                            <td ><input type="number"  name="addMoreAmountFields[0][merchant_price]" step="0.001" placeholder="Enter merchant price" class="form-control" required=""/></td>
                            <td><button type="button" name="add" id="dynamic-amount" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i></button></td>
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
    $("#dynamic-amount").click(function () {
        ++i;
        $("#dynamicAddRemoveAmount").append('<tr><td><input type="text" name="addMoreAmountFields[' + i +
            '][amount]" placeholder="Enter name" class="form-control" required="" /></td><td><input type="number"   name="addMoreAmountFields[' + i +
            '][price]" step="0.001" placeholder="Enter price" class="form-control" required=""/></td><td ><input type="number"  name="addMoreAmountFields['+ i +'][merchant_price]" step="0.001" placeholder="Enter merchant price" class="form-control" required=""/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fas fa-trash"></i></button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

<script type="text/javascript">
    var x = 0;
    $("#dynamic-info").click(function () {
        ++x;
        $("#dynamicAddRemoveInfo").append('<tr><td><input type="text" name="addMoreInfoFields[' + x +
            '][name]" placeholder="Example: Player ID" class="form-control" required="" /></td><td><input type="text"  name="addMoreInfoFields[' + x +
            '][placeholder]" placeholder="Example: Please enter Player ID" class="form-control" required=""/></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fas fa-trash"></i></button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection