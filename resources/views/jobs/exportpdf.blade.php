@extends('layouts.backend')
@section('content')
    <div class="card-header">
          <h3>Print Data Job Auxiliary</h3>
     </div>
      <div class="card-body">
      <form action="{{ route('jobs.datajobs') }}" method="GET" target="_blank" enctype="multipart/form-data">        
        @csrf
       <div class="input-group mb-3">
         <label for="label">Tanggal Awal</label>
         <input type="date" name="tgl_awal"  id="tgl_awal" class="form-control"/>
       </div>
       <div class="input-group mb-3">
         <label for="label">Tanggal Akhir</label>
         <input type="date" name="tgl_akhir"  id="tgl_akhir" class="form-control"/>
       </div>  
       <button type="submit" class="btn btn-primary col-md-12"><i class="fa fa-print"></i> Prints </button>
      </form>
    </div>
    
 @endsection

 


