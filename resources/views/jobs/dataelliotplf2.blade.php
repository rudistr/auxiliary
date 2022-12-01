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
   <h1>ELLIOT PLF2</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>WATER SUPPLY IN TEMP(< 30 C)</th>           
           <th>WATER SUPPLY OUT TEMP(< 58C)</th>
           <th>INLET OIL TEMP IOT (< 58C)</th>
           <th>FINAL INTERSTAGE AIR TEMP IAT(< 50C)</th>
           <th>WATER SUPPLY IN PRESSURE(3-4 bar)</th> 
           <th>WATER SUPPLY OUT PRESSURE(3-4,5Bar)</th>
           <th>DISCHARGE PRESSURE DPT (< 8.8 Bar)</th>
           <th>SYSTEM PRESSURE SPT (< 8.8 Bar)</th>
           <th>SEAL PRESSURE SAPT (< 21Bar )</th>           
           <th>OIL PRESSURE OPT(1.25-65 Bar)</th>
           <th>AIR SUPPLY(< 8.8Bar)</th>
           <th>DIFF.PRESS.AIR FILTER(Inch H2O)</th>
           <th>DIFF.PRESS.OIL.FILTER(Inch H20)</th>
           <th>DURATION LOW SPEED lMT(Mil/Um)</th>
           <th>DURATION HIGH SPEED_HVT(Mil/Um)</th>
           <th>INLET VALVE POSITION IVT(80-100%)</th>
           <th>UNLOAD VALVE POSITION UVT(%)</th>
           <th>TRIP COUNTER</th>
           <th>SURGE COUNTER</th>
           <th>POWER ON</th>
           <th>RUNNING HOURS (hours)</th>
           <th>RESERVOIR OIL LEVEL</th>
           <th>DRAINT LP INTERCOOLER (YES)</th>
           <th>DRAINT HP INTERCOOLER (YES)</th>
           <th>voltage_l1_l2 (6300V)</th>
           <th>voltage_l1_l3(6300V)</th>
           <th>voltage_ls_l3(6300V)</th>
           <th>motor_line_current_l1(71A)</th>
           <th>motor_line_current_l2(71A)</th>
           <th>motor_line_current_l2(71A)</th>
           <th>PF</th>
           <th>KWH</th>
           <th>Over All Result</th>
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
     <td>{{ $job->param1 }}</td>
     <td>{{ $job->param2 }}</td>
     <td>{{ $job->param3 }}</td>
     <td>{{ $job->param4 }}</td>
     <td>{{ $job->param5 }}</td>
     <td>{{ $job->param6 }}</td>
     <td>{{ $job->param7 }}</td>
     <td>{{ $job->param8 }}</td>
     <td>{{ $job->param9 }}</td>
     <td>{{ $job->param10 }}</td>
     <td>{{ $job->param11 }}</td>
     <td>{{ $job->param12 }}</td>
     <td>{{ $job->param13 }}</td>
     <td>{{ $job->param14 }}</td>
     <td>{{ $job->param15 }}</td>
     <td>{{ $job->param16 }}</td>
     <td>{{ $job->param17 }}</td>
     <td>{{ $job->param18 }}</td>
     <td>{{ $job->param19 }}</td>
     <td>{{ $job->param20 }}</td>
     <td>{{ $job->param21 }}</td>
     <td>{{ $job->param22 }}</td>
     <td>{{ $job->param23 }}</td>
     <td>{{ $job->param24 }}</td>
     <td>{{ $job->param25 }}</td>
     <td>{{ $job->param26 }}</td>
     <td>{{ $job->param27 }}</td>
     <td>{{ $job->param28 }}</td>
     <td>{{ $job->param29 }}</td>
     <td>{{ $job->param30 }}</td>
     <td>{{ $job->param31 }}</td>
     <td>{{ $job->param32 }}</td>
     <td>{{ $job->overall_result }}</td>
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


