<?php
include 'components/connect.php';

//$news_preview = mysqli_query($conn, "SELECT * FROM `news` ORDER BY `date` DESC LIMIT 3");
$categories = mysqli_query($conn, "SELECT * FROM `categories`");
$cases = mysqli_query($conn, "SELECT * FROM `cases`");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="foramt-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Портфолио</title>
</head>

<body>
    <header class="header gray" id="header">
        <div class="header__container container">
            <a href="index.php" class="header__logo logo">
                <svg width="82" height="50" viewBox="0 0 82 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 50H38.5L33.5 41.5H14.5L28.5 18L47.5 50H57L28.5 1L0 50Z" fill="#F5F5F5" />
                    <path d="M81 24.4997H51.5L56 32.4997H72.5C70.1 38.0997 64.1667 41.1664 61.5 41.9997L65.5 48.4997C79.5 44.4997 81.6667 30.833 81 24.4997Z" fill="#F5F5F5" />
                    <path d="M41 6.49969L45.5 12.9997C55.9 3.79969 67.1667 11.1664 71.5 15.9997H80.5C66.1 -6.80031 48.1667 0.166353 41 6.49969Z" fill="#F5F5F5" />
                </svg>
            </a>
            <nav class="header__menu menu">
                <ul class="header__menu-list menu-list">
                    <li class="header__menu-link menu-link">
                        <a href="index.php">
                            О компании
                        </a>
                    </li>
                    <li class="header__menu-link menu-link">
                        <a href="about.php">
                            Обо мне
                        </a>
                    </li>
                    <li class="header__menu-link menu-link">
                        <a href="portfolio.php">
                            Портфолио
                        </a>
                    </li>
                    <li class="header__menu-link menu-link">
                        <a href="#contacts">
                            Контакты
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="page">
        <section class="portfolio" id="portfolio">
            <div class="portfolio__container container">
                <h2 class="portfolio__title title title">
                    Портфолио
                </h2>
                <ul class="portfolio__nav">
                    <li class="portfolio__filter active__filter" id="vse">
                        Все
                    </li>
                    <?php foreach ($categories as $category) { ?>
                        <li class="portfolio__filter" id="<?= $category['eng_name'] ?>">
                            <?= $category['name'] ?>
                        </li>
                    <?php } ?>
                </ul>
                <div class="portfolio__content">
                    <?php foreach ($cases as $case) { ?>
                        <a href="case.php?id=<?= $case['id'] ?>" class="portfolio__item vse <?= $case['category'] ?>">
                            <img class="portfolio__img" src="img/cases/preview/<?= $case['preview'] ?>" alt="site">
                            <h3 class="portfolio__item-title">
                                <?= $case['name'] ?>
                            </h3>
                            <div class="portfolio__item-date">
                                <?php $dateOut = DateTime::createFromFormat('Y-m-d', $case['date'])->format('d.m.Y');
                                echo $dateOut; ?>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>
    <section class="contacts gray" id="contacts">
        <div class="contacts__container container">
            <h2 class="contacts__title title">
                Контакты
            </h2>
            <div class="contacts__content">
                <div class="contacts__text">
                    <ul class="contacts__list">
                        <li>
                            <a href="https://yandex.ru/maps/66/omsk/house/ulitsa_pushkina_67k1/Y0oYdQ9nSkMDQFtufXV2dX9jbA==/?ll=73.387364%2C54.974308&source=wizgeo&utm_medium=maps-desktop&utm_source=serp&z=17" class=" contacts__item" target="_blank">
                                <svg class="contacts__mark" width="35" height="36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_4519_1243)">
                                        <path d="M17.5.5C10.855.5 5.469 5.886 5.469 12.531 5.469 19.176 17.5 35.5 17.5 35.5s12.031-16.324 12.031-22.969S24.145.5 17.5.5zM7.656 12.531c0-5.428 4.416-9.844 9.844-9.844 5.428 0 9.844 4.416 9.844 9.844 0 3.781-5.471 12.91-9.844 19.206-4.373-6.296-9.844-15.425-9.844-19.206zM17.5 7.062A5.468 5.468 0 1017.5 18a5.468 5.468 0 100-10.938zm0 8.75a3.285 3.285 0 01-3.281-3.28A3.285 3.285 0 0117.5 9.25a3.285 3.285 0 013.281 3.281 3.285 3.285 0 01-3.281 3.281z" fill="#f5f5f5" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4519_1243">
                                            <path fill="#fff" transform="translate(0 .5)" d="M0 0h35v35H0z" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                г. Омск, Пушкина 67/1, офис 618
                            </a>
                        </li>
                        <li>
                            <a href="mailto: i@gubert.ru" class="contacts__item">
                                <svg class="contacts__mark" width="35" height="36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_4519_1247)" fill="#f5f5f5">
                                        <path d="M30.369.5H4.631C2.077.5 0 2.536 0 5.04v18.92c0 2.504 2.077 4.54 4.631 4.54h25.738c2.553 0 4.631-2.036 4.631-4.54V5.04C35 2.535 32.922.5 30.369.5zm1.803 23.46c0 .975-.809 1.768-1.803 1.768H4.631c-.994 0-1.803-.793-1.803-1.767V5.039c0-.974.809-1.767 1.803-1.767h25.738c.994 0 1.803.793 1.803 1.767v18.922z" />
                                        <path d="M34.744 7.538a1.414 1.414 0 00-1.969-.348L17.5 17.883 2.225 7.19A1.414 1.414 0 10.603 9.507l16.086 11.26a1.412 1.412 0 001.622 0l16.086-11.26c.64-.448.795-1.33.347-1.97z" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4519_1247">
                                            <path fill="#fff" transform="translate(0 .5)" d="M0 0h35v35H0z" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                i@gubert.ru
                            </a>
                        </li>
                        <li>
                            <a href="tel: +79139887007" class="contacts__item">
                                <svg class="contacts__mark" width="35" height="36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_4519_1238)" fill="#f5f5f5">
                                        <path d="M25.65 35.085a17.294 17.294 0 01-4.04-.51c-4.564-1.1-9.264-3.894-13.232-7.866C4.41 22.738 1.613 18.037.512 13.477c-1.16-4.797-.333-8.9 2.326-11.56l.759-.759a3.674 3.674 0 015.19 0L13.15 5.52a3.672 3.672 0 010 5.19l-2.576 2.576c1.235 2.168 2.915 4.337 4.901 6.323 1.986 1.986 4.157 3.667 6.324 4.902l2.576-2.577a3.67 3.67 0 015.19 0l4.362 4.362a3.67 3.67 0 010 5.19l-.76.759c-1.875 1.877-4.469 2.84-7.516 2.84zM6.192 2.695a1.045 1.045 0 00-.748.31l-.76.759c-1.99 1.991-2.572 5.223-1.637 9.097.99 4.102 3.538 8.366 7.174 12.001 3.636 3.636 7.899 6.181 12.002 7.174 3.875.935 7.105.354 9.096-1.637l.76-.76a1.059 1.059 0 000-1.496l-4.361-4.361a1.059 1.059 0 00-1.497 0l-3.265 3.265a1.306 1.306 0 01-1.524.237c-2.677-1.384-5.376-3.4-7.804-5.828-2.43-2.43-4.44-5.126-5.828-7.803a1.306 1.306 0 01.236-1.524l3.266-3.265a1.058 1.058 0 000-1.497L6.941 3.005a1.05 1.05 0 00-.749-.31z" />
                                        <path d="M27.045 19.386a1.306 1.306 0 01-1.306-1.306A8.651 8.651 0 0017.1 9.44a1.306 1.306 0 010-2.612c6.204 0 11.252 5.05 11.252 11.253a1.306 1.306 0 01-1.306 1.306z" />
                                        <path d="M32.564 19.387a1.306 1.306 0 01-1.305-1.306c0-7.808-6.356-14.16-14.16-14.16a1.306 1.306 0 010-2.612c9.248 0 16.771 7.524 16.771 16.772a1.306 1.306 0 01-1.306 1.306z" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4519_1238">
                                            <path fill="#fff" transform="translate(0 .5)" d="M0 0h35v35H0z" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                +7 (913) 988 70 07
                            </a>
                        </li>
                        <li class="contacts__item-social">
                            <a class="social" href="#">
                                <svg width="35" height="20" viewBox="0 0 35 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M34.8145 18.0499C34.7721 17.9586 34.7326 17.8828 34.6959 17.8221C34.0886 16.7284 32.9282 15.386 31.2153 13.7945L31.1791 13.7581L31.1609 13.7402L31.1426 13.7219H31.1242C30.3468 12.9808 29.8545 12.4825 29.6484 12.2274C29.2712 11.7414 29.1866 11.2495 29.3928 10.751C29.5385 10.3745 30.0856 9.57918 31.0329 8.3641C31.5312 7.72015 31.9258 7.20405 32.2173 6.81521C34.3192 4.02087 35.2304 2.23525 34.9509 1.45764L34.8423 1.27593C34.7693 1.16653 34.581 1.06645 34.2777 0.975175C33.9736 0.884094 33.585 0.869032 33.111 0.929731L27.8629 0.965984C27.7779 0.935858 27.6565 0.938666 27.4984 0.975175C27.3404 1.01168 27.2614 1.03 27.2614 1.03L27.17 1.07564L27.0975 1.13047C27.0368 1.16672 26.9699 1.23048 26.897 1.32163C26.8244 1.41245 26.7637 1.51904 26.7152 1.64051C26.1438 3.11051 25.4942 4.47723 24.7651 5.74062C24.3156 6.49397 23.9027 7.14686 23.5257 7.69966C23.1492 8.25228 22.8333 8.65943 22.5784 8.92042C22.3231 9.18166 22.0927 9.39095 21.8857 9.54905C21.6791 9.70721 21.5214 9.77404 21.4122 9.74959C21.3027 9.72515 21.1997 9.70089 21.1021 9.67664C20.9321 9.56724 20.7954 9.41846 20.6923 9.23017C20.5888 9.04188 20.5191 8.80489 20.4826 8.51939C20.4464 8.2337 20.4249 7.98797 20.4188 7.78136C20.4131 7.57501 20.4157 7.28313 20.4281 6.90655C20.4407 6.52978 20.4464 6.27486 20.4464 6.1412C20.4464 5.67948 20.4554 5.17837 20.4734 4.63776C20.4918 4.09714 20.5067 3.6688 20.5191 3.35324C20.5315 3.03736 20.5373 2.70316 20.5373 2.35084C20.5373 1.99851 20.5158 1.72221 20.4734 1.52166C20.4316 1.32137 20.3673 1.12696 20.2826 0.938475C20.1974 0.750185 20.0727 0.604532 19.909 0.501133C19.7451 0.397861 19.5412 0.315907 19.2986 0.255016C18.6546 0.109299 17.8346 0.0304727 16.8382 0.0182179C14.5787 -0.00603635 13.1268 0.139872 12.483 0.455751C12.2278 0.589214 11.997 0.771567 11.7906 1.00224C11.5718 1.26961 11.5413 1.41552 11.6992 1.43952C12.4283 1.54872 12.9444 1.80997 13.2481 2.22299L13.3576 2.44185C13.4427 2.59976 13.5277 2.87933 13.6128 3.28016C13.6978 3.68099 13.7526 4.1244 13.7767 4.61012C13.8374 5.49712 13.8374 6.25641 13.7767 6.88804C13.7159 7.51993 13.6585 8.01184 13.6036 8.36417C13.5488 8.71649 13.4668 9.00199 13.3576 9.2206C13.2481 9.43927 13.1753 9.57292 13.1388 9.62143C13.1023 9.66994 13.0719 9.70051 13.0478 9.71251C12.8899 9.77302 12.7257 9.80385 12.5557 9.80385C12.3855 9.80385 12.1791 9.7187 11.9361 9.54854C11.6933 9.37838 11.4412 9.14464 11.18 8.84695C10.9187 8.5492 10.6241 8.13311 10.296 7.59863C9.96811 7.06414 9.62791 6.43244 9.27558 5.70354L8.98409 5.17492C8.80186 4.83485 8.55294 4.33969 8.23706 3.68986C7.92098 3.03979 7.64161 2.41096 7.39875 1.80352C7.30167 1.5484 7.15583 1.35418 6.96148 1.22053L6.87027 1.1657C6.80963 1.11719 6.71229 1.06568 6.57877 1.01079C6.44505 0.955963 6.30553 0.916646 6.15962 0.892455L1.1665 0.928709C0.656268 0.928709 0.310071 1.0443 0.127782 1.27516L0.0548273 1.38437C0.0183822 1.4452 0 1.54234 0 1.67606C0 1.80971 0.0364452 1.97375 0.109399 2.16797C0.838303 3.88109 1.63097 5.53325 2.4874 7.12471C3.34383 8.71617 4.08805 9.99814 4.71962 10.9695C5.35131 11.9415 5.9952 12.8589 6.65128 13.7212C7.30735 14.5838 7.74163 15.1366 7.95411 15.3795C8.16685 15.6228 8.33395 15.8047 8.45541 15.9261L8.91107 16.3634C9.20263 16.655 9.63078 17.0043 10.1957 17.4112C10.7608 17.8183 11.3863 18.2192 12.0727 18.6143C12.7593 19.0088 13.5579 19.3308 14.4692 19.5798C15.3803 19.829 16.2671 19.929 17.1297 19.8808H19.2254C19.6505 19.8441 19.9725 19.7104 20.1913 19.4798L20.2638 19.3884C20.3126 19.3159 20.3582 19.2033 20.4004 19.0517C20.443 18.8998 20.4642 18.7325 20.4642 18.5506C20.4517 18.0283 20.4915 17.5575 20.5824 17.1385C20.6732 16.7195 20.7767 16.4036 20.8925 16.1909C21.0082 15.9783 21.1388 15.799 21.2842 15.6536C21.4298 15.5079 21.5336 15.4196 21.5945 15.3892C21.655 15.3586 21.7033 15.3379 21.7398 15.3255C22.0313 15.2283 22.3745 15.3224 22.7697 15.6081C23.1646 15.8936 23.535 16.2462 23.8814 16.6651C24.2277 17.0845 24.6437 17.5549 25.1296 18.0772C25.6157 18.5997 26.0408 18.9881 26.4051 19.2436L26.7695 19.4623C27.0128 19.6082 27.3286 19.7418 27.7175 19.8633C28.1056 19.9847 28.4457 20.0151 28.7377 19.9544L33.4026 19.8816C33.864 19.8816 34.223 19.8052 34.4777 19.6536C34.7329 19.5018 34.8845 19.3345 34.9334 19.1525C34.9821 18.9704 34.9847 18.7637 34.9426 18.5326C34.8994 18.3022 34.8568 18.141 34.8145 18.0499Z" fill="#f5f5f5" />
                                </svg>
                            </a>
                            <a class="social" href="#">
                                <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.4605 0.00390625H10.5063C5.00564 0.00390625 0.572266 4.4379 0.572266 9.91314V21.8131C0.572266 27.2887 5.00564 31.791 10.5063 31.791H22.4605C27.9611 31.791 32.4961 27.2887 32.4961 21.8131V9.91314C32.4961 4.4379 27.9611 0.00390625 22.4605 0.00390625ZM29.4883 21.8131C29.4883 25.6404 26.3053 28.7832 22.4605 28.7832H10.5063C6.6611 28.7832 3.51172 25.6404 3.51172 21.8131V9.91314C3.51172 6.08604 6.6611 2.94336 10.5063 2.94336H22.4605C26.3053 2.94336 29.4883 6.08604 29.4883 9.91314V21.8131Z" fill="#f5f5f5" />
                                    <path d="M16.4831 7.92969C12.082 7.92969 8.51367 11.4817 8.51367 15.8631C8.51367 20.2439 12.082 23.7959 16.4831 23.7959C20.8843 23.7959 24.4524 20.2439 24.4524 15.8631C24.4524 11.4817 20.8843 7.92969 16.4831 7.92969ZM16.4831 20.8212C13.7375 20.8212 11.5024 18.596 11.5024 15.8631C11.5024 13.1277 13.7375 10.9048 16.4831 10.9048C19.2285 10.9048 21.4638 13.1277 21.4638 15.8631C21.4638 18.596 19.2285 20.8212 16.4831 20.8212Z" fill="#f5f5f5" />
                                    <path d="M25.0504 6.27832C24.4639 6.27832 23.9883 6.75164 23.9883 7.33536C23.9883 7.91915 24.4639 8.39268 25.0504 8.39268C25.6365 8.39268 26.1122 7.91915 26.1122 7.33536C26.1122 6.75164 25.6365 6.27832 25.0504 6.27832Z" fill="#f5f5f5" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <form class="contacts__form form">
                    <h3 class="contacts__form-title form-title">
                        Узнать сроки и стоимость
                    </h3>
                    <div class="input__container">
                        <input type="text" name="name" id="name" class="contacts__form-input input" required>
                        <label for="name" class="contacts__form-label label">Имя</label>
                    </div>
                    <div class="input__container">
                        <input type="text" name="phonenumber" id="phonenumber" class="contacts__form-input input" required>
                        <label for="phonenumber" class="contacts__form-label label">Телефон</label>
                    </div>
                    <div class="input__container">
                        <input type="text" name="email" id="email" class="contacts__form-input input" required>
                        <label for="email" class="contacts__form-label label">Почта</label>
                    </div>
                    <input class="contacts__btn btn btn__blue" type="submit" value="Отправить">
                </form>
            </div>
        </div>
    </section>
    <footer class="footer gray">
        <div class="footer__container container">
            <a href="index.html" class="footer__logo logo">
                <svg width="82" height="50" viewBox="0 0 82 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 50H38.5L33.5 41.5H14.5L28.5 18L47.5 50H57L28.5 1L0 50Z" fill="white" />
                    <path d="M81 24.4997H51.5L56 32.4997H72.5C70.1 38.0997 64.1667 41.1664 61.5 41.9997L65.5 48.4997C79.5 44.4997 81.6667 30.833 81 24.4997Z" fill="white" />
                    <path d="M41 6.49969L45.5 12.9997C55.9 3.79969 67.1667 11.1664 71.5 15.9997H80.5C66.1 -6.80031 48.1667 0.166353 41 6.49969Z" fill="white" />
                </svg>
            </a>
            <nav class="footer__menu menu">
                <ul class="footer__menu-list menu-list">
                    <li class="footer__menu-link menu-link">
                        <a href="index.php">
                            О компании
                        </a>
                    </li>
                    <li class="footer__menu-link menu-link">
                        <a href="about.php">
                            Обо мне
                        </a>
                    </li>
                    <li class="footer__menu-link menu-link">
                        <a href="portfolio.php">
                            Портфолио
                        </a>
                    </li>
                    <li class="footer__menu-link menu-link">
                        <a href="#contacts">
                            Контакты
                        </a>
                    </li>
                </ul>
            </nav>
            <a href="#header" class="footer__arrow arrow arrow__up">
                <svg width="70" height="98" viewBox="0 0 70 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M33.72 97.2927C31.68 93.0327 28.44 89.0727 24 85.4127V84.2627C25.92 85.1627 27.6 86.0627 29.04 86.9627C30.48 87.8027 32.68 89.6427 33.64 90.4827V35.0127H35.42V90.4827C36.44 89.6427 38.67 87.8027 40.11 86.9627C41.55 86.0627 43.2 85.1627 45.06 84.2627V85.4127C40.68 89.0727 37.44 93.0327 35.34 97.2927H33.72Z" fill="#636363" />
                    <circle cx="35" cy="35.293" r="34" stroke="#636363" stroke-width="2" />
                </svg>
            </a>
        </div>
        <div class="footer__copyright container">© 2022 Быкова Юлия. Все права защищены.</div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(".arrow").on("click", function(event) {
            //отменяем стандартную обработку нажатия по ссылке
            event.preventDefault();

            //забираем идентификатор бока с атрибута href
            var id = $(this).attr('href'),

                //узнаем высоту от начала страницы до блока на который ссылается якорь
                top = $(id).offset().top;

            //анимируем переход на расстояние - top за 1500 мс
            $('body,html').animate({
                scrollTop: top
            }, 1000);
        });
    </script>
</body>

</html>