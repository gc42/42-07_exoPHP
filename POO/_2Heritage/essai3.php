<?php
class A
{
	public function appellerQuiEstCe()
	{
		static::quiEstCe();
	}
	public function quiEstCe()
	{
		echo 'A';
	}
}

class B extends A
{
	public static function test()
	{
		// parent::appellerQuiEstCe(); // Le resultat est 'C'
		// self::appellerQuiEstCe();   // Le resultat est aussi 'C'
		A::appellerQuiEstCe();         // Le resultat est 'A' car appel directement la classe
	}
	
	public function quiEstCe()
	{
		echo 'B';
	}
}

class C extends B
{
	public function quiEstCe()
	{
		echo 'C';
	}
}

C::test();
?>
