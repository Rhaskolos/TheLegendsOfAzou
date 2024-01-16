 <?php

abstract class Monster {

    private string $name;
    private int $level;
    private int $vitality;
    private int $physicalDamage;
    private int $magicDamage;
    private int $physicalResistance;
    private int $magicResistance;
    

    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setLevel(3);
        $this->setVitality(5); 
        $this->setPhysicalDamage(1);
        $this->setMagicDamage(2);  
        $this->setPhysicalResistance(4);
        $this->setMagicResistance(5);   
    }
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of level
     */ 
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the value of level
     *
     * @return  self
     */ 
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }


    /**
     * Get the value of vitality
     */ 
    public function getVitality()
    {
        return $this->vitality;
    }

    /**
     * Set the value of vitality
     *
     * @return  self
     */ 
    public function setVitality($vitality)
    {
        $this->vitality = $vitality;

        return $this;
    }

    /**
     * Get the value of physicalDamage
     */ 
    public function getPhysicalDamage()
    {
        return $this->physicalDamage;
    }

    /**
     * Set the value of physicalDamage
     *
     * @return  self
     */ 
    public function setPhysicalDamage($physicalDamage)
    {
        $this->physicalDamage = $physicalDamage;

        return $this;
    }

    /**
     * Get the value of magicDamage
     */ 
    public function getMagicDamage()
    {
        return $this->magicDamage;
    }

    /**
     * Set the value of magicDamage
     *
     * @return  self
     */ 
    public function setMagicDamage($magicDamage)
    {
        $this->magicDamage = $magicDamage;

        return $this;
    }

    /**
     * Get the value of physicalResistance
     */ 
    public function getPhysicalResistance()
    {
        return $this->physicalResistance;
    }

    /**
     * Set the value of physicalResistance
     *
     * @return  self
     */ 
    public function setPhysicalResistance($physicalResistance)
    {
        $this->physicalResistance = $physicalResistance;

        return $this;
    }

    /**
     * Get the value of magicResistance
     */ 
    public function getMagicResistance()
    {
        return $this->magicResistance;
    }

    /**
     * Set the value of magicResistance
     *
     * @return  self
     */ 
    public function setMagicResistance($magicResistance)
    {
        $this->magicResistance = $magicResistance;

        return $this;
    }
}

?>