<?php

namespace Db\Interface;

interface IDado{
    public function salvar($objeto);
    public function todos();
}