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
   <h1>DIESEL ENGINE1</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>KWH</th>           
           <th>Speed TB1</th>
           <th>Speed TB2</th>
           <th>Speed Engine</th>
           <th>Air Press Start</th>
           <th>Air Press Control</th>
           <th>Fuel Oil Press</th>
           <th>Fuel Oil Temp</th>
           <th>Fuel Oil Pack</th>
           <th>Ambient Temp</th>
           <th>Generator Bearing Temp.De</th>
           <th>Generator Bearing Temp.NDe</th>
           <th>Voltage L1-L2(360-440V)</th>
           <th>Voltage L1-L3(360-440V)</th>
           <th>Voltage L2-L3(360-440V)</th>
           <th>Freq(50Hz,+/-3)</th>
           <th>MW(Norm:2,20MW)(Alarm:2,60MW)</th>
           <th>Ampere L1</th>
           <th>Ampere L2 </th>
           <th>Ampere L3</th>
           <th>KVAR</th>
           <th>POWER FACTOR</th>
           <th>Part A Genset PCB Counter</th>           
           <th>Cooling WTR Press.WTR HE IN</th>           
           <th>Cooling WTR Press.WTR HE OUT</th>
           <th>Cooling WTR Temp.WTR HE IN</th>
           <th>Cooling WTR Temp.WTR HE OUT</th>
           <th>Jaket WTR Press WTR He In</th>
           <th>Jaket WTR Press WTR He Out</th>
           <th>Jaket WTR Press In Engine</th>
           <th>Jaket WTR Temp.WTR He IN</th>
           <th>Jaket WTR Temp.Air Cooler In</th>
           <th>Jaket WTR Temp.Air Cooler Out</th>
           <th>Jaket WTR Temp.In Engine</th>
           <th>Jaket WTR Temp.Out Engine</th>
           <th>LUB OIL PRESS.IN ENGINE</th>
           <th>LUB OIL FILL DIFF.PRESS</th>
           <th>LUB OIL TEMP IN COOLER</th>
           <th>LUB OIL TEMP IN ENGINE</th>
           <th>Charge Air Press</th>
           <th>Charge Air Temp</th>
           <th>Cylinder#1</th>
           <th>Cylinder#2 </th>
           <th>Cylinder#3</th>
           <th>Cylinder#4</th>
           <th>Cylinder#5</th>           

           <th>Cylinder#6</th>           
           <th>Cylinder#7</th>
           <th>Cylinder#8</th>
           <th>Cylinder#9</th>
           <th>Cylinder#10</th>
           <th>Cylinder#11</th>
           <th>Cylinder#12</th>
           <th>Cylinder#13</th>
           <th>Cylinder#14</th>
           <th>Cylinder#15</th>
           <th>Cylinder#16</th>
           <th>TC#1</th>
           <th>TC#2</th>
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
     <td>{{ $job->param33 }}</td>
     <td>{{ $job->param34 }}</td>
     <td>{{ $job->param35 }}</td>     
     <td>{{ $job->param36 }}</td>
     <td>{{ $job->param37 }}</td>
     <td>{{ $job->param38 }}</td>     
     <td>{{ $job->param39 }}</td>
     <td>{{ $job->param40 }}</td>
     <td>{{ $job->param41 }}</td>
     <td>{{ $job->param42 }}</td>
     <td>{{ $job->param43 }}</td>
     <td>{{ $job->param44 }}</td>
     <td>{{ $job->param45 }}</td>
     <td>{{ $job->param46 }}</td>
     <td>{{ $job->param47 }}</td>     
     <td>{{ $job->param48 }}</td>
     <td>{{ $job->param49 }}</td>
     <td>{{ $job->param50 }}</td>
     <td>{{ $job->param51 }}</td>     
     <td>{{ $job->param52 }}</td>
     <td>{{ $job->param53 }}</td>
     <td>{{ $job->param54 }}</td>     
     <td>{{ $job->param55 }}</td>
     <td>{{ $job->param56 }}</td>
     <td>{{ $job->param57 }}</td>     
     <td>{{ $job->param58 }}</td>
     <td>{{ $job->param59 }}</td>
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


