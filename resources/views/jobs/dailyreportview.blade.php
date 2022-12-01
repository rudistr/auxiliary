@extends('layouts.backendgenset')
@section('content')
<div class="container">
<a href="{{ route('jobs.dailyreport')  }}" class="btn btn-success">Create</a>
<div class="row g-3 align-items-center mt-2">
  <div class="col-auto">
 <form action="{{ route('jobs.dailyreportview') }}" method="GET">        
  <select name="mesin_no" id="mesin_no" class="form-control">
   @foreach($machinedetailnos as $machinedetailno)
   <option value="{{ $machinedetailno->id }}"  @if($machinedetailno->id == $idmachineno) selected='selected' @endif >{{ $machinedetailno->name }}</option>                    
   @endforeach
  </select>            
  <button type="submit" class="btn btn-primary col-md-4"><i class="fa fa-print"></i> Filter </button>
</form>

  </div>
</div>

    <div class="card-header">Daily Report</div>       
    <div class="card-body">
    <table class="table table-dark table-striped">        
     <thead>
         <tr>
           <th>No</th>
           <th>Time</th>
           <th>Machine No.</th>
           <th>LEVEL BAK EMERGENCY</th>           
           <th>LEVEL BAK EQUALISASI </th>
           <th>LEVEL BAK AERASI</th>
           <th>KONDISI LIMBAH EMERGENCY</th>
           <th>PROSES AERASI</th>
           <th>PROSES SEDIMENTASI</th>
           <th>PROSES FLOKULASI</th>
           <th>Catatan</th>           
           <th>Checked By</th>           
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
           <th>Edit</th>
        </tr>
</thead>
<tbody>
    @foreach($datajobs as $index => $job)
     <tr>
     <td>{{ $datajobs->count() * ($datajobs->currentPage()-1) + $loop->iteration }}</td>
     <td>{{ $job->tanggal }}</td>
     <td>{{ $job->name }}</td>     
     <td>{{ $job->param1 }}</td>
     <td>{{ $job->param2 }}</td>
     <td>{{ $job->param3 }}</td>
     <td>{{ $job->param4 }}</td>
     <td>{{ $job->param5 }}</td>
     <td>{{ $job->param6 }}</td>
     <td>{{ $job->param7 }}</td>
     <td>{{ $job->catatan }}</td>
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>
       <a href="{{ route('jobs.editdailyreport',$job->id) }}" class="btn btn-primary btn-sm">Edit</a>       
     </td>                  
    <tr>
    @endforeach
</tbody>
</table>
{{ $datajobs->links()}}
</div>
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
       <div class="input-group mb-3">
       <label for="idmachineno">CHECK LIST</label>
          <select name="idmachineno" id="idmachineno" class="col-sm-6 form-control">
            @foreach($machinedetailnos as $machinedetailno)
             <option value="{{ $machinedetailno->id }}">{{ $machinedetailno->name }}</option>
            @endforeach
          </select>          
        </div>  
       <input type="hidden" name="idmachines"  id="idmachines" class="form-control" value = "{{ $idmachines }}" />
       <input type="hidden" name="idmachinedetails"  id="idmachinedetail" class="form-control" value = "{{ $idmachinedetails }}" />
       
       <button type="submit" class="btn btn-primary col-md-2"><i class="fa fa-print"></i> Prints </button>
      </form>

</div>
@endsection


