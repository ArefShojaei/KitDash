<?php

namespace Kit\Contracts\Interfaces;


interface Str extends HasStrValidation,
    HasDecoration,
    HasEscapeable,
    HasSearchable,
    HasEncodeable,
    HasModifiable,
    HasCountable,
    HasExtraction {}
