@extends('layouts.backenddty1')
@section('content')
<div class="card">
    <div class="card-header">Water Treatment</div>       
    <div class="card-body">
    <form action="{{ route('jobs.wt') }}" method="post">
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
          <select name="idmachineno" id="idmachineno" class="col-sm-5 form-control">
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
          <label for="param1">Fresh WTR TANK (4-6 Bar)</label>
          <input type="decimal"  name="param1" id="param1" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

          <div class="form-group">
          <label for="param2">HYDRANT WTR TANK (6-8 Bar) </label>
          <input type="decimal"  name="param2" id="param2" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

          <div class="form-group">
          <label for="param3">CaOcl2 Tank Level (15-80CM) </label>
          <input type="decimal"  name="param3" id="param3" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')


        <div class="form-group">
          <label for="param4">Flow Meter Soft WTR A(M3)</label>
          <input type="decimal"  name="param4" id="param4" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')

        <div class="form-group">
          <label for="param5">Flow Meter Soft WTR B(M3)</label>
          <input type="decimal"  name="param5" id="param5" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

          <div class="form-group">
          <label for="param6">Flow Meter Soft WTR C(M3)</label>
          <input type="decimal"  name="param6" id="param6" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

          <div class="form-group">
          <label for="param7">Flow Meter Fresh WTR A(M3)</label>
          <input type="decimal"  name="param7" id="param7" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

          <div class="form-group">
          <label for="param8">Flow Meter Fresh WTR B(M3)</label>
          <input type="decimal"  name="param8" id="param8" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

          <div class="form-group">
          <label for="param9">Flow Meter Fresh ARTESIS#3 WT (M3) </label>
          <input type="decimal"  name="param9" id="param9" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')


        <div class="form-group">
          <label for="param10">Flow Meter Fresh ARTESIS#4 GENSET(M3)</label>
          <input type="decimal"  name="param10" id="param10" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

        <div class="form-group">
          <label for="param11">Flow Meter Fresh ARTESIS#8 DTY 1(M3)</label>
          <input type="decimal"  name="param11" id="param11" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')



          <div class="form-group">
          <label for="param12">Raw Meter Pump#1</label>
          <select name="param12">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')

          <div class="form-group">
          <label for="param13">Raw Meter Pump#2 </label>
          <select name="param13">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

          <div class="form-group">
          <label for="param14">FILTER WATER PUMP#1 </label>
          <select name="param14">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')


          <div class="form-group">
          <label for="param15">FILTER WATER PUMP#2 </label>
          <select name="param15">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

          <div class="form-group">
          <label for="param16">FRESH WATER PUMP#1 </label>
          <select name="param16">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')

          <div class="form-group">
          <label for="param17">FRESH WATER PUMP#2 </label>
          <select name="param17">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">FRESH WATER PUMP#3 </label>
          <select name="param18">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">FRESH WATER PUMP#4 </label>
          <select name="param19">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')

          <div class="form-group">
          <label for="param20">SOFT WATER PUMP#1 </label>
          <select name="param20">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')

          <div class="form-group">
          <label for="param21">SOFT WATER PUMP#2 </label>
          <select name="param21">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')

          <div class="form-group">
          <label for="param22">SOFT WATER PUMP#3 </label>
          <select name="param22">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')


          <div class="form-group">
          <label for="param23">BW PUMP </label>
          <select name="param23">
             <option value="1">V </option>
             <option value="2">X</option>
          </select>
        </div>
        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

          <div class="form-group">
          <label for="param24">FM OFFICE BARU </label>
          <input type="text" name="param24" id="param24" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param24')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param24')


          <div class="form-group">
          <label for="param25">RAW WATER PUMP #1 </label>
          <select name="param25">
             <option value="1">RUNNING </option>
             <option value="2">STANDBY</option>
             <option value="3">SERVICE</option>
          </select>
        </div>
        @error ('param25')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param25')

          <div class="form-group">
          <label for="chemical">Chemical </label>
          <input type="text" name="chemical" id="chemical" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('chemical')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('chemical')

          <div class="form-group">
          <label for="scfilter">S/C FILTER </label>
          <input type="text" name="scfilter" id="scfilter" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('scfilter')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('scfilter')
          
          <div class="form-group">
          <label for="softener">Softener </label>
          <input type="text" name="softener" id="softener" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('softener')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('softener')

          <div class="form-group">
          <label for="bak_sedimentasi">Bak Sedimentasi </label>
          <input type="text" name="bak_sedimentasi" id="bak_sedimentasi" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('bak_sedimentasi')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('bak_sedimentasi')

          <div class="form-group">
          <label for="catatan">Catatan </label>
          <input type="text" name="catatan" id="catatan" class="form-control @error('') is invalid @enderror">
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