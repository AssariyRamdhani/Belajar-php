<?php
echo "welcome tu My Game\n";
$chances = 3;

if (!isset($_POST['submit'])) {
    $computer = rand(1, 9);
    $_POST['chances'] = $chances;
} else {
    $computer = $_POST['computer'];
    $chances = $_POST['chances'];
}

if (isset($_POST['submit'])) {
    $player = intval($_POST['player']);

    if ($player == $computer) {
        echo "Selamat, Anda Menang! Angka komputer adalah $computer\n";
    } else {
        $chances--;
        if ($chances > 0) {
            echo "Tebakan salah. Sisa kesempatan: $chances. Angka komputer adalah $computer\n";
        } else {
            echo "Maaf, Kesempatan Anda telah habis. Angka yang benar adalah $computer\n";
        }
    }
}
?>

<h1>Game Tebak Angka</h1>
<p>Tebak sebuah angka antara 1 dan 9!</p>
<form method="POST">
    <label for="player">Masukkan Tebakanmu :</label>
    <input type="number" name="player" min="1" max="9" required>
    <input type="hidden" name="computer" value="<?php echo $computer; ?>">
    <input type="hidden" name="chances" value="<?php echo $chances; ?>">
    <input type="submit" name="submit" value="Tebak">
</form>
