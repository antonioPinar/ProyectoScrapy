# Define here the models for your scraped items
#
# See documentation in:
# https://docs.scrapy.org/en/latest/topics/items.html

import scrapy


class ScrapeoRopaItem(scrapy.Item):
    # define the fields for your item here like:
    # name = scrapy.Field()
    marca = scrapy.Field() 
    linea = scrapy.Field()  
    modelo = scrapy.Field() 
    descripcion = scrapy.Field()  
    precio = scrapy.Field() 
    fecha_salida = scrapy.Field() 
    imagen = scrapy.Field() 
    url = scrapy.Field()
