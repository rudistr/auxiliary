@extends('layouts.backendgenset')
@section('content')
<div class="card">
    <div class="card-header">Gas Engine 1</div>       
    <div class="card-body">
    <form action="{{ route('jobs.editgasengine1',$job) }}" method="post">
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
          <select name="idmachineno" id="idmachineno" value='{{ $job->idmachineno }}' class="col-sm-5 form-control">
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
          <label for="param1">KWH</label>
          <input type="decimal"  name="param1" id="param1" value='{{ $job->param1 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

        <div class="form-group">
          <label for="param2">Speed (Norm:1500rpm) (Trip:18000rpm)</label>
          <input type="decimal"  name="param2" id="param2" value='{{ $job->param2 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

        <div class="form-group">
          <label for="param3">Winding L1(75,2A)</label>
          <input type="decimal"  name="param3" id="param3" value='{{ $job->param3 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')


        <div class="form-group">
          <label for="param4">Winding L2(75,2A)</label>
          <input type="decimal"  name="param4" id="param4" value='{{ $job->param4 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')

          <div class="form-group">
          <label for="param5">Winding L3(75,2A)</label>
          <input type="decimal"  name="param5" id="param5" value='{{ $job->param5 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

          <div class="form-group">
          <label for="param6">Generator Bearing De</label>
          <input type="decimal"  name="param6" id="param6" value='{{ $job->param6 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

        <div class="form-group">
          <label for="param7">Generator Bearing Nde</label>
          <input type="decimal"  name="param7" id="param7" value='{{ $job->param7 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

        <div class="form-group">
          <label for="param8">Voltage L1-L2(360-440V)</label>
          <input type="decimal"  name="param8" id="param8" value='{{ $job->param8 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

        <div class="form-group">
          <label for="param9">Voltage L1-L3(360-440V) </label>
          <input type="decimal"  name="param9" id="param9" value='{{ $job->param9 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')

        <div class="form-group">
          <label for="param10">Voltage L2-L3(360-440V)</label>
          <input type="decimal" name="param10" id="param10" value='{{ $job->param10 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

          <div class="form-group">
          <label for="param11">Freq(50Hz)</label>
          <input type="decimal" name="param11" id="param11" value='{{ $job->param11 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')

          <div class="form-group">
          <label for="param12">KW (Max:1063Kw)</label>
          <input type="decimal"  name="param12" id="param12" value='{{ $job->param12 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')

        <div class="form-group">
          <label for="param13">KVAR</label>
          <input type="decimal"  name="param13" id="param13" value='{{ $job->param13 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

        <div class="form-group">
          <label for="param14">Power Factor (+/-0,85)</label>
          <input type="decimal"  name="param14" id="param14" value='{{ $job->param14 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')

          <div class="form-group">
          <label for="param15">Exctansion Voltage(+/-0,85)</label>
          <input type="decimal"  name="param15" id="param15" value='{{ $job->param15 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

          <div class="form-group">
          <label for="param16">Fuel Gas Press In(Norm:2B)</label>
          <input type="decimal"  name="param16" id="param16" value='{{ $job->param16 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')

          <div class="form-group">
          <label for="param17">Fuel Gas Press Bost (Norm:2B)</label>
          <input type="decimal"  name="param17" id="param17" value='{{ $job->param17 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">Fuel Gas Mix Temp (Norm:50C) (Alarm:51C)(Trip:55C)</label>
          <input type="decimal" name="param18" id="param18" value='{{ $job->param18 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">Fuel Gas Percent Mix</label>
          <input type="decimal"  name="param19" id="param19" value='{{ $job->param19 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')

          <div class="form-group">
          <label for="param20">Fuel Gas Percent TB</label>
          <input type="decimal"  name="param20" id="param20" value='{{ $job->param20 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')

          <div class="form-group">
          <label for="param21">Fuel Gas Percent TV</label>
          <input type="decimal"  name="param21" id="param21" value='{{ $job->param21 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')

          <div class="form-group">
          <label for="param22">Jacket Water LT Temp (Norm:50C) (Alarm:99C)(Trip:120C)</label>
          <input type="decimal"  name="param22" id="param22" value='{{ $job->param22 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')


          <div class="form-group">
          <label for="param23">Jacket Water LT Press (Norm:1,8Bar)(Alarm:2,2Bar)(Trip:2,5Bar)</label>
          <input type="decimal"  name="param23" id="param23" value='{{ $job->param23 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

          <div class="form-group">
          <label for="param24">LUB OIL TEMP(Norm:86,3C)(Trip:92C)</label>
          <input type="decimal"  name="param24" id="param24" value='{{ $job->param24 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param24')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param24')

        <div class="form-group">
          <label for="param25">LUB OIL Press(Norm:4,12Bar)(Alarm:2,7Bar)(4,8Bar)</label>
          <input type="decimal"  name="param25" id="param25" value='{{ $job->param25 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>

        @error ('param25')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param25')

          <div class="form-group">
          <label for="param26">Lub Oil level</label>
          <input type="decimal"  name="param26" id="param26" value='{{ $job->param26 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param26')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param26')

          <div class="form-group">
          <label for="param27">Intake Air Temp(Norm:<=1Bar)(Alarm: 1Bar) </label>
          <input type="decimal"  name="param27" id="param27" value='{{ $job->param27 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param27')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param27')

          <div class="form-group">
          <label for="param28">Intake Air Press(Norm:<=1Bar)(Alarm: 1Bar)</label>
          <input type="decimal"  name="param28" id="param28" value='{{ $job->param28 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param28')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param28')

          <div class="form-group">
          <label for="param29">Cylinder#1(DEV+/-50C)</label>
          <input type="decimal"  name="param29" id="param29" value='{{ $job->param29 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param29')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param29')



          <div class="form-group">
          <label for="param30">Cylinder#2(DEV+/-50C)</label>
          <input type="decimal"  name="param30" id="param30" value='{{ $job->param30 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param30')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param30')

          <div class="form-group">
          <label for="param31">Cylinder#3(DEV+/-50C)</label>
          <input type="decimal"  name="param31" id="param31" value='{{ $job->param31 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param31')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param31')


          <div class="form-group">
          <label for="param32">Cylinder#4(DEV+/-50C)</label>
          <input type="decimal"  name="param32" id="param32" value='{{ $job->param32 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param32')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param32')

          <div class="form-group">
          <label for="param33">Cylinder#5(DEV+/-50C)</label>
          <input type="decimal"  name="param33" id="param33" value='{{ $job->param33 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param33')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param33')

          <div class="form-group">
          <label for="param34">Cylinder#6(DEV+/-50C)</label>
          <input type="decimal"  name="param34" id="param34" value='{{ $job->param34 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param34')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param34')

          <div class="form-group">
          <label for="param35">Cylinder#7(DEV+/-50C)</label>
          <input type="decimal"  name="param35" id="param35" value='{{ $job->param35 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param35')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param35')


          <div class="form-group">
          <label for="param36">Cylinder#8(DEV+/-50C)</label>
          <input type="decimal"  name="param36" id="param36" value='{{ $job->param36 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param36')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param36')

          <div class="form-group">
          <label for="param37">Cylinder#9(DEV+/-50C)</label>
          <input type="decimal"  name="param37" id="param37" value='{{ $job->param37 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param37')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param37')

          <div class="form-group">
          <label for="param38">Cylinder#10(DEV+/-50C)</label>
          <input type="decimal"  name="param38" id="param38" value='{{ $job->param38 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param38')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param38')

          <div class="form-group">
          <label for="param39">Cylinder#11(DEV+/-50C)</label>
          <input type="decimal"  name="param39" id="param39" value='{{ $job->param39 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param39')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param39')

          <div class="form-group">
          <label for="param40">Cylinder#12(DEV+/-50C)</label>
          <input type="decimal"  name="param40" id="param40" value='{{ $job->param40 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param40')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param40')

          <div class="form-group">
          <label for="param41">Cylinder#13(DEV+/-50C)</label>
          <input type="decimal"  name="param41" id="param41" value='{{ $job->param41 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param41')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param41')

          <div class="form-group">
          <label for="param42">Cylinder#14 (Dev+/-50C)</label>
          <input type="decimal"  name="param42" id="param42" value='{{ $job->param42 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param42')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param42')

          <div class="form-group">
          <label for="param43">Cylinder#15 (Dev+/-50C)</label>
          <input type="decimal"  name="param43" id="param43" value='{{ $job->param43 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param43')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param43')

          <div class="form-group">
          <label for="param44">Cylinder#16 (Dev+/-50C)</label>
          <input type="decimal"  name="param44" id="param44" value='{{ $job->param44 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param44')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param44')

          <div class="form-group">
          <label for="param45">Cylinder#17 (Dev+/-50C)</label>
          <input type="decimal"  name="param45" id="param45" value='{{ $job->param45 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param45')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param45')

          <div class="form-group">
          <label for="param46">Cylinder#18 (Dev+/-50C)</label>
          <input type="decimal"  name="param46" id="param46" value='{{ $job->param46 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param46')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param46')

          <div class="form-group">
          <label for="param47">Cylinder#19 (Dev+/-50C)</label>
          <input type="decimal"  name="param47" id="param47" value='{{ $job->param47 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param47')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param47')

          <div class="form-group">
          <label for="param48">Cylinder#20 (Dev+/-50C)</label>
          <input type="decimal"  name="param48" id="param48" value='{{ $job->param48 }}' class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param48')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param48')


          <div class="form-group">
          <label for="overall_result">Over All Result </label>
          <select name="overall_result" value='{{ $job->overall_result }}'>
            <option value="Normal">Normal</option>
            <option value="Abnormal">Abnormal</option>
          </select>
        </div>

        @error ('overall_result')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('overall_result')

          <div class="form-group">
          <label for="checked_by">CHECKED BY</label>
          <select name="checked_by" id="checked_by" value='{{ $job->checked_by }}' class="col-sm-4 form-control">
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
           <input type="number" name="shift" id="shift" value='{{ $job->shift }}' class="col-sm-4 form-control @error('') is invalid @enderror">
        </div>

        <div class="form-group">
          <label for="remarks">Remarks </label>
          <input type="text" name="remarks" id="remarks" value='{{ $job->remarks }}' class="form-control @error('') is invalid @enderror">
        </div>
        @error ('remarks')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('remarks')

        <button type="submit" class="btn btn-primary"> Save </button>
     </form>
 </div>
 </div>

@endsection