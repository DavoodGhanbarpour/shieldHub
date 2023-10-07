<?php

use App\Models\User;

return [
    'general' => [
        'link' => 'لینک',
        'description' => 'توضیحات',
        'title' => 'عنوان',
        'ip' => 'IP',
        'port' => 'Port',
        'date' => 'تاریخ',
        'quota' => 'مهلت',
        'debit' => 'بدهکاری',
        'price' => 'مبلغ',
        'credit' => 'بستانکاری',
        'total' => 'جمع',
        'remain' => 'مانده',
        'you_have_debt' => 'حساب شما (:price) بدهکار میباشد',
        'you_have_credit' => 'حساب شما (:price) بستانکار میباشد',
        'you_dont_have_credit_or_debt' => 'حساب شما فاقد بدهکاری/بستانکاری میباشد',
        'days_remain' => ':count روز مانده',
        'name' => 'نام',
        'email' => 'پست الکترونیک',
        'email_address' => 'آدرس پست الکترونیک',
        'users_count' => 'تعداد کاربران',
        'start_date' => 'تاریخ شروع',
        'end_date' => 'تاریخ پایان',
        'subscription_price' => 'مبلغ عضویت روزانه',
        'history' => 'تاریخچه',
        'last_days' => 'آخرین :count روز',
        'online_users' => ':count کاربر آنلاین',
    ],
    'reports' => [
        'report' => 'گزارش',
        'reports' => 'گزارشات',
    ],
    'visits' => [
        'visit' => 'بازدید',
        'visits' => 'بازدیدها',
    ],
    'messages' => [
        'server_has_children' => 'تعدادی ورودی به این سرور متصل میباشد',
    ],
    'login' => [
        'login_to_your_account' => 'ورود به ناحیه کاربری',
        'remember' => 'مرا به خاطر بسپار',
        'sign_in' => 'ورود',
    ],
    'passwords' => [
        'password' => 'گذرواژه',
        'show_password' => 'نمایش گذرواژه',
        'hide_password' => 'عدم نمایش گذرواژه',
        'generate_password' => 'تولید گذرواژه',
    ],
    'dashboard' => [
        'home' => 'خانه',
        'enable_dark_mode' => 'فعال سازی حالت تاریک',
        'enable_light_mode' => 'فعال سازی حالت روشن',
        'built_with' => 'ساخته شده با قالب :title.',
        'rights_reserved' => 'تمام حقوق محفوظ میباشد.',
    ],
    'auth' => [
        'user' => 'کاربر',
        'users' => 'کاربران',
        'role' => 'نقش',
        'roles' => [
            User::CUSTOMER => 'مشتری',
            User::CUSTOMER.'s' => 'مشتریان',
            User::ADMIN => 'ادمین',
            User::ADMIN.'s' => 'ادمین ها',
        ],
        'login' => 'ورود',
        'logout' => 'خروج',
        'last_visit' => 'آخرین بازدید',
    ],
    'inbounds' => [
        'inbound' => 'ورودی',
        'inbounds' => 'ورودی ها',
        'assign_inbounds' => 'تخصیص ورودی به :user',
        'available_inbounds' => 'ورودی های موجود (کانفیگ های VPN)',
        'inbounds_in_use' => ':count ورودی فعال',
        'inbounds_not_in_use' => ':count ورودی غیرفعال',
        'inbounds_clients' => 'نرم افزار های V2ray',
        'inbounds_count' => 'تعداد ورودی ها',
    ],
    'subscriptions' => [
        'subscription' => 'اشتراک',
        'subscriptions' => 'اشتراک ها',
    ],
    'servers' => [
        'server' => 'سرور',
        'servers' => 'سرور ها',
    ],
    'invoices' => [
        'invoice' => 'تراکنش',
        'invoices' => 'تراکنش ها',
        'invoices_history' => 'تاریخچه تراکنش ها',
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
        'not_copied' => 'عملیات کپی کردن با خطا مواجه شد',
        'clearAll' => 'حذف همه',
        'search' => 'جستجو',
    ],
    'platforms' => [
        'android' => 'اندروید',
        'windows' => 'ویندوز',
        'linux' => 'لینوکس',
        'ios' => 'اَپل',
        'mac' => 'مَک',
    ],
];
