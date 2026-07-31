<?php

namespace Tests\Unit;

use Error;

use PHPUnit\Framework\TestCase;

use Kit\Support\Arr;
use Kit\Support\Interfaces\Arr as IArr;

final class ArrTest extends TestCase
{
    /**
     * @test
     */
    public function throwAnErrorToGetNewInstance(): void
    {
        try {
            new Arr();
        } catch (Error $error) {
            $this->assertIsObject($error);
            $this->assertIsString($error->getMessage());
        }
    }

    /**
     * @test
     */
    public function isImplementedArrInterface(): void
    {
        $interfaces = class_implements(Arr::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IArr::class, $interfaces);
    }

    // ========== Comparable ==========

    /**
     * @test
     */
    public function getDifferenceValuesOfTwoArrays(): void
    {
        $num1 = [1, 2, 3];
        $num2 = [3, 4, 5];

        $diff = Arr::difference($num1, $num2);

        $this->assertIsArray($diff);
        $this->assertCount(2, $diff);
        $this->assertContains(1, $diff);
        $this->assertContains(2, $diff);
    }

    // ========== Concatenable ==========

    /**
     * @test
     */
    public function convertValuesOfAnArrayToStringBySeparator(): void
    {
        $fullname = ["Aref", "Shojaei"];
        $separator = " ";

        $result = Arr::join($fullname, $separator);

        $this->assertIsString($result);
        $this->assertStringContainsString($separator, $result);
        $this->assertSame("Aref Shojaei", $result);
    }

    /**
     * @test
     */
    public function convertCssStylesAsValuesOfAnArrayToInlineString(): void
    {
        $styles = ["margin: 0 auto", "font-size: 12px", "color: red"];

        $css = Arr::toCssStyles($styles);

        $this->assertIsString($css);
        $this->assertStringContainsString(";", $css);
        $this->assertStringContainsString("margin: 0 auto", $css);
    }

    /**
     * @test
     */
    public function mergeValuesOfAnArrayTogether(): void
    {
        $numbers = [1, 2, 3, 4, 5];
        $newNumbers = [6, 7, 8];

        $newArray = Arr::concat($numbers, $newNumbers);

        $this->assertIsArray($newArray);
        $this->assertGreaterThanOrEqual(5, count($newArray));
    }

    // ========== Mutable ==========

    /**
     * @test
     */
    public function pushValueAsKeyValueToAnArray(): void
    {
        $user = ["name" => "Aref"];
        $key = "skill";
        $value = "Software developer";

        $updatedUser = Arr::add($user, $key, $value);

        $this->assertIsArray($updatedUser);
        $this->assertCount(2, $updatedUser);
        $this->assertArrayHasKey($key, $updatedUser);
        $this->assertSame($value, $updatedUser[$key]);
    }

    /**
     * @test
     */
    public function getValueOfAnArrayByKey(): void
    {
        $user = ["name" => "Aref"];

        $name = Arr::get($user, "name");

        $this->assertSame("Aref", $name);
    }

    /**
     * @test
     */
    public function getValueOfAnArrayByKeyThatNotExistsAndReturnsNull(): void
    {
        $user = [];

        $name = Arr::get($user, "name");

        $this->assertNull($name);
    }

    /**
     * @test
     */
    public function sliceValuesOfAnArrayByLength(): void
    {
        $numbers = [1, 2, 3, 4, 5];

        $arr = Arr::take($numbers, 3);

        $this->assertIsArray($arr);
        $this->assertCount(3, $arr);
        $this->assertSame([1, 2, 3], $arr);
    }

    /**
     * @test
     */
    public function getValueOfAnArrayByIndex(): void
    {
        $names = ["Aref", "Robert"];
        $index = 1;

        $name = Arr::nth($names, $index);

        $this->assertSame("Robert", $name);
    }

    /**
     * @test
     */
    public function removeValueOfAnArrayByIndex(): void
    {
        $names = ["Aref", "Robert"];
        $index = 1;

        $arr = Arr::drop($names, $index);

        $this->assertIsArray($arr);
        $this->assertNotContains("Robert", $arr);
    }

    /**
     * @test
     */
    public function removeAllFalseyValuesOfAnArray(): void
    {
        $input = [0, 1, false, 2, "", 3];

        $arr = Arr::compact($input);

        $this->assertIsArray($arr);
        $this->assertCount(3, $arr);
        $this->assertNotContains(0, $arr);
        $this->assertNotContains(false, $arr);
        $this->assertNotContains("", $arr);
    }

    /**
     * @test
     */
    public function filterValuesOfAnArrayByKeyThatReturnsNewArrayWithoutThatKey(): void
    {
        $input = ["name" => "Desk", "price" => 100];
        $key = "price";

        $filtered = Arr::except($input, $key);

        $this->assertIsArray($filtered);
        $this->assertArrayNotHasKey($key, $filtered);
        $this->assertCount(1, $filtered);
    }

