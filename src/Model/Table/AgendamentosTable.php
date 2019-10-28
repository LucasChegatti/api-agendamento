<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AgendamentosTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('agendamentos');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SituacaoAgendamentos', [
            'foreignKey' => 'situacao_agendamento_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Operacoes', [
            'foreignKey' => 'operacao_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Notificacoes', [
            'foreignKey' => 'agendamento_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->notEmptyString('nome');

        $validator
            ->dateTime('data_hora')
            ->requirePresence('data_hora', 'create')
            ->notEmptyDateTime('data_hora');

        $validator
            ->integer('cpf_condutor')
            ->notEmptyString('cpf_condutor');

        $validator
            ->scalar('nome_condutor')
            ->maxLength('nome_condutor', 255)
            ->notEmptyString('nome_condutor');

        $validator
            ->scalar('cnpj_transportadora')
            ->maxLength('cnpj_transportadora', 45)
            ->notEmptyString('cnpj_transportadora');

        $validator
            ->scalar('nome_transportadora')
            ->maxLength('nome_transportadora', 255)
            ->notEmptyString('nome_transportadora');

        $validator
            ->scalar('cnpj_cliente')
            ->maxLength('cnpj_cliente', 45)
            ->notEmptyString('cnpj_cliente');

        $validator
            ->scalar('nome_cliente')
            ->maxLength('nome_cliente', 255)
            ->notEmptyString('nome_cliente');

        $validator
            ->scalar('placa_veiculo')
            ->maxLength('placa_veiculo', 45)
            ->notEmptyString('placa_veiculo');

        $validator
            ->scalar('placa_reboque_um')
            ->maxLength('placa_reboque_um', 45)
            ->notEmptyString('placa_reboque_um');

        $validator
            ->scalar('placa_reboque_dois')
            ->maxLength('placa_reboque_dois', 45)
            ->notEmptyString('placa_reboque_dois');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        $rules->add($rules->existsIn(['situacao_agendamento_id'], 'SituacaoAgendamentos'));
        $rules->add($rules->existsIn(['operacao_id'], 'Operacaos'));

        return $rules;
    }
}
