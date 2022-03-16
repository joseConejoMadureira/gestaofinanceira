@extends('layout') @section('content')

    <script type="text/javascript" src="../js/painel/gastosPainel.mim.js"></script>

    <div class="ui tag label">Gastos</div>
    </br>
    </br>
    <div id="gasto_ano" class="ui red tag label" style="display: none"></div>
    <div id="gasto_mes" class="ui red tag label" style="display: none"></div>

    <canvas id="myChart" width: 900px; height: 500px"></canvas>

    <table class="ui celled table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>Descrição</th>
            </tr>
        </thead>
        @foreach ($gastos as $value)
            <tbody>
                <tr class="negative">
                    <td class="dataextenso">{{ $value->data_registro }}</td>
                    <td class="moeda">{{ $value->valor }}</td>
                    <td>{{ $value->descricao }}</td>
                </tr>
            </tbody>
        @endforeach
    </table>
    </br>
    </br>

    <script type="text/javascript" src="../js/gastos/gastos.min.js"></script>
@stop
