<?php
  include './config/init.php';
  $title = 'Users';
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
      <div class="flex flex-wrap justify-between gap-2 mb-4">
        <div class="filter w-[13rem] h-12 relative flex items-center justify-between bg-gray-100 px-6 rounded-full cursor-pointer z-[8]">
          <p class="filter-name text-[10px] md:text-xs text-slate-500 font-medium">
            Apply filters
          </p>
          <img src="<?php echo SYSTEM_URL ?>/public/icons/arrow-down-linear.svg" alt="arrow down" class="w-3 md:w-4">

          <div class="filter-dropdown absolute inset-x-0 bg-white shadow-md rounded-2xl p-1">
            <li class="filter-option account-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/cancel.svg" alt="cancel" class="w-6">
              Clear filters
            </li>
            <li class="filter-option account-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="Verified">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/verify-linear.svg" alt="dish" class="w-5">
              Verified Users
            </li>
            <li class="filter-option account-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="Unverified">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/warning-2-linear.svg" alt="unverify" class="w-5">
              Unverified Users
            </li>
            <li class="filter-option account-filter flex items-center text-[10px] md:text-xs text-slate-500 font-medium gap-3 py-2 hover:bg-gray-100 px-6 transition-all" data-value="Blocked">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/slash-linear.svg" alt="block" class="w-5">
              Blocked Users
            </li>
          </div>
        </div>

        <div class="flex items-center gap-3">
          <a href="<?= SYSTEM_URL ?>/users/student" class="account-type <?= $type == "student" ? "active" : "" ?>">Students</a>
          <a href="<?= SYSTEM_URL ?>/users/teacher" class="account-type <?= $type == "teacher" ? "active" : "" ?>">Teachers</a>
        </div>
      </div>

      <?php if(count($user->get($type)) > 0){ ?>
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach($user->get($type) as $user): ?>
          <div class="search-area py-4 px-8 rounded-2xl border-2 border-gray-100 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
              <img src="<?php echo SYSTEM_URL ?>/uploads/user/<?= $user->gender == "Male" ? "Male" : "Female" ?>.svg" alt="user" class="w-12">
              <div>
                <div class="flex gap-1">
                  <p class="finder1 text-sm text-dark-gray font-semibold">
                    <?= $user->fullname ?>
                  </p>
                <?php if($user->account_status == "Verified"){ ?>
                  <img src="<?php echo SYSTEM_URL ?>/public/icons/verified.svg" alt="verified" class="w-4">
                <?php } ?>
                </div>
                <p class="finder2 text-xs text-slate-500 font-medium">
                  @<?= $user->username ?>
                </p>
              </div>
            </div>
            <div class="flex items-center gap-2 mb-2">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/award-linear.svg" alt="yearsection" class="w-5">
              <p class="finder3 text-xs text-slate-500 font-medium">
                <?= !empty($user->year_section) ? $user->year_section : "Not Applicable" ?>
              </p>
            </div>
            <div class="flex items-center gap-2 mb-4">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/sms-linear.svg" alt="email" class="w-5">
              <p class="finder4 text-xs text-slate-500 font-medium">
                <?= $user->email ?>
              </p>
            </div>
            <div class="flex items-center justify-between gap-3">
              <button class="view-id text-[10px] text-slate-500 font-semibold py-2 px-5 bg-gray-100 rounded-full" data-value="<?= $user->user_id ?>">
                View ID
              </button>
            
            <div class="flex items-center gap-3">
              <?php if($user->account_status == "Unverified" OR $user->account_status == "Blocked"){ ?>
                <button class="group verify text-[10px] text-slate-500 font-semibold p-2 bg-gray-100 hover:bg-emerald-500 rounded-full transition-all" title="Verify User" data-value="<?= $user->user_id ?>">
                  <svg class="w-4 stroke-slate-500 group-hover:stroke-white stroke-[1.5] transition-all pointer-events-none" viewBox="0 0 24 24">
                    <g id="vuesax_linear_verify" data-name="vuesax/linear/verify">
                      <g id="verify">
                        <path id="Vector" d="M0,2.42,2.41,4.84,7.24,0" transform="translate(8.38 9.58)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                        <path id="Vector-2" data-name="Vector" d="M8.745.442a2.015,2.015,0,0,1,2.52,0l1.58,1.36a2.216,2.216,0,0,0,1.26.47h1.7a1.938,1.938,0,0,1,1.93,1.93V5.9a2.243,2.243,0,0,0,.47,1.26l1.36,1.58a2.015,2.015,0,0,1,0,2.52l-1.36,1.58a2.216,2.216,0,0,0-.47,1.26v1.7a1.938,1.938,0,0,1-1.93,1.93h-1.7a2.243,2.243,0,0,0-1.26.47l-1.58,1.36a2.015,2.015,0,0,1-2.52,0L7.165,18.2a2.216,2.216,0,0,0-1.26-.47H4.175a1.938,1.938,0,0,1-1.93-1.93v-1.71a2.276,2.276,0,0,0-.46-1.25l-1.35-1.59a2.013,2.013,0,0,1,0-2.5l1.35-1.59a2.276,2.276,0,0,0,.46-1.25V4.192a1.938,1.938,0,0,1,1.93-1.93H5.9a2.243,2.243,0,0,0,1.26-.47Z" transform="translate(2.005 2.008)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                        <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
                      </g>
                    </g>
                  </svg>
                </button>
              <?php } else { ?>
                <button class="block-btn group text-[10px] text-slate-500 font-semibold p-2 bg-gray-100 hover:bg-red-500 rounded-full ml-auto transition-all" title="Block User" data-value="<?= $user->user_id ?>">
                  <svg 
                    class="w-4 stroke-slate-500 group-hover:stroke-white stroke-[1.5] transition-all pointer-events-none"
                    viewBox="0 0 24 24"
                  >
                    <g id="vuesax_linear_slash" data-name="vuesax/linear/slash">
                      <g id="slash">
                        <path id="Vector" d="M10,20A10,10,0,1,0,0,10,10,10,0,0,0,10,20Z" transform="translate(2 2)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                        <path id="Vector-2" data-name="Vector" d="M14,0,0,14" transform="translate(4.9 5)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                        <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
                      </g>
                    </g>
                  </svg>
                </button>
                <button class="unverify group text-[10px] text-slate-500 font-semibold p-2 bg-gray-100 hover:bg-red-500 rounded-full transition-all" title="Unverify User" data-value="<?= $user->user_id ?>">
                  <svg class="w-4 stroke-slate-500 group-hover:stroke-white stroke-[1.5] transition-all pointer-events-none" viewBox="0 0 24 24">
                    <g id="vuesax_linear_warning-2" data-name="vuesax/linear/warning-2">
                      <g id="warning-2">
                        <path id="Vector" d="M0,0V5.25" transform="translate(12 7.75)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                        <path id="Vector-2" data-name="Vector" d="M18.17,6.58v6.84a3.174,3.174,0,0,1-1.57,2.73l-5.94,3.43a3.163,3.163,0,0,1-3.15,0L1.57,16.15A3.15,3.15,0,0,1,0,13.42V6.58A3.174,3.174,0,0,1,1.57,3.85L7.51.42a3.163,3.163,0,0,1,3.15,0L16.6,3.85A3.162,3.162,0,0,1,18.17,6.58Z" transform="translate(2.91 2)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="current"/>
                        <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" fill="none" opacity="0"/>
                        <path id="Vector-4" data-name="Vector" d="M0,0V.1" transform="translate(12 16.2)" fill="none" stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                      </g>
                    </g>
                  </svg>
                </button>
              <?php } ?>
            </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

      <div class="pagination-wrapper hidden">
        <button type="button" class="pagination-btn prev-btn">Prev</button>
        <ul class="page-wrapper">
          <li>
            <a href="#" class="page-link active">1</a>
          </li>
          <li class="ellipsis">...</li>
        </ul>
        <button type="button" class="pagination-btn next-btn text-xs text-slate-500 font-medium bg-gray-100 py-2 px-4 rounded-full">Next</button>
      </div>
    <?php } else { ?>
      <div class="grid place-items-center bg-gray-100 <?php echo Utilities::isCustomer() ? 'min-h-[80vh]' : 'min-h-[70vh]' ?> rounded-md">
        <div>
          <img src="<?= SYSTEM_URL ?>/public/icons/empty 1.svg" alt="empty" class="mx-auto my-0 w-20">
          <p class="text-sm text-slate-500 font-semibold">No records found</p>
        </div>
      </div>
    <?php } ?>
    </section>
  </div>

<?php include 'partials/_footer.php' ?>