<?php
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if (!empty($_POST['companyName']) && $_POST['companyName']) {
    $invoice->saveInvoice($_POST);
    header("Location:invoice_list.php");
}
?>
<title>SOCHEF</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<div class="container content-invoice">
    <h2 class="title">Herrajes & Tiraderas</h2>
    <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate> 
        <div class="load-animate animated fadeInUp">
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <?php include('menu.php'); ?>	
                </div>		    		
            </div>
            <input id="currency" type="hidden" value="$">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <h3>Invoice emitter: </h3>
                    <h4>
                    <?php echo "<b> User: </b>", $_SESSION['user']; ?><br>	
                    <?php echo "<b> Address: </b>", $_SESSION['address']; ?><br>	
                    <?php echo "<b> Mobile number: </b>", $_SESSION['mobile']; ?><br>
                    <?php echo "<b> Email: </b>", $_SESSION['email']; ?><br>
                    </h4>
                </div>      		
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                    <h3>To: </h3>
                    <div class="form-group">
                        <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"></textarea>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table" id="invoiceItem">	
                        <thead>
                            <tr>
                                <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                <th width="15%">Prod ID</th>
                                <th width="53%">Product Name</th>
                                <th width="15%">Price</th>
                                <th width="15%">Stock</th>								
                        
                            </tr>	
                        </thead>						
                       <?php
                            $productList = $invoice->get_product_table();
                            foreach($productList as $product){
                                echo '
                                <tr>
                                <td>' . $product["id_producto"] . '</td>
                                <td>' . $product["nombre_prod"] .'</td>
                                <td>' . $product["precio"] .'</td>
                                <td>' . $product["cantidad_disponible"] .'</td>
                                </tr>
                                ';
                            }
                       ?>					
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered table-hover" id="invoiceItem">	
                        <tr>
                            <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                            <th width="15%">Prod. N</th>
                            <th width="38%">Product Name</th>
                            <th width="15%">Quantity</th>
                            <th width="15%">Price</th>								
                            <th width="15%">Total</th>
                        </tr>							
                        <tr>
                            <td><input class="itemRow" type="checkbox"></td>
                            <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
                            <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>			
                            <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                            <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                            <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                        </tr>						
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                    <button class="btn btn-success" id="addRows" type="button">+ More Items</button>
                </div>
            </div>
            <div class="row">	
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <h3>Notes: </h3>
                    <div class="form-group">
                        <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Notas"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
                        <input data-loading-text="Saving invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">						
                    </div>

                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <span class="form-inline">
                        <div class="form-group">
                            <label>Subtotal: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tax Rate: &nbsp;</label>
                            <div class="input-group">
                                <input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
                                <div class="input-group-addon">%</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tax Amount: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
                            </div>
                        </div>							
                        <div class="form-group">
                            <label>Total After Tax: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total After Tax">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Amount Paid: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Amount Due: &nbsp;</label>
                            <div class="input-group">
                                <div class="input-group-addon currency">$</div>
                                <input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
                            </div>
                        </div>
                    </span>
                </div>
            </div>
            <div class="clearfix"></div>		      	
        </div>
    </form>			
</div>
</div>	