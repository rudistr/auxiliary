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
   <h1>TRAFO</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>SOFT WATER FLOW METER(M3)</th>           
           <th>SOFT WATER RANGE METER(M3)</th>
           <th>SOFT WATER SERVICE A</th>
           <th>SOFT WATER SERVICE B</th>
           <th>SOFT WATER LEVEL SALT TANK</th>
           <th>DEMIN WATER CATION & ANION Flow Meter(M3)</th>
           <th>DEMIN WATER CATION & ANION Range Meter(M3)</th>
           <th>DEMIN WATER CATION & ANION COUNTER FO.15.11.1.1</th>
           <th>DEMIN WATER CATION & ANION CONDUCTIVITY</th>
           <th>DEMIN WATER CATION MIX BED CONDUCTIVITY</th>
           <th>DEMIN WATER WATER METER Temperature</th>
           <th>DEMIN WATER WATER METER Pressure</th>
           <th>DEMIN WATER LEVEL CHEMICAL HCL</th>
           <th>DEMIN WATER LEVEL CHEMICAL NaOH</th>
           <th>LEVEL DEMIN TANK</th>
           <th>PRESS,DEMIN WTR PUMP #1</th>
           <th>PRESS,DEMIN WTR PUMP #2</th>
           <th>PRESS,DEMIN WTR PUMP #3</th>
           <th>FLOW METER ARTESIS#1 Bengkel </th>
           <th>FLOW METER ARTESIS#2 Utility</th>
           <th>FLOW METER ARTESIS#6 Kantin</th>
           <th>FM MESS</th>
           <th>FM POLY</th>           
           <th>FM SPD2</th>
           <th>AIR MANCUR</th>
           <th>CATION-ANION MIX BED</th>
           <th>SOFTENER</th>
           <th>CHEMICAL</th>
           <th>CATATAN</th>
           <th>CHECKED BY</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
           <th>Shift</th>
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
     <td>{{ $job->cation_anion_mix_bed }}</td>
     <td>{{ $job->softener }}</td>
     <td>{{ $job->chemical}}</td>
     <td>{{ $job->catatan }}</td>
     <td>{{ $job->checked_by }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
    @endforeach
</tr>
    </table>
</body>
</html>


