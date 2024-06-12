<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-md-6">
                <h2>Data Item Cost of Goods Sales (COGS)</h2>
            </div>
            <div class="col-md-6 align-self-end">
                <ol class="breadcrumb float-md-end">
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Item Cost of Goods Sales (COGS)</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="row page-content">
        <div class="col-12">
            <div class="card border-top-orange">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <span class="fw-bold"><i class="fas fa-database" aria-hidden="true"></i>&nbsp;Master Data - Item Cost of Goods Sales (COGS)</span>
                        </div>
                        <div class="col-auto px-1">
                            <button type="button" class="btn btn-primary btn-sm btn-hide" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-file-export"></i>
                                <span class="fw-bold">
                                    &nbsp;Export Data
                                </span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" onclick="window.open('<?php echo site_url('function/client_export_master/data_cogs_export_excel') ?>','_blank')">
                                        <small><i class="fas fa-file-excel"></i>&nbsp;Export Excel</small>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" onclick="window.open('<?php echo site_url('export/datamaster/cogs') ?>','_blank')">
                                        <small><i class="fas fa-file-pdf"></i>&nbsp;Export PDF</small>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="row mb-1">
                                <label for="tb_search" class="col-sm-3 col-form-label">Pencarian</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" id="tb_search">
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="tb_row" class="col-sm-3 col-form-label">Status COGS</label>
                                <div class="col-sm-9">
                                    <select class="custom-select custom-select-sm form-control form-control-sm" id="tb_status" name="tb_status">
                                        <option value="" selected>Semua Status</option>
                                        <option value="1">Sudah di Set</option>
                                        <option value="0">Belum di Set</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label for="tb_row" class="col-sm-3 col-form-label">Vendor</label>
                                <div class="col-sm-9">
                                    <select class="custom-select custom-select-sm form-control form-control-sm" id="tb_status_1" name="tb_status_1">
                                        <option value="" selected>Semua Status</option>
                                        <?php
                                        $data_vendor = $this->db->query("Select * from TblMsVendor")->result();
                                        foreach ($data_vendor as $row) {
                                            echo '<option value="' . $row->MsVendorId . '">' . $row->MsVendorCode . ' - ' . $row->MsVendorName . '</option>';
                                        }
                                        ?>
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
                        </div>
                    </div>
                    <div class="table-responsive" id="tb_data_respon">
                        <table id="tb_data" class="table table-hover align-middle" style='font-family:"Sans-serif", Helvetica; font-size:80%;width:100%'>
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Ukuran</th>
                                    <th>Satuan</th>
                                    <th>Supplier</th>
                                    <th>Total</th>
                                    <th><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dialog-box">
    </div>
    <script>
        $(document).ready(function() {

            var req_status = 0;
            var modal_action = "";
            var table = $('#tb_data').DataTable({
                "responsive": true,
                "searching": false,
                "lengthChange": false,
                "pageLength": parseInt($('#tb_row').val()),
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo site_url('function/client_datatable/get_master_item_cogs') ?>",
                    "type": "POST",
                    "data": function(data) {
                        data.search['value'] = $('#tb_search').val();
                        data.search['statusnull'] = $('#tb_status').val();
                        data.search['colstatusnull'] = "MsCogsTotal";
                        data.search['status'] = $('#tb_status_1').val();
                        data.search['colstatus'] = "TblMsVendor.MsVendorId";
                    }
                },
                "order": [],
                "columnDefs": [{
                        "orderable": false,
                        targets: 0
                    },
                    {
                        targets: 7,
                        className: 'text-right',
                        render: $.fn.dataTable.render.number(',', '.', 0, '')
                    },
                    {
                        "orderable": false,
                        targets: 8
                    }
                ],

            });
            new $.fn.dataTable.FixedHeader(table);
            $('#tb_data').on('processing.dt', function(e, settings, processing) {
                if (processing) {
                    // $('#tb_data_respon').hide();
                } else {
                    // $('#tb_data_respon').show();
                }
            });
            $('#tb_search').keyup(function() {
                table.ajax.reload(null, false).responsive.recalc().columns.adjust();
            });
            $('#tb_row').change(function() {
                table.page.len(parseInt($('#tb_row').val())).draw();
            });
            $('#tb_status').change(function() {
                table.ajax.reload(null, false).responsive.recalc().columns.adjust();
            });
            $('#tb_status_1').on('select2:select', function(e) {
                table.ajax.reload(null, false).responsive.recalc().columns.adjust();
            });
            $('#tb_status_1').select2();
            load_data_table = function() {
                table.ajax.reload(null, false).responsive.recalc().columns.adjust();
                modal_action.hide();
            };
            edit_click = function(vendor, item, id) {
                if (id) {
                    if (!req_status) {
                        $.ajax({
                            url: "<?php echo site_url('message/message_master/data_cogs_edit/') ?>" + id,
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
                } else {
                    if (!req_status) {
                        $.ajax({
                            url: "<?php echo site_url('message/message_master/data_cogs_add/') ?>" + item + "/" + vendor,
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
                }
            }
        });
    </script>
</body>

</html>