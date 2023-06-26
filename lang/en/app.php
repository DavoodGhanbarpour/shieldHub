<?php

use App\Models\User;

return [
    'login' => [
        'login_to_your_account' => 'Login to your account',
        'remember' => 'Remember me on this device',
        'sign_in' => 'Sign in',
    ],
    'dashboard' => [
        'home' => 'Home',
        'enable_dark_mode' => 'Enable dark mode',
        'enable_light_mode' => 'Enable light mode',
        'built_with' => 'Built with the :title theme.',
        'rights_reserved' => 'All rights reserved.',
    ],
    'auth' => [
        'user' => 'User',
        'users' => 'Users',
        'role' => 'Role',
        'name' => 'Name',
        'email' => 'Email',
        'email_address' => 'Email address',
        'password' => 'Password',
        'show_password' => 'Show password',
        'hide_password' => 'Hide password',
        'generate_password' => 'Generate Password',
        'roles' => [
            User::CUSTOMER => 'Customer',
            User::CUSTOMER.'s' => 'Customers',
            User::ADMIN => 'Admin',
            User::ADMIN.'s' => 'Admins',
        ],
        'login' => 'Login',
        'logout' => 'Logout',
        'last_visit' => 'Last visit',
    ],
    'inbounds' => [
        'inbound' => 'Inbound',
        'inbounds' => 'Inbounds',
        'link' => 'Link',
        'description' => 'Description',
        'title' => 'Title',
        'ip' => 'IP',
        'port' => 'Port',
        'assign_inbounds' => 'Assign Inbound(s) to :user',
        'date' => 'Date',
        'available_inbounds' => 'Available Inbound(s) (VPN configs)',
        'inbounds_in_use' => ':count Inbound(s) active',
        'inbounds_not_in_use' => ':count Inbound(s) idle',
        'quota' => 'Quota',
        'days_remain' => ':count day(s) remains',
        'inbounds_clients' => 'V2ray clients',
        'users_count' => 'Users count',
    ],
    'pageComponents' => [
        'new' => 'New',
        'add' => 'Add',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'copy' => 'Copy',
        'actions' => 'Actions',
        'index' => 'Index',
        'submit' => 'Submit',
        'cancel' => 'Cancel',
        'copied' => 'Copied to clipboard',
        'not_copied' => 'Coping to clipboard failed',
    ],
    'platform' => [
        'android' => 'Android',
        'windows' => 'Windows',
        'linux' => 'Linux',
        'ios' => 'IOS',
        'mac' => 'Mac',
    ],
];
