<?php

include "backend/conn_check.php";

$LoggedIn = isset($_SESSION['login']);

$id_ticket = $_GET['id-ticket'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF TICKET <?= $id_ticket ?></title>
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }

        @font-face {
    font-family: "Poppins";
    src: url('./assets/fonts/Poppins-Regular.ttf');
}
@font-face {
    font-family: "Poppins-Medium";
    src: url('./assets/fonts/Poppins-Medium.ttf');
}
@font-face {
    font-family: "Poppins-SemiBold";
    src: url('./assets/fonts/Poppins-SemiBold.ttf');
}
@font-face {
    font-family: "Poppins-Bold";
    src: url('./assets/fonts/Poppins-Bold.ttf');
}
@font-face {
    font-family: "NewRocker";
    src: url('./assets/fonts/NewRocker-Regular.ttf');
}

.loader {
    width: 100%;
    height: 100vh;
    background-color: var(--dark);
    position: fixed;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 110;
    animation: loaderScreen 0.8s 2.2s forwards;
}

.loader-image {
    width: 400px;
    transform: translateX(-40px);
    opacity: 0;
    animation: loaderImage 0.3s 1.7s forwards;
}

.loader-text {
    display: flex;
    letter-spacing: 4px;
    font-size: 40px;
    color: var(--white);
}

.loader-text span {
    font-family: "Poppins-Bold";
    transform: translateY(40px);
    opacity: 0;
    animation: loaderText 0.3s forwards;
}

@keyframes loaderScreen {
    to {
        bottom: 100%;
        opacity: 0;
    }
}

@keyframes loaderImage {
    100% {
        opacity: 1;
        transform: translateX(0px);
    }
}

@keyframes loaderText {
    0% {
        opacity: 0;
        transform: translateY(40px);
    }
    50% {
        opacity: 0.5;
    }
    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}

:root {
    --lightgreen: #80FFDB;
    --cyan: #64DFDF;
    --dark: #252525;
    --white: #FFFFFF;
    --purple: #6930C3;
    --black: #000000;
    --gray: #646262;
    --yellow: #ffc229;
    --pink: #ff78c4;
    --green: #6CEE73;
    --cyan-transparent: rgba(100, 223, 223, 0.8);
    --black-transparent: rgba(0, 0, 0, 0.8);
    --dark-transparent: rgba(15, 15, 16, 0.8);
    --purple-transparent: rgba(105, 48, 195, 0.8);
    --white-transparent: rgba(255, 255, 255, 0.8);
}

html {
    scroll-behavior: smooth;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins";
}

.tickets-card {
    position: relative;
    width: 350px;
    overflow: hidden;
}

.tickets-card::after,
.tickets-card::before {
    content: "";
    position: absolute;
    top: calc(85% - 60px);
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background-color: var(--white);
    z-index: 2;
}

.tickets-card::before {
    left: -40px;
}
.tickets-card::after {
    right: -40px;
}

.tickets-header {
    width: 100%;
    background-image: url("./assets/images/tickets.png");
    background-position: center;
    background-size: cover;
    position: relative;
    z-index: 1;
}

.tickets-header::before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    background-color: rgba(0,0,0,0.5);
}

.tickets-content {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 10px;
    color: var(--white);
}

.tickets-title {
    padding-top: 20px;
    margin-bottom: 20px;
}

.tickets-title p {
    font-size: 24px;
    font-family: "Poppins-SemiBold";
}
.tickets-title p:nth-child(2) {
    font-size: 14px;
    font-family: "Poppins";
}

.tickets-date {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
    gap: 5px;
}

.tickets-date p:nth-child(2) {
    font-size: 24px;
    font-family: "Poppins-Bold";
}

.tickets-logo {
    margin: 30px 0px;
}

.tickets-logo img {
    width: 300px;
}

.tickets-type {
    margin-bottom: 30px;
}

.tickets-type p {
    font-size: 60px;
    color: var(--yellow);
    text-shadow: 0px 0px 10px var(--yellow);
    font-family: "Poppins-Bold";
}

.tickets-price {
    display: flex;
    align-items: center;
    gap: 5px;
    color: var(--pink);
    justify-content: center;
}

.tickets-price span {
    position: relative;
    top: 6px;
    font-size: 24px;
    font-family: "Poppins-Bold";
}

.tickets-price p {
    font-size: 40px;
    font-family: "Poppins-Bold";
}

.tickets-body {
    width: 100%;
    height: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
    background-color: var(--purple);
    color: var(--white);
}

    </style>
</head>
<body>
    <script>window.print()</script>
        <div class="" style="display: flex; justify-content: center; margin-bottom: 20px;">
        <div class="tickets-card">
                        <div class="tickets-header">
                            <div class="tickets-content">
                                <div class="tickets-title">
                                    <p>KAMPUNG JACKLOTH</p>
                                    <p>Slamet Riyadi street, Jember</p>
                                </div>
                                
                                <hr>
                                
                                <div class="tickets-date">
                                    <p>August 31, 2024</p>
                                    <p>9 PM</p>
                                </div>

                                <div class="tickets-logo">
                                    <img src="./assets/images/logo.png" alt="">
                                </div>

                                <div class="tickets-type">
                                    <p>GENERAL</p>
                                </div>

                                <div class="tickets-price">
                                    <span>IDR</span>
                                    <p>100.000</p>
                                </div>
                            </div>
                        </div>

                        <div class="tickets-body">
                            <p style="font-weight: 600;">Ticket ID</p>
                            <p><?= $id_ticket ?></p>
                        </div>
                    </div>
        </div>

    <div class="" style="border-top: 2px dotted black;"></div>

    <p>Hi Khairunnisa, here are some important information you need to know: <br>

Date & Time : Saturday, August 31st | 9 PM<br>
Location        : Kampung Jackloth, Slamet Riyadi street, Jember<br>
Ticket             : Make sure you bring your physical ticket or e-ticket.<br>
<br>
Guidelines:<br>
Please bring your KTP or other valid ID for verification.<br>
No prohibited items such as weapons, alcohol, or illegal drugs are allowed.<br>
Enjoy the concert while respecting other visitors.<br>
<br>
Services & Facilities:<br>
Food court and merchandise are available in the concert area.<br>
Parking area is in the backyard.<br>
<br>
Doors will open at 7 PM. We recommend arriving early to avoid long queues.<br>
<br>
See you at the concert, and let's create unforgettable memories together!<br>
Warm Regards, Concert Organizer Team.</p>
</body>
</html>