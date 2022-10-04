<?php

namespace App\Interfaces;

interface ShelfRepositoryInterface
{
    public function getAllSlugs();
    public function getNameBySlug($bookSlug);
    public function getBooksBySlug($bookSlug);
}