import scrapy

class spiderPrendas(scrapy.Spider):
    name = 'scrapeo_ropa'
    allowed_domains = ['www.nike.com/es']
    start_urls = ['https://www.nike.com/es/launch?s=upcoming']

    #funciones
    def parse(self, response):
        nombre = response.xpath('//figure//div/figcaption/div/div/div/h6/text()').get()

        yield{
            'Titulos' : nombre
        }