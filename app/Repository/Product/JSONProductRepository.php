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
        $varietiesRaw = $data->varieties;

        $varieties = [];
        foreach ($varietiesRaw as $varietyData) {
            foreach ($varietyData->options as $optionData) {
                $this->buildOptionModel($optionData);
            }
            $varieties[] = $this->buildVarietyModel($varietyData);
        }

        $items = [];
        foreach ($itemsRaw as $itemData) {
            $itemVarieties = [];
            foreach ($itemData->varieties as $varietyCode) {
                foreach ($varieties as $variety) {
                    if ($variety->getCode() === $varietyCode) {
                        $itemVarieties[] = $variety;
                        break;
                    }
                }
            }
            $items[] = $this->buildItemModel($itemData, $itemVarieties);
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
        foreach ($variety->options as $option) {
            $options[] = $this->buildOptionModel($option);
        }
        return new Variety(
            $variety->code,
            $variety->description,
            $options
        );
    }

    private function buildItemModel($item, $itemVarieties): Item
    {
        return new Item(
            $item->code,
            $item->description,
            $itemVarieties
        );
    }
}