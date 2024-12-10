<?php
function simulatePrisonersProblem($prisoners = 100, $trials = 1) {
    $successCount = 0;

    for ($t = 0; $t < $trials; $t++) {
        // Crear y barajar las cajas con los números
        $boxes = range(1, $prisoners);
        shuffle($boxes);

        $allSurvived = true;

        // Simular cada prisionero
        for ($prisoner = 1; $prisoner <= $prisoners; $prisoner++) {
            $found = false;
            $currentBox = $prisoner; // Inicia con el número del prisionero

            for ($attempt = 0; $attempt < $prisoners / 2; $attempt++) {
                if ($boxes[$currentBox - 1] == $prisoner) {
                    $found = true;
                    break;
                }
                $currentBox = $boxes[$currentBox - 1]; // Ir a la siguiente caja indicada
            }

            if (!$found) {
                $allSurvived = false;
                break;
            }
        }

        if ($allSurvived) {
            $successCount++;
        }
    }

    return [
        "total_trials" => $trials,
        "success_count" => $successCount,
        "success_rate" => ($successCount / $trials) * 100
    ];
}

// Configuración
$prisoners = 100;
$trials = 10000; // Número de simulaciones

// Ejecutar simulación
$result = simulatePrisonersProblem($prisoners, $trials);

// Imprimir resultados
echo "Total de simulaciones: {$result['total_trials']}\n";
echo "Éxitos: {$result['success_count']}\n";
echo "Tasa de éxito: {$result['success_rate']}%\n";
?>