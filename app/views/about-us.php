<?php
  include './config/init.php';
  $title = 'About Us';
  include './app/views/partials/_header.php';
  include './app/views/partials/_loader.php';
  include './app/views/partials/_toast.php';

  use App\Utils\Utilities;

  Utilities::redirectUnauthorize();
?>
  <div class="min-h-screen bg-white py-[5rem]">
    <?php include './app/views/partials/_nav.php' ?>

    <section class="w-[min(60rem,90%)] mx-auto">
      <div class="min-h-[75vh] flex items-center">
        <div class="w-[min(30rem,100%)] bg-white rounded-2xl mx-auto">
          <img src="<?php echo SYSTEM_URL ?>/public/icons/icon.svg" alt="logo" class="w-20 mx-auto">
          <p class="text-xl text-primary text-center font-bold leading-none mb-6">
            Food<span class="text-dark-gray">Mart</span>
          </p>
          <p class="text-[12px] md:text-sm text-slate-500 text-center leading-6 mb-10 md:mb-6">
            FoodMart is the main canteen that sells foods, drinks, and school supplies to the students. Our Canteen prepares fresh meals every day on site. As well as a range of wholesome, nutritious and delicious snacks and meals for all. There is a daily morning snack, afternoon snack and at lunch time.
          </p>
          <div class="flex justify-center gap-8 flex-wrap">
            <div class="flex items-center gap-3">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/call-bold.svg" alt="phone" class="w-4 md:w-5">
              <p class="text-[13px] md:text-sm text-slate-500 font-semibold">
                09323550100
              </p>
            </div>
            <div class="flex items-center gap-3">
              <img src="<?php echo SYSTEM_URL ?>/public/icons/sms-bold.svg" alt="email" class="w-4 md:w-5">
              <p class="text-[13px] md:text-sm text-slate-500 font-semibold">
                ecanteen@gmail.com
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include './app/views/partials/_footer.php' ?>