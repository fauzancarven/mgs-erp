<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Required meta tags -->
   <meta charset="UTF-8">
   <meta name="mobile-web-app-capable" content="yes">
   <meta name="apple-mobile-web-app-title" content="omahbata">
   <meta name="theme-color" content="#42b549">
   <meta name="page-type" content="productdetailpage-desktop" data-rh="true">
   <meta name="title" content="Omahbata Indonesia - Enterprise Resource Planning"" data-rh=" true">
   <meta name="description" content="Transaksi Atas nama <?= $_customer ?>" data-rh="true">

   <meta name="twitter:card" content="product" data-rh="true">
   <meta name="twitter:site" content="@omahbata" data-rh="true">
   <meta name="twitter:creator" content="@omahbata" data-rh="true">
   <meta name="twitter:title" content="Omahbata Indonesia - Enterprise Resource Planning" data-rh="true">
   <meta name="twitter:description" content="Transaksi atas nama <?= $_customer ?>" data-rh="true">
   <meta name="twitter:image" content="https://obi-system.com/asset/image/mgs-erp/logo.png" data-rh="true">
   <title>PO <?= $_customer ?></title>
   <style>
      @font-face {
         font-family: 'Poppins-bold';
         src: url('<?= base_url("asset/fontgoogle/poppins/Poppins-SemiBold.ttf") ?>');
      }

      @font-face {
         font-family: 'Poppins';
         src: url('<?= base_url("asset/fontgoogle/poppins/Poppins-Regular.ttf") ?>');
      }

      @font-face {
         font-family: 'Montserrat';
         src: url('<?= base_url("asset/fontgoogle/Montserrat/Montserrat-Bold.ttf") ?>');
      }

      @font-face {
         font-family: 'Montserrat-reg';
         src: url('<?= base_url("asset/fontgoogle/Montserrat/Montserrat-Medium.ttf") ?>');
      }

      @page {
         margin: 0.75em
      }


      header {
         position: relative;
         display: block;
         margin-top: 10px;
      }

      header .logo-lama {
         position: absolute;
         top: -10px;
      }

      header .judul-lama {
         position: absolute;
         font-size: 0.85rem;
         font-weight: bold;
         top: 40px;
         right: 0px;
         border: 1.2px solid black;
         padding: 0.25rem;
      }

      header .cetak-lama {
         position: absolute;
         top: 5px;
         right: 0px;
         font-size: 0.75rem;
      }


      header .logo {
         position: absolute;
         width: 120px;
         left: 5px
      }


      header .store {
         position: absolute;
         font-family: 'Montserrat';
         width: 120px;
         top: 52px;
         width: 120px;
         left: 5px;
         text-align: center;
         font-size: 0.65rem;
         color: #d5582a;
      }

      header .store-info {
         top: 5px;
         letter-spacing: 1px;
         position: relative;
         font-family: 'Montserrat';
         font-size: 0.6rem;
         position: absolute;
         left: 135px;
         right: 200px;
         justify-content: space-around;
         line-height: 0.85;
         color: #222222;
      }

      .address {
         position: absolute;
         top: 0px;
         left: 0px;
         line-height: 1;
      }

      .email {
         position: absolute;
         top: 30px;
         left: 20px;
      }

      .icon-email {
         position: absolute;
         background: #d5582a;
         height: 13px;
         width: 13px;
         top: 30px;
         border-radius: 6px;
      }

      .icon-email img {
         margin: 3px;
         width: 7px;
         height: 7px;
      }

      .telp {
         position: absolute;
         top: 45px;
         left: 20px;
      }

      .icon-telp {
         position: absolute;
         background: #d5582a;
         height: 13px;
         width: 13px;
         top: 45px;
         border-radius: 6px;
      }

      .icon-telp img {
         margin: 3px;
         width: 7px;
         height: 7px;
      }

      .instagram {
         position: absolute;
         top: 30px;
         left: 280px;
      }

      .icon-instagram {
         position: absolute;
         background: #d5582a;
         height: 13px;
         width: 13px;
         top: 30px;
         left: 260px;
         border-radius: 6px;
      }

      .icon-instagram img {
         margin: 3px;
         width: 7px;
         height: 7px;
      }

      .website {
         position: absolute;
         top: 45px;
         left: 280px;
      }

      .icon-website {
         position: absolute;
         background: #d5582a;
         height: 13px;
         width: 13px;
         top: 45px;
         left: 260px;
         border-radius: 6px;
      }

      .icon-website img {
         margin: 3px;
         width: 7px;
         height: 7px;
      }

      .icon-telp {
         position: absolute;
         background: #d5582a;
         height: 13px;
         width: 13px;
         top: 45px;
         border-radius: 6px;
      }

      header .judul {
         position: absolute;
         font-size: 0.85rem;
         font-weight: bold;
         top: 50px;
         right: 85px;
         border: 1.2px solid black;
         padding: 0.25rem;
      }

      header .cetak {
         position: absolute;
         top: 5px;
         right: 85px;
         font-size: 0.75rem;
      }

      header .barcode {
         position: absolute;
         top: 0px;
         right: 0px;
         width: 80px
      }

      header .grid-1 {
         top: 80.5px;
         left: 5px;
         position: absolute;
         height: 6px;
         width: 120px;
         background: #d5582a;
         z-index: 1;
      }

      header .grid-2 {
         top: 82px;
         left: 5px;
         position: absolute;
         height: 3px;
         width: 100%;
         background: #67432b;
      }


      .center {
         margin-left: auto;
         margin-right: auto;
      }

      table th {
         border-top: 1px solid black;
         border-bottom: 1.5px solid black;
         margin: 0px;
         font-size: 12px
      }

      .content {
         display: block;
         padding-top: 100px;
         padding-bottom: 5px;
      }

      .content>.customer {
         display: inline-block;
         width: 60%;
         background: green;
         padding: 0.5rem 0.25rem;
      }

      .content>.dokument {
         align-content: flex-start;
         width: 38%;
         display: inline-block;
         margin-top: 0;
         background: green;
      }

      .row {
         display: block;
      }

      .col {
         display: inline-block;
         font-size: 13px
      }

      .col.header-col {
         width: 4rem;
      }

      .item {
         width: 100%; 
      }

      .footer {
         width: 100%; 
      }

      ol {
         padding-left: 1.8em;
         margin-top: 0;
      }

      ol li {

         text-align: justify;
      }
   </style>
