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
   <h1>AUXILIARY 1</h1>
<table id="customers">
  <tr>  
           <th>Time</th>
           <th>Machine No.</th>
           <th>LUB-OIL PRE-HEATING#1(7,8A)L1</th>           
           <th>LUB-OIL PRE-HEATING#1(7,8A)L2</th>
           <th>LUB-OIL PRE-HEATING#1(7,8A)L3</th>
           <th>LUB-OIL PRE-HEATING#2(7,8A)L1</th>
           <th>LUB-OIL PRE-HEATING#2(7,8A)L2</th>
           <th>LUB-OIL PRE-HEATING#2(7,8A)L3</th>
           <th>COOL WTR CIRC.PUMP(0,6A)L1</th>
           <th>COOL WTR CIRC.PUMP(0,6A)L2</th>
           <th>COOL WTR CIRC.PUMP(0,6A)L3</th>
           <th>PRE-LUB OIL PUMP (3,8A)L1</th>
           <th>PRE-LUB OIL PUMP (3,8A)L2</th>
           <th>PRE-LUB OIL PUMP (3,8A)L3</th>
           <th>ANTI CONDENSATE HEATER</th>
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


