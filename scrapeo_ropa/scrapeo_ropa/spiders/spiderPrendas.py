from os import sep
import scrapy
from scrapy.linkextractors import LinkExtractor
from scrapy.spiders import Rule, CrawlSpider
from scrapeo_ropa.items import ScrapeoRopaItem
import re
import datetime

class spiderPrendas(scrapy.Spider):
    name = 'scrapeo_ropa'
    allowed_domains = ['www.nike.com']
    start_urls = ['https://www.nike.com/es/launch?s=upcoming']
    productos = []
    links = []


    #funciones
    def parse(self, response):
        direcciones = response.xpath("//figure/div/div[1]/a[@data-qa='product-card-link']/@href").getall()

        #recorremos todas las direcciones de los productos
        for link in direcciones:
            url = "https://www.nike.com"+ link
            self.links.append(url)
            yield scrapy.Request(url, callback= self.datos_zapas)


    def datos_zapas(self, response):

        producto = {}
        #filtramos que los datos que queremos guardar sean zapatillas
        if response.xpath("//head/meta[@name='description'][@content='Echa un vistazo a la colección de ropa Nike x CACT.US CORP.']").get() == None:

            #añadimos todos los datos al diccionario
            producto['marca'] = "nike"
            producto['linea'] = response.xpath("//aside/div/div/h1/text()").get()
            producto['modelo'] = response.xpath("//aside/div/div/h5/text()").get()
            producto['descripcion'] = response.xpath("//aside/div/div[1]/div[3]/p/text()").get()
            producto['precio'] = response.xpath("//aside/div/div/div[1]/text()").get()
            producto['fecha_salida'] = response.xpath("//aside/div/div[1]/div[2]/div[@class = 'available-date-component']/text()").get()
            producto['imagen'] = response.xpath("//div[@role = 'listbox']/div[3]/figure/img/@src").get()

            #variable para iterar con los links
            #indice = len(self.productos)
            #producto['url'] = links[len(self.productos)]
            
            self.productos.append(producto)
            #self.depurar_datos(producto)

        yield {
            'zapas' : producto,
            'total' : len(self.productos)
        }


    def depurar_datos(self, diccionario):

        zapatilla = ScrapeoRopaItem()

        #depuramos el precio
        precio = diccionario['precio'].replace(",", ".")
        precio = precio[:-2]
        float(precio)
        zapatilla['precio'] = precio

        #depuramos fecha
        numerosFecha = re.findall('[0-9]+', diccionario['fecha_salida'])

        if len(numerosFecha[0]) == 1:
            numerosFecha[0] = '0' + numerosFecha[0]
        if len(numerosFecha[1]) == 1:
            numerosFecha[1] = '0' + numerosFecha[1]

        #obtenemos año
        fActual = datetime.datetime.now()
        anioActual = fActual.date()

        #cosntruimos la fecha entera
        stringFecha = f"{anioActual.year}-{numerosFecha[1]}-{numerosFecha[0]} {numerosFecha[2]}:{numerosFecha[3]}"
        fechaFinal = datetime.datetime.strptime(stringFecha, "%Y-%m-%d %H:%M")
        #la añadimos a nuestro objeto
        zapatilla['fecha_salida'] = fechaFinal

        #depuramos texto en linea modelo y descripcion
        #if '\xa0' in diccionario['linea']:
        #    diccionario['linea'] = re.sub("\xa0", " ", diccionario['linea'])
        #if '\xa0' in diccionario['modelo']:
        #    diccionario['modelo'] = re.sub("\xa0", " ", diccionario['modelo'])
        #if '\xa0' in diccionario['descripcion']:
        #    diccionario['descripcion'] = re.sub("\xa0", " ", diccionario['descripcion'])

        zapatilla['linea'] = diccionario['linea']
        zapatilla['modelo'] = diccionario['modelo']
        zapatilla['descripcion'] = diccionario['descripcion']
        zapatilla['marca'] = diccionario['marca']
        zapatilla['imagen'] = diccionario['imagen']
        zapatilla['url'] = self.links[len(self.links)]
    
        