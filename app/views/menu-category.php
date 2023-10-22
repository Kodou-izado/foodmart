<?php
  include './config/init.php';
  $title = 'Menu';
  include 'partials/_header.php';
  include 'partials/_loader.php';
  include 'partials/_toast.php';
  include 'partials/_modal.php';

  use App\Utils\Utilities;

  Utilities::redirectUnauthorize();

  $helper->query(
    'SELECT * FROM `menus` m LEFT JOIN `category` c ON m.category_id=c.category_id WHERE c.category_name = ?',
    [ucfirst($name)]
  );

  $menus = $helper->fetchAll();

  $helper->query(
    'SELECT * FROM `category` WHERE `category_name` = ?',
    [ucfirst($name)]
  );

  $category_data = $helper->fetch();
?>
  <div class="min-h-screen bg-white pt-[5rem] md:pt-[6rem] pb-[6rem] md:pb-0">
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

    <p class="text-dark-gray font-semibold mt-4">
      <?php echo $category_data->category_name ?>
    </p>
    <p class="text-xs text-slate-500 mb-6">
      <?php echo $category_data->category_description ?>
    </p>

    <?php if(count($menu->get()) > 0){ ?>
      <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
        <?php foreach($menus as $menu): ?>
          <div class="search-area">
            <div class="group/menu relative bg-white rounded-2xl py-7 px-4 hover:shadow-lg transition-all border-gray-100 border-2">
            <?php if(Utilities::isAdmin()){ ?>
              <button class="delete-menu" data-menu="<?= $menu->menu_id ?>">
                <img src="<?php echo SYSTEM_URL ?>/public/icons/close-white.svg" alt="delete" class="w-5 pointer-events-none">
              </button>
            <?php } ?>
              <div class="relative">
                <img src="<?php echo SYSTEM_URL ?>/uploads/menu/<?= $menu->menu_id ?>.png" alt="<?= $menu->menu_name ?>" class="h-[140px] mx-auto">
                <span class="finder1 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[10px] font-semibold bg-gray-50/70 py-2 px-4 rounded-full">
                  <?= $menu->menu_tag ?>
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
                  <?= $menu->menu_stock ?> left
                </p>
              </div>
            <?php if(Utilities::isCustomer()){ ?>
              <button class="buy-btn block bg-primary text-xs font-semibold text-white py-3 px-10 rounded-full mx-auto" data-menu="<?= $menu->menu_id ?>">
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