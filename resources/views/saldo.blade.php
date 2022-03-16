@extends('layout')
@section('content')

    <script type="text/javascript" src="../js/painel/saldoPainel.mim.js"></script>



    <div class="ui tag label">Saldo</div></br>
    </br>
    <div id="saldoAnoPositivo" class="ui teal tag label" style="display: none"></div>
    <div id="saldoAnoNegativo" class="ui red tag label" style="display: none"></div>
    <div id="saldoMesNegativo" class="ui red tag label" style="display: none"></div>
    <div id="saldoMesPositivo" class="ui teal tag label" style="display: none"></div>


    <canvas id="myChart" width: 900px; height: 500px"></canvas>

    <table class="ui celled table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>receita/despesas/gastos/lucro/prejuizo</th>
                <th>Valor</th>
                <th>Saldo atualizado</th>
            </tr>
        </thead>
        @foreach ($saldo as $saldos)
            @if ($saldos->valor > 0)
                <tbody>
                    <tr class="positive">
                        <td class="dataextenso">{{ $saldos->data_registro }}</td>
                        <td>{{ $saldos->descricao }}</td>
                        <td>{{ $saldos->modalidade }}</td>
                        <td class="moeda">{{ $saldos->valor }}</td>
                        <td class="moeda">{{ $saldos->valor_atualizado }}</td>
                    </tr>
                </tbody>
            @else
                <tbody>
                    <tr class="negative">
                        <td class="dataextenso">{{ $saldos->data_registro }}</td>
                        <td>{{ $saldos->descricao }}</td>
                        <td>{{ $saldos->modalidade }}</td>
                        <td class="moeda">{{ $saldos->valor }}</td>
                        <td class="moeda">{{ $saldos->valor_atualizado }}</td>
                    </tr>
                </tbody>
            @endif
        @endforeach
    </table>
    </br>
    </br>

    <script type="text/javascript" src="../js/saldo/saldo.mim.js"></script>


@stop
