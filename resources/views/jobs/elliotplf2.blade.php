@extends('layouts.backendplf2')
@section('content')
<div class="card">
    <div class="card-header">ELLIOT</div>       
    <div class="card-body">
    <form action="{{ route('jobs.elliotplf2') }}" method="post">
        @csrf
        <input type="hidden" name="id" id="id" class="form-control @error('') is invalid @enderror" value = "{{ $kode }}"  autofocus>          
        <div class="form-group">
          <label for="idmachineno">MACHINE</label>
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
        <label for="tanggal">DATE/TIME</label>                  
        <input type='datetime-local' class='col-sm-4 form-control' name='tanggal' value='{{ @$row->tanggal }}' required/>     
          @error ('tanggal')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('tanggal')
        </div>


        <div class="form-group">
          <label for="param1">WATER SUPPLY IN TEMP(< 30 C)</label>
          <input type="decimal"  name="param1" id="param1" class="col-sm-1 form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

        <div class="form-group">
          <label for="param2">WATER SUPPLY OUT TEMP(< 58C)</label>
          <input type="decimal"  name="param2" id="param2" class="col-sm-1 form-control @error('') is invalid @enderror">
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

        <div class="form-group">
          <label for="param3">INLET OIL TEMP IOT (< 58C)</label>
          <input type="decimal"  name="param3" id="param3" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')


        <div class="form-group">
          <label for="param4">FINAL INTERSTAGE AIR TEMP IAT(< 50C)</label>
          <input type="decimal"  name="param4" id="param4" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')

        <div class="form-group">
          <label for="param5">WATER SUPPLY IN PRESSURE(3-4 bar)</label>
          <input type="decimal"  name="param5" id="param5" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

        <div class="form-group">
          <label for="param6">WATER SUPPLYY OUT PRESSURE(3-4,5Bar)</label>
          <input type="decimal"  name="param6" id="param6" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

        <div class="form-group">
          <label for="param7">DISCHARGE PRESSURE DPT (< 8.8 Bar)</label>
          <input type="decimal"  name="param7" id="param7" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

        <div class="form-group">
          <label for="param8">SYSTEM PRESSURE SPT (< 8.8 Bar)</label>
          <input type="decimal"   name="param8" id="param8" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

        <div class="form-group">
          <label for="param9">SEAL PRESSURE SAPT (< 21Bar )</label>
          <input type="decimal"  name="param9" id="param9" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')

          <div class="form-group">
          <label for="param10">OIL PRESSURE OPT(1.25-65 Bar)</label>
          <input type="decimal"  name="param10" id="param10" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

          <div class="form-group">
          <label for="param11">AIR SUPPLY(< 8.8Bar)</label>
          <input type="decimal" name="param11" id="param11" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')

          <div class="form-group">
          <label for="param12">DIFF.PRESS.AIR FILTER(Inch H2O)</label>
          <input type="decimal" name="param12" id="param12" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')


          <div class="form-group">
          <label for="param13">DIFF.PRESS.OIL.FILTER(Inch H20)</label>
          <input type="decimal"  name="param13" id="param13" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

          <div class="form-group">
          <label for="param14">DURATION LOW SPEED lMT(Mil/Um)</label>
          <input type="decimal"  name="param14" id="param14" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')

          <div class="form-group">
          <label for="param15">DURATION HIGH SPEED_HVT(Mil/Um)</label>
          <input type="decimal"  name="param15" id="param15" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

          <div class="form-group">
          <label for="param16">INLET VALVE POSITION IVT(80-100%)</label>
          <input type="decimal"  name="param16" id="param16" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')


          <div class="form-group">
          <label for="param17">UNLOAD VALVE POSITION UVT(%)</label>
          <input type="decimal"  name="param17" id="param17" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">TRIP COUNTER</label>
          <input type="decimal"  name="param18" id="param18" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">SURGE COUNTER</label>
          <input type="decimal" name="param19" id="param19" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')

          <div class="form-group">
          <label for="param20">POWER ON</label>
          <input type="decimal"  name="param20" id="param20" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')

          <div class="form-group">
          <label for="param21">RUNNING HOURS (hours)</label>
          <input type="decimal"  name="param21" id="param21" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')

          <div class="form-group">
          <label for="param22">RESERVOIR OIL LEVEL</label>
          <input type="decimal" name="param22" id="param22" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')

          <div class="form-group">
          <label for="param23">DRAINT LP INTERCOOLER (YES)</label>
          <input type="decimal"  name="param23" id="param23" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

          <div class="form-group">
          <label for="param24">DRAINT HP INTERCOOLER (YES)</label>
          <input type="decimal" name="param24" id="param24" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param24')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param24')

          <div class="form-group">
          <label for="param25">voltage_l1_l2 (6300V)</label>
          <input type="decimal"  name="param25" id="param25" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param25')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param25')

          <div class="form-group">
          <label for="param26">voltage_l1_l3(6300V)</label>
          <input type="decimal"  name="param26" id="param26" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param26')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param26')

          <div class="form-group">
          <label for="param27">voltage_ls_l3(6300V)</label>
          <input type="decimal"  name="param27" id="param27" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param27')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param27')

          <div class="form-group">
          <label for="param28">motor_line_current_l1(71A)</label>
          <input type="decimal" name="param28" id="param28" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param28')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param28')

          <div class="form-group">
          <label for="param29">motor_line_current_l2(71A)</label>
          <input type="decimal" name="param29" id="param29" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param29')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param29')

          <div class="form-group">
          <label for="param30">motor_line_current_l2(71A)</label>
          <input type="decimal" name="param30" id="param30" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param30')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param30')

          <div class="form-group">
          <label for="param31">PF</label>
          <input type="decimal" name="param31" id="param31" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param31')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param31')

          <div class="form-group">
          <label for="param32">KWH</label>
          <input type="decimal" name="param32" id="param32" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param32')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param32')

          <div class="form-group">
          <label for="overall_result">Over All Result </label>
          <select name="overall_result">
            <option value="Normal">Normal</option>
            <option value="Abnormal">Abnormal</option>
          </select>
        </div>

        @error ('overall_result')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('overall_result')

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

        <div class="form-group">
          <label for="remarks">Remarks </label>
          <input type="text" name="remarks" id="remarks" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('remarks')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('remarks')

        <button type="submit" class="btn btn-primary"> Save </button>
     </form>
 </div>
 </div>

@endsection