<?php
interface Target
{
    /**
     * Applique des dégâts à la cible.
     *
     * @param int $damage La quantité de dégâts à infliger.
     */
    public function takeDamage(int $damage): void;

    // Exemples de méthodes supplémentaires :

    /**
     * Récupère l'état de santé actuel de la cible.
     *
     * @return int L'état de santé de la cible.
     */
    public function getHealth(): int;

    /**
     * Détermine si la cible est toujours en vie.
     *
     * @return bool Vrai si la cible est en vie, faux sinon.
     */
    public function isAlive(): bool;
}

?>