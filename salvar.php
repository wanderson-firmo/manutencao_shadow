<?php
// salvar.php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = '127.0.0.1';
$port = '3307';
$dbname = 'shadow600';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $sql = "INSERT INTO manutencao (
        troca_oleo_dia, troca_oleo_km, troca_oleo_marca, troca_oleo_proxima,
        filtro_oleo_dia, filtro_oleo_km, filtro_oleo_marca, filtro_oleo_proxima,
        velas_dia, velas_km, velas_marca, velas_proxima,
        filtro_ar_dia, filtro_ar_km, filtro_ar_marca, filtro_ar_proxima,
        liquido_arref_dia, liquido_arref_km, liquido_arref_marca, liquido_arref_proxima,
        fluido_freio_dia, fluido_freio_km, fluido_freio_marca, fluido_freio_proxima,
        pastilha_freio_dia, pastilha_freio_km, pastilha_freio_marca, pastilha_freio_proxima,
        fluido_bengala_dia, fluido_bengala_km, fluido_bengala_marca, fluido_bengala_proxima,
        valvula_verif_dia, valvula_verif_km, valvula_verif_proxima
    ) VALUES (
        :troca_oleo_dia, :troca_oleo_km, :troca_oleo_marca, :troca_oleo_proxima,
        :filtro_oleo_dia, :filtro_oleo_km, :filtro_oleo_marca, :filtro_oleo_proxima,
        :velas_dia, :velas_km, :velas_marca, :velas_proxima,
        :filtro_ar_dia, :filtro_ar_km, :filtro_ar_marca, :filtro_ar_proxima,
        :liquido_arref_dia, :liquido_arref_km, :liquido_arref_marca, :liquido_arref_proxima,
        :fluido_freio_dia, :fluido_freio_km, :fluido_freio_marca, :fluido_freio_proxima,
        :pastilha_freio_dia, :pastilha_freio_km, :pastilha_freio_marca, :pastilha_freio_proxima,
        :fluido_bengala_dia, :fluido_bengala_km, :fluido_bengala_marca, :fluido_bengala_proxima,
        :valvula_verif_dia, :valvula_verif_km, :valvula_verif_proxima
    )";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':troca_oleo_dia' => $_POST['troca_oleo_dia'],
        ':troca_oleo_km' => $_POST['troca_oleo_km'],
        ':troca_oleo_marca' => $_POST['troca_oleo_marca'],
        ':troca_oleo_proxima' => $_POST['troca_oleo_proxima'],

        ':filtro_oleo_dia' => $_POST['filtro_oleo_dia'] ?? null,
        ':filtro_oleo_km' => $_POST['filtro_oleo_km'] ?? null,
        ':filtro_oleo_marca' => $_POST['filtro_oleo_marca'] ?? null,
        ':filtro_oleo_proxima' => $_POST['filtro_oleo_proxima'] ?? null,

        ':velas_dia' => $_POST['velas_dia'] ?? null,
        ':velas_km' => $_POST['velas_km'] ?? null,
        ':velas_marca' => $_POST['velas_marca'] ?? null,
        ':velas_proxima' => $_POST['velas_proxima'] ?? null,

        ':filtro_ar_dia' => $_POST['filtro_ar_dia'] ?? null,
        ':filtro_ar_km' => $_POST['filtro_ar_km'] ?? null,
        ':filtro_ar_marca' => $_POST['filtro_ar_marca'] ?? null,
        ':filtro_ar_proxima' => $_POST['filtro_ar_proxima'] ?? null,

        ':liquido_arref_dia' => $_POST['liquido_arref_dia'] ?? null,
        ':liquido_arref_km' => $_POST['liquido_arref_km'] ?? null,
        ':liquido_arref_marca' => $_POST['liquido_arref_marca'] ?? null,
        ':liquido_arref_proxima' => $_POST['liquido_arref_proxima'] ?? null,

        ':fluido_freio_dia' => $_POST['fluido_freio_dia'] ?? null,
        ':fluido_freio_km' => $_POST['fluido_freio_km'] ?? null,
        ':fluido_freio_marca' => $_POST['fluido_freio_marca'] ?? null,
        ':fluido_freio_proxima' => $_POST['fluido_freio_proxima'] ?? null,

        ':pastilha_freio_dia' => $_POST['pastilha_freio_dia'] ?? null,
        ':pastilha_freio_km' => $_POST['pastilha_freio_km'] ?? null,
        ':pastilha_freio_marca' => $_POST['pastilha_freio_marca'] ?? null,
        ':pastilha_freio_proxima' => $_POST['pastilha_freio_proxima'] ?? null,

        ':fluido_bengala_dia' => $_POST['fluido_bengala_dia'] ?? null,
        ':fluido_bengala_km' => $_POST['fluido_bengala_km'] ?? null,
        ':fluido_bengala_marca' => $_POST['fluido_bengala_marca'] ?? null,
        ':fluido_bengala_proxima' => $_POST['fluido_bengala_proxima'] ?? null,

        ':valvula_verif_dia' => $_POST['valvula_verif_dia'] ?? null,
        ':valvula_verif_km' => $_POST['valvula_verif_km'] ?? null,
        ':valvula_verif_proxima' => $_POST['valvula_verif_proxima'] ?? null,
    ]);

    // Redireciona para index.php após salvar
    header("Location: index.php");
    exit;

} catch (PDOException $e) {
    die("Erro ao conectar ou salvar: " . $e->getMessage());
}
