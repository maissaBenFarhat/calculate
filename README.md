# calculate
Calculer le nombre de RTT(réduction du temps de travail) à donner à un salarié pour une année civile donnée.

******* Principe : *********
En France, selon la convention collective Syntec, un employé cadre doit travailler 218 jours par an.
D’autre part, ce même employé à 25 jours de congés payés.

******* Objectif : *********
Créer une calculette permettant de calculer le nombre de RTT à donner à un salarié pour une année
civile donnée.
La fonction qui va calculer ce nombre de jour doit prendre en paramètre les données suivantes :
année, nombre de jours travaillés, nombre de congés payés. Elle doit fonctionner pour n’importe
quelle année.

****** Données :  **********
Le nombre de RTT dans l’année varie selon la convention collective, l’accord de branche ou l’accord
d’entreprise. Toutefois, on peut déterminer le nombre de jours de RTT. Pour cela, il faut savoir que
la loi fixe à 218 jours le nombre de jours maximum travaillés dans l’année. Ensuite, il faut prendre
en compte le nombre de jours dans l’année (365 ou 366 en cas d’année bissextile), le nombre de
samedis et de dimanches, le nombre de jours fériés qui ne tombent pas le week-end et le nombre
de congés payés (CP) dans l’année. Au minimum, les salariés disposent de cinq semaines de CP, soit
25 jours de congés payés hors week-end.
Le nombre de jours de RTT correspond au nombre de jours de l’année auquel on retranche le
nombre de jours travaillés, le nombre de samedis et de dimanches, le nombre de jours fériés (hors
week-end) et le nombre de jours de CP.

****** Exemples :  **********
Pour 2020, cela donne à titre d’exemple :
   Nombre de jours : 366
   Nombre de samedis et de dimanches : 104
   Nombre de jours fériés ne tombant pas le week-end (*) : 9
    (en comptant le lundi de Pentecôte, lequel est normalement travaillé au titre de la journée de
    solidarité)
   Nombre de jours de congés payés : 25
   Nombre maximum de jours travaillés : 218
   Nombre de jours de RTT : 366 – 218 – 104 – 9 – 25 = 10 RTT en 2020.
Pour 2021 il sera de 11 jours.

****** Langage : *********
PHP : pour l'algorithme
HTML5 + CSS3 : pour interface web
