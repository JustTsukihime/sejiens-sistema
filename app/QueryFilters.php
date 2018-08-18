<?php

namespace App;


use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilters implements ArrayAccess, Countable, IteratorAggregate
{
    /**
     * Contains possible filter values.
     * The first value is treated as the default value.
     * ['filter_name' => ['val1', 'val2', ...]]
     *
     * @var array
     */
    protected $options;

    /**
     * Filters
     *
     * @var array
     */
    protected $filters;

    /**
     * Query builder the filters are applied to.
     *
     * @var Builder
     */
    protected $builder;

    /**
     * QueryFilters constructor.
     *
     * @param QueryFilters|array $filters
     */
    public function __construct($filters = [])
    {
        $this->filters = $this->getArrayableItems($filters);
    }

    /**
     * Get all the filters.
     *
     * @return array
     */
    public function all() {
        return $this->filters;
    }

    /**
     * Applies filters to the builder.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder) {
        $this->builder = $builder;

        foreach ($this->all() as $name => $value) {
            if (!method_exists($this, $name)) {
                continue;
            }

            if(empty($value)) {
                $this->$name();
            } else {
                $this->$name($value);
            }
        }
        return $this->builder;
    }

    /**
     * Gets the count of filters.
     *
     * @return int
     */
    public function count()
    {
        return count($this->filters);
    }

    /**
     * Gets the default value of a filter if it's set.
     *
     * @param $name
     * @return null
     */
    public function default($name)
    {
        if ($this->hasOptions($name))
            return $this->options[$name][0];
        return null;
    }

    /**
     * Get all the filters except specified ones.
     *
     * @param array $filters
     * @return QueryFilters
     */
    public function except($filters = [])
    {
        if (is_null($filters)) {
            return new static($this->filters);
        }

        if ($filters instanceof self) {
            $filters = $filters->all();
        }

        $filters = is_array($filters) ? $filters : func_get_args();

        $out = new static($this->filters);

        foreach($filters as $filter) {
            $out->forget($filter);
        }

        return $out;
    }

    /**
     * Remove specified filters.
     *
     * @param array $filters
     * @return $this
     */
    public function forget($filters = [])
    {
        foreach((array) $filters as $filter)
        {
            $this->offsetUnset($filter);
        }

        return $this;
    }

    /**
     * Get the value of the specified filter.
     *
     * @param $name
     * @return mixed|null
     */
    public function get($name)
    {
        if ($this->has($name))
            return $this->offsetGet($name);
        return $this->default($name);
    }

    /**
     * Get inverted value of the source array.
     *
     * @param array $source
     * @param null $value
     * @return array|string
     */
    private function getInvertedValue(array $source, $value = null) {
        $inverted = array_diff($source, is_array($value) ? $value: [$value]);
        return count($inverted) < 2 ? implode('', $inverted) : $inverted;
    }

    /**
     * Returns array iterator.
     *
     * @return ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->filters);
    }

    /**
     * Convert source items to an array.
     *
     * @param QueryFilters|array $items
     * @return array
     */
    protected function getArrayableItems($items)
    {
        if (is_array($items)) {
            return $items;
        } elseif ($items instanceof self) {
            return $items->all();
        }

        return (array) $items;
    }

    /**
     * Checks if a filter with the said name is defined.
     *
     * @param $name
     * @return bool
     */
    public function has($name)
    {
        return array_key_exists($name, $this->filters);
    }

    /**
     * Checks if there are options defined for the given filter.
     *
     * @param $name
     * @return bool
     */
    public function hasOptions($name)
    {
        return key_exists($name, $this->options) && (count($this->options[$name]) > 0);
    }

    /**
     * Invert filters where possible.
     *
     * @return QueryFilters
     */
    public function invert() {
        $inverted = new static($this->filters);

        foreach ($this->options as $option => $values) {
            if ($this->has($option)) {
                $inverted->offsetSet($option, $this->getInvertedValue($values, $this->offsetGet($option)));
            }
        }

        return $inverted;
    }

    /**
     * Checks if filter has the provided value.
     * @param $name
     * @param $value
     * @return bool
     */
    public function is($name, $value)
    {
        return $this->get($name) == $value;
    }

    /**
     * Determine if a filter exists at an offset.
     *
     * @param  mixed  $filter
     * @return bool
     */
    public function offsetExists($filter)
    {
        return array_key_exists($filter, $this->filters);
    }

    /**
     * Get an filter at a given offset.
     *
     * @param  mixed  $filter
     * @return mixed
     */
    public function offsetGet($filter)
    {
        return $this->filters[$filter];
    }

    /**
     * Set the filter at a given offset.
     *
     * @param  mixed  $filter
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($filter, $value)
    {
        if (is_null($filter)) {
            $this->filters[] = $value;
        } else {
            $this->filters[$filter] = $value;
        }
    }

    /**
     * Unset the filter at a given offset.
     *
     * @param  string  $filter
     * @return void
     */
    public function offsetUnset($filter)
    {
        unset($this->filters[$filter]);
    }

    /**
     * Add a filter.
     *
     * @param $filter
     * @param $value
     * @return $this
     */
    public function push($filter, $value)
    {
        $this->offsetSet($filter, $value);
        return $this;
    }

    /**
     * Toggle provided filters if options are provided.
     *
     * @param $filters
     * @return array
     */
    public function toggle($filters)
    {
        $filters = is_array($filters) ? $filters : [$filters];

        $out = $this->filters;

        foreach($filters as $filter)
        {
            if (!$this->hasOptions($filter)) continue;

            if ($this->has($filter))
                $out[$filter] = $this->getInvertedValue($this->options[$filter], $this->get($filter));
            else
                $out[$filter] = $this->default($filter);
        }

        return new static($out);
    }

    /**
     * Push provided filters to the list.
     *
     * @param array $filters
     * @return QueryFilters
     */
    public function with($filters = [])
    {
        $out = new static($this->filters);

        foreach ($filters as $filter => $value)
        {
            $out->push($filter, $value);
        }

        return $out;
    }
}
