  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0">Polis</h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">Polis List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="card">
         <?php echo $this->session->flashdata('notif') ?>
         <div class="panel-body">
          
                  
                  
                   <a href="<?php echo site_url("Dashboard/insert")?>" class="btn btn-success btn-sm mt-3 ml-4">Add + </a>
                   <hr>
               
        <div class="row  ml-4">
          <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" >
              <thead>
                <tr> 
                                <th style="width:25px;">No</th>
                                <th>Nomor Polis</th>
                                <th>Nama debitur</th>
                                <th>Pekerjaan</th>
                                <th>Jenis kelamin</th>
                                <th>alamat</th>
                                <th>nilaipertanggungan</th>
                                <th>premi</th>
                                
                             
                              </th>
                </tr>
              </thead>
                        <tbody>
                            <?php 
                        $no = 1;
                        foreach($list as $row){
                    ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                              <td><?php echo $row->nomorpolis;?></td>
                              <td><?php echo $row->namadebitur;?></td>
                              <td><?php echo $row->pekerjaan;?></td>
                              <td><?php echo $row->jeniskelamin;?></td>
                              <td><?php echo $row->alamat;?></td>
                             
                                <td><?php echo $row->nilaipertanggungan;?></td>
                                 <td><?php echo $row->premi;?></td>
                          
                              <?php }?>
                        </tbody>
            </table>
            </div>


        </div>
      </section>