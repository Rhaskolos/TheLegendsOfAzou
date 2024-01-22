<?php

interface IPosition
{
    /**
     * Obtient la coordonnée X de la position.
     *
     * @return int La coordonnée X.
     */
    public function getX(): int;

    /**
     * Obtient la coordonnée Y de la position.
     *
     * @return int La coordonnée Y.
     */
    public function getY(): int;

    /**
     * Définit la coordonnée X de la position.
     *
     * @param int $x La nouvelle coordonnée X.
     */
    public function setX(int $x): void;

    /**
     * Définit la coordonnée Y de la position.
     *
     * @param int $y La nouvelle coordonnée Y.
     */
    public function setY(int $y): void;

}
