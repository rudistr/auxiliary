@extends('layouts.backend')
@section('content')
<div class="card">
    <div class="card-header">DEMIN WATER</div>       
    <div class="card-body">
    <form action="{{ route('jobs.editdeminwater',$job) }}" method="post" enctype ="multipart/form-data">
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
          <select name="idmachineno" id="idmachineno" value='{{ $job->idmachineno }}' class="form-control">
            @foreach($machinedetailnos as $machinedetailno)
             <option value="{{ $machinedetailno->id }}">{{ $machinedetailno->name }}</option>
            @endforeach
          </select>          
        </div>
        @error ('idmachineno')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('idmachineno')          
          <input type="hidden" name="idmachine" id="idmachine" value='{{ $job->idmachine }}' class="form-control @error('') is invalid @enderror"  autofocus>
          <input type="hidden" name="idmachinedetails" id="machineiddetails" value='{{ $job->idmachinedetails }}' class="form-control @error('') is invalid @enderror"  autofocus>
        
          <div class="form-group">
          <label for="param1">SOFT WATER FLOW METER(M3)</label>
          <input type="number"  name="param1" id="param1" value='{{ $job->param1 }}' class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

        <div class="form-group">
          <label for="param2">SOFT WATER RANGE METER(M3)</label>
          <input type="number"  name="param2" id="param2" value='{{ $job->param2 }}' class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

        <div class="form-check">
        <input type="checkbox" class="form-check-input" id="param3" name="param3"  value='{{ $job->param3 }}' checked>
        <input type="hidden" class="form-check-input" id="param3" name="param3"  value = "0" >        
        <label class ="form-check-label" for="param3">SOFT WATER SERVICE A</label>          
        </div>

        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')

          <div class="form-check">
        <input type="checkbox" class="form-check-input" id="param4" name="param4"  value='{{ $job->param4 }}' checked>
        <input type="hidden" class="form-check-input" id="param4" name="param4"  value = "0" >        
        <label class ="form-check-label" for="param4">SOFT WATER SERVICE B</label>

        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')


        <div class="form-group">
          <label for="param5">SOFT WATER LEVEL SALT TANK (60-100 CM)</label>
          <input type="number" min = "60" max = "100" name="param5" id="param5" value='{{ $job->param5 }}' class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

        <div class="form-group">
          <label for="param6">DEMIN WATER CATION & ANION Flow Meter(M3)</label>
          <input type="number" name="param6" id="param6" value='{{ $job->param6 }}' class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

        <div class="form-group">
          <label for="param7">DEMIN WATER CATION & ANION Range Meter(M3)</label>
          <input type="number" name="param7" id="param7" value='{{ $job->param7 }}' class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

          <div class="form-group">
          <label for="param8">DEMIN WATER CATION & ANION COUNTER FO.15.11.1.1</label>
          <input type="number" name="param8" id="param8" value='{{ $job->param8 }}' class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

        <div class="form-group">
          <label for="param9">DEMIN WATER CATION & ANION CONDUCTIVITY (2,5mS/CM)</label>
          <input type="number" name="param9" id="param9" value='{{ $job->param9 }}' class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')

          <div class="form-group">
          <label for="param10">DEMIN WATER CATION MIX BED CONDUCTIVITY (1,5mS/CM)</label>
          <input type="number" name="param10" id="param10" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

          <div class="form-group">
          <label for="param11">DEMIN WATER WATER METER Temperature (60C)</label>
          <input type="number" name="param11" id="param11" value = "{{ $job->param11 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')

        <div class="form-group">
          <label for="param12">DEMIN WATER WATER METER Pressure(4-7Bar)</label>
          <input type="number"  name="param12" id="param12" value = "{{ $job->param12 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')

        <div class="form-group">
          <label for="param13">DEMIN WATER LEVEL CHEMICAL HCL(30CM)</label>
          <input type="number"  name="param13" id="param13" value = "{{ $job->param13 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

          <div class="form-group">
          <label for="param14">DEMIN WATER LEVEL CHEMICAL NaOH(30CM)</label>
          <input type="number"  name="param14" id="param14" value = "{{ $job->param14 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')

          <div class="form-group">
          <label for="param15">LEVEL DEMIN TANK(150-450CM)</label>
          <input type="number"  name="param15" id="param15" value = "{{ $job->param15 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

        <div class="form-group">
          <label for="param16">PRESS,DEMIN WTR PUMP #1(2-4Bar)</label>
          <input type="number"  name="param16" id="param16" value = "{{ $job->param16 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')

          <div class="form-group">
          <label for="param17">PRESS,DEMIN WTR PUMP #2(2-4Bar)</label>
          <input type="number"  name="param17" id="param17" value = "{{ $job->param17 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">PRESS,DEMIN WTR PUMP #3(2-4Bar)</label>
          <input type="number"  name="param18" id="param18" value = "{{ $job->param18 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">FLOW METER ARTESIS#1 Bengkel(M3)</label>
          <input type="number"  name="param19" id="param19" value = "{{ $job->param19 }}" class="form-control @error('') is invalid @enderror">
        </div>

        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')


          <div class="form-group">
          <label for="param20">FLOW METER ARTESIS#2 Utility(M3)</label>
          <input type="number"  name="param20" id="param20" value = "{{ $job->param20 }}" class="form-control @error('') is invalid @enderror">
        </div>

        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')

          <div class="form-group">
          <label for="param21">FLOW METER ARTESIS#6 Kantin(M3)</label>
          <input type="number"  name="param21" id="param21" value = "{{ $job->param21 }}" class="form-control @error('') is invalid @enderror">
        </div>

        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')


          <div class="form-group">
          <label for="param22">FM MESS</label>
          <input type="number"  name="param22" id="param22" value = "{{ $job->param22 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')

          <div class="form-group">
          <label for="param23">FM POLY</label>
          <input type="number"  name="param23" id="param23" value = "{{ $job->param23 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

          <div class="form-group">
          <label for="param24">FM SPD2</label>
          <input type="number"  name="param24" id="param24" value = "{{ $job->param24 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param24')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param24')

          <div class="form-group">
          <label for="param25">AIR MANCUR</label>
          <input type="number"  name="param25" id="param25" value = "{{ $job->param25 }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param25')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param25')


          <div class="form-group">
          <label for="cation_anion_mix_bed">CATION-ANION MIX BED</label>
          <input type="text"  name="cation_anion_mix_bed" id="cation_anion_mix_bed" value = "{{ $job->cation_anion_mix_bed }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('cation_anion_mix_bed')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('cation_anion_mix_bed')

          <div class="form-group">
          <label for="softener">SOFTENER</label>
          <input type="text"  name="softener" id="softener" value = "{{ $job->softener }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('softener')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('softener')

          <div class="form-group">
          <label for="chemical">CHEMICAL</label>
          <input type="text"  name="chemical" id="chemical" value = "{{ $job->chemical }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('chemical')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('chemical')

          <div class="form-group">
          <label for="catatan">CATATAN</label>
          <input type="text"  name="catatan" id="catatan" value = "{{ $job->catatan }}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('catatan')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('catatan')

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
           <input type="number" name="shift" id="shift" value = "{{ $job->shift }}" class="col-sm-4 form-control @error('') is invalid @enderror" value =  "{{ $job->shift }}" >
        </div>
        <button type="submit" class="btn btn-primary"> Save </button>
     </form>
 </div>
 </div>

@endsection