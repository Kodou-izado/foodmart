<?php
  include './config/init.php';
  $title = 'Create Account';
  include './app/views/partials/_header.php';
  include './app/views/partials/_loader.php';
  include './app/views/partials/_toast.php';

  use App\Utils\Utilities;

  Utilities::redirectAuthorize();
?>
  <div class="relative flex flex-col items-center sm:grid sm:place-items-center min-h-screen overflow-x-hidden bg-primary sm:bg-white">
    <div class="w-full block sm:hidden">
      <div class="w-[min(25rem,80%)] flex items-center justify-between py-6 mx-auto">
        <p class="text-xs text-white font-bold tracking-widest leading-6 uppercase">
          Food<span class="ml-0 text-dark-gray">Mart</span>
        </p>
        <a href="<?php echo SYSTEM_URL ?>" class="text-xs text-white font-semibold">
          Login now
        </a>
      </div>
    </div>

    <div class="w-full sm:w-[min(45rem,80%)] flex flex-col items-center justify-center gap-10 sm:block bg-white min-h-[88.5vh] sm:h-auto rounded-t-3xl py-12">
      <p class="sm:hidden w-[min(25rem,80%)] text-xl text-dark-gray font-bold text-left">
        Create your account now
      </p>

      <p class="hidden sm:block w-full text-[2rem] text-dark-gray font-bold mb-4">
        Create your <span class="text-primary">account</span>
      </p>

      <p class="hidden sm:block w-full text-xs text-dark-gray font-medium mb-10">
        Fill in all of the fields and you are ready to go.
      </p>

      <form class="w-[min(25rem,80%)] sm:w-full" id="create-account-form" autocomplete="off">
        <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4 mb-4">
          <div>
            <label for="fullname" class="block text-sm text-gray-700 font-medium mb-1"
            >
              Fullname
            </label>
            <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
              <input type="text" placeholder="Input your fullname" name="fullname" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
              <img src="./public/icons/user-tag-linear.svg" alt="user" class="w-5">
            </div>
          </div>
          <div>
            <label for="username" class="block text-sm text-gray-700 font-medium mb-1">
              Username
            </label>
            <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
              <input type="text" placeholder="Input your username" name="username" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
              <img src="./public/icons/user-linear.svg" alt="user" class="w-5">
            </div>
          </div>
          <div>
            <label for="email" class="block text-sm text-gray-700 font-medium mb-1">
              Email
            </label>
            <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
              <input type="email" placeholder="Input your email address" name="email" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
              <img src="./public/icons/sms-linear.svg" alt="user" class="w-5">
            </div>
          </div>
          <div>
            <label for="year_section" class="block text-sm text-gray-700 font-medium mb-1">
              Year and Section (If Student)
            </label>
            <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
              <input type="text" placeholder="Input your year and section" name="year_section" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
              <img src="./public/icons/award-linear.svg" alt="user" class="w-5">
            </div>
          </div>
          <div>
            <label for="password" class="block text-sm text-gray-700 font-medium mb-1">
              Password
            </label>
            <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
              <input type="password" placeholder="Your account password" id="password-input" name="password" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
              <img src="./public/icons/eye-shield-security-linear.svg" alt="user" class="w-5">
            </div>
          </div>
          <div>
            <label for="confirm_password" class="block text-sm text-gray-700 font-medium mb-1">
              Confirm Password
            </label>
            <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
              <input type="password" placeholder="Confirm password" name="confirm_password" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" reset-field>
              <img src="./public/icons/eye-shield-security-linear.svg" alt="user" class="w-5">
            </div>
          </div>
          <div>
            <label for="gender" class="block text-sm text-gray-700 font-medium mb-1">
              Gender
            </label>
            <div class="custom-select relative flex items-center justify-between h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-4 cursor-pointer">
              <input type="hidden" class="gender-input" name="gender" reset-field>
              <p class="custom-select-name text-[10px] md:text-xs text-slate-400">
                Select Gender
              </p>
              <img src="<?php echo SYSTEM_URL ?>/public/icons/arrow-down-linear.svg" alt="arrow down" class="w-3 md:w-4">

              <div class="custom-select-dropdown absolute inset-x-0 bg-white shadow-md rounded-2xl p-1 z-20">
                <li class="custom-select-option flex items-center text-[10px] md:text-xs text-slate-400 gap-3 py-2 hover:bg-gray-100 px-6 rounded-2xl transition-all" data-value="Male">
                  Male
                </li>
                <li class="custom-select-option flex items-center text-[10px] md:text-xs text-slate-400 gap-3 py-2 hover:bg-gray-100 px-6 rounded-2xl transition-all" data-value="Female">
                  Female
                </li>
              </div>
            </div>
          </div>
          <div>
            <label for="valid_id" class="block text-sm text-gray-700 font-medium mb-1">
              Valid ID
            </label>
            <div class="flex items-center h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4 sm:mb-0">
              <input type="file" name="valid_id" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none file:bg-secondary file:text-primary file:border-0 file:py-2 file:px-3 file:rounded-full file:font-semibold file:mr-4 cursor-pointer" reset-field>
              <img src="./public/icons/card-linear.svg" alt="id" class="w-5">
            </div>
          </div>
        </div>
        <button type="submit" class="create-account flex gap-3 items-center justify-center w-full sm:w-fit h-14 bg-primary rounded-full uppercase text-[13px] text-white font-bold tracking-widest sm:px-12 my-4 disabled:cursor-not-allowed">
           Create account
        </button>

        <p class="text-xs text-slate-400 text-center sm:text-left">
          Already have an account?
          <a href="<?php echo SYSTEM_URL ?>"  class="text-primary font-bold">
            Login now
          </a>
        </p>
      </form>
    </div>
  </div>
<?php include './app/views/partials/_footer.php' ?>