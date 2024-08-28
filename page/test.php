<?php
session_start();

// include "conn_check.php"; => Buat protect harus login dulu
// include "conn.php"; => Biar datanya masuk database
// Kalo udah pake salah satu di atas, gausa pake session_start()

// Cek apakah pengguna sudah login
$LoggedIn = isset($_SESSION['login']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <button type="button" class="btn btn-primary" onclick="handleBuyTicket()">
        Buy Ticket
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Buy Ticket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Silakan pilih tiket yang Anda inginkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Proceed to Buy</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($LoggedIn) {
        // User is logged in, show the logout button
        echo '<button class="btn btn-danger" onclick="confirmLogout()">Logout</button>';
    } else {
        // User is not logged in, show the login button
        echo '<a href="login-regis/login.php" class="btn btn-success">Login</a>';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Aksi tombol "Buy Ticket"
        function handleBuyTicket() {
            // Periksa apakah pengguna sudah login
            var LoggedIn = <?php echo json_encode($LoggedIn); ?>;

            if (!LoggedIn) {
                // Jika belum login, tampilkan alert dan arahkan ke halaman login
                alert('Anda harus login terlebih dahulu untuk membeli tiket.');
                window.location.href = 'login-regis/login.php';
            } else {
                // Jika sudah login, tampilkan modal
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();

                // Kalo pake CSS murni, tinggal panggil showModal()
            }
        }

        // Konfirmasi logout
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                window.location.href = './root/logout.php';
            }
        }
    </script>
</body>

</html>