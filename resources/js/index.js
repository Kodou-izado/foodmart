showLoader();

window.addEventListener('load', () => {
  hideLoader();
})

window.addEventListener("DOMContentLoaded", () => {
  const paginationWrapper = document.querySelector(".pagination-wrapper");
  if (paginationWrapper !== null) {
    pagination(".search-area", "div", 9);
  }
})

addEvent("body", "click", () => {
  const notification = document.querySelector(".notification");
  if(notification !== null) {
    animated(".notification", {
      opacity: "0%",
      visibility: "hidden"
    }, {
      duration: 100,
      easing: "ease-in",
      fill: "forwards"
    })
  }
})

addEvent('.password-toggler', 'click', (e) => 
  showHidePassword(e, "#password-input")
)

addEvent('.search', 'click', (e) => {
  e.stopPropagation();
  addDynamicStyle('.searchbar', 'show', 'add');
  const input = document.querySelector('#search');
  setTimeout(() => {
    input.focus();
  }, 100);
})

addEvent('.search-wrapper', 'click', (e) => {
  e.stopPropagation();
})

addEvent('#search', 'keyup', (e) => {
  search(e, 'card');
})

addEvent('#table-search', 'keyup', (e) => {
  search(e, 'table');
})

addEvent('body', 'click', () => {
  addDynamicStyle('.searchbar', 'show', 'remove');
})

addEvent('.filter', 'click', () => {
  addDynamicStyle('.filter-dropdown', 'show', 'toggle');
})

addEvent('.filter-option', 'click', (e) => {
  removeDynamicStyle('.filter-option', 'selected', 'multiple');
  e.target.classList.add('selected');
  const value = setSelectValue('.filter-name', e.target.outerText, 'Filter by categories');
})

addEvent('.order-history', 'click', (e) => {
  removeDynamicStyle('.order-history', 'show-details', 'multiple');
  e.target.classList.add('show-details');
})

addEvent('.cancel-order-btn', 'click', (e) => { 
  e.stopPropagation(); 
  showHideDialog('#cancel-order-dialog', 'show', e.target.dataset.value);
});

addEvent('.file-upload', 'click', () => {
  showFileDialog('.upload-input');
})

addEvent('.upload-input', 'change', (e) => {
  previewUpload(e, '.preview-img', '.upload-icon');
})

addEvent('.order-type', 'click', (e) => {
  removeDynamicStyle('.order-type', 'bg-secondary', 'multiple');
  e.target.classList.add('bg-secondary');
  setInputValue(e.target, e.target.textContent);

  if(e.target.textContent.trim() === "Delivery"){
    addDynamicStyle('.delivery', 'hidden', 'remove');
  } else{
    addDynamicStyle('.delivery', 'hidden', 'add');
  }
})

addEvent('.payment-method', 'click', (e) => {
  removeDynamicStyle('.payment-method', 'bg-secondary', 'multiple');
  e.target.classList.add('bg-secondary');
  setInputValue(e.target, e.target.textContent);
  showGcashDetails(e.target.textContent);
})

addEvent('.copy-btn', 'click', async (e) => {
  try{
    const accountNo = document.querySelector('.account-num');
    accountNo.removeAttribute('disabled');

    // await navigator.clipboard.writeText(accountNo.textContent);
    accountNo.select();
    accountNo.setSelectionRange(0, 99999);

    document.execCommand('copy');

    e.target.innerHTML = 'Copied';
    setTimeout(() => {
      accountNo.setAttribute('disabled', '');
      e.target.innerHTML = `<img src="${SYSTEM_URL}/public/icons/copy-linear.svg" alt="copy" class="w-4 pointer-events-none">`;
    }, 1300);
  } catch(error){
    console.error('Failed to copy text' + error);
  }
})

addEvent('.receipt-btn', 'click', (e) => {
  e.stopPropagation();

  const path = SYSTEM_URL + `/uploads/receipt/${e.target.dataset.value}.jpg`;

  showHideModal('#receipt-modal', 'show', path);
})

addEvent('.view-id', 'click', (e) => {
  const value = e.target.dataset.value;
  const path = SYSTEM_URL + `/uploads/valid_id/${value}.jpg`;

  showHideModal('#valid-id-modal', 'show', path);
})

addEvent('.modal', 'click', (e) => {
  showHideModal(e.target.dataset.target, 'hide');
})

addEvent('.status-btn', 'click', (e) => {
  e.stopPropagation();
})

addEvent('.status-option', 'click', (e) => {
  e.stopPropagation();
  showHideDialog('.dialog', 'show', [e.target.textContent.trim(), e.target.dataset.value]);
})

addEvent('.delete-menu', 'click', (e) => {
  const value = e.target.dataset.menu;
  
  showHideDialog('#menu-dialog', 'show', value);
});

addEvent('.verify', 'click', (e) => {
  const value = e.target.dataset.value;
  
  showHideDialog('#verify-dialog', 'show', value);
});

addEvent('.unverify', 'click', (e) => {
  const value = e.target.dataset.value;
  
  showHideDialog('#unverify-dialog', 'show', value);
});

addEvent('.block-btn', 'click', (e) => {
  const value = e.target.dataset.value;
  
  showHideDialog('#block-dialog', 'show', value);
});

addEvent('.delete-user', 'click', (e) => {
  const value = e.target.dataset.value;
  
  showHideDialog('#delete-user-dialog', 'show', value);
});

addEvent('.close-dialog', 'click', (e) => {
   showHideDialog(e.target.dataset.target, 'hide');

   setTimeout(() => {
     const wrapper = document.querySelector('.order-wrapper');
     wrapper.innerHTML = '';
   }, 600);
})

addEvent('.toast-close', 'click', () => {
  const toast = document.querySelector('.toast');

  setTimeout(() => {
    toast.classList.remove('success');
    toast.classList.remove('error');
  }, 300);
})

addEvent('.custom-select', 'click', () => {
  addDynamicStyle('.custom-select-dropdown', 'show', 'toggle');
})

addEvent('.custom-select-option', 'click', (e) => {
  removeDynamicStyle('.custom-select-option', 'selected', 'multiple');
  e.target.classList.add('selected');
  setSelectValue('.custom-select-name', e.target.outerText, 'Select Category');
  setInputValue(e.target, e.target.dataset.value);
})

addEvent('.tag-option', 'click', (e) => {
  removeDynamicStyle('.tag-option', 'selected', 'multiple');
  e.target.classList.add('selected');
  setInputValue(e.target, e.target.outerText);
})

addEvent('.numeric', 'keypress', (e) => {
  var theEvent = e || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode (key);
  var regex = /[0-9]|\./;
  if ( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
  }
})

addEvent('.okay-btn', 'click', () => {
  location.reload();
})

addEvent('.edit-btn', 'click', () => {
  const disabled = document.querySelectorAll('[disabled]');
  const select = document.querySelector('.custom-select');
  const submitBtn = document.querySelector('.save-information');

  disabled.forEach(input => input.removeAttribute('disabled'));
  select.classList.remove('pointer-events-none');
  submitBtn.classList.remove('hidden');
})

addEvent('.delivery-toggler', 'click', ({ target }) => {
  target.classList.toggle('active');

  const deliveryInput = document.querySelector('.delivery-status');
  deliveryInput.value = target.classList.contains('active') ? 1 : 0;
})

addEvent(".show-notification", "click", (e) => {
  e.stopPropagation();
  animated(".notification", {
    opacity: "100%",
    visibility: "visible"
  }, {
    duration: 100,
    easing: "ease-in",
    fill: "forwards"
  })
})

addEvent(".notification", "click", (e) => {
  e.stopPropagation();
})