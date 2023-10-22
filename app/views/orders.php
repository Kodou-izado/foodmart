<?php
  include './config/init.php';
  $title = 'Orders';
  include 'partials/_header.php';
  include 'partials/_loader.php';
  include 'partials/_toast.php';
  include 'partials/_modal.php';

  use App\Utils\Utilities;

  Utilities::redirectUnauthorize();
?>
  <div class="min-h-screen bg-white pt-[5rem] md:pt-[6rem] pb-[6rem] md:pb-0">
    <?php include 'partials/_nav.php' ?>

    <div class="search-wrapper flex w-[min(25rem,90%)] h-14 fixed top-20 left-1/2 -translate-x-1/2 bg-white items-center px-8 rounded-full shadow-md searchbar z-[12]">
      <input type="text" placeholder="Search here." id="table-search" autocomplete="off" class="w-full text-xs text-slate-400 placeholder:text-slate-400 outline-none">
      <img src="<?php echo SYSTEM_URL ?>/public/icons/search-normal-linear.svg" alt="search" class="w-4">
    </div>  

    <section class="w-[min(60rem,90%)] mx-auto">
      <div class="flex justify-between gap-2 mb-4">
        <div class="filter w-[13rem] h-12 relative flex items-center justify-between bg-gray-100 px-6 rounded-full cursor-pointer z-[8]">
          <p class="filter-name text-[10px] md:text-xs text-slate-500 font-medium">
            Apply filters
          </p>
          <img src="<?php echo SYSTEM_URL ?>/public/icons/arrow-down-linear.svg" alt="arrow down" class="w-3 md:w-4" >

          <div class="filter-dropdown absolute inset-x-0 bg-white shadow-md rounded-2xl p-1">
            <li class="filter-option order-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="">
              Clear filters
            </li>
            <li class="filter-option order-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="Pending">
              Pending
            </li>
            <li class="filter-option order-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="Confirmed">
              Confirmed
            </li>
            <li class="filter-option order-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="Completed">
              Completed
            </li>
            <li class="filter-option order-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="Cancelled">
              Cancelled
            </li>
          </div>
        </div>
      </div>

      <div class="min-h-[65vh] overflow-x-auto lg:overflow-auto">
        <table class="w-full whitespace-nowrap text-[12px] text-center">
          <thead class="font-medium text-dark-gray">
            <th class="bg-gray-100 py-6 px-3">Order No.</th>
            <th class="bg-gray-100 py-6 px-3">Fullname</th>
            <th class="bg-gray-100 py-6 px-3">Order Type</th>
            <th class="bg-gray-100 py-6 px-3">Payment Method</th>
            <th class="bg-gray-100 py-6 px-3">Delivery Address</th>
            <th class="bg-gray-100 py-6 px-3">Status</th>
            <th class="bg-gray-100 py-6 px-3">Actions</th>
          </thead>
          <tbody>
            <?php 
              foreach($order->get() as $order): 
                if($order->status == "Pending"){
                  $style = 'bg-orange-100 text-orange-500';
                } elseif($order->status == "Confirmed"){
                  $style = 'bg-teal-100 text-teal-500';
                } elseif($order->status == "Completed"){
                  $style = 'bg-emerald-100 text-emerald-500';
                } else {
                  $style = 'bg-red-100 text-red-500';
                }
            ?>
              <tr 
                class="search-area order-row hover:bg-gray-50 odd:bg-white even:bg-gray-50 transition-all cursor-pointer" 
                data-value="<?= $order->order_id ?>"
              >
                <td class="finder1 py-4 px-3">
                  <?= $order->order_no ?>
                </td>
                <td class="finder2 py-4 px-3">
                  <?= $order->fullname ?>
                </td>
                <td class="finder3 py-4 px-3">
                  <?= $order->order_type ?>
                </td>
                <td class="finder4 py-4 px-3">
                  <?= $order->payment_method ?>
                </td>
                <td class="finder5 py-4 px-3">
                  <?= $order->delivery_address == "" ? 'Not Applicable' : $order->delivery_address ?>
                </td>
                <td class="py-4 px-3">
                  <span class="finder6 <?= $style ?> font-semibold py-2 px-3 rounded-full pointer-events-none">
                    <?= $order->status ?>
                  </span>
                </td>
                <td class="flex justify-center items-center gap-1 py-4 px-3">
                <?php if($order->payment_method == "GCash"){ ?>
                  <button class="receipt-btn hover:bg-gray-100 py-2 px-2 rounded-full transition-all shrink-0" title="GCash Payment Receipt" data-value="<?= $order->order_id ?>">
                    <img src="<?php echo SYSTEM_URL ?>/public/icons/receipt-2-linear.svg" alt="receipt" class="w-4 pointer-events-none">
                  </button>
                <?php } ?>
                  <button class="status-btn relative text-[10px] font-semibold text-dark-gray bg-gray-100 py-2 px-3 rounded-full group/status">
                    Change Status
  
                    <div class="absolute top-1/2 -translate-y-1/2 right-[90%] group-hover/status:right-[105%] w-max flex  bg-white shadow-lg transition-all invisible group-hover/status:visible opacity-0 group-hover/status:opacity-100 z-[5]">
                      <span class="status-option block py-2 px-3 hover:bg-gray-100 transition-all" data-value="<?= $order->order_id ?>">Pending</span>
                      <span class="status-option block py-2 px-3 hover:bg-gray-100 transition-all" data-value="<?= $order->order_id ?>">Confirmed</span>
                      <span class="status-option block py-2 px-3 hover:bg-gray-100 transition-all" data-value="<?= $order->order_id ?>">Completed</span>
                      <span class="status-option block py-2 px-3 hover:bg-gray-100 transition-all" data-value="<?= $order->order_id ?>">Cancelled</span>
                    </div>
                  </button>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- <div class="flex items-center justify-center sm:justify-between mt-6">
        <p class="hidden sm:block text-xs text-slate-500 font-medium">
          Showing 1 of 10
        </p>
        <ul class="flex items-center gap-3 text-xs text-slate-500 font-medium">
          <li>
            <a href="#" class="bg-gray-100 py-2 px-3 rounded-full">Prev</a>
          </li>
          <li>
            <a href="#" class="bg-primary text-white py-2 px-3 rounded-full">1</a>
          </li>
          <li>
            <a href="#" class="bg-gray-100 py-2 px-3 rounded-full">2</a>
          </li>
          <li class="bg-gray-100 py-2 px-3 rounded-full">
            ..
          </li>
          <li>
            <a href="#" class="bg-gray-100 py-2 px-3 rounded-full">10</a>
          </li>
          <li>
            <a href="#" class="bg-gray-100 py-2 px-3 rounded-full">Next</a>
          </li>
        </ul>
      </div> -->
    </section>
  </div>

<?php include 'partials/_footer.php' ?>