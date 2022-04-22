<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>
<body>
<div class="app">
    <header class="header">
        <div class="grid">
            <nav class="header__navbar">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon-link fas fa-bars"></i>
                        </a>
                    </li>
                    <li class="header__navbar-item header__navbar-item-name">
                        <span class="header__navbar-item-describe">TÊN CÂU LẠC BỘ</span>
                    </li>
                    <li class="header__navbar-item header__navbar-item-input">
                        <input type="search" class="header__search-input" placeholder="Nhập để tìm kiếm">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon-link fas fa-search"></i>
                        </a>
                    </li>
                </ul>
                <ul class="header__navbar-list">
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon-link fas fa-bell"></i>
                        </a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link header__navbar-item-avatar-link">
                            <img src="{{ asset('img/con_meo.jpg') }}" alt="" class="header__navbar-item-img">
                        </a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon-link fas fa-caret-down"></i>
                        </a>
                    </li>
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon-link fas fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
