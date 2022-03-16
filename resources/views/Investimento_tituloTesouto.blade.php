@extends('layout')
@section('content')

    <div class="ui tag label">Investimentos titulo do tesouro</div>
    </br>
    </br>
    <div class="ui tag label">Total 19000</div>
    </br>
    </br>
    <div class="ui form">
        <div class="three fields">
            <div class="field">
                <label>valor</label>
                <input id="valor" onkeyup="formatarMoeda()" type="text">
                </br>
                <select>
                    <option value="1">Aplicar</option>
                    <option value="0">Resgatar</option>
                </select>
            </div>
            <button class="ui primary button">
                Save
            </button>
        </div>

    </div>
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>modalidade</th>
                <th>total</th>
                <th>vencimento</th>
            </tr>
        </thead>
        <tbody>
            <tr class="positive">
                <td>03/04/2021</td>
                <td>5000</td>
                <td>aplicação</td>
                <td>24000</td>
                <td>03/04/2031</td>
            </tr>

            <tr class="negative">
                <td>03/04/2021</td>
                <td>3.000</td>
                <td>resgate</td>
                <td>21000</td>
                <td>03/04/2031</td>
            </tr>


        </tbody>
    </table>



    <script>
        function formatarMoeda() {
            var elemento = document.getElementById('valor');
            var valor = elemento.value;

            valor = valor + '';
            valor = parseInt(valor.replace(/[\D]+/g, ''));
            valor = valor + '';
            valor = valor.replace(/([0-9]{2})$/g, ",$1");

            if (valor.length > 6) {
                valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            }

            elemento.value = valor;
            if (valor == 'NaN') elemento.value = '';
        }
    </script>
@stop
