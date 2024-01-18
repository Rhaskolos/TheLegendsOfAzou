<?php

abstract class Character
{
    protected const DEFAULT_LEVEL = 1;
    protected const MIN_VITALITY = 0;
    protected const MAX_VITALITY = 999;
    protected const MIN_DAMAGE = 0;
    protected const MAX_DAMAGE = 999;
    protected const ZONE_SIZE = 10;

    protected string $name;
    protected int $level;
    protected int $vitality;
    protected int $physicalDamage;
    protected int $magicalDamage;
    protected int $physicalResistance;
    protected int $magicalResistance;
    protected array $abilities = [];
    protected array $zoneMap = [];
    protected int $coordinateX;
    protected int $coordinateY;

    public function __construct(
        string $name,
        int $level = self::DEFAULT_LEVEL,
        int $vitality = null,
        int $physicalDamage = null,
        int $magicalDamage = null,
        int $physicalResistance = null,
        int $magicalResistance = null
    ) {
        $this->name = trim($name);
        $this->level = max(1, (int)$level);

        if (!isset($vitality)) {
            $this->vitality = rand(self::MIN_VITALITY, self::MAX_VITALITY);
        } else {
            $this->vitality = max(self::MIN_VITALITY, min(self::MAX_VITALITY, (int)$vitality));
        }

        if (!isset($physicalDamage)) {
            $this->physicalDamage = rand(self::MIN_DAMAGE, self::MAX_DAMAGE);
        } else {
            $this->physicalDamage = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$physicalDamage));
        }

        if (!isset($magicalDamage)) {
            $this->magicalDamage = rand(self::MIN_DAMAGE, self::MAX_DAMAGE);
        } else {
            $this->magicalDamage = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$magicalDamage));
        }

        if (!isset($physicalResistance)) {
            $this->physicalResistance = rand(self::MIN_DAMAGE, self::MAX_DAMAGE);
        } else {
            $this->physicalResistance = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$physicalResistance));
        }

        if (!isset($magicalResistance)) {
            $this->magicalResistance = rand(self::MIN_DAMAGE, self::MAX_DAMAGE);
        } else {
            $this->magicalResistance = max(self::MIN_DAMAGE, min(self::MAX_DAMAGE, (int)$magicalResistance));
        }

        // Init map
        for ($rowIndex = 0; $rowIndex < self::ZONE_SIZE; ++$rowIndex) {
            for ($columnIndex = 0; $columnIndex < self::ZONE_SIZE; ++$columnIndex) {
                $this->zoneMap[$rowIndex][$columnIndex] = '.';
            }
        }

        // Person position
        $this->coordinateX = floor(self::ZONE_SIZE / 2);
        $this->coordinateY = floor(self::ZONE_SIZE / 2);
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

    public function move(string $direction)
    {
        if (!in_array($direction, ['up', 'down', 'left', 'right'])) {
            throw new InvalidArgumentException('Invalid direction');
        }
        echo ($this->name . " moves\n");

        $this->zoneMap[$this->coordinateX][$this->coordinateY] = '.';

        switch ($direction) {
            case 'up': --$this->coordinateX; break;
            case 'down': ++$this->coordinateX; break;
            case 'left': --$this->coordinateY; break;
            case 'right': ++$this->coordinateY; break;
        }

        $this->zoneMap[$this->coordinateX][$this->coordinateY] = $this->name[0];
    }

    public function attack(Character $target)
    {
        echo ($this->name . " attacks " . $target->getName() . "\n");

        $totalDamage = $this->physicalDamage + $this->magicalDamage;

        $target->takeDamage($totalDamage);
    }

    public function takeDamage(int $damage): void
    {
        $damage = max((int)$damage, 0);
        $this->setVitality($this->getVitality() - $damage);

        echo ($this->name . " takes " . $damage . " damages.\nCurrent life: " . $this->getVitality());
    }

    public function displayStatus(): void
    {
        printf(
            "%s : Level-%d Life: %d/%d Physical Damage: %d Magical Damage: %d Physical Resistance: %d Magical Resistance: %d\n",
            $this->name,
            $this->getLevel(),
            $this->getVitality(),
            100,
            $this->getPhysicalDamage(),
            $this->getMagicalDamage(),
            $this->getPhysicalResistance(),
            $this->getMagicalResistance()
        );
    }

    public function displayZoneMap()
    {
        foreach ($this->zoneMap as $row) {
            foreach ($row as $cell) {
                echo $cell;
            }
            echo "\n";
        }
    }
}

interface Ability
{
    public function cast(Character $target);

    public function setOwner(Character $owner);
}

final class LightningBolt implements Ability
{
    private Character $owner;

    public function setOwner(Character $owner): void
    {
        $this->owner = $owner;
    }

    public function cast(Character $target): void
    {
        echo ($this->owner->getName() . " throws lightning bolts at " . $target->getName() . "\n");

        $damage = rand(1, 100);

        $target->takeDamage($damage);
    }
}

final class Healing implements Ability
{
    private Character $owner;

    public function setOwner(Character $owner): void
    {
        $this->owner = $owner;
    }

    public function cast(Character $target): void
    {
        echo ($this->owner->getName() . " tries to cure " . $target->getName() . "\n");

        $heal = rand(1, 100);

        $currentLife = $target->getVitality();

        $target->setVitality(min($currentLife + $heal, 100));
    }
}

$warrior = new class ('Warrior') extends Character {};

$wizard = new class ('Wizard') extends Character {
    public function __construct()
    {
        call_user_func_array([parent::class, '__construct'], func_get_args());
        $this->setPhysicalDamage(0);
    }
};

$warrior->displayStatus();
$wizard->displayStatus();

$spells = [new LightningBolt(), new Healing()];

$wizard->addAbilities($spells);

// Before fight events
echo "Warrior charges his sword.\n";
$warrior->setPhysicalDamage(100);

echo "Wizard starts casting a protection shield.\n";
$wizard->addAbility(new ProtectionShield());

// Fight start
$wizard->attack($warrior);

$warrior->move();

$wizard->displayStatus();
$warrior->displayStatus();