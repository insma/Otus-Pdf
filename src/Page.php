<?php
/**
 * Otus PDF - PDF document generation library
 * Copyright(C) 2019 Maciej Klemarczyk
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
namespace trogon\otuspdf;

use trogon\otuspdf\meta\PageInfo;
use trogon\otuspdf\Text;

class Page extends \trogon\otuspdf\base\BaseObject
{
    private $info;
    private $items;

    public function __construct($config = [])
    {
        $this->info = new PageInfo($config);
        $this->items = [];
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addText($text)
    {
        return $this->items[] = new Text($text);
    }
}