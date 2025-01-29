<?php
$statsController = new StatsController();

// Ruta del gráfico de evolución de glucosa
$router->get('/stats/glucose-chart', [$statsController, 'glucoseChart']);

// Ruta del gráfico de distribución de dosis de insulina
$router->get('/stats/insulin-distribution', [$statsController, 'insulinDistribution']);
