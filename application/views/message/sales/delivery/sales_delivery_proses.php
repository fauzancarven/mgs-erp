<style>
   .dz-progress{
      display:none;
   }
</style>
<div class="modal fade " id="modal-action" data-bs-keyboard="false" data-bs-backdrop="static">
   <div class="modal-dialog modal-xl">
      <div class="modal-content" name="form-action">
         <div class="modal-header bg-dark">
            <h6 class="modal-title text-white"><i class="fas fa-share-square" aria-hidden="true" style="color: #6754ff;"></i> &nbsp;Proses Pengiriman - <?= ($_sales->MsCustomerTypeId == 1 ? $_sales->MsCustomerName : $_sales->MsCustomerName . ' (' . $_sales->MsCustomerCompany . ')') ?></h6>
            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row justify-content-center">
               <div class="col-lg-6 col-11 my-1">
                  <div class="row mb-1 align-items-center">
                     <div class="label-border-right">
                        <span class="label-dialog">Reference</span>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center">
                     <label for="DeliveryRef" class="col-sm-3 col-form-label">No. Sales<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-9">
                        <input id="DeliveryRef" name="DeliveryRef" type="text" class="form-control form-control-sm" value="<?= $_sales->SalesCode ?>" readonly>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center">
                     <div class="label-border-right">
                        <span class="label-dialog">Dokument</span>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center">
                     <label for="DeliveryCode" class="col-sm-3 col-form-label">No. Doc<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-9">
                        <input id="DeliveryCode" name="DeliveryCode" type="text" class="form-control form-control-sm" value="<?= $_delivery->DeliveryCode ?>" readonly>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center">
                     <label for="DeliveryDate" class="col-sm-3 col-form-label">Tgl. Jadwal<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-3">
                        <input id="DeliveryDate" name="DeliveryDate" type="text" class="form-control form-control-sm" value="">
                     </div>
                     <label for="DeliveryRit" class="col-sm-3 col-form-label">Pengiriman ke<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-3">
                        <input id="DeliveryRit" name="DeliveryRit" type="number" class="form-control form-control-sm" value="<?= $_delivery->DeliveryRit ?>">
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center">
                     <label for="DeliveryDateKirim" class="col-sm-3 col-form-label">Tgl. Kirim<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-3">
                        <input id="DeliveryDateKirim" name="DeliveryDateKirim" type="text" class="form-control form-control-sm" value="">
                     </div>
                     <label for="DeliveryDateFinish" class="col-sm-3 col-form-label">Tgl. Selesai<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-3">
                        <input id="DeliveryDateFinish" name="DeliveryDateFinish" type="text" class="form-control form-control-sm" value="" disabled>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center">
                  </div>
                  <div class="row mb-1 align-items-center">
                     <label for="MsWokrplaceCode" class="col-sm-3 col-form-label">Toko<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-3">
                        <input id="MsWokrplaceCode" name="MsWokrplaceCode" type="text" class="form-control form-control-sm" value="<?= $_sales->MsWorkplaceCode ?>" readonly>
                     </div>
                     <label for="DeliveryAdmin" class="col-sm-2 col-form-label">Admin<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-4">
                        <input id="DeliveryAdmin" name="DeliveryAdmin" type="text" class="form-control form-control-sm" value="<?= $_sales->MsEmpName ?>" readonly>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center">
                     <label for="DeliveryRemarks" class="col-sm-3 col-form-label">Catatan<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-9">
                        <textarea id="DeliveryRemarks" name="DeliveryRemarks" type="text" class="form-control form-control-sm"></textarea>
                     </div>
                  </div>
                  <div class="row my-2 align-items-center">
                     <label for="deliverydesc" class="col-sm-3 col-form-label">Pengiriman hari ini</label>
                     <label id="deliverydesc" class="col-sm-9" style="font-weight:bold;font-size:0.75rem">
                        sudah ada 3 pengiriman <a class="text-primary " onclick="show_pengiriman()" style="cursor:pointer">lihat lebih banyak</a>
                     </label>
                  </div>

               </div>
               <div class="col-xl-6 col-11 my-1">
                  <div class="row mb-1 align-items-center">
                     <div class="label-border-right">
                        <span class="label-dialog">Pengiriman / Delivery</span>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center">
                     <label for="MsDeliveryType" class="col-sm-3 col-form-label">Tipe Pengiriman</label>
                     <div class="col-sm-9">
                        <div class="input-group">
                           <select class="custom-select custom-select-sm form-select form-select-sm" id="MsDeliveryType" name="MsDeliveryType" style="width:100%">
                              <option value="0">Toko -> Customer</option>
                              <option value="1">Toko -> Toko</option>
                              <option value="2">Vendor -> Customer</option>
                              <option value="3">Vendor -> Toko</option>
                              <option value="4">Vendor -> Gudang</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center d-none" id="display-vendor">
                     <label for="PORef" class="col-sm-3 col-form-label">No. Ref </label>
                     <div class="col-sm-9 group-input">
                        <input id="PORef" name="PORef" type="text" class="form-control form-control-sm" value="<?= $_delivery->DeliveryRef2 ?>" placeholder="Cari data pembelian" readonly>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center">
                     <label for="MsDeliveryId" class="col-sm-3 col-form-label">Armada</label>
                     <div class="col-sm-5">
                        <div class="input-group">
                           <select class="custom-select custom-select-sm form-select form-select-sm" id="MsDeliveryId" name="MsDeliveryId" style="width:80%">';
                              <?php
                              $db = $this->db->where("MsDeliveryIsActive=1")->get("TblMsDelivery")->result();
                              foreach ($db as $key) {
                                 echo '<option value="' . $key->MsDeliveryId . '" ' . ($_sales->SalesDelService == $key->MsDeliveryId ? "selected" : "") . '>' . $key->MsDeliveryName . '</option>';
                              }
                              ?>
                           </select>
                           <button class="btn btn-success btn-sm" id="create-new-armada" type="button"><i class="fas fa-plus" aria-hidden="true"></i></button>
                        </div>
                     </div>
                     <label for="DeliveryJenis" class="col-sm-1 col-form-label lbl-omahbata">Via</label>
                     <div class="col-sm-3 lbl-omahbata">
                        <select class="custom-select custom-select-sm form-select form-select-sm" id="DeliveryJenis" name="DeliveryJenis" style="width:100%">
                           <option value="1">ENGKEL</option>
                           <option value="2">PICK-UP</option>
                           <option value="3">PS</option>
                        </select>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center lbl-optional" style="display: none;">
                     <label for="DeliveryResi" class="col-sm-3 col-form-label">Resi<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-9">
                        <input id="DeliveryResi" name="DeliveryResi" type="text" class="form-control form-control-sm"></input>
                     </div>
                  </div>
                  <div class="row mb-1 mt-2 align-items-center">
                     <label for="MsStoreSrc" class="col-sm-3 col-form-label">Pengirim</label>
                     <div class="col-sm-9">
                        <div class="input-group">
                           <select class="custom-select custom-select-sm form-select form-select-sm" id="MsStoreSrc" name="MsStoreSrc" style="width:100%">
                              <option value="0">VENDOR</option>
                              <?php
                              $db = $this->db->get("TblMsWorkplace")->result();
                              foreach ($db as $key) {
                                 echo '<option value="' . $key->MsWorkplaceId . '">' . $key->MsWorkplaceCode . '</option>';
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row mb-1 ">
                     <label for="Pelanggan" class="col-sm-3 col-form-label">Penerima</label>
                     <div class="col-sm-9 p-0">
                        <div class="row m-1 ">
                           <div class="input-group d-none" id="display-dst">
                              <select class="custom-select custom-select-sm form-select form-select-sm" id="MsStoreDst" name="MsStoreDst" style="width:100%">';
                                 <?php
                                 $db = $this->db->get("TblMsWorkplace")->result();
                                 foreach ($db as $key) {
                                    echo '<option value="' . $key->MsWorkplaceId . '">' . $key->MsWorkplaceCode . '</option>';
                                 }
                                 ?>
                              </select>
                           </div>
                        </div>
                        <div class="row m-1 ">
                           <div class="col-12" id="detail-delivery">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 col-11 my-1">
                  <div class="row justify-content-center">
                     <div class="col-12">
                        <div class="row mb-1 align-items-center">
                           <div class="label-border-right mb-3" style="position:relative">
                              <span class="label-dialog">Detail Item</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="card " style="min-height:100px;">
                           <div class="card-body p-2 ">
                              <table id="tb_data_item" class="table table-hover align-middle responsive" style='font-family:"Sans-serif", Helvetica; font-size:80%;width:100%'>
                                 <thead class="thead-dark" style="display:none;">
                                    <tr>
                                       <th>html</th>
                                       <th>MsItemId</th>
                                       <th>MsVendorCode</th>
                                       <th>MsItemUoM</th>
                                       <th>SalesDetailQty</th>
                                       <th>DeliveryDetailQtyTotal</th>
                                       <th>DeliveryDetailQty</th>
                                    </tr>
                                 </thead>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="col-lg-6 col-11 my-1">
                  <div class="row mb-1 align-items-center">
                     <div class="label-border-right">
                        <span class="label-dialog">Upload Bukti Pengantaran</span>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center"> 
                     <div class="col-sm-12">
                        <div class="border">
                           <div class="dropzone" id="file-upload">
                              <div class="dz-message">
                                 <span style="font-size:0.85rem">geser dan tarik file disini atau klik untuk upload</span><br>
                                 <span style="font-size:0.6rem">format file gambar(png,jpeg,jpg)</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> 
               </div>

               <div class="col-lg-6 col-11 my-1">
                  <div class="row mb-1 align-items-center">
                     <div class="label-border-right">
                        <span class="label-dialog">Tanda Tangan Pengantar</span>
                     </div>
                  </div>
                  <div class="row mb-1 align-items-center"> 
                     <div class="col">
                        <div id="sig"></div>
                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                     </div>
                  </div> 
                  <button id="clear" class="btn btn-sm btn-outline-primary">Hapus Tanda Tangan</button>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="btn-submit">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
         </div>
      </div>
   </div>
</div>

<div id="dialog-customer"></div>

<div class="modal fade " id="modal-action-armada" data-bs-keyboard="false" data-bs-backdrop="static">
   <div class="modal-dialog modal-dialog-centered ">
      <form class="modal-content" name="form-action-armada">
         <div class="modal-header bg-dark">
            <h6 class="modal-title text-white"><i class="fas fa-plus text-success" aria-hidden="true"></i> &nbsp;Tambah Armada Pengiriman</h5>
               <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row justify-content-center">
               <div class="col-10">
                  <div class="row mb-1 align-items-center">
                     <label for="MsDeliveryName" class="col-sm-3 col-form-label">Nama<sup class="error">&nbsp;*</sup></label>
                     <div class="col-sm-9">
                        <input id="MsDeliveryName" name="MsDeliveryName" type="text" class="form-control form-control-sm" value="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="btn-submit-armada">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
         </div>
      </form>
   </div>
   <script>
      var req_status_armada = 0;

      $(function() {
         $("form[name='form-action-armada']").validate({
            rules: {
               MsDeliveryName: {
                  "required": true,
                  "remote": "<?= site_url("function/client_data_master/validate_kode_delivery") ?>",
               },
            },
            messages: {
               MsDeliveryName: {
                  required: "Masukan Nama Tipe Pengiriman",
                  remote: "Nama Tipe Pengiriman sudah ada"
               },
            },
            submitHandler: function(form) {
               if (!req_status_armada) {
                  $("#btn-submit-armada").html('<i class="fas fa-circle-notch fa-spin"></i> Loading');
                  $.ajax({
                     method: "POST",
                     url: "<?= site_url("function/client_data_master/data_delivery_add") ?>",
                     data: {
                        "MsDeliveryName": $("#MsDeliveryName").val(),
                        "MsDeliveryIsActive": "on"
                     },
                     before: function() {
                        req_status_armada = 1;
                     },
                     success: function(data) {
                        req_status_add = 0;
                        $("#btn-submit-armada").html("Simpan");

                        if (data) {
                           Swal.fire({
                              icon: 'success',
                              text: 'Tambah data berhasil',
                              showConfirmButton: false,
                              allowOutsideClick: false,
                              allowEscapeKey: false,
                              timer: 1500,
                           }).then((result) => {
                              if (result.dismiss === Swal.DismissReason.timer) {
                                 $("#modal-action-armada").modal("hide");
                                 $("#SalesDeliveryService").select2("open");
                              }
                           });
                        } else {
                           Swal.fire({
                              icon: 'error',
                              text: 'Tambah data gagal',
                              showConfirmButton: false,
                              allowOutsideClick: false,
                              allowEscapeKey: false,
                              timer: 1500
                           });
                        }
                     }
                  });
                  return false;
               }
            }
         });
      });
   </script>
</div>

<div class="modal fade " id="modal-action-pembelian" data-bs-keyboard="false" data-bs-backdrop="static">
   <div class="modal-dialog modal-lg ">
      <div class="modal-content" name="form-action-armada">
         <div class="modal-header bg-dark">
            <h6 class="modal-title text-white"><i class="fas fa-search text-primary" aria-hidden="true"></i> &nbsp;List pembelian</h5>
               <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row mb-1 align-items-center">
               <label for="search-data-pembelian" class="col-form-label">Pencarian<sup class="error">&nbsp;*</sup></label>
               <div class="col">
                  <input id="search-data-pembelian" name="search-data-pembelian" type="text" class="form-control form-control-sm" value="" placeholder="Cari no pembelian/nama item">
               </div>
            </div>
            <div id="wait-content" class="load-container load4" style="display: block;">
               <div class="load-progress"></div>
            </div>
            <div id="data-content" class="p-2" />
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
         </div>
      </div>
   </div>
</div>
<script>
   var file_kosong = "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gIoSUNDX1BST0ZJTEUAAQEAAAIYAAAAAAIQAABtbnRyUkdCIFhZWiAAAAAAAAAAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNjAAAA8AAAAHRyWFlaAAABZAAAABRnWFlaAAABeAAAABRiWFlaAAABjAAAABRyVFJDAAABoAAAAChnVFJDAAABoAAAAChiVFJDAAABoAAAACh3dHB0AAAByAAAABRjcHJ0AAAB3AAAADxtbHVjAAAAAAAAAAEAAAAMZW5VUwAAAFgAAAAcAHMAUgBHAEIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFhZWiAAAAAAAABvogAAOPUAAAOQWFlaIAAAAAAAAGKZAAC3hQAAGNpYWVogAAAAAAAAJKAAAA+EAAC2z3BhcmEAAAAAAAQAAAACZmYAAPKnAAANWQAAE9AAAApbAAAAAAAAAABYWVogAAAAAAAA9tYAAQAAAADTLW1sdWMAAAAAAAAAAQAAAAxlblVTAAAAIAAAABwARwBvAG8AZwBsAGUAIABJAG4AYwAuACAAMgAwADEANv/bAEMAAwICAgICAwICAgMDAwMEBgQEBAQECAYGBQYJCAoKCQgJCQoMDwwKCw4LCQkNEQ0ODxAQERAKDBITEhATDxAQEP/bAEMBAwMDBAMECAQECBALCQsQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEP/AABEIAO4BSAMBIgACEQEDEQH/xAAVAAEBAAAAAAAAAAAAAAAAAAAACf/EABQQAQAAAAAAAAAAAAAAAAAAAAD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AqmAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/9k=";
   var file_pengiriman = "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gIoSUNDX1BST0ZJTEUAAQEAAAIYAAAAAAIQAABtbnRyUkdCIFhZWiAAAAAAAAAAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNjAAAA8AAAAHRyWFlaAAABZAAAABRnWFlaAAABeAAAABRiWFlaAAABjAAAABRyVFJDAAABoAAAAChnVFJDAAABoAAAAChiVFJDAAABoAAAACh3dHB0AAAByAAAABRjcHJ0AAAB3AAAADxtbHVjAAAAAAAAAAEAAAAMZW5VUwAAAFgAAAAcAHMAUgBHAEIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAFhZWiAAAAAAAABvogAAOPUAAAOQWFlaIAAAAAAAAGKZAAC3hQAAGNpYWVogAAAAAAAAJKAAAA+EAAC2z3BhcmEAAAAAAAQAAAACZmYAAPKnAAANWQAAE9AAAApbAAAAAAAAAABYWVogAAAAAAAA9tYAAQAAAADTLW1sdWMAAAAAAAAAAQAAAAxlblVTAAAAIAAAABwARwBvAG8AZwBsAGUAIABJAG4AYwAuACAAMgAwADEANv/bAEMAAwICAgICAwICAgMDAwMEBgQEBAQECAYGBQYJCAoKCQgJCQoMDwwKCw4LCQkNEQ0ODxAQERAKDBITEhATDxAQEP/bAEMBAwMDBAMECAQECBALCQsQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEP/AABEIAO4BSAMBIgACEQEDEQH/xAAVAAEBAAAAAAAAAAAAAAAAAAAACf/EABQQAQAAAAAAAAAAAAAAAAAAAAD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8AqmAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/9k=";
   
   /*  ARRAY SELECT */
   var datestart = moment("<?= $_delivery->DeliveryDate ?>");
   var datestartKirim = moment();
   var req_status_add = 0;
   var del_address_store = [];
   var del_id = <?= $_sales->MsCustomerDeliveryId ?>;
   var cust_id = <?= $_sales->MsCustomerId ?>;
   var del_index = 0;

   var data_item = [];
   $("#DeliveryDate").daterangepicker({
      singleDatePicker: true,
      startDate: datestart,
      showDropdowns: true,
      locale: {
         "format": "DD/MM/YYYY",
         "customRangeLabel": "Pilih Tanggal Sendiri",
      }
   }, function(start, end) {
      datestart = start;
      get_list_delivery();
   });
   
   $("#DeliveryDateKirim").daterangepicker({
      singleDatePicker: true,
      startDate: datestartKirim,
      showDropdowns: true,
      locale: {
         "format": "DD/MM/YYYY",
         "customRangeLabel": "Pilih Tanggal Sendiri",
      }
   }, function(start, end) {
      datestartKirim = start; 
   });

   var sig = $('#sig').signature({
      syncField: '#signature64',
      syncFormat: 'PNG'
   });

   $('#clear').click(function(e) {
      e.preventDefault();
      sig.signature('clear');
      $("#signature64").val('');
   });
   Dropzone.autoDiscover = false;
   var myDropzone = new Dropzone(".dropzone", {
      addRemoveLinks: true,
      dictRemoveFile: '<i class="fas fa-times-circle text-danger"></i>',
      autoProcessQueue: false, 
      parallelUploads: 1,
      maxFiles: 1,
      uploadMultiple: false,
      acceptedFiles: "image/*",
      url: "<?= site_url("function/client_data_sales/customer_upload_file/id_toko/id_cust") ?>",
      renameFile: function(file) {
         let newName = "bukti_pengiriman." + (file.type.split("/"))[1];
         return newName;
      } 
   });

   myDropzone.on("addedfile", function(file) {
      var maxFiles = 1;
      for (var i = myDropzone.files.length - maxFiles - 1; i >= 0; i--) {
         var f = myDropzone.files[i];
         if (f.upload.uuid !== file.upload.uuid)
            myDropzone.removeFile(f);
      }
      var reader = new FileReader();
      reader.onload = function(event) {
         // event.target.result contains base64 encoded image
         file_pengiriman = event.target.result;
         var fileName = file.name 
      };
      reader.readAsDataURL(file);
   });
   document.onpaste = function(event) {
      var items = (event.clipboardData || event.originalEvent.clipboardData).items;
      for (index in items) {
         var item = items[index];
         if (item.kind === 'file') {
            // adds the file to your dropzone instance
            myDropzone.addFile(item.getAsFile())
         }
      }
   }
   myDropzone.on("sending", function(file, xhr, formData) {
      // Will send the filesize along with the file as POST data.
      formData.append("filesize", file.size);
      formData.append("fileName", "bukti_pengiriman");
   });
   myDropzone.on("queuecomplete", function(file) {
      $("#modal-action").modal("hide");
   });




   data_pengiriman = [];
   data_pengiriman_html = [];
   get_list_delivery = function() {
      $.ajax({
         method: "POST",
         dataType: "json",
         url: "<?= site_url("function/client_data_sales/get_list_delivery/") ?>" + moment(datestart).format('YYYY-MM-DD'),
         success: function(data) {
            data_pengiriman = data["data"];
            data_pengiriman_html = data["html"];
            if (data_pengiriman.length > 0) {
               $("#deliverydesc").html('sudah ada ' + data_pengiriman.length + ' pengiriman omahbata <a class="text-primary" onclick="show_pengiriman()" style="cursor:pointer">lihat detail</a>');
            } else {
               $("#deliverydesc").html('tidak ada pengiriman');
            }
         }
      });
   }
   show_pengiriman = function() {
      Swal.fire({
         width: 1200,
         height: 600,
         html: data_pengiriman_html,
      })
   }

   $('#MsDeliveryId').select2({
      placeholder: "Cari Armada",
      dropdownParent: $("#modal-action .modal-content"),
      ajax: {
         dataType: "json",
         url: "<?= site_url("function/client_data_sales/get_data_armada") ?>",
         delay: 800,
         processResults: function(data) {
            return {
               results: data
            };
         }
      }
   });
   $("#MsDeliveryId").on("select2:select", function(e) {
      if (this.value == 1) {
         $.each($(".lbl-omahbata"), function(e) {
            $(this).show();
         });
         $.each($(".lbl-optional"), function(e) {
            $(this).hide();
         });
      } else {
         $.each($(".lbl-omahbata"), function(e) {
            $(this).hide();
         });
         $.each($(".lbl-optional"), function(e) {
            $(this).show();
         });
      }
   });
   $('#DeliveryJenis').select2({
      dropdownParent: $("#modal-action .modal-content"),
   });
   $('#MsDeliveryType').select2({
      placeholder: "Cari Armada",
      dropdownParent: $("#modal-action .modal-content")
   }).on("select2:select", function(e) {
      if (this.value > 1) {
         $("#display-vendor").removeClass("d-none");
      } else {
         $("#display-vendor").removeClass("d-none");
         $("#display-vendor").addClass("d-none");
      };

      if (this.value == 3) {
         $("#display-dst").removeClass("d-none");
         $("#MsStoreDst").val("<?= $this->session->userdata("MsWorkplaceId") ?>").trigger("change");
         get_data_delivery_store($("#MsStoreDst").val());
      } else if (this.value == 4) {
         $("#display-dst").removeClass("d-none");
         $("#MsStoreDst").val(2).trigger("change");
         get_data_delivery_store($("#MsStoreDst").val());
      } else {
         $("#display-dst").removeClass("d-none");
         $("#display-dst").addClass("d-none");
         load_data_delivery();
      };
   });

   $('#MsStoreDst').select2({
      dropdownParent: $("#modal-action .modal-content")
   }).on("select2:select", function(e) {
      get_data_delivery_store(this.value);
   });

   $("#create-new-armada").click(function() {
      $("#modal-action-armada").modal("show");
      $("#modal-action").modal("hide");
   });
   $("#modal-action-armada").on("hidden.bs.modal", function() {
      $("#modal-action").modal("show");
   });

   get_data_delivery = function() {
      return new Promise(function(resolve, reject) {
         $.ajax({
            url: "<?= site_url("function/client_data_sales/get_del_customer/") ?>" + cust_id,
            type: "GET",
            dataType: "json",
            beforeSend: function() {},
            success: function(data) {
               resolve(data) // Resolve promise and when success
            },
            error: function(err) {
               reject(err) // Reject the promise and go to catch()
            }
         });
      });
   }
   load_data_delivery = async function() {
      const del_address = await get_data_delivery();
      var htmldelivery = "";
      for (var i = 0; del_address.length > i; i++) {
         if (del_id < 0 && del_address[i]["MsCustomerDeliveryUtama"] == 1) {
            htmldelivery = '<div id="card-delivery" class="card shadow-sm card-delivery select" >';
            htmldelivery += '  <input id="MsCustomerDeliveryId" value="' + del_address[i]["MsCustomerDeliveryId"] + '" style="display:none"/>';
            htmldelivery += '  <div class="p-2 ps-4">';
            htmldelivery += '      <span class="card-title fw-bold">' + del_address[i]["MsCustomerDeliveryReceive"] + '</span><br>';
            htmldelivery += '      <span class="card-text">' + del_address[i]["MsCustomerDeliveryTelp"] + '</span><br>';
            htmldelivery += '      <span class="card-text">' + del_address[i]["MsCustomerDeliveryAddress"] + '</span><br>';
            htmldelivery += '      <div class="py-2 d-flex align-items-center text-secondary">';
            htmldelivery += '          <i class="fas fa-map-marker-alt fa-2x pe-2"></i>';
            htmldelivery += '          <span class="label-small">' + del_address[i]["MsCustomerDeliveryName"] + '</span>';
            htmldelivery += '      </div>';
            htmldelivery += '  </div>';
            htmldelivery += '  <div class="d-flex ms-4 card-delivery-action my-1 ">';
            htmldelivery += '      <a class="action-label" onclick="ubah_data_delivery()" >Ubah</a>';
            htmldelivery += '      <div class="action-space"></div>';
            htmldelivery += '      <a class="action-label" onclick="pilih_data_delivery()" >Pilih Alamat Lain</a>';
            htmldelivery += '  </div>';
            htmldelivery += '</div>';
            $("#detail-delivery").html(htmldelivery);
            del_id = del_address[i]["MsCustomerDeliveryId"];
            del_index = i;
            break;
         } else if (del_address[i]["MsCustomerDeliveryId"] == del_id) {
            htmldelivery = '<div id="card-delivery" class="card shadow-sm card-delivery select">';
            htmldelivery += '  <input id="MsCustomerDeliveryId" value="' + del_address[i]["MsCustomerDeliveryId"] + '" style="display:none"/>';
            htmldelivery += '  <div class="p-2 ps-4">';
            htmldelivery += '      <span class="card-title fw-bold">' + del_address[i]["MsCustomerDeliveryReceive"] + '</span><br>';
            htmldelivery += '      <span class="card-text">' + del_address[i]["MsCustomerDeliveryTelp"] + '</span><br>';
            htmldelivery += '      <span class="card-text">' + del_address[i]["MsCustomerDeliveryAddress"] + '</span><br>';
            htmldelivery += '      <div class="py-2 d-flex align-items-center text-secondary">';
            htmldelivery += '          <i class="fas fa-map-marker-alt fa-2x pe-2"></i>';
            htmldelivery += '          <span class="label-small">' + del_address[i]["MsCustomerDeliveryName"] + '</span>';
            htmldelivery += '      </div>';
            htmldelivery += '  </div>';
            htmldelivery += '  <div class="d-flex  ms-4 card-delivery-action my-1 ">';
            htmldelivery += '      <a class="action-label" onclick="ubah_data_delivery()" >Ubah</a>';
            htmldelivery += '      <div class="action-space"></div>';
            htmldelivery += '      <a class="action-label" onclick="pilih_data_delivery()" >Pilih Alamat Lain</a>';
            htmldelivery += '  </div>';
            htmldelivery += '</div>';
            del_index = i;
            $("#detail-delivery").html(htmldelivery);
            break;
         }
      }
   }

   get_data_store = function(id) {
      return new Promise(function(resolve, reject) {
         $.ajax({
            url: "<?= site_url("function/client_data_sales/get_del_store/") ?>" + id,
            type: "GET",
            dataType: "json",
            beforeSend: function() {},
            success: function(data) {
               resolve(data) // Resolve promise and when success
            },
            error: function(err) {
               reject(err) // Reject the promise and go to catch()
            }
         });
      });
   }

   get_data_delivery_store = async function(id) {
      const del_address = await get_data_store(id);
      var htmldelivery = "";
      htmldelivery = '<div id="card-delivery" class="card shadow-sm card-delivery select" >';
      htmldelivery += '  <input id="MsCustomerDeliveryId" value="' + del_address["MsWorkplaceId"] + '" style="display:none"/>';
      htmldelivery += '  <div class="p-2 ps-4">';
      htmldelivery += '      <span class="card-title fw-bold">' + del_address["MsWorkplaceName"] + '</span><br>';
      htmldelivery += '      <span class="card-text">' + del_address["MsWorkplaceTelp1"] + '</span><br>';
      htmldelivery += '      <span class="card-text">' + del_address["MsWorkplaceAddress"] + '</span><br>';
      htmldelivery += '      <div class="py-2 d-flex align-items-center text-secondary">';
      htmldelivery += '          <i class="fas fa-map-marker-alt fa-2x pe-2"></i>';
      htmldelivery += '          <span class="label-small">' + del_address["MsWorkplaceMap"] + '</span>';
      htmldelivery += '      </div>';
      htmldelivery += '  </div>';
      htmldelivery += '</div>';
      $("#detail-delivery").html(htmldelivery);
   }


   ubah_data_delivery = function() {
      if (typeof window.ajaxRequestSingle !== "undefined") {
         window.ajaxRequestSingle.abort();
      }

      window.ajaxRequestSingle = $.ajax({
         method: "POST",
         url: "<?= site_url("message/message_sales/data_delivery_edit/") ?>" + $("#MsCustomerDeliveryId").val(),
         success: function(data) {
            $("#dialog-customer").html(data);
            $("#modal-action").modal("hide");
            // console.log(del_address);
            set_modal_action($("#modal-action"));
            $("#modal-action").on("shown.bs.modal", function() {
               load_data_delivery();
            });
         }
      });
   }
   pilih_data_delivery = function() {
      if (typeof window.ajaxRequestSingle !== "undefined") {
         window.ajaxRequestSingle.abort();
      }

      window.ajaxRequestSingle = $.ajax({
         method: "POST",
         url: "<?= site_url("message/message_sales/data_delivery_select/") ?>" + cust_id,
         success: function(data) {
            $("#dialog-customer").html(data);
            $("#modal-action").modal("hide");
            set_modal_select($("#modal-action"));
         }
      });
   }
   set_del_id = function(i, j) {
      del_id = i;
      del_index = j;
   }


   load_data_delivery();

   /* data_item (html,itemid,vendorcode,uom,SalesDetailQty,DeliveryDetailQtyTotal,DeliveryDetailQty) */
   get_list_delivery();

   $("#action-pembelian").click(function() {
      $("#modal-action-pembelian").modal("show");
      $("#modal-action").modal("hide");
   });
   $("#modal-action-pembelian").on("hidden.bs.modal", function() {
      $("#modal-action").modal("show");
   });
   var ajax_req;
   // show_content = function() {
   //    $("#data-content").hide();
   //    $("#wait-content").show();
   //    if (ajax_req && ajax_req.readyState != 4) {
   //       ajax_req.abort();
   //    }
   //    ajax_req = $.ajax({
   //       type: "POST",
   //       data: {
   //          "tb_status": $("#DeliveryRef").val(),
   //          "tb_search": $('#search-data-pembelian').val()
   //       },
   //       url: "<?= site_url('function/client_datatable_sales/get_data_pembelian/') ?>",
   //       success: function(data) {
   //          $("#wait-content").hide();
   //          $("#data-content").html(data);
   //          $("#data-content").show();
   //       }
   //    })
   // }
   // show_content();

   $('#search-data-pembelian').keyup(function() {
      show_content();
   });

   select = function(id) {
      $("#modal-action-pembelian").modal("hide");
      $("#modal-action").modal("show");

      $.ajax({
         method: "POST",
         dataType: "json",
         url: "<?= site_url("function/client_data_sales/get_data_pembelian/") ?>" + id,
         success: function(data) {
            console.log(data);
            $("#PORef").val(data["header"]["POCode"]);
            $("#remove-pembelian").show();

            var item_quo = data["detail"];
            data_item = [];
            for (var i = 0; i < item_quo.length; i++) {
               var htmlItem = '<div class="row row-table get-item">';
               htmlItem += '     <div class="col-lg-5 col-12 mb-lg-0 mb-2" >';
               htmlItem += '       <span class="fw-bold">' + item_quo[i]['MsItemCode'] + '-' + item_quo[i]['MsItemName'] + ' (' + item_quo[i]['MsVendorCode'] + ')</span><br>';
               htmlItem += '       <span class="fw-bold" style="font-size:0.7rem;display:none" name="displayprice">Rp. 160,000<sup style="color:gray;">Meter</sup><br></span>';
               htmlItem += '       <span  style="color:gray;font-size:0.6rem">' + item_quo[i]['MsItemSize'] + '&nbsp;|&nbsp;' + item_quo[i]['MsItemPcsM2'] + '</span>';
               htmlItem += '     </div>';
               htmlItem += '     <div class="col-lg-7 col-12">';
               htmlItem += '       <div class="row" >';
               htmlItem += '          <div class="col-4 pe-0">';
               htmlItem += '             <div class="d-flex flex-column d-none">';
               htmlItem += '                <span  style="color:gray;">Yang Sudah dikirim :</span>';
               htmlItem += '                <span class="fw-bold style="color:gray;" name="DeliveryDetailQtyTotal">' + item_quo[i]['MsItemUoM'] + '</span>';
               htmlItem += '             </div>';
               htmlItem += '          </div>';
               htmlItem += '          <div class="col-4 ps-1 pe-0">';
               htmlItem += '             <div class="d-flex flex-column">';
               htmlItem += '                <span  style="color:gray;">Total dari penjualan :</span>';
               htmlItem += '                <span class="fw-bold style="color:gray;" name="SalesDetailQty">' + item_quo[i]['PODetailQty'] + ' ' + item_quo[i]['MsItemUoM'] + '</span>';
               htmlItem += '             </div>';
               htmlItem += '          </div>';
               htmlItem += '          <div class="col-4 ps-1 pe-0">';
               htmlItem += '             <div class="d-flex flex-column">';
               htmlItem += '                <span  style="color:gray;">Qty&nbsp;(' + item_quo[i]['MsItemUoM'] + ')</span>';
               htmlItem += '                <input type="text" class="input-in-table double" name="DeliveryDetailQty" style="min-width:90px" value=""/>';
               htmlItem += '             </div>';
               htmlItem += '          </div>';
               htmlItem += '        </div>';
               htmlItem += '     </div>';
               data_item.push([htmlItem,
                  item_quo[i]['MsItemId'],
                  item_quo[i]['MsVendorCode'],
                  item_quo[i]['MsItemUoM'],
                  item_quo[i]['PODetailQty'],
                  0,
                  item_quo[i]['PODetailQty'],
               ]);
            }

            tbl_item.ajax.reload();
         }
      });
   };
   $("#remove-pembelian").click(function() {
      $("#PORef").val("");
      $("#remove-pembelian").hide();
   })

   $('#MsStoreDst').val("<?= ($_delivery->MsCustomerDeliveryId <= 5 ? $_delivery->MsCustomerDeliveryId : 1)  ?>")
   $('#MsDeliveryType').val("<?= $_delivery->DeliveryType ?>").trigger("change").trigger("select2:select");
   $('#MsDeliveryId').val("<?= $_delivery->MsDeliveryId ?>").trigger("change").trigger("select2:select");
   $('#DeliveryJenis').val("<?= $_delivery->DeliveryJenis ?>").trigger("change").trigger("select2:select"); 
   $('#DeliveryResi').val("<?= $_delivery->DeliveryResi ?>");
   $('#MsStoreSrc').val("<?= $_delivery->DeliveryFrom ?>").trigger("change").trigger("select2:select");
   var data_sales = <?= JSON_ENCODE($_itemsales) ?>;
   var data_item_edit = <?= JSON_ENCODE($_detaildelivery) ?>;
   var data_delivery = <?= JSON_ENCODE($_itemdelivery) ?>;

   function get_sum_sales(itemid, vendor) {
      var total = 0;
      for (var i = 0; data_sales.length > i; i++) {
         if (itemid == data_sales[i]['MsItemId'] && vendor == data_sales[i]['MsVendorCode']) {
            total += parseFloat(data_sales[i]['SalesDetailQty']);
         }
      }
      return total;
   }

   function get_sum_delivery(itemid, vendor) {
      var total = 0;
      for (var i = 0; data_delivery.length > i; i++) {
         if (itemid == data_delivery[i]['MsItemId'] && vendor == data_delivery[i]['MsVendorCode']) {
            total += parseFloat(data_delivery[i]['DeliveryDetailQty']);
         }
      }
      return total;
   }

   for (var i = 0; data_item_edit.length > i; i++) {
      var total_pengiriman = get_sum_delivery(data_item_edit[i]['MsItemId'], data_item_edit[i]['MsVendorCode']);
      var total_sales = get_sum_sales(data_item_edit[i]['MsItemId'], data_item_edit[i]['MsVendorCode']);
      var htmlItem = '<div class="row row-table get-item">';
      htmlItem += '     <div class="col-lg-5 col-12 mb-lg-0 mb-2" >';
      htmlItem += '       <span class="fw-bold">' + data_item_edit[i]['MsItemCode'] + '-' + data_item_edit[i]['MsItemName'] + ' (' + data_item_edit[i]['MsVendorCode'] + ')</span><br>';
      htmlItem += '       <span class="fw-bold" style="font-size:0.7rem;display:none" name="displayprice">Rp. 160,000<sup style="color:gray;">Meter</sup><br></span>';
      htmlItem += '       <span  style="color:gray;font-size:0.6rem">' + data_item_edit[i]['MsItemCatName'] + '&nbsp;|&nbsp;' + data_item_edit[i]['MsItemSize'] + '&nbsp;|&nbsp;' + data_item_edit[i]['MsItemPcsM2'] + '</span>';
      htmlItem += '     </div>';
      htmlItem += '     <div class="col-lg-7 col-12">';
      htmlItem += '       <div class="row" >';
      htmlItem += '          <div class="col-md-3 col-sm-6 pe-0">';
      htmlItem += '             <div class="d-flex flex-column">';
      htmlItem += '                <span  style="color:gray;">Yang Sudah dikirim :</span>';
      htmlItem += '                <span class="fw-bold style="color:gray;" name="DeliveryDetailQtyTotal">' + total_pengiriman + ' ' + data_item_edit[i]['MsItemUoM'] + '</span>';
      htmlItem += '             </div>';
      htmlItem += '          </div>';
      htmlItem += '          <div class="col-md-3 col-sm-6 ps-1 pe-0">';
      htmlItem += '             <div class="d-flex flex-column">';
      htmlItem += '                <span  style="color:gray;">Total dari penjualan :</span>';
      htmlItem += '                <span class="fw-bold style="color:gray;" name="SalesDetailQty">' + total_sales + ' ' + data_item_edit[i]['MsItemUoM'] + '</span>';
      htmlItem += '             </div>';
      htmlItem += '          </div>';
      htmlItem += '          <div class="col-md-3 col-sm-6 ps-1 pe-0">';
      htmlItem += '             <div class="d-flex flex-column">';
      htmlItem += '                <span  style="color:gray;">Qty&nbsp;(' + data_item_edit[i]['MsItemUoM'] + ')</span>';
      htmlItem += '                <input type="text" class="input-in-table double" name="DeliveryDetailQty" style="min-width:90px" value=""/>';
      htmlItem += '             </div>';
      htmlItem += '          </div>';
      htmlItem += '          <div class="col-md-3 col-sm-6 ps-1 pe-0">';
      htmlItem += '             <div class="d-flex flex-column">';
      htmlItem += '                <span  style="color:gray;">Spare Qty&nbsp;(' + data_item_edit[i]['MsItemUoM'] + ')</span>';
      htmlItem += '                <input type="text" class="input-in-table double" name="DeliveryDetailQtySpare" style="min-width:90px" value=""/>';
      htmlItem += '             </div>';
      htmlItem += '          </div>';
      htmlItem += '        </div>';
      htmlItem += '     </div>';
      data_item.push([htmlItem,
         data_item_edit[i]['MsItemId'],
         data_item_edit[i]['MsVendorCode'],
         data_item_edit[i]['MsItemUoM'],
         data_item_edit[i]['DeliveryDetailQty'],
         total_pengiriman,
         data_item_edit[i]['DeliveryDetailQty'],
         0,
      ]);
   }
   var tbl_item = $("#tb_data_item").DataTable({
      "searching": false,
      "ajax": function(data, callback, settings) {
         callback({
            data: data_item
         }) //reloads data 
      },
      "columnDefs": [{
         "targets": [1, 2, 3, 4, 5, 6],
         "visible": false,
      }, ],
      "lengthChange": false,
      "paging": false,
      "ordering": false,
      "autoWidth": true,
      "info": false
   });

   tbl_item.on("draw", function() {
      $(".get-item").each(function(index, thisrow) {
         function total_item() {
            var sisa = (data_item[index][4] - data_item[index][5]);
            if (data_item[index][6] > sisa) {
               // data_item[index][6] = sisa;
               //$(thisrow).find('input[name="DeliveryDetailQty"]').val(sisa);
            };
         }
         var textqty = $(thisrow).find('input[name="DeliveryDetailQty"]').val(data_item[index][6]).keyup(function() {
            data_item[index][6] = this.value.replaceAll(",", "");
            total_item();
         }).focusout(function() {
            if (this.value == "" || this.value == "-") {
               $(this).val(0);
            }
         }).focus();
         var textqty = $(thisrow).find('input[name="DeliveryDetailQtySpare"]').val(data_item[index][7]).keyup(function() {
            data_item[index][7] = this.value.replaceAll(",", ""); 
         }).focusout(function() {
            if (this.value == "" || this.value == "-") {
               $(this).val(0);
            }
         });
         total_item();
      });

      var doubleinputs = Array.from(document.getElementsByClassName("double"));
      doubleinputs.forEach(function(doubleinput) {
         new Cleave(doubleinput, {
            numeral: true,
            numeralDecimalMark: ".",
            delimiter: ","
         })
      });
   });

   tbl_item.ajax.reload();


   $("#btn-submit").click(async function() {
      if (($("#MsDeliveryType").val() > 1) && ($("#PORef").val() == "")) {
         Swal.fire({
            icon: 'error',
            text: 'Pilih dokument PO terlebih dahulu!!!',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            timer: 1500
         });
         return;
      }

      if ($("#sig").signature('toDataURL', 'image/jpeg') == file_kosong) {
         Swal.fire({
            icon: 'error',
            text: 'harus masukan tanda tangan penerima',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            timer: 1500
         });
         return false;
      }
      if (!myDropzone.files.length) {
         Swal.fire({
            icon: 'error',
            text: 'Bukti pengantaran harus dimasukan',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            timer: 1500
         });
         return false;
      }
 
      if (!req_status_add) {
         $("#btn-submit").html('<i class="fas fa-circle-notch fa-spin"></i> Loading');
 

         var dataheader = { 
            "DeliveryRef": $("#DeliveryRef").val(),
            "DeliveryRef2": $("#PORef").val(),
            "DeliveryFrom": $("#MsStoreSrc").val(),
            "DeliveryCode": $("#DeliveryCode").val(),
            "DeliveryDate": moment(datestart).format('YYYY-MM-DD'), 
            "DeliveryDateKirim": moment(datestartKirim).format('YYYY-MM-DD'), 
            "DeliveryRit": $("#DeliveryRit").val(),
            "MsDeliveryId": $("#MsDeliveryId").val(),
            "MsCustomerDeliveryId": $("#MsCustomerDeliveryId").val(),
            "DeliveryResi": $("#DeliveryResi").val(),
            "DeliveryType": $("#MsDeliveryType").val(),
            "DeliveryJenis": $("#DeliveryJenis").val(),
            "DeliveryRemarks": $("#DeliveryRemarks").val(), 
            "MsCustomerId": cust_id,
            "MsEmpId":$("#MsEmpId").val(), 
            "DeliveryStatus": 1,
            "MsWorkplaceId": $("#MsWorkplaceId").val(), 
         };

         var detailitem = [];
         for (var i = 0; data_item.length > i; i++) {
            /* data_item (html,itemid,vendorcode,price,qty,disc,uom,total) */
            if (data_item[i][6] > 0) {
               var data = {
                  "MsItemId": data_item[i][1],
                  "MsVendorCode": data_item[i][2],
                  "DeliveryDetailQty": data_item[i][6],
                  "DeliveryDetailSpareQty": data_item[i][7],
                  "DeliveryDetailRef": $("#DeliveryCode").val(),
               };
               detailitem.push(data);
            }
         }
         /* -------------------------------------------------     SEND DATA SERVER    ---------------------------------------------- */
         $.ajax({
            method: "POST",
            url: "<?= site_url("function/client_data_sales/data_delivery_proses/") . $_delivery->DeliveryId ?>",
            data: {
               "data": dataheader,
               "item": detailitem,
            },
            before: function() {
               req_status_add = 1;
            },
            success: function(data) {
               req_status_add = 0;
               $("#btn-submit").html("Simpan");
               Swal.fire({
                  icon: 'success',
                  text: 'Simpan Proses data berhasil',
                  showConfirmButton: false,
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  timer: 1500,
               }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.timer) {
                     $.ajax({
                        method: "POST",
                        url: "<?= site_url("function/client_data_sales/data_delivery_upload_pengantaran/") ?>" + <?= $_delivery->DeliveryId ?>,
                        data: {
                           "filetandatangan": $("#sig").signature('toDataURL', 'image/png'),
                           "filepengiriman": file_pengiriman
                        }
                     }); 
                     load_data_table_sales();
                  }
               });
            }
         });
      }
   });
</script>