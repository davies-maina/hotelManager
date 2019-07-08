@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mb-3">
        
        <div class="col-md-12">

            <h4 class="dispaly-4">Home delivery for {{ $hotel->name }}</h4>
            

           
        </div>


        
    </div>

    <div class="row">
        
        <div class="col-md-12">
        	<order-group :hotel-id="{{ $hotel->id }}"></order-group>
        </div>


        
    </div>
</div>
    
@endsection
           
