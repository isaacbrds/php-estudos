<?php

namespace Isaac\Composer\Database\Interfaces;

interface IDados{
    public function salvar($objeto);
    public function todos();
}