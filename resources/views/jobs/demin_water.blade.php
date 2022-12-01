@extends('layouts.backend')
@section('content')
<div class="card">
    <div class="card-header">DEMIN WATER</div>       
    <div class="card-body">
    <form action="{{ route('jobs.demin_water') }}" method="post">
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
          <label for="idmachineno">Machine ID No.</label>
          <select name="idmachineno" id="idmachineno" class="form-control">
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
          <label for="param1">SOFT WATER FLOW METER(M3)</label>
          <input type="number"  name="param1" id="param1" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

        <div class="form-group">
          <label for="param2">SOFT WATER RANGE METER(M3)</label>
          <input type="number"  name="param2" id="param2" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

        <div class="form-check">
        <input type="checkbox" class="form-check-input" id="param3" name="param3"  value = "1" checked>
        <input type="hidden" class="form-check-input" id="param3" name="param3"  value = "0" >        
        <label class ="form-check-label" for="param3">SOFT WATER SERVICE A</label>          
        </div>

        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')

          <div class="form-check">
        <input type="checkbox" class="form-check-input" id="param4" name="param4"  value = "1" checked>
        <input type="hidden" class="form-check-input" id="param4" name="param4"  value = "0" >        
        <label class ="form-check-label" for="param4">SOFT WATER SERVICE B</label>

        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')


        <div class="form-group">
          <label for="param5">SOFT WATER LEVEL SALT TANK (60-100 CM)</label>
          <input type="number"  name="param5" id="param5" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

        <div class="form-group">
          <label for="param6">DEMIN WATER CATION & ANION Flow Meter(M3)</label>
          <input type="number" name="param6" id="param6" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

        <div class="form-group">
          <label for="param7">DEMIN WATER CATION & ANION Range Meter(M3)</label>
          <input type="number" name="param7" id="param7" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

          <div class="form-group">
          <label for="param7">DEMIN WATER CATION & ANION COUNTER FO.15.11.1.1</label>
          <input type="number" name="param8" id="param8" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

        <div class="form-group">
          <label for="param9">DEMIN WATER CATION & ANION CONDUCTIVITY (2,5mS/CM)</label>
          <input type="number" name="param9" id="param9" class="form-control @error('') is invalid @enderror">
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
          <input type="number" name="param11" id="param11" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')

        <div class="form-group">
          <label for="param12">DEMIN WATER WATER METER Pressure(4-7Bar)</label>
          <input type="number"  name="param12" id="param12" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')

        <div class="form-group">
          <label for="param13">DEMIN WATER LEVEL CHEMICAL HCL(30CM)</label>
          <input type="number"  name="param13" id="param13" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

          <div class="form-group">
          <label for="param14">DEMIN WATER LEVEL CHEMICAL NaOH(30CM)</label>
          <input type="number"  name="param14" id="param14" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')

          <div class="form-group">
          <label for="param15">LEVEL DEMIN TANK(150-450CM)</label>
          <input type="number"  name="param15" id="param15" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

        <div class="form-group">
          <label for="param16">PRESS,DEMIN WTR PUMP #1(2-4Bar)</label>
          <input type="number"  name="param16" id="param16" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')

          <div class="form-group">
          <label for="param17">PRESS,DEMIN WTR PUMP #2(2-4Bar)</label>
          <input type="number"  name="param17" id="param17" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">PRESS,DEMIN WTR PUMP #3(2-4Bar)</label>
          <input type="number"  name="param18" id="param18" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">FLOW METER ARTESIS#1 Bengkel(M3)</label>
          <input type="number"  name="param19" id="param19" class="form-control @error('') is invalid @enderror">
        </div>

        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')


          <div class="form-group">
          <label for="param20">FLOW METER ARTESIS#2 Utility(M3)</label>
          <input type="number"  name="param20" id="param20" class="form-control @error('') is invalid @enderror">
        </div>

        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')

          <div class="form-group">
          <label for="param21">FLOW METER ARTESIS#6 Kantin(M3)</label>
          <input type="number"  name="param21" id="param21" class="form-control @error('') is invalid @enderror">
        </div>

        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')


          <div class="form-group">
          <label for="param22">FM MESS</label>
          <input type="number"  name="param22" id="param22" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')

          <div class="form-group">
          <label for="param23">FM POLY</label>
          <input type="number"  name="param23" id="param23" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

          <div class="form-group">
          <label for="param24">FM SPD2</label>
          <input type="number"  name="param24" id="param24" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param24')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param24')

          <div class="form-group">
          <label for="param25">AIR MANCUR</label>
          <input type="number"  name="param25" id="param25" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param25')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param25')


          <div class="form-group">
          <label for="cation_anion_mix_bed">CATION-ANION MIX BED</label>
          <input type="text"  name="cation_anion_mix_bed" id="cation_anion_mix_bed" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('cation_anion_mix_bed')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('cation_anion_mix_bed')

          <div class="form-group">
          <label for="softener">SOFTENER</label>
          <input type="text"  name="softener" id="softener" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('softener')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('softener')

          <div class="form-group">
          <label for="chemical">CHEMICAL</label>
          <input type="text"  name="chemical" id="chemical" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('chemical')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('chemical')

          <div class="form-group">
          <label for="catatan">CATATAN</label>
          <input type="text"  name="catatan" id="catatan" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('catatan')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('catatan')

          <div class="form-group">
          <label for="checked_by">CHECKED BY</label>
          <select name="checked_by" id="checked_by" class="col-sm-4 form-control">
            @foreach($employeeids as $employeeid)
             <option value="{{ $uk }}"> {{ $employeeid->surname }}  </option>
            @endforeach
          </select>          
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

        <button type="submit" class="btn btn-primary"> Save </button>
     </form>
 </div>
 </div>

@endsection