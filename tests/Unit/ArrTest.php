<?php

namespace Tests\Unit;

use Kit\Utils\Arr;
use Kit\Contracts\Interfaces\Arr as IArr;
use PHPUnit\Framework\TestCase;


final class ArrTest extends TestCase {
    /**
     * @test
     */
    public function throwAnErrorToGetNewInstance(): void {
        try {
            new Arr;
        } catch (\Error $error) {
            $this->assertIsObject($error);
            $this->assertIsString($error->getMessage());
        }
    }

    /**
     * @test
     */
    public function isImplementedArrInterface(): void {
        $interfaces = class_implements(Arr::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IArr::class, $interfaces);
    }

    /**
     * @test
     */
    public function getDifferenceValuesOfTwoArraysThatNotIncludedForValuesOfTheNextArray(): void {
        $num1 = [1,2,3];
        $num2 = [3,4,5];

        $diff = Arr::difference($num1, $num2);

        $this->assertIsArray($diff);
        $this->assertCount(expectedCount:2, haystack:$diff);
        $this->assertContains(needle:1, haystack:$diff);
        $this->assertContains(needle:2, haystack:$diff);
    }

    /**
     * @test
     */
    public function convertValuesOfAnArrayToStringContentBySeperator(): void {
        $fullanme = ["Aref", "Shojaei"];
        $seperator = " ";

        $result = Arr::join($fullanme, $seperator);

        $this->assertIsNotArray($result);
        $this->assertIsString($result);
        $this->assertStringContainsString($seperator, $result);
    }

    /**
     * @test
     */
    public function convertCssStylesAsValuesOfAnArrayToInlineStringContent(): void {
        $styles = [
            "margin: 0 auto",
            "font-size: 12px",
            "color: red",
        ];
        $keys = [":", ";"];

        $css = Arr::toCssStyles($styles);

        $this->assertIsNotArray($css);
        $this->assertIsString($css);
        $this->assertStringContainsString(current($keys), $css);
        $this->assertStringContainsString(end($keys), $css);
    }

    /**
     * @test
     */
    public function mergeValuesOfAnArrayTogether(): void {
        $numbers = [1,2,3,4,5];
        $newNumbers = [6,7,8];

        $newArray = Arr::concat($numbers, $newNumbers);

        $this->assertIsArray($newArray);
        $this->assertCount(expectedCount:6, haystack:$newArray);
        $this->assertIsArray(end($newArray));
    }

    /**
     * @test
     */
    public function pushValueAsKeyValueToAnArray(): void {
        $user = ["name" => "Aref"];
        $key = "skill";
        $value = "Software developer";
        
        $updatedUser = Arr::add($user, $key, $value);

        $this->assertIsArray($updatedUser);
        $this->assertCount(expectedCount:2, haystack:$updatedUser);
        $this->assertNotSame($updatedUser, $user);
        $this->assertArrayHasKey($key, $updatedUser);
        $this->assertIsString($updatedUser[$key]);
        $this->assertContains($value, $updatedUser);
    }

    /**
     * @test
     */
    public function getValueOfAnArrayByKey(): void {
        $user = ["name" => "Aref"];

        $name = Arr::get($user, "name");
    
        $this->assertIsString($name);
        $this->assertIsNotArray($name);
        $this->assertArrayHasKey(key:"name", array:$user);
        $this->assertSame(expected:"Aref", actual:$name);
    }
    
    /**
     * @test
     */
    public function getValueOfAnArrayByKeyThatNotExistsAndReturnsNull(): void {
        $user = [];

        $name = Arr::get($user, "name");

        $this->assertNull($name);
        $this->assertIsNotArray($name);
        $this->assertIsNotString($name);
        $this->assertArrayNotHasKey(key:"name", array:$user);
        $this->assertNotSame(expected:"Aref", actual:$name);
    }

    /**
     * @test
     */
    public function sliceValuesOfAnArrayByLength(): void {
        $numbers = [1,2,3,4,5];

        $arr = Arr::take($numbers, 3);

        $this->assertIsArray($arr);
        $this->assertCount(expectedCount:3, haystack:$arr);
        $this->assertSame(expected:[1,2,3], actual:$arr);
    }

