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
   <h1>ZR 400</h1>
<table id="customers">
  <tr>  
           <th>Time</th>
           <th>Machine No.</th>
           <th>Pres Comp.Outlet</th>           
           <th>Press.DP Air Filter</th>
           <th>OIL PRES</th>
           <th>COOLING WATER TEMP</th>
           <th>LP OUT TEMP</th> 
           <th>Out Temp</th>
           <th>Oil Temp</th>
           <th>Intercoller Press</th>
           <th>Running Hours</th>           
           <th>Running Load</th>
           <th>Motor Line Current R</th>
           <th>Motor Line Current T</th>
           <th>Motor Line Current S</th>
           <th>KWH</th>
           <th>Element 1 Out Temp</th>
           <th>Element 2 In Temp</th>
           <th>Element 2 Out Temp</th>
           <th>Comp Out Temp</th>
           <th>Motor de Temp</th>
           <th>Motor Nde Temp</th>
           <th>Gear Box Temp</th>
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


