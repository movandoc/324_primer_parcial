select tmp.departamento, sum(cb.saldo)
from cuenta_bancaria cb, (select ci, departamento from persona where ci>10) as tmp
where tmp.ci = cb.id_cliente

select id_cliente,sum(saldo) as monto
from cuenta_bancaria 

select p.ci, sum(tmp.monto)
from persona p, (select id_cliente,sum(saldo) as monto
                from cuenta_bancaria ) as tmp
where p.ci = tmp.id_cliente
group by p.departamento

select cb.id_cliente,sum(cb.saldo) as monto
from cuenta_bancaria cb, (select ci from persona where ci>10) as tmp
where tmp.ci=cb.id_cliente

SELECT p.nombre, p.departamento, cb.id_cliente, sum(cb.saldo) as monto
from cuenta_bancaria cb, persona p
where p.ci=cb.id_cliente
group by id_cliente

select tmp.departamento, sum(tmp.monto)
from persona p, (SELECT p.nombre, p.departamento, cb.id_cliente, sum(cb.saldo) as monto
                    from cuenta_bancaria cb, persona p
                    where p.ci=cb.id_cliente
                    group by cb.id_cliente) as tmp
where tmp.departamento = p.departamento
group by tmp.departamento

select DISTINCT departamento
from persona
where ci>10


select tmp.departamento, sum(tmp.monto)
from (select DISTINCT departamento
        from persona
        where ci>10
        )tpm, (SELECT p.nombre, p.departamento, cb.id_cliente, sum(cb.saldo) as monto
                    from cuenta_bancaria cb, persona p
                    where p.ci=cb.id_cliente
                    group by cb.id_cliente) as tmp
where tmp.departamento = tpm.departamento
group by tmp.departamento


select
sum(case when x.departamento="LA PAZ" then x.monto_total end) as LA_PAZ,
sum(case when x.departamento="COCHABAMBA" then x.monto_total end) as COCHABAMBA,
sum(case when x.departamento="SANTA CRUZ" then x.monto_total end) as SANTA_CRUZ,
sum(case when x.departamento="ORURO" then x.monto_total end) as ORURO,
sum(case when x.departamento="POTOSI" then x.monto_total end) as POTOSI,
sum(case when x.departamento="CHUQUISACA" then x.monto_total end) as CHUQUISACA,
sum(case when x.departamento="TARIJA" then x.monto_total end) as TARIJA,
sum(case when x.departamento="BENI" then x.monto_total end) as BENI,
sum(case when x.departamento="PANDO" then x.monto_total end) as PANDO
from(select tmp.departamento, sum(tmp.monto)as monto_total
    from (select DISTINCT departamento
            from persona
            where ci>10
            )as tpm, (SELECT p.nombre, p.departamento, cb.id_cliente, sum(cb.saldo) as monto
                        from cuenta_bancaria cb, persona p
                        where p.ci=cb.id_cliente
                        group by cb.id_cliente) as tmp
    where tmp.departamento = tpm.departamento
    group by tmp.departamento) as x