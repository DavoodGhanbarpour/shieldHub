/*-----------------------------------------------------------------------------------

 Template Name:Roxo
 Template URI: themes.pixelstrap.com/Roxo
 Description: This is Admin website
 Author: Pixelstrap
 Author URI: https://themeforest.net/user/pixelstrap

 ----------------------------------------------------------------------------------- */
// 01. Loader js
// 02. Tap to top js
// 03. Header search js
// 04. Dark mode js
// 05. RTL js
// 06. Header Drop Down Toggle js
// 07. Tabs Js
// 08. Copy Js
// 09. Countdown Js
// 10. Password Show hide js

// 12. Password Show hide js
// 13. Wishlist Remove js

(function () {
  const body = document.querySelector('body');

  /*====================
   02. Ratio js
=======================*/
  window.addEventListener('load', () => {
    const bgImg = document.querySelectorAll('.bg-img');
    for (i = 0; i < bgImg.length; i++) {
      let bgImgEl = bgImg[i];
      /// Optional Class Add ///
      if (bgImgEl.classList.contains('bg-top')) {
        bgImgEl.parentNode.classList.add('b-top');
      } else if (bgImgEl.classList.contains('bg-bottom')) {
        bgImgEl.parentNode.classList.add('b-buttom');
      } else if (bgImgEl.classList.contains('bg-center')) {
        bgImgEl.parentNode.classList.add('b-center');
      } else if (bgImgEl.classList.contains('bg-left')) {
        bgImgEl.parentNode.classList.add('b-left');
      } else if (bgImgEl.classList.contains('bg-right')) {
        bgImgEl.parentNode.classList.add('b-right');
      }

      /// Lazyloader Class Add ///
      if (bgImgEl.classList.contains('blur-up')) {
        bgImgEl.parentNode.classList.add('blur-up', 'lazyload');
      }

      /// Size Class Add ///
      if (bgImgEl.classList.contains('bg_size_content')) {
        bgImgEl.parentNode.classList.add('b_size_content');
      }

      /// Ratio Style ///
      bgImgEl.parentNode.classList.add('bg-size');
      const bgSrc = bgImgEl.src;
      bgImgEl.style.display = 'none';
      bgImgEl.parentNode.setAttribute(
        'style',
        `
        background-image: url(${bgSrc});
        background-size:cover;
        background-position: center;
        background-repeat: no-repeat;
        display: block;
        `,
      );
    }
  });

  /*=====================
     03. Header search js
   ==========================*/

  const searchIcon = document.querySelector('.search-icon');
  const groupInput = document.querySelector('.group-input');

  searchIcon?.addEventListener('click', function () {
    groupInput.classList.toggle('show');
  });

  /*=====================
     06. Todo List Edit Delete Js 
   ==========================*/

  const todoList = document.querySelectorAll('.todo-list');
  todoList?.forEach((el) => {
    const removeAttrFn = () => {
      el.querySelector('[contenteditable]')?.removeAttribute('contenteditable');
    };

    el.addEventListener('click', function (event) {
      const edit = event.target.closest('.edit');
      const remove = event.target.closest('.delete');
      const editRemove = event.target.closest('[contenteditable]');
      if (editRemove && !editRemove) {
        removeAttrFn();
      }
      if (!edit && !remove) return;
      console.log('Rmove');
      if (event.target === remove) {
        remove.closest('.todo-item').remove();
      }
      if (event.target === edit) {
        edit.closest('.todo-item').querySelector('h5').setAttribute('contenteditable', true);
        edit.closest('.todo-item').querySelector('h5').focus();
      }
    });
  });

  // color variant js //
  let colorOption = document.querySelectorAll('.color-variant li');
  // let dataImage = colorOption.getAttribute('data-image');
  // console.log(dataImage);
  colorOption?.forEach((el) => {
    el.addEventListener('click', function (event) {
      el.getAttribute('data-image');
      //    const dataImage = el.getAttribute('data-image');
      //    console.log(el.closest("img").setAttribute("src"));
      //    el.closest("img").setAttribute("src") = dataImage;
    });
  });

   /*=====================
    Header Drop Down Toggle
==========================*/
const headerDropdownMenu = document.querySelectorAll('.dropdown');
document.body.addEventListener('click', function (event) {
  const dropdownEl = event.target.closest('.dropdown');
  const visible = dropdownEl?.closest('.dropdown')?.classList.contains('show');
  const dropdownMenuElement = event.target.closest('.dropdown-menu');
  headerDropdownMenu.forEach((item) => {
    if (!dropdownMenuElement) {
      item.classList.remove('show');
    }
  });
  if (!dropdownEl) return;

  if (!visible && !dropdownEl.classList.contains('on-hover-show')) dropdownEl?.classList.add('show');
});

/*=====================
    Collapse Js
==========================*/

var accItem = document.getElementsByClassName('accordionItem');
var accHD = document.getElementsByClassName('accordionItemHeading');
for (i = 0; i < accHD.length; i++) {
  accHD[i].addEventListener('click', toggleItem, false);
}
function toggleItem() {
  var itemClass = this.parentNode.className;
  for (i = 0; i < accItem.length; i++) {
    accItem[i].className = 'accordionItem close';
  }
  if (itemClass == 'accordionItem close') {
    this.parentNode.className = 'accordionItem open';
  }
}

  /*=====================
     08. Tabs Js
   ==========================*/
  const tabs = document.querySelectorAll('.tabs');
  tabs?.forEach((tab) => {
    tab.addEventListener('click', function (event) {
      const navLink = event.target.closest('.tab-link');
      if (!navLink) return;
      const allNavLinks = navLink.closest('.tabs').querySelectorAll('.tab-link');
      allNavLinks.forEach((navLink) => {
        navLink.classList.remove('tab-active');
      });
      navLink.classList.add('tab-active');

      const currentTabContent = navLink.dataset.tabfilter;
      const tabContents = navLink.closest('.tabs').parentElement.querySelectorAll('.tab-pan');
      tabContents.forEach((tabContent) => {
        tabContent.classList.remove('active');
        setTimeout(() => {
          tabContent.classList.remove('show');
        }, 400);

        tabContent.classList.remove('show');
        if (tabContent.dataset.tabcontent === currentTabContent) {
          tabContent.classList.add('active');
          setTimeout(() => {
            tabContent.classList.add('show');
          }, 400);
        }
      });
    });
  });

  /*=====================
     09. Copy Js
   ==========================*/

  const copyBtn = document.querySelectorAll('.copyBtn');
  copyBtn?.forEach((copyBtn) => {
    copyBtn.addEventListener('click', copyFunction);
  });

/*=====================
    Countdown Js
==========================*/

window.addEventListener('load', () => {
  var countDownDate = new Date('Jan 5, 2023 15:37:25').getTime();
  var x = setInterval(function () {
    var now = new Date().getTime();
    var distance = countDownDate - now;

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="timer"
    const timerEl = document.querySelectorAll('.timer');
    timerEl.forEach((el) => {
      if (el.querySelector('.days')) {
        el.querySelector('.days').innerHTML = days;
      }
      if (el.querySelector('.hours')) {
        el.querySelector('.hours').innerHTML = hours;
      }
      if (el.querySelector('.minutes')) {
        el.querySelector('.minutes').innerHTML = minutes;
      }
      if (el.querySelector('.seconds')) {
        el.querySelector('.seconds').innerHTML = seconds;
      }
    });

    if (distance < 0) {
      clearInterval(x);
      document.getElementById('demo').innerHTML = 'EXPIRED';
    }
  }, 1000);
});

  /*=====================
     11. Checkbox indeterminate Js
   ==========================*/
  const checkboxIndeterminate = document.querySelectorAll('.indeterminate');
  checkboxIndeterminate.forEach((element) => {
    element.indeterminate = true;
  });

  /*==============================
    12. Password Show hide js 
 =====================================*/
  const showHideBtn = document.querySelectorAll('.showHidePassword');
  let activeEye = 1;
  for (let i = 0; i < showHideBtn.length; ++i) {
    showHideBtn[i].addEventListener('click', function () {
      let inputEl = showHideBtn[i].parentNode.querySelector('input');
      if (inputEl.type === 'password') {
        inputEl.type = 'text';
        activeEye = 2;
      } else {
        inputEl.type = 'password';
        activeEye = 1;
      }
      showHideBtn[i].src = `../../assets/images/icons/eye-${activeEye}.svg`;
    });
  }

  /*=====================
  13. Wishlist Remove js
  ==========================*/
  const wishlistProduct = document.querySelectorAll('.wishlist-box');
  wishlistProduct?.forEach((el) => {
    const deleteButton = el.querySelector('.delete-button');
    deleteButton.addEventListener('click', function () {
      this.closest('.col-span-2').style.display = 'none';
    });
  });

  /*=====================
  13. Sidebar Toggle js
  ==========================*/

  const sideBarToggleFun = (sideBarToggle, sidebarMenu, sideBarClose) => {
    const toggleSidebarFun = () => {
      sidebarMenu.classList.toggle('show');
    };
    sideBarToggle?.addEventListener('click', toggleSidebarFun);
    sideBarClose?.addEventListener('click', toggleSidebarFun);
  };

  //  Email Sidebar Toggle //
  const emailSideBarToggle = document.querySelector('.sidebar-toggle');
  const emailSidebarMenu = document.querySelector('.sidebar-menu');
  const emailSideBarClose = document.querySelector('.sidebar-close-btn');
  sideBarToggleFun(emailSideBarToggle, emailSidebarMenu, emailSideBarClose);

  //  Chat Sidebar Toggle //
  const chatSideBarToggle = document.querySelector('.chat-toggle');
  const chatSidebarMenu = document.querySelector('.chat-sidebar');
  const chatSideBarClose = document.querySelector('.chat-close-btn');
  sideBarToggleFun(chatSideBarToggle, chatSidebarMenu, chatSideBarClose);

  //  Chat Search  Toggle //
  const chatSearchToggle = document.querySelector('.chat-search-toggle');
  const chatSearchBox = document.querySelector('.chat-search-box');
  sideBarToggleFun(chatSearchToggle, chatSearchBox);

  //  Shop Sidebar Toggle //
  const shopSidebarToggle = document.querySelector('.shop-toggle');
  const shopSidebar = document.querySelector('.shop-sidebar');
  const shopCloseBtn = document.querySelector('.shop-close-sidebar');
  sideBarToggleFun(shopSidebarToggle, shopSidebar, shopCloseBtn);

  //  Product Sidebar Toggle //
  const productSidebarToggle = document.querySelector('.product-sidebar-toggle');
  const productSidebar = document.querySelector('.product-sidebar');
  const productCloseBtn = document.querySelector('.product-close-sidebar');
  sideBarToggleFun(productSidebarToggle, productSidebar, productCloseBtn);

  /*=====================
   13. Plus Minus js
  ==========================*/
  const plusMinus = document.querySelectorAll('.cart_qty');
  feather.replace();
  plusMinus.forEach((el) => {
    const addButton = el.querySelector('.plus');
    const subButton = el.querySelector('.minus');
    addButton?.addEventListener('click', function () {
      const inputEl = this.parentNode.querySelector("input[type='text']");

      if (inputEl.value < 100) {
        console.log(Number(inputEl.value));
        inputEl.value = Number(inputEl.value) + 1;
      }
    });
    subButton?.addEventListener('click', function () {
      const inputEl = this.parentNode.querySelector("input[type='text']");
      if (inputEl.value >= 1) {
        inputEl.value = Number(inputEl.value) - 1;
      }
    });
  });
})();
