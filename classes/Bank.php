<?php

namespace classes;

abstract class Bank {
    abstract protected function withdraw($value, $cpf);
    abstract protected function deposit($value, $cpf);
    abstract protected function closeAccount($cpf);
}