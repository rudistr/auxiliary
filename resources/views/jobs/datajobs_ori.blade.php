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
   <h1>Jobs Table</h1>
<table id="Jobs">
  <tr>  
          <th>Time</th>
           <th>Machine_no</th>
           <th>WTC</th>
           <th>WTAC</th>
           <th>Disch.Press</th>
           <th>Filt.Indict(Max:45mbar)</th>
           <th>Intcooler Press Load(2-3Bar)</th> 
           <th>interc Press Unload (2-3Bar)</th>
           <th>Running Time (Hour)</th>
           <th>Loading Time (Hour)</th>
           <th>Air temp LP Out(Max:230C)</th>
           <th>Air temp HP In(Max:50C)</th>
           <th>Air temp HP Out(Max:230C)</th>
           <th>Air temp Out(Max:50C)</th>
           <th>Motor De Temp(Max:100C)</th>
           <th>Motor Nde Temp(Max:100C)</th>
           <th>Gear Box Temp(Max:100C)</th>
           <th>Motor Line Current R (Max:690A)</th>
           <th>Motor Line Current S (Max:690A)</th>
           <th>Motor Line Current T (Max:690A)</th>
           <th>KWH</th>
           <th>OVER ALL RESULT</th>           
           <th>Checked By</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
           <th>Shift</th>                                  
  </tr>
  @php
   $no=1;
  @endphp
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


