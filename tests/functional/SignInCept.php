<?php

$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('Log In to my Larabook account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome back!');
$I->assertTrue(Auth::check());