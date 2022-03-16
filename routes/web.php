<?php

use Illuminate\Support\Facades\Route;

//index
 Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index'
])->name('home');
Route::get('/alteraSenha', function () {
    return view('alteraSenha');
})->middleware('auth');

Route::get('/alterarSenhaM', 'App\Http\Controllers\AlteraSenhaC_Controller@alterarSenhaMe')
->middleware('auth');
Route::get('/', 'App\Http\Controllers\layout_Controller@home')
->middleware('auth');

//painel

Route::get('/saldo',
 'App\Http\Controllers\saldo_Controller@saldo')
 ->middleware('auth');



 Route::get('/livre',
 'App\Http\Controllers\saldo_Controller@livre')
 ->middleware('auth');

 Route::get('/investir',
 'App\Http\Controllers\saldo_Controller@investir')
 ->middleware('auth');

 Route::get('/gauge',
 'App\Http\Controllers\GaugeController@gauge')
 ->middleware('auth');

 Route::get('/equifim',
 'App\Http\Controllers\PatrimonioController@getInicFim')
 ->middleware('auth');

 Route::get('/metaabc',
 'App\Http\Controllers\PatrimonioController@getMetaAbc')
 ->middleware('auth');

 Route::get('/anos',
 'App\Http\Controllers\PatrimonioController@anos')
 ->middleware('auth');

//saldo
Route::get('/saldoAtualizado',
 'App\Http\Controllers\saldo_Controller@saldoAtualizado')
 ->middleware('auth');

 Route::get('/saldoMes',
 'App\Http\Controllers\saldo_Controller@saldoMes')
 ->middleware('auth')->middleware('auth');

 Route::get('/saldoAno',
 'App\Http\Controllers\saldo_Controller@saldoAno')
 ->middleware('auth')->middleware('auth');

 Route::get('/saldoGrafico',
 'App\Http\Controllers\saldo_Controller@saldoGrafico')
 ->middleware('auth');

 Route::get('/saldoGraficoEmprego',
 'App\Http\Controllers\saldo_Controller@saldoGraficoEmprego')
 ->middleware('auth');

//gastos

Route::get('/lancamentos_gastos',
            'App\Http\Controllers\lancamentos_gastos_Controller@lacamentos_gastos_form')
            ->middleware('auth');
            Route::get('/gastoAno',
             'App\Http\Controllers\gastos_Controller@gastos_ano')
             ->middleware('auth');

            Route::get('/gastos',
             'App\Http\Controllers\gastos_Controller@gastos')->middleware('auth');
            Route::get('/gastoGrafico', 'App\Http\Controllers\gastos_Controller@gastoGrafico')
            ->middleware('auth');

//investimentos
 Route::get('/aplica_resgate',
 'App\Http\Controllers\investimento_Controller@aplica_resgate')
 ->middleware('auth');

 Route::get('/getInvestimentoAtualizado',
 'App\Http\Controllers\investimento_Controller@getInvestimentoAtualizado')
 ->middleware('auth');

 Route::get('/investimento',
 'App\Http\Controllers\investimento_Controller@investimento')
 ->middleware('auth');

 Route::get('/investimentoLabel',
 'App\Http\Controllers\investimento_Controller@getInvestimentoAtualizado')
 ->middleware('auth');

//despesas

Route::get('/parametros_despesas',
 'App\Http\Controllers\parametros_despesas_Controller@getDespesas')
 ->middleware('auth');

 Route::get('/registraDespesas',
 'App\Http\Controllers\parametros_despesas_Controller@registraDespesas')
 ->middleware('auth');

 Route::get('/getTotal',
 'App\Http\Controllers\parametros_despesas_Controller@getTotal')
 ->middleware('auth');

 Route::get('/deletaDepesas/{id}',
 'App\Http\Controllers\parametros_despesas_Controller@deletaDepesas')
 ->middleware('auth');


//patrimonio

