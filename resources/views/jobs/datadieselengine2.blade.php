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
   <h1>DIESEL ENGINE2</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>POWER GENERATED DIESELENGINE LOAD(KWH)</th>           
           <th>POWER GENERATED DIESEL ENGINE LOAD</th>
           <th>AVR LOAD POWER GENERATED RH TODAY (KWH)</th>
           <th>LOAD FACTOR.AVG LOAD</th>
           <th>BD FO</th>
           <th>FO CONSUMPTION (GR/KWH)</th>
           <th>RAW WTR PUMP#1 L1(36A)</th>
           <th>RAW WTR PUMP#1 L2</th>
           <th>RAW WTR PUMP#1 L3</th>
           <th>C.TWR#1 L1(22A)</th>
           <th>C.TWR#1 L2</th>
           <th>C.TWR#1 L3</th>
           <th>C.TWR#2 L1(22A)</th>
           <th>C.TWR#2 L2(22A)</th>
           <th>C.TWR#2 L3(22A)</th>           
           <th>C.TWR#3 L1(22A)</th>
           <th>C.TWR#3 L2(22A)</th>
           <th>C.TWR#3 L3(22A)</th>           

           <th>EXH FAN#1 L1</th>
           <th>EXH FAN#1 L2</th>
           <th>EXH FAN#1 L3</th>
           <th>EXH FAN#2 L1</th>
           <th>EXH FAN#2 L2 </th>
           <th>EXH FAN#2 L3</th>
           <th>EXH FAN#3 L1</th>
           <th>EXH FAN#3 L2 </th>
           <th>EXH FAN#3 L3</th>

           <th>Down Time BD/HRS</th>
           <th>Down Time CD/HRS</th>
           <th>Down Time PM/HRS</th>           
           <th>Down Time SB/HRS</th>           
           <th>Life Time Lub Oil (HR) Turbo ChargeT</th>
           <th>Life Time Lub Oil (HR) Crankcase</th>
           <th>Life Time Lub Oil (HR) Alt Bearing</th>
           <th>Centrifugal LO FILTER GR.Sludge</th>
           <th>Centrifugal M/M Tickness Sludge</th>
           <th>Centrifugal Filter Insert (PCS)</th>
           <th>JAKET WTR.TEST SO.771 (DROP)</th>
           <th>JAKET WTR.NITRE NO21(PPM)</th>
           <th>JAKET WTR.CONDUCTIVITY(PPM)</th>
           <th>JAKET WTR.MAKE-UP NALCOO(LTR)</th>
           <th>LEVEL EXP.TANK</th>
           <th>CT.NR</th>
           <th>MAKE UP LO CONS.LV BEFORE</th>
           <th>MAKE UP LO CONS.LV AFTER</th>
           <th>MAKE UP LO (LTR)</th>
           <th>MAKE UP LO (GR/KWH)</th>
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


