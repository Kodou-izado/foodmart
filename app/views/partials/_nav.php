<?php
  use App\Utils\Utilities;
?>
<header class="fixed top-0 w-full inset-x-0 bg-white py-2 z-10 border-2 border-gray-100">
  <nav class="w-[min(60rem,95%)] flex items-center justify-between mx-auto">
    <div class="flex items-center gap-3 overflow-x-hidden">
      <img src="<?php echo SYSTEM_URL ?>/public/icons/icon.svg" alt="logo" class="w-8">
      <p class="text-dark-gray font-semibold">
        <span class="text-primary">Food</span>Mart
      </p>
    </div>

    <ul class="flex items-center nav-items flex-1">
      <li class="group/link relative">
        <a href="<?php echo SYSTEM_URL.'/menu' ?>" class="group/link relative flex items-center gap-2 text-xs text-slate-500 font-medium hover:text-dark-gray px-4 py-4 rounded-full transition-all cursor-pointer <?php echo $title == "Menu" ? 'active-link' : '' ?>">
          <svg viewBox="0 0 24 24" class="w-4 stroke-slate-500 group-hover/link:stroke-dark-gray group-[.active-link]/link:stroke-dark-gray stroke-2 transition-all">
            <g id="vuesax_linear_category" data-name="vuesax/linear/category">
              <g id="category">
                <path id="Vector" d="M3,8H5A2.652,2.652,0,0,0,8,5V3A2.652,2.652,0,0,0,5,0H3A2.652,2.652,0,0,0,0,3V5A2.652,2.652,0,0,0,3,8Z" transform="translate(2 2)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-2" data-name="Vector" d="M3,8H5A2.652,2.652,0,0,0,8,5V3A2.652,2.652,0,0,0,5,0H3A2.652,2.652,0,0,0,0,3V5A2.652,2.652,0,0,0,3,8Z" transform="translate(14 2)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-3" data-name="Vector" d="M3,8H5A2.652,2.652,0,0,0,8,5V3A2.652,2.652,0,0,0,5,0H3A2.652,2.652,0,0,0,0,3V5A2.652,2.652,0,0,0,3,8Z" transform="translate(14 14)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-4" data-name="Vector" d="M3,8H5A2.652,2.652,0,0,0,8,5V3A2.652,2.652,0,0,0,5,0H3A2.652,2.652,0,0,0,0,3V5A2.652,2.652,0,0,0,3,8Z" transform="translate(2 14)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-5" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
              </g>
            </g>
          </svg>
          Menus
        </a>

        <?php if(Utilities::isCustomer()){ ?>
          <div class="hidden md:block absolute top-[90%] group-hover/link:top-[130%] left-1/2 -translate-x-1/2 w-[19rem] bg-white py-6 px-8 rounded-lg shadow-[0_0_60px_-15px_rgba(0,0,0,0.2)] invisible group-hover/link:visible opacity-0 group-hover/link:opacity-100 transition-all">
          <?php foreach($category->get() as $type): ?>
              <a href="<?= SYSTEM_URL.'/menu/'.strtolower($type->category_name).'' ?>" class="flex items-center gap-4 mb-3">
                <div class="bg-gray-100 p-2 rounded-xl shrink-0">
                  <img src="<?php echo SYSTEM_URL ?>/uploads/category/<?= $type->category_id ?>.svg" alt="<?= $type->category_name ?>" class="w-8">
                </div>
                <div>
                  <p class="text-[13px] text-dark-gray font-semibold leading-5">
                    <?= $type->category_name ?>
                  </p>
                  <p class="text-xs font-normal text-gray-400">
                    <?= $type->category_description ?>
                  </p>
                </div>
              </a>
          <?php endforeach ?>
          </div>
        <?php } ?>
      </li>
      <?php if(Utilities::isCustomer()){ ?>
        <li>
          <a href="<?php echo SYSTEM_URL.'/order-history' ?>" class="relative group/link flex items-center gap-2 text-xs text-slate-500 font-medium hover:text-dark-gray px-4 py-4 rounded-full transition-all <?php echo $title == "Order History" ? 'active-link' : '' ?>">
            <svg viewBox="0 0 24 24" class="w-4 stroke-slate-500 group-hover/link:stroke-dark-gray group-[.active-link]/link:stroke-dark-gray stroke-2 transition-all">
              <g id="vuesax_linear_receipt" data-name="vuesax/linear/receipt">
                <g id="receipt">
                  <path id="Vector" d="M3.23,17.7a1.758,1.758,0,0,1,2.79.15L7.03,19.2a1.738,1.738,0,0,0,2.93,0l1.01-1.35a1.758,1.758,0,0,1,2.79-.15c1.78,1.9,3.23,1.27,3.23-1.39V5.04C17,1.01,16.06,0,12.28,0H4.72C.94,0,0,1.01,0,5.04V16.3C0,18.97,1.46,19.59,3.23,17.7Z" transform="translate(3.5 2)" fill="none" stroke="#current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-2" data-name="Vector" d="M0,0H8" transform="translate(8 7)" fill="none" stroke="#current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-3" data-name="Vector" d="M0,0H6" transform="translate(9 11)" fill="none" stroke="#current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
                </g>
              </g>
            </svg>            
            Order History
          </a>
        </li>
        <li>
          <a href="<?php echo SYSTEM_URL.'/about-us' ?>" class="relative group/link flex items-center gap-2 text-xs text-slate-500 font-medium hover:text-dark-gray px-4 py-4 rounded-full transition-all <?php echo $title == "About Us" ? 'active-link' : '' ?>">
            <svg viewBox="0 0 24 24" class="w-4 stroke-slate-500 group-hover/link:stroke-dark-gray group-[.active-link]/link:stroke-dark-gray stroke-2 transition-all">
              <g id="vuesax_linear_info-circle" data-name="vuesax/linear/info-circle">
                <g id="info-circle">
                  <path id="Vector" d="M10,20A10,10,0,1,0,0,10,10.029,10.029,0,0,0,10,20Z" transform="translate(2 2)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-2" data-name="Vector" d="M0,0V5" transform="translate(12 8)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-3" data-name="Vector" d="M0,0H.009" transform="translate(11.995 16)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                  <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
                </g>
              </g>
            </svg>     
            About Us
          </a>
        </li>
      <?php } ?>
      <?php if(Utilities::isAdmin()){ ?>
        <li>
          <a href="<?php echo SYSTEM_URL.'/orders' ?>" class="relative group/link flex items-center gap-2 text-xs text-slate-500 font-medium hover:text-dark-gray px-4 py-4 rounded-full transition-all <?php echo $title == "Orders" ? 'active-link' : '' ?>">
            <svg viewBox="0 0 24 24" class="w-4 stroke-slate-500 group-hover/link:stroke-dark-gray group-[.active-link]/link:stroke-dark-gray stroke-2 transition-all">
              <g id="vuesax_linear_receipt" data-name="vuesax/linear/receipt">
                <g id="receipt">
                  <path id="Vector" d="M3.23,17.7a1.758,1.758,0,0,1,2.79.15L7.03,19.2a1.738,1.738,0,0,0,2.93,0l1.01-1.35a1.758,1.758,0,0,1,2.79-.15c1.78,1.9,3.23,1.27,3.23-1.39V5.04C17,1.01,16.06,0,12.28,0H4.72C.94,0,0,1.01,0,5.04V16.3C0,18.97,1.46,19.59,3.23,17.7Z" transform="translate(3.5 2)" fill="none" stroke="#current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-2" data-name="Vector" d="M0,0H8" transform="translate(8 7)" fill="none" stroke="#current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-3" data-name="Vector" d="M0,0H6" transform="translate(9 11)" fill="none" stroke="#current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
                </g>
              </g>
            </svg>            
            Orders
          </a>
        </li>
        <li>
          <a href="<?php echo SYSTEM_URL.'/users' ?>" class="relative group/link flex items-center gap-2 text-xs text-slate-500 font-medium hover:text-dark-gray px-4 py-4 rounded-full transition-all <?php echo $title == "Users" ? 'active-link' : '' ?>">
            <svg viewBox="0 0 24 24" class="w-4 stroke-slate-500 group-hover/link:stroke-dark-gray group-[.active-link]/link:stroke-dark-gray stroke-2 transition-all">
              <g id="vuesax_linear_user" data-name="vuesax/linear/user">
                <g id="user">
                  <path id="Vector" d="M10,5A5,5,0,1,1,5,0,5,5,0,0,1,10,5Z" transform="translate(7 2)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-2" data-name="Vector" d="M17.18,7c0-3.87-3.85-7-8.59-7S0,3.13,0,7" transform="translate(3.41 15)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                  <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
                </g>
              </g>
            </svg>
            Users
          </a>
        </li>
      <?php } ?>
    </ul>

    <ul class="flex items-center gap-1 md:gap-4">
      <div class="flex items-center gap-1 md:gap-2">
      <?php 
        $exception = ["About Us", "Shopping Cart"];
        if(!in_array($title, $exception)){ 
      ?>
        <button class="search hover:bg-gray-100 p-1 md:p-3 rounded-full transition-all">
          <svg viewBox="0 0 24 24" class="w-4 stroke-dark-gray stroke-2">
            <g id="vuesax_linear_search-normal" data-name="vuesax/linear/search-normal">
              <g id="search-normal">
                <path id="Vector" d="M19,9.5A9.5,9.5,0,1,1,9.5,0,9.5,9.5,0,0,1,19,9.5Z" transform="translate(2 2)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-2" data-name="Vector" d="M2,2,0,0" transform="translate(20 20)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
              </g>
            </g>
          </svg>
        </button>
      <?php } ?>

      <?php if(Utilities::isCustomer()){ ?>
        <a href="<?php echo SYSTEM_URL.'/shopping-cart' ?>" class="relative hover:bg-gray-100 p-3 rounded-full transition-all">
          <svg viewBox="0 0 24 24" width="20" height="20" class="w-8 stroke-dark-gray stroke-2">
            <g id="vuesax_linear_bag-2" data-name="vuesax/linear/bag-2">
              <g id="bag-2">
                <path id="Vector" d="M0,5.662v-.97A4.773,4.773,0,0,1,4.06.022,4.5,4.5,0,0,1,9,4.5v1.38" transform="translate(7.5 2.008)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-2" data-name="Vector" d="M5.751,14h6c4.02,0,4.74-1.61,4.95-3.57l.75-6c.27-2.44-.43-4.43-4.7-4.43h-8C.481,0-.219,1.99.051,4.43l.75,6C1.011,12.39,1.731,14,5.751,14Z" transform="translate(3.249 8)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-3" data-name="Vector" d="M.495.5H.5" transform="translate(15.001 11.5)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-4" data-name="Vector" d="M.495.5H.5" transform="translate(8 11.5)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                <path id="Vector-5" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
              </g>
            </g>
          </svg>

        <?php if(count($cart->get()) > 0 ){ ?>
          <span class="absolute top-3 right-[10px] w-4 h-4 bg-pink-600 text-white text-[8px] font-semibold text-center leading-4 rounded-full">
            <?php echo count($cart->get()) > 99 ? '99+' : count($cart->get()) ?>
          </span>
        <?php } ?>
        </a>
      <?php } ?>
      </div>
      <div class="relative flex items-center cursor-pointer group/profile">
        <img src="<?php echo SYSTEM_URL ?>/uploads/user/male.svg" alt="profile" class="w-8">

        <div class="absolute top-[90%] group-hover/profile:top-[120%] right-0 w-[15rem] bg-white shadow-lg rounded-lg invisible group-hover/profile:visible opacity-0 group-hover/profile:opacity-100 transition-all">
          <div class="flex items-center gap-3 px-6 py-3 border-b-2 border-b-gray-100">
            <img src="<?php echo SYSTEM_URL ?>/uploads/user/male.svg" alt="profile" class="w-8">
            <div>
              <?php $user_info = $user->getOne($_SESSION['uid']) ?>
              <p class="text-sm text-dark-gray font-semibold">
                <?php echo $user_info->fullname ?>
              </p>
              <p class="text-[10px] text-slate-500 font-medium">
                @<?php echo $user_info->username ?>
              </p>
            </div>
          </div>
          <div class="pb-4">
            <a href="<?php echo SYSTEM_URL ?>/account-settings" class="flex items-center gap-3 text-xs text-slate-500 py-2 px-6 hover:bg-gray-100 transition-all mb-2">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/setting-2-linear.svg" alt="settings" class="w-5">
              Account Settings
            </a>
            <a href="<?php echo SYSTEM_URL ?>/logout" class="flex items-center gap-3 text-[10px] text-slate-500 font-medium bg-gray-100 w-fit px-3 py-2 ml-6 rounded-full">
              Sign Out
            </a>
          </div>
        </div>
      </div>
    </ul>
  </nav>
</header>