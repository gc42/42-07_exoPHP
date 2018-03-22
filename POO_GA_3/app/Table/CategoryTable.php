<?php
namespace App\Table;
use Core\Table\Table;

class CategoryTable extends Table
{
	// Redeclaration specifique du nom de la table
	// car category prends 'ies' au pluriel contrairement aux autres noms de tables
	protected $table = 'categories';







}