Route::get('/patrimonio',
 'App\Http\Controllers\PatrimonioController@getPatrimonioView')
 ->middleware('auth');

 Route::get('/patrimonio_a',
'App\Http\Controllers\PatrimonioController@getPatrimonio')
->middleware('auth');

Route::get('/graficoPatrimonio',
 'App\Http\Controllers\PatrimonioController@graficoPatrimonio')
 ->middleware('auth');

//meta

Route::get('/parametros_ajustes',
 'App\Http\Controllers\MetaController@getMeta')
 ->middleware('auth');

 Route::get('/getMetaMes',
 'App\Http\Controllers\MetaController@getMetaMes')
 ->middleware('auth');

 Route::get('/getObjetivo',
 'App\Http\Controllers\MetaController@getObjetivo')
 ->middleware('auth');

 Route::get('/DeletaMeta/{id}',
 'App\Http\Controllers\MetaController@DeletaMeta')
 ->middleware('auth');

 Route::get('/registraMesMeta',
 'App\Http\Controllers\MetaController@registraMesMeta')
 ->middleware('auth');

 Route::get('/getEquiinic',
 'App\Http\Controllers\MetaController@getEquiinic')
 ->middleware('auth');

 Route::get('/getEquifim',
 'App\Http\Controllers\MetaController@getEquifim')
 ->middleware('auth');

//lancamentos receita

Route::get('/lancamentos_receita',
 'App\Http\Controllers\lancamentos_receita_Controller@lacamentos_receita_form')
 ->middleware('auth');

Route::get('/lancamentos_receita_a',
 'App\Http\Controllers\lancamentos_receita_Controller@lacamentos_receita')
 ->middleware('auth');
//lancamentos despesas

Route::get('/lancamentos_despesas',
 'App\Http\Controllers\lancamentos_despesas_Controller@lacamentos_despesas_form')
 ->middleware('auth');

 Route::get('/lancamentos_despesas_a',
 'App\Http\Controllers\lancamentos_despesas_Controller@lacamentos_despesas_a')
 ->middleware('auth');


//lancamentos imposto

Route::get('/lancamentos_impostos',
 'App\Http\Controllers\lancamentos_impostos_Controller@lacamentos_impostos_form')
 ->middleware('auth');

Route::get('/lancamentos_impostos_a',
'App\Http\Controllers\lancamentos_impostos_Controller@lacamentos_impostos')
->middleware('auth');


//lancamentos gastos

Route::get('/lancamentos_gastos_a',
            'App\Http\Controllers\lancamentos_gastos_Controller@lacamentos_gastos')
            ->middleware('auth');
Route::get('/lancamentos_gastos_mensal',
            'App\Http\Controllers\lancamentos_gastos_Controller@gastos_mensal')
            ->middleware('auth');

//ajustes mais
Route::get('/lacamentos_ajustesMais',
'App\Http\Controllers\lancamentos_ajusteMais_Controller@lacamentos_ajustesMais_form')
->middleware('auth');

Route::get('/lacamentos_ajustesMais_a',
 'App\Http\Controllers\lancamentos_ajusteMais_Controller@lacamentos_ajustesMais')
 ->middleware('auth');

//ajustes menos
Route::get('/lacamentos_ajustesMenos',
'App\Http\Controllers\lancamentos_ajustesMenos_Controller@lacamentos_ajustesMenos_form')
->middleware('auth');

Route::get('/lacamentos_ajustesMenos_a',
 'App\Http\Controllers\lancamentos_ajustesMenos_Controller@lacamentos_ajustesMenos')
 ->middleware('auth');


//lixo
Route::get('/investimento_cdb', function () {
    return view('investimento_cdb');
})->middleware('auth');
Route::get('/investimento_poupanca', function () {
    return view('investimento_poupanca');
})->middleware('auth');
Route::get('/Investimento_tituloTesouto', function () {
    return view('Investimento_tituloTesouto');
})->middleware('auth');


