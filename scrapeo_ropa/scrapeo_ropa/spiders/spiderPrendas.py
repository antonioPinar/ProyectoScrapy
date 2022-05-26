import scrapy
from scrapy.linkextractors import LinkExtractor
from scrapy.spiders import Rule, CrawlSpider

class spiderPrendas(scrapy.Spider):
    name = 'scrapeo_ropa'
    allowed_domains = ['www.nike.com']
    start_urls = ['https://www.nike.com/es/launch?s=upcoming']
    productos = []
    links = []


    #funciones
    def parse(self, response):
        self.links = response.xpath("//figure/div/div[1]/a[@data-qa='product-card-link']/@href").getall()

        #recorremos todas las direcciones de los productos
        for link in self.links:
            url = "https://www.nike.com"+ link
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

        yield {
            'zapas' : producto,
            'total' : len(self.productos)
        }


    def depurar_datos(diccionario):
        diccionario
    

        