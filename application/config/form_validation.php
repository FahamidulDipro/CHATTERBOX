<?php
$config = [
    'add_user_rule' => [
        [
            'field' => 'uname',
            'label' => 'Username',
            'rules' => 'required|is_unique[users.uname]'
        ],

        [
            'field' => 'passwd',
            'label' => 'Password',
            'rules' => 'required'
        ],

        [
            'field' => 'cpasswd',
            'label' => 'Confirm Password',
            'rules' => 'required|matches[passwd]'
        ]
    ],

    'add_login_rule' => [
        [
            'field' => 'uname',
            'label' => 'Username',
            'rules' => 'required'
        ],

        [
            'field' => 'passwd',
            'label' => 'Password',
            'rules' => 'required'
        ],
    ],
    
];
?>