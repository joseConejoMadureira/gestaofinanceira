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