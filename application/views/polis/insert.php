  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0">Barang</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Barang List</li>

            </ol>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <hr>
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
         <div class="card">
        <div class="box box-default">
         <div class="panel-body">        
                                  
            <form class="form-inline" method="post" action="<?php echo base_url(); ?>Dashboard/save"  enctype="multipart/form-data">
               <div class="row col-sm-12 mt-4 ml-4">
                <div class="form-group form-group-lg mx-sm-2 mb-2">
                  <label class="mx-1">No. Polis</label>
                  <input type="text" class="form-control"  style="width:550px" value=""name="polis">
                </div>


              </div>
              
               
                

              </div>
              <div class="row col-sm-12 mt-3 mb-3 ml-4">
                <div class="form-group mr-3" style="float: center; text-align: left;" >
                                <button type="submit" class="btn btn-success mx-2" ><i class="fa-check"></i> Simpan</button>
                                <a href="<?=base_url('Dashboard');?>" class="btn btn-warning"><i class="fa-undo"> Kembali</i></a>
                </div>
              </div>
          </form>     
           </div>
        </div>
      </section>