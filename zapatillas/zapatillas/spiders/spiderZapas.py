import scrapy

class crawleoZapas(scrapy.Spider):
    name = "zapatillas"
    allowed_domains = ["www.nike.com/es"]
    start_urls = ["https://www.nike.com/es/launch?s=upcoming"]
    