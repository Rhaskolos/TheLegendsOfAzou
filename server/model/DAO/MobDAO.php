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
            "id" => getId(),
            "type" => getType(),
            "x" => getX(),
            "y" => getY(),
            "health" => getHealth(),
            "moveSpeed" => getMoveSpeed(),
            "attackSpeed" => getAttackSpeed(),
            "attackRange" => getAttackRange(),
            "physicAttack" => getPhysicAttack(),
            "magicAttack" => getMagicAttack(),
            "physicDefense" => getPhysicDefense(),
            "magicDefense" => getMagicDefense(),
            "orientation" => getOrientation(),
            "map" => getMap(),
            "skill" => getSkill(),
            "movePatternMob" => getMovePatternMob()

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
