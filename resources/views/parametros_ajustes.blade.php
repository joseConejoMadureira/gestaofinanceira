@extends('layout')
@section('content')

    <div class="ui tag label">Meta</div></br>
    </br>
    <form class="ui form" action="/registraMesMeta" method="get">
        <div class="field">
            <label>Meta</label>
            <input name="meta" id="valor" onkeyup="k(this);" type="text" placeholder="Meta">
            </br>
            </br>
            <label>Mes</label>
            <input name="mes" id="mes" onkeyup="k(this);" type="text" placeholder="Mes">
            </br>
            </br>
            <label>Equilibrio Inicio</label>
            <input name="equiinic" id="equiinic" onkeyup="k(this);" type="text" placeholder="Equilibrio Inicio">
            </br>
            </br>
            <label>Equilibrio Fim</label>
            <input name="equifim" id="equifim" onkeyup="k(this);" type="text" placeholder="Equilibrio Fim">

        </div>

        <button class="ui button" type="submit">Salvar</button>
    </form>

    <table class="ui celled table">
        <thead>
            <tr>
                <th>Meta</th>
                <th>Mês</th>
                <th>Equilibrio Inicio</th>
                <th>Equilibrio Fim</th>
                <th>Excluir</th>
            </tr>
        </thead>
        @foreach ($meta as $value)
            <tbody>
                <tr>
                    <td class="moeda">{{ $value->objetivo }}</td>
                    <td class="moeda">{{ $value->mes }}</td>
                    <td class="moeda">{{ $value->equiinic }}</td>
                    <td class="moeda">{{ $value->equifim }}</td>
                    <td><a href="/DeletaMeta/{{ $value->id }}"><img src="delete.png"></a></td>

                </tr>
            </tbody>
        @endforeach
    </table>
    </br>
    </br>
    <script type="text/javascript" src="../js/moeda/formataMoeda.js"></script>
@stop
