@extends('layout') @section('content')

    <div class="ui tag label">Alterar senha</div>
    </br>
    </br>
    <form class="ui form" action="/alterarSenhaM" method="get">
        <div class="field">
            <label>email</label> <input name="email" type="email" value="jmadureira01@yandex.com">

        </div>


        <div class="field">
            <label>password</label>
            <input name="password" type="password">
        </div>

        <button class="ui button" type="submit">Salvar</button>
    </form>
    </br>
    </br>

@stop
