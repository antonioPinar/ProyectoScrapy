from requests import Response
import scrapy

class spiderPrendas(scrapy.Spider):
    name = 'scrapeo_ropa'
    allowed_domains = ['nude-project.com']
    start_urls = ['https://nude-project.com/collections/t-shirts-nude-project/products/pretty-tee-baby-blue']

    #funciones
    def parseoPrendas(self, response):
        nombre = response.xpath('//h1/text()').get()