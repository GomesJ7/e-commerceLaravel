<?php

namespace App\Repositories;

use App\Product;

class BasketSessionRepository implements BasketInterfaceRepository  {

	# Afficher le panier
	public function show () {
		return view("panier.show"); // resources\views\panier.blade.php
	}

	# Ajouter/Mettre à jour un produit du panier
	public function add (Product $product, $quantity) {		
		$panier = session()->get("panier"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$product_details = [
			'name' => $product->name,
			'price' => $product->price,
			'quantity' => $quantity
		];
		
		$panier[$product->id] = $product_details; // On ajoute ou on met à jour le produit au panier
		session()->put("panier", $panier); // On enregistre le panier
	}

	# Retirer un produit du panier
	public function remove (Product $product) {
		$panier = session()->get("panier"); // On récupère le panier en session
		unset($panier[$product->id]); // On supprime le produit du tableau $panier
		session()->put("panier", $panier); // On enregistre le panier
	}

	# Vider le panier
	public function empty () {
		session()->forget("panier"); // On supprime le panier en session
	}

}

?>