@extends('layouts.backendgenset')
@section('content')
<div class="container">
<a href="{{ route('jobs.gasengine1')  }}" class="btn btn-success">Create</a>
<div class="row g-3 align-items-center mt-2">
  <div class="col-auto">
 <form action="{{ route('jobs.gasengine1view') }}" method="GET">        
  <select name="mesin_no" id="mesin_no" class="form-control">
   @foreach($machinedetailnos as $machinedetailno)
   <option value="{{ $machinedetailno->id }}"  @if($machinedetailno->id == $idmachineno) selected='selected' @endif >{{ $machinedetailno->name }}</option>                 
   @endforeach
  </select>            
  <button type="submit" class="btn btn-primary col-md-4"><i class="fa fa-print"></i> Filter </button>
</form>

  </div>
</div>

    <div class="card-header">Gas Engine1</div>       
    <div class="card-body">
    <table class="table table-dark table-striped">        
     <thead>
         <tr>
           <th>No</th>
           <th>Time</th>
           <th>Machine No.</th>
           <th>KWH</th>           
           <th>Speed</th>
           <th>Winding L1(75,2A)</th>
           <th>Winding L2(75,2A)</th>
           <th>Winding L3(75,2A)</th>
           <th>Generator Bearing De</th>
           <th>Generator Bearing Nde</th>
           <th>Voltage L1-L2</th>
           <th>Voltage L1-L3</th>
           <th>Voltage L2-L3(22A)</th>
           <th>Freq(50Hz)</th>
           <th>KW (Max:1063Kw)</th>
           <th>KVAR</th>
           <th>Power Factor</th>
           <th>Exctansion Voltage</th>           
           <th>Fuel Gas Press In</th>
           <th>Fuel Gas Press Bost</th>
           <th>Fuel Gas Mix Temp</th>           
           <th>Fuel Gas Percent Mix</th>
           <th>Fuel Gas Percent TB</th>
           <th>Fuel Gas Percent TV</th>
           <th>Jacket Water LT Temp</th>
           <th>Jacket Water LT Press </th>
           <th>LUB OIL TEMP(Norm:86,3C)</th>
           <th>LUB OIL Press</th>
           <th>Lub Oil level</th>
           <th>Intake Air Temp</th>
           <th>Intake Air Press</th>
           <th>Cylinder#1</th>
           <th>Cylinder#2</th>
           <th>Cylinder#3</th>
           <th>Cylinder#4</th>
           <th>Cylinder#5</th>
           <th>Cylinder#6</th>
           <th>Cylinder#7</th>
           <th>Cylinder#8</th>
           <th>Cylinder#9</th>
           <th>Cylinder#10</th>           
           <th>Cylinder#11</th>
           <th>Cylinder#12</th>
           <th>Cylinder#13</th>
           <th>Cylinder#14</th>
           <th>Cylinder#15</th>
           <th>Cylinder#16</th>
           <th>Cylinder#17</th>
           <th>Cylinder#18</th>
           <th>Cylinder#19</th>
           <th>Cylinder#20</th>           
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
     <td>{{ $job->overall_result }}</td>
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
     <td>{{ $job->remarks }}</td>
     <td>
       <a href="{{ route('jobs.editgasengine1',$job->id) }}" class="btn btn-primary btn-sm">Edit</a>       
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


