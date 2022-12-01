@extends('layouts.backendgenset')
@section('content')
<div class="card">
    <div class="card-header">Diesel Engine 1</div>       
    <div class="card-body">
    <form action="{{ route('jobs.dieselengine1') }}" method="post">
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
          <label for="param1">KWH</label>
          <input type="number"  name="param1" id="param1" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

        <div class="form-group">
          <label for="param2">Speed TB1(Norm:1500rpm) (Trip:18000rpm)</label>
          <input type="number"  name="param2" id="param2" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

        <div class="form-group">
          <label for="param3">Speed TB2(Norm:1500rpm) (Trip:18000rpm)</label>
          <input type="number"  name="param3" id="param3" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')


        <div class="form-group">
          <label for="param4">Speed Engine(Norm:1500rpm)(Trip:18000rpm)</label>
          <input type="number"  name="param4" id="param4" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')

          <div class="form-group">
          <label for="param5">Air Press Start (Norm:1500rpm)(Trip:18000 rpm)</label>
          <input type="number"  name="param5" id="param5" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')

          <div class="form-group">
          <label for="param6">Air Press Control (Norm:1500rpm)(Trip:18000 rpm)</label>
          <input type="number"  name="param6" id="param6" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')

        <div class="form-group">
          <label for="param7">Fuel Oil Press(Norm:1500rpm)(Trip:18000 rpm)</label>
          <input type="number"  name="param7" id="param7" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

        <div class="form-group">
          <label for="param8">Fuel Oil Temp (Norm:1500rpm)(Trip:18000 rpm)</label>
          <input type="number"  name="param8" id="param8" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

        <div class="form-group">
          <label for="param9">Fuel Oil Pack(MM) </label>
          <input type="number"  name="param9" id="param9" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')

        <div class="form-group">
          <label for="param10">Ambient Temp</label>
          <input type="number" name="param10" id="param10" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

          <div class="form-group">
          <label for="param11">Generator Bearing Temp.De (Norm.39-75C) (Alarm:85CO(Trip:90C)</label>
          <input type="number" name="param11" id="param11" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')

          <div class="form-group">
          <label for="param12">Generator Bearing Temp.NDe (Norm.39-75C) (Alarm:85CO(Trip:90C)</label>
          <input type="number"  name="param12" id="param12" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')

        <div class="form-group">
          <label for="param13">Voltage L1-L2(360-440V)</label>
          <input type="number"  name="param13" id="param13" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

        <div class="form-group">
          <label for="param14">Voltage L1-L3(360-440V)</label>
          <input type="number"  name="param14" id="param14" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')

          <div class="form-group">
          <label for="param15">Voltage L2-L3(360-440V)</label>
          <input type="number"  name="param15" id="param15" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

          <div class="form-group">
          <label for="param16">Freq(50Hz,+/-3)</label>
          <input type="number"  name="param16" id="param16" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')

          <div class="form-group">
          <label for="param17">MW(Norm:2,20MW)(Alarm:2,60MW)(Trip:3,36MW)</label>
          <input type="number"  name="param17" id="param17" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">Ampere L1(Norm:220A)(Trip:418A)</label>
          <input type="number" name="param18" id="param18" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">Ampere L2(Norm:220A)(Trip:418A)</label>
          <input type="number"  name="param19" id="param19" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')

          <div class="form-group">
          <label for="param20">Ampere L3(Norm:220A)(Trip:418A)</label>
          <input type="number"  name="param20" id="param20" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')

          <div class="form-group">
          <label for="param21">KVAR</label>
          <input type="number"  name="param21" id="param21" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')

          <div class="form-group">
          <label for="param22">POWER FACTOR (Norm:0,85)(Trip:0,8)</label>
          <input type="number"  name="param22" id="param22" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')


          <div class="form-group">
          <label for="param23">Part A Genset PCB Counter</label>
          <input type="number"  name="param23" id="param23" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

          <div class="form-group">
          <label for="param24">Cooling WTR Press.WTR HE IN(Norm:2-3Bar)(Trip:0,5)</label>
          <input type="number"  name="param24" id="param24" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param24')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param24')

        <div class="form-group">
          <label for="param25">Cooling WTR Press.WTR HE OUT(Norm:0,9-3Bar)(Trip:0,5)</label>
          <input type="number"  name="param25" id="param25" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>

        @error ('param25')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param25')

          <div class="form-group">
          <label for="param26">Cooling WTR Temp.WTR HE IN(Norm:20-30C)(Trip:35C)</label>
          <input type="number"  name="param26" id="param26" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param26')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param26')

          <div class="form-group">
          <label for="param27">Cooling WTR Temp.WTR HE OUT(Norm:0,5-2Bar)(Trip:0,5)</label>
          <input type="number"  name="param27" id="param27" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param27')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param27')

          <div class="form-group">
          <label for="param28">Jaket WTR Press WTR He In(Norm:0,5-2Bar)(Trip:0,5Bar)</label>
          <input type="number"  name="param28" id="param28" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param28')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param28')

          <div class="form-group">
          <label for="param29">Jaket WTR Press WTR He Out(Norm:0,5-2Bar)(Trip:0,5Bar)</label>
          <input type="number"  name="param29" id="param29" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param29')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param29')



          <div class="form-group">
          <label for="param30">Jaket WTR Press In Engine</label>
          <input type="number"  name="param30" id="param30" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param30')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param30')

          <div class="form-group">
          <label for="param31">Jaket WTR Temp.WTR He IN (Norm:75-85C) (Trip:95C)</label>
          <input type="number"  name="param31" id="param31" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param31')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param31')


          <div class="form-group">
          <label for="param32">Jaket WTR Temp.Air Cooler In (Norm:39-60C) (Trip:63C)</label>
          <input type="number"  name="param32" id="param32" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param32')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param32')

          <div class="form-group">
          <label for="param33">Jaket WTR Temp.Air Cooler Out (Norm:48-63C) (Trip:65C)</label>
          <input type="number"  name="param33" id="param33" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param33')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param33')

          <div class="form-group">
          <label for="param34">Jaket WTR Temp.In Engine</label>
          <input type="number"  name="param34" id="param34" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param34')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param34')

          <div class="form-group">
          <label for="param35">Jaket WTR Temp.Out Engine</label>
          <input type="number"  name="param35" id="param35" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param35')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param35')


          <div class="form-group">
          <label for="param36">LUB OIL PRESS.IN ENGINE(Norm:3-5Bar)(Alarm:2Bar)(Trip:1Bar)</label>
          <input type="number"  name="param36" id="param36" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param36')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param36')

          <div class="form-group">
          <label for="param37">LUB OIL FILL DIFF.PRESS(Norm:0,5-1,8Bar)(Alarm:1,8Bar)(Trip:2Bar)</label>
          <input type="number"  name="param37" id="param37" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param37')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param37')

          <div class="form-group">
          <label for="param38">LUB OIL TEMP IN COOLER(Norm:72-80C)(Trip:90C)</label>
          <input type="number"  name="param38" id="param38" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param38')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param38')

          <div class="form-group">
          <label for="param39">LUB OIL TEMP IN ENGINE(Norm:60-80C)(Trip:90C)</label>
          <input type="number"  name="param39" id="param39" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param39')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param39')

          <div class="form-group">
          <label for="param40">Charge Air Press (Norm;0,7-1,5Bar)(Trip:1,9Bar)</label>
          <input type="number"  name="param40" id="param40" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param40')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param40')

          <div class="form-group">
          <label for="param41">Charge Air Temp (Norm;42-75C)(Alarm:80C)</label>
          <input type="number"  name="param41" id="param41" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param41')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param41')

          <div class="form-group">
          <label for="param42">Cylinder#1 (Dev+/-50C)</label>
          <input type="number"  name="param42" id="param42" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param42')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param42')

          <div class="form-group">
          <label for="param43">Cylinder#2 (Dev+/-50C)</label>
          <input type="number"  name="param43" id="param43" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param43')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param43')

          <div class="form-group">
          <label for="param44">Cylinder#3 (Dev+/-50C)</label>
          <input type="number"  name="param44" id="param44" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param44')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param44')

          <div class="form-group">
          <label for="param45">Cylinder#4 (Dev+/-50C)</label>
          <input type="number"  name="param45" id="param45" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param45')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param45')

          <div class="form-group">
          <label for="param46">Cylinder#5 (Dev+/-50C)</label>
          <input type="number"  name="param46" id="param46" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param46')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param46')

          <div class="form-group">
          <label for="param47">Cylinder#6 (Dev+/-50C)</label>
          <input type="number"  name="param47" id="param47" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param47')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param47')

          <div class="form-group">
          <label for="param48">Cylinder#7 (Dev+/-50C)</label>
          <input type="number"  name="param48" id="param48" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param48')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param48')

          <div class="form-group">
          <label for="param49">Cylinder#8 (Dev+/-50C)</label>
          <input type="number"  name="param49" id="param49" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param49')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param49')

          <div class="form-group">
          <label for="param50">Cylinder#9 (Dev+/-50C)</label>
          <input type="number"  name="param50" id="param50" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param50')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param50')

          <div class="form-group">
          <label for="param51">Cylinder#10 (Dev+/-50C)</label>
          <input type="number"  name="param51" id="param51" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param51')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param51')

          <div class="form-group">
          <label for="param52">Cylinder#11 (Dev+/-50C)</label>
          <input type="number"  name="param52" id="param52" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param52')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param52')

          <div class="form-group">
          <label for="param53">Cylinder#12 (Dev+/-50C)</label>
          <input type="number"  name="param53" id="param53" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param53')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param53')

          <div class="form-group">
          <label for="param54">Cylinder#13 (Dev+/-50C)</label>
          <input type="number"  name="param54" id="param54" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param54')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param54')

          <div class="form-group">
          <label for="param55">Cylinder#14 (Dev+/-50C)</label>
          <input type="number"  name="param55" id="param55" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param55')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param55')

          <div class="form-group">
          <label for="param56">Cylinder#15 (Dev+/-50C)</label>
          <input type="number"  name="param56" id="param56" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param56')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param56')

          <div class="form-group">
          <label for="param57">Cylinder#16 (Dev+/-50C)</label>
          <input type="number"  name="param57" id="param57" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param57')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param57')

          <div class="form-group">
          <label for="param58">TC#1</label>
          <input type="number"  name="param58" id="param58" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param58')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param58')

          <div class="form-group">
          <label for="param59">TC#2</label>
          <input type="number"  name="param59" id="param59" class="col-sm-5 form-control @error('') is invalid @enderror">
        </div>
        @error ('param59')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param59')

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