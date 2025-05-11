<?php

namespace Kit\Contracts\Interfaces;


interface Arr extends HasArrValidation,
    HasConcatenation,
    HasCRUD,
    HasRandom,
    HasSort,
    HasSeparator,
    HasCompareable,
    HasUnique {}