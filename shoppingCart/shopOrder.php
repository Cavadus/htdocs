<?php
  #Start the Session
  session_start();

#Create an array for shopping cart if it doesn't already exist
  if(!isset($_SESSION['SHOPPING_CART'])) {
    $_SESSION['SHOPPING_CART']=array();
  }

#Add an item only if we have all three pieces of information: name, price, qty
  if ((isset($_GET['add'])) && (isset($_GET['price'])) && (isset($_GET['qty']))) {
    #Adding an item, store it in array
    $ITEM = array(
      'Name' => $_GET['add'],
      'Price' => $_GET['price'],
      'Quantity' => $_GET['qty']
    );

    #Add this item to shopping cart
    $_SESSION['SHOPPING_CART'][] = $ITEM;

    #Clear the URL variables
    header('Location: ' . $_SERVER['PHP_SELF']);
  }

#If user clicks remove
  elseif (isset($_GET['remove'])) {

    #Remove item from cart
    unset($_SESSION['SHOPPING_CART'][$_GET['remove']]);

    #Reorganize the cart and clear the URL variables
    header('Location: ' . $_SERVER['PHP_SELF']);
  }

#If user clicks empty button to empty cart
  elseif (isset($_GET['empty'])) {

    #Clear the cart by destroying all session data
    session_destroy();

    #Clear the URL variables
    header('Location: ' . $_SERVER['PHP_SELF']);
  }

  #If user clicks update button to update cart
  elseif (isset($_GET['update'])) {

    #Update quantity for all items
    foreach ($_GET['items_qty'] as $itemID => $qty) {

      #If the quantity is 0 remove it from the cart
      if ($qty == 0) {
        #Remove item from cart
        unset($_SESSION['SHOPPING_CART'][$itemID]);
      }

      #If quantity is more than 1, update to new quantity
      elseif ($qty >= 1) {
        #Update to the new quantity
        $_SESSION['SHOPPING_CART'][$itemID]['Quantity'] = $qty;
      }
    }

    #Clear POST variable
    header('Location: ' . $_SERVER['PHP_SELF']);
  }
?>

<html>
  <body>
    <form action="" method="get" name="shoppingcart">
      <?php
        #Turn on output buffering
        ob_start();
       ?>

       <table width="500" border="1">
         <tr>
           <td width="74">&nbsp;</td>
           <td width="111" align="center">Item</td>
           <td width="95" align="center">Unit Price</td>
           <td width="85" align="center">Quantity</td>
           <td width="101" align="center">Cost</td>
         </tr>

         <?php #Print all items in shopping cart
          foreach ($_SESSION['SHOPPING_CART'] as $itemNumber => $item) {
          ?>

          <tr id="item <?php echo $itemNumber; ?>">
            <td><a href="?remove=<?php echo $itemNumber; ?>">Remove</a></td>
            <td align="center"><?php echo $item['Name']; ?></td>
            <td align="center"><?php echo $item['Price']; ?></td>
            <td align="center"><input name="items_qty[<?php echo $itemNumber; ?>]"
                                type="text"
                                id="item<?php echo $itemNumber; ?>_qty"
                                value="<?php echo $item['Quantity']; ?>"
                                size="2"
                                maxlength="3" /></td>
            <td><?php echo $item['Quantity'] * $item['Price']; ?></td>
          </tr>
          <?php } ?>
        </table>
        <?php #Outputs the content of the internal buffer to $_SESSION['SHOPPING_CART_HTML']
        $_SESSION['SHOPPING_CART_HTML'] = ob_get_flush(); ?>
        <p>
          <label>
              <input type="submit" name="update" id="update" value="Update Cart" />
          </label>
        </p>
    </form>

    <a href="shopIndex.php">Keep Shopping</a><br>
    <a href="?empty">Empty Cart</a>

  </body>
</html>
