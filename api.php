<?php

session_start();

// if client want to login, login.
if (!empty($_GET['login']))
{
    $_SESSION['login'] = true;
}

// if client want logout, logout for them.
if (!empty($_GET['logout']))
{
    unset($_SESSION['login']);
    $response = [
        'refresh_page' => true
    ];
    echo json_encode($response);
    exit;
}

if (isset($_SESSION['login']))
{
    $response = [
        'render' => [
            '.member_box' => 'You are user. You can logout with <a href="#logout" data-action="logout">Logout</a>.',
        ],
        'render_append' => [
            '.content' => ' This content for member.'
        ]
    ];

}
else
{
    $response = [];
}
echo json_encode($response);
?>