@extends('layouts.base')

@section('body')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
          <x-sidebar></x-sidebar>
      </div>
       <div class="col-md-10">
       @yield('content')       
       </div>       
      </div>      
    </div>
 </div>
@endsection