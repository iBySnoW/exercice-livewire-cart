## workshop-card-demo

Ce projet TALL contient une simple vue shop.

Cette vue est votre point de départ, vous devez :

- Créer un composant Livewire capable d'afficher la liste des produits
- Créer un composant capable de gérer un panier e-commerce

Le panier est stocké en session.

Le 1er composant (liste) affiche la liste de tous les produits. Si un produit est présent dans le panier, vous afficherez la quantité présente dans le panier, sinon vous afficherez une quantité à 0.

Le 2ème composant (panier) affiche seulement les produits présents dans le panier, la quantité pour chaque produit, le prix total et la quantité totale.

Les interactions sur les boutons -/+ d'un des composants doivent mettre à jour le panier en session, et informer l'autre composant qu'une mise à jour a été faite.
