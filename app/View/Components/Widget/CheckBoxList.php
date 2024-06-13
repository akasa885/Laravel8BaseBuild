<?php

namespace App\View\Components\Widget;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class CheckBoxList extends Component
{
    /**
     * Title
     * @var string
     */
    public $title = 'Card Checkbox Selection';
    /**
     * Attribute name
     * @var string
     */
    public $attrName = 'card_checkbox_selection';
    /**
     * With Search
     * @var boolean
     */
    public $withSearch = false;
    /**
     * Items
     * @var Collection
     */
    public $items;
    /**
     * Needed Key
     * @var array
     */
    public $neededKey = [];
    /**
     * Selected Items
     * @var array
     */
    public $selectedItems = [];

    /**
     * Create a new component instance.
     * @param string $title
     * @param string $attrName
     * @param boolean $withSearch
     * @param Collection $items
     * @return void
     */
    public function __construct($title, $attrName, $withSearch = false, Collection $items, array $selectedItems = [])
    {
        $this->title = $title;
        $this->attrName = $attrName;
        $this->items = $items;
        $this->withSearch = $withSearch;
        $this->selectedItems = $selectedItems;
        $this->prepField();
    }

    public function prepField()
    {
        $this->setNeededKey('id', 'name', 'slug');
        $this->checkCollectionKeyHasNeededKey($this->items);
        $this->checkSelectedItemsHasNeededkey();

    }

    public function checkCollectionKeyHasNeededKey($collection)
    {
        $keys = $this->neededKey;
        foreach ($collection as $key => $item) {
            $collectItem = collect($item);
            if (!$collectItem->has($this->neededKey)) {
                throw new \Exception('Collection key does not have the needed key for this component');   
            }
        }
    }

    private function checkSelectedItemsHasNeededkey()
    {
        foreach ($this->selectedItems as $key => $item) {
            if (!is_int($item)) {
                throw new \Exception('Selected items should be integer');
            }
        }
    }

    public function setNeededKey(...$key)
    {
        $this->neededKey = $key;
    }

    public function isKeySelected(int $itemKey)
    {
        return in_array($itemKey, $this->selectedItems);
    }

    public function isOldValueSelected($oldValue, $itemKey)
    {
        $oldValueId = [];
        if (is_array($oldValue)) {
            foreach ($oldValue as $key => $value) {
                $valueExplode = explode('-', $value);
                //last index is the item key
                $keyItem = end($valueExplode);
                $oldValueId[] = $keyItem;
            }
    
            return in_array($itemKey, $oldValueId);
        }

        return false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget.check-box-list');
    }
}
