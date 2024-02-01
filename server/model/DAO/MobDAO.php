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
            "type" => $this->getType(),
            "x" => $this->getX(),
            "y" => $this->getY(),
            "orientation" => $this->getOrientation(),
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
