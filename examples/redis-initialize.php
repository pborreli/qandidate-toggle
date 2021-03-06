<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Qandidate\Toggle\Context;
use Qandidate\Toggle\Operator\LessThan;
use Qandidate\Toggle\OperatorCondition;
use Qandidate\Toggle\Toggle;
use Qandidate\Toggle\ToggleCollection\PredisCollection;
use Qandidate\Toggle\ToggleManager;

// Create the ToggleManager
$predis     = new Predis\Client();
$collection = new PredisCollection('toggle_namespace', $predis);
$manager    = new ToggleManager($collection);

// A toggle that will be active is the user id is less than 42
$operator  = new LessThan(42);
$condition = new OperatorCondition('user_id', $operator);
$toggle    = new Toggle('toggling', array($condition));

// Add the toggle to the manager
$manager->add($toggle);
