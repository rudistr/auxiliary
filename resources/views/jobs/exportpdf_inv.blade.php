<div class="modal fade" id="modalcetak" tabindex="-1" role="dialog" aria-labelledby="mylargemodallabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">  
  <div class="modal-content">  
   <div class="modal-header">  
     <h5 class="modal-title" id="exampleModalLongTitle">Cetak Data</h5>
     <button type ="button" class="close" data-dismiss="modal" aria-label="close">
       <span aria-hidden="true">&times;</span> 
     </button>
   </div> 
    <form method="GET" target="_blank" enctype="multipart/form-data" action="{{ route('jobs.datajobs') }}" method="post">
        @csrf
       <div class="modal-body">
         <div class="form-group">
          <label>Tgl Awal</label>
         <input type="date"  class="form-control" name="tgl_awal" required> 
         </div>
         <div clas="form-group">
         <label>Tgl Akhir</label>
         <input type="date"  class="form-control" name="tgl_akhir" required> 
         </div>
       </div> 
      <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalcetak">
      </button> 
      <div class = "modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-print"</i>Cetak</button>
      </div>
    </form>
  </div>
 </div>
</div>



 

