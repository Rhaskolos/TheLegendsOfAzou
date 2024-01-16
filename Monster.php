<?php

abstract class Monster {

    private string $nameMonster;
    private int $levelMonster;
    private int $vitalityMonster;
    private int $physicalDamageMonster;  
    private int $physicalResistanceMonster;
  
public function __construct()
{
    $this->setNameMonster('Orque');
    $this->setLevelMonster(5);
    $this->setVitalityMonster(5);
    $this->setPhysicalDamageMonster(4);
    $this->setPhysicalResistanceMonster(2);
}

    /**
     * Get the value of nameMonster
     */ 
    public function getNameMonster()
    {
        return $this->nameMonster;
    }

    /**
     * Set the value of nameMonster
     *
     * @return  self
     */ 
    public function setNameMonster($nameMonster)
    {
        $this->nameMonster = $nameMonster;

        return $this;
    }  

    /**
     * Get the value of levelMonster
     */ 
    public function getLevelMonster()
    {
        return $this->levelMonster;
    }

    /**
     * Set the value of levelMonster
     *
     * @return  self
     */ 
    public function setLevelMonster($levelMonster)
    {
        $this->levelMonster = $levelMonster;

        return $this;
    }

    /**
     * Get the value of vitalityMonster
     */ 
    public function getVitalityMonster()
    {
        return $this->vitalityMonster;
    }

    /**
     * Set the value of vitalityMonster
     *
     * @return  self
     */ 
    public function setVitalityMonster($vitalityMonster)
    {
        $this->vitalityMonster = $vitalityMonster;

        return $this;
    }

    /**
     * Get the value of physicalDamageMonster
     */ 
    public function getPhysicalDamageMonster()
    {
        return $this->physicalDamageMonster;
    }

    /**
     * Set the value of physicalDamageMonster
     *
     * @return  self
     */ 
    public function setPhysicalDamageMonster($physicalDamageMonster)
    {
        $this->physicalDamageMonster = $physicalDamageMonster;

        return $this;
    }

    /**
     * Get the value of physicalResistanceMonster
     */ 
    public function getPhysicalResistanceMonster()
    {
        return $this->physicalResistanceMonster;
    }

    /**
     * Set the value of physicalResistanceMonster
     *
     * @return  self
     */ 
    public function setPhysicalResistanceMonster($physicalResistanceMonster)
    {
        $this->physicalResistanceMonster = $physicalResistanceMonster;

        return $this;
    }
}

?>