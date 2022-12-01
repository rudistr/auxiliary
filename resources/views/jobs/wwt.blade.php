@extends('layouts.backendwwt')
@section('content')
<div class="card">
    <div class="card-header">Machine Status & FM</div>       
    <div class="card-body">
    <form action="{{ route('jobs.wwt') }}" method="post">
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
          <label for="param1">Blower#1</label>
          <select name="param1" id="param1" class="col-sm-5 form-control">
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>          
        </div>

        @error ('param1')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param1')

          <div class="form-group">
          <label for="param2">Blower#2</label>
          <select name="param2" id="param2" class="col-sm-5 form-control">
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>          
        </div>
        @error ('param2')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param2')

          <div class="form-group">
          <label for="param3">MTO2#1</label>
          <select name="param3" id="param3" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>          
        </div>
        @error ('param3')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param3')

          <div class="form-group">
          <label for="param4">MTO2#2</label>
          <select name="param4" id="param4" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>          
        </div>
        @error ('param4')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param4')

          <div class="form-group">
          <label for="param5">SAWAGE PUMP#1</label>
          <select name="param5" id="param5" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
            </select>           
        </div>
        @error ('param5')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param5')





          <div class="form-group">
          <label for="param6">SAWAGE PUMP#2</label>
          <select name="param6" id="param6" class="col-sm-5 form-control">
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>          
        </div>
        @error ('param6')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param6')
        


          <div class="form-group">
          <label for="param7">EMERGENCY PUMP #1 </label>
          <select name="param7" id="param7" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param7')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param7')

          <div class="form-group">
          <label for="param8">EMERGENCY PUMP #2 </label>
          <select name="param8" id="param8" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param8')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param8')

          <div class="form-group">
          <label for="param9">AERASI PUMP#1 </label>
          <select name="param9" id="param9" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param9')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param9')

          <div class="form-group">
          <label for="param10">AERASI PUMP#2 </label>
          <select name="param10" id="param10" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param10')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param10')

          <div class="form-group">
          <label for="param11">RETURN SLUDGE PUMP#1 </label>
          <select name="param11" id="param11" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param11')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param11')


          <div class="form-group">
          <label for="param12">RETURN SLUDGE PUMP#2 </label>
          <select name="param12" id="param12" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param12')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param12')


          <div class="form-group">
          <label for="param13">SEDIMENTATION PUMP#1 </label>
          <select name="param13" id="param13" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param13')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param13')

          <div class="form-group">
          <label for="param14">SEDIMENTATION PUMP#2 </label>
          <select name="param14" id="param14" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param14')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param14')


          <div class="form-group">
          <label for="param15">OUTLET PUMP#1 </label>
          <select name="param15" id="param15" class="col-sm-5 form-control">>
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param15')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param15')

          <div class="form-group">
          <label for="param16">OULET PUMP#2 </label>
          <select name="param16" id="param16" class="col-sm-5 form-control">
          @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}">{{ $aux_category->description }}</option>
            @endforeach
          </select>
        </div>
        @error ('param16')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param16')


          <div class="form-group">
          <label for="param17">RECYCLE PUMP </label>
          <select name="param17" id="param17" class="col-sm-5 form-control"> 
             @foreach($aux_categoryvxs as $aux_categoryvx)
              <option value="{{ $aux_categoryvx->id }}">{{ $aux_categoryvx->description }}</option>
             @endforeach
          </select>
        </div>
        @error ('param17')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param17')

          <div class="form-group">
          <label for="param18">SPRAY Pump </label>
          <select name="param18" id="param18" class="col-sm-5 form-control">
          @foreach($aux_categoryvxs as $aux_categoryvx)
              <option value="{{ $aux_categoryvx->id }}">{{ $aux_categoryvx->description }}</option>
             @endforeach
          </select>
        </div>
        @error ('param18')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param18')

          <div class="form-group">
          <label for="param19">SLUDGE Pump </label>
          <select name="param19" id="param19" class="col-sm-5 form-control">
          @foreach($aux_categoryvxs as $aux_categoryvx)
              <option value="{{ $aux_categoryvx->id }}">{{ $aux_categoryvx->description }}</option>
             @endforeach
          </select>
        </div>
        @error ('param19')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param19')


          <div class="form-group">
          <label for="param20">SCRUBBER PUMP#1 </label>
          <select name="param20" id="param20" class="col-sm-5 form-control">
          @foreach($aux_categoryvxs as $aux_categoryvx)
              <option value="{{ $aux_categoryvx->id }}">{{ $aux_categoryvx->description }}</option>
             @endforeach
          </select>
        </div>
        @error ('param20')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param20')

          <div class="form-group">
          <label for="param21">SCRUBBER Pump#2 </label>
          <select name="param21" id="param21" class="col-sm-5 form-control">
          @foreach($aux_categoryvxs as $aux_categoryvx)
              <option value="{{ $aux_categoryvx->id }}">{{ $aux_categoryvx->description }}</option>
             @endforeach
          </select>
        </div>
        @error ('param21')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param21')

          <div class="form-group">
          <label for="param22">FLOW METER EFFLUENT </label>
          <input type="text" name="param22" id="param22" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param22')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param22')

          <div class="form-group">
          <label for="param23">FLOW METER ARTESIS #5(P.TUBE) </label>
          <input type="text" name="param23" id="param23" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param23')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param23')

          <div class="form-group">
          <label for="param24">FLOW METER ARTESIS #7(WWT`) </label>
          <input type="text" name="param24" id="param24" class="form-control @error('') is invalid @enderror">
        </div>
        @error ('param24')
           <div class="mt-2 text-danger">{{ $message }}</div>
          @enderror ('param24')

          
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