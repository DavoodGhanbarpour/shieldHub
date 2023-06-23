<?php

use App\Models\User;

return [
    'login' => [
        'login_to_your_account' => 'ورود به ناحیه کاربری',
        'remember' => 'مرا به خاطر بسپار',
        'sign_in' => 'ورود',
    ],
    'dashboard' => [
        'home' => 'خانه',
        'enable_dark_mode' => 'فعال سازی حالت تاریک',
        'enable_light_mode' => 'فعال سازی حالت روشن',
        'built_with' => 'Built with the :title theme.',
        'rights_reserved' => 'All rights reserved.',
    ],
    'auth' => [
        'user' => 'کاربر',
        'users' => 'کاربران',
        'role' => 'نقش',
        'name' => 'نام',
        'email' => 'پست الکترونیک',
        'email_address' => 'نشانی پست الکترونیک',
        'password' => 'گذرواژه',
        'show_password' => 'نمایش گذرواژه',
        'hide_password' => 'عدم نمایش گذرواژه',
        'generate_password' => 'ایجاد گذواژه',
        'roles' => [
            User::CUSTOMER => 'مشتری',
            User::ADMIN => 'ادمین',
        ],
        'login' => 'ورود',
        'logout' => 'خروج',
    ],
    'inbounds' => [
        'inbound' => 'ورودی',
        'inbounds' => 'ورودی ها',
        'link' => 'لینک',
        'description' => 'توضیحات',
        'title' => 'عنوان',
        'ip' => 'IP',
        'port' => 'Port',
    ],
    'pageComponents' => [
        'new' => 'جدید',
        'add' => 'افزودن',
        'edit' => 'ویرایش',
        'delete' => 'حذف',
        'copy' => 'کپی',
        'actions' => 'عملیات',
        'index' => 'ردیف',
        'submit' => 'ثبت',
        'cancel' => 'انصراف',
        'copied' => 'در کلیپبورد شما کپی شد',
    ],
];
