<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventaireController extends Controller
{
    /**
     * Page pour realiser l'inventaire
     */
    public function index()
    {
        dump('hello world');
    }

    /**
     * stock une nouvelle entrée dans l'inventaire
     */
    public function store()
    {
    }

    /**
     * Choisit le mode pour faire inventaire
     * mode auto - pas de choix qte
     * mode normal - avec choix qte
     * mode avec DLC / sans DLC
     */
    public function mode()
    {

    }

    /**
     * Gestion de l'etat du terminal pause de l'inventaire - visu des different articles scanner etc..
     * Pause
     * Reprise
     */
    public function etat()
    {
    }

    /**
     * Annule la derniere ligne en ajoutant la meme valeur en negatif ( pour equilibrer a 0 )
     * Si re annulation sa annule , l'avant derniere , et ainsi de suite....
     * tant qu'il y a pas de nouvelle saisi valide.
     */
    public function annulation()
    {
    }
}
