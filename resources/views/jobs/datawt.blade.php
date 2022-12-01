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
   <h1>Water Treatment</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>Fresh WTR TANK</th>           
           <th>HYDRANT WTR TANK</th>
           <th>CaOcl2 Tank Level</th>
           <th>Flow Meter Soft WTR A</th>
           <th>Flow Meter Soft WTR B</th>
           <th>Flow Meter Soft WTR C(M3)</th>
           <th>Flow Meter Fresh WTR A</th>
           <th>Flow Meter Fresh WTR B</th>
           <th>Flow Meter Fresh ARTESIS#3</th>
           <th>Flow Meter Fresh ARTESIS#4 GENSET</th>
           <th>Flow Meter Fresh ARTESIS#8</th>
           <th>Raw Meter Pump#1</th>
           <th>Raw Meter Pump#2</th>
           <th>FILTER WATER PUMP#1</th>
           <th>FILTER WATER PUMP#2</th>
           <th>FRESH WATER PUMP#1</th>
           <th>FRESH WATER PUMP#2</th>
           <th>FRESH WATER PUMP#3</th>
           <th>FRESH WATER PUMP#4</th>
           <th>SOFT WATER PUMP#1 </th>
           <th>SOFT WATER PUMP#2</th>
           <th>SOFT WATER PUMP#3</th>
           <th>BW PUMP</th>
           <th>FM OFFICE BARU</th>
           <th>RAW WATER PUMP #1</th>
           <th>Chemical</th>
           <th>S/C FILTER</th>
           <th>Softener</th>
           <th>Bak Sedimentasi </th>
           <th>Catatan</th>
           <th>CHECKED BY</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
           <th>Shift Group</th>
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
     <td>{{ $job->chemical }}</td>
     <td>{{ $job->scfilter }}</td>
     <td>{{ $job->softener }}</td>
     <td>{{ $job->bak_sedimentasi }}</td>
     <td>{{ $job->catatan }}</td>
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
    @endforeach
</tr>
    </table>
</body>
</html>


