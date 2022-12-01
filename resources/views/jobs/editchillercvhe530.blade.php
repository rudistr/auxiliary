@extends('layouts.backenddty1')
@section('content')
<div class="card">
    <div class="card-header">CVHE-530</div>       
    <div class="card-body">
    <form action="{{ route('jobs.editchillercvhe530',$job) }}" method="post">
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
          <label for="idmachineno">Machine ID No.</label>
          <select name="idmachineno" id="idmachineno" value = "{{ $job->idmachineno }}" class="col-sm-5 form-control">
            @foreach($machinedetailnos as $machinedetailno)
             <option value="{{ $machinedetailno->id }}">{{ $machinedetailno->name }}</option>
            @endforeach
          </select>          
        </div>
        @error ('idmachineno')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('idmachineno')
          <input type="hidden" name="idmachine" id="idmachine" value = "{{ $job->idmachine }}" class="form-control @error('') is invalid @enderror"  autofocus>
          <input type="hidden" name="idmachinedetails" id="machineiddetails" value = "{{ $job->idmachinedetails }}" class="form-control @error('') is invalid @enderror"  autofocus>

          <div class="form-group">
          <label for="param1">CONDENSATOR WTR TEMP IN (Max:31C)</label>
          <input type="decimal"  name="param1" id="param1" value = "{{ $job->param1 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

        <div class="form-group">
          <label for="param2">CONDENSATOR WTR TEMP OUT (Max:35C)</label>
          <input type="decimal"  name="param2" id="param2" value = "{{ $job->param2 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

        <div class="form-group">
          <label for="param3">CONDENSATOR WTR PRESS IN (DP< 1,6Bar)</label>
          <input type="decimal"  name="param3" id="param3" value = "{{ $job->param3 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')


        <div class="form-group">
          <label for="param4">CONDENSATOR WTR PRESS OUT (DP< 1,6Bar)</label>
          <input type="decimal"  name="param4" id="param4" value = "{{ $job->param4 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')

        <div class="form-group">
          <label for="param5">REFRIGERANT GAUGE EVAP(11-18 Bar)</label>
          <input type="decimal"  name="param5" id="param5" value = "{{ $job->param5 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

        <div class="form-group">
          <label for="param6">REFRIGERANT GAUGE CDS(11-18 Bar)</label>
          <input type="decimal"  name="param6" id="param6" value = "{{ $job->param6 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

        <div class="form-group">
          <label for="param7">CHILLED WTR TEMP SET POINT(MAX< 14C)</label>
          <input type="decimal"  name="param7" id="param7" value = "{{ $job->param7 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

        <div class="form-group">
          <label for="param8">LOW OIL PRESS (>10 iNhG) </label>
          <input type="decimal"  name="param8" id="param8" value = "{{ $job->param8 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

        <div class="form-group">
          <label for="param9">High OIL PRESS (>10 iNhG)</label>
          <input type="decimal" name="param9" id="param9" value = "{{ $job->param9 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')

          <div class="form-group">
          <label for="param10">NET OIL PRESS (>10 iNhG)</label>
          <input type="decimal" name="param10" id="param10" value = "{{ $job->param10 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

          <div class="form-group">
          <label for="param11">OIL LEVEL INSUMP (>50 %)</label>
          <input type="decimal"  name="param11" id="param11" value = "{{ $job->param11 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')

        <div class="form-group">
          <label for="param12">OIL TEMP INSUMP(47-66C)</label>
          <input type="decimal"  name="param12" id="param12" value = "{{ $job->param12 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')

        <div class="form-group">
          <label for="param13">PURGE METER</label>
          <input type="decimal"  name="param13" id="param13" value = "{{ $job->param13 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

          <div class="form-group">
          <label for="param14">RUNNING TIME (HOUR)</label>
          <input type="decimal"  name="param14" id="param14" value = "{{ $job->param14 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')

          <div class="form-group">
          <label for="param15">CHILLED WATER TEMP IN (< 21C)</label>
          <input type="decimal"  name="param15" id="param15" value = "{{ $job->param15 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

          <div class="form-group">
          <label for="param16">CHILLED WATER TEMP OUT (< 14C)</label>
          <input type="decimal" name="param16" id="param16" value = "{{ $job->param16 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')

          <div class="form-group">
          <label for="param17">CHILLED WATER PRESS IN (DP< 1,1Bar)</label>
          <input type="decimal"  name="param17" id="param17" value = "{{ $job->param17 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">CHILLED WATER PRESS OUT (DP < 1,1Bar)</label>
          <input type="decimal"  name="param18" id="param18" value = "{{ $job->param18 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">COMPRESSOR LINE CURRENTS L1 (Max:626A)</label>
          <input type="decimal"  name="param19" id="param19" value = "{{ $job->param19 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')

          <div class="form-group">
          <label for="param20">COMPRESSOR LINE CURRENTS L2 (Max:626A)</label>
          <input type="decimal"  name="param20" id="param20" value = "{{ $job->param20 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')


          <div class="form-group">
          <label for="param21">COMPRESSOR LINE CURRENTS L3 (Max:626A)</label>
          <input type="decimal"  name="param21" id="param21" value = "{{ $job->param21 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')

          <div class="form-group">
          <label for="param22">KWH</label>
          <input type="decimal"  name="param22" id="param22" value = "{{ $job->param22 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')

        <div class="form-group">
          <label for="param23">INJECT CHEMICAL</label>
          <input type="decimal"  name="param23" id="param23" value = "{{ $job->param23 }}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>

        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

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
           <label for="shift">Shift </label>
           <input type="number" name="shift" id="shift" value = "{{ $job->shift }}" class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>

        <div class="form-group">
          <label for="remarks">Remarks </label>
          <input type="text" name="remarks" id="remarks" value = "{{ $job->remarks }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('remarks')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('remarks')

        <button type="submit" class="btn btn-primary"> Save </button>
     </form>
 </div>
 </div>

@endsection