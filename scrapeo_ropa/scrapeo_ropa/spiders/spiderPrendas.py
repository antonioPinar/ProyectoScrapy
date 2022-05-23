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
        producto['nombre'] = response.xpath("//aside/div/div/h5/text()").get()
        producto['linea'] = response.xpath("//aside/div/div/h1/text()").get()
        self.productos.append(producto)

        yield {
            'zapas' : self.productos
        }
        