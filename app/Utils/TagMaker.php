<?php

/*
 * SPDX-License-Identifier: AGPL-3.0-or-later

 * Copyright (C) 2020 Roman Erdyakov

 * This file is part of Wnemonic. It is a tag based file manager.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.

 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/


namespace App\Utils;

    
class TagMaker
{
    private const delimeter = ",";
    private const spaceReplace = "_";


    public static function toArray(string $tags, string ...$extraTags) : array
    {
        $delimeted = explode(self::delimeter, $tags);

        $tagsArr = array();
        
        foreach ($delimeted as $tag) {
            array_push($tagsArr, self::normalize($tag));
        }
        
        foreach ($extraTags as $tag) {
            array_push($tagsArr, self::normalize($tag));
        }
        
        return array_unique($tagsArr);
    }

    private static function normalize(string $tag) : string
    {
        $trimmerTag = trim($tag);
        
        return str_replace(" ", self::spaceReplace, $trimmerTag);        
    }
}

