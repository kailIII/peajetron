#!/bin/sh
usuario=peajetron
contrasena=peajetron
base=peajetron

echo "--------------------------------------------"
date=`date`;
echo $date
cd /tmp/backup
echo "Borrando Archivos Antiguos ..."
find -name '*.tar.gz' -type f -mtime +8 -exec \rm -f {} \;

echo "Ejecutando el dump de la Base de Datos ..."
PGPASSWORD="${contrasena}" pg_dump -U ${usuario} ${base} > peajetron.sql 2>database.err

date=`date +%H:%M:%S`;
if [ "$?" -eq 0 ]; then
  mensaje="$date Dump finalizado correctamente"
else
  mensaje="$date Ocurrio un problema en Dump de la base de datos. Mirar el archivo database.err para mayor informacion"
fi
echo $mensaje

date=`date +%H:%M:%S`;
echo "$date Comprimiendo archivo ..."
date=`date +%Y%m%d_%H`;
tar -czf peajetron_$date.tar.gz peajetron.sql
\rm peajetron.sql

date=`date +%H:%M:%S`;
echo "$date Backup finalizado de manera Correcta !!"
echo "--------------------------------------------"
