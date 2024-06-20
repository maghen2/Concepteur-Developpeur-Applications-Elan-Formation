/*SQL Gaulois
Page 1 sur 1 ELAN / SQL Gaulois / 07_2021 / Version 2.0
ELAN
14 rue du Rhône
67100 STRASBOURG
TEL : 03.88.30.78.30
www.elan-formation.fr
A partir du script SQL Gaulois fourni par votre formateur, écrivez et exécutez les requêtes SQL suivantes :
*/

-- 1. Nom des lieux qui finissent par 'um'.
SELECT * 
FROM lieu
WHERE nom_lieu LIKE '%um'

-- 2. Nombre de personnages par lieu (trié par nombre de personnages décroissant).
SELECT lieu.nom_lieu AS Lieu, 
COUNT(*) AS `Nbr de personnages`
FROM personnage
JOIN lieu ON lieu.id_lieu = personnage.id_lieu
GROUP BY personnage.id_lieu
ORDER BY COUNT(*) DESC

-- 3. Nom des personnages + spécialité + adresse et lieu d'habitation, triés par lieu puis par nom de personnage.
SELECT                                            
personnage.nom_personnage AS `Personnage`,        
specialite.nom_specialite AS `Spécialité`,        
personnage.adresse_personnage AS `Adresse`,       
lieu.nom_lieu AS `Lieu`                           
FROM personnage                                   
JOIN specialite ON specialite.id_specialite = pers
JOIN lieu ON lieu.id_lieu = personnage.id_lieu    
ORDER BY lieu.nom_lieu , personnage.nom_personnage

-- 4. Nom des spécialités avec nombre de personnages par spécialité (trié par nombre de personnages décroissant).
SELECT
    specialite.nom_specialite AS `Spécialité`,
    COUNT(personnage.id_personnage) AS `Nbr de personnages`
FROM
    personnage
JOIN specialite ON specialite.id_specialite = personnage.id_specialite
GROUP BY
    specialite.id_specialite;

-- 5. Nom, date et lieu des batailles, classées de la plus récente à la plus ancienne (dates affichées au format jj/mm/aaaa).
SELECT
    bataille.nom_bataille,
    bataille.date_bataille,
    lieu.nom_lieu
FROM
    bataille
JOIN lieu ON lieu.id_lieu = bataille.id_lieu
ORDER BY
    bataille.date_bataille
DESC
    
-- 6. Nom des potions + coût de réalisation de la potion (trié par coût décroissant).
SELECT
    potion.nom_potion AS `Nom des potions`,
    SUM(
        composer.qte * ingredient.cout_ingredient
    ) AS `coût de réalisation`
FROM
    potion
JOIN composer ON composer.id_potion = potion.id_potion
JOIN ingredient ON ingredient.id_ingredient = composer.id_ingredient
GROUP BY
    potion.id_potion
ORDER BY
    SUM(
        composer.qte * ingredient.cout_ingredient
    )
DESC
    
-- 7. Nom des ingrédients + coût + quantité de chaque ingrédient qui composent la potion 'Santé'.
SELECT
    ingredient.nom_ingredient,
    ingredient.cout_ingredient,
    composer.qte,
    SUM(
        composer.qte * ingredient.cout_ingredient
    ) AS `Prix Total`
FROM
    ingredient
JOIN composer ON composer.id_ingredient = ingredient.id_ingredient
JOIN potion ON potion.id_potion = composer.id_potion
WHERE
    potion.nom_potion = 'Santé'
GROUP BY
    composer.id_ingredient,
    composer.id_potion

-- 8. Nom du ou des personnages qui ont pris le plus de casques dans la bataille 'Bataille du village gaulois'.
SELECT
    personnage.nom_personnage,
    SUM(prendre_casque.qte)
FROM
    personnage
JOIN prendre_casque ON prendre_casque.id_personnage = personnage.id_personnage
JOIN lieu ON lieu.id_lieu = personnage.id_lieu
JOIN bataille ON bataille.id_lieu = lieu.id_lieu
WHERE
    bataille.nom_bataille = 'Bataille du village gaulois'
GROUP BY
    prendre_casque.id_personnage
HAVING
    SUM(prendre_casque.qte) >= ALL(
    SELECT
        SUM(prendre_casque.qte)
    FROM
        personnage
    JOIN prendre_casque ON prendre_casque.id_personnage = personnage.id_personnage
    JOIN lieu ON lieu.id_lieu = personnage.id_lieu
    JOIN bataille ON bataille.id_lieu = lieu.id_lieu
    WHERE
        bataille.nom_bataille = 'Bataille du village gaulois'
    GROUP BY
        prendre_casque.id_personnage
)

-- 9. Nom des personnages et leur quantité de potion bue (en les classant du plus grand buveur au plus petit).
SELECT
    personnage.nom_personnage,
    SUM(boire.dose_boire) AS `quantité de potion bue`
FROM
    personnage
JOIN boire ON boire.id_personnage = personnage.id_personnage
JOIN potion ON potion.id_potion = boire.id_potion
    -- WHERE potion.nom_potion = 'blue'
GROUP BY
    boire.id_personnage
ORDER BY
    SUM(boire.dose_boire)
DESC
    
