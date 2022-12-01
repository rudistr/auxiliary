@extends('layouts.backenddty1')
@section('content')

<div class="card">
    <div class="card-header">COMP IR (Edit)</div>       
    <div class="card-body">
    <form action="#" method="post" enctype ="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="id" id="id" class="form-control @error('') is invalid @enderror" value = "{{ $job->id }}"  autofocus>          
        <div class="form-group">
          <label for="idmachineno">CHECK LIST</label>
          <select name="idmachineno" id="idmachineno" value = "{{ $job->idmachineno }}" class="col-sm-6 form-control">
            @foreach($machinedetailnos as $machinedetailno)
             <option value="{{ $machinedetailno->id }}">{{ $machinedetailno->name }}</option>
            @endforeach
          </select>          
        </div>
        @error ('idmachineno')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('idmachineno')
          <input type="hidden" name="idmachine" id="idmachine" class="form-control @error('') is invalid @enderror" value="{{ $job->idmachine }}" autofocus>
          <input type="hidden" name="idmachinedetails" id="machineiddetails" class="form-control @error('') is invalid @enderror" value="{{ $job->idmachinedetails }}" autofocus>

          <div class="form-group">
        <label for="tanggal">DATE/TIME</label>                  
        <input type='datetime-local' class='col-sm-4 form-control' name='tanggal' value='{{ $job->tanggal }}' required/>     
          @error ('tanggal')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('tanggal')
        </div>


        <div class="form-group">
          <label for="param1">PRESS TANK (< 10BAR) </label>
          <input type="number"  name="param1" id="param1" value = "{{ $job->param1 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

          <div class="form-group">
          <label for="param2">PRESS SUMP</label>                   
          <input type="number"  name="param2" id="param2" value = "{{ $job->param2 }}" class="coform-control @error('') is invalid @enderror"> 
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

          <div class="form-group">
          <label for="param3">SEPERATOR DROP (< 1.0 Bar)</label>
          <input type="number"  name="param3" id="param3" value = "{{ $job->param3 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')

          <div class="form-group">
          <label for="param4">INLET VACUUM(< 0.10 bar)</label>
          <input type="number"  name="param4" id="param4" value = "{{ $job->param4 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')

          <div class="form-group">
          <label for="param5">INLET AIR FILTER(OK)</label>
          <input type="number" name="param5" id="param5" value = "{{ $job->param5 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

        <div class="form-group">
          <label for="param6">TOTAL HOURS </label>
          <input type="number" name="param6" id="param6" value = "{{ $job->param6 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

        <div class="form-group">
          <label for="param7">LOADED HOURS </label>
          <input type="number" name="param7" id="param7" value = "{{ $job->param7 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

        <div class="form-group">
          <label for="param8">%LOAD</label>
          <input type="number" name="param8" id="param8" value = "{{ $job->param8 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

        <div class="form-group">
          <label for="param9">UNLOAD(Max:1Bar)</label>
          <input type="number" name="param9" id="param9" value = "{{ $job->param9 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')

        <div class="form-group">
          <label for="param10">COOL WTR TEMP IN (Max:30C)</label>
          <input type="number"  name="param10" id="param10" value = "{{ $job->param10 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

          <div class="form-group">
          <label for="param11">COOL WTR TEMP.OUT(Max:50C)</label>
          <input type="number"  name="param11" id="param11" value = "{{ $job->param11 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')
          <div class="form-group">
          <label for="param12">PRESS.COOL WTR PUMP #1(2-3.5 Bar)</label>
          <input type="number"  name="param12" id="param12" value = "{{ $job->param12 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')

          <div class="form-group">
          <label for="param13">PRESS.COOL WTR PUMP #2(2-3.5 Bar)</label>
          <input type="number"  name="param13" id="param13" value = "{{ $job->param13 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>

        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

          <div class="form-group">
          <label for="param14">PRESS.COOL WTR PUMP #3(2-3.5 Bar)</label>
          <input type="number"  name="param14" id="param14" value = "{{ $job->param14 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')

          <div class="form-group">
          <label for="param15">Moisture Trap (OK)</label>
          <input type="number"  name="param15" id="param15" value = "{{ $job->param15 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

          <div class="form-group">
          <label for="param16">OIL LEVEL (60-100%)</label>
          <input type="number"  name="param16" id="param16" value = "{{ $job->param16 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')

        <div class="form-group">
          <label for="param17">DISCHARGE TEMP.PACK (Max:45C)</label>
          <input type="number"  name="param17" value = "{{ $job->param17 }}" id="param17" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">DISCHARGE TEMP AIR END (Max:105C)</label>
          <input type="number"  name="param18" value = "{{ $job->param18 }}" id="param18" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">INJECT COOLANT TEMP (MAX:80C)</label>
          <input type="number" name="param19" value = "{{ $job->param19 }}" id="param19" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')

          <div class="form-group">
          <label for="param20">MOTOR LINE CURRENT R (MAX:780A)</label>
          <input type="number" name="param20" value = "{{ $job->param20 }}" id="param20" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')

          <div class="form-group">
          <label for="param21">MOTOR LINE CURRENT S (MAX:780A)</label>
          <input type="number" name="param21" value = "{{ $job->param21 }}" id="param21" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')

          <div class="form-group">
          <label for="param22">MOTOR LINE CURRENT T (MAX:780A)</label>
          <input type="number" name="param22" id="param22" value = "{{ $job->param22 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')

          <div class="form-group">
          <label for="param23">KWH</label>
          <input type="number" name="param23" id="param23" value = "{{ $job->param23 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

          <div class="form-group">
          <label for="param24">BEARING TEMP.AIR end LP (MAX:80)</label>
          <input type="number" name="param24" id="param24" value = "{{ $job->param24 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param24')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param24')

          <div class="form-group">
          <label for="param25">BEARING TEMP.AIR END HP (MAX:80)</label>
          <input type="number" name="param25" id="param25" value = "{{ $job->param25 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param25')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param25')

          <div class="form-group">
          <label for="param26">BEARING TEMP MOTOR DE (MAX:80)</label>
          <input type="number" name="param26" id="param26" value = "{{ $job->param26 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param26')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param26')

          <div class="form-group">
          <label for="param27">BEARING TEMP MOTOR NDE (MAX:80)</label>
          <input type="number" name="param27" id="param27" value = "{{ $job->param27 }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('param27')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param27')
          <div class="form-group">
          
          <label for="overall_result">Over All Result </label>
          <select name="overall_result" value = "{{ $job->overall_result }}">
            <option value="Normal">Normal</option>
            <option value="Abnormal">Abnormal</option>
          </select>
        </div>

        @error ('overall_result')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('overall_result')

          <div class="form-group">
          <label for="shift">shift </label>
          <input type="text" name="shift" value = "{{ $job->shift }}" id="remarks" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('shift')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('shift')


          <div class="form-group">
          <label for="checked_by">CHECKED BY</label>
          <select name="checked_by" id="checked_by" value = "{{ $job->checked_by }}" class="col-sm-4 form-control">
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
          <label for="remarks">Remarks </label>
          <input type="text" name="remarks" value = "{{ $job->remarks }}" id="remarks" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>
        @error ('remarks')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('remarks')

        <button type="submit" class="btn btn-primary"> Save </button>
     </form>
 </div>
 </div>

@endsection