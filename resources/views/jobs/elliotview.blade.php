@extends('layouts.backendreport')
@section('content')
<div class="container">
<a href="{{ route('jobs.elliot')  }}" class="btn btn-success">Create</a>
<div class="row g-3 align-items-center mt-2">
  <div class="col-auto">
 <form action="{{ route('jobs.elliotview') }}" method="GET">        
  <select name="mesin_no" id="mesin_no" class="form-control">
   @foreach($machinedetailnos as $machinedetailno)
   <option value="{{ $machinedetailno->id }}"  @if($machinedetailno->id == $idmachineno) selected='selected' @endif >{{ $machinedetailno->name }}</option>                 
   @endforeach
  </select>            
  <button type="submit" class="btn btn-primary col-md-4"><i class="fa fa-print"></i> Filter </button>
</form>

  </div>
</div>

    <div class="card-header">ELLIOT</div>       
    <div class="card-body">
    <table class="table table-dark table-striped">        
     <thead>
         <tr>
           <th>No</th>
           <th>Time</th>
           <th>Machine No.</th>
           <th>WATER SUPPLY IN TEMP (< 30 C)</th>           
           <th>WATER SUPPLY OUT TEMP(< 58 C)</th>
           <th>INLET OIL TEMP IOT(< 58C)</th>
           <th>FINAL INTERSTAGE AIR TEMP IAT(< 50C)</th>
           <th>WATER SUPPLY IN PRESSURE(3-4 bar)</th>
           <th>WATER SUPPLY OUT PRESSURE(3-4 bar)</th>
           <th>DISCHARGE PRESSURE DPT(< 8.8 Bar)</th>
           <th>SYSTEM PRESSURE SPT(< 8.8 Bar)</th>
           <th>SEAL PRESSURE SAPT(< 21Bar )</th>
           <th>OIL PRESSURE OPT(1.25-65 Bar)</th>
           <th>AIR SUPPLY(C)(< 8.8Bar)</th>
           <th>DIFF.PRESS.AIR FILTER (Inch H2O)</th>
           <th>DIFF.PRESS.OIL.FILTER(Inch H2O)</th>
           <th>DURATION LOW SPEED lMT(Mil/Um)</th>
           <th>DURATION HIGH SPEED_HVT(Mil/Um)</th>
           <th>INLET VALVE POSITION IVT(80-100%)</th>
           <th>UNLOAD VALVE POSITION UV(%)</th>
           <th>TRIP COUNTER</th>
           <th>SURGE COUNTER</th>
           <th>POWER ON</th>
           <th>RUNNING HOURS</th>
           <th>RESERVOIR OIL LEVEL</th>
           <th>DRAINT LP INTERCOOLER(YES)</th>
           <th>DRAINT HP INTERCOOLER</th>
           <th>voltage_l1_l2(6300V)</th>
           <th>voltage_l1_l3(6300V)</th>
           <th>voltage_ls_l3(6300V)</th>
           <th>motor_line_current_l1(71A)</th>
           <th>motor_line_current_l2(71A)</th>
           <th>motor_line_current_l3(71A)</th>
           <th>PF</th>
           <th>KWH</th>
           <th>Over All Result</th>
           <th>CHECKED BY</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
           <th>Shift Group</th>
           <th>Remarks</th>
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
     <td>{{ $job->param26 }}</td>
     <td>{{ $job->param27 }}</td>
     <td>{{ $job->param28 }}</td>
     <td>{{ $job->param29 }}</td>
     <td>{{ $job->param30 }}</td>
     <td>{{ $job->param31 }}</td>
     <td>{{ $job->param32 }}</td>     
     <td>{{ $job->overall_result }}</td>
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
     <td>{{ $job->remarks }}</td>
     <td>
       <a href="{{ route('jobs.editelliot',$job->id) }}" class="btn btn-primary btn-sm">Edit</a>       
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