-- 10. Nom de la bataille où le nombre de casques pris a été le plus important.
SELECT
    bataille.nom_bataille,
    COUNT(*) AS `nombre de casques pris`
FROM
    bataille
JOIN prendre_casque ON prendre_casque.id_bataille = bataille.id_bataille
GROUP BY
    prendre_casque.id_bataille
HAVING
    COUNT(*) >= ALL(
    SELECT
        COUNT(*)
    FROM
        bataille
    JOIN prendre_casque ON prendre_casque.id_bataille = bataille.id_bataille
    GROUP BY
        prendre_casque.id_bataille
)

-- 11. Combien existe-t-il de casques de chaque type et quel est leur coût total ? (classés par nombre décroissant)
SELECT
    type_casque.nom_type_casque,
    COUNT(*) AS `Quantité`,
    AVG(casque.cout_casque) AS `coût moyen`,
    COUNT(*) * AVG(casque.cout_casque) AS `coût total`
FROM
    type_casque
JOIN casque ON casque.id_type_casque = type_casque.id_type_casque
GROUP BY
    type_casque.id_type_casque

-- 12. Nom des potions dont un des ingrédients est le poisson frais.
SELECT
    potion.nom_potion
FROM
    potion
JOIN composer ON composer.id_potion = potion.id_potion
JOIN ingredient ON ingredient.id_ingredient = composer.id_ingredient
WHERE
    ingredient.nom_ingredient = 'Poisson frais'

-- 13. Nom du / des lieu(x) possédant le plus d'habitants, en dehors du village gaulois.
SELECT
    lieu.nom_lieu,
    COUNT(personnage.id_lieu) AS nbrHabitant
FROM
    lieu
JOIN personnage ON personnage.id_lieu = lieu.id_lieu
WHERE
    lieu.nom_lieu != "Village gaulois"
GROUP BY
    personnage.id_lieu
HAVING nbrHabitant = (
    SELECT
        COUNT(personnage.id_lieu) as  nbrHabitant
    FROM
        lieu
    JOIN personnage ON personnage.id_lieu = lieu.id_lieu
    WHERE
        lieu.nom_lieu != "Village gaulois"
    GROUP BY
        personnage.id_lieu
    ORDER BY
        nbrHabitant
    DESC
LIMIT 1
)

-- 14. Nom des personnages qui n'ont jamais bu aucune potion.
SELECT
    personnage.nom_personnage,
    SUM(boire.dose_boire) AS quantitePotionBue
FROM
    personnage
JOIN boire ON boire.id_personnage = personnage.id_personnage
JOIN potion ON potion.id_potion = boire.id_potion
WHERE personnage.id_personnage NOT IN (
SELECT DISTINCT boire.id_personnage
    from boire
)  
GROUP BY
    boire.id_personnage

 -- 14. Nom des personnages qui n'ont jamais bu aucune potion.
SELECT
    personnage.nom_personnage,
    SUM(boire.dose_boire) AS quantitePotionBue
FROM
    personnage
JOIN boire ON boire.id_personnage = personnage.id_personnage
JOIN potion ON potion.id_potion = boire.id_potion
GROUP BY
    boire.id_personnage
HAVING quantitePotionBue = 0    
   
-- 15. Nom du / des personnages qui n'ont pas le droit de boire de la potion 'Magique'.
SELECT
    *
FROM
    personnage
WHERE
    personnage.id_personnage NOT IN(
    SELECT
        personnage.id_personnage
    FROM
        personnage
    JOIN autoriser_boire ON autoriser_boire.id_personnage = personnage.id_personnage
    JOIN potion ON potion.id_potion = autoriser_boire.id_potion
    WHERE
        potion.nom_potion = 'Magique'
)

/*_______________________________________________________________________________
En écrivant toujours des requêtes SQL, modifiez la base de données comme suit :
*/
-- A. Ajoutez le personnage suivant : Champdeblix, agriculteur résidant à la ferme Hantassion de Rotomagus.
INSERT IGNORE
INTO personnage(`nom_personnage`, `adresse_personnage`, `id_lieu`,`id_specialite`)
VALUES('Champdeblix', 'Ferme Hantassion', 6, 12)

-- B. Autorisez Bonemine à boire de la potion magique, elle est jalouse d'Iélosubmarine...
INSERT IGNORE
INTO autoriser_boire(id_potion, id_personnage)
VALUES(1, 12)

-- C. Supprimez les casques grecs qui n'ont jamais été pris lors d'une bataille.
DELETE
FROM
    casque
WHERE
    casque.id_type_casque = 2 AND casque.id_casque NOT IN(
    SELECT DISTINCT
        prendre_casque.id_casque
    FROM
        prendre_casque
)

-- D. Modifiez l'adresse de Zérozérosix : il a été mis en prison à Condate.
UPDATE
    personnage
SET
    `adresse_personnage` = 'prison', `id_lieu` = 9
WHERE
    personnage.id_personnage = 23
LIMIT 1

-- E. La potion 'Soupe' ne doit plus contenir de persil.

-- F. Obélix s'est trompé : ce sont 42 casques Weisenau, et non Ostrogoths, qu'il a pris lors de la bataille 'Attaque de la banque postale'. Corrigez son erreur !
