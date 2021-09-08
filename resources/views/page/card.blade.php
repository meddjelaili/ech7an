@extends('layouts.app')
    @section('style')

        <style>
            .active 
            { 
                display: block !important;
            }
        </style>

    @endsection

  
@section('content')
  


       
    <div class="container pages">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 pt-5" >
                <h2 class="mt-3 text-center text-dark">{{__("$title")}}</h2>
                        <div class="row z-depth-3   bg-white border rounded my-4" style="box-shadow: 0 22px 10px rgba(0, 0, 0, 0.5);"> 
                 
                                
                            @forelse ($data as $row) 

                                    <div class="col-md-3 col-6  my-4 text-center">
                                        <a href="{{ route($routeName,$row->slug) }}">
                                            <img src="{{ asset('images/'.$row->cover_image) }}" style="width: 120px;border-radius:10px" >
                                        </a>
                                    </div>   

                            
                            @empty              
                                    Nothing
                            @endforelse
                     

                            {!! $data->links() !!}


                        </div>
                     
            </div>
        </div>
    </div>

      
@endsection
