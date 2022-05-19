import scrapy
from scrapy.linkextractors import LinkExtractor
from scrapy.spiders import Rule, CrawlSpider
from zapatillas.items import ZapatillasItem

class crawleoZapas(scrapy.Spider):
    name = "zapatillas"
    allowed_domains = ['nude-project.com']
    start_urls = ['https://nude-project.com/collections/t-shirts-nude-project/products/pretty-tee-baby-blue']
    zapas = []
    

    #funciones
    def parse_item(self, response):
        
        linea = response.xpath("//section//aside/div/div/h1/text()").get()
        yield {'dato': linea}

        