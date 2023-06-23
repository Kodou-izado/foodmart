<?php
  include './config/init.php';
  $title = 'Update Menu';
  include './app/views/partials/_header.php';
  include './app/views/partials/_loader.php';
  include './app/views/partials/_toast.php';

  use App\Utils\Utilities;

  Utilities::redirectUnauthorize();

  $menu_data = $menu->getOne($id);
?>
  <div class="min-h-screen bg-white pt-[5rem] md:pt-[6rem] pb-[6rem] md:pb-0">
    <?php include './app/views/partials/_nav.php' ?>

    <section class="w-[min(60rem,90%)] mx-auto">
      <div class="min-h-[75vh] flex items-center">
        <div class="w-full">
          <p class="text-dark-gray font-semibold mt-4">
            Update The Menu
          </p>
          <p class="text-xs text-slate-500 mb-6">
            Savor new delights: Add new exciting menus to tempt the taste buds of the customers!
          </p>
          <form id="update-menu-form" autocomplete="off">
            <input type="hidden" name="menu" value="<?php echo $menu_data->menu_id ?>">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-10">
              <div class="file-upload grid place-items-center bg-gray-100 h-[16rem] md:h-auto relative cursor-pointer rounded-2xl">
                <input type="file" class="upload-input" name="menuimg" hidden>
                <img src="<?php echo SYSTEM_URL.'/uploads/menu/'.$menu_data->menu_id.'.png' ?>" alt="menu image" class="preview-img md:w-full max-h-[16rem] md:max-h-[23rem] object-contain">
                <div class="hidden upload-icon absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-max">
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/gallery-add-bold.svg" alt="upload" class="w-12 mx-auto mb-2">
                  <p class="text-xs text-slate-500 font-semibold text-center">
                    Browse your device
                  </p>
                </div>
              </div>
              <div>
                <div class="mb-3">
                  <label for="menu_name" class="block text-sm text-gray-700 font-medium mb-1">
                    Menu Name
                  </label>
                  <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
                    <input type="text" placeholder="Input the menu name" name="menu_name" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" value="<?php echo $menu_data->menu_name ?>">
                  </div>
                </div>
                <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-4 mb-3">
                  <div>
                    <label for="menu_price" class="block text-sm text-gray-700 font-medium mb-1">
                      Menu Price
                    </label>
                    <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
                      <input type="text" placeholder="Input the menu price" name="menu_price" class="numeric flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" value="<?php echo $menu_data->menu_price ?>">
                    </div>
                  </div>
                  <div>
                    <label for="stocks" class="block text-sm text-gray-700 font-medium mb-1">
                      Menu Stocks
                    </label>
                    <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
                      <input type="text" placeholder="Input the menu price" name="stock" class="numeric flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" value="<?php echo $menu_data->menu_stock ?>">
                    </div>
                  </div>
                </div>
                <label for="category" class="block text-sm text-gray-700 font-medium mb-1">
                  Category
                </label>
                <div class="custom-select relative flex items-center justify-between h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-4 cursor-pointer">
                  <input type="hidden" class="category-input" name="category" value="<?php echo $menu_data->category_id ?>">
                  <p class="custom-select-name text-[10px] md:text-xs text-slate-500 font-medium">
                    <?php echo $menu_data->category_name ?>
                  </p>
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/arrow-down-linear.svg" alt="arrow down" class="w-3 md:w-4">

                  <div class="custom-select-dropdown absolute inset-x-0 bg-white shadow-md rounded-2xl p-1 z-20">
                  <?php foreach($category->get() as $type): ?>
                    <li class="custom-select-option flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 rounded-2xl transition-all <?php echo $type->category_id == $menu_data->category_id ? 'selected' : '' ?>" data-category="<?= $type->category_id ?>">
                      <img src="<?php echo SYSTEM_URL ?>/uploads/category/<?= $type->category_id ?>.svg" alt="<?= $type->category_name ?>" class="w-6" >
                      <?= $type->category_name ?>
                    </li>
                  <?php endforeach ?>
                  </div>
                </div>
                <label for="menu_tag" class="block text-sm text-gray-700 font-medium mb-1">
                  Menu Tag
                </label>
                <input type="hidden" class="tag-input" name="menu_tag" value="<?php echo $menu_data->menu_tag ?>">
                <div class="flex flex-wrap gap-3 mb-8">
                  <div class="tag-option <?php echo $menu_data->menu_tag == 'New' ? 'selected' : '' ?>">
                    New
                  </div>
                  <div class="tag-option <?php echo $menu_data->menu_tag == 'Not Available' ? 'selected' : '' ?>">
                    Not Available
                  </div>
                </div>
                <div class="flex">
                  <button type="submit" class="update-menu text-xs text-white text-center font-semibold w-full md:w-fit h-12 px-8 rounded-full bg-primary">
                    Update Menu
                  </button>
                  <a href="<?php echo SYSTEM_URL.'/menu' ?>" class="inline-block text-xs text-center text-white font-semibold w-full md:w-fit h-12 px-8 rounded-full leading-[3rem] bg-red-600 ml-2">
                    Cancel
                  </a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>

<?php include './app/views/partials/_footer.php' ?>