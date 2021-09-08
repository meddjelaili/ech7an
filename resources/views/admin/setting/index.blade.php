@extends('theme.default')
@section('title', $title)
    
@section('content')

</div>




<div class="row justify-content-center">
    <div class="card mb-4 col-md-8 mt-3">
        
        <div class="card-body mt-4">
            <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3>Site Settings:</h3>

                <div class="form-group row">
                    <label for="site_name" class="col-md-4 col-form-label text-md-right">Site Name</label>

                    <div class="col-md-6">
                        <input id="site_name" 
                               type="text" class="form-control  @error('site_name') is-invalid @enderror" 
                               name="site_name"  
                               autocomplete="site_name" 
                               value="{{ $settings['site_name'] }}">

                        @error('site_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="facebook" class="col-md-4 col-form-label text-md-right">Facebook Url</label>

                    <div class="col-md-6">
                        <input id="facebook" 
                               type="text" class="form-control  @error('facebook') is-invalid @enderror" 
                               name="facebook"  
                               autocomplete="facebook" 
                               value="{{ $settings['facebook'] }}">

                        @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="twitter" class="col-md-4 col-form-label text-md-right">Twitter Url</label>

                    <div class="col-md-6">
                        <input id="twitter" 
                            type="text" class="form-control  @error('twitter') is-invalid @enderror" 
                            name="twitter"  
                            autocomplete="twitter" 
                            value="{{ $settings['twitter'] }}">

                        @error('twitter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="instagram" class="col-md-4 col-form-label text-md-right">Instagram Url</label>

                    <div class="col-md-6">
                        <input id="instagram" 
                            type="text" class="form-control  @error('instagram') is-invalid @enderror" 
                            name="instagram"  
                            autocomplete="instagram" 
                            value="{{ $settings['instagram'] }}">

                        @error('instagram')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  
                
                <div class="form-group row">
                    <label for="linkedIn" class="col-md-4 col-form-label text-md-right">LinkedIn Url</label>

                    <div class="col-md-6">
                        <input id="linkedIn" 
                            type="text" class="form-control  @error('linkedIn') is-invalid @enderror" 
                            name="linkedIn"  
                            autocomplete="linkedIn" 
                            value="{{ $settings['linkedIn'] }}">

                        @error('linkedIn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                  

                <div class="form-group row">
                    <label for="about_us_en" class="col-md-4 col-form-label text-md-right">About Us En</label>

                    <div class="col-md-6">
                        <textarea name="about_us_en" id="" cols="30" rows="10">{{$settings['about_us_en']}}</textarea>

                        @error('about_us_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="about_us_ar" class="col-md-4 col-form-label text-md-right">About Us Ar</label>

                    <div class="col-md-6">
                        <textarea name="about_us_ar" id="" cols="30" rows="10">{{$settings['about_us_ar']}}</textarea>

                        @error('about_us_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="about_wallet_en" class="col-md-4 col-form-label text-md-right">About Account Balance En</label>

                    <div class="col-md-6">
                        <textarea name="about_wallet_en" id="" cols="30" rows="10">{{$settings['about_wallet_en']}}</textarea>

                        @error('about_wallet_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="about_wallet_ar" class="col-md-4 col-form-label text-md-right">About Account Balance Ar</label>

                    <div class="col-md-6">
                        <textarea name="about_wallet_ar" id="" cols="30" rows="10">{{$settings['about_wallet_ar']}}</textarea>

                        @error('about_wallet_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="merchant_en" class="col-md-4 col-form-label text-md-right">Upgrade To a merchant account En</label>

                    <div class="col-md-6">
                        <textarea name="merchant_en" id="" cols="30" rows="10">{{$settings['merchant_en']}}</textarea>

                        @error('merchant_en')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="merchant_ar" class="col-md-4 col-form-label text-md-right">Upgrade To a merchant account Ar</label>

                    <div class="col-md-6">
                        <textarea name="merchant_ar" id="" cols="30" rows="10">{{$settings['merchant_ar']}}</textarea>

                        @error('merchant_ar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="site_email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="site_email" 
                            type="text" class="form-control  @error('site_email') is-invalid @enderror" 
                            name="site_email"  
                            autocomplete="site_email" 
                            value="{{ $settings['site_email'] }}">

                        @error('site_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

             

                <div class="form-group row">
                    <label for="site_address" class="col-md-4 col-form-label text-md-right">Address</label>

                    <div class="col-md-6">
                        <input id="site_address" 
                            type="text" class="form-control  @error('site_address') is-invalid @enderror" 
                            name="site_address"  
                            autocomplete="site_address" 
                            value="{{ $settings['site_address'] }}">

                        @error('site_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-right">Image</label>

                    <div class="col-md-6">
                        <input id="site_logo" 
                                accept="image/*" 
                                type="file"   
                                class="form-control @error('site_logo') is-invalid @enderror" 
                                name="site_logo" value="{{ $settings['site_logo'] }}"
                                autocomplete="site_logo">
                                <input type="hidden" name="old_site_logo" value="{{ $settings['site_logo'] }}">
                        
                                @error('site_logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <img id="cover-image-thumb" class="img-fluid  mt-2 " src="{{ asset('/images/'.$settings['site_logo']) }}" width="250px" height="250px">
                    </div>

                </div>

               
                <hr>
                <h3>slideshow:</h3>
               
                <div class="form-group row">
                    <label for="slideshow_1" class="col-md-4 col-form-label text-md-right">Image 1</label>

                    <div class="col-md-6">
                        <input id="slideshow_1" 
                                accept="image/*" 
                                type="file"   
                                class="form-control @error('slideshow_1') is-invalid @enderror" 
                                name="slideshow_1" value="{{ $settings['slideshow_1'] }}"
                                autocomplete="slideshow_1">
                                <input type="hidden" name="old_slideshow_1" value="{{ $settings['slideshow_1'] }}">
                        
                                @error('slideshow_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="slideshow_1_link" 
                                        type="text" class="form-control mt-2  @error('slideshow_1_link') is-invalid @enderror" 
                                        name="slideshow_1_link"  
                                        autocomplete="slideshow_1_link" 
                                        value="{{ $settings['slideshow_1_link'] }}">
                        <img id="slideshow_1" class="img-fluid  mt-2 " src="{{ asset('/images/'.$settings['slideshow_1']) }}" width="250px" height="250px">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="slideshow_2" class="col-md-4 col-form-label text-md-right">Image 2</label>

                    <div class="col-md-6">
                        <input id="slideshow_2" 
                                accept="image/*" 
                                type="file"   
                                class="form-control @error('slideshow_2') is-invalid @enderror" 
                                name="slideshow_2" value="{{ $settings['slideshow_2'] }}"
                                autocomplete="slideshow_2">
                                <input type="hidden" name="old_slideshow_2" value="{{ $settings['slideshow_2'] }}">
                        
                                @error('slideshow_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="slideshow_2_link" 
                                    type="text" class="form-control mt-2  @error('slideshow_2_link') is-invalid @enderror" 
                                    name="slideshow_2_link"  
                                    autocomplete="slideshow_2_link" 
                                    value="{{ $settings['slideshow_2_link'] }}">
                        <img id="cover-image-thumb" class="img-fluid  mt-2 " src="{{ asset('/images/'.$settings['slideshow_2']) }}" width="250px" height="250px">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="slideshow_3" class="col-md-4 col-form-label text-md-right">Image 3</label>

                    <div class="col-md-6">
                        <input id="slideshow_3" 
                                accept="image/*" 
                                type="file"   
                                class="form-control @error('slideshow_3') is-invalid @enderror" 
                                name="slideshow_3" value="{{ $settings['slideshow_3'] }}"
                                autocomplete="slideshow_3">
                                <input type="hidden" name="old_slideshow_3" value="{{ $settings['slideshow_3'] }}">
                        
                                @error('slideshow_3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="slideshow_3_link" 
                        type="text" class="form-control mt-2  @error('slideshow_3_link') is-invalid @enderror" 
                        name="slideshow_3_link"  
                        autocomplete="slideshow_3_link" 
                        value="{{ $settings['slideshow_3_link'] }}">
                        <img id="cover-image-thumb" class="img-fluid  mt-2 " src="{{ asset('/images/'.$settings['slideshow_3']) }}" width="250px" height="250px">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="slideshow_4" class="col-md-4 col-form-label text-md-right">Image 4</label>

                    <div class="col-md-6">
                        <input id="slideshow_4" 
                                accept="image/*" 
                                type="file"   
                                class="form-control @error('slideshow_4') is-invalid @enderror" 
                                name="slideshow_4" value="{{ $settings['slideshow_4'] }}"
                                autocomplete="slideshow_4">
                                <input type="hidden" name="old_slideshow_4" value="{{ $settings['slideshow_4'] }}">
                        
                                @error('slideshow_4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="slideshow_4_link" 
                        type="text" class="form-control mt-2  @error('slideshow_4_link') is-invalid @enderror" 
                        name="slideshow_4_link"  
                        autocomplete="slideshow_4_link" 
                        value="{{ $settings['slideshow_4_link'] }}">
                        <img id="cover-image-thumb" class="img-fluid  mt-2 " src="{{ asset('/images/'.$settings['slideshow_4']) }}" width="250px" height="250px">
                    </div>

                </div>

                <div class="form-group row">
                    <label for="slideshow_5" class="col-md-4 col-form-label text-md-right">Image 5</label>

                    <div class="col-md-6">
                        <input id="slideshow_5" 
                                accept="image/*" 
                                type="file"   
                                class="form-control @error('slideshow_5') is-invalid @enderror" 
                                name="slideshow_5" value="{{ $settings['slideshow_5'] }}"
                                autocomplete="slideshow_5">
                                <input type="hidden" name="old_slideshow_5" value="{{ $settings['slideshow_5'] }}">
                        
                                @error('slideshow_5')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="slideshow_5_link" 
                        type="text" class="form-control mt-2  @error('slideshow_5_link') is-invalid @enderror" 
                        name="slideshow_5_link"  
                        autocomplete="slideshow_5_link" 
                        value="{{ $settings['slideshow_5_link'] }}">
                        <img id="cover-image-thumb" class="img-fluid  mt-2 " src="{{ asset('/images/'.$settings['slideshow_5']) }}" width="250px" height="250px">
                    </div>

                </div>




                <div class="form-group row my-4 pl-3">
                    <div class="form-check col-md-4">
                        <input type="hidden" value="0" name="dark_mode">
                        <input class="form-check-input" type="checkbox" value="1" name="dark_mode" {{ $settings['dark_mode'] == '1' ? 'checked' : '' }} id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault"  >
                          Dark Mode 
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

