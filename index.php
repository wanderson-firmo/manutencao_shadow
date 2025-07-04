<?php
// index.php

$host = '127.0.0.1';
$port = '3307';
$dbname = 'shadow600';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Busca o último registro inserido
    $stmt = $pdo->query("SELECT * FROM manutencao ORDER BY id DESC LIMIT 1");
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Manutenção Shadow 600</title>
  <link rel="stylesheet" href="src/style.css"/>
</head>

<body>
  <!-- Botão de ativar música -->
  <button onclick="document.getElementById('bgm').play()" style="display:block; margin: 20px auto; padding: 10px 20px; font-size: 1rem;">
    🔊 Ativar Música
  </button>

  <!-- Player de áudio escondido -->
  <audio id="bgm" autoplay loop hidden>
    <source src="src/audio/fortunate_son.mp3" type="audio/mpeg">
    Seu navegador não suporta o elemento de áudio.
  </audio>>

  <div class="container">
    <h1>Manutenção Shadow 600</h1>
    <form method="POST" action="salvar.php">

      <!-- Troca de Óleo -->
      <div class="section-title">Troca de Óleo</div>
      <div class="group">
        <label>Troquei dia:
          <input type="date" name="troca_oleo_dia" value="<?= htmlspecialchars($dados['troca_oleo_dia'] ?? '') ?>" required />
        </label>
        <label>KM no dia:
          <input type="number" name="troca_oleo_km" value="<?= htmlspecialchars($dados['troca_oleo_km'] ?? '') ?>" required />
        </label>
        <label>Marca:
          <input type="text" name="troca_oleo_marca" value="<?= htmlspecialchars($dados['troca_oleo_marca'] ?? '') ?>" required />
        </label>
        <label>Próxima troca:
          <input type="date" name="troca_oleo_proxima" value="<?= htmlspecialchars($dados['troca_oleo_proxima'] ?? '') ?>" required />
        </label>
      </div>

      <!-- Filtro de Óleo -->
      <div class="section-title">Filtro de Óleo</div>
      <div class="group">
        <label>Troquei dia:
          <input type="date" name="filtro_oleo_dia" value="<?= htmlspecialchars($dados['filtro_oleo_dia'] ?? '') ?>" />
        </label>
        <label>KM no dia:
          <input type="number" name="filtro_oleo_km" value="<?= htmlspecialchars($dados['filtro_oleo_km'] ?? '') ?>" />
        </label>
        <label>Marca:
          <input type="text" name="filtro_oleo_marca" value="<?= htmlspecialchars($dados['filtro_oleo_marca'] ?? '') ?>" />
        </label>
        <label>Próxima troca:
          <input type="date" name="filtro_oleo_proxima" value="<?= htmlspecialchars($dados['filtro_oleo_proxima'] ?? '') ?>" />
        </label>
      </div>

      <!-- Velas -->
      <div class="section-title">Velas</div>
      <div class="group">
        <label>Troquei dia:
          <input type="date" name="velas_dia" value="<?= htmlspecialchars($dados['velas_dia'] ?? '') ?>" />
        </label>
        <label>KM no dia:
          <input type="number" name="velas_km" value="<?= htmlspecialchars($dados['velas_km'] ?? '') ?>" />
        </label>
        <label>Marca:
          <input type="text" name="velas_marca" value="<?= htmlspecialchars($dados['velas_marca'] ?? '') ?>" />
        </label>
        <label>Próxima troca:
          <input type="date" name="velas_proxima" value="<?= htmlspecialchars($dados['velas_proxima'] ?? '') ?>" />
        </label>
      </div>

      <!-- Filtro de Ar -->
      <div class="section-title">Filtro de Ar</div>
      <div class="group">
        <label>Troquei dia:
          <input type="date" name="filtro_ar_dia" value="<?= htmlspecialchars($dados['filtro_ar_dia'] ?? '') ?>" />
        </label>
        <label>KM no dia:
          <input type="number" name="filtro_ar_km" value="<?= htmlspecialchars($dados['filtro_ar_km'] ?? '') ?>" />
        </label>
        <label>Marca:
          <input type="text" name="filtro_ar_marca" value="<?= htmlspecialchars($dados['filtro_ar_marca'] ?? '') ?>" />
        </label>
        <label>Próxima troca:
          <input type="date" name="filtro_ar_proxima" value="<?= htmlspecialchars($dados['filtro_ar_proxima'] ?? '') ?>" />
        </label>
      </div>

      <!-- Líquido de Arrefecimento -->
      <div class="section-title">Líquido de Arrefecimento</div>
      <div class="group">
        <label>Troquei dia:
          <input type="date" name="liquido_arref_dia" value="<?= htmlspecialchars($dados['liquido_arref_dia'] ?? '') ?>" />
        </label>
        <label>KM no dia:
          <input type="number" name="liquido_arref_km" value="<?= htmlspecialchars($dados['liquido_arref_km'] ?? '') ?>" />
        </label>
        <label>Marca:
          <input type="text" name="liquido_arref_marca" value="<?= htmlspecialchars($dados['liquido_arref_marca'] ?? '') ?>" />
        </label>
        <label>Próxima troca:
          <input type="date" name="liquido_arref_proxima" value="<?= htmlspecialchars($dados['liquido_arref_proxima'] ?? '') ?>" />
        </label>
      </div>

      <!-- Fluido de Freio -->
      <div class="section-title">Fluido de Freio</div>
      <div class="group">
        <label>Troquei dia:
          <input type="date" name="fluido_freio_dia" value="<?= htmlspecialchars($dados['fluido_freio_dia'] ?? '') ?>" />
        </label>
        <label>KM no dia:
          <input type="number" name="fluido_freio_km" value="<?= htmlspecialchars($dados['fluido_freio_km'] ?? '') ?>" />
        </label>
        <label>Marca:
          <input type="text" name="fluido_freio_marca" value="<?= htmlspecialchars($dados['fluido_freio_marca'] ?? '') ?>" />
        </label>
        <label>Próxima troca:
          <input type="date" name="fluido_freio_proxima" value="<?= htmlspecialchars($dados['fluido_freio_proxima'] ?? '') ?>" />
        </label>
      </div>

      <!-- Pastilha de Freio -->
      <div class="section-title">Pastilha de Freio</div>
      <div class="group">
        <label>Troquei dia:
          <input type="date" name="pastilha_freio_dia" value="<?= htmlspecialchars($dados['pastilha_freio_dia'] ?? '') ?>" />
        </label>
        <label>KM no dia:
          <input type="number" name="pastilha_freio_km" value="<?= htmlspecialchars($dados['pastilha_freio_km'] ?? '') ?>" />
        </label>
        <label>Marca:
          <input type="text" name="pastilha_freio_marca" value="<?= htmlspecialchars($dados['pastilha_freio_marca'] ?? '') ?>" />
        </label>
        <label>Próxima troca:
          <input type="date" name="pastilha_freio_proxima" value="<?= htmlspecialchars($dados['pastilha_freio_proxima'] ?? '') ?>" />
        </label>
      </div>

      <!-- Fluido de Bengala -->
      <div class="section-title">Fluido de Bengala</div>
      <div class="group">
        <label>Troquei dia:
          <input type="date" name="fluido_bengala_dia" value="<?= htmlspecialchars($dados['fluido_bengala_dia'] ?? '') ?>" />
        </label>
        <label>KM no dia:
          <input type="number" name="fluido_bengala_km" value="<?= htmlspecialchars($dados['fluido_bengala_km'] ?? '') ?>" />
        </label>
        <label>Marca:
          <input type="text" name="fluido_bengala_marca" value="<?= htmlspecialchars($dados['fluido_bengala_marca'] ?? '') ?>" />
        </label>
        <label>Próxima troca:
          <input type="date" name="fluido_bengala_proxima" value="<?= htmlspecialchars($dados['fluido_bengala_proxima'] ?? '') ?>" />
        </label>
      </div>

      <!-- Verificação de Válvulas -->
      <div class="section-title">Verificação da Folga de Válvulas</div>
      <div class="group">
        <label>Verifiquei dia:
          <input type="date" name="valvula_verif_dia" value="<?= htmlspecialchars($dados['valvula_verif_dia'] ?? '') ?>" />
        </label>
        <label>KM no dia:
          <input type="number" name="valvula_verif_km" value="<?= htmlspecialchars($dados['valvula_verif_km'] ?? '') ?>" />
        </label>
        <label>Próxima verificação:
          <input type="date" name="valvula_verif_proxima" value="<?= htmlspecialchars($dados['valvula_verif_proxima'] ?? '') ?>" />
        </label>
      </div>

      <input type="submit" value="Salvar Manutenção" />
    </form>
  </div>
</body>
</html>
