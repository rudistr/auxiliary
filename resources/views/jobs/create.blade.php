@extends('layouts.backend')
@section('content')
<div class="card">
    <div class="card-header">ZR-5 POLY (create)</div>       
    <div class="card-body">
    <form action="{{ route('jobs.create') }}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" class="form-control @error('') is invalid @enderror" value = "{{ $kode }}"  autofocus>                  
        <div class="form-group">
        <label for="tanggal">DATE/TIME</label>                  
        <input type='datetime-local' class='col-sm-4 form-control' name='tanggal' value='{{ @$row->tanggal }}' required/>     
          @error ('tanggal')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('tanggal')
        </div>
        <div class="form-group">
          <label for="idmachineno">CHECK LIST</label>
          <select name="idmachineno" id="idmachineno" class="col-sm-6 form-control">
            @foreach($machinedetailnos as $machinedetailno)
             <option value="{{ $machinedetailno->id }}">{{ $machinedetailno->name }}</option>
            @endforeach
          </select>          
        </div>
        @error ('idmachineno')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('idmachineno')
          <input type="hidden" name="idmachine" id="idmachine" class="form-control @error('') is invalid @enderror" value="{{ $machinedetailno->idmachine }}" autofocus>          
          <input type="hidden" name="idmachinedetails" id="machineiddetails" class="form-control @error('') is invalid @enderror" value="{{ $machinedetailno->idmachinedetails }}" autofocus>

        <div class="form-group">
          <label for="param1">Water Temp Compressor                                            (Max:50C)</label>
          <input type="decimal"  name="param1" id="param1" class="col-sm-4 form-control @error('') is invalid @enderror" value="{{ old('param1') }}">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

          <div class="form-group">
          <label for="param2">Water Temp Air Cooler                                        50 C</label>                   
          <input type="decimal"  name="param2" id="param2" class="col-sm-4 form-control @error('') is invalid @enderror"> 
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

          <div class="form-group">
          <label for="param3">Discharge Pressure (Max:10Bar)</label>
          <input type="decimal"  name="param3" id="param3" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')

          <div class="form-group">
          <label for="param4">Filter Indicator(Max:45mbar)</label>
          <input type="decimal"  name="param4" id="param4" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')

          <div class="form-group">
          <label for="param5">Intercooler Pressure Load(2-3Bar)</label>
          <input type="decimal" name="param5" id="param5" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')
        <div class="form-group">
          <label for="param6">intercooler Pressure Unload (2-3Bar)</label>
          <input type="decimal" name="param6" id="param6" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

        <div class="form-group">
          <label for="param7">Running Time (Hour)</label>
          <input type="decimal" name="param7" id="param7" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

        <div class="form-group">
          <label for="param8">Loading Time (Hour)</label>
          <input type="decimal" name="param8" id="param8" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

        <div class="form-group">
          <label for="param9">Air temp LP Out(Max:230C)</label>
          <input type="decimal" name="param9" id="param9" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')

        <div class="form-group">
          <label for="param10">Air temp HP In(Max:50C)</label>
          <input type="decimal"  name="param10" id="param10" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

          <div class="form-group">
          <label for="param11">Air temp HP Out(Max:230C)</label>
          <input type="decimal"  name="param11" id="param11" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')
          <div class="form-group">
          <label for="param12">Air temp Out(Max:50C)</label>
          <input type="decimal"  name="param12" id="param12" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')

          <div class="form-group">
          <label for="param13">Motor De Temp(Max:100C)</label>
          <input type="decimal"  name="param13" id="param13" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>

        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')



          <div class="form-group">
          <label for="param14">Motor Nde Temp(Max:100C)</label>
          <input type="decimal"  name="param14" id="param14" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')

          <div class="form-group">
          <label for="param15">Gear Box Temp(Max:100C)</label>
          <input type="decimal"  name="param15" id="param15" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror ('param15')


          <div class="form-group">
          <label for="param16">Motor Line Current R (Max:690A)</label>
          <input type="decimal"  name="param16" id="param16" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')

        <div class="form-group">
          <label for="param17">Motor Line Current S (Max:690A)</label>
          <input type="decimal"  name="param17" id="param17" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">Motor Line Current T (Max:690A)</label>
          <input type="decimal"  name="param18" id="param18" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">KWH</label>
          <input type="decimal" name="param19" id="param19" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')

          <div class="form-group">
          <label for="overall_result">Over All Result </label>
          <select name="overall_result">
            <option value="Normal">Normal</option>
            <option value="Abnormal">Abnormal</option>
          </select>
        </div>

        <div class="form-group">
          <label for="checked_by">CHECKED BY</label>
          <select name="checked_by" id="checked_by" class="col-sm-4 form-control">
            @foreach($employeeids as $employeeid)
             <option value="{{ $uk }}"> {{ $employeeid->surname }}  </option>
            @endforeach
          </select>          
          </div>

          </div>
          <div class="form-group">
          <label for="group_leader">Group Leader</label>
          <select name="group_leader" id="group_leader" class="col-sm-4 form-control" >
            @foreach($grupleaders as $grupleader)
             <option value="{{ $grupleader->employeeid }}"> {{ $grupleader->surname }} </option>
            @endforeach
          </select>          
        </div>


          <div class="form-group">
           <label for="supervisor">Supervisor</label>
            <select name="supervisor" id="supervisor" class="col-sm-4 form-control" >
             @foreach($supervisors as $supervisor)
              <option value="{{ $supervisor->employeeid }}"> {{ $supervisor->surname }}</option>
             @endforeach
            </select>          
         </div>

        @error ('supervisor')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('supervisor')

          
          <div class="form-group">
           <label for="shift">Shift </label>
           <input type="number" name="shift" id="shift" class="col-sm-4 form-control @error('') is invalid @enderror" value =  "{{ $shift }}" >
        </div>


        <div class="form-group">
          <label for="remarks">Remark </label>
          <input type="text" name="remarks" id="remarks" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('remarks')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('remarks')
          <button type="submit" class="btn btn-primary"> Save </button>        
     </form>
 </div>
 </div>

@endsection