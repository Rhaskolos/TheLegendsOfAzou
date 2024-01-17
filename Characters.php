<?php

abstract class Characters
{
    protected const DEFAULT_LEVEL = 1;
    protected const MIN_VITALITY = 0;
    protected const MAX_VITALITY = 999;
    protected const MIN_DAMAGE = 0;
    protected const MAX_DAMAGE = 999;

    protected string $name;
    protected int $level;
    protected int $vitality;
    protected int $physicalDamage;
    protected int $magicalDamage;
    protected int $physicalResistance;
    protected int $magicalResistance;
    protected array $abilities = [];

    public function __construct(
        string $name,
        int    $level = self::DEFAULT_LEVEL,
        int    $vitality = null,
        int    $physicalDamage = null,
        int    $magicalDamage = null,
        int    $physicalResistance = null,
        int    $magicalResistance = null
    )
    {
        $this->name = trim($name);
        $this->level = max(1, (int)$level);

        if (!isset($vitality)) {
            $this->vitality = random_int(self::MIN_VITALITY, self::MAX_VITALITY);
        } else {
            $this->vitality = max(self::MIN_VITALITY, min(self::MAX_VITALITY, (int)$vitality));
        }

        if (!isset($physicalDamage)) {
            $this->physicalDamage = random_int(self::MIN_DAMAGE, self::MAX_DAMAGE);
        } else {
            $this->physicalDamage = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$physicalDamage));
        }

        if (!isset($magicalDamage)) {
            $this->magicalDamage = random_int(self::MIN_DAMAGE, self::MAX_DAMAGE);
        } else {
            $this->magicalDamage = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$magicalDamage));
        }

        if (!isset($physicalResistance)) {
            $this->physicalResistance = random_int(self::MIN_DAMAGE, self::MAX_DAMAGE);
        } else {
            $this->physicalResistance = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$physicalResistance));
        }

        if (!isset($magicalResistance)) {
            $this->magicalResistance = random_int(self::MIN_DAMAGE, self::MAX_DAMAGE);
        } else {
            $this->magicalResistance = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$magicalResistance));
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = trim($name);
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level): void
    {
        $this->level = max(1, (int)$level);
    }

    public function getVitality(): int
    {
        return $this->vitality;
    }

    public function setVitality(int $vitality): void
    {
        $this->vitality = max(self::MIN_VITALITY, min(self::MAX_VITALITY, (int)$vitality));
    }

    public function getPhysicalDamage(): int
    {
        return $this->physicalDamage;
    }

    public function setPhysicalDamage(int $physicalDamage): void
    {
        $this->physicalDamage = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$physicalDamage));
    }

    public function getMagicalDamage(): int
    {
        return $this->magicalDamage;
    }

    public function setMagicalDamage(int $magicalDamage): void
    {
        $this->magicalDamage = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$magicalDamage));
    }

    public function getPhysicalResistance(): int
    {
        return $this->physicalResistance;
    }

    public function setPhysicalResistance(int $physicalResistance): void
    {
        $this->physicalResistance = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$physicalResistance));
    }

    public function getMagicalResistance(): int
    {
        return $this->magicalResistance;
    }

    public function setMagicalResistance(int $magicalResistance): void
    {
        $this->magicalResistance = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$magicalResistance));
    }

    public function addAbilities(array $abilities): void
    {
        foreach ($abilities as $ability) {
            $this->addAbility($ability);
        }
    }

    public function addAbility(Ability $ability): void
    {
        $ability->setOwner($this);
        $this->abilities[] = $ability;
    }

    public function move()
    {
        // Add movement logic if applicable
        echo($this->name . " moves\n");
    }

    public function attack(Character $target)
    {
        // Add attack logic
        foreach ($this->abilities as $ability) {
            $ability->castSpell($target);
        }
        echo($this->name . " attacks " . $target->getName() . "\n");
        $target->takeDamage($this->physicalDamage);
    }

    public function takeDamage(int $damage): void
    {
        $damage = max((int)$damage, 0);
        $this->setVitality($this->getVitality() - $damage);

        echo($this->name . " loses " . $damage . " HP. Current HP: " . $this->getVitality() . "\n");
    }

    public function heal(int $healAmount): void
    {
        $newHealAmount = max((int)$healAmount, 0);
        $newHp = $this->getVitality() + $newHealAmount;

        if ($newHp > self::MAX_VITALITY) {
            $newHp = self::MAX_VITALITY;
        }

        $this->setVitality($newHp);

        echo($this->name . "'s HP increased by " . $newHealAmount . ". New HP: " . $this->getVitality() . "\n");
    }

    public function displayStatus(): void
    {
        printf(
            "%s:%d\nVitality: %d/%d\nPhysical Damage: %d\nMagical Damage: %d\nPhysical Resistance: %d\nMagical Resistance: %d\n",
            $this->name,
            $this->level,
            $this->getVitality(),
            self::MAX_VITALITY,
            $this->getPhysicalDamage(),
            $this->getMagicalDamage(),
            $this->getPhysicalResistance(),
            $this->getMagicalResistance()
        );
    }

    public function isAlive(): bool
    {
        return $this->getVitality() > self::MIN_VITALITY;
    }
}

interface Ability
{
    public function castSpell(Character $target);

    public function setOwner(Character $owner);
}

final class LightningBolt implements Ability
{
    private Character $owner;

    public function castSpell(Character $target): void
    {
        $damage = mt_rand(1, 100);

        echo("Lightning bolt hits " . $target->getName() . " causing " . $damage . " damage!\n");

        $target->takeDamage($damage);
    }

    public function setOwner(Character $owner): void
    {
        $this->owner = $owner;
    }
}

final class GreaterHealing implements Ability
{
    private Character $owner;

    public function castSpell(Character $target): void
    {
        $healAmount = mt_rand(1, 100);

        echo($this->owner->getName() . " heals " . $target->getName() . " with greater healing spell restoring " . $healAmount . " HP!\n");

        $target->heal($healAmount);
    }

    public function setOwner(Character $owner): void
    {
        $this->owner = $owner;
    }
}

$warrior = new class ('Warrior') extends Character {
};

$wizard = new class ('Wizard') extends Character {
    public function __construct()
    {
        parent::__construct(...func_get_args(), ['physicalDamage' => 0]);
    }
};

$warrior->displayStatus();
$wizard->displayStatus();

$spells = [new LightningBolt(), new GreaterHealing()];

$wizard->addAbilities($spells);
$wizard->attack($warrior);
$warrior->displayStatus();
}