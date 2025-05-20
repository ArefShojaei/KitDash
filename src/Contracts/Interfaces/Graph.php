<?php

namespace Kit\Contracts\Interfaces;


interface Graph extends Describer {
    public function addNode($node): void;
    public function addEdge($start, $end): void;
    public function getNode($node): mixed;
}