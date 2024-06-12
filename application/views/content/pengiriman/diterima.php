<div class="row border-bottom pb-2">
   <div class="col-lg-6 col-12">
      <div class="row mb-1">
         <label for="tb_driver" class="col-sm-3 col-form-label">Driver</label>
         <div class="col-sm-9">
            <select class="custom-select custom-select-sm form-control form-control-sm" id="tb_driver" name="tb_driver">
               <option value="" selected>Semua Driver</option>
               <?php
               $this->db->where("MsEmpPositionId", "11")->where("MsEmpIsActive", "1");
               $query = $this->db->get('TblMsEmployee')->result();
               foreach ($query as $key) {
                  echo '<option value="' . $key->MsEmpId . '">' . $key->MsEmpCode . ' - ' . $key->MsEmpName . '</option>';
               }
               ?>
            </select>
         </div>
      </div>
      <div class="row mb-1">
         <label for="tb_jenis" class="col-sm-3 col-form-label">Pengiriman</label>
         <div class="col-sm-9">
            <select class="custom-select custom-select-sm form-control form-control-sm" id="tb_jenis" name="tb_jenis">
               <option value="" selected>Semua Pengiriman</option>
               <option value="1">PICK-UP</option>
               <option value="2">ENGKEL</option>
            </select>
         </div>
      </div>
      <div class="row mb-1 align-items-center">
         <label for="tb_row" class="col-sm-3 col-form-label">Tampilkan</label>
         <div class="col-3">
            <select class="custom-select custom-select-sm form-control form-control-sm" id="tb_row" name="tb_row">
               <option value="10" selected>10</option>
               <option value="25">25</option>
               <option value="50">50</option>
               <option value="100">100</option>
            </select>
         </div>
         <label class="col-3 col-form-label ps-0">baris</label>
      </div>
      <div class="row mb-1">
         <label for="tb_search" class="col-sm-3 col-form-label">Pencarian</label>
         <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="tb_search" placeholder="Cari nama customer/kode pengiriman">
         </div>
      </div>
   </div>
</div>
<div id="wait" class="load-container load4" style="display: block;">
   <div class="load-progress"></div>
</div>

<table id="tb_data" class="table align-middle responsive" style='font-family:"Sans-serif", Helvetica; font-size:80%;width:100%'>
   <thead class="thead-dark" style="display:none">
      <tr>
         <th>nama</th>
         <th>QuoId</th>
      </tr>
   </thead>
</table>
<div id="dialog-box">
</div>
<script>
   var ajax_req_message;
   var table = $('#tb_data').DataTable({
      "responsive": true,
      "searching": false,
      "lengthChange": false,
      "pageLength": parseInt($('#tb_row').val()),
      "processing": false,
      "serverSide": true,
      "ajax": {
         "url": "<?php echo site_url('function/Client_datatable_pengiriman/get_data_pengiriman') ?>",
         "type": "POST",
         "beforeSend": function(jqXHR, settings) {
            if (table && table.hasOwnProperty('settings')) {
               table.settings()[0].jqXHR.abort();
            }
            xhrPool.push(jqXHR);
            $("#tb_data").hide();
            $("#wait").show();
         },
         "data": function(data) {
            data.search['value'] = $('#tb_search').val();
            data.search['statuslike'] = $('#tb_driver').val();
            data.search['colstatuslike'] = "TblDelivery.DeliveryDriver";
            data.search['status'] = $('#tb_jenis').val();
            data.search['colstatus'] = "TblDelivery.DeliveryJenis";
            data.search['status1'] = "1";
            data.search['colstatus1'] = "TblDelivery.DeliveryStatus";
            data.search['status2'] = "1";
            data.search['colstatus2'] = "TblDelivery.MsDeliveryId";
         },
         "complete": function(data) {
            $("#wait").hide();
            $("#tb_data").show(500);
            document.getElementById("tb_data").scrollIntoView({
               behavior: 'smooth'
            });
         }
      },
      "order": [],
      "columnDefs": [{
         "targets": [1],
         "visible": false,
      }, ],
      "createdRow": function(row, data, dataIndex) {
         $(row).addClass("tb-sales");
      },
      "language": {
         "emptyTable": '<img src="<?= base_url("asset/image/mgs-erp/iconnotfound.png") ?>" class="rounded mx-auto d-block" width="300px">',
         "zeroRecords": '<img src="<?= base_url("asset/image/mgs-erp/iconnotfound.png") ?>" class="rounded mx-auto d-block" width="300px">'
      },
   });
   table.ajax.reload(null, false).responsive.recalc().columns.adjust();

   $('#tb_search').keyup(function(e) {
      if (e.keyCode === 13) {
         table.ajax.reload(null, false).responsive.recalc().columns.adjust();
      }
   });
   $('#tb_row').change(function() {
      table.page.len(parseInt($('#tb_row').data("value"))).draw();
   });
   $('#tb_jenis,#tb_driver').change(function() {
      table.ajax.reload(null, false).responsive.recalc().columns.adjust();
   });
   var modal_action;
   load_data_table = function() {
      modal_action.hide();
      table.ajax.reload(null, false).responsive.recalc().columns.adjust();
   }
   delivery_proses = function(id) {
      if (ajax_req_message && ajax_req_message.readyState != 4) {
         ajax_req_message.abort();
      }
      ajax_req_message = $.ajax({
         url: "<?php echo site_url('message/message_pengiriman/proses_pengiriman/') ?>" + id,
         beforeSend: function() {
            req_status = 1;
         },
         success: function(response) {
            $("#dialog-box").html(response);
            modal_action = new bootstrap.Modal(document.getElementById('modal-action'));
            modal_action.show();
            req_status = 0;
         },
         error: function(xhr, status, error) {
            console.log(xhr.responseText);
            req_status = 0;
         }
      });
   }
</script>