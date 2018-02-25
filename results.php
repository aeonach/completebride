<!DOCTYPE html>
<html>
<head>
    <title>Smart Cart - jQuery Shopping Cart Plugin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include Bootstrap CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
 <style>
     .json-result {
         display: none; 
     }
    
    
    
    </style>  
    
</head>
<body>

<?php
// Get the results as JSON string
$product_list = filter_input(INPUT_POST, 'cart_list');
// Convert JSON to array
$product_list_array = json_decode($product_list);

$result_html = '';
if($product_list_array) {
    foreach($product_list_array as $p){
        foreach($p as $key=>$value) {
            //var_dump($key, $value);
            $result_html .= $key.": ".$value."<br />";
        }
        $result_html .= '------------------------------------------<br />';
    }
} else {	
	$result_html .= "<strong>Cart is Empty</strong>";
}
?>
<?php
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1';

mail ('davecolquhoun@mac.com', 'New Booking', $result_html, $headers );
?>    
    <br />
    <section class="container">
        <div class="row">
            
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cart Products
                    </div>
                    <div class="panel-body">
                        <div class="json-result">
                        Full JSON Result<hr />
                        <code>
                            <?= isset($product_list) ? $product_list : '' ?>
                        </code>
                            </div>
                        <br /><br />
                        Booking List<hr />
                        <?= isset($result_html) ? $result_html : '' ?>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
            <h1>Checkout</h1>
            
            </div>
        
        </div>
    </section>    
</body>
</html>
