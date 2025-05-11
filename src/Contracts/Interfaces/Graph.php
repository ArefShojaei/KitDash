<?php

namespace Kit\Contracts\Interfaces;


interface Graph {
    public function addNode($node): void;
    public function addEdge($start, $end): void;
    public function getNode($node): mixed;
    public function toArray(): array;
}