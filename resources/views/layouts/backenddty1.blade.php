@extends('layouts.base')

@section('body')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
          <x-sidebardty1></x-sidebardty1>
      </div>
       <div class="col-md-9">
       @yield('content')       
       </div>       
      </div>      
    </div>
 </div>
@endsection