<?php

namespace Tests\Unit;

use Kit\Utils\Str;
use Kit\Contracts\Interfaces\Str as IStr;
use PHPUnit\Framework\TestCase;


final class StrTest extends TestCase {
    /**
     * @test
     */
    public function throwAnErrorToGetNewInstance(): void {
        try {
            new Str;
        } catch (\Error $error) {
            $this->assertIsObject($error);
            $this->assertIsString($error->getMessage());
        }
    }

    /**
     * @test
     */
    public function isImplementedBinaryInterface(): void {
        $interfaces = class_implements(Str::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IStr::class, $interfaces);
    }

    /**
     * @test
     */
    public function getLengthOfStringWithValue(): void {
        $content = "KitDash";
        
        $length = Str::length($content);

        $this->assertIsInt($length);
        $this->assertEquals(strlen($content), $length);
    }

    /**
     * @test
     */
    public function getLengthOfStringWithEmptyValueThatReturnsZero(): void {
        $length = Str::length(subject:"");

        $this->assertIsInt($length);
        $this->assertEquals(expected:0, actual:$length);
    }

    /**
     * @test
     */
    public function getCountOfWordWithValue(): void {
        $count = Str::wordCount(subject:"PHP Utilty Library");
        
        $this->assertIsInt($count);
    }
    
    /**
     * @test
     */
    public function getCountOfWordWithEmptyValueThatReturnsEmptyValue(): void {
        $count = Str::wordCount(subject:"");
        
        $this->assertIsInt($count);
        $this->assertEquals(expected:0, actual:$count);
    }

    /**
     * @test
     */
    public function convertStringContentToTitleCaseStringContent(): void {
        $content = "a nice title uses the correct case";
        
        $result = Str::title($content);

        $this->assertIsString($result);
        $this->assertNotSame($result, $content);
    }

    /**
     * @test
     */
    public function convertCamelCaseStringContentToSnakeCaseStringContent(): void {
        $seperator = "_";

        $result = Str::snake(subject:"fooBar");

        $this->assertIsString($result);
        $this->assertStringContainsString($seperator, $result);
    }

    /**
     * @test
     */
    public function convertCamelCaseStringContentToKebabCaseStringContent(): void {
        $seperator = "-";

        $result = Str::kebab(subject:"fooBar");

        $this->assertIsString($result);
        $this->assertStringContainsString($seperator, $result);
    }

    /**
     * @test
     */
    public function convertSnakeCaseStringContentToCamelCaseStringContent(): void {
        $seperator = "_";

        $result = Str::camel(subject:"foo_bar");

        $this->assertIsString($result);
        $this->assertStringNotContainsString($seperator, $result);
    }

    /**
     * @test
     */
    public function convertSnakeCaseStringContentToTitleCaseStringContent(): void {
        $result = Str::headline(subject:"EmailNotificationSent");
        $whitesapce = " ";

        $this->assertIsString($result);
        $this->assertStringContainsString($whitesapce, $result);
    }

    /**
     * @test
     */
    public function removeAllWhiteSpacesInAStringContent(): void {
        $content = "    KitDash    library    ";

        $result = Str::squish($content);

        $this->assertIsString($result);
        $this->assertNotEquals(strlen($result), strlen($content));
    }

    /**
     * @test
     */
    public function removeAllSpecificCharacterInAStringBySymbol(): void {
        $symbol = "*";
        $content = "{$symbol}KitDash{$symbol}";

        $result = Str::trim($content, $symbol);

        $this->assertIsString($result);
        $this->assertNotEquals(strlen($result), strlen($content));
        $this->assertStringNotContainsString($symbol, $result);
    }

    /**
     * @test
     */
    public function convertStringContentToBase64EncodedValue(): void {
        $result = Str::toBase64(subject:"Hello from KitDash library!");

        $this->assertNotEmpty($result);
        $this->assertIsString($result);
    }

    /**
     * @test
     */
    public function prepareSqlQueryInAStringContent() {
        $query = "SELECT * FROM users WHERE id = 1 AND <script>alert(true)</script>";
        $keywords = ["&", ";"];

        $result = Str::e($query);

        $this->assertIsString($result);
        $this->assertStringContainsString(current($keywords), $result);
        $this->assertStringContainsString(end($keywords), $result);
    }

    /**
     * @test
     */
    public function extractStringContentBySymbol(): void {
        $content = "KitDash library";
        $whitesapce = " ";

        $extractedCotnent = Str::split($content, $whitesapce);

        $this->assertIsArray($extractedCotnent);
        $this->assertCount(count($extractedCotnent), $extractedCotnent);
        $this->assertIsIterable($extractedCotnent);
    }

    /**
     * @test
     */
    public function convertStringToUpperCase(): void {
        $content = "PHP programming language";

        $result = Str::upper($content);

        $this->assertIsString($result);
        $this->assertNotEquals($result, $content);
    }

