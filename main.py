# coding: utf-8

from bs4 import BeautifulSoup
import requests

#recherche = input("Recherche : ")

#url = "http://www.allocine.fr/recherche/1/?q="
url = 'http://www.allocine.fr/recherche/1/?q=star+wars'

html = requests.get(url).text

soup = BeautifulSoup(html, 'lxml')
        
div_films = soup.find('div', {'class': 'colcontent'})
films = div_films.find_all('tr')

for film in films:
    film.find_all('td')
    for td in film:
        try:
            classe = td.get('class')
            #if(tg.get('class')) == ['totalWidth']:
                #print(td)
        except:
            pass

        if classe == None:
            try:
                colspan = td.get('colspan')
            except:
                pass

            if colspan == None:
                print(td)
                print("--------------------------------------------------")
        else:
            print(td)
            print("--------------------------------------------------")
            

