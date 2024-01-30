<?php

namespace model;

class MobDAO extends EntityDAO
{
    
    private string $movePatternMob;

    public function __construct()
    {
        parent::__construct();
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
