<?php

class Alerta {

    public function add_alerta($mensaje, $tipo){
        $_SESSION['alertas'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje,
        ];
    }

    public function get_alertas(){
        $html = '';
        if (!empty($_SESSION['alertas'])){
            foreach ($_SESSION['alertas'] as $alerta) {
                $html .= $this->print_alerta($alerta);
            }
        }
        $this->clear_alertas();
        return $html; 
    }

    public function clear_alertas(){
        $_SESSION["alertas"] = [];
    }

    public function print_alerta($alerta){
        
        $baseClasses = "p-4 mb-4 rounded-lg shadow-md flex items-start justify-between gap-4";
        $typeClasses = [
            'success' => 'bg-green-100 border border-green-400 text-green-700',
            'error' => 'bg-red-100 border border-red-400 text-red-700',
            'warning' => 'bg-yellow-100 border border-yellow-400 text-yellow-700',
            'info' => 'bg-blue-100 border border-blue-400 text-blue-700',
        ];

        $alertClasses = $typeClasses[$alerta['tipo']] ?? 'bg-gray-100 border border-gray-400 text-gray-700';

        $html = "<div class='{$baseClasses} {$alertClasses}'>";
        $html .= "<span class='flex-grow'>{$alerta['mensaje']}</span>";
        $html .= "<button type='button' class='text-gray-500 hover:text-gray-800' onclick='this.parentElement.remove();'>✖</button>";
        $html .= '</div>';
        return $html;
    }
}
