<?php
require_once 'controller/Controller.php';
// require_once 'config'
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle Residencial — Atualizado</title>
    <link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles/home.css">
</head>

<body>
    <!-- HEADER -->
    <?php require_once('header.php')?>

    <div class="container dashboard-wrap">
        <div class="row mb-3 align-items-center">
            <div class="col-md-8">
                <h3 class="mb-0">Controle Residencial</h3>
                <small class="text-muted">Visão geral da casa e controles rápidos</small>
            </div>
            <div class="col-md-4 text-end">
                <span class="me-2 text-muted">Bem-vindo, <?php echo htmlspecialchars($nomeUsuario) ?>!</span>
                <a href="?action=refresh" class="btn btn-sm btn-light">Atualizar</a>
            </div>
        </div>

        <div class="row g-4">
            <!-- SIDEBAR/RESUMO -->
            <div class="col-lg-3">
                <div class="summary-card">
                    <h6>Resumo da Casa</h6>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <div class="summary-stat"><?php echo $totalOn ?? '—' ?></div>
                            <small class="text-muted">Dispositivos ligados</small>
                        </div>
                        <div class="text-end">
                           
                        </div>
                    </div>

                    <hr>
                    <div class="mb-2">
                        <small class="text-muted">Última atividade</small>
                        <div class="mt-2"><i class="fa fa-history"></i> <?php echo $ultimaAtividade ?? 'Nenhuma' ?></div>
                    </div>

                    <div class="mt-3 d-grid gap-2">
                        <a href="?action=relatorio" class="btn btn-sm btn-outline-primary">Ver relatório</a>
                        <a href="?action=config" class="btn btn-sm btn-outline-secondary">Configurações</a>
                    </div>
                </div>

                <div class="mt-3 summary-card">
                    <h6>Clima Externo</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="h2 mb-0"><?php echo $tempInterior ?? '24' ?>°C</div>
                            <small class="text-muted">Temperatura média</small>
                        </div>
                        
                    </div>
                </div>

            </div>

            <!-- GRID PRINCIPAL DE CARDS -->
            <div class="col-lg-9">
                <div class="row cards-grid gx-4 gy-4">

                    <!-- Primeiro Andar -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card card-um text-white text-center">
                            <div>
                                <i class="fa fa-lightbulb fa-3x mb-2"></i>
                                <h5 class="card-title">Primeiro Andar</h5>
                                <?php list($status_text_andar1, $status_class_andar1) = getStatus($esp_ip_andar1); ?>
                                <div class="meta">
                                    <span class="status-badge <?= $status_class_andar1 ?>"><?php echo $status_text_andar1 ?></span>
                                    <small class="d-block mt-2">Lâmpadas • Sala e Corredor</small>
                                </div>
                            </div>

                            <div class="card-footer-mini">
                                <div class="control-row">
                                    <a href="?action=andar1_ligar" class="btn btn-custom">Ligar</a>
                                    <a href="?action=andar1_desligar" class="btn btn-custom">Desligar</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Segundo Andar -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card card-quatro text-white text-center">
                            <div>
                                <i class="fa fa-bolt fa-3x mb-2"></i>
                                <h5 class="card-title">Segundo Andar</h5>
                                <?php list($status_text_andar2, $status_class_andar2) = getStatus($esp_ip_andar2); ?>
                                <div class="meta">
                                    <span class="status-badge <?= $status_class_andar2 ?>"><?php echo $status_text_andar2 ?></span>
                                    <small class="d-block mt-2">Quartos • Iluminação</small>
                                </div>
                            </div>

                            <div class="card-footer-mini">
                                <div class="control-row">
                                    <a href="?action=andar2_ligar" class="btn btn-custom">Ligar</a>
                                    <a href="?action=andar2_desligar" class="btn btn-custom">Desligar</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Portão -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card card-tres text-white text-center">
                            <div>
                                <i class="fa fa-car-side fa-3x mb-2"></i>
                                <h5 class="card-title">Portão da Garagem</h5>
                                <?php list($status_text_portao, $status_class_portao) = getStatus($esp_ip_portao); ?>
                                <div class="meta">
                                    <span class="status-badge <?= $status_class_portao ?>"><?php echo $status_text_portao ?></span>
                                    <small class="d-block mt-2">Controle remoto / Sensor</small>
                                </div>
                            </div>

                            <div class="card-footer-mini">
                                <div class="control-row">
                                    <a href="?action=portao_abrir" class="btn btn-custom">Abrir</a>
                                    <a href="?action=portao_fechar" class="btn btn-custom">Fechar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RFID -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card card-dois text-white text-center">
                            <div>
                                <i class="fa fa-id-card fa-3x mb-2"></i>
                                <h5 class="card-title">Acesso por Cartão (RF-ID)</h5>
                                <div class="meta">
                                    <span class="status-badge status-on">Ativo</span>
                                    <small class="d-block mt-2">Aproxime o cartão para autorizar</small>
                                </div>
                            </div>

                            <div class="card-footer-mini">
                                <div>
                                    <small class="d-block">Último usuário: <?php echo $ultimoUsuarioRFID ?? '—' ?></small>
                                </div>
                                <div>
                                    <a href="rel/relatorio.php" class="btn btn-sm btn-light">Ver logs</a>
                                </div>
                            </div>
                        </div>
                    </div>

             

                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="assets/bootstrap.bundle.js"></script>

    <!-- Sugestão: pequenos scripts para melhoria UX (tooltips) -->
    <script>
        $(function(){
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
<?php require_once('footer.php')?>
</html>
