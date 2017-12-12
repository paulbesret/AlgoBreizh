<?php
require 'Model/Cart.php';
require_once 'View/View.php';
require_once 'Tools/CredentialManager.php';

class CartControler{
	private $cart;
	private $welcomeCtrl;
    public function __construct() {
		$this->cart = new Cart();
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("cart",UserIsLogged());
        $view->generate(array('products' => $this->cart->getCart()));
    }
	
	public function addToCart($producId,$quantity) {
		$this->cart->addToCart($producId,$quantity);
    }
	
	public function removeFromCart($producId) {
		$this->cart->removeFromCart($producId);
		header('Location: index.php?action=cart');
    }
}