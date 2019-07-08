@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        
        <div class="col-md-12">

            <h3 class="dispaly-1 text-center mb-3">My Hotels</h3>
            <hotel-group :hotels='{{ json_encode($hotels) }}'></hotel-group>
            <hr class="mb-3">

        </div>


        
    </div>
    

           <div class="row">
               

            <div class="col-md-12"></div>
            <div class="col-md-12"><menu-container :items='{{ json_encode($categories) }}' :resto-id="{{ $restoId }}"></menu-container>
           </div>     
                    
                
</div>
</div>
@endsection
