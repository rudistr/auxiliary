@extends('layouts.backendgenset')
@section('content')
<div class="container">
<a href="{{ route('jobs.dieselengine1')  }}" class="btn btn-success">Create</a>
<div class="row g-3 align-items-center mt-2">
  <div class="col-auto">
 <form action="{{ route('jobs.dieselengine1view') }}" method="GET">        
  <select name="mesin_no" id="mesin_no" class="form-control">
   @foreach($machinedetailnos as $machinedetailno)
   <option value="{{ $machinedetailno->id }}"  @if($machinedetailno->id == $idmachineno) selected='selected' @endif >{{ $machinedetailno->name }}</option>                 
   @endforeach
  </select>            
  <button type="submit" class="btn btn-primary col-md-4"><i class="fa fa-print"></i> Filter </button>
</form>

  </div>
</div>

    <div class="card-header">Diesel Engine1</div>       
    <div class="card-body">
    <table class="table table-dark table-striped">        
     <thead>
         <tr>
           <th>No</th>
           <th>Time</th>
           <th>Machine No.</th>
           <th>KWH</th>           
           <th>Speed TB1((Norm:1500rpm) (Trip:18000rpm))</th>
           <th>Speed TB2(Norm:1500rpm) (Trip:18000rpm)</th>
           <th>Speed Engine(Norm:1500rpm)(Trip:18000rpm)</th>
           <th>Air Press Start (Norm:1500rpm)(Trip:18000 rpm)</th>
           <th>Air Press Control (Norm:1500rpm)(Trip:18000 rpm)</th>
           <th>Fuel Oil Press(Norm:1500rpm)(Trip:18000 rpm)</th>
           <th>Fuel Oil Temp(Norm:1500rpm)(Trip:18000 rpm)</th>
           <th>Fuel Oil Pack</th>
           <th>Ambient Temp</th>
           <th>Generator Bearing Temp.De(Norm.39-75C) (Alarm:85CO(Trip:90C)</th>
           <th>Generator Bearing Temp.NDe(Norm.39-75C) (Alarm:85CO(Trip:90C)</th>
           <th>Voltage L1-L2(360-440V)</th>
           <th>Voltage L1-L3(360-440V)</th>
           <th>Voltage L2-L3(360-440V)</th>
           <th>Freq(50Hz,+/-3)</th>
           <th>MW(Norm:2,20MW)(Alarm:2,60MW)</th>
           <th>Ampere L1(Norm:220A)(Trip:418A)</th>
           <th>Ampere L2(Norm:220A)(Trip:418A)</th>
           <th>Ampere L3(Norm:220A)(Trip:418A)</th>
           <th>KVAR</th>
           <th>POWER FACTOR(Norm:0,85)(Trip:0,8)</th>
           <th>Part A Genset PCB Counter</th>           
           <th>Cooling WTR Press.WTR HE IN(Norm:2-3Bar)(Trip:0,5)</th>           
           <th>Cooling WTR Press.WTR HE OUT(Norm:0,9-3Bar)(Trip:0,5)</th>
           <th>Cooling WTR Temp.WTR HE IN(Norm:20-30C)(Trip:35C)</th>
           <th>Cooling WTR Temp.WTR HE OUT(Norm:0,5-2Bar)(Trip:0,5)</th>
           <th>Jaket WTR Press WTR He In(Norm:0,5-2Bar)(Trip:0,5Bar)</th>
           <th>Jaket WTR Press WTR He Out(Norm:0,5-2Bar)(Trip:0,5Bar)</th>
           <th>Jaket WTR Press In Engine</th>
           <th>Jaket WTR Temp.WTR He IN (Norm:75-85C) (Trip:95C)</th>
           <th>Jaket WTR Temp.Air Cooler In(Norm:39-60C) (Trip:63C)</th>
           <th>Jaket WTR Temp.Air Cooler Out (Norm:48-63C) (Trip:65C)</th>
           <th>Jaket WTR Temp.In Engine</th>
           <th>Jaket WTR Temp.Out Engine</th>
           <th>LUB OIL PRESS.IN ENGINE(Norm:3-5Bar)(Alarm:2Bar)(Trip:1Bar)</th>
           <th>LUB OIL FILL DIFF.PRESS(Norm:0,5-1,8Bar)(Alarm:1,8Bar)(Trip:2Bar)</th>
           <th>LUB OIL TEMP IN COOLER(Norm:72-80C)(Trip:90C)</th>
           <th>LUB OIL TEMP IN ENGINE(Norm:60-80C)(Trip:90C)</th>
           <th>Charge Air Press(Norm;0,7-1,5Bar)(Trip:1,9Bar)</th>
           <th>Charge Air Temp(Norm;42-75C)(Alarm:80C)</th>
           <th>Cylinder#1(Dev+/-50C)</th>
           <th>Cylinder#2(Dev+/-50C)</th>
           <th>Cylinder#3(Dev+/-50C)</th>
           <th>Cylinder#4(Dev+/-50C)</th>
           <th>Cylinder#5(Dev+/-50C)</th>           

           <th>Cylinder#6(Dev+/-50C)</th>           
           <th>Cylinder#7(Dev+/-50C)</th>
           <th>Cylinder#8(Dev+/-50C)</th>
           <th>Cylinder#9(Dev+/-50C)</th>
           <th>Cylinder#10(Dev+/-50C)</th>
           <th>Cylinder#11(Dev+/-50C)</th>
           <th>Cylinder#12(Dev+/-50C)</th>
           <th>Cylinder#13(Dev+/-50C)</th>
           <th>Cylinder#14(Dev+/-50C)</th>
           <th>Cylinder#15(Dev+/-50C)</th>
           <th>Cylinder#16(Dev+/-50C)</th>
           <th>TC#1</th>
           <th>TC#2</th>
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
     <td>{{ $job->param33 }}</td>
     <td>{{ $job->param34 }}</td>
     <td>{{ $job->param35 }}</td>     
     <td>{{ $job->param36 }}</td>
     <td>{{ $job->param37 }}</td>
     <td>{{ $job->param38 }}</td>     
     <td>{{ $job->param39 }}</td>
     <td>{{ $job->param40 }}</td>
     <td>{{ $job->param41 }}</td>
     <td>{{ $job->param42 }}</td>
     <td>{{ $job->param43 }}</td>
     <td>{{ $job->param44 }}</td>
     <td>{{ $job->param45 }}</td>
     <td>{{ $job->param46 }}</td>
     <td>{{ $job->param47 }}</td>     
     <td>{{ $job->param48 }}</td>
     <td>{{ $job->param49 }}</td>
     <td>{{ $job->param50 }}</td>
     <td>{{ $job->param51 }}</td>     
     <td>{{ $job->param52 }}</td>
     <td>{{ $job->param53 }}</td>
     <td>{{ $job->param54 }}</td>     
     <td>{{ $job->param55 }}</td>
     <td>{{ $job->param56 }}</td>
     <td>{{ $job->param57 }}</td>     
     <td>{{ $job->param58 }}</td>
     <td>{{ $job->param59 }}</td>
     <td>{{ $job->overall_result }}</td>
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
     <td>{{ $job->remarks }}</td>
     <td>
       <a href="{{ route('jobs.editdieselengine1',$job->id) }}" class="btn btn-primary btn-sm">Edit</a>       
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


