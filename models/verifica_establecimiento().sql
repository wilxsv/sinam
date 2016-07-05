CREATE OR REPLACE FUNCTION last.verifica_establecimiento()
  RETURNS integer AS
$BODY$
/**
 * Funcion que limpia las tablas que almacenan establecimientos, medicamentos y existencia
 * Autor:  Ministerio de Salud de El Salvador
 * Elemplo: SELECT * FROM limpia_tablas_finales;
 *
*/
DECLARE
    var BIGINT;
    v_item RECORD;
    num INTEGER;
BEGIN
    num := 0;
    FOR v_item IN SELECT * FROM last.ctl_establecimiento LOOP
        var := 0;
        SELECT id INTO var FROM public.ctl_establecimiento WHERE nombre = v_item.nombre AND id_municipio = v_item.id_municipio AND cod_ucsf = v_item.cod_ucsf;
        IF ( var = 0 ) THEN
            RAISE INFO ' :: % - % :: ' , var, v_item.nombre;/*
            INSERT INTO last.ctl_establecimiento(
            id, id_tipo_establecimiento, nombre, direccion, telefono, fax, 
            latitud, longitud, id_municipio, id_nivel_minsal, cod_ucsf, activo, 
            id_establecimiento_padre, tipo_expediente, configurado, tipo_farmacia, 
            dias_intermedios_citas, citas_sin_expediente, id_institucion, 
            tipo_impresion, minutoshora, tiempoprevioalacita)
    VALUES (?, ?, ?, ?, ?, ?, 
            ?, ?, ?, ?, ?, ?, 
            ?, ?, ?, ?, 
            ?, ?, ?, 
            ?, ?, ?);*/
            num=num+1;
        ELSE
            --
        END IF;
    END LOOP;
    RAISE INFO ' Total % :: ' , num;
    RETURN 1;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

  select  last.verifica_establecimiento();