    /**
     * @test
     */
    public function getValueOfAnArrayByIndex(): void {
        $names = ["Aref", "Robert"];
        $index = 1;

        $name = Arr::nth($names, $index);
    
        $this->assertIsString($name);
        $this->assertIsNotArray($name);
        $this->assertArrayHasKey(key:$index, array:$names);
        $this->assertSame(expected:"Robert", actual:$name);
    }

    /**
     * @test
     */
    public function removeValueOfAnArrayByIndex(): void {
        $names = ["Aref", "Robert"];
        $index = 1;

        $arr = Arr::drop($names, $index);
    
        $this->assertIsArray($arr);
        $this->assertIsNotString($arr);
        $this->assertArrayNotHasKey($index, $arr);
        $this->assertNotSame(expected:"Robert", actual:$arr);
    }

    /**
     * @test
     */
    public function removeAllFalseyValuesOfAnArray(): void {
        $input = [0, 1, false, 2, '', 3];
        
        $arr = Arr::compact($input);
    
        $this->assertIsArray($arr);
        $this->assertNotSame($arr, $input);
        $this->assertCount(expectedCount:3, haystack:$arr);
        $this->assertNotContains(needle:0, haystack:$arr);
        $this->assertNotContains(needle:false, haystack:$arr);
        $this->assertNotContains(needle:'', haystack:$arr);
    }

    /**
     * @test
     */
    public function filterValuesOfAnArrayByKeyThatReturnsNewAnArrayToNotIncludeValues(): void {
        $input = ["name" => "Desk", "price" => 100];
        $key = "price";

        $filtered = Arr::except($input, $key);

        $this->assertIsArray($filtered);
        $this->assertArrayNotHasKey($key, $filtered);
        $this->assertNotSame($filtered, $input);
        $this->assertCount(expectedCount:1, haystack:$filtered);
    }

    /**
     * @test
     */
    public function getFirstValueOfAnArray(): void {
        $numbers = [100, 200, 300];

        $number = Arr::first($numbers);

        $this->assertIsInt($number);
        $this->assertIsNotArray($number);
        $this->assertIsNotString($number);
        $this->assertContains($number, $numbers);
    }

    /**
     * @test
     */
    public function getLastValueOfAnArray(): void {
        $numbers = [100, 200, 300, 110];

        $number = Arr::last($numbers);

        $this->assertIsInt($number);
        $this->assertIsNotArray($number);
        $this->assertIsNotString($number);
        $this->assertContains($number, $numbers);
    }

    /**
     * @test
     */
    public function filterValuesOfAnArrayByKeyThatReturnsNewAnArrayToIncludeValues(): void {
        $input = ["name" => "Desk", "price" => 100, "orders" => 10];
        $keys = ["name", "price"];
        $key = "orders";

        $filtered = Arr::only($input, $keys);

        $this->assertIsArray($filtered);
        $this->assertArrayNotHasKey($key, $filtered);
        $this->assertNotSame($filtered, $input);
        $this->assertCount(expectedCount:2, haystack:$filtered);
    }

    /**
     * @test
     */
    public function fillValueOfAnArrayBySymbol(): void {
        $input = [1, 2, 3];
        $symbol = "*";

        $arr = Arr::fill($input, $symbol);
    
        $this->assertIsArray($arr);
        $this->assertEquals(count($input), count($arr));
        $this->assertContains($symbol, $arr);
    }

    /**
     * @test
     */
    public function getRandomValueOfAnArray(): void {
        $numbers = [1, 2, 3, 4, 5];

        $randomNumber = Arr::random($numbers);

        $this->assertIsInt($randomNumber);
    }

    /**
     * @test
     */
    public function shuffleValuesOfAnArray(): void {
        $numbers = [1, 2, 3, 4, 5];

        $shuffled = Arr::shuffle($numbers);

        $this->assertIsArray($shuffled);
        $this->assertNotSame($shuffled, $numbers);
        $this->assertEquals(count($shuffled), count($numbers));
    }

