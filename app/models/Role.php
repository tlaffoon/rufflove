<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	$admin = new Role;
	$admin->name = 'Admin';
	$admin->save();
}