<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

</head>
<body>
   <h1>WWT</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>Blower#1</th>           
           <th>Blower#2</th>
           <th>MTO2#1</th>
           <th>MTO2#2</th>
           <th>SAWAGE PUMP#1</th>
           <th>SAWAGE PUMP#2</th>
           <th>EMERGENCY PUMP #1 </th>
           <th>EMERGENCY PUMP #2 </th>
           <th>AERASI PUMP#1 </th>
           <th>AERASI PUMP#2 </th>
           <th>RETURN SLUDGE PUMP#1</th>
           <th>RETURN SLUDGE PUMP#2 </th>
           <th>SEDIMENTATION PUMP#1</th>
           <th>SEDIMENTATION PUMP#2</th>
           <th>OUTLET PUMP#1</th>
           <th>OUTLET PUMP#2</th>
           <th>RECYCLE PUMP</th>
           <th>SPRAY Pump</th>
           <th>SLUDGE Pump</th>
           <th>SCRUBBER PUMP#1 </th>
           <th>SCRUBBER Pump#2</th>
           <th>FLOW METER EFFLUENT</th>
           <th>FLOW METER ARTESIS #5(P.TUBE)</th>
           <th>FLOW METER ARTESIS #7(WWT`)</th>
           <th>CHECKED BY</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
           <th>Shift Group</th>
           <th>Remarks</th>
  </tr>
  @foreach ($data as $job)
  <tr>
  <td>{{ $job->tanggal }}</td>
     <td>{{ $job->name }}</td>  
     <td>
     <select name="param1" id="param1" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param1) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>
     <select name="param2" id="param2" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param2) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>
     <select name="param3" id="param3" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param3) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param4" id="param4" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param4) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param5" id="param5" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param5) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param6" id="param6" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param6) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param7" id="param7" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param7) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param8" id="param8" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param8) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param9" id="param9" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param9) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param10" id="param10" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param10) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param11" id="param11" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param11) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param12" id="param12" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param12) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>
     <select name="param13" id="param13" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param13) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>
     <select name="param14" id="param14" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param14) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>
     <select name="param15" id="param15" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param15) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        

     <td>
     <select name="param16" id="param16" >
            @foreach($aux_categorys as $aux_category)
             <option value="{{ $aux_category->id }}"  @if($aux_category->id==$job->param16) selected='selected' @endif >{{ $aux_category->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>
     <select name="param17" id="param17" >
            @foreach($aux_categoryvxs as $aux_categoryvx)
             <option value="{{ $aux_categoryvx->id }}"  @if($aux_categoryvx->id==$job->param17) selected='selected' @endif >{{ $aux_categoryvx->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>
     <select name="param18" id="param18" >
            @foreach($aux_categoryvxs as $aux_categoryvx)
             <option value="{{ $aux_categoryvx->id }}"  @if($aux_categoryvx->id==$job->param18) selected='selected' @endif >{{ $aux_categoryvx->description }}</option>             
            @endforeach
          </select>
     </td>   
     <td>
     <select name="param19" id="param19" >
            @foreach($aux_categoryvxs as $aux_categoryvx)
             <option value="{{ $aux_categoryvx->id }}"  @if($aux_categoryvx->id==$job->param19) selected='selected' @endif >{{ $aux_categoryvx->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>
     <select name="param20" id="param20" >
            @foreach($aux_categoryvxs as $aux_categoryvx)
             <option value="{{ $aux_categoryvx->id }}"  @if($aux_categoryvx->id==$job->param20) selected='selected' @endif >{{ $aux_categoryvx->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>
     <select name="param21" id="param21" >
            @foreach($aux_categoryvxs as $aux_categoryvx)
             <option value="{{ $aux_categoryvx->id }}"  @if($aux_categoryvx->id==$job->param21) selected='selected' @endif >{{ $aux_categoryvx->description }}</option>             
            @endforeach
          </select>
     </td>        
     <td>{{ $job->param22 }}</td>
     <td>{{ $job->param23 }}</td>
     <td>{{ $job->param24 }}</td>
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
     <td>{{ $job->remarks }}</td>
    @endforeach
</tr>
    </table>
</body>
</html>


