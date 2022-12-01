<?php

namespace App\Http\Controllers\Job;

use File;
use Carbon\Carbon;
use App\Models\job;
use App\Models\gen_no;
use App\Models\employee;
use Illuminate\Http\Request;
use App\Models\machinedetailno;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class JobController extends Controller
{

    public function edit($id)
    {
       $task = DB::table('gen_no')->where ('id',$id)->first();
    }

    public function zr5view ()
    {       
        return view ('jobs.zr5view',['jobs' => job::latest()->paginate(20),]);        
    }    

        
    public function zr5edit (job $job)
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
        $grupleaders = employee::select ('*')->get();
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',1) ->get();         
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        //dd ($grupleaders);
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.create',compact ('machinedetailnos','employeeids','grupleaders'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
    );       

          
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.zr400poly',compact ('machinedetailnos','employeeids'),
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.kaeser',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
    );          
    }
    public function elliot ()
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',4) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.elliot',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]

    );

    }
    public function cvgd_390 ()
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',2)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.cvgd_390',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
    );
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',2)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.cvhe_330_590',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );
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
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ac_unit_poly',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
    );
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',4)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dryer_poly',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );        
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafo',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]

        );                
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
        $grupleaders = employee::select ('*')->get();

        $kode = DB::table('jobs')->max('id');
    	  $kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ahu_spinning1',compact ('machinedetailnos','employeeids','grupleaders'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.n2_plant',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.demin_water',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',1)->where ('idmachinedetails', '=',5) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ahu',compact ('machinedetailnos','employeeids'),
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.compressordty1',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.zr425',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',10)->where ('idmachinedetails', '=',2) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.elliotplf2',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',11)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dryerfd1600plf2',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',12)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.chillercvhe590',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ahu_spinning2',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafo',compact ('machinedetailnos','employeeids'),
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
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafogenset',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dieselengine1',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dieselengine2',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.gasengine1',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.gasengine2',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.gasengine2',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.panelstarter',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.auxiliary1',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.auxiliary2',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.flowmeter',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.wwt',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.paramwwt',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dailyreport',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafowwt',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.dryerdty1',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
   
        $machinedetailnos = machinedetailno::select ('*') ->where ('idmachine', '=',26)->where ('idmachinedetails', '=',1) ->get(); 
        $kode = DB::table('jobs')->max('id');
    	$kode = (int) $kode + 1;
        $uk =  Auth::user()->unique_karyawan;
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.chillercvhe530',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.ac_station',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]

        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.trafodty1',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]
        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.wt',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]

        );                
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
        
        $employeeids = employee::select ('*')->where ('employee#', '=',$uk)->get();
        return view ('jobs.garduinduk',compact ('machinedetailnos','employeeids'),
        ['kode' => $kode,'uk' => $uk,'shift' => $shift]

        );                
    }

    public function exportpdf(){
      return view ('jobs.exportpdf');
    }

    public function cetakpdf(){
      $datajobs = job::all()->sortbydesc ('tanggal')->values();
      view()->share('data',$datajobs);
      $pdf = PDF::loadview('jobs.datajobs');
      return $pdf->download('data.pdf');
    }
      //dd("tanggal awal ".$tgl_awal,"Tanggal Akhir :".$tgl_akhir);

    public function store ()
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
                'shift' => 'required',
                'remark' => 'required',                
            ]);

            $tgl1 =request('tanggal');                
            //$tgl =carbon::parse($tgl1)->format('y, m d H:i:s');
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');
   
            

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
            'checked_by' => request('checked_by'),
            'group_leader' => request('group_leader'),
            'shift' => request('shift'),
            'remarks' => request('remark'),
            ]);
            return back()->with ('success','Transaction Created');                    
    }

    public function storezr400poly ()

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
                'shift' => 'required',
                'remark' => 'required',
                'checked_by' => 'required',
            ]);
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');

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
            'shift' => request('shift'),
            'remarks' => request('remark'),
        ]);   
        return back()->with ('success','Transaction Created');     

    }

    public function storekaeser ()

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
                'overall_result' => 'required',
                'shift' => 'required',
                'remark' => 'required',
                'checked_by' => 'required',
            ]);
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');

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
            'shift' => request('shift'),
            'remarks' => request('remark'),
        ]);   

        return back()->with ('success','Transaction Created');     

    }

    public function storeelliot ()
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
                'overall_result' => 'required',
                'shift' => 'required',
                'remark' => 'required',
                'checked_by' => 'required',
                'group_leader' => 'required',  
            ]);
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');

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
            'shift' => request('shift'),
            'remarks' => request('remark'),
        ]);   

        return back()->with ('success','Transaction Created');     

    }

    public function storecvgd_390 ()

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
                'overall_result' => 'required',
                'shift' => 'required',
                'remark' => 'required',
                'checked_by' => 'required',
            ]);
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');

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
            'shift' => request('shift'),
            'remarks' => request('remark'),
        ]);
        return back()->with ('success','Transaction Created');     
           }

    public function storecvhe_330_590 ()

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
                'overall_result' => 'required',
                'shift' => 'required',
                'remark' => 'required',
                'checked_by' => 'required',
            ]);
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');

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
            'shift' => request('shift'),
            'remarks' => request('remark'),
        ]);   

        return back()->with ('success','Transaction Created');     

    }

    public function storeac_unit_poly ()

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
                'overall_result' => 'required',
                'shift' => 'required',
                'remark' => 'required',
                'checked_by' => 'required',
            ]);
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');

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
            'shift' => request('shift'),
            'remarks' => request('remark'),
        ]);   

        return back()->with ('success','Transaction Created');     
       }

       public function storedryer_poly ()
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
                   'remark' => 'required',
                   'checked_by' => 'required',
               ]);
               $tgl1 =request('tanggal');                
               $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
               $current_date_time = date('Y-m-d H:i:s');
   
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
               'shift' => request('shift'),
               'remarks' => request('remark'),   
           ]);   
   
           return back()->with ('success','Transaction Created');     
       }

       public function storetrafo ()
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
                'remark' => 'required',
                'checked_by' => 'required',
            ]);
            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');

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
            'remarks' => request('remark'),   
            'checked_by' => request('checked_by'),
        ]);   


           return back()->with ('success','Transaction Created');     
       }
       
       public function storeahu_spinning1 ()

       {
        request()-> validate(            
            ['id' => 'required',
                'tanggal' => 'required',
                'idmachine' => 'required',
                'idmachinedetails' => 'required',
                'idmachineno' => 'required',
                'mesin' => 'required',
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
                'shift' => 'required',
                'remark' => 'required',                
            ]);

            $tgl1 =request('tanggal');                
            $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
            $current_date_time = date('Y-m-d H:i:s');

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
            'shift' => request('shift'),
            'remarks' => request('remark'),
            ]);          
     
            return back()->with ('success','Transaction Created');     


       }

       public function storen2_plant ()
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
                   'bersalju' => 'required',                   
                   'overall_result' => 'required',
                   'shift' => 'required',
                   'remark' => 'required',
                   'checked_by' => 'required',                   
               ]);
               $tgl1 =request('tanggal');                
               $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
               $current_date_time = date('Y-m-d H:i:s');
   
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
               'shift' => request('shift'),
               'remarks' => request('remark'),
           ]);   
   
   


           return back()->with ('success','Transaction Created');     
          }

          public function storedemin_water ()  
          {
            
              request()-> validate(            
                  [ 'id' => 'required', 
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
                      'cation_anion_mix_bed' => 'required',
                      'softener' => 'required',                      
                      'chemical' => 'required',                      
                      'catatan' => 'required',                      
                      'softener' => 'required',                                                                                                              
                      'checked_by' => 'required',
                      'shift' => 'required',
                      
                  ]);
                  $tgl1 =request('tanggal');                
                  $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
                  $current_date_time = date('Y-m-d H:i:s');
      
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
                  'cation_anion_mix_bed' => request('cation_anion_mix_bed'),
                  'softener' => request('softener'),
                  'chemical' => request('chemical'),
                  'catatan' => request('catatan'),
                  'checked_by' => request('checked_by'),
                  'shift' => request('shift'),
                ]); 
        