</head>

<body>
   <?= $_header ?>
   <div class="content">
      <table style="width: 100%;margin-top:0px">
         <tr>
            <td align="left" valign="top" style="width:60%;font-size:13px;">
               <div style="width:90%;border-bottom:1px solid black;">Customer</div>
               <table style="width: 100%;margin-top:0px;border-collapse: collapse;">
                  <tr>
                     <td align="left" valign="top" style="width:20%;font-size:13px;">Nama </td>
                     <td align="left" valign="top" style="width:2%;font-size:13px;">:</td>
                     <td align="left" valign="top" style="width:78%;font-size:13px;"><?= $_customer ?></td>
                  </tr>
               </table>
               <table style="width: 100%;margin-top:0px;border-collapse: collapse;">
                  <tr>
                     <td align="left" valign="top" style="width:20%;font-size:13px;">Admin </td>
                     <td align="left" valign="top" style="width:2%;font-size:13px;">:</td>
                     <td align="left" valign="top" style="width:78%;font-size:13px;"><?= $_admin ?></td>
                  </tr>
               </table>
               <table style="width: 100%;margin-top:0px;border-collapse: collapse;">
                  <tr>
                     <td align="left" valign="top" style="width:20%;font-size:13px;">Keterangan </td>
                     <td align="left" valign="top" style="width:2%;font-size:13px;">:</td>
                     <td align="left" valign="top" style="width:78%;font-size:13px;"><?= $_data->PORemarks ?></td>
                  </tr>
               </table>
            </td>
            <td align="left" valign="top" style="width:40%;font-size:13px">
               <div style="width:90%;border-bottom:1px solid black">Dokument</div>
               <table style="width: 100%;margin-top:0px;border-collapse: collapse;">
                  <tr>
                     <td align="left" valign="top" style="width:20%;font-size:13px;">No. Doc. </td>
                     <td align="left" valign="top" style="width:2%;font-size:13px;">:</td>
                     <td align="left" valign="top" style="width:78%;font-size:13px;"><?= $_data->POCode ?></td>
                  </tr>
                  <tr>
                     <td align="left" valign="top" style="width:20%;font-size:13px;">No. Inv. </td>
                     <td align="left" valign="top" style="width:2%;font-size:13px;">:</td>
                     <td align="left" valign="top" style="width:78%;font-size:13px;"><?= $_data->SalesCode ?></td>
                  </tr>
                  <tr>
                     <td align="left" valign="top" style="width:20%;font-size:13px;">Tgl. </td>
                     <td align="left" valign="top" style="width:2%;font-size:13px;">:</td>
                     <td align="left" valign="top" style="width:78%;font-size:13px;"><?= date("d F Y", strtotime($_data->PODate)) ?></td>
                  </tr>
                  <tr>
                     <td align="left" valign="top" style="width:20%;font-size:13px;">Vendor</td>
                     <td align="left" valign="top" style="width:2%;font-size:13px;">:</td>
                     <td align="left" valign="top" style="width:78%;font-size:13px;"><?= $_data->MsVendorCode . " - " . $_data->MsVendorName ?></td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
   </div> 
   <div class="item">
      <table class="center" style="width: 100%;border-collapse: collapse;border-bottom: 1px solid black;margin-right:20px">

         <?php  
         $no = 0;
         $data = "";
         foreach ($_item as $rowsitem) { 
            $data_split_var =  explode("|",$rowsitem->PODetailVarian);
            $varian = "";
            foreach($data_split_var as $row1){
               $data_split_var_row =  explode(":",$row1);
               $varian .= $data_split_var_row[1]." | ";
            }
            $no++;
            $data .=      '
               <tr style="font-size:13px;vertical-align: top;" >
                  <td style="text-align:center;width:20px">' . $no . '</td> 
                  <td style="width:220px"><span style="font-size:13px">' . $rowsitem->MsProdukCode . '-' . $rowsitem->MsProdukName . '<span></td>
                  <td style="width:100px"><span style="font-size:13px;">' . rtrim($varian," | ") . '</span></td>
                  <td style="width:30px;padding-right:5px;font-size:13px;text-align: right;">' . number_format($rowsitem->PODetailQty, 2) . '</td>
                  <td style="width:30px;"><span style="font-size:13px;">' . $rowsitem->SatuanName . '</span></td>'; 
            $data .= '</tr>';
         } 
         echo ' 
         <tr>
            <th style="text-align:center;">No.</th> 
            <th style="text-align:left;">Nama Item</th>
            <th style="text-align:left;">Varian</th>
            <th style="text-align:right;">Qty</th>
            <th style="text-align:left;">Satuan</th> 
         </tr>' . $data;
         ?>
      </table>
   </div>
   <div class="footer"> 
      <table style="width: 100%;margin:5px;margin-top:0px">
         <tr>
            <td align="left" valign="top" style="width:70%;font-size:12px">
            </td>
            <td align="left" valign="top" style="width:30%;font-size:13px">
               <table style="width: 100%;margin-left:10px;margin-top:0px">
                  <tr>
                     <td align="center" valign="top" style="width:50%;border:0.5px solid black;text-decoration: underline;height:80px">Admin</td>
                     <td align="center" valign="top" style="width:50%;border:0.5px solid black;text-decoration: underline;height:80px">Penerima</td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
   </div>
</body>

</html>