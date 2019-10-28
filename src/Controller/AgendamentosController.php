<?php

namespace App\Controller;

use Rest\Controller\RestController;

class AgendamentosController extends RestController
{

    public function index ()
    {
        $aAgendamentos = $this->Agendamentos->find('all', [
            'contain' => [
                'Usuarios',
                'SituacaoAgendamentos',
                'Operacoes'
            ]
        ])->toArray();
        
        $this->set(compact('aAgendamentos'));
    }

    public function view ( $iAgendamentoId )
    {
        $aAgendamento = $this->Agendamentos->find()
            ->contain(['Usuarios', 'SituacaoAgendamentos','Operacoes'])
            ->where(['Agendamentos.id' => $iAgendamentoId])
            ->toArray();

        $this->set(compact('aAgendamento'));
    }

    public function getPeriodoDatas ( $dDataInicio, $dDataFinal )
    {
        $aAgendamento = $this->Agendamentos->find('all')
            ->contain(['Usuarios', 'SituacaoAgendamentos','Operacoes'])
            ->where(['data_hora BETWEEN :start AND :end'])
            ->bind(':start', $dDataInicio, 'date')
            ->bind(':end',   $dDataFinal,  'date')
            ->toArray();

        $this->set(compact('aAgendamento'));
    }

    public function gerarOrdemDeColeta ()
    {
        
    }
    
}