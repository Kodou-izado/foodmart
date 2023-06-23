<div class="modal" id="receipt-modal" data-target="#receipt-modal">
  <img src="" alt="receipt" class="w-full md:w-[20rem] max-h-full md:h-[40rem]">
</div>

<div class="modal" id="valid-id-modal" data-target="#valid-id-modal">
  <img src="" alt="valid id" class="max-h-full md:h-[23rem]">
</div>

<div class="dialog" id="status-dialog">
  <div class="w-[min(25rem,90%)] bg-white rounded-md">
    <div class="flex items-center justify-between border-gray-100 border-b-2 py-4 px-6">
      <p class="text-sm text-dark-gray font-medium">
        Confirm
      </p>
      <button class="close-dialog" data-target="#status-dialog">
        <img src="<?php echo SYSTEM_URL ?>/public/icons/close-circle-linear.svg" alt="close" class="pointer-events-none">
      </button>
    </div>
    <div class="py-4 px-6">
      <p class="text-xs text-gray-500 mb-4">
        Please confirm if do you want to change the status of this order?
      </p>
      <button class="confirm confirm-status bg-emerald-500 text-xs text-white font-medium py-2 px-5 rounded-full">
        Confirm
      </button>
      <button class="close-dialog bg-gray-200 text-xs text-dark-gray font-medium py-2 px-5 rounded-full" data-target="#status-dialog">
        Cancel
      </button>
    </div>
  </div>
</div>

<div class="dialog" id="menu-dialog">
  <div class="w-[min(25rem,90%)] bg-white rounded-md">
    <div class="flex items-center justify-between border-gray-100 border-b-2 py-4 px-6">
      <p class="text-sm text-dark-gray font-medium">
        Confirm
      </p>
      <button class="close-dialog" data-target="#menu-dialog">
        <img src="<?php echo SYSTEM_URL ?>/public/icons/close-circle-linear.svg" alt="close" class="pointer-events-none">
      </button>
    </div>
    <div class="py-4 px-6">
      <p class="text-xs text-gray-500 mb-4">
        Please confirm if you really want to delete this menu?
      </p>
      <button class="confirm confirm-menu bg-emerald-500 text-xs text-white font-medium py-2 px-5 rounded-full">
        Confirm
      </button>
      <button class="close-dialog bg-gray-200 text-xs text-dark-gray font-medium py-2 px-5 rounded-full" data-target="#menu-dialog">
        Cancel
      </button>
    </div>
  </div>
</div>

<div class="dialog" id="verify-dialog">
  <div class="w-[min(25rem,90%)] bg-white rounded-md">
    <div class="flex items-center justify-between border-gray-100 border-b-2 py-4 px-6">
      <p class="text-sm text-dark-gray font-medium">
        Confirm
      </p>
      <button class="close-dialog" data-target="#verify-dialog">
        <img src="<?php echo SYSTEM_URL ?>/public/icons/close-circle-linear.svg" alt="close" class="pointer-events-none">
      </button>
    </div>
    <div class="py-4 px-6">
      <p class="text-xs text-gray-500 mb-4">
        Please confirm if you really want to verify this user?
      </p>
      <button class="confirm confirm-verify bg-emerald-500 text-xs text-white font-medium py-2 px-5 rounded-full">
        Confirm
      </button>
      <button class="close-dialog bg-gray-200 text-xs text-dark-gray font-medium py-2 px-5 rounded-full" data-target="#verify-dialog">
        Cancel
      </button>
    </div>
  </div>
</div>

<div class="dialog" id="unverify-dialog">
  <div class="w-[min(25rem,90%)] bg-white rounded-md">
    <div class="flex items-center justify-between border-gray-100 border-b-2 py-4 px-6">
      <p class="text-sm text-dark-gray font-medium">
        Confirm
      </p>
      <button class="close-dialog" data-target="#unverify-dialog">
        <img src="<?php echo SYSTEM_URL ?>/public/icons/close-circle-linear.svg" alt="close" class="pointer-events-none">
      </button>
    </div>
    <div class="py-4 px-6">
      <p class="text-xs text-gray-500 mb-4">
        Please confirm if you really want to unverify this user?
      </p>
      <button class="confirm confirm-unverify bg-emerald-500 text-xs text-white font-medium py-2 px-5 rounded-full">
        Confirm
      </button>
      <button class="close-dialog bg-gray-200 text-xs text-dark-gray font-medium py-2 px-5 rounded-full" data-target="#unverify-dialog">
        Cancel
      </button>
    </div>
  </div>
</div>

<div class="dialog" id="block-dialog">
  <div class="w-[min(25rem,90%)] bg-white rounded-md">
    <div class="flex items-center justify-between border-gray-100 border-b-2 py-4 px-6">
      <p class="text-sm text-dark-gray font-medium">
        Confirm
      </p>
      <button class="close-dialog" data-target="#block-dialog">
        <img src="<?php echo SYSTEM_URL ?>/public/icons/close-circle-linear.svg" alt="close" class="pointer-events-none">
      </button>
    </div>
    <div class="py-4 px-6">
      <p class="text-xs text-gray-500 mb-4">
        Please confirm if you really want to block this user?
      </p>
      <button class="confirm confirm-block bg-emerald-500 text-xs text-white font-medium py-2 px-5 rounded-full">
        Confirm
      </button>
      <button class="close-dialog bg-gray-200 text-xs text-dark-gray font-medium py-2 px-5 rounded-full" data-target="#block-dialog">
        Cancel
      </button>
    </div>
  </div>
</div>

<div class="dialog" id="items-dialog">
  <div class="w-[min(25rem,90%)] bg-white rounded-md">
    <div class="flex items-center justify-between border-gray-100 border-b-2 py-4 px-6">
      <p class="text-sm text-dark-gray font-medium">
        Orderred Menus
      </p>
      <button class="close-dialog" data-target="#items-dialog">
        <img src="<?php echo SYSTEM_URL ?>/public/icons/close-circle-linear.svg" alt="close" class="pointer-events-none">
      </button>
    </div>
    <div class="order-wrapper py-4 px-6 border-gray-100 border-b-2">
    </div>
    <div class="py-3 px-6 flex justify-between">
      <p class="text-xs text-slate-500 font-semibold">
        Total Amount
      </p>
      <p class="orders-total text-xs text-dark-gray font-semibold">
        ₱ 60.00
      </p>
    </div>
  </div>
</div>