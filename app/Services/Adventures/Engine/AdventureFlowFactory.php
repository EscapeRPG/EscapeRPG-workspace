<?php

namespace App\Services\Adventures\Engine;

use App\Services\Adventures\Base\GenericAdventureFlow;
use InvalidArgumentException;

/**
 * Instancie le flow adapté à une aventure.
 */
class AdventureFlowFactory
{
    /**
     * Retourne le flow déclaré dans la configuration du scénario.
     */
    public function make(array $config): AdventureFlow
    {
        $flowClass = $config['flow'] ?? GenericAdventureFlow::class;

        if (!is_string($flowClass) || !class_exists($flowClass)) {
            throw new InvalidArgumentException('Adventure flow is not configured correctly.');
        }

        $flow = new $flowClass();

        if (!$flow instanceof AdventureFlow) {
            throw new InvalidArgumentException('Adventure flow must implement ' . AdventureFlow::class . '.');
        }

        return $flow;
    }
}
