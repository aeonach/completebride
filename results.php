---
layout: default
---


{% raw %}
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
?> :{% endraw %}   
    <br />

    <section class="container">
        <div class="row">
            
            <div class="col-md-4">
              <div class="pv-30 ph-20 white-bg feature-box bordered text-center">  
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <h1 class="title space-top logo-font text-center text-default">Your Booking</h1>
                    </div>
                    <div class="panel-body result-page">
                        <div class="json-result">
                        Full JSON Result<hr />
                        <code>
                        {% raw %}    <?= isset($product_list) ? $product_list : '' ?> {% endraw %}
                        </code>
                            </div>
                        
                        <hr />
                        {% raw %}   <?= isset($result_html) ? $result_html : '' ?> {% endraw %}
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-8">
            <h1 class="title space-top logo-font text-center text-default">Confirm your booking.</h1>
            <hr />
                <div class="full-text-container border-clear light-gray-bg">
                    <br />
                    <div class="separator-2 hidden-lg-down"></div>
<ul class="list-icons">
<li><i class="icon-check-1"></i>Check the panel on the left to ensure that the booking is correct.</li><br>
<li><i class="icon-check-1"></i>If you need to make any changes please use your browser "Back" button. After any alterations "Checkout" again.</li><br>
<li><i class="icon-check-1"></i>In order to confirm this booking you must leave a £25 deposit using the Worldpay link below. Remember we don not take any credit card details these are handled securely by Worldpay. </li><br>
<li><i class="icon-check-1"></i>We aim to send you a confirmation email within 48hrs and then or soon after we will also confirm the time of your booking based upon the location and wedding time you have supplied.</li>
</ul>          
          <div class="separator-2 hidden-lg-down"></div>
        </div>
                
    
               
                    <form action="https://secure-test.worldpay.com/wcc/purchase" method="post">
                        <div class="sc-product-item container"> 
                                    <div class="grid row">
                                        
                                        <input type="hidden" name="testMode" value="100">

                                        <input type="hidden" name="instId" value="1154619">
                                        <input type="hidden" name="name" value="AUTHORISED">
                                        <input type="hidden" name="cartId" value="Deposit">
                                        <input type="hidden" name="amount" value="25.00">
                                        <input type="hidden" name="currency" value="GBP">
                                    
                                        
                                        <div class="price col-md-6 col-sm-12">
                                            <h2 class="title text-center">Deposit: £25.00</h2>
                                            
                                            
                                        </div> 
                                        <div class="form-group2 add-to-cart col-md-6 col-sm-12">
                                           
                                          <input class="add-on-bookings sc-add-to-cart btn btn-default pull-right" type=submit value="Confirm Now">  
                                        </div>
                                </div>
                      </div>
</form>
                
            </div>
        
        </div>
    </section>    

