<?php

$LoggedIn = isset($_SESSION['login']);

include "backend/conn_check.php";

$id_ticket = $_GET['id-ticket'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Seeds</title>
    <link rel="stylesheet" href="./payment.css">
    <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon">
</head>

<body>
    <nav>
        <a href="/">
            <div class="nav-title">
                <img src="./assets/images/logo.png" alt="">
            </div>
        </a>

        <div class="nav-item-wrapper">
            <div class="nav-link nav-item link-events" data-link="events-section">
                Events
            </div>
            <div class="nav-link nav-item link-personnel" data-link="personnel-section">
                Personnel
            </div>
            <div class="nav-link nav-item link-seats" data-link="seats-section">
                Seats
            </div>
            <div class="nav-link nav-item link-schedule" data-link="schedule-section">
                Schedule
            </div>
            <div class="nav-link nav-item link-weather" data-link="weather-section">
                Weather
            </div>
        </div>

        <div class="nav-button">
            <button class="btn-tickets">Get Ticket</button>

            <?php

            if ($LoggedIn) {
                echo '<a href="#" onclick="confirmLogout(); return false;">Logout</a>';
            } else {
                echo '<a href="pages/login.php">Login</a>';
            }

            ?>
            
        </div>

        <div class="nav-item-mobile">
            <div class="left-nav">
                <img src="./assets/images/logo.png" alt="">
            </div>

            <div class="right-nav">
                <div class="nav-button-mobile">
                    <button class="btn-tickets">Get Ticket</button>
                </div>

                <div class="hamburger-container">
                    <div class="hamburger-wrapper">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-item-wrapper-mobile">
            <div class="top-mobile">
                <div class="left-mobile">
                    <img src="./assets/images/logo.png" alt="">
                </div>

                <div class="right-mobile">
                    <img class="btn-close" src="./assets/svg/x_symbol.svg" alt="">
                </div>
            </div>

            <div class="bottom-mobile">
                <div class="nav-link nav-item link-events" data-link="events-section">
                    Events
                </div>
                <div class="nav-link nav-item link-personnel" data-link="personnel-section">
                    Personnel
                </div>
                <div class="nav-link nav-item link-seats" data-link="seats-section">
                    Seats
                </div>
                <div class="nav-link nav-item link-schedule" data-link="schedule-section">
                    Schedule
                </div>
                <div class="nav-link nav-item link-weather" data-link="weather-section">
                    Weather
                </div>

                <a href="./pages/login.php">Login</a>
            </div>
        </div>
    </nav>

    <div class="bg">
        <section id="payment-section">
            <div class="payment-container">
                <div class="payment-wrapper">
                    <div class="payment-countdown">
                        <div class="payment-title">
                            <h1>Complete Payment in</h1>
                        </div>

                        <div class="countdown">
                            <div class="hours">
                                <p id="hours">00</p>
                            </div>

                            <div class="colon">
                                <p>:</p>
                            </div>
                            <div class="minutes">
                                <p id="minutes">00</p>
                            </div>

                            <div class="colon">
                                <p>:</p>
                            </div>
                            <div class="seconds">
                                <p id="seconds">00</p>
                            </div>
                        </div>
                    </div>

                    <div class="payment-instruction">
                        <div class="left-instruction">
                            <div class="instruction-title">
                                <h1>Payment Instructions</h1>
                            </div>

                            <div class="instruction">
                                <p>Thank you for placing your order. Please select one of the following banks to make payment:
                                </p>

                                <ol>
                                    <li>Bank Transfer</li>
                                    <ul>
                                        <li>BCA: Account Number: [1234 5678 9123], in the Name: The Seeds team & Bank Code: 014
                                        </li>
                                        <li>CIMB Niaga: Account Number: [1234 5678 9123], in the Name: The Seeds team & Bank Code: 014
                                        </li>
                                        <li>Mandiri: Account Number: [1234 5678 9123], in the Name: The Seeds team & Bank Code: 014
                                        </li>
                                        <li>BRI: Account Number: [1234 5678 9123], in the Name: The Seeds team & Bank Code: 014
                                        </li>
                                        <li>BNI: Account Number: [1234 5678 9123], in the Name: The Seeds team & Bank Code: 014
                                        </li>
                                    </ul>

                                    <li>Make a Transfer</li>
                                    <ul>
                                        <li>Enter the account number and nominal according to your bill.
                                        </li>
                                        <li>Confirm and complete the transaction.
                                        </li>
                                    </ul>

                                    <li>Save Proof of Payment</li>
                                    <ul>
                                        <li>Save proof of transfer, then we will send your e-ticket pdf via email.
                                        </li>
                                    </ul>
                                </ol>
                            </div>
                        </div>
                        <div class="right-instruction">
                            <div class="instruction-title">
                                <h1>Payment Details</h1>
                            </div>

                            <div class="instruction">
                                <div class="instruction-top">
                                    <p>ID Ticket</p>
                                    <p><?= $id_ticket ?></p>
                                </div>

                                <div class="instruction-bottom">
                                    <table>
                                        <tr>
                                            <td>Order date </td>
                                            <td>: 02-08-2024 | 12:23</td>
                                        </tr>
                                        <tr>
                                            <td>Ticket Category </td>
                                            <td>: VIP</td>
                                        </tr>
                                        <tr>
                                            <td>Quantity </td>
                                            <td>: 1</td>
                                        </tr>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>: RP 200,000</td>
                                        </tr>
                                        <tr>
                                            <td>Service Fee </td>
                                            <td>: RP 2,500</td>
                                        </tr>
                                        <tr>
                                            <td>Total Payment </td>
                                            <td>: RP 202,500</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="instruction-upload">
                                <div class="instruction-title">
                                    <h1>Upload Your Proof of Payment</h1>
                                </div>

                                <div class="instruction-button">
                                    <button class="btn-proof">Upload Proof of Payment</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="payment-footer">
                        <p>If there is an error, immediately contact your bank or our customer support.
                        </p>
                    </div>
                </div>

            </div>
    </div>
    </section>
    </div>

    <footer>
        <div class="footer-container">
            <div class="nav-item-wrapper">
                <div class="nav-link nav-item link-events" data-link="events-section">
                    Events
                </div>
                <div class="nav-link nav-item link-personnel" data-link="personnel-section">
                    Personnel
                </div>
                <div class="nav-link nav-item link-seats" data-link="seats-section">
                    Seats
                </div>

                <div class="footer-logo">
                    <a href="/">
                        <img src="./assets/images/logo.png" alt="">
                    </a>
                </div>

                <div class="nav-link nav-item link-tickets" data-link="tickets-section">
                    Tickets
                </div>
                <div class="nav-link nav-item link-schedule" data-link="schedule-section">
                    Schedule
                </div>
                <div class="nav-link nav-item link-weather" data-link="weather-section">
                    Weather
                </div>
            </div>

            <div class="footer-mobile">
                <div class="footer-logo">
                    <a href="/">
                        <img src="./assets/images/logo.png" alt="">
                    </a>
                </div>

                <div class="footer-link">
                    <div class="nav-link nav-item link-events" data-link="events-section">
                        Events
                    </div>
                    <div class="nav-link nav-item link-personnel" data-link="personnel-section">
                        Personnel
                    </div>
                    <div class="nav-link nav-item link-seats" data-link="seats-section">
                        Seats
                    </div>
                    <div class="nav-link nav-item link-tickets" data-link="tickets-section">
                        Tickets
                    </div>
                    <div class="nav-link nav-item link-schedule" data-link="schedule-section">
                        Schedule
                    </div>
                    <div class="nav-link nav-item link-weather" data-link="weather-section">
                        Weather
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; Copyright by The Seeds 2024</p>
            </div>
        </div>
    </footer>

    <div class="overlay"></div>

    <div class="modal modal-upload">
        <div class="modal-header">
            <h1>Proof of Payment</h1>
        </div>

        <div class="modal-body">
            <img src="./assets/svg/image.svg" alt="">
            <input type="file" name="image" id="image">
        </div>

        <div class="modal-footer">
            <button class="btn-upload">Upload</button>
        </div>
    </div>
    <div class="modal modal-refresh">
        <div class="modal-header">
            <h1>Successfully Uploaded!</h1>
        </div>

        <div class="modal-body">
            <p>Thank you, Khairunnisa! Your proof of payment has been uploaded successfully.
                <br><br>
                Please be patient. Admin will confirm your proof of purchase within 3-5 minutes. Refresh the website regularly for more information.
                <br><br>
                See you at the concert, and let's have fun together! 🎶✨
            </p>
        </div>

        <div class="modal-footer">
            <button class="btn-refresh">Refresh</button>
        </div>
    </div>
    <div class="modal modal-pay-failed">
        <div class="modal-header">
            <h1>⚠️ Payment Confirmation Failed</h1>
        </div>
        <div class="modal-body">
            <p>Sorry, Khairunnisa! Your payment could not be confirmed by our admin.
                <br><br>
                Please double check your receipt and ensure all details are correct. If you believe that this is an error, contact our support team for assistance.
                <br><br>
                We are here to help you get The Seeds concert tickets. Let's solve this problem! 🎶✨
            </p>
        </div>

        <div class="modal-footer">
            <button class="btn-contact">Contact Admin</button>
        </div>
    </div>
    <div class="modal modal-pay-success">
        <div class="modal-header">
            <h1>🎉 Payment Confirmed Successfully</h1>
        </div>
        <div class="modal-body">
            <p>Thank you, Khairunnisa! Your payment has been successfully confirmed by our admin.
                <br><br>
                Your ticket for the The Seeds concert is on its way! Please check your email, including the spam or promotions folder, to find your ticket.
                <br><br>
                We can't wait to see you at the concert! Let's make it a night to remember! 🎶✨
            </p>
        </div>

        <div class="modal-footer">
            <button class="btn-download">Download Ticket</button>
        </div>
    </div>

    <script src="./payment.js"></script>
    <script>
        const btnProof = document.querySelector('.btn-proof');
        const btnUpload = document.querySelector('.btn-upload');
        const btnRefresh = document.querySelector('.btn-refresh');
        const btnContact = document.querySelector('.btn-contact');
        const btnDownload = document.querySelector('.btn-download');
        const modalUpload = document.querySelector('.modal-upload');
        const modalRefresh = document.querySelector('.modal-refresh');
        const modalPayFailed = document.querySelector('.modal-pay-failed');
        const modalPaySuccess = document.querySelector('.modal-pay-success');
        const overlay = document.querySelector('.overlay');

        btnProof.addEventListener('click', () => {
            modalUpload.style.display = 'flex';
            overlay.style.display = 'block';
        })
        btnUpload.addEventListener('click', () => {
            modalUpload.style.display = 'none';
            modalRefresh.style.display = 'flex';
        })
        btnRefresh.addEventListener('click', () => {
            modalRefresh.style.display = 'none';
            modalPayFailed.style.display = 'flex';
        })
        btnContact.addEventListener('click', () => {
            modalPayFailed.style.display = 'none';
            modalPaySuccess.style.display = 'flex';
        })
        btnDownload.addEventListener('click', () => {
            modalPaySuccess.style.display = 'none';
            overlay.style.display = 'none';

            window.location.href = './pdf.php?id-ticket=<?= $id_ticket ?>';
        })
    </script>
</body>

</html>