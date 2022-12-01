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
   <h1>PARAM WWT</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>PH INLET </th>           
           <th>PH EMERGENCY</th>
           <th>PH EQUALISASI</th>
           <th>PH AERASI</th>
           <th>PH EFLUENT</th>
           <th>PH LT 0 M POLY</th>
           <th>PH 6 M POLY </th>
           <th>COD EQUALISASI </th>
           <th>COD EFFLUENT </th>
           <th>V30 AERASI </th>
           <th>Checked By</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
</tr>
  @foreach ($data as $job)
  <tr>
  <td>{{ $job->tanggal }}</td>
     <td>{{ $job->name }}</td>  
     <td>{{ $job->param1  }}</td>        
     <td>{{ $job->param2  }}</td>             
     <td>{{ $job->param3  }}</td>
     <td>{{ $job->param4  }}</td>
     <td>{{ $job->param5  }}</td>
     <td>{{ $job->param6  }}</td>
     <td>{{ $job->param7  }}</td>
     <td>{{ $job->param8  }}</td>
     <td>{{ $job->param9 }}</td>
     <td>{{ $job->param10  }}</td>
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
    @endforeach
</tr>
    </table>
</body>
</html>


