@extends('layouts.backenddty1')
@section('content')
<div class="container">
<a href="{{ route('jobs.wt')  }}" class="btn btn-success">Create</a>
<div class="row g-3 align-items-center mt-2">
  <div class="col-auto">
 <form action="{{ route('jobs.wtview') }}" method="GET">        
  <select name="mesin_no" id="mesin_no" class="form-control">
   @foreach($machinedetailnos as $machinedetailno)
   <option value="{{ $machinedetailno->id }}"  @if($machinedetailno->id == $idmachineno) selected='selected' @endif >{{ $machinedetailno->name }}</option>                 
   @endforeach
  </select>            
  <button type="submit" class="btn btn-primary col-md-4"><i class="fa fa-print"></i> Filter </button>
</form>

  </div>
</div>

    <div class="card-header">Water Treatment</div>       
    <div class="card-body">
    <table class="table table-dark table-striped">        
     <thead>
         <tr>
           <th>No</th>
           <th>Time</th>
           <th>Machine No.</th>
           <th>Fresh WTR TANK(4-6 Bar)</th>           
           <th>HYDRANT WTR TANK(6-8 Bar)</th>
           <th>CaOcl2 Tank Level(15-80CM)</th>
           <th>Flow Meter Soft WTR A</th>
           <th>Flow Meter Soft WTR B</th>
           <th>Flow Meter Soft WTR C(M3)</th>
           <th>Flow Meter Fresh WTR A</th>
           <th>Flow Meter Fresh WTR B</th>
           <th>Flow Meter Fresh ARTESIS#3</th>
           <th>Flow Meter Fresh ARTESIS#4 GENSET</th>
           <th>Flow Meter Fresh ARTESIS#8</th>
           <th>Raw Meter Pump#1</th>
           <th>Raw Meter Pump#2</th>
           <th>FILTER WATER PUMP#1</th>
           <th>FILTER WATER PUMP#2</th>
           <th>FRESH WATER PUMP#1</th>
           <th>FRESH WATER PUMP#2</th>
           <th>FRESH WATER PUMP#3</th>
           <th>FRESH WATER PUMP#4</th>
           <th>SOFT WATER PUMP#1 </th>
           <th>SOFT WATER PUMP#2</th>
           <th>SOFT WATER PUMP#3</th>
           <th>BW PUMP</th>
           <th>FM OFFICE BARU</th>
           <th>RAW WATER PUMP #1</th>
           <th>Chemical</th>
           <th>S/C FILTER</th>
           <th>Softener</th>
           <th>Bak Sedimentasi </th>
           <th>Catatan</th>
           <th>CHECKED BY</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
           <th>Shift Group</th>
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
     <td>{{ $job->param8 }}</td>
     <td>{{ $job->param9 }}</td>
     <td>{{ $job->param10 }}</td>
     <td>{{ $job->param11 }}</td>
     <td>{{ $job->param12 }}</td>
     <td>{{ $job->param13 }}</td>
     <td>{{ $job->param14 }}</td>
     <td>{{ $job->param15 }}</td>
     <td>{{ $job->param16 }}</td>
     <td>{{ $job->param17 }}</td>
     <td>{{ $job->param18 }}</td>
     <td>{{ $job->param19 }}</td>
     <td>{{ $job->param20 }}</td>
     <td>{{ $job->param21 }}</td>
     <td>{{ $job->param22 }}</td>
     <td>{{ $job->param23 }}</td>
     <td>{{ $job->param24 }}</td>
     <td>{{ $job->param25 }}</td>
     <td>{{ $job->chemical }}</td>
     <td>{{ $job->scfilter }}</td>
     <td>{{ $job->softener }}</td>
     <td>{{ $job->bak_sedimentasi }}</td>
     <td>{{ $job->catatan }}</td>
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
     <td>
       <a href="{{ route('jobs.editwt',$job->id) }}" class="btn btn-primary btn-sm">Edit</a>       
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


