<?php

if (!function_exists('arrayChunkCategories')) {
    function arrayChunkCategories($categories) {
        return $categories->split(2);
    }
}
