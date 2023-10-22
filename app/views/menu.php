<?php
  include './config/init.php';
  $title = 'Menu';
  include 'partials/_header.php';
  include 'partials/_loader.php';
  include 'partials/_toast.php';
  include 'partials/_modal.php';

  use App\Utils\Utilities;

  Utilities::redirectUnauthorize();
?>
  <div class="min-h-screen bg-white pt-[5rem] md:pt-[6rem] pb-[6rem] md:pb-[2rem]">
    <?php 
      include 'partials/_nav.php';
      include 'partials/_search.php';
    ?>

    <section class="w-[min(60rem,90%)] mx-auto">
    <?php if(Utilities::isCustomer()){   ?>
      <div class="flex md:hidden items-center gap-3 p-1 md:p-0 overflow-x-auto category-slider mb-3">
        <?php foreach($category->get() as $type): ?>
          <a href="<?= SYSTEM_URL.'/menu/'.strtolower($type->category_name).'' ?>" class="text-center bg-white gap-4 px-3 py-5 rounded-2xl shrink-0 border-gray-100 border-2">
            <div class="px-4 rounded-xl mb-1">
              <img src="<?php echo SYSTEM_URL ?>/uploads/category/<?= $type->category_id ?>.svg" alt="<?= $type->category_name ?>" class="w-6 mx-auto">
            </div>
            <p class="text-[12px] text-slate-600 font-medium leading-5">
              <?= $type->category_name ?>
            </p>
          </a>
        <?php endforeach ?>
      </div>
    <?php } ?>

    <?php if(Utilities::isAdmin()){   ?>
      <div class="flex justify-between gap-2 mb-4">
        <div class="filter w-[13rem] h-12 relative flex items-center justify-between bg-gray-100 px-6 rounded-full cursor-pointer z-[8]">
          <p class="filter-name text-[10px] md:text-xs text-slate-500 font-medium">
            Filter by categories
          </p>
          <img src="./public/icons/arrow-down-linear.svg" alt="arrow down" class="w-3 md:w-4">

          <div class="filter-dropdown absolute inset-x-0 bg-white shadow-md rounded-2xl p-1">
            <li class="filter-option menu-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="">
              <img src="./public/icons/cancel.svg" alt="cancel" class="w-6">
              Clear filter
            </li>
          <?php foreach($category->get() as $type): ?>
            <li class="filter-option menu-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="<?= $type->category_id ?>">
              <img src="./uploads/category/<?= $type->category_id ?>.svg" alt="<?= $type->category_name ?>" class="w-6">
              <?= $type->category_name ?>
            </li>
          <?php endforeach ?>
          </div>
        </div>

        <a href="<?php echo SYSTEM_URL.'/add-menu' ?>" class="h-12 flex items-center gap-3 fill-white bg-primary px-4 md:px-6 rounded-full"
        >
          <svg viewBox="0 0 24 24" class="w-4 md:w-5">
            <g id="vuesax_bold_add-circle" data-name="vuesax/bold/add-circle">
              <g id="add-circle">
                <path id="Vector" d="M10,0A10,10,0,1,0,20,10,10.016,10.016,0,0,0,10,0Zm4,10.75H10.75V14a.75.75,0,0,1-1.5,0V10.75H6a.75.75,0,0,1,0-1.5H9.25V6a.75.75,0,0,1,1.5,0V9.25H14a.75.75,0,0,1,0,1.5Z" transform="translate(2 2)" fill="current"/>
                <path id="Vector-2" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(24 24) rotate(180)" fill="none" opacity="0"/>
              </g>
            </g>
          </svg>
          <p class="hidden md:block text-xs text-white font-semibold">
            Add Menu
          </p>
        </a>
      </div>
    <?php } ?>

    <?php if(count($menu->get()) > 0){ ?>
      <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
        <?php 
          $date = date('Y-m-d', strtotime("now"));
          foreach($menu->get() as $menu): 
            $helper->query(
              'SELECT * FROM `order_items` WHERE `menu_id` = ? AND `date_added` LIKE ?',
              [$menu->menu_id, '%'.$date.'%']
            );

            $stock = $menu->menu_stock;

            foreach($helper->fetchAll() as $item){
              $stock = $stock - $item->quantity;
            }
        ?>
          <div class="search-area">
            <div class="group/menu relative bg-white rounded-2xl py-7 px-4 shadow-sm hover:shadow-lg transition-all border-gray-100 border-2">
            <?php if(Utilities::isAdmin()){ ?>
              <button class="delete-menu" data-menu="<?= $menu->menu_id ?>">
                <img src="<?php echo SYSTEM_URL ?>/public/icons/close-white.svg" alt="delete" class="w-5 pointer-events-none">
              </button>
            <?php } ?>
              <div class="relative">
                <img src="<?php echo SYSTEM_URL ?>/uploads/menu/<?= $menu->menu_id ?>.png" alt="<?= $menu->menu_name ?>" class="h-[140px] mx-auto">
                <span class="finder1 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[10px] font-semibold bg-gray-50/70 py-2 px-4 rounded-full">
                  <?= $stock > 1 ? $menu->menu_tag : 'Sold Out' ?>
                </span>
              </div>
              <p class="finder2 text-sm text-dark-gray font-semibold text-center leading-8">
                <?= $menu->menu_name ?>
              </p>
              <div class="flex items-center justify-center text-xs text-slate-500 gap-2 mb-3">
                <p class="finder3">
                  ₱<?= $menu->menu_price ?>.00
                </p>
                <span class="text-slate-200">|</span>
                <p>
                  <?= $stock ?> left
                </p>
              </div>
            <?php if(Utilities::isCustomer()){ ?>
              <button class="buy-btn block <?= $stock > 1 ? 'bg-primary text-white' : 'bg-gray-100 text-slate-500 pointer-events-none' ?> text-xs font-semibold py-3 px-10 rounded-full mx-auto" data-value="<?= $menu->menu_id ?>">
                Buy
              </button>
            <?php } else { ?>
              <a href="<?php echo SYSTEM_URL ?>/update-menu/<?= $menu->menu_id ?>" class="block w-fit bg-primary text-xs font-semibold text-white py-3 px-10 rounded-full mx-auto">
                Update
              </a>
            <?php } ?>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    <?php } else { ?>
      <div class="grid place-items-center bg-gray-100 <?php echo Utilities::isCustomer() ? 'min-h-[80vh]' : 'min-h-[70vh]' ?> rounded-md">
        <div>
          <img src="./public/icons/kawaii_taco.svg" alt="empty" class="mx-auto my-0">
          <p class="text-sm text-slate-500 font-semibold -mt-4">Coming Soon!</p>
        </div>
      </div>
    <?php } ?>
    </section>
  </div>

<?php include 'partials/_footer.php' ?>