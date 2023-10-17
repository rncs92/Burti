<?php declare(strict_types=1);

namespace Burti\Repository\Product;

use Burti\Models\Item;
use Burti\Models\Option;
use Burti\Models\Variety;

class JSONProductRepository implements ProductRepository
{
    public function getItems(): array
    {
        $jsonString = file_get_contents('../public/sample.json');
        $data = json_decode($jsonString);
        $itemsRaw = $data->items;

        $items = [];


        foreach($itemsRaw as $item) {
            var_dump($item);die;
            $items[] = $this->buildItemModel($item);
        }

        return $items;
    }

    private function buildOptionModel($option): Option
    {
        return new Option(
            $option->code,
            $option->description
        );
    }

    private function buildVarietyModel($variety): Variety
    {
        $options = [];
        foreach($variety->options as $option) {
            $options[] = $this->buildOptionModel($option);
        }
        return new Variety(
            $variety->code,
            $variety->description,
            $options
        );
    }

    private function buildItemModel($item): Item
    {
        $varieties = [];
        foreach($item->varieties as $variety) {
            $varieties[] = $this->buildVarietyModel($variety);
        }

        return new Item(
            $item->code,
            $item->description,
            $varieties
        );
    }
}