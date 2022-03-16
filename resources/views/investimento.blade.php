@extends('layout')
@section('content')

    <script type="text/javascript" src="../js/painel/investimentos.js"></script>
    <div class="ui tag label">Investimentos</div>
    </br>
    </br>
    <a id="investimentos" class="ui tag label"></a>
    </br>
    </br>
    <div class="ui form">
        <div class="three fields">
            <form action="/aplica_resgate">
                <div class="field">
                    <label>valor</label>
                    <input name="valor" id="currency" type="text" onkeyup="k(this);">
                    </br>
                
                </div>
                <br>
                <div class="field">
                    <select name="modalidade">
                        <option value="aplicar">Aplicar</option>
                        <option value="resgate">Resgatar</option>
                        <option value="valorizacao">valorizacao</option>
                        <option value="desvalorizacao">desvalorizacao</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="ui primary button">
                    Save
                </button>
            </form>
        </div>
        
    </div>
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Data</th>
                <th>modalidade</th>
                <th>Valor</th>
                <th>total</th>
            </tr>
        </thead>
        @foreach ($investimentos as $inv)
            @if ($inv->modalidade == 'resgate' || $inv->modalidade == 'desvalorizacao investimentos')
                <tbody>
                    <tr class="negative">
                        <td class="dataextenso">{{ $inv->data_registro }}</td>
                        <td>{{ $inv->modalidade }}</td>
                        <td class="moeda">{{ $inv->valor }}</td>
                        <td class="moeda">{{ $inv->valor_atualizado }}</td>
                    </tr>
                @else
                <tbody>
                    <tr class="positive">
                        <td class="dataextenso">{{ $inv->data_registro }}</td>
                        <td>{{ $inv->modalidade }}</td>
                        <td class="moeda">{{ $inv->valor }}</td>
                        <td class="moeda"> {{ $inv->valor_atualizado }}</td>
                    </tr>
                    </tr>
            @endif
            </tbody>
        @endforeach
    </table>

@stop
