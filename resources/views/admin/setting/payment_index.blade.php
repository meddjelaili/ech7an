@extends('theme.default')
@section('title', $title)
    
@section('content')

</div>




<div class="row justify-content-center">
    <div class="card mb-4 col-md-8 mt-3">
        
        <div class="card-body mt-4">
            <form action="{{ route('admin.payment.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Paysera Settings:</h3>

              
                <div class="form-group row">
                    <label for="paysera_orderId1_projectId" class="col-md-4 col-form-label text-md-right"> Project ID 1</label>

                    <div class="col-md-6">
                        <input id="paysera_orderId1_projectId" 
                               type="text" class="form-control  @error('paysera_orderId1_projectId') is-invalid @enderror" 
                               name="paysera_orderId1_projectId"  
                               autocomplete="paysera_orderId1_projectId" 
                               value="{{ $settings['paysera_orderId1_projectId'] }}">

                        @error('paysera_orderId1_projectId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="paysera_orderId1_password" class="col-md-4 col-form-label text-md-right">Password For Project Id 1</label>

                    <div class="col-md-6">
                        <input id="paysera_orderId1_password" 
                            type="text" class="form-control  @error('paysera_orderId1_password') is-invalid @enderror" 
                            name="paysera_orderId1_password"  
                            autocomplete="paysera_orderId1_password" 
                            value="{{ $settings['paysera_orderId1_password'] }}">

                        @error('paysera_orderId1_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="paysera_orderId2_projectId" class="col-md-4 col-form-label text-md-right"> Project ID 2</label>

                    <div class="col-md-6">
                        <input id="paysera_orderId2_projectId" 
                               type="text" class="form-control  @error('paysera_orderId2_projectId') is-invalid @enderror" 
                               name="paysera_orderId2_projectId"  
                               autocomplete="paysera_orderId2_projectId" 
                               value="{{ $settings['paysera_orderId2_projectId'] }}">

                        @error('paysera_orderId2_projectId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="paysera_orderId2_password" class="col-md-4 col-form-label text-md-right">Password For Project Id 2</label>

                    <div class="col-md-6">
                        <input id="paysera_orderId2_password" 
                            type="text" class="form-control  @error('paysera_orderId2_password') is-invalid @enderror" 
                            name="paysera_orderId2_password"  
                            autocomplete="paysera_orderId2_password" 
                            value="{{ $settings['paysera_orderId2_password'] }}">

                        @error('paysera_orderId2_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <hr>
                <h3>Paysera Bank Settings:</h3>

                <div class="form-group row">
                    <label for="paysera_wallet_acount" class="col-md-4 col-form-label text-md-right">Acount Name</label>

                    <div class="col-md-6">
                        <input id="paysera_wallet_acount" 
                            type="text" class="form-control  @error('paysera_wallet_acount') is-invalid @enderror" 
                            name="paysera_wallet_acount"  
                            autocomplete="paysera_wallet_acount" 
                            value="{{ $settings['paysera_wallet_acount'] }}">

                        @error('paysera_wallet_acount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="paysera_wallet_address" class="col-md-4 col-form-label text-md-right">Address</label>

                    <div class="col-md-6">
                        <input id="paysera_wallet_address" 
                            type="text" class="form-control  @error('paysera_wallet_address') is-invalid @enderror" 
                            name="paysera_wallet_address"  
                            autocomplete="paysera_wallet_address" 
                            value="{{ $settings['paysera_wallet_address'] }}">

                        @error('paysera_wallet_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="paysera_wallet_swif" class="col-md-4 col-form-label text-md-right">SWIF</label>

                    <div class="col-md-6">
                        <input id="paysera_wallet_swif" 
                            type="text" class="form-control  @error('paysera_wallet_swif') is-invalid @enderror" 
                            name="paysera_wallet_swif"  
                            autocomplete="paysera_wallet_swif" 
                            value="{{ $settings['paysera_wallet_swif'] }}">

                        @error('paysera_wallet_swif')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="paysera_wallet_iban" class="col-md-4 col-form-label text-md-right">IBAN</label>

                    <div class="col-md-6">
                        <input id="paysera_wallet_iban" 
                            type="text" class="form-control  @error('paysera_wallet_iban') is-invalid @enderror" 
                            name="paysera_wallet_iban"  
                            autocomplete="paysera_wallet_iban" 
                            value="{{ $settings['paysera_wallet_iban'] }}">

                        @error('paysera_wallet_iban')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <hr>
                <h3>Algeria Post Settings:</h3>
             

                <div class="form-group row">
                    <label for="ccp" class="col-md-4 col-form-label text-md-right">CCP</label>

                    <div class="col-md-6">
                        <input id="ccp" 
                            type="text" class="form-control  @error('ccp') is-invalid @enderror" 
                            name="ccp"  
                            autocomplete="ccp" 
                            value="{{ $settings['ccp'] }}">

                        @error('ccp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="baridimob" class="col-md-4 col-form-label text-md-right">BARIDI MOB</label>

                    <div class="col-md-6">
                        <input id="baridimob" 
                            type="text" class="form-control  @error('baridimob') is-invalid @enderror" 
                            name="baridimob"  
                            autocomplete="baridimob" 
                            value="{{ $settings['baridimob'] }}">

                        @error('baridimob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ccp_name" class="col-md-4 col-form-label text-md-right">NAME</label>

                    <div class="col-md-6">
                        <input id="ccp_name" 
                            type="text" class="form-control  @error('ccp_name') is-invalid @enderror" 
                            name="ccp_name"  
                            autocomplete="ccp_name" 
                            value="{{ $settings['ccp_name'] }}">

                        @error('ccp_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ccp_city" class="col-md-4 col-form-label text-md-right">City</label>

                    <div class="col-md-6">
                        <input id="ccp_city" 
                            type="text" class="form-control  @error('ccp_city') is-invalid @enderror" 
                            name="ccp_city"  
                            autocomplete="ccp_city" 
                            value="{{ $settings['ccp_city'] }}">

                        @error('ccp_city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <hr>
                <h3>Payment Status:</h3>

                <div class="form-group row my-4 pl-3">
                    <div class="form-check col-md-4">
                        <input type="hidden" value="0" name="paysera_status">
                        <input class="form-check-input" type="checkbox" value="1" name="paysera_status" {{ $settings['paysera_status'] == '1' ? 'checked' : '' }} id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault"  >
                          Enable Paysera 
                        </label>
                    </div>

                    <div class="form-check col-md-4">
                        <input type="hidden" value="0" name="paysera_wallet_status">
                        <input class="form-check-input" type="checkbox" value="1" name="paysera_wallet_status" {{ $settings['paysera_wallet_status'] == '1' ? 'checked' : '' }} id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault" >
                            Enable Paysera Bank
                        </label>
                    </div>

                    <div class="form-check col-md-4">
                        <input type="hidden" value="0" name="ccp_status">
                        <input class="form-check-input" type="checkbox" value="1"  name="ccp_status" {{ $settings['ccp_status'] == '1' ? 'checked' : '' }} id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Enable Algeria Post
                        </label>
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

