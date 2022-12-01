@extends('layouts.backendgenset')
@section('content')
<div class="card">
    <div class="card-header">Diesel Engine 2</div>       
    <div class="card-body">
    <form action="{{ route('jobs.editdieselengine2',$job) }}" method="post">
        @csrf
        @method('put')
        <input type="hidden" name="id" id="id" class="form-control @error('') is invalid @enderror" value = "{{ $job->id}}"  autofocus>          
        <div class="form-group">
        <label for="tanggal">DATE/TIME</label>                  
        <input type='datetime-local' class='col-sm-4 form-control' name='tanggal' value='{{ $job->tanggal }}' required/>     
          @error ('tanggal')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('tanggal')
        </div>

        <div class="form-group">
          <label for="idmachineno">Machine ID No.</label>
          <select name="idmachineno" id="idmachineno" value = "{{ $job->idmachineno}}" class="col-sm-5 form-control">
            @foreach($machinedetailnos as $machinedetailno)
             <option value="{{ $machinedetailno->id }}">{{ $machinedetailno->name }}</option>
            @endforeach
          </select>          
        </div>
        @error ('idmachineno')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('idmachineno')
          <input type="hidden" name="idmachine" id="idmachine" value = "{{ $job->idmachine}}" class="form-control @error('') is invalid @enderror"  autofocus>
          <input type="hidden" name="idmachinedetails" id="machineiddetails" class="form-control @error('') is invalid @enderror" value="{{ $job->idmachinedetails }}" autofocus>

          <div class="form-group">
          <label for="param1">POWER GENERATED DIESEL ENGINE LOAD(KWH)</label>
          <input type="number"  name="param1" id="param1" value = "{{ $job->param1}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

        <div class="form-group">
          <label for="param2">POWER GENERATED DIESEL ENGINE LOAD</label>
          <input type="number"  name="param2" id="param2" value = "{{ $job->param2}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

        <div class="form-group">
          <label for="param3">AVR LOAD POWER GENERATED RH TODAY (KWH)</label>
          <input type="number"  name="param3" id="param3" value = "{{ $job->param3}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')


        <div class="form-group">
          <label for="param4">LOAD FACTOR.AVG LOAD (2920)(%)</label>
          <input type="number"  name="param4" id="param4" value = "{{ $job->param4}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')

          <div class="form-group">
          <label for="param5">BD FO</label>
          <input type="number"  name="param5" id="param5" value = "{{ $job->param5}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

          <div class="form-group">
          <label for="param6">FO CONSUMPTION (GR/KWH)</label>
          <input type="number"  name="param6" id="param6" value = "{{ $job->param6}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

        <div class="form-group">
          <label for="param7">RAW WTR PUMP#1 L1(36A)</label>
          <input type="number"  name="param7" id="param7" value = "{{ $job->param7}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

        <div class="form-group">
          <label for="param8">RAW WTR PUMP#1 L2(36A)</label>
          <input type="number"  name="param8" id="param8" value = "{{ $job->param8}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

        <div class="form-group">
          <label for="param9">RAW WTR PUMP#1 L3(36A) </label>
          <input type="number"  name="param9" id="param9" value = "{{ $job->param9}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')

        <div class="form-group">
          <label for="param10">C.TWR#1 L1(22A)</label>
          <input type="number" name="param10" id="param10" value = "{{ $job->param10}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

          <div class="form-group">
          <label for="param11">C.TWR#1 L2(22A)</label>
          <input type="number" name="param11" id="param11" value = "{{ $job->param11}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')

          <div class="form-group">
          <label for="param12">C.TWR#1 L3(22A)</label>
          <input type="number"  name="param12" id="param12" value = "{{ $job->param12}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')

        <div class="form-group">
          <label for="param13">C.TWR#2 L1(22A)</label>
          <input type="number"  name="param13" id="param13" value = "{{ $job->param13}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

        <div class="form-group">
          <label for="param14">C.TWR#2 L2(22A)</label>
          <input type="number"  name="param14" id="param14" value = "{{ $job->param14}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')

          <div class="form-group">
          <label for="param15">C.TWR#2 L3(22A)</label>
          <input type="number"  name="param15" id="param15" value = "{{ $job->param15}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

          <div class="form-group">
          <label for="param16">C.TWR#3 L1(22A)</label>
          <input type="number"  name="param16" id="param16" value = "{{ $job->param16}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')

          <div class="form-group">
          <label for="param17">C.TWR#3 L2(22A)</label>
          <input type="number"  name="param17" id="param17" value = "{{ $job->param17}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">C.TWR#3 L3(22A)</label>
          <input type="number" name="param18" id="param18" value = "{{ $job->param18}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">EXH FAN#1 L1</label>
          <input type="number"  name="param19" id="param19" value = "{{ $job->param19}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')

          <div class="form-group">
          <label for="param20">EXH FAN#1 L2</label>
          <input type="number"  name="param20" value = "{{ $job->param20}}" id="param20" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')

          <div class="form-group">
          <label for="param21">EXH FAN#1 L3</label>
          <input type="number"  name="param21" value = "{{ $job->param21}}" id="param21" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')

          <div class="form-group">
          <label for="param22">EXH FAN#2 L1</label>
          <input type="number"  name="param22" id="param22" value = "{{ $job->param22}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')


          <div class="form-group">
          <label for="param23">EXH FAN#2 L2</label>
          <input type="number"  name="param23" id="param23" value = "{{ $job->param23}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

          <div class="form-group">
          <label for="param24">EXH FAN#2 L3</label>
          <input type="number"  name="param24" id="param24" value = "{{ $job->param24}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param24')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param24')

        <div class="form-group">
          <label for="param25">EXH FAN#3 L1</label>
          <input type="number"  name="param25" id="param25" value = "{{ $job->param25}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>

        @error ('param25')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param25')

          <div class="form-group">
          <label for="param26">EXH FAN#3 L2</label>
          <input type="number"  name="param26" id="param26" value = "{{ $job->param26}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param26')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param26')

          <div class="form-group">
          <label for="param27">EXH FAN#3 L3</label>
          <input type="number"  name="param27" id="param27" value = "{{ $job->param27}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param27')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param27')

          <div class="form-group">
          <label for="param28">Down Time BD/HRS</label>
          <input type="number"  name="param28" id="param28" value = "{{ $job->param28}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param28')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param28')

          <div class="form-group">
          <label for="param29">Down Time CD/HRS</label>
          <input type="number"  name="param29" id="param29" value = "{{ $job->param29}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param29')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param29')



          <div class="form-group">
          <label for="param30">Down Time PM/HRS</label>
          <input type="number"  name="param30" id="param30" value = "{{ $job->param30}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param30')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param30')

          <div class="form-group">
          <label for="param31">Down Time SB/HRS</label>
          <input type="number"  name="param31" id="param31" value = "{{ $job->param31}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param31')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param31')


          <div class="form-group">
          <label for="param32">Life Time Lub Oil (HR) Turbo ChargeT</label>
          <input type="number"  name="param32" id="param32" value = "{{ $job->param32}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param32')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param32')

          <div class="form-group">
          <label for="param33">Life Time Lub Oil (HR) Crankcase </label>
          <input type="number"  name="param33" id="param33" value = "{{ $job->param33}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param33')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param33')

          <div class="form-group">
          <label for="param34">Life Time Lub Oil (HR) Alt Bearing</label>
          <input type="number"  name="param34" id="param34" value = "{{ $job->param34}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param34')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param34')

          <div class="form-group">
          <label for="param35">Centrifugal LO FILTER GR.Sludge</label>
          <input type="number"  name="param35" id="param35" value = "{{ $job->param35}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param35')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param35')


          <div class="form-group">
          <label for="param36">Centrifugal M/M Tickness Sludge</label>
          <input type="number"  name="param36" id="param36" value = "{{ $job->param36}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param36')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param36')

          <div class="form-group">
          <label for="param37">Centrifugal Filter Insert (PCS)</label>
          <input type="number"  name="param37" id="param37" value = "{{ $job->param37}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param37')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param37')

          <div class="form-group">
          <label for="param38">JAKET WTR.TEST SO.771 (DROP)</label>
          <input type="number"  name="param38" id="param38" value = "{{ $job->param38}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param38')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param38')

          <div class="form-group">
          <label for="param39">JAKET WTR.NITRE NO21(PPM)</label>
          <input type="number"  name="param39" id="param39" value = "{{ $job->param39}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param39')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param39')

          <div class="form-group">
          <label for="param40">JAKET WTR.CONDUCTIVITY(PPM)</label>
          <input type="number"  name="param40" id="param40" value = "{{ $job->param40}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param40')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param40')

          <div class="form-group">
          <label for="param41">JAKET WTR.MAKE-UP NALCOO(LTR)</label>
          <input type="number"  name="param41" id="param41" value = "{{ $job->param41}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param41')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param41')

          <div class="form-group">
          <label for="param42">LEVEL EXP.TANK</label>
          <input type="number"  name="param42" id="param42" value = "{{ $job->param42}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param42')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param42')

          <div class="form-group">
          <label for="param43">CT.NR</label>
          <input type="number"  name="param43" id="param43" value = "{{ $job->param43}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param43')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param43')

          <div class="form-group">
          <label for="param44">MAKE UP LO CONS.LV BEFORE</label>
          <input type="number"  name="param44" id="param44" value = "{{ $job->param44}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param44')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param44')

          <div class="form-group">
          <label for="param45">MAKE UP LO CONS.LV AFTER</label>
          <input type="number"  name="param45" id="param45" value = "{{ $job->param45}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param45')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param45')

          <div class="form-group">
          <label for="param46">MAKE UP LO (LTR)</label>
          <input type="number"  name="param46" id="param46" value = "{{ $job->param46}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param46')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param46')

          <div class="form-group">
          <label for="param47">MAKE UP LO (GR/KWH)</label>
          <input type="number"  name="param47" id="param47" value = "{{ $job->param47}}" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param47')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param47')

          <div class="form-group">
          <label for="overall_result">Over All Result </label>
          <select name="overall_result" value = "{{ $job->overall_result}}">
            <option value="Normal">Normal</option>
            <option value="Abnormal">Abnormal</option>
          </select>
        </div>

        @error ('overall_result')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('overall_result')

          <div class="form-group">
          <label for="checked_by">CHECKED BY</label>
          <select name="checked_by" id="checked_by" value = "{{ $job->checked_by}}" class="col-sm-4 form-control">
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
           <input type="number" name="shift" id="shift" value = "{{ $job->shift}}" class="col-sm-4 form-control @error('') is invalid @enderror"  >
        </div>

        <div class="form-group">
          <label for="remarks">Remarks </label>
          <input type="text" name="remarks" id="remarks" value = "{{ $job->remarks}}" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('remarks')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('remarks')

        <button type="submit" class="btn btn-primary"> Save </button>
     </form>
 </div>
 </div>

@endsection