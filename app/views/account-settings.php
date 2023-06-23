<?php
  include './config/init.php';
  $title = 'Account Settings';
  include './app/views/partials/_header.php';
  include './app/views/partials/_loader.php';
  include './app/views/partials/_toast.php';

  use App\Utils\Utilities;

  Utilities::redirectUnauthorize();
?>
  <div class="min-h-screen bg-white py-[5rem]">
    <?php include './app/views/partials/_nav.php' ?>

    <section class="w-[min(60rem,90%)] mx-auto">
      <p class="text-dark-gray font-semibold mt-4">
        Account Settings
      </p>
      <p class="text-xs text-slate-500 mb-6">
        Manage your account settings. This page will be used for updating <br> information and account security.
      </p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
          <div>
            <p class="text-sm text-dark-gray font-semibold mt-4">
              Personal Information
            </p>
            <p class="text-[11px] text-slate-500 mb-6">
              We ensure that your information was accurately correct.
            </p>

            <div class="flex items-center gap-3 mb-4">
              <img src="<?php echo SYSTEM_URL ?>/uploads/user/<?php echo strtolower($user_info->gender) ?>.svg"  alt="profile" class="w-12">
              <div>
                <p class="text-dark-gray font-semibold">
                  <?php echo $user_info->fullname ?>
                </p>
                <p class="text-xs text-slate-500 font-medium">
                  @<?php echo $user_info->username ?>
                </p>
              </div>

              <button class="edit-btn bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-all ml-auto">
                <img src="<?php echo SYSTEM_URL ?>/public/icons/edit-2-linear.svg" alt="edit" title="Edit" class="w-5">
              </button>
            </div>

            <form id="account-form" autocomplete="off">
              <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4 mb-4">
                <div>
                  <label for="fullname" class="block text-xs text-gray-700 font-medium mb-1">
                    Fullname
                  </label>
                  <div class="flex h-12 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
                    <input type="text" placeholder="Input your fullname" name="fullname" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none disabled:bg-transparent disabled:cursor-not-allowed" value="<?php echo $user_info->fullname ?>" disabled>
                  </div>
                </div>
                <div>
                  <label for="usernmame" class="block text-xs text-gray-700 font-medium mb-1">
                    Username
                  </label>
                  <div class="flex h-12 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
                    <input type="text" placeholder="Input your username" name="username" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none disabled:bg-transparent disabled:cursor-not-allowed" value="<?php echo $user_info->username ?>" disabled>
                  </div>
                </div>
                <div>
                  <label for="gender" class="block text-xs text-gray-700 font-medium mb-1">
                    Gender
                  </label>
                  <div class="custom-select relative flex items-center justify-between h-12 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0 cursor-pointer pointer-events-none">
                    <input type="hidden" class="gender-input" name="gender" value="<?php echo $user_info->gender ?>">
                    <p class="custom-select-name text-[10px] md:text-xs text-slate-400">
                     <?php echo $user_info->gender ?>
                    </p>
                    <img src="<?php echo SYSTEM_URL ?>/public/icons/arrow-down-linear.svg" alt="arrow down" class="w-3 md:w-4">

                    <div class="custom-select-dropdown absolute inset-x-0 bg-white shadow-md rounded-2xl p-1 z-20">
                      <li class="custom-select-option flex items-center text-[10px] md:text-xs text-slate-400 gap-3 py-2 hover:bg-gray-100 px-6 transition-all <?php echo $user_info->gender == "Male" ? "selected" : "" ?>" data-value="Male">
                        Male
                      </li>
                      <li class="custom-select-option flex items-center text-[10px] md:text-xs text-slate-400 gap-3 py-2 hover:bg-gray-100 px-6 transition-all <?php echo $user_info->gender == "Female" ? "selected" : "" ?>" data-value="Female">
                        Female
                      </li>
                    </div>
                  </div>
                </div>
              <?php if(Utilities::isCustomer()){ ?>
                <div>
                  <label for="year_section" class="block text-xs text-gray-700 font-medium mb-1">
                    Year and Section
                  </label>
                  <div class="flex h-12 border border-slate-400/60 rounded-full py-2 px-8 sm:mb-0">
                    <input type="text" placeholder="Input your year and section" name="year_section" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none disabled:bg-transparent disabled:cursor-not-allowed" value="<?php echo $user_info->year_section ?>" disabled>
                  </div>
                </div>
              <?php } else { ?>
                <div>
                  <label for="email" class="block text-xs text-gray-700 font-medium mb-1">
                    Email
                  </label>
                  <div class="flex h-12 border border-slate-400/60 rounded-full py-2 px-8 mb-4">
                    <input type="email" placeholder="Input your email address" name="email" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none disabled:bg-transparent disabled:cursor-not-allowed" value="<?php echo $user_info->email ?>" disabled>
                  </div>
                </div>
              <?php } ?>
              </div>
            <?php if(Utilities::isCustomer()){ ?>
              <label for="email" class="block text-xs text-gray-700 font-medium mb-1">
                Email
              </label>
              <div class="flex h-12 border border-slate-400/60 rounded-full py-2 px-8 mb-4">
                <input type="email" placeholder="Input your email address" name="email" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none disabled:bg-transparent disabled:cursor-not-allowed" value="<?php echo $user_info->email ?>" disabled>
              </div>
            <?php } ?>
              <button type="submit" class="save-information hidden text-xs text-white font-semibold bg-primary w-full md:w-fit py-3 px-8 rounded-full">
                Save
              </button>
            </form>
          </div>
          <div>
            <p class="text-sm text-dark-gray font-semibold mt-4">
              Account Security
            </p>
            <p class="text-[11px] text-slate-500 mb-6">
              Change your account password.
            </p>

            <form id="security-form" autocomplete="off">
              <label for="current_account_password" class="block text-xs text-gray-700 font-medium mb-1">
                Current Account Password
              </label>
              <div class="flex h-12 border border-slate-400/60 rounded-full py-2 px-8 mb-4">
                <input type="password" placeholder="Input current account password" name="current_account_password" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
                <img src="./public/icons/eye-shield-security-linear.svg" alt="user" class="w-5">
              </div>
              <label for="new_account_password" class="block text-xs text-gray-700 font-medium mb-1">
                New Account Password
              </label>
              <div class="flex h-12 border border-slate-400/60 rounded-full py-2 px-8 mb-4">
                <input type="password" placeholder="Input new account password" name="new_account_password" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
                <img src="./public/icons/eye-shield-security-linear.svg" alt="user" class="w-5">
              </div>
              <label for="confirm_password" class="block text-xs text-gray-700 font-medium mb-1">
                Confirm Password
              </label>
              <div class="flex h-12 border border-slate-400/60 rounded-full py-2 px-8 mb-4">
                <input type="password" placeholder="Confirm password" name="confirm_password" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
                <img src="./public/icons/eye-shield-security-linear.svg" alt="user" class="w-5">
              </div>
              <button type="submit" class="change-pass text-xs text-white font-semibold bg-primary w-full md:w-fit py-3 px-8 rounded-full">
                Change Password
              </button>
            </form>
          </div>
      </div>
    </section>
  </div>

<?php include './app/views/partials/_footer.php' ?>