<?php namespace Insa\Guests\Models;

use Moloquent;
use Laracasts\Presenter\PresentableTrait;

class Guest extends Moloquent {

	use PresentableTrait;

	const FRIEND    = "friend";
	const FAMILY    = "family";
	const COLLEAGUE = "colleague";

	protected $presenter = 'Insa\Guests\Presenters\GuestPresenter';
	public $fillable = ['name', 'type', 'phone'];

	public function setTypeAttribute($value)
	{
		$allowedValues = self::getAllowedTypeValues();

		if (! in_array($value, $allowedValues))
			throw new \InvalidArgumentException("Type not supported. Got ".$value.". Allowed values are:".implode('|', $allowedValues));

		$this->attributes['type'] = $value;
	}

	public static function getAllowedTypeValues()
	{
		return [self::FRIEND, self::FAMILY, self::COLLEAGUE];
	}
}