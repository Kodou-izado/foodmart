addEvent('#create-account-form', 'submit', (e) => {
  e.preventDefault();
  disabled('.create-account', 'Creating account...', 'disabled');
  
  const formData = new FormData(e.target);
  
  request(
    SYSTEM_URL + '/app/handler/process_account_registration.php', 
    formData
  )
  .then(data => {
    disabled('.create-account', 'Create account', 'enabled');

    toast(data.message, data.type);

    if(data.type === 'success'){
      resetFields(e.target)
      setSelectValue('.custom-select-name', 'Select Gender', 'Select Gender');
    }
  })
})

addEvent('#login-form', 'submit', (e) => {
  e.preventDefault();
  disabled('.login-btn', 'Logging in...', 'disabled');

  const formData = new FormData(e.target);

  request(
    SYSTEM_URL + '/app/handler/process_account_login.php', 
    formData
  )
  .then(data => {
    disabled('.login-btn', 'Login', 'enabled');

    if(data.type === 'success'){
      location.href = SYSTEM_URL + '/menu';
      return
    }

    toast(data.message, data.type);
  })
})

addEvent('#add-menu-form', 'submit', (e) => {
  e.preventDefault();
  // disabled('.save-menu', 'Saving Menu...', 'disabled');

  const formData = new FormData(e.target);

  request(
    SYSTEM_URL + '/app/handler/process_saving_menu.php', 
    formData
  )
  .then(data => {
    disabled('.save-menu', 'Save Menu', 'enabled');

    toast(data.message, data.type);

    if(data.type === 'success'){
      resetFields(e.target);
      removeDynamicStyle('.custom-select-option', 'selected', 'multiple');
      setSelectValue('.custom-select-name', 'Select Category', 'Select Category');
      removeDynamicStyle('.tag-option', 'selected', 'multiple');
      hideUploadPreview();
    }
  })
})

addEvent('#update-menu-form', 'submit', (e) => {
  e.preventDefault();
  disabled('.update-menu', 'Updating Menu...', 'disabled');

  const formData = new FormData(e.target);

  request(
    SYSTEM_URL + '/app/handler/process_updating_menu.php', 
    formData
  )
  .then(data => {
    disabled('.update-menu', 'Update Menu', 'enabled');

    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('.confirm-menu', 'click', (e) => {

  request(
    SYSTEM_URL + '/app/handler/process_deleting_menu.php', 
    'id=' + e.target.dataset.value,
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('.menu-filter', 'click', (e) => {
  request(
    SYSTEM_URL + '/app/handler/process_filtering_menu.php', 
    'filter=' + e.target.dataset.value,
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('.confirm-verify', 'click', (e) => {
  request(
    SYSTEM_URL + '/app/handler/process_changing_account_status.php', 
    'id=' + e.target.dataset.value + '&status=Verified',
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('.confirm-unverify', 'click', (e) => {
  request(
    SYSTEM_URL + '/app/handler/process_changing_account_status.php', 
    'id=' + e.target.dataset.value + '&status=Unverified',
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('.confirm-block', 'click', (e) => {
  request(
    SYSTEM_URL + '/app/handler/process_changing_account_status.php', 
    'id=' + e.target.dataset.value + '&status=Blocked',
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('.account-filter', 'click', (e) => {
  request(
    SYSTEM_URL + '/app/handler/process_filtering_accounts.php', 
    'filter=' + e.target.dataset.value,
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('.buy-btn', 'click', (e) => {
  request(
    SYSTEM_URL + '/app/handler/process_buying_menu.php', 
    'id=' + e.target.dataset.value,
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('.add', 'click', (e) => {
  const quantity = setQuantity(e.target, 'add');

  request(
    SYSTEM_URL + '/app/handler/process_cart_item_quantity.php', 
    'id=' + e.target.dataset.value + '&quantity=' + quantity,
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    if(data.type === 'success'){
      location.reload();
      return
    }

    toast(data.message, data.type);
  })
})

addEvent('.subtract', 'click', (e) => {
  const quantity = setQuantity(e.target, 'subtract');
  
  request(
    SYSTEM_URL + '/app/handler/process_cart_item_quantity.php', 
    'id=' + e.target.dataset.value + '&quantity=' + quantity,
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    if(data.type === 'success'){
      location.reload();
      return
    }

    toast(data.message, data.type);
  })
})

addEvent('#cart-form', 'submit', (e) => {
  e.preventDefault();
  disabled('.place-order', 'Processing your order...', 'disabled');

  const formData = new FormData(e.target);

  request(
    SYSTEM_URL + '/app/handler/process_placing_order.php', 
    formData
  )
  .then(data => {
    disabled('.place-order', 'Place Order', 'enabled');

    if(data.type === 'success'){
      orderSuccess('add');
      return
    }
    
    toast(data.message, data.type);
  })
})

addEvent('#account-form', 'submit', (e) => {
  e.preventDefault();
  disabled('.save-information', 'Saving...', 'disabled');

  const formData = new FormData(e.target);

  request(
    SYSTEM_URL + '/app/handler/process_saving_information.php', 
    formData
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('#security-form', 'submit', (e) => {
  e.preventDefault();
  disabled('.change-pass', 'Changing Password...', 'disabled');
  
  const formData = new FormData(e.target);
  
  request(
    SYSTEM_URL + '/app/handler/process_changing_password.php', 
    formData
    )
    .then(data => {
      disabled('.change-pass', 'Change Password', 'enabled');

      toast(data.message, data.type);

      if(data.type === 'success'){
        resetFields(e.target)
      }
  })
})

addEvent('.order-row', 'click', (e) => {
  request(
    SYSTEM_URL + '/app/handler/process_getting_order_items.php', 
    'id=' + e.target.parentElement.dataset.value,
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    let amount = 0;

    const wrapper = document.querySelector('.order-wrapper');
    const total = document.querySelector('.orders-total');

    for(const item of data){
      amount += item.menu_price * item.quantity;
      wrapper.insertAdjacentHTML('afterbegin', `
        <div class="flex items-center gap-3 mb-2 last:mb-0">
          <div class="w-16 h-16 grid place-items-center bg-gray-200 p-2 rounded-2xl shrink-0">
            <img 
              src="${SYSTEM_URL}/uploads/menu/${item.menu_id}.png" 
              alt="${item.menu_name}" 
              class="h-12"
            >
          </div>
          <div class="ml-4">
            <p class="text-sm text-dark-gray font-semibold mb-1">
              ${item.menu_name}
            </p>
            <p class="text-[10px] text-slate-500 font-medium">
              ₱ ${item.menu_price}.00 only
            </p>
          </div>
          <p class="text-sm text-dark-gray font-medium ml-auto mr-4">
              x${item.quantity}
            </p>
        </div>
      `)
    }

    total.textContent = `₱ ${amount}`;

    showHideDialog('#items-dialog', 'show');
  })
});

addEvent('.confirm-status', 'click', (e) => {
  const values = e.target.dataset.value.split(',');
  request(
    SYSTEM_URL + '/app/handler/process_changing_order_status.php', 
    'id=' + values[1] + '&status=' + values[0],
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})

addEvent('.order-filter', 'click', (e) => {
  request(
    SYSTEM_URL + '/app/handler/process_filtering_orders.php', 
    'filter=' + e.target.dataset.value,
    {
      'Content-type': 'application/x-www-form-urlencoded'
    }
  )
  .then(data => {
    toast(data.message, data.type);

    if(data.type === 'success'){
      setTimeout(() => {
        location.reload();
      }, 3000);
    }
  })
})