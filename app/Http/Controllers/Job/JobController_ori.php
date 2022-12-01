<?php

namespace App\Http\Controllers\Job;

use File;
use Carbon\Carbon;
use App\Models\job;
use App\Models\machine;
use App\Models\gen_no;
use App\Models\employee;
use App\Models\machinedetailno;
use App\Models\aux_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Barryvdh\DomPDF\Facade\Pdf;
use PDF;




class JobController extends Controller
{
    public function zr400polyview ()        
    {       
      //$idmachineno = $request->idmachineno;
      $idmachines = 1;
      $idmachinedetails = 2;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',2)->get(); 
      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',1)
      ->where ('a.idmachinedetails', '=',2)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(14)  ; 
      return view('jobs.zr400polyview', compact('datajobs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }    

    public function edit400poly(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      //dd ($job);
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',2) ->get();               
      $uk =  Auth::user()->unique_karyawan;      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
     // dd ($employeeids);
      return view('jobs.edit400poly', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function update400poly(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
     $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
     job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.zr400polyview')->with('success','Data was Updated');
      
    }

  
    public function zr5view ()
    {       
        return view ('jobs.zr5view',['jobs' => job::latest()->paginate(20),]);        
    }    

        
    public function zr5edit ($id)
    {        
        return view ('jobs.zr5edit'
        ,[
           'job' => $job, 
           'machinedetailnos' => machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',1) ->get(),
        ]);        
    }    

    public function create ()
    {       
        
        $vtime = date('H');
     //   dd ($vtime)
        if ($vtime > 7 && $vtime <= 15) 
          {
            $shift = 1;
          }
        elseif ($vtime > 15 && $vtime <= 23) 
        {
          $shift = 2;
        }  
        else
        {
          $shift = 3;
        }          

        // dd ($vtime);
        //dd ($shift);
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();

        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',1) ->get();         
        $kode = DB::table('jobs')->max('id');
        $kode = (int) $kode + 1;
        //dd ($kode);
        $uk =  Auth::user()->unique_karyawan;
        //dd ($grupleaders);
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.create',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
    );                 
    }    
      public function edit(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.edit', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }  
      
      public function update(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
       $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
       job::find($Job->id)->update([
          'tanggal' =>$tgl,
          'idmachine' => request('idmachine'),
          'idmachinedetails' => request('idmachinedetails'),
          'idmachineno' => request('idmachineno'),
          'param1' => request('param1'),
          'param2' => request('param2'),
          'param3' => request('param3'),
          'param4' => request('param4'),
          'param5' => request('param5'),
          'param6' => request('param6'),
          'param7' => request('param7'),
          'param8' => request('param8'),
          'param9' => request('param9'),
          'param10' => request('param10'),
          'param11' => request('param11'),
          'param12' => request('param12'),
          'param13' => request('param13'),
          'param14' => request('param14'),
          'param15' => request('param15'),
          'param16' => request('param16'),
          'param17' => request('param17'),
          'param18' => request('param18'),            
          'param19' => request('param19'),
          'param20' => request('param20'),
          'param21' => request('param21'),
          'param22' => request('param22'),
          'param23' => request('param23'),            
          'param24' => request('param24'),
          'overall_result' => request('overall_result'),
          'checked_by' => request('checked_by'),
          'group_leader' => request('group_leader'),
          'supervisor' => request('supervisor'),
          'shift' => request('shift'),
          'remarks' => request('remarks'),
          'tgl_ops' => $tgl_ops,
        ]);
        return redirect()->route('jobs.polyview')->with('success','Data was Updated');        
      }
      public function polyview ()    
      {         
      //$idmachineno = $request->idmachineno;
      $idmachines = 1;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',1)->get(); 
      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',1)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(14)  ; 
      return view('jobs.polyview', compact('datajobs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
      }  
  
      public function polyviewpermesin(Request $request)
      {
        $idmachineno = $request->idmachineno;
        $datajobs = DB::table('jobs as a')    
        ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
        ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
        ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
        ->join('machines as b', 'b.id', '=', 'a.idmachine')
        ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
        ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
        ->wherecolumn('c.idmachine', '=', 'b.id')      
        ->whereColumn('c.id', '=', 'a.idmachinedetails')      
        ->whereColumn('d.idmachinedetails', '=', 'c.id')      
        ->whereColumn('d.idmachine', '=', 'b.id') 
        ->whereColumn('d.idmachine', '=', 'c.idmachine')
        ->where ('a.idmachine', '=',1)
        ->where ('a.idmachinedetails', '=',1)   
        ->where ('a.idmachineno', '=',$idmachineno)   
        ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
        ->orderBy ('a.tanggal','desc')            
        ->paginate(14)  ; 
        return view('jobs.polyviewpermesin', compact('datajobs'));
        }
  
      
    public function zr400poly ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
//            dd ($vtime);
           //dd ($shift);
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
    
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
       	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.zr400poly',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
    );          
    }
    public function kaeser ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
        //    dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',3) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
    
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.kaeser',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
    );          
    }

    public function kaeserview ()    
    {
      $idmachines = 1;
      $idmachinedetails = 3;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',3)->get(); 
      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',1)
      ->where ('a.idmachinedetails', '=',3)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(14)  ; 
       return view('jobs.kaeserview', compact('datajobs','machinedetailnos')
       ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);

    }

    public function editkaeser(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();

      //dd ($job);
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',3) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
     // dd ($employeeids);
      return view('jobs.editkaeser', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }
    public function updatekaeser(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
     $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
     job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'overall_result' => request('overall_result'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'checked_by' => request('checked_by'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.kaeserview')->with('success','Data was Updated');
      
    }

    public function elliot ()
    {               
        $vtime = date('H');
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          

       $grupleaders = employee::select ('employee# as employeeid','surname')->get();
       $supervisors = employee::select ('employee# as employeeid','surname')->get();
       
              
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',4) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	  $kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.elliot',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]

    );
    }

    public function elliotview ()    
    {
      $idmachines = 1;
      $idmachinedetails = 4;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',4)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',1)
      ->where ('a.idmachinedetails', '=',4)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);           
    return view('jobs.elliotview', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);

    }

    public function editelliot(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();

      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',4) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editelliot', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function updateelliot(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'param25' => request('param25'),
        'param26' => request('param26'),
        'param27' => request('param27'),            
        'param28' => request('param28'),
        'param29' => request('param29'),
        'param30' => request('param30'),            
        'param31' => request('param31'),            
        'param32' => request('param32'),                    
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.elliotview')->with('success','Data was Updated');
      
    }
    

    public function cvgd_390 ()
    {               
        $vtime = date('H');
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           $grupleaders = employee::select ('employee# as employeeid','surname')->get();
           $supervisors = employee::select ('employee# as employeeid','surname')->get();     
     
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',2)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	  $kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.cvgd_390',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
    );
    }
    public function cvgd390view ()    
    {
      $idmachines = 2;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',2)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',2)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);           
     return view('jobs.cvgd390view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);    
    }

    public function editcvgd390(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();

      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',2)->where ('idmachinedetails', '=',1) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editcvgd390', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function updatecvgd390(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.cvgd390view')->with('success','Data was Updated');
      
    }


    public function cvhe_330_590 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
           $grupleaders = employee::select ('employee# as employeeid','surname')->get();
           $supervisors = employee::select ('employee# as employeeid','surname')->get();

        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',2)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.cvhe_330_590',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );
    }

