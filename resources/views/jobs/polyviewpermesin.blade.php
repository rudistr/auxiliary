@extends('layouts.backendreport')
@section('content')
<div class="container">
<td>
      <a href="{{ route('jobs.create')  }}" class="btn btn-success">Create</a>
</td> 
<form action="{{ route('jobs.polyviewpermesin') }}" method="GET" target="_blank" enctype="multipart/form-data">        
@csrf
<div class ="mb-2">
          <label for="idmachineno">Mesin No.</label>
          <select name="idmachineno" id="idmachineno" class="col-sm-6 form-control " value="{{ old('idmachineno') }}" >
            @foreach($machinedetailnos as $machinedetailno)
             <option value="{{ $machinedetailno->id }}">{{ $machinedetailno->name }}</option>
            @endforeach
          </select>          
          <button type="submit" class="btn btn-primary col-md-12"><i class="fa fa-print"></i> Preview </button>
       </div>
       </form>
<div class="card-header">DATA ZR5 POLY</div>       
    <div class="card-body">
    <table class="table table-dark table-striped">        
     <thead>
         <tr>
          <th>No</th>
           <th>Time</th>
           <th>Machine_no</th>
           <th>WTC</th>
           <th>WTAC</th>
           <th>Disch.Press</th>
           <th>Filt.Indict(Max:45mbar)</th>
           <th>Intcooler Press Load(2-3Bar)</th> 
           <th>interc Press Unload (2-3Bar)</th>
           <th>Running Time (Hour)</th>
           <th>Loading Time (Hour)</th>
           <th>Air temp LP Out(Max:230C)</th>
           <th>Air temp HP In(Max:50C)</th>
           <th>Air temp HP Out(Max:230C)</th>
           <th>Air temp Out(Max:50C)</th>
           <th>Motor De Temp(Max:100C)</th>
           <th>Motor Nde Temp(Max:100C)</th>
           <th>Gear Box Temp(Max:100C)</th>
           <th>Motor Line Current R (Max:690A)</th>
           <th>Motor Line Current S (Max:690A)</th>
           <th>Motor Line Current T (Max:690A)</th>
           <th>KWH</th>
           <th>OVER ALL RESULT</th>           
           <th>Checked By</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
           <th>Shift</th>                                 
           <th>Remarks</th>           
           <th>Edit</th>
        </tr>
</thead>
<tbody>
    @foreach($datajobs as  $job)
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
     <td>{{ $job->overall_result }}</td>
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
     <td>{{ $job->remarks }}</td>     
     <td>
       <a href="{{ route('jobs.edit',$job->id) }}" class="btn btn-primary btn-sm">Edit</a>
     </td>                  
    <tr>
    @endforeach
</tbody>
</table>
{{ $datajobs->links()}}
</div>
</div>
@endsection

