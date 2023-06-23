<?php
  include './config/init.php';
  $title = 'Add Menu';
  include './app/views/partials/_header.php';
  include './app/views/partials/_loader.php';
  include './app/views/partials/_toast.php';

  use App\Utils\Utilities;

  Utilities::redirectUnauthorize();
?>
  <div class="min-h-screen bg-white pt-[5rem] md:pt-[6rem] pb-[6rem] md:pb-0">
    <?php include './app/views/partials/_nav.php' ?>

    <section class="w-[min(60rem,90%)] mx-auto">
      <div class="min-h-[75vh] flex items-center">
        <div class="w-full">
          <p class="text-dark-gray font-semibold mt-4">
            Add New Menu
          </p>
          <p class="text-xs text-slate-500 mb-6">
            Savor new delights: Add new exciting menus to tempt the taste buds of the customers!
          </p>
          <form id="add-menu-form" autocomplete="off">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-10">
              <div class="file-upload grid place-items-center bg-gray-100 h-[16rem] md:h-auto relative cursor-pointer rounded-2xl">
                <input type="file" class="upload-input" name="menuimg" hidden>
                <img src="../../public/image/oishi patata.png" alt="menu image" class="preview-img md:w-full max-h-[16rem] md:max-h-[23rem] object-contain" hidden>
                <div class="upload-icon absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-max">
                  <img src="./public/icons/gallery-add-bold.svg" alt="upload" class="w-12 mx-auto mb-2">
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
                    <input type="text" placeholder="Input the menu name" name="menu_name" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
                  </div>
                </div>
                <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-4 mb-3">
                  <div>
                    <label for="menu_price" class="block text-sm text-gray-700 font-medium mb-1">
                      Menu Price
                    </label>
                    <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
                      <input type="text" placeholder="Input the menu price" name="menu_price" class="numeric flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
                    </div>
                  </div>
                  <div>
                    <label for="stocks" class="block text-sm text-gray-700 font-medium mb-1">
                      Menu Stocks
                    </label>
                    <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
                      <input type="text" placeholder="Input the menu price" name="stock" class="numeric flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
                    </div>
                  </div>
                </div>
                <label for="category" class="block text-sm text-gray-700 font-medium mb-1">
                  Category
                </label>
                <div class="custom-select relative flex items-center justify-between h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-4 cursor-pointer">
                  <input type="hidden" class="category-input" name="category" reset-field>
                  <p class="custom-select-name text-[10px] md:text-xs text-slate-400">
                    Select Category
                  </p>
                  <img src="./public/icons/arrow-down-linear.svg" alt="arrow down" class="w-3 md:w-4">

                  <div class="custom-select-dropdown absolute inset-x-0 bg-white shadow-md rounded-2xl p-1 z-20">
                  <?php foreach($category->get() as $type): ?>
                    <li class="custom-select-option flex items-center text-[10px] md:text-xs text-slate-400 gap-3 py-2 hover:bg-gray-100 px-6 rounded-2xl transition-all" data-value="<?= $type->category_id ?>">
                      <img src="./uploads/category/<?= $type->category_id ?>.svg" alt="<?= $type->category_name ?>" class="w-6">
                      <?= $type->category_name ?>
                    </li>
                  <?php endforeach ?>
                  </div>
                </div>
                <label for="menu_tag" class="block text-sm text-gray-700 font-medium mb-1">
                  Menu Tag
                </label>
                <div>
                  <input type="hidden" class="tag-input" name="menu_tag" reset-field>
                  <div class="flex flex-wrap gap-3 mb-8">
                    <div class="tag-option">
                      New
                    </div>
                    <div class="tag-option">
                      Not Available
                    </div>
                  </div>
                </div>
                <div class="flex">
                  <button type="submit" class="save-menu text-xs text-white text-center font-semibold w-full md:w-fit h-12 px-8 rounded-full bg-primary">
                    Save Menu
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