<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('I want to review all users who are registered for Larabook');

$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');