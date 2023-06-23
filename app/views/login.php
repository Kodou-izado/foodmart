<?php
  include './config/init.php';
  $title = 'Login';
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

        <a href="<?php echo SYSTEM_URL.'/signup' ?>" class="text-xs text-white font-semibold">
          Create account
        </a>
      </div>
    </div>

    <div class="w-full sm:w-[min(25rem,80%)] flex flex-col items-center justify-center gap-10 sm:block bg-white min-h-[calc(100vh_-_4.5rem)] sm:min-h-0 rounded-t-3xl">
      <img src="./public/icons/icon.svg" alt="logo" class="hidden sm:block mx-auto w-[4rem] mb-0">
      <p class="hidden sm:block text-[2rem] text-primary font-bold text-center tracking-widest leading-6 uppercase mb-14">
        Food<span class="ml-0 text-dark-gray">Mart</span>
      </p>

      <p class="sm:hidden w-[min(25rem,80%)] text-xl text-dark-gray font-bold text-left">
        Login to your account
      </p>

      <form class="w-[min(25rem,80%)] sm:w-full" id="login-form" autocomplete="off">
        <label for="username" class="block text-sm text-gray-700 font-medium mb-1">
          Username
        </label>
        <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4">
          <input type="text" placeholder="Input your username" name="username" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none">
          <img src="./public/icons/user-linear.svg" alt="user" class="w-5">
        </div>
        <label for="password" class="block text-sm text-gray-700 font-medium mb-1">
          Password
        </label>
        <div class="flex h-14 border border-slate-400/60 rounded-full py-2 px-8 mb-4">
          <input type="password" placeholder="Your account password" id="password-input" name="password" class="flex-1 text-xs text-slate-400 placeholder:text-slate-400 outline-none" autocomplete="current-password">
          <img src="./public/icons/eye-shield-security-linear.svg" alt="user" class="w-5">
        </div>
        <div class="flex justify-end items-center gap-2 mb-4 cursor-pointer">
          <div class="relative w-8 h-5 rounded-full bg-slate-300 password-toggler before:transition-all before:ease before:duration-300"></div>
          <p class="text-[11px] text-slate-400 font-semibold">
            Show password
          </p>
        </div>
        <button type="submit" class="login-btn w-full h-14 bg-primary rounded-full uppercase text-[13px] text-white font-bold tracking-widest mb-4">
          Login
        </button>

        <p class="text-xs text-slate-400 text-center">
          Does not have an account?
          <a href="<?php echo SYSTEM_URL.'/signup' ?>" class="text-primary font-bold">
            Create account
          </a>
        </p>
      </form>
    </div>
  </div>

<?php include './app/views/partials/_footer.php' ?>