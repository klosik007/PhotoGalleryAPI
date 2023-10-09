<?php

namespace PHOTOGALLERY;

$incomingAction = HTTP::requestString('action', '');
$actionHandler = ActionFactory::getByAction($incomingAction);
if($actionHandler) {
    $actionHandler->run();
    die();
}

HTTP::return501();

abstract class ActionFactory {
    public static function getByAction($incomingAction) {
        return match ($incomingAction) {
            'someAction' => new TestCase(),
            default => false,
        };
    }
}

abstract class ActionHandler {
    abstract public function run();
}

class TestCase extends ActionHandler {
    public function run(): void {
        HTTP::returnsApplicationJSON();
        HTTP::wantsPost();
        echo 'test';
    }
}
