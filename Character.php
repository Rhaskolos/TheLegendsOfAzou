<?php
abstract class Character {

    protected string $name;
    protected int $level;
    protected int $maxHealth;
    protected int $currentHealth;
    protected int $physicalDamage;
    protected int $magicalDamage;
    protected int $physicalResistance;
    protected int $magicalResistance;

    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setLevel(1);
        $this->setMaxHealth(10);
        $this->setCurrentHealth($this->getMaxHealth());
        $this->setPhysicalResistance(0);
        $this->setMagicalResistance(0);
    }

    public function move()
    {
        $name = $this->getName();
        echo "$name is moving\n";
    }

    public function attack()
    {
        $name = $this->getName();
        echo "$name attacks the target\n";
    }

    public function attacked()
    {
        $name = $this->getName();
        echo "$name takes damage\n";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }

    public function setMaxHealth(int $health): void
    {
        $this->maxHealth = $health;
        $this->setCurrentHealth($health);
    }

    public function getCurrentHealth(): int
    {
        return $this->currentHealth;
    }

    public function setCurrentHealth(int $health): void
    {
        $this->currentHealth = min($health, $this->getMaxHealth());
    }

    public function dealPhysicalDamage(Character $target): void
    {
        $damage = $this->getPhysicalDamage() - $target->getPhysicalResistance();
        $damage = max(0, $damage);
        $target->setCurrentHealth($target->getCurrentHealth() - $damage);
    }

    public function dealMagicalDamage(Character $target): void
    {
        $damage = $this->getMagicalDamage() - $target->getMagicalResistance();
        $damage = max(0, $damage);
        $target->setCurrentHealth($target->getCurrentHealth() - $damage);
    }

    public function getPhysicalDamage(): int
    {
        return $this->physicalDamage;
    }

    public function setPhysicalDamage(int $physicalDamage): void
    {
        $this->physicalDamage = $physicalDamage;
    }

    public function getMagicalDamage(): int
    {
        return $this->magicalDamage;
    }

    public function setMagicalDamage(int $magicalDamage): void
    {
        $this->magicalDamage = $magicalDamage;
    }

    public function getPhysicalResistance(): int
    {
        return $this->physicalResistance;
    }

    public function setPhysicalResistance(int $physicalResistance): void
    {
        $this->physicalResistance = $physicalResistance;
    }

    public function getMagicalResistance(): int
    {
        return $this->magicalResistance;
    }

    public function setMagicalResistance(int $magicalResistance): void
    {
        $this->magicalResistance = $magicalResistance;
    }
}

