@extends('theme.default')
@section('title', $title)
    
@section('content')

</div>




<div class="row justify-content-center">
    <div class="card mb-4 col-md-8 mt-3">
        
        <div class="card-body mt-4">
            <form action="{{ route('admin.email.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Email Settings:</h3>


              
                <div class="form-group row">
                    <label for="maildriver" class="col-md-4 col-form-label text-md-right">Driver</label>

                    <div class="col-md-6">
                        <input id="maildriver" 
                            type="text" class="form-control  @error('maildriver') is-invalid @enderror" 
                            name="maildriver"  
                            autocomplete="maildriver" 
                            value="{{ $settings['maildriver'] }}">

                        @error('maildriver')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mailhost" class="col-md-4 col-form-label text-md-right">HOST</label>

                    <div class="col-md-6">
                        <input id="mailhost" 
                            type="text" class="form-control  @error('mailhost') is-invalid @enderror" 
                            name="mailhost"  
                            autocomplete="mailhost" 
                            value="{{ $settings['mailhost'] }}">

                        @error('mailhost')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mailport" class="col-md-4 col-form-label text-md-right">PORT</label>

                    <div class="col-md-6">
                        <input id="mailport" 
                            type="text" class="form-control  @error('mailport') is-invalid @enderror" 
                            name="mailport"  
                            autocomplete="mailport" 
                            value="{{ $settings['mailport'] }}">

                        @error('mailport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mailencryption" class="col-md-4 col-form-label text-md-right">ENCRYPTION</label>

                    <div class="col-md-6">
                        <input id="mailencryption" 
                            type="text" class="form-control  @error('mailencryption') is-invalid @enderror" 
                            name="mailencryption"  
                            autocomplete="mailencryption" 
                            value="{{ $settings['mailencryption'] }}">

                        @error('mailencryption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mailusername" class="col-md-4 col-form-label text-md-right">User Name</label>

                    <div class="col-md-6">
                        <input id="mailusername" 
                            type="text" class="form-control  @error('mailusername') is-invalid @enderror" 
                            name="mailusername"  
                            autocomplete="mailusername" 
                            value="{{ $settings['mailusername'] }}">

                        @error('mailusername')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mailpassword" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="mailpassword" 
                            type="text" class="form-control  @error('mailpassword') is-invalid @enderror" 
                            name="mailpassword"  
                            autocomplete="mailpassword" 
                            value="{{ $settings['mailpassword'] }}">

                        @error('mailpassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="mailaddress" class="col-md-4 col-form-label text-md-right">FROM ADDRESS</label>

                    <div class="col-md-6">
                        <input id="mailaddress" 
                            type="text" class="form-control  @error('mailaddress') is-invalid @enderror" 
                            name="mailaddress"  
                            autocomplete="mailaddress" 
                            value="{{ $settings['mailaddress'] }}">

                        @error('mailaddress')
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

