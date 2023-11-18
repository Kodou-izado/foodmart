<?php
  include './config/init.php';
  $title = 'Message';
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

      <?php 
        if (Utilities::isCustomer()) { 
          $helper->query(
            'SELECT * FROM `messages` WHERE `sender_id` = ? OR `receiver_id` = ?', 
            [$_SESSION['uid'], $_SESSION['uid']]
          );
          $messages = $helper->fetchAll();
      ?>

        <div class="max-w-[500px] py-4 mx-auto">
          <div class="flex items-center gap-3 border border-gray-100 py-4 px-4 mb-4">
            <a href="<?= SYSTEM_URL ?>/message" class="flex items-center gap-3">
              <p class="text-sm text-black font-medium ml-auto">Foodmart</p>
            </a>
          </div>
          <div class="custom-scroll max-h-[calc(100svh-260px)] overflow-y-auto px-4">
            <?php 
              foreach ($messages as $messageContent) : 
            ?>

                <?php if ($messageContent->sender_id == $_SESSION['uid']) { ?>

                  <div class="w-max max-w-[80%] md:max-w-[320px] bg-gray-100 py-3 px-4 rounded-xl mb-2">
                    <p class="text-[10px] text-slate-500 font-medium"><?= $messageContent->message ?></p>
                  </div>

                <?php } else { ?>

                  <div class="w-max max-w-[80%] md:max-w-[320px] bg-secondary/80 py-3 px-4 rounded-xl mb-2 ml-auto">
                    <p class="text-[10px] text-primary font-medium"><?= $messageContent->message ?></p>
                  </div>
                  
                <?php } ?>

            <?php 
              endforeach 
            ?>

          </div>
  
          <div class="fixed bottom-20 md:bottom-6 left-1/2 -translate-x-1/2 w-[min(500px,90%)]">
            <form class="flex items-center gap-2" id="customer-message-form">
              <textarea name="message" class="custom-scroll resize-none w-full h-12 text-xs text-black placeholder:text-slate-500 border border-gray-100 rounded-sm p-3 outline-none" cols="30" rows="10" placeholder="Type your message here..."></textarea>
              <button type="submit" class="h-12 bg-primary px-6 rounded-sm disabled:cursor-progress" id="send-btn">
                <img src="<?= SYSTEM_URL ?>/public/icons/send.svg" alt="send" class="w-6 h-6">
              </button>
            </form>
          </div>
        </div>

      <?php 
          } 
        else { 
          $adminMessages = $message->get();

          if (count($adminMessages) > 0) {
            foreach ($adminMessages as $adminMessage) :
              $helper->query('SELECT * FROM `messages` WHERE `sender_id` = ? OR `receiver_id` = ? ORDER BY `id` DESC', [$adminMessage->sender_id, $adminMessage->sender_id]);
              $latest_message = $helper->fetch();
      ?>

          <div class="max-w-[500px] mx-auto mb-2">
            <a href="<?= SYSTEM_URL ?>/message/<?= $adminMessage->sender_id ?>" class="message-box">
              <img src="<?php echo SYSTEM_URL ?>/uploads/user/<?= strtolower($adminMessage->gender) ?>.svg" alt="profile" class="w-14 h-14">
              <div>
                <div class="flex items-center justify-between gap-2 mb-1">
                  <p class="text-sm text-black font-medium"><?= $adminMessage->fullname ?></p>
                  <span class="text-[9px] text-primary font-medium bg-secondary py-1 px-3 rounded-full"><?= empty($adminMessage->year_section) ? 'Teacher' : 'Student' ?></span>
                </div>
                <p class="text-[10px] text-slate-500 text-justify"><?= $latest_message->message ?></p>
              </div>
            </a>
          </div>

        <?php 
            endforeach;
          } else { 
        ?>

          <div class="grid place-items-center bg-gray-100 <?php echo Utilities::isCustomer() ? 'min-h-[95vh]' : 'min-h-[85vh]' ?> rounded-md">
            <div>
              <img src="<?= SYSTEM_URL ?>/public/icons/message.svg" alt="empty" class="mx-auto my-0 mb-2 w-10">
              <p class="text-xs text-slate-500 font-medium">No messages yet</p>
            </div>
          </div>

        <?php }  ?>
        
      <?php } ?>
    </section>
  </div>

<?php include 'partials/_footer.php' ?>