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
   <h1>TRAFO WWT</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>OIL TEMP Alarm:70C Trip</th>           
           <th>lV BUSBAR TEMP R</th>
           <th>lV BUSBAR TEMP S</th>
           <th>lV BUSBAR TEMP T</th>
           <th>OIL LEVEL</th>
           <th>NOISE</th>
           <th>PANEL PE CONDITION</th>
           <th>CHECKED BY</th>
           <th>Shift Group</th>
           <th>Group Leader</th>           
           <th>Supervisor</th>                      
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
     <td>{{ $job->noise }}</td>
     <td>{{ $job->panel_pe_condition }}</td>
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


