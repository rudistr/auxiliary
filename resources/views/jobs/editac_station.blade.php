@extends('layouts.backenddty1')
@section('content')
<div class="card">
    <div class="card-header">AC STATION</div>       
    <div class="card-body">
    <form action="{{ route('jobs.editac_station',$job) }}" method="post">
        @csrf
        @method('put')
        <input type="hidden" name="id" id="id" class="form-control @error('') is invalid @enderror" value = "{{ $job->id }}"  autofocus>          
        <div class="form-group">
        <label for="tanggal">DATE/TIME</label>                  
        <input type='datetime-local' class='col-sm-4 form-control' name='tanggal' value='{{ $job->tanggal }}' required/>     
          @error ('tanggal')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('tanggal')
        </div>

        <div class="form-group">
          <label for="idmachineno">MACHINE</label>
          <select name="idmachineno" id="idmachineno" value = "{{ $job->idmachineno }}" class="col-sm-5 form-control">
            @foreach($machinedetailnos as $machinedetailno)
             <option value="{{ $machinedetailno->id }}">{{ $machinedetailno->name }}</option>
            @endforeach
          </select>          
        </div>
        @error ('idmachineno')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('idmachineno')
          
          <input type="hidden" name="idmachine" id="idmachine" value = "{{ $job->idmachine }}" class="col-sm-5 form-control @error('') is invalid @enderror" value="{{ $machinedetailno->idmachine }}" autofocus>
          <input type="hidden" name="idmachinedetails" id="machineiddetails" value = "{{ $job->idmachinedetails }}" class="form-control @error('') is invalid @enderror" value="{{ $machinedetailno->idmachinedetails }}" autofocus>
        
        <div class="form-group">
          <label for="param1">INSTRUMENT MAIN PRESS(Max:2Bar)</label>
          <input type="decimal"  name="param1" id="param1" value = "{{ $job->param1 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

        <div class="form-group">
          <label for="param2">INSTRUMENT DEW POINT PRESS(Max:Bar)</label>
          <input type="decimal"  name="param2" id="param2"  value = "{{ $job->param2 }}"  class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

          <div class="form-group">
          <label for="param3">SPRAY WTR.PRESS(1,5-2Bar) </label>
          <input type="decimal"  name="param3" id="param3"  value = "{{ $job->param3 }}"  class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')

          <div class="form-group">
          <label for="param4">RH ROOM CONDITION (55-80%) </label>
          <input type="decimal" name="param4" id="param4"  value = "{{ $job->param4 }}"  class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')


        <div class="form-group">
          <label for="param5">TEMP.ROOM CONDITION (25+/-4C)</label>
          <input type="decimal"  name="param5" id="param5"  value = "{{ $job->param5 }}"  class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

          <div class="form-group">
          <label for="overall_result">OVER ALL RESULT </label>
          <select name="overall_result"  value = "{{ $job->overall_result }}" >
            <option value="Normal">Normal</option>
            <option value="Abnormal">Abnormal</option>
          </select>
        </div>

        @error ('overall_result')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('overall_result')

          <div class="form-group">
          <label for="checked_by">CHECKED BY</label>
          <select name="checked_by" id="checked_by"  value = "{{ $job->checked_by }}"  class="col-sm-4 form-control">
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
           <input type="number" name="shift" id="shift"  value = "{{ $job->shift }}"  class="col-sm-4 form-control @error('') is invalid @enderror" >
        </div>

        <div class="form-group">
          <label for="remarks">REMARKS </label>
          <input type="text" name="remarks" id="remarks"  value = "{{ $job->remarks }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('remarks')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('remarks')

        <button type="submit" class="btn btn-primary"> Save </button>
     </form>
 </div>
 </div>

@endsection