const SYSTEM_URL = 'http://localhost/projects/foodmart';
// const SYSTEM_URL = 'http://192.168.254.150/projects/foodmart';

function isExist(elem){
  return elem !== null ? true : false;
}

function addDynamicStyle(target, style, type = 'add'){
  const elem = document.querySelector(target);

  if(!isExist(elem)) return

  if(type === 'add'){
    elem.classList.add(style);
    return
  }
  
  if(type === 'remove'){
    elem.classList.remove(style);
    return
  }
  
  elem.classList.toggle(style);
}

function removeDynamicStyle(target, style, type = 'single'){
  const elem = type === 'single' ? document.querySelector(target) : document.querySelectorAll(target);

  if(type === 'multiple'){
    elem.forEach((element) => {
      element.classList.remove(style);
    })
    return;
  }

  elem.classList.remove(style);
}

function showLoader(){
  const loader = document.querySelector('.loader');
  loader.classList.add('transition-all');
  loader.classList.add('show');
}

function hideLoader(){
  const loader = document.querySelector('.loader');
  loader.classList.add('transition-all');
  loader.classList.remove('show');
}

function showHideModal(elem, action, value = ''){
  const modal = document.querySelector(elem);
  modal.classList.add('transition-all');
  
  if(action === "show"){
    const img = modal.querySelector('img');
    img.src = value;
  }
  
  setTimeout(() => {
    action === "show" ? modal.classList.add("show") : modal.classList.remove("show");
  }, 300);
}

function showHideDialog(elem, action, value = ''){
  const dialog = document.querySelector(elem);
  dialog.classList.add('transition-all');
  
  const confirm = dialog.querySelector('.confirm');
  if(isExist(confirm)){
    confirm.setAttribute('data-value', value);
  }
  
  setTimeout(() => {
    action === "show" ? dialog.classList.add("show") : dialog.classList.remove("show");
  }, 300);
}

function toast(message, type){
  const toast = document.querySelector('.toast');
  const icon = document.querySelector('.toast-icon');
  const content = document.querySelector('.toast-message');

  toast.classList.add('transition-all');
  toast.classList.add(type);

  icon.src = type === "success"
    ? SYSTEM_URL + "/public/icons/tick-circle-bold.svg"
    : SYSTEM_URL + "/public/icons/info-circle-bold.svg";
  icon.alt = type;

  content.textContent = message;

  setTimeout(() => {
    toast.classList.remove(type);
  }, 2500);
}

function addEvent(elem, type, callback){
  const targets = document.querySelectorAll(elem);

  if(targets.length === 0) return

  if(targets.length && targets.length > 1){
    targets.forEach((target) => target.addEventListener(type, callback));
    return
  }

  targets[0].addEventListener(type, callback);
}

function showHidePassword(event, target){
  event.target.classList.toggle('password-show');

  const input = document.querySelector(target);
  input.type = input.type === "password" ? "text" : "password";
}

function setSelectValue(nameElem, value, defaultValue, selectElem = null){
  const exception = ['Clear filter'];

  const name = document.querySelector(nameElem);

  if(exception.includes(value)){
    name.textContent = defaultValue;
  } else{
    name.textContent = value;
  }

  if(selectElem !== null){
    const select = document.querySelector(selectElem);
    select.value = value;
    return
  }
  
  return value;
}

function setInputValue(parent, value){
  const finalValue = value.trim();
  const input = parent.parentElement.parentElement.querySelector('input');
  input.value = finalValue;
}

function showFileDialog(elem){
  const fileInput = document.querySelector(elem);
  fileInput.click();
}

function showGcashDetails(value){
  const finalValue = value.trim();
  const gcashContainer = document.querySelector('.gcash-details');

  if(finalValue === "GCash"){
    gcashContainer.classList.remove('hidden');
  } else {
    gcashContainer.classList.add('hidden');
  }
}

function previewUpload(e, imageTag, icon){
  const accepted = ['image/png', 'image/jpg', 'image/jpeg'];
  const { type } = e.target.files[0];

  if(!accepted.includes(type)){
    return toast('Accepts png and jpg type', 'error');
  }

  const img = document.querySelector(imageTag);
  const uploadIcon = document.querySelector(icon);

  const fileReader = new FileReader();

  fileReader.addEventListener('load', (e) => {
    img.removeAttribute('hidden');
    uploadIcon.classList.add('hidden');
    img.src = e.target.result;
  })

  fileReader.readAsDataURL(e.target.files[0]);
}

function hideUploadPreview(){
  const preview = document.querySelector('.preview-img');
  const uploadIcon = document.querySelector('.upload-icon');
  preview.setAttribute('hidden', '');
  uploadIcon.classList.remove('hidden');
}

function setQuery(name, value, type){
  const url = new URL(window.location.href);

  if(type === "set"){
    url.searchParams.set(name, value);
  } else {
    url.searchParams.delete('query');
  }

  window.history.replaceState(null, '', url.toString());
}

