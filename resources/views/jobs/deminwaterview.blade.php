@extends('layouts.backendreport')
@section('content')
<div class="container">
<a href="{{ route('jobs.demin_water')  }}" class="btn btn-success">Create</a>
<div class="row g-3 align-items-center mt-2">
  <div class="col-auto">
 <form action="{{ route('jobs.deminwaterview') }}" method="GET">        
  <select name="mesin_no" id="mesin_no" class="form-control">
   @foreach($machinedetailnos as $machinedetailno)
   <option value="{{ $machinedetailno->id }}"  @if($machinedetailno->id == $idmachineno) selected='selected' @endif >{{ $machinedetailno->name }}</option>                    
   @endforeach
  </select>            
  <button type="submit" class="btn btn-primary col-md-4"><i class="fa fa-print"></i> Filter </button>
</form>

  </div>
</div>

    <div class="card-header">Demin Water</div>       
    <div class="card-body">
    <table class="table table-dark table-striped">        
     <thead>
         <tr>
           <th>No</th>
           <th>Time</th>
           <th>Machine No.</th>
           <th>SOFT WATER FLOW METER(M3)</th>           
           <th>SOFT WATER RANGE METER(M3)</th>
           <th>SOFT WATER SERVICE A</th>
           <th>SOFT WATER SERVICE B</th>
           <th>SOFT WATER LEVEL SALT TANK(60-100 CM)</th>
           <th>DEMIN WATER CATION & ANION Flow Meter(M3)</th>
           <th>DEMIN WATER CATION & ANION Range Meter(M3)</th>
           <th>DEMIN WATER CATION & ANION COUNTER FO.15.11.1.1</th>
           <th>DEMIN WATER CATION & ANION CONDUCTIVITY(2,5mS/CM)</th>
           <th>DEMIN WATER CATION MIX BED CONDUCTIVITY(1,5mS/CM)</th>
           <th>DEMIN WATER WATER METER Temperature(60C)</th>
           <th>DEMIN WATER WATER METER Pressure(4-7Bar)</th>
           <th>DEMIN WATER LEVEL CHEMICAL HCL(30CM)</th>
           <th>DEMIN WATER LEVEL CHEMICAL NaOH(30CM)</th>
           <th>LEVEL DEMIN TANK(150-450CM)</th>
           <th>PRESS,DEMIN WTR PUMP #1(2-4Bar)</th>
           <th>PRESS,DEMIN WTR PUMP #2(2-4Bar)</th>
           <th>PRESS,DEMIN WTR PUMP #3(2-4Bar)</th>
           <th>FLOW METER ARTESIS#1 Bengkel </th>
           <th>FLOW METER ARTESIS#2 Utility</th>
           <th>FLOW METER ARTESIS#6 Kantin</th>
           <th>FM MESS</th>
           <th>FM POLY</th>           
           <th>FM SPD2</th>
           <th>AIR MANCUR</th>
           <th>CATION-ANION MIX BED</th>
           <th>SOFTENER</th>
           <th>CHEMICAL</th>
           <th>CATATAN</th>
           <th>CHECKED BY</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
           <th>Shift</th>
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
     <td>{{ $job->cation_anion_mix_bed }}</td>
     <td>{{ $job->softener }}</td>
     <td>{{ $job->chemical}}</td>
     <td>{{ $job->catatan }}</td>
     <td>{{ $job->checked_by }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
     <td>
       <a href="{{ route('jobs.editdeminwater',$job->id) }}" class="btn btn-primary btn-sm">Edit</a>       
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


