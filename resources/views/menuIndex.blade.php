@extends('layouts.app')

@section('content')
<div class="container">

    
    

           <div class="row">
               

            <div class="col-md-12"></div>
            <div class="col-md-12"><menu-container :items='{{ json_encode($categories) }}' :resto-id="{{ $restoId }}"></menu-container>
           </div>     
                    
                
</div>
</div>
@endsection
