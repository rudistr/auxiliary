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
   <h1>AUXILIARY 2</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>FUEL OIL SUPPLY PUMP#1 L1</th>           
           <th>FUEL OIL SUPPLY PUMP#1 L2</th>
           <th>FUEL OIL SUPPLY PUMP#1 L3</th>
           <th>FUEL OIL SUPPLY PUMP#2 L1</th>
           <th>FUEL OIL SUPPLY PUMP#2 L2</th>
           <th>FUEL OIL SUPPLY PUMP#2 L3</th>
           <th>FUEL OIL TRANSFER PUMP#1 L1</th>
           <th>FUEL OIL TRANSFER PUMP#1 L2</th>
           <th>FUEL OIL TRANSFER PUMP#1 L3</th>
           <th>FUEL OIL TRANSFER PUMP#2 L1</th>
           <th>FUEL OIL TRANSFER PUMP#2 L2</th>
           <th>FUEL OIL TRANSFER PUMP#2 L3</th>
           <th>COMPRESSOR#1 L1</th>
           <th>COMPRESSOR#1 L2</th>
           <th>COMPRESSOR#1 L3</th>
           <th>COMPRESSOR#2 L1</th>
           <th>COMPRESSOR#2 L2</th>
           <th>COMPRESSOR#2 L3</th>
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


