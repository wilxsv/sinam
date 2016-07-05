-- Function: last.limpia_tablas_finales()

-- DROP FUNCTION last.limpia_tablas_finales();

CREATE OR REPLACE FUNCTION last.limpia_tablas_finales()
  RETURNS integer AS
$BODY$
/**
 * Funcion que limpia las tablas que almacenan establecimientos, medicamentos y existencia
 * Autor:  
 * Elemplo: SELECT * FROM limpia_tablas_finales;
 *
*/
BEGIN
    SET session_replication_role = replica;
    TRUNCATE last.farm_catalogoproductos, last.farm_medicinaexistenciaxarea RESTART IDENTITY;
    DELETE FROM last.ctl_establecimiento;
    DELETE FROM last.mnt_areafarmaciaxestablecimiento;
    ALTER SEQUENCE last.ctl_establecimiento_id_seq RESTART WITH 1;
    ALTER SEQUENCE last.mnt_areafarmaciaxestablecimiento_idrelacion_seq RESTART WITH 1;
    --TRUNCATE last.ctl_establecimiento, last.mnt_areafarmaciaxestablecimiento RESTART IDENTITY;
    SET session_replication_role = DEFAULT;
    RETURN 1;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION last.limpia_tablas_finales()
  OWNER TO dtic;
