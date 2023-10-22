<?php
  include './config/init.php';
  $title = 'Shopping Cart';
  include 'partials/_header.php';
  include 'partials/_loader.php';
  include 'partials/_toast.php';

  use App\Utils\Utilities;

  Utilities::redirectUnauthorize();

  $helper->query("SELECT * FROM `settings` LIMIT 1");
  $setting_data = $helper->fetch();
?>
  <div class="order-success">
    <div>
      <img src="<?php echo SYSTEM_URL ?>/public/icons/tick-circle-bold.svg" alt="success" class="order-success-animate translate-y-8 w-20 mb-4 mx-auto opacity-0 transition-all ease-linear duration-300 delay-100">
      <p class="order-success-animate translate-y-8 text-sm font-semibold text-white text-center mb-6 opacity-0 transition-all ease-linear duration-300 delay-100">
        Thank you for ordering. <br> We are now processing your order.
      </p>
      <button class="okay-btn order-success-animate translate-y-8 block bg-white text-xs text-emerald-500 font-semibold py-3 px-8 rounded-full uppercase mx-auto opacity-0 transition-all ease-linear duration-300 delay-100">
        Okay
      </button>
    </div>
  </div>
  <div class="min-h-screen bg-white pt-[5rem] md:pt-[6rem] pb-[6rem] md:pb-[3rem]">
    <?php include 'partials/_nav.php' ?>

    <div class="flex w-[min(25rem,90%)] h-14 fixed top-20 left-1/2 -translate-x-1/2 bg-white items-center px-8 rounded-full shadow-lg searchbar">
      <input 
        type="text" 
        placeholder="Search here."
        id="search" 
        autocomplete="off"
        class="w-full text-xs text-slate-400 placeholder:text-slate-400 outline-none"
      >
      <img 
        src="<?php echo SYSTEM_URL ?>/public/icons/search-normal-linear.svg" 
        alt="search"
        class="w-4"
      >
    </div>

    <section class="w-[min(60rem,90%)] mx-auto">
    <?php if(count($cart->get()) > 0){ ?>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <div>
          <p class="text-dark-gray font-semibold mt-4">
            Order Summary
          </p>
          <p class="text-xs text-slate-500 mb-6">
            Check your ordered items and select your prefer payment method
          </p>

        <?php
          $total_orders = 0;
          $amount_to_pay = 0;
          foreach($cart->get() as $cart_item): 
            $total_orders += $cart_item->quantity;
            $amount_to_pay += $cart_item->menu_price * $cart_item->quantity;
        ?>
          <div class="flex items-center mb-3">
            <div class="w-16 h-16 grid place-items-center bg-gray-100 p-2 rounded-2xl shrink-0">
              <img src="<?php echo SYSTEM_URL ?>/uploads/menu/<?= $cart_item->menu_id ?>.png" alt="<?= $cart_item->menu_name ?>" class="h-12">
            </div>
            <div class="ml-4">
              <p class="text-sm text-dark-gray font-semibold mb-1">
                <?= $cart_item->menu_name ?>
              </p>
              <p class="text-[10px] text-slate-500 font-medium">
                ₱ <?= $cart_item->menu_price ?> only
              </p>
            </div>
            <div class="flex items-center gap-4 ml-auto">
              <button class="subtract w-8 h-8 text-dark-gray font-bold bg-secondary rounded-full" data-value="<?= $cart_item->cart_id ?>">
                -
              </button>
              <p class="item-quantity text-sm text-dark-gray font-semibold">
                <?= $cart_item->quantity ?>
              </p>
              <button class="add w-8 h-8 text-dark-gray font-bold bg-secondary rounded-full" data-value="<?= $cart_item->cart_id ?>">
                +
              </button>
            </div>
          </div>
        <?php endforeach ?>
          <a href="<?php echo SYSTEM_URL ?>/menu" class="inline-block bg-gray-100 py-3 px-6 text-xs text-dark-gray font-semibold mt-6 rounded-full">
            Add more items
          </a>
          <div class="bg-gray-100 p-6 rounded-2xl mt-8">
            <div class="flex">
              <p class="text-xs text-slate-500 font-semibold">
                Total Orders :
              </p>
              <p class="text-xs text-dark-gray font-semibold ml-auto">
                <?php echo $total_orders ?>
              </p>
            </div>
            <div class="flex mt-3">
              <p class="text-xs text-slate-500 font-semibold">
                Amount to Pay : 
              </p>
              <p class="text-xs text-dark-gray font-semibold ml-auto">
                ₱ <?php echo $amount_to_pay ?>.00
              </p>
            </div>
          </div>
        </div>
        <div>
          <p class="text-dark-gray font-semibold mt-4">
            Payment Details
          </p>
          <p class="text-xs text-slate-500 mb-6">
            Complete your order by providing your payment details order. 
          </p>
          <form id="cart-form" autocomplete="off">
            <label for="order_type" class="block text-xs text-dark-gray font-semibold mb-2">
              Order Type
            </label>
            <div class="mb-6">
              <input type="hidden" class="order-type-input" name="order_type">
              <div class="flex gap-3">
                <li class="order-type list-none bg-gray-100 text-[10px] font-medium py-3 px-5 rounded-full cursor-pointer transition-all">
                  Pick Up
                </li>
                <?php if($setting_data->is_delivery_available == 1){ ?>
                  <li class="order-type list-none bg-gray-100 text-[10px] font-medium py-3 px-5 rounded-full cursor-pointer transition-all">
                    Delivery
                  </li>
                <?php } ?>
              </div>
            </div>
            <div class="hidden delivery">
              <label for="delivery_address" class="block text-xs text-dark-gray font-semibold mb-2">
                Delivery Address
              </label>
              <input type="text" name="delivery_address" placeholder="Provide the delivery address." class="w-full h-12 text-xs text-slate-400 placeholder:text-slate-400 border-slate-400/60 border outline-none mb-6 rounded-full px-6">
            </div>
            <label for="payment method" class="block text-xs text-dark-gray font-semibold mb-2">
              Payment Method
            </label>
            <div>
              <input type="hidden" class="payment-input" name="payment_method">
              <div class="flex flex-wrap gap-3">
                <li class="payment-method list-none bg-gray-100 text-[10px] font-medium py-3 px-5 rounded-full cursor-pointer transition-all">
                  Over the Counter
                </li>
                <li class="payment-method list-none bg-gray-100 text-[10px] font-medium py-3 px-5 rounded-full cursor-pointer transition-all">
                  Cash on Delivery
                </li>
                <li class="payment-method list-none bg-gray-100 text-[10px] font-medium py-3 px-5 rounded-full cursor-pointer transition-all">
                  GCash
                </li>
              </div>
            </div>
            <div class="gcash-details hidden mt-4">
              <div class="block mb-6">
                <p class="text-xs text-slate-500 mb-2">
                  Send your gcash payment into this account
                </p>
                <div class="flex items-center gap-3">
                  <img src="<?php echo SYSTEM_URL ?>/public/image/gcash.png" alt="gcash" class="w-8">
                  <div>
                    <p class="text-sm text-dark-gray font-semibold">
                      <?php echo $setting_data->gcash_acc_name ?>
                    </p>
                    <input type="text" class="block account-num text-[10px] text-slate-500 outline-none" value="<?php echo $setting_data->gcash_acc_no ?>" disabled>
                  </div>
                  <button type="button" class="copy-btn bg-gray-100 p-2 ml-4 rounded-full text-[10px] text-dark-gray font-medium" title="copy">
                    <img src="<?php echo SYSTEM_URL ?>/public/icons/copy-linear.svg" alt="copy" class="w-4 pointer-events-none">
                  </button>
                </div>
              </div>
              <label for="paymentreceipt" class="block text-xs text-dark-gray font-semibold mb-2">
                Upload GCash Receipt
              </label>
              <div class="file-upload h-[20rem] relative bg-gray-100 rounded-md cursor-pointer">
                <input type="file" class="upload-input" name="gcash_receipt" hidden>
                <img src="" alt="menu image" class="preview-img w-full h-full object-contain" hidden>
                <div class="upload-icon absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-max">
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/gallery-add-bold.svg" alt="upload" class="w-8 mx-auto mb-2">
                  <p class="text-xs text-slate-500 font-semibold text-center">
                    Browse your device
                  </p>
                </div>
              </div>
            </div>
            <button type="submit" class="place-order text-sm text-white font-semibold bg-primary w-full h-14 mt-8 rounded-full">
              Place Order
            </button>
          </form>
        </div>
      </div>
    <?php } else { ?>
      <div class="min-h-[80vh] grid place-items-center rounded-md">
        <div class="text-center">
          <img src="<?php echo SYSTEM_URL ?>/public/icons/Cart_Empty.svg" alt="empty" class="w-[100px] mx-auto mb-2">
          <p class="text-xs text-slate-500 font-medium mb-10">
            Looks like your cart is empty.
          </p>
          <a href="<?php echo SYSTEM_URL.'/menu' ?>" class="bg-primary text-xs font-semibold text-white py-5 px-8 rounded-full">
            Go to Menu
          </a>
        </div>
      </div>
    <?php } ?>
    </section>
  </div>

<?php include 'partials/_footer.php' ?>