    public function cvhe330590view ()    
    {
      $idmachines = 2;
      $idmachinedetails = 2;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',2)->where ('idmachinedetails', '=',2)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',2)
      ->where ('a.idmachinedetails', '=',2)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.cvhe330590view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }


    public function editcvhe330590(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();

      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',2)->where ('idmachinedetails', '=',2) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editcvhe330590', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function updatecvhe330590(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),        
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.cvhe330590view')->with('success','Data was Updated');
      
    }

    public function ac_unit_poly ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',3)->where ('idmachinedetails', '=',1) ->get(); 
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ac_unit_poly',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
    );
    }
    public function editac_unit_poly(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',3)->where ('idmachinedetails', '=',1) ->get();         
      $uk =  Auth::user()->unique_karyawan;      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editac_unit_poly', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    
    public function updateac_unit_poly(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
     $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
     job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.ac_unit_polyview')->with('success','Data was Updated');
      
    }

    public function ac_unit_polyview ( )    
    {
      $idmachines = 3;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',3)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',3)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16)
      ;       
      return view('jobs.ac_unit_polyview', compact('datajobs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
         
    }


    public function dryer_poly ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
   
           $grupleaders = employee::select ('employee# as employeeid','surname')->get();
           $supervisors = employee::select ('employee# as employeeid','surname')->get();
     
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',4)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dryer_poly',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );        
    }

    public function dryer_polyview ( )    
    {
      $idmachines = 4;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',4)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',4)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16)
      ;       
      return view('jobs.dryer_polyview', compact('datajobs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }

    public function editdryer_poly(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',4)->where ('idmachinedetails', '=',1) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editdryer_poly', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function updatedryer_poly(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.dryer_polyview')->with('success','Data was Updated');      
    }

    public function trafoview ( )    
    {
      $idmachines = 6;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',6)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',6)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16)
      ;       
      return view('jobs.trafoview', compact('datajobs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
         
    }

    public function trafo ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',6)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafo',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function edittrafo(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',6)->where ('idmachinedetails', '=',1) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.edittrafo', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function updatetrafo(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'silica_gel' => request('silica_gel'),
        'noise' => request('noise'),
        'panel_pe_condition' => request('panel_pe_condition'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.trafoview')->with('success','Data was Updated');
      
    }


    public function ahu_spinning1 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',5)->where ('idmachinedetails', '=',1) ->get(); 
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();



        $kode = DB::table('jobs')->max('id');
    	  $kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ahu_spinning1',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
        }
        public function ahu_spinning1view ()    
        {
          $idmachines = 5;
          $idmachinedetails = 1;
          $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',5)->where ('idmachinedetails', '=',1)->get(); 
    
          $datajobs = DB::table('jobs as a')    
          ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
          ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
          ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
          ->join('machines as b', 'b.id', '=', 'a.idmachine')
          ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
          ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
          ->wherecolumn('c.idmachine', '=', 'b.id')      
          ->whereColumn('c.id', '=', 'a.idmachinedetails')      
          ->whereColumn('d.idmachinedetails', '=', 'c.id')      
          ->whereColumn('d.idmachine', '=', 'b.id') 
          ->whereColumn('d.idmachine', '=', 'c.idmachine')
          ->where ('a.idmachine', '=',5)
          ->where ('a.idmachinedetails', '=',1)   
          ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
          ->orderBy ('a.tanggal','desc')            
          ->paginate(16);       
            return view('jobs.ahu_spinning1view', compact('datajobs','machinedetailnos')
            ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
        }
    
        public function editahu_spinning1(job $job)
        {
          $grupleaders = employee::select ('employee# as employeeid','surname')->get();
          $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
          $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',5)->where ('idmachinedetails', '=',1) ->get();         
          
          $uk =  Auth::user()->unique_karyawan;
          
          $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
          return view('jobs.editahu_spinning1', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
        }
    
        public function updateahu_spinning1(job $Job)
        {
          $tgl1 =request('tanggal');                
          $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
          $current_date_time = date('Y-m-d H:i:s');
          $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
          job::find($Job->id)->update([
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'mesin' => request('mesin'),            
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),
            'param6' => request('param6'),
            'param7' => request('param7'),
            'param8' => request('param8'),
            'param9' => request('param9'),
            'param10' => request('param10'),
            'param11' => request('param11'),
            'param12' => request('param12'),
            'param13' => request('param13'),
            'param14' => request('param14'),
            'param15' => request('param15'),
            'param16' => request('param16'),
            'param17' => request('param17'),
            'param18' => request('param18'),            
            'param19' => request('param19'),
            'overall_result' => request('overall_result'),
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'supervisor' => request('supervisor'),    
            'shift' => request('shift'),
            'remarks' => request('remarks'),
            'tgl_ops' => $tgl_ops,
          ]);
          return redirect()->route('jobs.ahu_spinning1view')->with('success','Data was Updated');
          
        }
    
    public function n2_plant ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',8)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.n2_plant',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function n2_plantview ()    
    {
      $idmachines = 8;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',8)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',8)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
      return view('jobs.n2_plantview', compact('datajobs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editn2_plant(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',8)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editn2_plant', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updaten2_plant(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
       $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
       job::find($Job->id)->update([
          'tanggal' =>$tgl,
          'idmachine' => request('idmachine'),
          'idmachinedetails' => request('idmachinedetails'),
          'idmachineno' => request('idmachineno'),
          'param1' => request('param1'),
          'param2' => request('param2'),
          'param3' => request('param3'),
          'bersalju' => request('bersalju'),          
          'param4' => request('param4'),
          'param5' => request('param5'),
          'param6' => request('param6'),
          'param7' => request('param7'),
          'param8' => request('param8'),
          'param9' => request('param9'),
          'overall_result' => request('overall_result'),
          'checked_by' => request('checked_by'),
          'group_leader' => request('group_leader'),
          'supervisor' => request('supervisor'),  
          'shift' => request('shift'),
          'remarks' => request('remarks'),
          'tgl_ops' => $tgl_ops,
        ]);
        return redirect()->route('jobs.n2_plantview')->with('success','Data was Updated');
        
      }
  

    public function demin_water ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
            //dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',7)->where ('idmachinedetails', '=',1) ->get(); 
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.demin_water',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    
    public function deminwaterview ()    
    {
      $idmachines = 7;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',7)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',7)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16)
      ;       
    return view('jobs.deminwaterview', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    



    public function editdeminwater(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',7)->where ('idmachinedetails', '=',1) ->get();         
      $uk =  Auth::user()->unique_karyawan;      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editdeminwater', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function updatedeminwater(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),            
        'param24' => request('param24'),
        'param25' => request('param25'),        
        'cation_anion_mix_bed' => request('cation_anion_mix_bed'),
        'softener' => request('softener'),
        'chemical' => request('chemical'),
        'catatan' => request('catatan'),        
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.deminwaterview')->with('success','Data was Updated');
      
    }

  

    public function ahu ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
           $grupleaders = employee::select ('employee# as employeeid','surname')->get();
           $supervisors = employee::select ('employee# as employeeid','surname')->get();
     
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',5) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ahu',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function compressordty1 ()
    {       
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',9)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.compressordty1',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }   
    
    public function compressordty1view ()    
    {
      $idmachines = 9;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',9)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',9)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.compressordty1view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editcompressordty1(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',9)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editcompressordty1', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updatecompressordty1(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
        job::find($Job->id)->update([
          'tanggal' =>$tgl,
          'idmachine' => request('idmachine'),
          'idmachinedetails' => request('idmachinedetails'),
          'idmachineno' => request('idmachineno'),
          'param1' => request('param1'),
          'param2' => request('param2'),
          'param3' => request('param3'),
          'param4' => request('param4'),
          'param5' => request('param5'),
          'param6' => request('param6'),
          'param7' => request('param7'),
          'param8' => request('param8'),
          'param9' => request('param9'),
          'param10' => request('param10'),
          'param11' => request('param11'),
          'param12' => request('param12'),
          'param13' => request('param13'),
          'param14' => request('param14'),
          'param15' => request('param15'),
          'param16' => request('param16'),
          'param17' => request('param17'),
          'param18' => request('param18'),            
          'param19' => request('param19'),
          'param20' => request('param20'),
          'param21' => request('param21'),
          'param22' => request('param22'),
          'param23' => request('param23'),
          'param24' => request('param24'),
          'param25' => request('param25'),
          'param26' => request('param26'),
          'param27' => request('param27'),
          'overall_result' => request('overall_result'),
          'checked_by' => request('checked_by'),
          'group_leader' => request('group_leader'),
          'supervisor' => request('supervisor'),  
          'shift' => request('shift'),
          'remarks' => request('remarks'),
          'tgl_ops' => $tgl_ops,
        ]);
        return redirect()->route('jobs.compressordty1view')->with('success','Data was Updated');
        
      }


      public function zr425view ()    
      {
        $idmachines = 10;
        $idmachinedetails = 1;
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',10)->where ('idmachinedetails', '=',1)->get(); 
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $datajobs = DB::table('jobs as a')    
        ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
        ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
        ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
        ->join('machines as b', 'b.id', '=', 'a.idmachine')
        ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
        ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
        ->wherecolumn('c.idmachine', '=', 'b.id')      
        ->whereColumn('c.id', '=', 'a.idmachinedetails')      
        ->whereColumn('d.idmachinedetails', '=', 'c.id')      
        ->whereColumn('d.idmachine', '=', 'b.id') 
        ->whereColumn('d.idmachine', '=', 'c.idmachine')
        ->where ('a.idmachine', '=',10)
        ->where ('a.idmachinedetails', '=',1)   
        ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
        ->orderBy ('a.tanggal','desc')            
        ->paginate(16);       
      return view('jobs.zr425view', compact('datajobs','machinedetailnos','grupleaders','supervisors')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
      }
      
  
    public function zr425 ()
    {       
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',10)->where ('idmachinedetails', '=',1) ->get(); 
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();

        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.zr425',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }    

    public function editzr425(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',10)->where ('idmachinedetails', '=',1) ->get();         
      $uk =  Auth::user()->unique_karyawan;      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editzr425', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    
    public function updatezr425(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),  
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.zr425view')->with('success','Data was Updated');
      
    }


    public function elliotplf2 ()
    {       
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
           $grupleaders = employee::select ('employee# as employeeid','surname')->get();
           $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',10)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.elliotplf2',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }    

    public function elliotplf2view ()    
    {
      $idmachines = 10;
      $idmachinedetails = 2;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',10)->where ('idmachinedetails', '=',2)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',10)
      ->where ('a.idmachinedetails', '=',2)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16)
      ;       
    return view('jobs.elliotplf2view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    



    public function editelliotplf2(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',10)->where ('idmachinedetails', '=',2) ->get();         
      $uk =  Auth::user()->unique_karyawan;      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editelliotplf2', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function updateelliotplf2(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),            
        'param24' => request('param24'),
        'param25' => request('param25'),        
        'param26' => request('param26'),
        'param27' => request('param27'),
        'param28' => request('param28'),
        'param29' => request('param29'),            
        'param30' => request('param30'),
        'param31' => request('param31'),
        'param32' => request('param32'),
        'overall_result' => request('overall_result'),        
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.elliotplf2view')->with('success','Data was Updated');      
    }


    public function dryerfd1600plf2 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
   
           $grupleaders = employee::select ('employee# as employeeid','surname')->get();
           $supervisors = employee::select ('employee# as employeeid','surname')->get();

        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',11)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dryerfd1600plf2',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function dryerfd1600plf2view ()    
    {
      $idmachines = 11;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',11)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',11)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
      return view('jobs.dryerfd1600plf2view', compact('datajobs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editdryerfd1600plf2(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',11)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editdryerfd1600plf2', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updatedryerfd1600plf2(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
       $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
       job::find($Job->id)->update([
          'tanggal' =>$tgl,
          'idmachine' => request('idmachine'),
          'idmachinedetails' => request('idmachinedetails'),
          'idmachineno' => request('idmachineno'),
          'param1' => request('param1'),
          'param2' => request('param2'),
          'param3' => request('param3'),
          'param4' => request('param4'),
          'param5' => request('param5'),
          'overall_result' => request('overall_result'),
          'checked_by' => request('checked_by'),
          'group_leader' => request('group_leader'),
          'supervisor' => request('supervisor'),  
          'shift' => request('shift'),
          'remarks' => request('remarks'),
          'tgl_ops' => $tgl_ops,
        ]);
        return redirect()->route('jobs.dryerfd1600plf2view')->with('success','Data was Updated');
        
      }

    public function chillercvhe590 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
           $grupleaders = employee::select ('employee# as employeeid','surname')->get();
           $supervisors = employee::select ('employee# as employeeid','surname')->get();
           $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',12)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.chillercvhe590',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function chillercvhe590view ()    
    {
      $idmachines = 12;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',12)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',12)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.chillercvhe590view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }


    public function editchillercvhe590(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();

      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',12)->where ('idmachinedetails', '=',1) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editchillercvhe590', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function updatechillercvhe590(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),        
        'param25' => request('param25'),
        'param26' => request('param26'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.chillercvhe590view')->with('success','Data was Updated');
      
    }


    public function ahu_spinning2 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',13)->where ('idmachinedetails', '=',1) ->get(); 
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();

        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ahu_spinning2',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function ahu_spinning2view ()    
    {
      $idmachines = 13;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',13)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',13)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
        return view('jobs.ahu_spinning2view', compact('datajobs','machinedetailnos')
        ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }

    public function editahu_spinning2(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();

      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',13)->where ('idmachinedetails', '=',1) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editahu_spinning2', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    public function updateahu_spinning2(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'mesin' => request('mesin'),            
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),    
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.ahu_spinning2view')->with('success','Data was Updated');
      
    }

    public function trafo_plf2 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',14)->where ('idmachinedetails', '=',1) ->get(); 
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();

        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafo',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function trafogenset ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',16)->where ('idmachinedetails', '=',1) ->get(); 
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();

        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafogenset',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function trafogensetview ()    
    {
      $idmachines = 16;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',16)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',16)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
  return view('jobs.trafogensetview', compact('datajobs','machinedetailnos')
  ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function edittrafogenset(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',16)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.edittrafogenset', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updatetrafogenset(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
        job::find($Job->id)->update([
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'overall_result' => request('overall_result'),
        'panel_pe_condition' => request('panel_pe_condition'),        
        'silica_gel' => request('silica_gel'),        
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
        ]);
        return redirect()->route('jobs.trafogensetview')->with('success','Data was Updated');        
      }


    public function dieselengine1 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',17)->where ('idmachinedetails', '=',1) ->get(); 
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dieselengine1',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function dieselengine1view ()    
    {
      $idmachines = 17;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',17)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',17)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.dieselengine1view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editdieselengine1(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',17)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editdieselengine1', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updatedieselengine1(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
       $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
       job::find($Job->id)->update([
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'param25' => request('param25'),
        'param26' => request('param26'),
        'param27' => request('param27'),
        'param28' => request('param28'),
        'param29' => request('param29'),
        'param30' => request('param30'),
        'param31' => request('param31'),
        'param32' => request('param32'),
        'param33' => request('param33'),
        'param34' => request('param34'),
        'param35' => request('param35'),
        'param36' => request('param36'),
        'param37' => request('param37'),
        'param38' => request('param38'),
        'param39' => request('param39'),
        'param40' => request('param40'),
        'param41' => request('param41'),
        'param42' => request('param42'),
        'param43' => request('param43'),
        'param44' => request('param44'),
        'param45' => request('param45'),
        'param46' => request('param46'),
        'param47' => request('param47'),
        'param48' => request('param48'),            
        'param49' => request('param49'),
        'param50' => request('param50'),
        'param51' => request('param51'),
        'param52' => request('param52'),
        'param53' => request('param53'),
        'param54' => request('param54'),
        'param55' => request('param55'),
        'param56' => request('param56'),
        'param57' => request('param57'),
        'param58' => request('param58'),
        'param59' => request('param59'),        
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => 'required', 
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
        ]);
        return redirect()->route('jobs.dieselengine1view')->with('success','Data was Updated');        
      }

    public function dieselengine2 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',17)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dieselengine2',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function dieselengine2view ()    
    {
      $idmachines = 17;
      $idmachinedetails = 2;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',17)->where ('idmachinedetails', '=',2)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',17)
      ->where ('a.idmachinedetails', '=',2)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.dieselengine2view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editdieselengine2(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();

        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',17)->where ('idmachinedetails', '=',2) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editdieselengine2', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updatedieselengine2(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
       $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
       job::find($Job->id)->update([
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'param25' => request('param25'),
        'param26' => request('param26'),
        'param27' => request('param27'),
        'param28' => request('param28'),
        'param29' => request('param29'),
        'param30' => request('param30'),
        'param31' => request('param31'),
        'param32' => request('param32'),
        'param33' => request('param33'),
        'param34' => request('param34'),
        'param35' => request('param35'),
        'param36' => request('param36'),
        'param37' => request('param37'),
        'param38' => request('param38'),
        'param39' => request('param39'),
        'param40' => request('param40'),
        'param41' => request('param41'),
        'param42' => request('param42'),
        'param43' => request('param43'),
        'param44' => request('param44'),
        'param45' => request('param45'),
        'param46' => request('param46'),
        'param47' => request('param47'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
        ]);
        return redirect()->route('jobs.dieselengine2view')->with('success','Data was Updated');        
      }


    public function gasengine1 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',18)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.gasengine1',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }
    public function gasengine1view ()    
    {
      $idmachines = 18;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',18)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',18)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.gasengine1view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editgasengine1(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',18)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editgasengine1', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updategasengine1(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
        job::find($Job->id)->update([
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'param25' => request('param25'),
        'param26' => request('param26'),
        'param27' => request('param27'),
        'param28' => request('param28'),
        'param29' => request('param29'),
        'param30' => request('param30'),
        'param31' => request('param31'),
        'param32' => request('param32'),
        'param33' => request('param33'),
        'param34' => request('param34'),
        'param35' => request('param35'),
        'param36' => request('param36'),
        'param37' => request('param37'),
        'param38' => request('param38'),
        'param39' => request('param39'),
        'param40' => request('param40'),
        'param41' => request('param41'),
        'param42' => request('param42'),
        'param43' => request('param43'),
        'param44' => request('param44'),
        'param45' => request('param45'),
        'param46' => request('param46'),
        'param47' => request('param47'),
        'param48' => request('param48'),        
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
        ]);
        return redirect()->route('jobs.gasengine1view')->with('success','Data was Updated');        
      }


    public function gasengine2 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',18)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.gasengine2',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function gasengine2view ()    
    {
      $idmachines = 18;
      $idmachinedetails = 2;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',18)->where ('idmachinedetails', '=',2)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',18)
      ->where ('a.idmachinedetails', '=',2)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.gasengine2view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editgasengine2(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',18)->where ('idmachinedetails', '=',2) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editgasengine2', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updategasengine2(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
        job::find($Job->id)->update([
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
        ]);
        return redirect()->route('jobs.gasengine2view')->with('success','Data was Updated');        
      }

    public function chemical ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
          //  dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',19)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.chemical',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function chemicalview ()    
    {
      $idmachines = 19;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',19)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',19)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.chemicalview', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editchemical(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',19)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editchemical', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updatechemical(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
        job::find($Job->id)->update([
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'tgl_ops' => $tgl_ops,            
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        ]);
        return redirect()->route('jobs.chemicalview')->with('success','Data was Updated');        
      }


    public function panelstarter ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',20)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.panelstarter',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function panelstarterview ()    
      {
        $idmachines = 20;
        $idmachinedetails = 1;
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',20)->where ('idmachinedetails', '=',1)->get(); 
  
        $datajobs = DB::table('jobs as a')    
        ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
        ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
        ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
        ->join('machines as b', 'b.id', '=', 'a.idmachine')
        ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
        ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
        ->wherecolumn('c.idmachine', '=', 'b.id')      
        ->whereColumn('c.id', '=', 'a.idmachinedetails')      
        ->whereColumn('d.idmachinedetails', '=', 'c.id')      
        ->whereColumn('d.idmachine', '=', 'b.id') 
        ->whereColumn('d.idmachine', '=', 'c.idmachine')
        ->where ('a.idmachine', '=',20)
        ->where ('a.idmachinedetails', '=',1)   
        ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
        ->orderBy ('a.tanggal','desc')            
        ->paginate(16);       
          return view('jobs.panelstarterview', compact('datajobs','machinedetailnos')
          ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editpanelstarter(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',20)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editpanelstarter', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updatepanelstarter(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
        job::find($Job->id)->update([
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            

        ]);
        return redirect()->route('jobs.panelstarterview')->with('success','Data was Updated');        
      }


    public function auxiliary1 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',21)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.auxiliary1',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function auxiliary1view ()    
    {
      $idmachines = 21;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',21)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',21)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
      return view('jobs.auxiliary1view', compact('datajobs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
  }
  
    public function editauxiliary1(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',21)->where ('idmachinedetails', '=',1) ->get();         
      $uk =  Auth::user()->unique_karyawan;      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editauxiliary1', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    
    public function updateauxiliary1(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
      'id' => request('id'),                   
      'tanggal' =>$tgl,
      'idmachine' => request('idmachine'),
      'idmachinedetails' => request('idmachinedetails'),
      'idmachineno' => request('idmachineno'),
      'updated_at' => $current_date_time,
      'created_at' =>$current_date_time,
      'param1' => request('param1'),
      'param2' => request('param2'),
      'param3' => request('param3'),
      'param4' => request('param4'),
      'param5' => request('param5'),
      'param6' => request('param6'),
      'param7' => request('param7'),
      'param8' => request('param8'),
      'param9' => request('param9'),
      'param10' => request('param10'),
      'param11' => request('param11'),
      'param12' => request('param10'),
      'param13' => request('param11'),
      'overall_result' => request('overall_result'),
      'checked_by' => request('checked_by'),
      'group_leader' => request('group_leader'),
      'supervisor' => request('supervisor'),
      'shift' => request('shift'),
      'remarks' => request('remarks'),
      'tgl_ops' => $tgl_ops,            
      ]);
      return redirect()->route('jobs.auxiliary1view')->with('success','Data was Updated');        
    }


    public function auxiliary2 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
            //dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',21)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.auxiliary2',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
        }

        public function auxiliary2view ()    
        {
          $idmachines = 21;
          $idmachinedetails = 2;
          $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',21)->where ('idmachinedetails', '=',2)->get(); 
    
          $datajobs = DB::table('jobs as a')    
          ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
          ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
          ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
          ->join('machines as b', 'b.id', '=', 'a.idmachine')
          ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
          ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
          ->wherecolumn('c.idmachine', '=', 'b.id')      
          ->whereColumn('c.id', '=', 'a.idmachinedetails')      
          ->whereColumn('d.idmachinedetails', '=', 'c.id')      
          ->whereColumn('d.idmachine', '=', 'b.id') 
          ->whereColumn('d.idmachine', '=', 'c.idmachine')
          ->where ('a.idmachine', '=',21)
          ->where ('a.idmachinedetails', '=',2)   
          ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
          ->orderBy ('a.tanggal','desc')            
          ->paginate(16);       
              return view('jobs.auxiliary2view', compact('datajobs','machinedetailnos')
              ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
      }
      
        public function editauxiliary2(job $job)
        {
          $grupleaders = employee::select ('employee# as employeeid','surname')->get();
          $supervisors = employee::select ('employee# as employeeid','surname')->get();  
          $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',21)->where ('idmachinedetails', '=',2) ->get();         
          $uk =  Auth::user()->unique_karyawan;      
          $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
          return view('jobs.editauxiliary2', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
        }
    
        
        public function updateauxiliary2(job $Job)
        {
          $tgl1 =request('tanggal');                
          $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
          $current_date_time = date('Y-m-d H:i:s');
          $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
          job::find($Job->id)->update([
          'id' => request('id'),                   
          'tanggal' =>$tgl,
          'idmachine' => request('idmachine'),
          'idmachinedetails' => request('idmachinedetails'),
          'idmachineno' => request('idmachineno'),
          'updated_at' => $current_date_time,
          'created_at' =>$current_date_time,
          'param1' => request('param1'),
          'param2' => request('param2'),
          'param3' => request('param3'),
          'param4' => request('param4'),
          'param5' => request('param5'),
          'param6' => request('param6'),
          'param7' => request('param7'),
          'param8' => request('param8'),
          'param9' => request('param9'),
          'param10' => request('param10'),
          'param11' => request('param11'),
          'param12' => request('param10'),
          'param13' => request('param11'),
          'param14' => request('param14'),
          'param15' => request('param15'),
          'param16' => request('param16'),
          'param17' => request('param17'),
          'param18' => request('param18'),
          'overall_result' => request('overall_result'),
          'checked_by' => request('checked_by'),
          'group_leader' => request('group_leader'),
          'supervisor' => request('supervisor'),
          'shift' => request('shift'),
          'remarks' => request('remarks'),
          'tgl_ops' => $tgl_ops,                
          ]);
          return redirect()->route('jobs.auxiliary2view')->with('success','Data was Updated');        
        }
    

    public function flowmeter ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
            //dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',22)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.flowmeter',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function flowmeterview ()    
    {
      $idmachines = 22;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',22)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',22)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
      return view('jobs.flowmeterview', compact('datajobs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
  }
  
    public function editflowmeter(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',22)->where ('idmachinedetails', '=',1) ->get();         
      $uk =  Auth::user()->unique_karyawan;      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editflowmeter', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
    }

    
    public function updateflowmeter(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
      'id' => request('id'),                   
      'tanggal' =>$tgl,
      'idmachine' => request('idmachine'),
      'idmachinedetails' => request('idmachinedetails'),
      'idmachineno' => request('idmachineno'),
      'updated_at' => $current_date_time,
      'created_at' =>$current_date_time,
      'param1' => request('param1'),
      'param2' => request('param2'),
      'overall_result' => request('overall_result'),
      'checked_by' => request('checked_by'),
      'group_leader' => request('group_leader'),
      'supervisor' => request('supervisor'),
      'shift' => request('shift'),
      'remarks' => request('remarks'),
      'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.flowmeterview')->with('success','Data was Updated');        
    }


    public function wwt ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',23)->where ('idmachinedetails', '=',1) ->get(); 
        $aux_categorys = aux_category::select ('*') ->where ('parent_num', '=','ST')->get(); 
        $aux_categoryvxs = aux_category::select ('*') ->where ('parent_num', '=','VX')->get(); 
        $kode = DB::table('jobs')->max('id');
    	  $kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.wwt',compact ('machinedetailnos','employeeids','aux_categorys','aux_categoryvxs','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function wwtview ()    
    {
      $idmachines = 23;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',23)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',23)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
      $aux_categorys = aux_category::select ('*') ->where ('parent_num', '=','ST')->get(); 
      $aux_categoryvxs = aux_category::select ('*') ->where ('parent_num', '=','VX')->get(); 
      return view('jobs.wwtview', compact('datajobs','aux_categorys','aux_categoryvxs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);    
  }
  
    public function editwwt(job $job)
    {
      $grupleaders = employee::select ('employee# as employeeid','surname')->get();
      $supervisors = employee::select ('employee# as employeeid','surname')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',23)->where ('idmachinedetails', '=',1) ->get();         
      $aux_categorys = aux_category::select ('*') ->where ('parent_num', '=','ST')->get(); 
      $aux_categoryvxs = aux_category::select ('*') ->where ('parent_num', '=','VX')->get(); 

      $uk =  Auth::user()->unique_karyawan;      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editwwt', compact('job','machinedetailnos','employeeids','grupleaders','supervisors','aux_categorys','aux_categoryvxs'),['uk' => $uk]);    
    }

    

    public function updatewwt(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
      'id' => request('id'),                   
      'tanggal' =>$tgl,
      'idmachine' => request('idmachine'),
      'idmachinedetails' => request('idmachinedetails'),
      'idmachineno' => request('idmachineno'),
      'updated_at' => $current_date_time,
      'created_at' =>$current_date_time,
      'param1' => request('param1'),
      'param2' => request('param2'),
      'param3' => request('param3'),
      'param4' => request('param4'),
      'param5' => request('param5'),
      'param6' => request('param6'),
      'param7' => request('param7'),
      'param8' => request('param8'),
      'param9' => request('param9'),
      'param10' => request('param10'),
      'param11' => request('param11'),
      'param12' => request('param12'),
      'param13' => request('param13'),
      'param14' => request('param14'),
      'param15' => request('param15'),
      'param16' => request('param16'),
      'param17' => request('param17'),
      'param18' => request('param18'),
      'param19' => request('param19'),
      'param20' => request('param20'),
      'param21' => request('param21'),
      'param22' => request('param22'),
      'param23' => request('param23'),
      'param24' => request('param24'),
      'checked_by' => request('checked_by'),
      'group_leader' => request('group_leader'),
      'supervisor' => request('supervisor'),
      'shift' => request('shift'),
      'remarks' => request('remarks'),
      'tgl_ops' => $tgl_ops,            
      ]);
      return redirect()->route('jobs.wwtview')->with('success','Data was Updated');        
    }


    public function paramwwt ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',23)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.paramwwt',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function paramwwtview ()    
    {
      $idmachines = 23;
      $idmachinedetails = 2;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',23)->where ('idmachinedetails', '=',2)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',23)
      ->where ('a.idmachinedetails', '=',2)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);           

  return view('jobs.paramwwtview', compact('datajobs','machinedetailnos')
  ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
  }
  
    public function editparamwwt(job $job)
    {
      $grupleaders = employee::select ('*')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',23)->where ('idmachinedetails', '=',2) ->get();         
      $uk =  Auth::user()->unique_karyawan;      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editparamwwt', compact('job','machinedetailnos','employeeids','grupleaders'),['uk' => $uk]);    
    }

    

    public function updateparamwwt(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
     $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
     job::find($Job->id)->update([
      'id' => request('id'),                   
      'tanggal' =>$tgl,
      'idmachine' => request('idmachine'),
      'idmachinedetails' => request('idmachinedetails'),
      'idmachineno' => request('idmachineno'),
      'updated_at' => $current_date_time,
      'created_at' =>$current_date_time,
      'param1' => request('param1'),
      'param2' => request('param2'),
      'param3' => request('param3'),
      'param4' => request('param4'),
      'param5' => request('param5'),
      'param6' => request('param6'),
      'param7' => request('param7'),
      'param8' => request('param8'),
      'param9' => request('param9'),
      'param10' => request('param10'),
      'tgl_ops' => $tgl_ops,            
      'checked_by' => request('checked_by'),
      'group_leader' => request('group_leader'),
      'supervisor' => request('supervisor'),
      ]);
      return redirect()->route('jobs.paramwwtview')->with('success','Data was Updated');        
    }



    public function dailyreport ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
            //dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',23)->where ('idmachinedetails', '=',3) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dailyreport',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function dailyreportview ()    
    {
      $idmachines = 23;
      $idmachinedetails = 3;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',23)->where ('idmachinedetails', '=',3)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',23)
      ->where ('a.idmachinedetails', '=',3)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.dailyreportview', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editdailyreport(job $job)
      {
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',23)->where ('idmachinedetails', '=',3) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editdailyreport', compact('job','machinedetailnos','employeeids','grupleaders','supervisors'),['uk' => $uk]);    
      }
  
      
      public function updatedailyreport(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
       $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
       job::find($Job->id)->update([
          'tanggal' =>$tgl,
          'idmachine' => request('idmachine'),
          'idmachinedetails' => request('idmachinedetails'),
          'idmachineno' => request('idmachineno'),
          'param1' => request('param1'),
           'param2' => request('param2'),
           'param3' => request('param3'),
           'param4' => request('param4'),
           'param5' => request('param5'),
           'param6' => request('param6'),
           'param7' => request('param7'),        
           'catatan' => request('catatan'),     
           'checked_by' => request('checked_by'),
           'group_leader' => request('group_leader'),
           'supervisor' => request('supervisor'),
           'tgl_ops' => $tgl_ops,   
        ]);
        return redirect()->route('jobs.dailyreportview')->with('success','Data was Updated');        
      }


    public function trafowwt ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',24)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafowwt',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function trafowwtview ()    
    {
      $idmachines = 24;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',24)->where ('idmachinedetails', '=',1)->get(); 

            $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',24)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.trafowwtview', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }

    public function edittrafowwt(job $job)
    {
      $grupleaders = employee::select ('*')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',24)->where ('idmachinedetails', '=',1) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.edittrafowwt', compact('job','machinedetailnos','employeeids','grupleaders'),['uk' => $uk]);    
    }

    public function updatetrafowwt(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
         'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),                  
        'noise' => request('noise'),                              
        'panel_pe_condition' => request('panel_pe_condition'),                              
        'overall_result' => request('overall_result'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),   
        'checked_by' => request('checked_by'),
        'tgl_ops' => $tgl_ops,                
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
      ]);
      return redirect()->route('jobs.trafowwtview')->with('success','Data was Updated');
      
    }


    public function dryerdty1 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',25)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	  $kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dryerdty1',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function dryerdty1view ()    
    {
      $idmachines = 25;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',25)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',25)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.dryerdty1view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editdryerdty1(job $job)
      {
        $grupleaders = employee::select ('*')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',25)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editdryerdty1', compact('job','machinedetailnos','employeeids','grupleaders'),['uk' => $uk]);    
      }
  
      
      public function updatedryerdty1(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
        job::find($Job->id)->update([
          'tanggal' =>$tgl,
          'idmachine' => request('idmachine'),
          'idmachinedetails' => request('idmachinedetails'),
          'idmachineno' => request('idmachineno'),
          'param1' => request('param1'),
          'param2' => request('param2'),
          'param3' => request('param3'),
          'param4' => request('param4'),
          'param5' => request('param5'),
          'param6' => request('param6'),
          'param7' => request('param7'),
          'overall_result' => request('overall_result'),
          'checked_by' => request('checked_by'),
          'group_leader' => request('group_leader'),
          'supervisor' => request('supervisor'),  
          'shift' => request('shift'),
          'remarks' => request('remarks'),
          'tgl_ops' => $tgl_ops,
        ]);
        return redirect()->route('jobs.dryerdty1view')->with('success','Data was Updated');        
      }

    public function chillercvhe530 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
           $grupleaders = employee::select ('employee# as employeeid','surname')->get();
           $supervisors = employee::select ('employee# as employeeid','surname')->get();
     
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',26)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.chillercvhe530',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function chillercvhe530view ()    
    {
      $idmachines = 26;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',26)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',26)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.chillercvhe530view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editchillercvhe530(job $job)
      {
        $grupleaders = employee::select ('*')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',26)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editchillercvhe530', compact('job','machinedetailnos','employeeids','grupleaders'),['uk' => $uk]);    
      }
  
      
      public function updatechillercvhe530(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
       $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
       job::find($Job->id)->update([
          'tanggal' =>$tgl,
          'idmachine' => request('idmachine'),
          'idmachinedetails' => request('idmachinedetails'),
          'idmachineno' => request('idmachineno'),
          'param1' => request('param1'),
          'param2' => request('param2'),
          'param3' => request('param3'),
          'param4' => request('param4'),
          'param5' => request('param5'),
          'param6' => request('param6'),
          'param7' => request('param7'),
          'param8' => request('param8'),
          'param9' => request('param9'),
          'param10' => request('param10'),
          'param11' => request('param11'),
          'param12' => request('param12'),
          'param13' => request('param13'),
          'param14' => request('param14'),
          'param15' => request('param15'),
          'param16' => request('param16'),
          'param17' => request('param17'),
          'param18' => request('param18'),            
          'param19' => request('param19'),
          'param20' => request('param20'),
          'param21' => request('param21'),
          'param22' => request('param22'),
          'param23' => request('param23'),              
          'overall_result' => request('overall_result'),
          'checked_by' => request('checked_by'),
          'group_leader' => request('group_leader'),
          'supervisor' => request('supervisor'),  
          'shift' => request('shift'),
          'remarks' => request('remarks'),
          'tgl_ops' => $tgl_ops,
        ]);
        return redirect()->route('jobs.chillercvhe530view')->with('success','Data was Updated');        
      }


    public function ac_station ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
            //dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',27)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ac_station',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function ac_stationview ()    
    {
      $idmachines = 27;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',27)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',27)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.ac_stationview', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }

    public function editac_station(job $job)
    {
      $grupleaders = employee::select ('*')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',27)->where ('idmachinedetails', '=',1) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editac_station', compact('job','machinedetailnos','employeeids','grupleaders'),['uk' => $uk]);    
    }

    public function updateac_station(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'mesin' => request('mesin'),            
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,
      ]);
      return redirect()->route('jobs.ac_stationview')->with('success','Data was Updated');
      
    }

    public function trafodty1 ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
            //dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',28)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafodty1',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
    }

    public function trafodty1view ()    
    {
      $idmachines = 28;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',28)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',28)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.trafodty1view', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }

    public function edittrafodty1(job $job)
    {
      $grupleaders = employee::select ('*')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',28)->where ('idmachinedetails', '=',1) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editac_station', compact('job','machinedetailnos','employeeids','grupleaders'),['uk' => $uk]);    
    }

    public function updatetrafodty1(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),                  
        'silica_gel' => request('silica_gel'),
        'noise' => request('noise'),                              
        'panel_pe_condition' => request('panel_pe_condition'),                              
        'overall_result' => request('overall_result'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),   
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'tgl_ops' => $tgl_ops,                
      ]);
      return redirect()->route('jobs.trafodty1view')->with('success','Data was Updated');
      
    }


    public function wt ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
           // dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',29)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	  $kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        //dd ($kode);
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.wt',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]

        );                
    }

    public function editwt(job $job)
    {
      $grupleaders = employee::select ('*')->get();
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',29)->where ('idmachinedetails', '=',1) ->get();         
      
      $uk =  Auth::user()->unique_karyawan;
      
      $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
      return view('jobs.editwt', compact('job','machinedetailnos','employeeids','grupleaders'),['uk' => $uk]);    
    }

    public function updatewt(job $Job)
    {
      $tgl1 =request('tanggal');                
      $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
      $current_date_time = date('Y-m-d H:i:s');
      $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      job::find($Job->id)->update([
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'mesin' => request('mesin'),            
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),            
        'param24' => request('param24'),
        'param25' => request('param25'),                
        'chemical' => request('chemical'),                
        'scfilter' => request('scfilter'),                
        'softener' => request('softener'),                        
        'bak_sedimentasi' => request('bak_sedimentasi'),                        
        'catatan' => request('catatan'),                        
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'tgl_ops' => $tgl_ops,            
      ]);
      return redirect()->route('jobs.wtview')->with('success','Data was Updated');
      
    }

    public function wtview ()    
    {
      $idmachines = 29;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',29)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',29)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
      $aux_categorys = aux_category::select ('*') ->where ('parent_num', '=','ST')->get(); 
      $aux_categoryvxs = aux_category::select ('*') ->where ('parent_num', '=','VX')->get(); 
      return view('jobs.wtview', compact('datajobs','aux_categorys','aux_categoryvxs','machinedetailnos')
      ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);    
  }



    public function garduinduk ()
    {               
        $vtime = date('H');
        //   dd ($vtime)
           if ($vtime > 7 && $vtime <= 15) 
             {
               $shift = 1;
             }
           elseif ($vtime > 15 && $vtime <= 23) 
           {
             $shift = 2;
           }  
           else
           {
             $shift = 3;
           }          
            //dd ($vtime);
           //dd ($shift);
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',30)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        $grupleaders = employee::select ('employee# as employeeid','surname')->get();
        $supervisors = employee::select ('employee# as employeeid','surname')->get();
  
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.garduinduk',compact ('machinedetailnos','employeeids','grupleaders','supervisors'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]

        );                
    }

    public function garduindukview ()    
    {
      $idmachines = 30;
      $idmachinedetails = 1;
      $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',30)->where ('idmachinedetails', '=',1)->get(); 

      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',30)
      ->where ('a.idmachinedetails', '=',1)   
      ->select('a.*','e.surname','f.surname as gl','g.surname as spv','d.name')
      ->orderBy ('a.tanggal','desc')            
      ->paginate(16);       
    return view('jobs.garduindukview', compact('datajobs','machinedetailnos')
    ,['idmachines' => $idmachines,'idmachinedetails' => $idmachinedetails]);
    }
    
      public function editgarduinduk(job $job)
      {
        $grupleaders = employee::select ('*')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',30)->where ('idmachinedetails', '=',1) ->get();         
        $uk =  Auth::user()->unique_karyawan;      
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view('jobs.editgarduinduk', compact('job','machinedetailnos','employeeids','grupleaders'),['uk' => $uk]);    
      }
  
      
      public function updategarduinduk(job $Job)
      {
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
       $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
       job::find($Job->id)->update([
          'tanggal' =>$tgl,
          'idmachine' => request('idmachine'),
          'idmachinedetails' => request('idmachinedetails'),
          'idmachineno' => request('idmachineno'),
          'param1' => request('param1'),
          'param2' => request('param2'),
          'param3' => request('param3'),        
          'checked_by' => request('checked_by'),
          'group_leader' => request('group_leader'),
          'supervisor' => request('supervisor'),  
          'shift' => request('shift'),
          'tgl_ops' => $tgl_ops,
        ]);
        return redirect()->route('jobs.garduindukview')->with('success','Data was Updated');        
      }


    public function exportpdf(){
      return view ('jobs.exportpdf');
    }
    
    public function cetakpdf(Request $request)
    {
      $tgl_awal = $request->tgl_awal;
      $tgl_akhir = $request->tgl_akhir;
      $idmachines = $request->idmachines;
      $idmachinedetails = $request->idmachinedetails;
      $idmachineno = $request->idmachineno;
      //$machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',$idmachines)->where ('idmachinedetails', '=',$idmachinedetails)->where ('idmachineno', '=',$idmachineno) ->get(); 
      
      
      //dd ($idmachines);
      $datajobs = DB::table('jobs as a')    
      ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
      ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
      ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
      ->join('machines as b', 'b.id', '=', 'a.idmachine')
      ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
      ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
      ->whereBetween( 'a.tgl_ops',[$tgl_awal,$tgl_akhir])      
      ->wherecolumn('c.idmachine', '=', 'b.id')      
      ->whereColumn('c.id', '=', 'a.idmachinedetails')      
      ->whereColumn('d.idmachinedetails', '=', 'c.id')      
      ->whereColumn('d.idmachine', '=', 'b.id') 
      ->whereColumn('d.idmachine', '=', 'c.idmachine')
      ->where ('a.idmachine', '=',$idmachines)
      ->where ('a.idmachinedetails', '=',$idmachinedetails)   
      ->where ('a.idmachineno', '=',$idmachineno)   
      ->get(['a.tanggal','PARAM1', 'PARAM2', 'PARAM3', 'PARAM4', 'PARAM5' , 
      'PARAM6','PARAM7', 'param8', 'PARAM9' , 'PARAM10' , 'PARAM11',
      'PARAM12', 'PARAM13' , 'PARAM14' , 'PARAM15', 'PARAM16' , 'PARAM17' , 'PARAM18', 'PARAM19'
      ,'PARAM20', 'PARAM21' , 'PARAM22' , 'PARAM23', 'PARAM24' , 'PARAM25' , 'PARAM26', 'PARAM27'
      ,'PARAM28', 'PARAM29' , 'PARAM30' , 'PARAM31', 'PARAM32' , 'PARAM33' , 'PARAM34', 'PARAM35'
      ,'PARAM36', 'PARAM37' , 'PARAM38' , 'PARAM38', 'PARAM40' , 'PARAM41' , 'PARAM42', 'PARAM43'      
      ,'PARAM44', 'PARAM45' , 'PARAM46' , 'PARAM47', 'PARAM48' , 'PARAM49' , 'PARAM50', 'PARAM51'
      ,'PARAM52', 'PARAM53' , 'PARAM54' , 'PARAM55', 'PARAM56' , 'PARAM57' , 'PARAM58', 'PARAM59'
      ,'overall_result','shift','remarks','B.AREA','e.surname','f.surname as gl','g.surname as spv','d.name']);            
       view()->share('data',$datajobs);

       public function exportpdf(){
        return view ('jobs.exportpdf');
      }
      
      public function cetakpdf(Request $request)
      {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;
        $idmachines = $request->idmachines;
        $idmachinedetails = $request->idmachinedetails;
        $idmachineno = $request->idmachineno;
        //$machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',$idmachines)->where ('idmachinedetails', '=',$idmachinedetails)->where ('idmachineno', '=',$idmachineno) ->get(); 
        
        
        //dd ($idmachines);
        $datajobs = DB::table('jobs as a')    
        ->join('employees as e', 'e.employee#', '=', 'a.checked_by')
        ->leftjoin('employees as f', 'f.employee#', '=', 'a.group_leader')
        ->leftjoin('employees as g', 'g.employee#', '=', 'a.supervisor')
        ->join('machines as b', 'b.id', '=', 'a.idmachine')
        ->join('machinedetails as c', 'c.id', '=', 'a.idmachinedetails')
        ->join('machinedetailnos as d', 'd.id', '=', 'a.idmachineno')      
        ->whereBetween( 'a.tgl_ops',[$tgl_awal,$tgl_akhir])      
        ->wherecolumn('c.idmachine', '=', 'b.id')      
        ->whereColumn('c.id', '=', 'a.idmachinedetails')      
        ->whereColumn('d.idmachinedetails', '=', 'c.id')      
        ->whereColumn('d.idmachine', '=', 'b.id') 
        ->whereColumn('d.idmachine', '=', 'c.idmachine')
        ->where ('a.idmachine', '=',$idmachines)
        ->where ('a.idmachinedetails', '=',$idmachinedetails)   
        ->where ('a.idmachineno', '=',$idmachineno)   
        ->get(['a.tanggal','PARAM1', 'PARAM2', 'PARAM3', 'PARAM4', 'PARAM5' , 
        'PARAM6','PARAM7', 'param8', 'PARAM9' , 'PARAM10' , 'PARAM11',
        'PARAM12', 'PARAM13' , 'PARAM14' , 'PARAM15', 'PARAM16' , 'PARAM17' , 'PARAM18', 'PARAM19'
        ,'PARAM20', 'PARAM21' , 'PARAM22' , 'PARAM23', 'PARAM24' , 'PARAM25' , 'PARAM26', 'PARAM27'
        ,'PARAM28', 'PARAM29' , 'PARAM30' , 'PARAM31', 'PARAM32' , 'PARAM33' , 'PARAM34', 'PARAM35'
        ,'PARAM36', 'PARAM37' , 'PARAM38' , 'PARAM38', 'PARAM40' , 'PARAM41' , 'PARAM42', 'PARAM43'      
        ,'PARAM44', 'PARAM45' , 'PARAM46' , 'PARAM47', 'PARAM48' , 'PARAM49' , 'PARAM50', 'PARAM51'
        ,'PARAM52', 'PARAM53' , 'PARAM54' , 'PARAM55', 'PARAM56' , 'PARAM57' , 'PARAM58', 'PARAM59'
        ,'overall_result','shift','remarks','B.AREA','e.surname','f.surname as gl','g.surname as spv','d.name']);            
        view()->share('data',$datajobs);
        if ($idmachines == 1 && $idmachinedetails == 1) {      
           $pdf = PDF::loadview('jobs.datajobs',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
           return $pdf->setPaper('A3', 'landscape')->download('data.pdf');}
        else if ($idmachines == 1 && $idmachinedetails == 2) {
           $pdf = PDF::loadview('jobs.datazr400',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
           return $pdf->setPaper('A3', 'landscape')->download('data.pdf');}
        else if ($idmachines == 1 && $idmachinedetails == 3) {
           $pdf = PDF::loadview('jobs.datakaeser',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
           return $pdf->setPaper('A3', 'landscape')->download('data.pdf');}
        else if ($idmachines == 1 && $idmachinedetails == 4) {
            $pdf = PDF::loadview('jobs.dataelliot',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
            return $pdf->setPaper('A3', 'landscape')->download('data.pdf');}
        else if ($idmachines == 4 && $idmachinedetails == 1) {
              $pdf = PDF::loadview('jobs.datadryer_poly',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
              return $pdf->setPaper('A3', 'landscape')->download('data.pdf');}      
        else if ($idmachines == 2 && $idmachinedetails == 1) {
                $pdf = PDF::loadview('jobs.datacvgd390',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
                return $pdf->setPaper('A3', 'landscape')->download('data.pdf');}      
        else if ($idmachines == 2 && $idmachinedetails == 2) {
               $pdf = PDF::loadview('jobs.datacvhe330590',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
               return $pdf->setPaper('A3', 'landscape')->download('data.pdf');}      
       else if ($idmachines == 5 && $idmachinedetails == 1) {
               $pdf = PDF::loadview('jobs.dataahu_spinning1',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
               return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                    
              }      
       else if ($idmachines == 3 && $idmachinedetails == 1) {
              $pdf = PDF::loadview('jobs.dataac_unitpoly',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
              return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                    
             }      
       else if ($idmachines == 27 && $idmachinedetails == 1) {
              $pdf = PDF::loadview('jobs.dataac_station',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
              return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                    
             }      
       else if ($idmachines == 13 && $idmachinedetails == 1) {
              $pdf = PDF::loadview('jobs.dataahu_spinning2',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
              return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                          
       }
       else if ($idmachines == 21 && $idmachinedetails == 1) {
              $pdf = PDF::loadview('jobs.dataauxiliary1',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
              return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                    
             }      
       else if ($idmachines == 21 && $idmachinedetails == 2) {
              $pdf = PDF::loadview('jobs.dataauxiliary2',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
              return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                        
       }      else if ($idmachines == 19 && $idmachinedetails == 1) {
                $pdf = PDF::loadview('jobs.datachemical',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
                return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                    
               }      
        else if ($idmachines == 26 && $idmachinedetails == 1) {
                $pdf = PDF::loadview('jobs.datachillercvhe530',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
                return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                    
               }      
        else if ($idmachines == 12 && $idmachinedetails == 1) {
               $pdf = PDF::loadview('jobs.datachillercvhe590',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
               return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                    
              }      
        else if ($idmachines == 9 && $idmachinedetails == 1) {
               $pdf = PDF::loadview('jobs.datacompressordty1',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
               return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                    
              }      
        else if ($idmachines == 2 && $idmachinedetails == 1) {
               $pdf = PDF::loadview('jobs.datacvgd390',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
               return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                          
        } 
        else if ($idmachines == 2 && $idmachinedetails == 2) {
               $pdf = PDF::loadview('jobs.datacvhe330590',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
               return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                    
              }      
        else if ($idmachines == 7 && $idmachinedetails == 1) {
               $pdf = PDF::loadview('jobs.datademinwater',['idmachine'=>$idmachines,'idmachinedetails'=>$idmachinedetails]);
               return $pdf->setPaper('A3', 'landscape')->download('data.pdf');                          
        
  
       } 
        


      
    
      //dd ($idmachinedetails);
      //$pdf = PDF::loadView('jobs.datajobs')->setOptions(['defaultFont' => 'serif']); 
/*      if ($idmachine = 1 && $idmachinedetails = 1)  
      {
        view()->share('data',$datajobs);
        $pdf = PDF::loadview('jobs.datajobs',['idmachine'=>$idmachine,'idmachinedetails'=>$idmachinedetails]);
        return $pdf->setPaper('A3', 'landscape')->download('data.pdf');
        
      }
      else if ($idmachine = 1 && $idmachinedetails = 2)  
      {
        view()->share('data',$datajobs);
        $pdf = PDF::loadview('jobs.datazr400poly');
        return $pdf->setPaper('A3', 'landscape')->download('data.pdf');        
      }
  */  

      
      //return $pdf->download('data.pdf'); 
    }   
        
    public function store ()
    {
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
            $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');   
          
        job::create([           
            'id' => request('id'),
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'updated_at' => $current_date_time,
            'created_at' =>$current_date_time,
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),
            'param6' => request('param6'),
            'param7' => request('param7'),
            'param8' => request('param8'),
            'param9' => request('param9'),
            'param10' => request('param10'),
            'param11' => request('param11'),
            'param12' => request('param12'),
            'param13' => request('param13'),
            'param14' => request('param14'),
            'param15' => request('param15'),
            'param16' => request('param16'),
            'param17' => request('param17'),
            'param18' => request('param18'),            
            'param19' => request('param19'),
            'supervisor' => request('supervisor'),
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'shift' => request('shift'),
            'remarks' => request('remarks'),
            'tgl_ops' => $tgl_ops,            
            ]);
            return redirect()->route('jobs.polyview')->with('success','Data was Created');
            //return back()->with ('success','Transaction Created');                    
    }

    public function storezr400poly ()
    {
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
            $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
        job::create([
            'id' => request('id'),
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'updated_at' => $current_date_time,
            'created_at' =>$current_date_time,
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),
            'param6' => request('param6'),
            'param7' => request('param7'),
            'param8' => request('param8'),
            'param9' => request('param9'),
            'param10' => request('param10'),
            'param11' => request('param11'),
            'param12' => request('param12'),
            'param13' => request('param13'),
            'param14' => request('param14'),
            'param15' => request('param15'),
            'param16' => request('param16'),
            'param17' => request('param17'),
            'param18' => request('param18'),
            'param19' => request('param19'),
            'param20' => request('param20'),
            'param21' => request('param21'),
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'supervisor' => request('supervisor'),
            'shift' => request('shift'),
            'remarks' => request('remarks'),
            'tgl_ops' => $tgl_ops,            
        ]);   
        return redirect()->route('jobs.zr400polyview')->with('success','Data was Created');

    }

    public function storekaeser ()

    {
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
            $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

        job::create([ 
            'id' => request('id'),          
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'updated_at' => $current_date_time,
            'created_at' =>$current_date_time,
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),
            'param6' => request('param6'),
            'param7' => request('param7'),
            'param8' => request('param8'),
            'param9' => request('param9'),
            'param10' => request('param10'),
            'param11' => request('param11'),
            'param12' => request('param12'),
            'param13' => request('param13'),
            'param14' => request('param14'),
            'param15' => request('param15'),
            'param16' => request('param16'),
            'param17' => request('param17'),
            'param18' => request('param18'),            
            'overall_result' => request('overall_result'),
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'supervisor' => request('supervisor'),
            'shift' => request('shift'),
            'remarks' => request('remarks'),
            'tgl_ops' => $tgl_ops,            
        ]);   

        return redirect()->route('jobs.kaeserview')->with('success','Data was Created');

    }

    public function storeelliot ()
    {
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
           $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

        job::create([ 
            'id' => request('id'),          
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'updated_at' => $current_date_time,
            'created_at' =>$current_date_time,
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),
            'param6' => request('param6'),
            'param7' => request('param7'),
            'param8' => request('param8'),
            'param9' => request('param9'),
            'param10' => request('param10'),
            'param11' => request('param11'),
            'param12' => request('param12'),
            'param13' => request('param13'),
            'param14' => request('param14'),
            'param15' => request('param15'),
            'param16' => request('param16'),
            'param17' => request('param17'),
            'param18' => request('param18'),            
            'param19' => request('param19'),
            'param20' => request('param20'),
            'param21' => request('param21'),
            'param22' => request('param22'),
            'param23' => request('param23'),
            'param24' => request('param24'),
            'param25' => request('param25'),
            'param26' => request('param26'),
            'param27' => request('param27'),
            'param28' => request('param28'),
            'param29' => request('param29'),
            'param30' => request('param30'),
            'param31' => request('param31'),
            'overall_result' => request('overall_result'),
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'supervisor' => request('supervisor'),            
            'shift' => request('shift'),
            'remarks' => request('remarks'),
            'tgl_ops' => $tgl_ops,            
        ]);   
        return redirect()->route('jobs.elliotview')->with('success','Data was Created');
        //return back()->with ('success','Transaction Created');     

    }

    public function storecvgd_390 ()

    {
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
            $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

        job::create([ 
            'id' => request('id'),                    
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'updated_at' => $current_date_time,
            'created_at' =>$current_date_time,
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),
            'param6' => request('param6'),
            'param7' => request('param7'),
            'param8' => request('param8'),
            'param9' => request('param9'),
            'param10' => request('param10'),
            'param11' => request('param11'),
            'param12' => request('param12'),
            'param13' => request('param13'),
            'param14' => request('param14'),
            'param15' => request('param15'),
            'param16' => request('param16'),
            'param17' => request('param17'),
            'param18' => request('param18'),            
            'param19' => request('param19'),
            'param20' => request('param20'),
            'param21' => request('param21'),
            'param22' => request('param22'),
            'param23' => request('param23'),            
            'overall_result' => request('overall_result'),
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'supervisor' => request('supervisor'),    
            'shift' => request('shift'),
            'remarks' => request('remarks'),
            'tgl_ops' => $tgl_ops,            
        ]);
        return redirect()->route('jobs.cvgd390view')->with('success','Data was Updated');     
           }

    public function storecvhe_330_590 ()

    {
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
            $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

        job::create([   
            'id' => request('id'),                  
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'updated_at' => $current_date_time,
            'created_at' =>$current_date_time,
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),
            'param6' => request('param6'),
            'param7' => request('param7'),
            'param8' => request('param8'),
            'param9' => request('param9'),
            'param10' => request('param10'),
            'param11' => request('param11'),
            'param12' => request('param12'),
            'param13' => request('param13'),
            'param14' => request('param14'),
            'param15' => request('param15'),
            'param16' => request('param16'),
            'param17' => request('param17'),
            'param18' => request('param18'),            
            'param19' => request('param19'),
            'param20' => request('param20'),
            'param21' => request('param21'),
            'param22' => request('param22'),
            'param23' => request('param23'),            
            'param24' => request('param24'),
            'overall_result' => request('overall_result'),
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'supervisor' => request('supervisor'),    
            'shift' => request('shift'),
            'remarks' => request('remarks'),
            'tgl_ops' => $tgl_ops,            
        ]);   

        return redirect()->route('jobs.cvhe330590view')->with('success','Data was Updated');     

    }

    public function storeac_unit_poly ()
    {
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
            $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

        job::create([  
            'id' => request('id'),                   
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'updated_at' => $current_date_time,
            'created_at' =>$current_date_time,
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),
            'param6' => request('param6'),
            'param7' => request('param7'),
            'overall_result' => request('overall_result'),
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'supervisor' => request('supervisor'),    
            'shift' => request('shift'),
            'remarks' => request('remarks'),
            'tgl_ops' => $tgl_ops,            
        ]);   

        return redirect()->route('jobs.ac_unit_polyview')->with('success','Data was Updated');
       }

       public function storedryer_poly ()
       {
               $tgl1 =request('tanggal');                
               $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
               $current_date_time = date('Y-m-d H:i:s');
               $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
   
           job::create([       
                'id' => request('id'),              
               'tanggal' =>$tgl,
               'idmachine' => request('idmachine'),
               'idmachinedetails' => request('idmachinedetails'),
               'idmachineno' => request('idmachineno'),
               'updated_at' => $current_date_time,
               'created_at' =>$current_date_time,
                'param1' => request('param1'),
               'param2' => request('param2'),
               'param3' => request('param3'),
               'param4' => request('param4'),
               'param5' => request('param5'),                  
               'overall_result' => request('overall_result'),
               'checked_by' => request('checked_by'),
               'group_leader' => request('group_leader'),
               'supervisor' => request('supervisor'),       
               'shift' => request('shift'),
               'remarks' => request('remarks'),   
               'tgl_ops' => $tgl_ops,            
           ]);   
           return redirect()->route('jobs.dryerpolyview')->with('success','Data was Created');      
   
       }

       public function storetrafo ()
       {
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
            $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

        job::create([ 
            'id' => request('id'),                    
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'updated_at' => $current_date_time,
            'created_at' =>$current_date_time,
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),                  
            'silica_gel' => request('silica_gel'),
            'noise' => request('noise'),                              
            'panel_pe_condition' => request('panel_pe_condition'),                              
            'overall_result' => request('overall_result'),
            'shift' => request('shift'),
            'remarks' => request('remarks'),   
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'supervisor' => request('supervisor'),    
            'tgl_ops' => $tgl_ops,            
        ]);   
        return redirect()->route('jobs.trafoview')->with('success','Data was Created');
        
       }
       
       public function storeahu_spinning1 ()
       {
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
            $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

        job::create([  
            'id' => request('id'),                   
            'tanggal' =>$tgl,
            'idmachine' => request('idmachine'),
            'idmachinedetails' => request('idmachinedetails'),
            'idmachineno' => request('idmachineno'),
            'updated_at' => $current_date_time,
            'created_at' =>$current_date_time,
            'mesin' => request('mesin'),
            'param1' => request('param1'),
            'param2' => request('param2'),
            'param3' => request('param3'),
            'param4' => request('param4'),
            'param5' => request('param5'),
            'param6' => request('param6'),
            'param7' => request('param7'),
            'param8' => request('param8'),
            'param9' => request('param9'),
            'param10' => request('param10'),
            'param11' => request('param11'),
            'param12' => request('param12'),
            'param13' => request('param13'),
            'param14' => request('param14'),
            'param15' => request('param15'),
            'param16' => request('param16'),
            'param17' => request('param17'),
            'param18' => request('param18'),            
            'param19' => request('param19'),               
            'overall_result' => request('overall_result'),
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'supervisor' => request('supervisor'),    
            'shift' => request('shift'),
            'remarks' => request('remarks'),
            'tgl_ops' => $tgl_ops,            
            ]);          
            return redirect()->route('jobs.ahu_spinning1view')->with('success','Data was Updated');
       }

       public function storen2_plant ()
       {
               $tgl1 =request('tanggal');                
               $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
               $current_date_time = date('Y-m-d H:i:s');
               $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
   
           job::create([   
                'id' => request('id'),                  
               'tanggal' =>$tgl,
               'idmachine' => request('idmachine'),
               'idmachinedetails' => request('idmachinedetails'),
               'idmachineno' => request('idmachineno'),
               'updated_at' => $current_date_time,
               'created_at' =>$current_date_time,
               'param1' => request('param1'),
               'param2' => request('param2'),
               'param3' => request('param3'),
               'param4' => request('param4'),
               'param5' => request('param5'),
               'param6' => request('param6'),
               'param7' => request('param7'),
               'param8' => request('param8'),
               'param9' => request('param9'),
               'bersalju' => request('bersalju'),
               'overall_result' => request('overall_result'),
               'checked_by' => request('checked_by'),
               'group_leader' => request('group_leader'),
               'supervisor' => request('supervisor'),       
               'shift' => request('shift'),
               'remarks' => request('remarks'),
               'tgl_ops' => $tgl_ops,            
           ]);   
             return redirect()->route('jobs.n2_plantview')->with('success','Data was Created');

          }

          public function storedemin_water ()  
          {            
                  $tgl1 =request('tanggal');                
                  $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
                  $current_date_time = date('Y-m-d H:i:s');
                  $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');
      
              job::create([     
                   'id' => request('id'),                
                  'tanggal' =>$tgl,
                  'idmachine' => request('idmachine'),
                  'idmachinedetails' => request('idmachinedetails'),
                  'idmachineno' => request('idmachineno'),
                  'updated_at' => $current_date_time,
                  'created_at' =>$current_date_time,
                  'param1' => request('param1'),
                  'param2' => request('param2'),
                  'param3' => request('param3'),
                  'param4' => request('param4'),
                  'param5' => request('param5'),
                  'param6' => request('param6'),
                  'param7' => request('param7'),
                  'param8' => request('param8'),
                  'param9' => request('param9'),
                  'param10' => request('param10'),
                  'param11' => request('param11'),
                  'param12' => request('param12'),
                  'param13' => request('param13'),
                  'param14' => request('param14'),
                  'param15' => request('param15'),
                  'param16' => request('param16'),
                  'param17' => request('param17'),
                  'param18' => request('param18'),            
                  'param19' => request('param19'),
                  'param20' => request('param20'),
                  'param21' => request('param21'),
                  'param22' => request('param22'),
                  'param23' => request('param23'),            
                  'param24' => request('param24'),
                  'param25' => request('param25'),                  
                  'cation_anion_mix_bed' => request('cation_anion_mix_bed'),
                  'softener' => request('softener'),
                  'chemical' => request('chemical'),
                  'catatan' => request('catatan'),
                  'checked_by' => request('checked_by'),
                  'group_leader' => request('group_leader'),
                  'supervisor' => request('supervisor'),          
                  'shift' => request('shift'),
                  'tgl_ops' => $tgl_ops,            
                ]); 
        

                return redirect()->route('jobs.deminwaterview')->with('success','Data was Created');
}            

public function storecompressordty1 ()
{
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([   
        'id' => request('id'),                  
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'param25' => request('param25'),
        'param26' => request('param26'),
        'param27' => request('param27'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.compressordty1view')->with('success','Data was Updated');
}
public function storezr425 ()
{
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([    
        'id' => request('id'),                 
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.zr425view')->with('success','Data was Created');

}
public function storeelliotplf2 ()
{

    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'param12' => 'required',
            'param13' => 'required',                
            'param14' => 'required',
            'param15' => 'required',                
            'param16' => 'required',                
            'param17' => 'required',                
            'param18' => 'required',                
            'param19' => 'required',                
            'param20' => 'required',                
            'param21' => 'required',
            'param22' => 'required',                
            'param23' => 'required',
            'param24' => 'required',                
            'param25' => 'required',                
            'param26' => 'required',                
            'param27' => 'required',                
            'param28' => 'required',                
            'param29' => 'required',                
            'param30' => 'required',                
            'param31' => 'required',                                
            'param32' => 'required',                                            
            'overall_result' => 'required',
            'shift' => 'required',
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',
            'supervisor' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([   
        'id' => request('id'),                  
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'param25' => request('param25'),
        'param26' => request('param26'),
        'param27' => request('param27'),
        'param28' => request('param28'),
        'param29' => request('param29'),
        'param30' => request('param30'),
        'param31' => request('param31'),
        'param32' => request('param32'),        
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   

    return redirect()->route('jobs.elliotplf2view')->with('success','Data was Created');
    

}
public function storedryerfd1600plf2 ()
{
    request()-> validate(            
        [  'id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',            
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',                        
            'overall_result' => 'required',
            'shift' => 'required',
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',
            'supervisor' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([   
        'id' => request('id'),                  
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),                  
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),   
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.dryerfd1600plf2view')->with('success','Data was Created');
    
}
public function storechillercvhe590 ()
{
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([   
        'id' => request('id'),                  
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),            
        'param24' => request('param24'),
        'param25' => request('param25'),            
        'param26' => request('param26'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.chillercvhe590view')->with('success','Data was created');        

}
public function storeahu_spinning2 ()
{
 request()-> validate(            
     ['id' => 'required',
         'tanggal' => 'required',
         'idmachine' => 'required',
         'idmachinedetails' => 'required',
         'idmachineno' => 'required',
         'param1' => 'required',
         'param2' => 'required',
         'param3' => 'required',       
         'param4' => 'required',       
         'param5' => 'required',       
         'param6' => 'required',                
         'param7' => 'required',                
         'param8' => 'required',                
         'param9' => 'required',                
         'param10' => 'required',                
         'param11' => 'required',                
         'param12' => 'required',
         'param13' => 'required',                
         'param14' => 'required',
         'param15' => 'required',                
         'param16' => 'required',                
         'param17' => 'required',                
         'param18' => 'required',                
         'param19' => 'required',                
         'overall_result' => 'required',
         'checked_by' => 'required',
         'group_leader' => 'required',
         'supervisor' => 'required',
         'shift' => 'required',
         'remarks' => 'required',                
     ]);

     $tgl1 =request('tanggal');                
     $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
     $current_date_time = date('Y-m-d H:i:s');
     $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

 job::create([
    'id' => request('id'),                     
     'tanggal' =>$tgl,
     'idmachine' => request('idmachine'),
     'idmachinedetails' => request('idmachinedetails'),
     'idmachineno' => request('idmachineno'),
     'updated_at' => $current_date_time,
     'created_at' =>$current_date_time,
     'param1' => request('param1'),
     'param2' => request('param2'),
     'param3' => request('param3'),
     'param4' => request('param4'),
     'param5' => request('param5'),
     'param6' => request('param6'),
     'param7' => request('param7'),
     'param8' => request('param8'),
     'param9' => request('param9'),
     'param10' => request('param10'),
     'param11' => request('param11'),
     'param12' => request('param12'),
     'param13' => request('param13'),
     'param14' => request('param14'),
     'param15' => request('param15'),
     'param16' => request('param16'),
     'param17' => request('param17'),
     'param18' => request('param18'),            
     'param19' => request('param19'),               
     'overall_result' => request('overall_result'),
     'checked_by' => request('checked_by'),
     'group_leader' => request('group_leader'),
     'supervisor' => request('supervisor'),
     'shift' => request('shift'),
     'remarks' => request('remarks'),
     'tgl_ops' => $tgl_ops,            
     ]);          
     return redirect()->route('jobs.ahu_spinning2view')->with('success','Data was Created');        
}
public function storetrafogenset ()
{
    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'noise' => 'required',
            'overall_result' => 'required',
            'panel_pe_condition' => 'required',            
            'silica_gel' => 'required',
            'checked_by' => 'required',
            'shift' => 'required',
            'remarks' => 'required',                
            'supervisor' => 'required',             
            'group_leader' => 'required',   
        ]);
   
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([  
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'noise' => request('noise'),
        'overall_result' => request('overall_result'),
        'panel_pe_condition' => request('panel_pe_condition'),        
        'silica_gel' => request('silica_gel'),        
        'checked_by' => request('checked_by'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'tgl_ops' => $tgl_ops,            
        ]);             
        return redirect()->route('jobs.trafogensetview')->with('success','Data was Created');        
}

public function storedieselengine1 ()
{

    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'param12' => 'required',
            'param13' => 'required',                
            'param14' => 'required',
            'param15' => 'required',                
            'param16' => 'required',                
            'param17' => 'required',                
            'param18' => 'required',                
            'param19' => 'required',                
            'param20' => 'required',                
            'param21' => 'required',
            'param22' => 'required',                
            'param23' => 'required',
            'param24' => 'required',                
            'param25' => 'required',                
            'param26' => 'required',                
            'param27' => 'required',                
            'param28' => 'required',                
            'param29' => 'required',                
            'param30' => 'required',                
            'param31' => 'required',                                
            'param32' => 'required',                
            'param33' => 'required',                
            'param34' => 'required',
            'param35' => 'required',                
            'param36' => 'required',
            'param37' => 'required',                
            'param38' => 'required',                
            'param39' => 'required',                
            'param40' => 'required',                
            'param41' => 'required',                
            'param42' => 'required',                
            'param43' => 'required',
            'param44' => 'required',                
            'param45' => 'required',
            'param46' => 'required',                
            'param47' => 'required',                
            'param48' => 'required',                
            'param49' => 'required',                
            'param50' => 'required',                
            'param51' => 'required',                
            'param52' => 'required',                
            'param53' => 'required',                                
            'param54' => 'required',                
            'param55' => 'required',                
            'param56' => 'required',                
            'param57' => 'required',                                
            'param58' => 'required', 
            'param59' => 'required', 
            'overall_result' => 'required',
            'shift' => 'required',
            'supervisor' => 'required',            
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([  
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'param25' => request('param25'),
        'param26' => request('param26'),
        'param27' => request('param27'),
        'param28' => request('param28'),
        'param29' => request('param29'),
        'param30' => request('param30'),
        'param31' => request('param31'),
        'param32' => request('param32'),
        'param33' => request('param33'),
        'param34' => request('param34'),
        'param35' => request('param35'),
        'param36' => request('param36'),
        'param37' => request('param37'),
        'param38' => request('param38'),
        'param39' => request('param39'),
        'param40' => request('param40'),
        'param41' => request('param41'),
        'param42' => request('param42'),
        'param43' => request('param43'),
        'param44' => request('param44'),
        'param45' => request('param45'),
        'param46' => request('param46'),
        'param47' => request('param47'),
        'param48' => request('param48'),            
        'param49' => request('param49'),
        'param50' => request('param50'),
        'param51' => request('param51'),
        'param52' => request('param52'),
        'param53' => request('param53'),
        'param54' => request('param54'),
        'param55' => request('param55'),
        'param56' => request('param56'),
        'param57' => request('param57'),
        'param58' => request('param58'),
        'param59' => request('param59'),        
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   


    return redirect()->route('jobs.dieselengine1view')->with('success','Data was created');        

}

public function storedieselengine2 ()
{

    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'param12' => 'required',
            'param13' => 'required',                
            'param14' => 'required',
            'param15' => 'required',                
            'param16' => 'required',                
            'param17' => 'required',                
            'param18' => 'required',                
            'param19' => 'required',                
            'param20' => 'required',                
            'param21' => 'required',
            'param22' => 'required',                
            'param23' => 'required',
            'param24' => 'required',                
            'param25' => 'required',                
            'param26' => 'required',                
            'param27' => 'required',                
            'param28' => 'required',                
            'param29' => 'required',                
            'param30' => 'required',                
            'param31' => 'required',                                
            'param32' => 'required',                
            'param33' => 'required',                
            'param34' => 'required',
            'param35' => 'required',                
            'param36' => 'required',
            'param37' => 'required',                
            'param38' => 'required',                
            'param39' => 'required',                
            'param40' => 'required',                
            'param41' => 'required',                
            'param42' => 'required',                
            'param43' => 'required',
            'param44' => 'required',                
            'param45' => 'required',
            'param46' => 'required',                
            'param47' => 'required',                            
            'overall_result' => 'required',
            'shift' => 'required',
            'supervisor' => 'required',            
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([  
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'param25' => request('param25'),
        'param26' => request('param26'),
        'param27' => request('param27'),
        'param28' => request('param28'),
        'param29' => request('param29'),
        'param30' => request('param30'),
        'param31' => request('param31'),
        'param32' => request('param32'),
        'param33' => request('param33'),
        'param34' => request('param34'),
        'param35' => request('param35'),
        'param36' => request('param36'),
        'param37' => request('param37'),
        'param38' => request('param38'),
        'param39' => request('param39'),
        'param40' => request('param40'),
        'param41' => request('param41'),
        'param42' => request('param42'),
        'param43' => request('param43'),
        'param44' => request('param44'),
        'param45' => request('param45'),
        'param46' => request('param46'),
        'param47' => request('param47'),        
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.dieselengine2view')->with('success','Data was Created');        

}
public function storegasengine1 ()
{

    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'param12' => 'required',
            'param13' => 'required',                
            'param14' => 'required',
            'param15' => 'required',                
            'param16' => 'required',                
            'param17' => 'required',                
            'param18' => 'required',                
            'param19' => 'required',                
            'param20' => 'required',                
            'param21' => 'required',
            'param22' => 'required',                
            'param23' => 'required',
            'param24' => 'required',                
            'param25' => 'required',                
            'param26' => 'required',                
            'param27' => 'required',                
            'param28' => 'required',                
            'param29' => 'required',                
            'param30' => 'required',                
            'param31' => 'required',                                
            'param32' => 'required',                
            'param33' => 'required',                
            'param34' => 'required',
            'param35' => 'required',                
            'param36' => 'required',
            'param37' => 'required',                
            'param38' => 'required',                
            'param39' => 'required',                
            'param40' => 'required',                
            'param41' => 'required',                
            'param42' => 'required',                
            'param43' => 'required',
            'param44' => 'required',                
            'param45' => 'required',
            'param46' => 'required',                
            'param47' => 'required',                            
            'param48' => 'required',                                        
            'overall_result' => 'required',
            'shift' => 'required',
            'supervisor' => 'required',            
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([  
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'param25' => request('param25'),
        'param26' => request('param26'),
        'param27' => request('param27'),
        'param28' => request('param28'),
        'param29' => request('param29'),
        'param30' => request('param30'),
        'param31' => request('param31'),
        'param32' => request('param32'),
        'param33' => request('param33'),
        'param34' => request('param34'),
        'param35' => request('param35'),
        'param36' => request('param36'),
        'param37' => request('param37'),
        'param38' => request('param38'),
        'param39' => request('param39'),
        'param40' => request('param40'),
        'param41' => request('param41'),
        'param42' => request('param42'),
        'param43' => request('param43'),
        'param44' => request('param44'),
        'param45' => request('param45'),
        'param46' => request('param46'),
        'param47' => request('param47'),        
        'param48' => request('param48'),                
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.gasengine1view')->with('success','Data was Created');        
}
public function storegasengine2 ()
{
    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'param12' => 'required',
            'param13' => 'required',                
            'param14' => 'required',
            'param15' => 'required',                
            'param16' => 'required',                
            'param17' => 'required',                            
            'overall_result' => 'required',
            'shift' => 'required',
            'remarks' => 'required',
            'checked_by' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([           
        'id' => request('id'),          
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.gasengine2view')->with('success','Data was Created');        

}
public function storechemical ()
{
    request()-> validate(                  
        [  'id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'checked_by' => 'required',  
            'group_leader' => 'required',  
            'supervisor' => 'required',            

        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([  
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'tgl_ops' => $tgl_ops,            
        ]);          
        return redirect()->route('jobs.chemicalview')->with('success','Data was Created');                
}

public function storepanelstarter ()
{

    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'overall_result' => 'required',
            'shift' => 'required',
            'supervisor' => 'required',            
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([        
        'id' => request('id'),             
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => 'required', 
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.panelstarterview')->with('success','Data was Created');        
}

public function storeauxiliary1 ()
{

    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'param12' => 'required',                
            'param13' => 'required',                
            'overall_result' => 'required',
            'shift' => 'required',
            'supervisor' => 'required',            
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([     
        'id' => request('id'),                
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.auxiliary1view')->with('success','Data was Created');        
}

public function storeauxiliary2 ()
{
    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'param12' => 'required',                
            'param13' => 'required',                
            'param14' => 'required',                
            'param15' => 'required',                
            'param16' => 'required',                
            'param17' => 'required',                
            'param18' => 'required',                
            'shift' => 'required',
            'supervisor' => 'required',            
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([ 
        'id' => request('id'),                    
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),        
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.auxiliary2view')->with('success','Data was Created');        
}

public function storeflowmeter ()
{

    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'shift' => 'required',
            'checked_by' => 'required',            
            'supervisor' => 'required',            
            'remarks' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([ 
        'id' => request('id'),                    
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'checked_by' => request('checked_by'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.flowmeterview')->with('success','Data was Created');        
}


public function storewwt ()
{
    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'param12' => 'required',
            'param13' => 'required',                
            'param14' => 'required',
            'param15' => 'required',                
            'param16' => 'required',                
            'param17' => 'required',                
            'param18' => 'required',                
            'param19' => 'required',
            'param20' => 'required',                
            'param21' => 'required',
            'param22' => 'required',                
            'param23' => 'required',                
            'param24' => 'required',                            
            'shift' => 'required',
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
            'supervisor' => 'required',            
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([        
        'id' => request('id'),             
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),
        'param24' => request('param24'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   


    return redirect()->route('jobs.wwtview')->with('success','Data was Created');        

}

public function storeparamwwt ()
{

    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                            
            'checked_by' => 'required',                            
            'group_leader' => 'required',  
            'supervisor' => 'required',            
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([  
        'id' => request('id'),                   
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),     
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'tgl_ops' => $tgl_ops,               
    ]);   


    return redirect()->route('jobs.paramwwtview')->with('success','Data was Created');        

}
public function storedailyreport ()
{

    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                            
            'catatan' => 'required',       
            'checked_by' => 'required',                            
            'group_leader' => 'required',  
            'supervisor' => 'required',            
       ]);
       $tgl1 =request('tanggal');                
       $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
       $current_date_time = date('Y-m-d H:i:s');
       $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

   job::create([           
       'id' => request('id'),                   
       'tanggal' =>$tgl,
       'idmachine' => request('idmachine'),
       'idmachinedetails' => request('idmachinedetails'),
       'idmachineno' => request('idmachineno'),
       'updated_at' => $current_date_time,
       'created_at' =>$current_date_time,
       'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),        
        'catatan' => request('catatan'),     
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'tgl_ops' => $tgl_ops,               
    ]);   
    return redirect()->route('jobs.dailyreportview')->with('success','Data was Created');        
}

public function storetrafowwt ()
{
    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'noise' => 'required',       
            'panel_pe_condition' => 'required',       
            'checked_by' => 'required',
            'group_leader' => 'required',  
            'supervisor' => 'required',            
            'shift' => 'required',
            'remarks' => 'required',                
        ]);
   
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([           
        'id' => request('id'),
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'noise' => request('noise'),
        'panel_pe_condition' => request('panel_pe_condition'),        
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
        ]);          
   
        return redirect()->route('jobs.trafowwtview')->with('success','Data was Created');
}

public function storedryerdty1 ()
{
    request()-> validate(            
        [  'id' => 'required',
             'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',            
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',                        
            'param6' => 'required',       
            'param7' => 'required',                        
            'overall_result' => 'required',
            'shift' => 'required',
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
            'supervisor' => 'required',            
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([           
        'id' => request('id'),                    
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),                  
        'param6' => request('param6'),
        'param7' => request('param7'),                  
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),   
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.dryerdty1view')->with('success','Data was Created');
}
public function storechillercvhe530 ()
{
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

      

    job::create([           
        'id' => request('id'),                    
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),            
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.chillercvhe530view')->with('success','Data was Created');   
    
}

public function storeac_station ()
{
    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'overall_result' => 'required',
            'shift' => 'required',
            'remarks' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
            'supervisor' => 'required',            
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([           
        'id' => request('id'),                    
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'remarks' => request('remarks'),
        'tgl_ops' => $tgl_ops,            
    ]);   
    return redirect()->route('jobs.ac_stationview')->with('success','Data was Created');   
}
public function storetrafodty1 ()
{
 request()-> validate(            
     [   'id' => 'required',
         'tanggal' => 'required',
         'idmachine' => 'required',
         'idmachinedetails' => 'required',
         'idmachineno' => 'required',
         'param1' => 'required',
         'param2' => 'required',
         'param3' => 'required',       
         'param4' => 'required',       
         'param5' => 'required',  
         'silica_gel' => 'required',
         'noise' => 'required',
         'panel_pe_condition' => 'required',
         'overall_result' => 'required',
         'shift' => 'required',
         'remarks' => 'required',
         'checked_by' => 'required',
         'group_leader' => 'required',  
         'supervisor' => 'required',            
  ]);
     $tgl1 =request('tanggal');                
     $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
     $current_date_time = date('Y-m-d H:i:s');
     $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

 job::create([           
     'id' => request('id'),                    
     'tanggal' =>$tgl,
     'idmachine' => request('idmachine'),
     'idmachinedetails' => request('idmachinedetails'),
     'idmachineno' => request('idmachineno'),
     'updated_at' => $current_date_time,
     'created_at' =>$current_date_time,
     'param1' => request('param1'),
     'param2' => request('param2'),
     'param3' => request('param3'),
     'param4' => request('param4'),
     'param5' => request('param5'),                  
     'silica_gel' => request('silica_gel'),
     'noise' => request('noise'),                              
     'panel_pe_condition' => request('panel_pe_condition'),                              
     'overall_result' => request('overall_result'),
     'shift' => request('shift'),
     'remarks' => request('remarks'),   
     'checked_by' => request('checked_by'),
     'group_leader' => request('group_leader'),
     'supervisor' => request('supervisor'),
     'tgl_ops' => $tgl_ops,            
 ]);   
 return redirect()->route('jobs.trafodty1view')->with('success','Data was Updated');


 
}
public function storewt ()

{
    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'param4' => 'required',       
            'param5' => 'required',       
            'param6' => 'required',                
            'param7' => 'required',                
            'param8' => 'required',                
            'param9' => 'required',                
            'param10' => 'required',                
            'param11' => 'required',                
            'param12' => 'required',
            'param13' => 'required',                
            'param14' => 'required',
            'param15' => 'required',                
            'param16' => 'required',                
            'param17' => 'required',                
            'param18' => 'required',                
            'param19' => 'required',                
            'param20' => 'required',                
            'param21' => 'required',
            'param22' => 'required',                
            'param23' => 'required',                
            'param24' => 'required',                
            'param25' => 'required',                            
            'chemical' => 'required',
            'scfilter' => 'required',            
            'bak_sedimentasi' => 'required',
            'catatan' => 'required',            
            'softener' => 'required',                        
            'shift' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
            'supervisor' => 'required',            
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([           
        'id' => request('id'),                     
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'param4' => request('param4'),
        'param5' => request('param5'),
        'param6' => request('param6'),
        'param7' => request('param7'),
        'param8' => request('param8'),
        'param9' => request('param9'),
        'param10' => request('param10'),
        'param11' => request('param11'),
        'param12' => request('param12'),
        'param13' => request('param13'),
        'param14' => request('param14'),
        'param15' => request('param15'),
        'param16' => request('param16'),
        'param17' => request('param17'),
        'param18' => request('param18'),            
        'param19' => request('param19'),
        'param20' => request('param20'),
        'param21' => request('param21'),
        'param22' => request('param22'),
        'param23' => request('param23'),            
        'param24' => request('param24'),
        'param25' => request('param25'),                
        'chemical' => request('chemical'),                
        'scfilter' => request('scfilter'),                
        'softener' => request('softener'),                        
        'bak_sedimentasi' => request('bak_sedimentasi'),                        
        'catatan' => request('catatan'),                        
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'tgl_ops' => $tgl_ops,            
    ]);   

    return redirect()->route('jobs.wtview')->with('success','Data was Created');
}
public function storegarduinduk ()

{
    request()-> validate(            
        ['id' => 'required',
            'tanggal' => 'required',
            'idmachine' => 'required',
            'idmachinedetails' => 'required',
            'idmachineno' => 'required',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',       
            'checked_by' => 'required',            
            'group_leader' => 'required',  
            'supervisor' => 'required',            
            'shift' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');
        $tgl_ops = carbon::parse($tgl1)->format('Y-m-d');

    job::create([           
        'id' => request('id'),                    
        'tanggal' =>$tgl,
        'idmachine' => request('idmachine'),
        'idmachinedetails' => request('idmachinedetails'),
        'idmachineno' => request('idmachineno'),
        'updated_at' => $current_date_time,
        'created_at' =>$current_date_time,
        'param1' => request('param1'),
        'param2' => request('param2'),
        'param3' => request('param3'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => request('supervisor'),
        'shift' => request('shift'),
        'tgl_ops' => $tgl_ops,            
    ]);   

    return redirect()->route('jobs.garduindukview')->with('success','Data was Updated');        
   }

}

