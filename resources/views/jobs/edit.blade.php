@extends('layouts.backend')
@section('content')
<div class="card">
  <div class="card-header">ZR-5 POLY (Edit)</div>       
  <div class="card-body">

  <form  action="{{ route('jobs.edit',$job) }}" method="post" enctype ="multipart/form-data">  
  @csrf     
  @method('put')
        <div class="form-group">
        <label for="tanggal">DATE/TIME</label>                  
        <input type='datetime-local' class='col-sm-4 form-control' name='tanggal' value= "{{ $job->tanggal }}" required/>     
        </div>
          <label for="idmachineno">CHECK LIST</label>
          <select name="idmachineno" id="idmachineno" class="col-sm-6 form-control"  value = "{{ $job->idmachineno }}"  >
            @foreach($machinedetailnos as $machinedetailno)
             <option value="{{ $machinedetailno->id }}">{{ $machinedetailno->name }}</option>
            @endforeach
          </select>          
        </div>
          <input type="hidden" name="idmachine" id="idmachine" class="form-control" value="{{ $job->idmachine }}" autofocus>          
          <input type="hidden" name="idmachinedetails" id="machineiddetails" class="form-control" value="{{ $job->idmachinedetails }}" autofocus>

        <div class="form-group">
          <label for="param1">Water Temp Compressor                                            (Max:50C)</label>
          <input type="decimal"  name="param1" id="param1" class="col-sm-4 form-control" value = "{{ $job->param1 }} "> 
        </div>

          <div class="form-group">
          <label for="param2">Water Temp Air Cooler                                        50 C</label>                   
          <input type="decimal"  name="param2" id="param2" class="col-sm-4 form-control" value = "{{ $job->param2 }}"> 
        </div>

          <div class="form-group">
          <label for="param3">Discharge Pressure (Max:10Bar)</label>
          <input type="decimal"  name="param3" id="param3" class="col-sm-4 form-control" value = "{{ $job->param3 }}" >
        </div>

          <div class="form-group">
          <label for="param4">Filter Indicator(Max:45mbar)</label>
          <input type="decimal"  name="param4" id="param4" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param4 }}">
        </div>

          <div class="form-group">
          <label for="param5">Intercooler Pressure Load(2-3Bar)</label>
          <input type="decimal" name="param5" id="param5" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param5 }}">
        </div>
        <div class="form-group">
          <label for="param6">intercooler Pressure Unload (2-3Bar)</label>
          <input type="decimal" name="param6" id="param6" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param6 }}">
        </div>

        <div class="form-group">
          <label for="param7">Running Time (Hour)</label>
          <input type="decimal" name="param7" id="param7" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param7 }}">
        </div>

        <div class="form-group">
          <label for="param8">Loading Time (Hour)</label>
          <input type="decimal" name="param8" id="param8" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param8 }}">
        </div>

        <div class="form-group">
          <label for="param9">Air temp LP Out(Max:230C)</label>
          <input type="decimal" name="param9" id="param9" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param9 }}">
        </div>
        <div class="form-group">
          <label for="param10">Air temp HP In(Max:50C)</label>
          <input type="decimal"  name="param10" id="param10" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param10 }}">
        </div>

          <div class="form-group">
          <label for="param11">Air temp HP Out(Max:230C)</label>
          <input type="decimal"  name="param11" id="param11" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param11 }}">
        </div>
          <div class="form-group">
          <label for="param12">Air temp Out(Max:50C)</label>
          <input type="decimal"  name="param12" id="param12" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param12 }}">
        </div>

          <div class="form-group">
          <label for="param13">Motor De Temp(Max:100C)</label>
          <input type="decimal"  name="param13" id="param13" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param13 }}">
        </div>




          <div class="form-group">
          <label for="param14">Motor Nde Temp(Max:100C)</label>
          <input type="decimal"  name="param14" id="param14" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param14 }}">
        </div>

          <div class="form-group">
          <label for="param15">Gear Box Temp(Max:100C)</label>
          <input type="decimal"  name="param15" id="param15" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param15 }}">
        </div>


          <div class="form-group">
          <label for="param16">Motor Line Current R (Max:690A)</label>
          <input type="decimal"  name="param16" id="param16" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param16 }}">
        </div>

        <div class="form-group">
          <label for="param17">Motor Line Current S (Max:690A)</label>
          <input type="decimal"  name="param17" id="param17" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param17 }}">
        </div>
          <div class="form-group">
          <label for="param18">Motor Line Current T (Max:690A)</label>
          <input type="decimal"  name="param18" id="param18" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param18 }}">
        </div>

          <div class="form-group">
          <label for="param19">KWH</label>
          <input type="decimal" name="param19" id="param19" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->param19 }}">
        </div>

          <div class="form-group">
          <label for="overall_result">Over All Result </label>
          <select name="overall_result" value = "{{ $job->overall_result }}">
            <option value="Normal">Normal</option>
            <option value="Abnormal">Abnormal</option>
          </select>
        </div>

        <div class="form-group">
          <label for="checked_by">CHECKED BY</label>
          <select name="checked_by" id="checked_by" class="col-sm-4 form-control" value = "{{ $job->checked_by }}">
          @foreach($employeeids as $employeeid)
             <option value="{{ $uk }}"> {{ $employeeid->surname }}  </option>
            @endforeach
          </select>          
          </div>
          <div class="form-group">
          <label for="group_leader">Group Leader</label>
          <select name="group_leader" id="group_leader" class="col-sm-4 form-control" value = "{{ $job->group_leader }}">
            @foreach($grupleaders as $grupleader)
             <option value="{{ $grupleader->employeeid }}"> {{ $grupleader->surname }} </option>
            @endforeach
          </select>          
        </div>

          <div class="form-group">
           <label for="supervisor">Supervisor</label>
            <select name="supervisor" id="supervisor" class="col-sm-4 form-control" value = "{{ $job->supervisor }}">
             @foreach($supervisors as $supervisor)
              <option value="{{ $supervisor->employeeid }}"> {{ $supervisor->surname }}</option>
             @endforeach
            </select>          
         </div>
          <div class="form-group">
           <label for="shift">Shift </label>
           <input type="number" name="shift" id="shift" value =  "{{ $job->shift }}" class="col-sm-4 form-control @error('') is invalid @enderror"  >
        </div>


        <div class="form-group">
          <label for="remarks">Remark </label>
          <input type="text" name="remarks" id="remarks" class="col-sm-4 form-control @error('') is invalid @enderror" value = "{{ $job->remarks }}">
        </div>
  
 </div>
 <button type= "submit" class="btn btn-success">Update </button>
 </div>
</form>

@endsection