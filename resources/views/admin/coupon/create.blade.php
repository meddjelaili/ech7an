@extends('theme.default')
@section('title', $title)
    
@section('content')

</div>




<div class="row justify-content-center">
    <div class="card mb-4 col-md-8 mt-3">
        
        <div class="card-body mt-4">
            <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h3>Add Or Update Coupon:</h3>

                <div class="form-group row">
                    <label for="coupon" class="col-md-4 col-form-label text-md-right">Coupon:</label>

                    <div class="col-md-6">
                        <input id="coupon" type="text" class="form-control  @error('coupon') is-invalid @enderror" name="coupon"  autocomplete="coupon">

                        @error('coupon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="discount" class="col-md-4 col-form-label text-md-right">Discount %:</label>

                    <div class="col-md-6">
                        <input type="number" 
                                name="discount" 
                                id="discount" 
                                step="0.001" 
                                min="0.001" 
                                placeholder="100 %" 
                                class="form-control @error('discount') is-invalid @enderror" 
                                required="" 
                                autocomplete="discount"
                                />

                        @error('discount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="topup_id" class="col-md-4 col-form-label text-md-right">Top Up:</label>
                    <div class="col-md-6">
                        <select name="topup_id" id="topup_id" class="form-control">
                            <option disabled selected>Choose Top Up</option>
                            @foreach ($topUps as $row)
                                <option value="{{ $row->id }}">{{ $row->title_en }}</option>
                            @endforeach
                        </select>

                        @error('topup_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="card_id" class="col-md-4 col-form-label text-md-right">Card:</label>
                    <div class="col-md-6">
                        <select name="card_id" id="card_id" class="form-control">
                            <option disabled selected>Choose Card</option>
                            @foreach ($cards as $row)
                                <option value="{{ $row->id }}">{{ $row->title_en }}</option>
                            @endforeach
                        </select>
                        @error('card_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-4 pl-3">
                    <div class="form-check col-md-4">
                        <input type="hidden" value="0" name="public" >
                        <input class="form-check-input" type="checkbox" value="1" name="public" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault"  >
                          Public Coupon
                        </label>
                    </div>
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
               


           

            

                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Add Or Update</button>
                        <input type="reset" value="Reset" class="btn btn-warning">
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')


@endsection