    /**
     * @test
     */
    public function getFirstValueOfAnArray(): void
    {
        $numbers = [100, 200, 300];

        $number = Arr::first($numbers);

        $this->assertSame(100, $number);
    }

    /**
     * @test
     */
    public function getLastValueOfAnArray(): void
    {
        $numbers = [100, 200, 300, 110];

        $number = Arr::last($numbers);

        $this->assertSame(110, $number);
    }

    /**
     * @test
     */
    public function filterValuesOfAnArrayByKeysThatReturnsNewArrayWithOnlyThoseKeys(): void
    {
        $input = ["name" => "Desk", "price" => 100, "orders" => 10];
        $keys = ["name", "price"];

        $filtered = Arr::only($input, $keys);

        $this->assertIsArray($filtered);
        $this->assertArrayNotHasKey("orders", $filtered);
        $this->assertCount(2, $filtered);
        $this->assertArrayHasKey("name", $filtered);
        $this->assertArrayHasKey("price", $filtered);
    }

    /**
     * @test
     */
    public function fillValueOfAnArrayBySymbol(): void
    {
        $input = [1, 2, 3];
        $symbol = "*";

        $arr = Arr::fill($input, $symbol);

        $this->assertIsArray($arr);
        $this->assertCount(3, $arr);
        $this->assertSame(["*", "*", "*"], $arr);
    }

    // ========== Randomizable ==========

    /**
     * @test
     */
    public function getRandomValueOfAnArray(): void
    {
        $numbers = [1, 2, 3, 4, 5];

        $randomNumber = Arr::random($numbers);

        $this->assertContains($randomNumber, $numbers);
    }

    /**
     * @test
     */
    public function shuffleValuesOfAnArray(): void
    {
        $numbers = [1, 2, 3, 4, 5];

        $shuffled = Arr::shuffle($numbers);

        $this->assertIsArray($shuffled);
        $this->assertCount(5, $shuffled);
        $this->assertEqualsCanonicalizing($numbers, $shuffled);
    }

    // ========== Separable ==========

    /**
     * @test
     */
    public function divideAnArrayToTwoArraysThatProvidesKeysAndValues(): void
    {
        [$keys, $values] = Arr::divide(["name" => "Desk"]);

        $this->assertIsArray($keys);
        $this->assertIsArray($values);
        $this->assertSame(["name"], $keys);
        $this->assertSame(["Desk"], $values);
    }

    /**
     * @test
     */
    public function groupValuesOfAnArrayToOtherArraysBySize(): void
    {
        $input = ["a", "b", "c", "d"];
        $size = 2;

        $grouped = Arr::chunk($input, $size);

        $this->assertIsArray($grouped);
        $this->assertCount(2, $grouped);
        $this->assertSame(["a", "b"], $grouped[0]);
        $this->assertSame(["c", "d"], $grouped[1]);
    }

    // ========== Sortable ==========

    /**
     * @test
     */
    public function sortValueOfAnArrayThatReturnsNewArray(): void
    {
        $input = [3, 1, 4, 1, 5];

        $sorted = Arr::sort($input);

        $this->assertIsArray($sorted);
        $this->assertSame([1, 1, 3, 4, 5], $sorted);
    }

    // ========== Uniqueable ==========

    /**
     * @test
     */
    public function uniqueValuesOfAnArrayThatReturnsNewArray(): void
    {
        $input = [2, 1, 2];

        $uniqueArr = Arr::unique($input);

        $this->assertIsArray($uniqueArr);
        $this->assertCount(2, $uniqueArr);
        $this->assertEqualsCanonicalizing([2, 1], array_values($uniqueArr));
    }

    // ========== Validatable ==========

    /**
     * @test
     */
    public function validateToExistKeyInAnArray(): void
    {
        $user = ["name" => "Aref"];

        $this->assertTrue(Arr::exists($user, "name"));
        $this->assertFalse(Arr::exists($user, "age"));
    }

    /**
     * @test
     */
    public function validateToExistValueInAnArray(): void
    {
        $roles = ["admin", "writer", "manager"];

        $this->assertTrue(Arr::has($roles, "writer"));
        $this->assertFalse(Arr::has($roles, "guest"));
    }

    /**
     * @test
     */
    public function validateToBeAnAssocArray(): void
    {
        $this->assertTrue(
            Arr::isAssoc(["product" => ["name" => "Desk", "price" => 100]]),
        );
        $this->assertFalse(Arr::isAssoc([1, 2, 3]));
    }

    /**
     * @test
     */
    public function validateToBeAList(): void
    {
        $this->assertTrue(Arr::isList([1, 2, 3]));
        $this->assertFalse(
            Arr::isList(["product" => ["name" => "Desk", "price" => 100]]),
        );
    }
}
