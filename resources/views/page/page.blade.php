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
                <h2 class="mt-3 text-center text-dark">{{__("$page->title")}}</h2>
                        <div class="row z-depth-3 bg-white border rounded p-5 my-4" style="box-shadow: 0 22px 10px rgba(0, 0, 0, 0.5);"> 
                                {!! $page->content !!}
                        </div>
                     
            </div>
        </div>
    </div>

      
@endsection