    /**
     * @test
     */
    public function divideAnArrayToTwoArraysThatProvidesKeysAndValues(): void {
        [$keys, $values] = Arr::divide(['name' => 'Desk']);

        $this->assertIsArray($keys);
        $this->assertIsArray($values);
    }

    /**
     * @test
     */
    public function groupValuesOfAnArrayToOtherArraysByLength(): void {
        $input = ['a', 'b', 'c', 'd'];
        $length = 2;

        $grouped = Arr::chunk($input, $length);

        $this->assertIsArray($grouped);
        $this->assertIsArray(current($grouped));
        $this->assertIsArray(end($grouped));
        $this->assertCount(expectedCount:2, haystack:$grouped);
        $this->assertArrayNotHasKey(key:"a", array:$grouped);
        $this->assertArrayNotHasKey(key:"d", array:$grouped);
    }

    /**
     * @test
     */
    public function sortValueOfAnArrayThatReturnsNewAnArray(): void {
        $input = ['Desk', 'Table', 'Chair'];
    
        $sorted = Arr::sort($input);

        $this->assertIsArray($sorted);
        $this->assertNotSame($sorted, $input);
        $this->assertEquals(count($sorted), count($input));
    }

    /**
     * @test
     */
    public function uniqueValuesOfAnArrayThatReturnsNewAnArray(): void {
        $input = [2, 1, 2];

        $uniqueArr = Arr::unique($input);

        $this->assertIsArray($uniqueArr);
        $this->assertNotSame($uniqueArr, $input);
        $this->assertNotEquals(count($uniqueArr), count($input));
        $this->assertEquals(expected:[2,1], actual:$uniqueArr);
    }

    /**
     * @test
     */
    public function validateToExistKeyInAnArray(): void {
        $user = ["name" => "Aref"];
        $key = "name";

        $isKeyExists = Arr::exists($user, $key);

        $this->assertIsBool($isKeyExists);
        $this->assertTrue($isKeyExists);
    }

    /**
     * @test
     */
    public function validateToNotExistKeyInAnArray(): void {
        $user = ["name" => "Aref"];
        $key = "age";

        $isKeyExists = Arr::exists($user, $key);

        $this->assertIsBool($isKeyExists);
        $this->assertFalse($isKeyExists);
    }

    /**
     * @test
     */
    public function validateToExistValueInAnArray(): void {
        $roles = ["admin", "writer", "manager"];
        $role = "writer";

        $isValueExists = Arr::has($roles, $role);

        $this->assertIsBool($isValueExists);
        $this->assertTrue($isValueExists);
    }

    /**
     * @test
     */
    public function validateToNotExistValueInAnArray(): void {
        $roles = ["admin", "manager"];
        $role = "writer";

        $isValueExists = Arr::has($roles, $role);

        $this->assertIsBool($isValueExists);
        $this->assertFalse($isValueExists);
    }

    /**
     * @test
     */
    public function validateToBeAnAssocArray(): void {
        $isAssocArray = Arr::isAssoc(array:['product' => ['name' => 'Desk', 'price' => 100]]);

        $this->assertIsBool($isAssocArray);
        $this->assertTrue($isAssocArray);
    }

    /**
     * @test
     */
    public function validateToNotBeAnAssocArray(): void {
        $isAssocArray = Arr::isAssoc(array:[1, 2, 3]);

        $this->assertIsBool($isAssocArray);
        $this->assertFalse($isAssocArray);
    }

    /**
     * @test
     */
    public function validateToBeAList(): void {
        $isList = Arr::isList(array:[1, 2, 3]);

        $this->assertIsBool($isList);
        $this->assertTrue($isList);
    }

    /**
     * @test
     */
    public function validateToNotBeAList(): void {
        $isList = Arr::isList(array:['product' => ['name' => 'Desk', 'price' => 100]]);

        $this->assertIsBool($isList);
        $this->assertFalse($isList);
    }
}
