# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: https://docs.scrapy.org/en/latest/topics/item-pipeline.html


# useful for handling different item types with a single interface
from itemadapter import ItemAdapter
import pymysql


class ScrapeoRopaPipeline(object):
    #guardar datos de forma sincronica
    def __init__(self):
        # Establecer una conexión
        self.conn = pymysql.connect(host='localhost', user='root', passwd='', db='datos_web')
        # Crear cursor
        self.cursor = self.conn.cursor()


    def process_item(self, item, spider):
        # sentencia sql
        sql_pagina = """
        insert into pagina(URL) VALUES(%s);
        """

        sql_zapatilla = """
        insert into producto(MARCA, LINEA, MODELO, DESCRIPCION, PRECIO, FECHA_SALIDA, IMAGEN, ID_PAGINA)
            VALUES('%s', '%s', '%s', '%s', %s, '%s', %s,(select id from pagina where url = %s));
        """
        # Realizar la inserción de datos en la base de datos
        self.cursor.execute(sql_pagina,("fa"))
        # Enviar, no se puede guardar en la base de datos sin enviar
        
        self.cursor.execute(sql_zapatilla,(item.get('marca'), item.get('linea'), item.get('modelo'), item.get('descripcion'), item.get('precio'),
                                            item.get('fecha_salida'), None, "fa"))

        self.conn.commit()


    def close_spider(self,spider):
        # Cerrar cursor y conexión
        self.cursor.close()
        self.conn.close()
