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
   <h1>Compressor DTY1</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>PRESS TANK</th>           
           <th>PRESS SUMP</th>
           <th>SEPERATOR DROP</th>
           <th>INLET VACUUM</th>
           <th>INLET AIR FILTER</th>
           <th>TOTAL HOURS</th>
           <th>LOADED HOURS</th>
           <th>%LOAD</th>
           <th>UNLOAD</th>
           <th>COOL WTR TEMP IN</th>
           <th>COOL WTR TEMP.OUT</th>
           <th>PRESS.COOL WTR PUMP #1</th>
           <th>PRESS.COOL WTR PUMP #2</th>
           <th>PRESS.COOL WTR PUMP #3</th>
           <th>Moisture Trap</th>
           <th>OIL LEVEL</th>
           <th>DISCHARGE TEMP.PACK</th>
           <th>DISCHARGE TEMP AIR END</th>
           <th>INJECT COOLANT TEMP</th>
           <th>MOTOR LINE CURRENT R</th>           
           <th>MOTOR LINE CURRENT S</th>                      
           <th>MOTOR LINE CURRENT T</th>                      
           <th>KWH</th>                                 
           <th>BEARING TEMP.AIR end LP</th>           
           <th>BEARING TEMP.AIR end HP</th>                      
           <th>BEARING TEMP MOTOR DE</th>                      
           <th>BEARING TEMP MOTOR NDE</th>                               
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


