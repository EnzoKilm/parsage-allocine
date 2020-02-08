# coding: utf-8

from bs4 import BeautifulSoup
import requests
import webbrowser

recherche = input("Recherche : ")

url = "http://www.allocine.fr/recherche/1/?q=" + recherche.replace(" ", "+")

html = requests.get(url).text

soup = BeautifulSoup(html, 'lxml')
        
div_films = soup.find('div', {'class': 'colcontent'})
films = div_films.find_all('tr')

code = """<html>
<head><title>Résultat de la recherche</title></head>
<body><h1>Recherche : """

code += recherche + "</h1>"

for film in films:
    film.find_all('td')
    for td in film:
        try:
            classe = td.get('class')
        except:
            pass

        if classe == None:
            try:
                colspan = td.get('colspan')
            except:
                pass

            if colspan == None:
                code += str(td)
        else:
            code += str(td)

code += """</body>
</html>"""

resultat = open('resultat.html','w', encoding='utf-8')
resultat.write(code)
resultat.close()

webbrowser.open('resultat.html')
