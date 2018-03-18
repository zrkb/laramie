<?php

namespace Laramie\Admin\Html\Elements;

use BadMethodCallException;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Renderable;

abstract class BaseElement implements Htmlable, Renderable
{
	/**
	 * Element Tag Name
	 * 
     * @var String
     */
	protected $tag;

	/**
	 * Element Attributes
	 * 
     * @var \Illuminate\Support\Collection
     */
	protected $attributes;

	/**
	 * Element Children
	 * 
     * @var \Illuminate\Support\Collection
     */
	protected $children;

	public function __construct($tag = null)
	{
		$this->tag = $tag;
		$this->attributes = new Collection();
		$this->children = new Collection();
	}

	public static function create($tag = null)
	{
		return new static($tag);
	}
	
	public function append($content = null)
	{
        if (is_null($content)) {
            return $this;
        }

        $this->children->push($content);

        return $this;
	}
	
	public function prepend($content = null)
	{
        if (is_null($content)) {
            return $this;
        }

        $this->children->prepend($content);

        return $this;
	}

	public function setAttribute(String $attribute, $value = null)
	{
		$this->attributes->put($attribute, $value);

		return $this;
	}

	public function setAttributes($attributes)
	{
		foreach ($attributes as $attribute => $value) {
			if (is_int($attribute)) {
				$attribute = $value;
				$value = '';
			}

			$this->setAttribute($attribute, (string) $value);
		}

		return $this;
	}

	public function attr($attributes)
	{
		return $this->setAttributes($attributes);
	}

	public function renderAttributes()
	{
		if ($this->attributes->isEmpty()) {
			return '';
		}

		$attributeStrings = [];

		foreach ($this->attributes->toArray() as $attribute => $value) {
			if ($value === '') {
				$attributeStrings[] = $attribute;
				continue;
			}

			$value = htmlentities($value, ENT_QUOTES, 'UTF-8', false);

			$attributeStrings[] = "{$attribute}=\"{$value}\"";
		}

		return implode(' ', $attributeStrings);
	}

	public function html($content = null)
	{
		$this->append($content);

		return $this;
	}

	public function open()
	{
		$tag = $this->attributes->isEmpty()
				? '<' . $this->tag . '>'
				: '<' . $this->tag . ' ' . $this->renderAttributes() .'>';

		return $tag;
	}

	public function content()
	{
		if ($this->isVoidElement()) {
			return '';
		}

        $content = $this->children->map(function ($child) : String {
            if ($child instanceof Htmlable) {
                return $child->toHtml();
            }

            if (is_null($child)) {
                return '';
            }

            if (is_string($child)) {
                return $child;
            }

            return '';
        })->implode('');

		return $content;
	}

	public function close()
	{
		return new HtmlString(
			$this->isVoidElement()
				? ''
				: '</' . $this->tag . '>'
		);
	}

	public function render()
	{
		return new HtmlString($this->open() . $this->content() . $this->close());
	}

	public function __toString() : String
	{
		return $this->render();
	}

	public function toHtml(): String
	{
		return $this->render();
	}

	public function isVoidElement() : Bool
	{
		return in_array($this->tag, [
			'area', 'base', 'br', 'col', 'embed', 'hr',
			'img', 'input', 'keygen', 'link', 'menuitem',
			'meta', 'param', 'source', 'track', 'wbr',
		]);
	}
}
