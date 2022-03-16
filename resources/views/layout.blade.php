<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/layot.mim.css">
    <link rel="stylesheet" type="text/css" href="../../css/semantic.mim.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.mim.css">

    <link rel="stylesheet" type="text/css" media="all" href="../css/mobile.css">
    <script type="text/javascript" src="../js/chart.js"></script>
    <script type="text/javascript" src="../js/loader.js"></script>
    <script type="text/javascript" src="../js/painel/patrimonioPainel.mim.js"></script>
    <script type="text/javascript" src="../js/painel/painel.mim.js"></script>
    <script type="text/javascript" src="../js/currencymaskMoney.js"></script>
    <script type="text/javascript" src="../js/moeda/formataMoeda.js"></script>
    <script type="text/javascript" src="../js/moeda/moeda.js"></script>


    <title>finanças</title>
</head>

<body>



    <div id="painel">

        <div class="ui grid">
            <div class="intemPaine" id="chart_div" style="width: 170px; height: 138px;"></div>

            <div class="ui label">
                <P class="fonte ">Saldo:</P>
                <div id="saldo" class="fonte"></div>
            </div>
            <div class="ui label ">
                <P class="fonte ">Saldo mes:</P>
                <div id="saldoMes" class="fonte"></div>
            </div>
            <div class="ui label ">
                <P class="fonte ">gastos mes:</P>
                <div id="gastoMes" class="fonte"></div>
            </div>

            <div class="ui label ">
                <P class="fonte">investimentos:</P>
                <div id="investimentosPainel" class="fonte "></div>
            </div>
            <div class="ui label ">
                <P class="fonte ">Anos:</P>
                <div id="anos" class="fonte "></div>
            </div>
            <div class="ui label ">
                <P class="fonte ">Livre:</P>
                <div id="livre" class="fonte "></div>
            </div>

            <div class="ui label ">
                <P class="fonte ">Equi fim:</P>
                <div id="equiFim" class="fonte "></div>
            </div>
            <div class="ui label ">
                <P class="fonte ">Meta:</P>
                <div id="metaabc" class="fonte "></div>
            </div>

        </div>
    </div>
    </br>
    <div id="conteudo" class="container">@yield('content')</div>

    <div id="menu_laterira">


        <div id="movel" class="ui vertical menu">

            <div class="item">
                <div class="header">Relatorios</div>
                <div class="menu">
                    <a href="/saldo" class="item">Saldo</a>
                    <a href="/patrimonio" class="item">Patrimonio</a>
                    <a href="/gastos" class="item">Gastos</a>

                </div>
            </div>
            <div class="item">
                <div class="header">Parametros</div>
                <div class="menu">
                    <a href="/parametros_despesas" class="item">despesas</a>
                    <a href="/parametros_ajustes" class="item">Meta</a>
                </div>
            </div>
            <div class="item">
                <div class="header">Laçamentos</div>
                <div class="menu">
                    <a href="/lancamentos_receita" class="item">receita</a>
                    <a href="/lancamentos_gastos" class="item">gastos</a>
                    <a href="/lancamentos_despesas" class="item">Despesas</a>
                    <a href="/lacamentos_ajustesMenos" class="item">Ajustes Menos -------</a>
                    <a href="/lacamentos_ajustesMais" class="item">Ajuste mais ++++++++
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="header">Investimentos</div>
                <div class="menu">
                    <a href="/investimento" class="item">investimentos</a>
                </div>
            </div>
            <div class="item">
                <div class="header">AlterarSenha</div>
                <div class="menu">
                    <a href="/alteraSenha" class="item">AltererarSenha</a>
                </div>
            </div>
            <div class="item">
                <div class="menu">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="ui negative basic button item" type="submit">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="../js/moeda/formataMoeda.js"></script>
<script type="text/javascript" src="../js/dataExtenso.js"></script>

</html>
