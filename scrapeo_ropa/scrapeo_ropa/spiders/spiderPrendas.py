import scrapy
from scrapy.linkextractors import LinkExtractor

class spiderPrendas(scrapy.Spider):
    name = 'scrapeo_ropa'
    allowed_domains = ['www.nike.com']
    start_urls = ['https://www.nike.com/es/launch?s=upcoming']

    productos = []

    #funciones
    def parse(self, response):
        links = response.xpath("//figure/div/div/a/@href").getall()

        #recorremos todas las direcciones de los productos
        for link in links:
            url = "https://www.nike.com"+ link
            yield scrapy.Request(url, callback= self.parse)

        producto = {}
        #añadimos todos los datos al diccionario
        producto['marca'] = "nike"
        producto['linea'] = response.xpath("//aside/div/div/h1/text()").get()
        producto['modelo'] = response.xpath("//aside/div/div/h5/text()").get()
        producto['descripcion'] = response.xpath("//aside/div/div[1]/div[3]/p/text()").get()
        producto['precio'] = response.xpath("//aside/div/div/div[1]/text()").get()
        producto['fecha_salida'] = response.xpath("//aside/div/div[1]/div[2]/div[@class = 'available-date-component']/text()").get()
        producto['imagen'] = response.xpath("//div[@role = 'listbox']/div[1]/figure/img/@src").get()
        producto['url'] = links[self.productos.count]
        
        self.productos.append(producto)

        yield {
            'zapas' : producto
        }
        