return back()->with ('success','Transaction Created');         
}            

public function storecompressordty1 ()
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
            'overall_result' => 'required',
            'shift' => 'required',
            'remark' => 'required',
            'checked_by' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   



    return back()->with ('success','Transaction Created');     
}
public function storezr425 ()

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
            'shift' => 'required',
            'remark' => 'required',
            'checked_by' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   
    return back()->with ('success','Transaction Created');     

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
            'overall_result' => 'required',
            'shift' => 'required',
            'remark' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   


    return back()->with ('success','Transaction Created');     

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
            'remark' => 'required',
            'checked_by' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'shift' => request('shift'),
        'remarks' => request('remark'),   
    ]);   

    return back()->with ('success','Transaction Created');     
}
public function storechillercvhe590 ()

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
            'overall_result' => 'required',
            'shift' => 'required',
            'remark' => 'required',
            'checked_by' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   

    return back()->with ('success','Transaction Created');     

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
         'shift' => 'required',
         'remark' => 'required',                
     ]);

     $tgl1 =request('tanggal');                
     $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
     $current_date_time = date('Y-m-d H:i:s');

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
     'shift' => request('shift'),
     'remarks' => request('remark'),
     ]);          
     return back()->with ('success','Transaction Created');     
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
            'overall_result' => 'required',
            'panel_pe_condition' => 'required',            
            'silica_gel' => 'required',
            'checked_by' => 'required',
            'shift' => 'required',
            'remark' => 'required',                
            'supervisor' => 'required',                
        ]);
   
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'panel_pe_condition' => request('panel_pe_condition'),        
        'silica_gel' => request('silica_gel'),        
        'checked_by' => request('checked_by'),
        'shift' => request('shift'),
        'remarks' => request('remark'),
        'supervisor' => request('supervisor'),
        ]);          
   
     return back()->with ('success','Transaction Created');     
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
            'overall_result' => 'required',
            'shift' => 'required',
            'supervisor' => 'required',            
            'remark' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => 'required', 
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   


    return back()->with ('success','Transaction Created');     

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
            'remark' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'supervisor' => 'required', 
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   


    return back()->with ('success','Transaction Created');     

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
            'overall_result' => 'required',
            'shift' => 'required',
            'supervisor' => 'required',            
            'remark' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'supervisor' => 'required', 
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   



    return back()->with ('success','Transaction Created');     

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
            'overall_result' => 'required',
            'shift' => 'required',
            'supervisor' => 'required',            
            'remark' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'overall_result' => request('overall_result'),
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => 'required', 
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   


    return back()->with ('success','Transaction Created');     

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
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        ]);          


        return back()->with ('success','Transaction Created');                    
        
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
            'remark' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'remarks' => request('remark'),
    ]);   



    return back()->with ('success','Transaction Created');     

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
            'remark' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'supervisor' => 'required', 
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   


    return back()->with ('success','Transaction Created');     

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
            'shift' => 'required',
            'supervisor' => 'required',            
            'remark' => 'required',
            'checked_by' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'checked_by' => request('checked_by'),
        'group_leader' => request('group_leader'),
        'supervisor' => 'required', 
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   


    return back()->with ('success','Transaction Created');     

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
            'supervisor' => 'required',            
            'remark' => 'required',
            'group_leader' => 'required',  
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'supervisor' => 'required', 
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   

    return back()->with ('success','Transaction Created');     

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
            'remark' => 'required',
            'checked_by' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   


    return back()->with ('success','Transaction Created');     

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
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

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
    ]);   


    return back()->with ('success','Transaction Created');     

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
       ]);
       $tgl1 =request('tanggal');                
       $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
       $current_date_time = date('Y-m-d H:i:s');

   job::create([           
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
    ]);   

    return back()->with ('success','Transaction Created');     

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
            'shift' => 'required',
            'remark' => 'required',                
        ]);
   
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

    job::create([           
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
        'shift' => request('shift'),
        'remarks' => request('remark'),
        ]);          
   
     return back()->with ('success','Transaction Created');     
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
            'remark' => 'required',
            'checked_by' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

    job::create([           
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
        'shift' => request('shift'),
        'remarks' => request('remark'),   
    ]);   

    return back()->with ('success','Transaction Created');     
}
public function storechillercvhe530 ()

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
             'overall_result' => 'required',
            'shift' => 'required',
            'remark' => 'required',
            'checked_by' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

    job::create([           
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
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   

    return back()->with ('success','Transaction Created');     
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
            'remark' => 'required',
            'checked_by' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

    job::create([           
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
        'shift' => request('shift'),
        'remarks' => request('remark'),
    ]);   
return back()->with ('success','Transaction Created');     
}
public function storetrafodty1 ()
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
         'silica_gel' => 'required',
         'noise' => 'required',
         'panel_pe_condition' => 'required',
         'overall_result' => 'required',
         'shift' => 'required',
         'remark' => 'required',
         'checked_by' => 'required',
     ]);
     $tgl1 =request('tanggal');                
     $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
     $current_date_time = date('Y-m-d H:i:s');

 job::create([           
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
     'remarks' => request('remark'),   
     'checked_by' => request('checked_by'),
 ]);   



    return back()->with ('success','Transaction Created');     
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
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

    job::create([           
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
        'shift' => request('shift'),
    ]);   

    return back()->with ('success','Transaction Created');     
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
            'shift' => 'required',
        ]);
        $tgl1 =request('tanggal');                
        $tgl =carbon::parse($tgl1)->format('Y-m-d H:i:s');
        $current_date_time = date('Y-m-d H:i:s');

    job::create([           
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
        'shift' => request('shift'),
    ]);   

    return back()->with ('success','Transaction Created');     
   }

}

