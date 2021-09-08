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
                <h2 class="mt-3 text-center text-dark">{{(__('Browse'))}}{{__("$title")}}</h2>
                        <div class="row z-depth-3   bg-white border rounded my-4" style="box-shadow: 0 22px 10px rgba(0, 0, 0, 0.5);"> 
                            @foreach($data->groupByType() as $type => $modelSearchResults)
                                @foreach($modelSearchResults as $searchResult)
                                        <div class="col-md-2 col-6 my-4 text-center ">
                                            <a href="{{ $searchResult->url }}">
                                                {{-- Title it's => cover_image --}}
                                                <img src="{{ asset('images/'.$searchResult->title) }}" style="width: 120px;border-radius:10px" >
                                            </a>
                                        </div>   
                                   
                                @endforeach
                            @endforeach


                        </div>
                     
            </div>
        </div>
    </div>

      
@endsection
