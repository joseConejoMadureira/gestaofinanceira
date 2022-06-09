# Sistema de gestão financeira
Esse sistema tem como Objetivo ser uma ferramenta na qual auxilie 
gestão financeira contendo saldo de mes ano e graficos relativos.
classificação de gastos e metas financeiras
##  Requisitos
PHP 8.1.6 
Composer 2.2.6
postgresql

##  Instalação (comados a serem realizados dentro da pasta do projeto)
### copia base .env.example (arquivo de configuração )
```
cp .env.example .env
```

####  instalar dependencia de projeto
```
composer install
```
####  instalar dependencia de projeto
```
php artisan key:generate 

```

####  editar configurações de banco de dados no arquivo .env
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=seuBancoDados
DB_USERNAME=postgres
DB_PASSWORD=suaSenha

```
####  criar tabelas
```
php artisan migrate
```

####  dados inicias 
```
--carga inicial 
 INSERT INTO public.users (name,email,email_verified_at,"password",remember_token,created_at,updated_at) VALUES
	 ('jose antonio','email@email.com',NULL,'$2y$10$YmLZL8nhEecBalV4ZMm9YuGcbN/S6IqaJxclR5Soy/mQ8.DtKQQXC',NULL,'2022-03-16 18:35:17','2022-03-16 18:35:17');

 INSERT INTO public.saldo (data_registro,valor,descricao,modalidade,valor_atualizado) VALUES
	 ('2022-04-16',1000,'carga inicial','carga inicial',1000);
	
 INSERT INTO public.patrimonio (data_registro,valor) VALUES
	 ('2022-03-16',1000);

INSERT INTO public.investimentos (data_registro,valor,modalidade,valor_atualizado) VALUES
	 ('2022-03-16',0,'carga inicial',0);

INSERT INTO public.custos (data_registro,valor,descricao) VALUES
	 ('2021-07-30',0,'lazer');
	
	 INSERT INTO public.meta (objetivo,mes,equiinic,equifim) VALUES
	 (30000.0,4000.0,10000.0,15000.0);

INSERT INTO public.flag (data_registro) VALUES
	 ('2022-01-01');

```
####  Inciar server local: http://127.0.0.1:8000 
```
php artisan serve
```

####  E-Mail Address
```
email@email.com
```

####  Password
```
123
```