    /**
     * @test
     */
    public function convertStringToLowerCase(): void {
        $content = "PHP programming language";

        $result = Str::lower($content);

        $this->assertIsString($result);
        $this->assertNotEquals($result, $content);
    }
    
    /**
     * @test
     */
    public function convertFirstCharOfStringContentToLowerCase(): void {
        $content = "Foo Bar";
        $firstChar = $content[0];

        $result = Str::lcfirst($content);

        $this->assertIsString($result);
        $this->assertNotEquals($result, $content);
        $this->assertStringNotContainsString($firstChar, $result);
    }

    /**
     * @test
     */
    public function applyTextLimiterForStringContent(): void {
        $content = "The quick brown fox jumps over the lazy dog";
        $acceptedLimitCount = 20;
        $LimiterValue = "...";

        $result = Str::limit($content, $acceptedLimitCount);

        $this->assertIsString($result);
        $this->assertNotEquals(strlen($result), strlen($content));
        $this->assertStringContainsString($LimiterValue, $result);
    }

    /**
     * @test
     */
    public function maskStringCotnentBySymbolAndIndex(): void {
        $content = "taylor@example.com";
        $symbol = "*";
        $index = 6;

        $result = Str::mask($content, $symbol, $index);
    
        $this->assertIsString($result);
        $this->assertNotEquals($result, $content);
        $this->assertEquals(strlen($result), strlen($content));
        $this->assertStringContainsString($symbol, $result);
    }

    /**
     * @test
     */
    public function addLeftPaddingInFirstOfStringContent(): void {
        $content = "KitDash";
        $padding = 10;
        $symbol = "*";

        $result = Str::padLeft($content, $padding, $symbol);

        $this->assertIsString($result);
        $this->assertNotEquals(strlen($result), strlen($content));
        $this->assertStringContainsString($symbol, $result);
    }

    /**
     * @test
     */
    public function addRightPaddingInLastOfStringContent(): void {
        $content = "KitDash";
        $padding = 10;
        $symbol = "*";

        $result = Str::padRight($content, $padding, $symbol);

        $this->assertIsString($result);
        $this->assertNotEquals(strlen($result), strlen($content));
        $this->assertStringContainsString($symbol, $result);
    }

    /**
     * @test
     */
    public function addPaddingToLeftAndRightInAStringContent(): void {
        $content = "KitDash";
        $padding = 10;
        $symbol = "*";

        $result = Str::padBoth($content, $padding, $symbol);

        $this->assertIsString($result);
        $this->assertNotEquals(strlen($result), strlen($content));
        $this->assertStringContainsString($symbol, $result);
    }

    /**
     * @test
     */
    public function removeValueOfStringContent(): void {
        $content = "KitDash library";
        $target = "library";

        $result = Str::remove($target, $content);
    
        $this->assertIsString($result);
        $this->assertNotEquals(strlen($result), strlen($content));
        $this->assertStringNotContainsString($target, $result);
    }

    /**
     * @test
     */
    public function repeatValueInAStringContent(): void {
        $content = "A";

        $result = Str::repeat($content, 3);

        $this->assertIsString($content);
        $this->assertNotEquals($content, $result);
        $this->assertNotSame($result, $content);
    }

    /**
     * @test
     */
    public function replaceValueInAStringContent(): void {
        $content = "Hello from PHP!";
        $search = "PHP";
        $replace = "KitDash";


        $result = Str::replace($search, $replace, $content);

        $this->assertIsString($content);
        $this->assertNotEquals($result, $content);
        $this->assertStringContainsString($replace, $result);
        $this->assertStringNotContainsString($search, $result);
    }

    /**
     * @test
     */
    public function reverseStringContent(): void {
        $content = "KitDash";

        $result = Str::reverse($content);

        $this->assertIsString($result);
        $this->assertNotEquals($result, $content);
        $this->assertEquals(strlen($result), strlen($content));
    }

    /**
     * @test
     */
    public function addSlugToAStringContent(): void {
        $content = "This is my new version of KitDash library";
        $seperator = "-";

        $result = Str::slug($content, $seperator);

        $this->assertIsString($content);
        $this->assertNotEquals($result, $content);
        $this->assertStringContainsString($seperator, $result);
    }

    /**
     * @test
     */
    public function takeContentBetweenSelectedValuesFromStartAndEndOfStringContent(): void {
        $whitesapce = " ";
        $start = "This";
        $end = "name";
        $content = "{$start} is my {$end}";

        $result = Str::between($content, $start, $end);

        $this->assertIsString($result);
        $this->assertNotEquals($result, $content);
        $this->assertStringContainsString($whitesapce, $result);
        $this->assertStringNotContainsString($start, $result);
        $this->assertStringNotContainsString($end, $result);
    }
}
