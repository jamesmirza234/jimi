


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('plugins/jquery-ui/jquery-ui.min.js')?>"></script>
 <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->


<script src="<?php echo base_url('plugins/moment/moment.min.js')?>"></script>
<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js')?>"></script>

<script src="<?php echo base_url('dist/js/adminlte.js')?>"></script>
<script type="text/javascript">
	 $(document).ready( function () {
      $('#table_id').DataTable();
       $('#lookup').DataTable();
      
    $('#contoh').DataTable({ "scrollY": "320px", "scrollCollapse": true, "search" :false,"paging": false });
      

  } );

</script>
<script type="text/javascript">
   /*$(function () {
                $("#lookup").dataTable();
            });*/
             function tes()
             {
             	$('#myModal').modal('show');
             }

	$(document).on('click', '.pilih', function (e) {
		 var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").text();
         var col2=currentRow.find("td:eq(1)").text();
         var col3=currentRow.find("td:eq(2)").text();
          var col4=currentRow.find("td:eq(3)").text();

                document.getElementById("kodeBarang").value = col1;
                document.getElementById("namaBarang").value = col2;
                document.getElementById("satuan").value = col3;
                  document.getElementById("kategori").value = col4;
                $('#myModal').modal('hide');
            });


        $(document).ready(function(){
     


            $('#karyawan').autocomplete({
                source: "<?php echo site_url('Peminjaman/get_autocomplete');?>",
      
                select: function (event, ui) {
                    $('[name="karyawan"]').val(ui.item.namaKaryawan); 
                    
                }
            });
 
        });
          $( function() {
           
      $('#tglKembali').datepicker({ dateFormat: 'dd-mm-yy' }).val();
      $('#tglPinjam').datepicker({ dateFormat: 'dd-mm-yy' }).val();
  } );
  $(function(){
  	
var i=1;  
  	  $("#bAddItems").click(function(e){
  	  	var kodeBarang = $('#kodeBarang').val();

		var namaBarang = $('#namaBarang').val();
		var Satuan = $('#satuan').val();
		var Kategori = $('#kategori').val();
		var Qty = $('#qty').val();
  if (Qty === "")
  {
  	 alert('Qty harus di isi');
  }else 
  {
		 
    var column = '<button class="btn btn-sm btn-danger btn_remove" name="remove" type="button" id="'+ i +'" >X</button>';
		
       /*   $('#sementara').hide(); */
         $('#contoh tbody:last-child').append(
            
                '<tr id="row'+i+'"">'+
                  /*'<td>'+no+'</td>'+*/
                   '<td>'+kodeBarang+'</td>'+
                  '<td>'+namaBarang+'</td>'+
                  '<td>'+Satuan+'</td>'+
                  '<td>'+Kategori+'</td>'+
                   '<td>'+Qty+'</td>'+

                   '<td>'+column+'</td>'+
                   '</tr>'
                
         	);

           $('#namaBarang').val('');
		   $('#satuan').val('');
		   $('#kategori').val('');
		   $('#qty').val('');

          i++;  

      }
	});

      $("#bAddItemsKembali").click(function(e){
        var kodeBarang = $('#kodeBarang').val();

    var namaBarang = $('#namaBarang').val();
    var Satuan = $('#satuan').val();
    var Kategori = $('#kategori').val();
    var Qty = $('#qty').val();
  if (Qty === "")
  {
     alert('Qty harus di isi');
  }else 
  {
     
    var column = '<button class="btn btn-sm btn-danger btn_remove" name="remove" type="button" id="'+ i +'" >X</button>';
    
       /*   $('#sementara').hide(); */
         $('#contoh tbody:last-child').append(
            
                '<tr id="row'+i+'"">'+
                  /*'<td>'+no+'</td>'+*/
                   '<td>'+kodeBarang+'</td>'+
                  '<td>'+namaBarang+'</td>'+
                  '<td>'+Satuan+'</td>'+
                  '<td>'+Kategori+'</td>'+
                   '<td>'+Qty+'</td>'+

                   '<td>'+column+'</td>'+
                   '</tr>'
                
          );

           $('#namaBarang').val('');
       $('#satuan').val('');
       $('#kategori').val('');
       $('#qty').val('');

          i++;  

      }
  });
       $("#BsaveKembali").click(function(e){

          var kdKembali  = $('#kdKembali').val();
          var tglKembali  = $('#tglKembali').val();
          var karyawan  = $('#karyawan').val();
        


        var table_data = [];
        var data_header = {
                'kdKembali' :kdKembali,
                'tglKembali' : tglKembali,
                'karyawan' : karyawan,
              
        };
         $('#contoh tr').each(function(row,tr){
          if ($(tr).find('td:eq(0)').text() =="")
          {

          }else 
          {
             var sub  = {
                'kdKembali' :kdKembali,
                'kodeBarang' : $(tr).find('td:eq(0)').text(),
                'namaBarang' : $(tr).find('td:eq(1)').text(),
                'satuan' : $(tr).find('td:eq(2)').text(),
                'kategori' : $(tr).find('td:eq(3)').text(),
                'jml' : $(tr).find('td:eq(4)').text(),
              };

              table_data.push(sub);
          }
             
         });
          swal({
        title: "Are you sure Save ?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
          },
           function(isConfirm) {
        if (isConfirm) {
          var data  = {'data_table' : table_data, 'data_header' : data_header};

       
          $.ajax({

             data : data, 
             type: 'POST',
             url: '<?php echo base_url("Pengembalian/Save")?>',
             crossOrigin : false,
             dataType : 'json',

             error: function() {
                alert('Something is wrong');
             },
             success: function(result) {
                
                   swal.close();
                    window.location.href = "<?php echo site_url('Pengembalian'); ?>";
                   
                   
             }
          });
        } else {
          swal("Cancelled", "Your Data Not save)", "error");
        }
      });
    
  });

       $("#BsavePinjam").click(function(e){

          var kdPinjam  = $('#kdPinjam').val();
          var tglPinjam  = $('#tglPinjam').val();
          var karyawan  = $('#karyawan').val();
        


	      var table_data = [];
	      var data_header = {
                'kdPinjam' :kdPinjam,
              	'tglPinjam' : tglPinjam,
                'karyawan' : karyawan,
              
	      };
	       $('#contoh tr').each(function(row,tr){
	       	if ($(tr).find('td:eq(0)').text() =="")
	       	{

	       	}else 
	       	{
	       		 var sub  = {
              	'kdPinjam' :kdPinjam,
              	'kodeBarang' : $(tr).find('td:eq(0)').text(),
                'namaBarang' : $(tr).find('td:eq(1)').text(),
                'satuan' : $(tr).find('td:eq(2)').text(),
                'kategori' : $(tr).find('td:eq(3)').text(),
                'jml' : $(tr).find('td:eq(4)').text(),
              };

              table_data.push(sub);
	       	}
             
	       });
	        swal({
        title: "Are you sure Save ?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
          },
           function(isConfirm) {
        if (isConfirm) {
        	var data  = {'data_table' : table_data, 'data_header' : data_header};

       
          $.ajax({

             data : data, 
             type: 'POST',
             url: '<?php echo base_url("Peminjaman/Save")?>',
             crossOrigin : false,
             dataType : 'json',

             error: function() {
                alert('Something is wrong');
             },
             success: function(result) {
                
                   swal.close();
                    window.location.href = "<?php echo site_url('Peminjaman'); ?>";
                   
                   
             }
          });
        } else {
          swal("Cancelled", "Your Data Not save)", "error");
        }
      });
	  
	});
  	

  });

         $(document).on('click', '.btn_remove', function(){  

           var button_id = $(this).attr("id");           

           $('#row'+button_id+'').remove();  

      });  
    </script>
</body>
</html>