function resetFields(elem){
  const fields = elem.querySelectorAll('[reset-field]');
  
  fields.forEach(field => {
    field.value = '';
  })
}

function disabled(elem, label, type){
  const btn = document.querySelector(elem);
  btn.textContent = label;

  type === "enabled" ? btn.removeAttribute('disabled')  : btn.setAttribute('disabled', '');
}

function setQuantity(elem, type){
  const parent = elem.parentElement;
  const quantity = parent.querySelector('.item-quantity');
  let count = parseInt(quantity.textContent);

  if(type === "add"){
    count++;
    quantity.textContent = count;
    return count;
  }

  const cartItem = parent.parentElement;
  
  if(count > 1){
    count--;
    quantity.textContent = count;
    return count;
  } else{
    cartItem.remove();
    return count = 0;
  }
}

function orderSuccess(type){
  const orderSuccess = document.querySelector('.order-success');
  orderSuccess.classList.add('transition-all');

  if(type === "add"){
    orderSuccess.classList.add('show');
  } else {
    orderSuccess.classList.remove('show');
  }
}

function search(e, type){
  const searchAreas = document.querySelectorAll('.search-area');
  const matcher = new RegExp(e.target.value, 'i');

  searchAreas.forEach(searchArea => {
    const finders = searchArea.querySelectorAll('.finder1, .finder2, .finder3, .finder4, .finder5, .finder6');
    let shouldHide = true;

    finders.forEach(finder => {
      if (matcher.test(finder.textContent)) {
        shouldHide = false;
      }
    });

    if (shouldHide) {
      searchArea.style.display = 'none';
    } else {
      type === "table" ?
       searchArea.style.display = 'table-row' 
       : searchArea.style.display = 'block';
    }
  });
}

function animated(element, keyframes, options){
  const el = document.querySelector(element);
  el.animate(keyframes, options);
}

function pagination(elem, elemType, $max){
  const itemsPerPage = $max;
  let currentPage = 1;
  let numPages = 0;
  
  const listItems = document.querySelectorAll(elem);
  const container = document.querySelector(".pagination-wrapper");

  if(listItems.length > itemsPerPage){
    container.classList.remove("hidden");
    container.classList.add("flex");
  }
  
  function showPage(page) {
    currentPage = page;
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
  
    listItems.forEach((item, index) => {
      if (index >= startIndex && index < endIndex) {
        item.style.display = elemType === "table" ? 'table-row' : 'block';
      } else {
        item.style.display = 'none';
      }
    });
  
    updatePagination();
  }
  
  function updatePagination() {
    numPages = Math.ceil(listItems.length / itemsPerPage);
    const paginationList = document.querySelector('.page-wrapper');
    paginationList.innerHTML = '';
  
    let startPage = 1;
    let endPage = numPages;
  
    if (numPages > 2) {
      if (currentPage === 1) {
        endPage = 2;
      } else if (currentPage === numPages) {
        startPage = numPages - 1;
      } else {
        startPage = currentPage - 1;
        endPage = currentPage + 1;
      }
    }
    
    if (startPage > 1) {
      const pageLink = createPageLink(1);
      paginationList.appendChild(pageLink);
      if(startPage > 2){
        paginationList.appendChild(createEllipsis());
      }
    }
  
    for (let i = startPage; i <= endPage; i++) {
      const pageLink = createPageLink(i);
      paginationList.appendChild(pageLink);
    }
  
    if (endPage < numPages) {
      paginationList.appendChild(createEllipsis());
    }
  
    const prevButton = document.querySelector('.prev-btn');
    const nextButton = document.querySelector('.next-btn');
  
    prevButton.disabled = currentPage === 1;
    nextButton.disabled = currentPage === numPages;
  }
  
  function createPageLink(pageNumber) {
    const pageLink = document.createElement('a');
    pageLink.className = "page-link";
    pageLink.textContent = pageNumber;
    pageLink.href = '#';
    pageLink.addEventListener('click', function (event) {
      event.preventDefault();
      showPage(pageNumber);
    });
  
    if (pageNumber === currentPage) {
      pageLink.classList.add('active');
    }
  
    const listItem = document.createElement('li');
    listItem.appendChild(pageLink);
  
    return listItem;
  }
  
  function createEllipsis() {
    const ellipsis = document.createElement('span');
    ellipsis.className = "ellipsis";
    ellipsis.textContent = '...';
  
    const listItem = document.createElement('li');
    listItem.appendChild(ellipsis);
  
    return listItem;
  }
  
  const prevButton = document.querySelector('.prev-btn');
  const nextButton = document.querySelector('.next-btn');
  
  prevButton.addEventListener('click', function () {
    if (currentPage > 1) {
      showPage(currentPage - 1);
    }
  });
  
  nextButton.addEventListener('click', function () {
    if (currentPage < numPages) {
      showPage(currentPage + 1);
    }
  });
  
  showPage(currentPage);
}