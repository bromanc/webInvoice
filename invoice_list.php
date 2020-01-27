<?php
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>

<title>SOCHEF</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<div class="container">		
    <h2 class="title">Herrajes & Tiraderas</h2>
    <?php include('menu.php'); ?>			  
    <table id="data-table" class="table table-condensed table-striped">
        <thead>
            <tr>
                <th width="7%">Invoice N.</th>
                <th width="15%">Date</th>
                <th width="35%">Client</th>
                <th width="15%">Total Invoice</th>
                <th width="3%"></th>
                <th width="3%"></th>
                <th width="3%"></th>
            </tr>
        </thead>
        <?php
        $invoiceList = $invoice->getInvoiceList();
        foreach ($invoiceList as $invoiceDetails) {
            $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
            echo '
      <tr>
        <td>' . $invoiceDetails["order_id"] . '</td>
        <td>' . $invoiceDate . '</td>
        <td>' . $invoiceDetails["order_receiver_name"] . '</td>
        <td>' . $invoiceDetails["order_total_after_tax"] . '</td>
        <td><a href="print_invoice.php?invoice_id=' . $invoiceDetails["order_id"] . '" title="Print invoice"><div class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></div></a></td>
        <td><a href="edit_invoice.php?update_id=' . $invoiceDetails["order_id"] . '"  title="Edit invoice"><div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div></a></td>
        <td><a href="#" id="' . $invoiceDetails["order_id"] . '" class="deleteInvoice"  title="Delete invoice"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
      </tr>';
        }
        ?>
    </table>	
</div>