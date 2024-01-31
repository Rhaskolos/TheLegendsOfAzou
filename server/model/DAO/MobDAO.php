<?php

namespace server\model\DAO;

class MobDAO extends EntityDAO
{
    
    private string $movePatternMob;

    public function __construct()
    {
        parent::__construct();
    }

    public function toArray() 
    {
       return [
            "id" => $this->getId(),
            "type" => $this->getType(),
            "x" => $this->getX(),
            "y" => $this->getY(),
            "health" => $this->getHealth(),
            "moveSpeed" => $this->getMoveSpeed(),
            "attackSpeed" => $this->getAttackSpeed(),
            "attackRange" => $this->getAttackRange(),
            "physicAttack" => $this->getPhysicAttack(),
            "magicAttack" => $this->getMagicAttack(),
            "physicDefense" => $this->getPhysicDefense(),
            "magicDefense" => $this->getMagicDefense(),
            "orientation" => $this->getOrientation(),
            "map" => $this->getMap(),
            "skill" => $this->getSkill(),
            "movePatternMob" => $this->getMovePatternMob()

        ];
    }

    /**
     * Get the value of movePatternMob
     */
    public function getMovePatternMob()
    {
        return $this->movePatternMob;
    }

    /**
     * Set the value of movePatternMob
     *
     * @return  self
     */
    public function setMovePatternMob($movePatternMob)
    {
        $this->movePatternMob = $movePatternMob;
        return $this;
    }
}
