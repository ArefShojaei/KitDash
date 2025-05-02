<?php

namespace Kit\Helpers;

use Kit\Helpers\Providers\Array\{
    HasCompareableInterface,
    HasConcatenationInterface,
    HasCRUDInterface,
    HasRandomInterface,
    HasSeparatorInterface,
    HasSortInterface,
    HasUniqueInterface,
    HasValidationInterface
};


interface ArrInterface extends HasValidationInterface,
    HasConcatenationInterface,
    HasCRUDInterface,
    HasRandomInterface,
    HasSortInterface,
    HasSeparatorInterface,
    HasCompareableInterface,
    HasUniqueInterface {}