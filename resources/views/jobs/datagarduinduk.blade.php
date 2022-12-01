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
   <h1>Gardu Induk</h1>
<table id="customers">
  <tr>  
  <th>Time</th>
           <th>Machine No.</th>
           <th>KVARH</th>           
           <th>KWH LWBP</th>
           <th>KWH WBP</th>
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
     <td>{{ $job->surname }}</td>
     <td>{{ $job->gl }}</td>
     <td>{{ $job->spv }}</td>
     <td>{{ $job->shift }}</td>
    @endforeach
</tr>
    </table>
</body>
</html>


