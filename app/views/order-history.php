<?php
  include './config/init.php';
  $title = 'Order History';
  include 'partials/_header.php';
  include 'partials/_loader.php';
  include 'partials/_toast.php';
  include 'partials/_modal.php';

  use App\Utils\Utilities;

  Utilities::redirectUnauthorize();
?>
  <div class="min-h-screen bg-white py-[5rem]">
    <?php 
      include 'partials/_nav.php';
      include 'partials/_search.php';
    ?>

    <section class="w-[min(60rem,90%)] mx-auto">
      <?php if(count($order->get()) > 0){ ?>
        <div class="w-[min(40rem,100%)] bg-white rounded-2xl mx-auto">
          <?php 
            foreach($order->get() as $index => $order): 
              $total_payment = 0;
              $helper->query(
                'SELECT * FROM `order_items` o LEFT JOIN `menus` m ON o.menu_id=m.menu_id WHERE o.order_id = ? ORDER BY o.id DESC',
                [$order->order_id]
              );

              $order_items = $helper->fetchAll();

              foreach($order_items as $order_item){
                $total_payment += $order_item->menu_price * $order_item->quantity;
              }
          ?>
            <div class="search-area order-history p-6 rounded-2xl cursor-pointer group/order hover:bg-gray-50 transition-all mb-2 <?= $index == 0 ? 'show-details' : '' ?>">
              <div class="flex flex-wrap items-center justify-between gap-4 group-[.show-details]/order:mb-6 pointer-events-none">
                <div class="flex items-center gap-4">
                  <div class="<?= Utilities::getStatusColor($order->status) ?> h-fit p-4 rounded-2xl">
                    <img src="<?php echo SYSTEM_URL ?>/public/icons/receipt-bold.svg" alt="icon" class="w-4 sm:w-auto">
                  </div>
                  <div>
                    <p class="finder1 text-sm sm:text-base text-dark-gray font-semibold mb-1">
                      <?= $order->order_no ?>
                    </p>
                    <p class="finder2 text-[10px] sm:text-xs text-slate-500">
                      <?= Utilities::formatDate($order->date_added, 'dt') ?>
                    </p>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <span class="finder3 text-[8px] md:text-[10px] text-white font-semibold h-fit py-2 px-4 <?= Utilities::getStatusColor($order->status) ?> rounded-full">
                    <?= $order->status ?>
                  </span>

                  <?php if ($order->status == 'Pending') : ?>
                    <button type="button" class="cancel-order-btn text-[8px] md:text-[10px] text-red-500 font-semibold border border-red-500 py-[7px] px-4 rounded-full pointer-events-auto" data-value="<?= $order->order_id ?>">Cancel Order</button>
                  <?php endif ?>
                </div>
              </div>
              <div class="hidden group-[.show-details]/order:block">
                <div class="flex flex-wrap gap-6 md:gap-8 mb-6">
                  <div>
                      <p class="text-[11px] sm:text-xs text-dark-gray font-semibold mb-2">Payment Method</p>
                    <div class="flex items-center gap-3">
                    <?php if($order->payment_method == "GCash"){ ?>
                      <img src="<?php echo SYSTEM_URL ?>/public/image/gcash.png" alt="gcash" class="w-4 sm:w-6">
                    <?php } ?>
                      <p class="finder4 text-[10px] sm:text-xs text-slate-500 font-medium">
                        <?= $order->payment_method ?>
                      </p>
                    </div>
                  </div>
                  <div>
                    <p class="text-[12px] sm:text-xs text-dark-gray font-semibold mb-2">Order Type</p>
                    <p class="finder5 text-[10px] sm:text-xs text-slate-500 font-medium">
                      <?= $order->order_type ?>
                    </p>
                  </div>
                  <div>
                    <p class="text-[12px] sm:text-xs text-dark-gray font-semibold mb-2">Total Payment</p>
                    <p class="finder6 text-[10px] sm:text-xs text-slate-500 font-medium">
                      ₱ <?= $total_payment ?>.00
                    </p>
                  </div>
                </div>
                <p class="text-[11px] sm:text-xs text-dark-gray font-semibold mb-3">Orders</p>
                <?php foreach($order_items as $order_item):  ?>
                  <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                      <div class="w-12 sm:w-16 h-12 sm:h-14 flex justify-center">
                        <img src="<?php echo SYSTEM_URL ?>/uploads/menu/<?= $order_item->menu_id ?>.png" alt="<?= $order_item->menu_name ?>" class="h-10 sm:h-14">
                      </div>
                      <div>
                        <p class="text-xs sm:text-sm text-dark-gray font-semibold mb-1">
                          <?= $order_item->menu_name ?>
                        </p>
                        <p class="text-[10px] sm:text-xs text-slate-500">
                          ₱ <?= $order_item->menu_price ?>.00 x <?= $order_item->quantity ?>
                        </p>
                      </div>
                    </div>
                    <p class="text-[10px] sm:text-xs text-dark-gray font-semibold">
                      ₱ <?= $order_item->menu_price * $order_item->quantity ?>.00
                    </p>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      <?php } else { ?>
        <div class="min-h-[76vh] grid place-items-center">
          <div class="text-center">
            <img src="<?php echo SYSTEM_URL ?>/public/icons/Order_History_Empty.svg" alt="empty" class="w-[100px] mx-auto mb-2">
            <p class="text-xs text-slate-500 font-medium mb-10">No order history yet</p>
            <a href="<?php echo SYSTEM_URL ?>/menu" class="bg-primary text-xs font-semibold text-white py-5 px-8 rounded-full">Go to Menu</a>
          </div>
        </div>
      <?php } ?>
    </section>
  </div>

<?php include 'partials/_footer.php' ?>