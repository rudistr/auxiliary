@extends('layouts.backend')
@section('content')
 <table class="table">
     <thead>
         <tr>
             <th>CHECK LIST</th>
             <th>DATE/TIME</th>
             <th>Machine</th>
             <th>WT.Comp</th>
             <th>WT.AC</th>
             <th>DC.Press</th>
             <th>Filt.Indic</th>
             <th>Int.cool.PL</th>
             <th>Int.cool.Unload</th>
             <th>RT.HOUR</th>             
             <th>LT.HOUR</th>
             <th>AT.LP.Out</th>                                                                                                                     
             <th>AT.HP.In</th>
             <th>AT.HP.Out</th>
             <th>AT.Out</th>
             <th>Mtr De Temp</th>
             <th>Mtr Nde Temp</th>
             <th>GB.Temp</th>
             <th>MtrLine Curr R</th>
             <th>MtrLine Curr S</th>
             <th>MtrLine Curr T</th>                          
             <th>KWH</th>
             <th>Group Leader</th>           
             <th>Supervisor</th>                      

             <th>Edit</th>
</tr>
</thead>
<tbody>
    @foreach($jobs as $index => $job)
     <tr>
         <td>{{ $jobs->count() * ($jobs->currentPage() - 1) + $loop->iteration }}</td>
         <td>{{ $job->tanggal }}</td>
         <td>{{ $job->machinedetailnos()->implode('name',',') }}</td>
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
         <td>{{ $job->gl }}</td>
         <td>{{ $job->spv }}</td>
         <td>
             <a href=" {{ route('jobs.zr5edit', $job->id) }}" class="btn btn-primary">Edit</a>
             <a href="#" class="btn btn-danger">Delete</a>
         </td>                  
     <tr>
    @endforeach
</tbody>
</table>
{{ $jobs->links()}}

@endsection