<?php
interface IAttack extends ITarget
{
    /**
     * Exécute une attaque sur une cible donnée.
     *
     * @param Target $target La cible à attaquer.
     */
    public function attack(Target $target): void;

    /**
     * Détermine si une attaque est possible contre la cible spécifiée.
     *
     * @param Target $target La cible envisagée pour l'attaque.
     * @return bool Vrai si l'attaque est possible, faux sinon.
     */
    public function canAttack(Target $target): bool;
}