<?php
interface IMoove
{
    /**
     * Déplace l'objet vers le haut.
     */
    public function moveUp(): void;

    /**
     * Déplace l'objet vers le bas.
     */
    public function moveDown(): void;

    /**
     * Déplace l'objet vers la gauche.
     */
    public function moveLeft(): void;

    /**
     * Déplace l'objet vers la droite.
     */

    public function moveRight(): void;

    /**
     * Obtient la position actuelle de l'objet.
     *
     * @return IPosition L'interface de position de l'objet.
     */
    public function getPosition(): IPosition;

}