@extends('layouts.backend')
@section('content')
    <div class="card-header">
          <h3>Print Data Job Auxiliary</h3>
     </div>
      <div class="card-body">
     <form action="{{ route('jobs.datajobs') }}" method="post">
       <div class="input-group mb-3">
         <label for="label">Tanggal Awal</label>
         <input type="date" name="tgl_awal" id="tgl_awal" class="form-control"/>
       </div>
       <div class="input-group mb-3">
         <label for="label">Tanggal Akhir</label>
         <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control"/>
       </div>  
       <a href="cetakpdf" target="_blank" class="btn btn-primary btn-round ml-auto"      <i class="fas fa-print"></i>
        </a>         
      </div>
      </form>
    </div>
 @endsection

 

