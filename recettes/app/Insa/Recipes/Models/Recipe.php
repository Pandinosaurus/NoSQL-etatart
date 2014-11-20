<?php namespace Insa\Recipes\Models;

use Moloquent;
use Laracasts\Presenter\PresentableTrait;

class Recipe extends Moloquent {

	use PresentableTrait;

	const AMUSE_GUEULE = 'amuse-gueule';
	const DESSERT      = 'dessert';
	const MAIN         = 'main';
	const STARTER      = 'starter';

	protected $presenter = 'Insa\Recipes\Presenters\RecipePresenter';
	public $fillable = ['title', 'note', 'cookingTime', 'type', 'slug', 'description'];

	public function ingredients()
	{
		return $this->embedsMany(\Insa\Ingredients\Models\Ingredient::class);
	}

	public function setNoteAttribute($value)
	{
		if (! is_int($value) OR $value < 0 OR $value > 10)
			throw new \InvalidArgumentException("The rating should be between 0 and 10");

		$this->attributes['note'] = $value;
	}

	public function setTypeAttribute($value)
	{
		$allowedValues = [self::AMUSE_GUEULE, self::DESSERT, self::MAIN, self::STARTER];
		if ( ! in_array($value, $allowedValues))
			throw new \InvalidArgumentException($value." is not a valid type. Possible values are: ".implode('|', $allowedValues));
			
		$this->attributes['type'] = $value;
	}
}