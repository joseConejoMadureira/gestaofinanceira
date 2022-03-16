@extends('layout')
@section('content')
    <script type="text/javascript" src="../js/painel/despesas.js"></script>
    <div class="ui tag label">Paramentros despesas</div></br>
    </br>
    <div id="totalDespesas" class="ui tag label"></div></br></br>
    <div id="totalDespesasAno" class="ui tag label"></div></br>
    </br>
    <form class="ui form" action="/registraDespesas" method="get">
        <div class="field">
            <label>Valor</label>
            <input name="valor" id="valor" onkeyup="k(this);" type="text">
        </div>
        <div class="field">
            <label>Descrição</label>
            <input name="descricao" type="text" placeholder="Descrição">
        </div>

        <button class="ui button" type="submit">Salvar</button>
    </form>
    </br>
    </br>



    <table class="ui celled table">
        <thead>
            <tr>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Excluir</th>
            </tr>
        </thead>
        @foreach ($despesas as $value)
            <tbody>
                <tr>
                    <td class="moeda">{{ $value->valor }}</td>
                    <td>{{ $value->descricao }}</td>
                    <td><a href="/deletaDepesas/{{ $value->id }}"><img src="delete.png"></a></td>

                </tr>
            </tbody>
        @endforeach
    </table>
    </br>
    </br>

    <script type="text/javascript" src="../js/moeda/formataMoeda.js"></script>
@stop
