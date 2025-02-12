<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLIKASI PERHITUNGAN DISKON </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: pink;
            font-family: sans-serif;
            background-image: url(bg.jpg);
            color: white;
        }
        form {
            color: black;
        }
        h2 {
            color: black;
            text-shadow:  1px 1px 2px white, 0 0 25px black, 0 0 5px white;
        }
        .border {
            background-color: black;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">APLIKASI PERHITUNGAN DISKON</h2>
                <form method="post" class="border rounded bg-light p-2">
                    <label class="form-label">HARGA BARANG (Rp.)</label>
                    <input type="number" name="harga" class="form-control" placeholder="MASUKKAN HARGA BARANG" min="0"  autocomplete="off" step="0.01" required onkeypress="return event.charCode >= 48 && event.charCode  <= 57">
                    <label class="form-label">DISKON (%)</label>
                    <input type="text" name="diskon" maxlength="3" class="form-control" placeholder="MASUKKAN NILAI DISKON" min="0" max="100" autocomplete="off" step="0.01" required onkeypress="return event.charCode >= 48 && event.charCode  <= 57">
                    <button type="submit" class="btn btn-info w-100 mt-2 " name="hitung">Hitung</button> 
                </form>
                
        <?php
        session_start();
        if (!isset($_SESSION['hasil'])) {
            $_SESSION['hasil'] = "";
        }

        if (isset($_POST['hitung'])) {
            $harga = $_POST['harga'];
            $diskon = $_POST['diskon'];

            if ($harga < 0 || $diskon < 0 || $diskon > 100) {
                echo "<script>alert('Input tidak valid!')</script>";
            } else {
                $nilai_diskon = $harga * ($diskon / 100);
                $total_harga = $harga - $nilai_diskon;
                $_SESSION['hasil'] = "<div class='hasil'>
                        <p>Harga: Rp. <b>" . number_format($harga, 2, ',', '.') . "</b></p>
                        <p>Diskon $diskon%: Rp. <b>" . number_format($nilai_diskon, 2, ',', '.') . "</b></p>
                        <p>Total: Rp. <b>" . number_format($total_harga, 2, ',', '.') . "</b></p>
                        <form method='post'><button type='submit' name='hapus' class='btn btn-info w-100 mt-2' >Hapus</button></form>
                      </div>";
            }
        }

        if (isset($_POST['hapus'])) {
            $_SESSION['hasil'] = "";
        }

        echo $_SESSION['hasil'];
        ?>
                
            </div>
        </div>
    </div>
    <p class="text-center copyright">&copy; UKK | IBNU ZAKI HISYAM | XII PPLG</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMcontentloaded', function () {
            const resetButton = document.getElemenById('resetButton');
            if (resetButton) {
                resetButton.addEventListener ('click', function () {
                    const resetButton = document.getElemenById('hasil');
            if (hasilDiv) {
                hasilDiv.remove();
            }
                });
            }
        });
    </script>
</body>
</html>