// sidebar toggle js
const sidebarToggle = document.querySelector('.toggle-sidebar');

// active menu js
let slideUp = (target, duration = 500) => {
  if (target) {
    target.style.transitionProperty = 'height, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.boxSizing = 'border-box';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    window.setTimeout(() => {
      target.style.display = 'none';
      target.style.removeProperty('height');
      target.style.removeProperty('padding-top');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    }, duration);
  }
};

let slideDown = (target, duration = 500) => {
  if (target) {
    target.style.removeProperty('display');
    let display = window.getComputedStyle(target).display;

    if (display === 'none') display = 'flex';

    target.style.display = display;
    let height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.offsetHeight;
    target.style.boxSizing = 'border-box';
    target.style.transitionProperty = 'height, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    window.setTimeout(() => {
      target.style.removeProperty('height');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    }, duration);
  }
};

const url = window.location.href;

const urlLink = url.includes('#') ? url.split('#')[0] : url;
console.log('urlLink', urlLink);

const allList = document.querySelectorAll('.sidebar-list');
const submenuLinks = document.querySelectorAll('.sidebar-links a');
// const allLinks = document.querySelectorAll('.sidebar-list a');

submenuLinks.forEach((el) => {
  var linkHref = el.href;

  if (urlLink === linkHref) {
    el.classList.add('active');
    el.closest('.sidebar-list').classList.add('active');
  }
});

let elOpen;
allList.forEach((el) => {
  if (el.querySelector('.sidebar-submenu')) {
    el.querySelector('.icli').classList.add('show');
  }
  el.addEventListener('click', function () {
    allList.forEach((item) => {
      if (item !== el) {
        // console.log("CLASSLIST", item.classList.value.includes('active'),item.classList.value);
        if (item.classList.contains('active')) {
          slideUp(item.querySelector('.sidebar-submenu'));
        }
        item.classList.remove('active');
      }
    });
    el.classList.toggle('active');
    elOpen = el;

    if (el.classList.contains('active') && !wrapper.classList.contains('sidebar-close')) {
      slideDown(el.querySelector('.sidebar-submenu'));
    } else {
      slideUp(el.querySelector('.sidebar-submenu'));
    }
  });
});
const wrapper = document.querySelector('.page-wrapper');

// Sidebar Close Btn Js ///
const sidebarCloseBtn = document.querySelector('.sidebar-close-icon');
sidebarCloseBtn.addEventListener('click', function () {
  const pageWrapper = document.querySelector('.page-wrapper');
  pageWrapper.classList.add('sidebar-close');
  slideUp(elOpen?.querySelector('.sidebar-submenu'));
});

/// Responsive side bar ///
const pageWrapper = document.querySelector('.page-wrapper');
if (window.innerWidth <= 1200) {
  pageWrapper.classList.add('sidebar-close');
} else {
  pageWrapper.classList.remove('sidebar-close');
}

sidebarToggle.addEventListener('click', function () {
  wrapper.classList.toggle('sidebar-close');
  const slidDownEl = elOpen?.querySelector('.sidebar-submenu');
  if (elOpen && elOpen?.classList.contains('active') && !wrapper.classList.contains('sidebar-close')) {
    slideDown(slidDownEl);
  } else {
    slideUp(slidDownEl);
  }
});
