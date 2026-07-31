<?php

namespace Tests\Unit\Support;

use Error;

use PHPUnit\Framework\TestCase;

use Kit\Support\Str;
use Kit\Support\Interfaces\Str as IStr;

final class StrTest extends TestCase
{
    /**
     * @test
     */
    public function throwAnErrorToGetNewInstance(): void
    {
        try {
            new Str();
        } catch (Error $error) {
            $this->assertIsObject($error);
            $this->assertIsString($error->getMessage());
        }
    }

    /**
     * @test
     */
    public function isImplementedStrInterface(): void
    {
        $interfaces = class_implements(Str::class);

        $this->assertIsArray($interfaces);
        $this->assertArrayHasKey(IStr::class, $interfaces);
    }

    // ========== Countable ==========

    /**
     * @test
     */
    public function getLengthOfString(): void
    {
        $content = "KitDash";

        $length = Str::length($content);

        $this->assertIsInt($length);
        $this->assertSame(7, $length);
    }

    /**
     * @test
     */
    public function getLengthOfEmptyStringThatReturnsZero(): void
    {
        $this->assertSame(0, Str::length(""));
    }

    /**
     * @test
     */
    public function getCountOfWords(): void
    {
        $this->assertSame(3, Str::wordCount("PHP Utility Library"));
        $this->assertSame(0, Str::wordCount(""));
    }

    // ========== Caseable ==========

    /**
     * @test
     */
    public function convertStringToTitleCase(): void
    {
        $result = Str::title("a nice title uses the correct case");

        $this->assertIsString($result);
        $this->assertStringStartsWith("A", $result);
    }

    /**
     * @test
     */
    public function convertCamelCaseToSnakeCase(): void
    {
        $result = Str::snake("fooBar");

        $this->assertIsString($result);
        $this->assertStringContainsString("_", $result);
    }

    /**
     * @test
     */
    public function convertCamelCaseToKebabCase(): void
    {
        $result = Str::kebab("fooBar");

        $this->assertIsString($result);
        $this->assertStringContainsString("-", $result);
    }

    /**
     * @test
     */
    public function convertSnakeCaseToCamelCase(): void
    {
        $result = Str::camel("foo_bar");

        $this->assertIsString($result);
        $this->assertStringNotContainsString("_", $result);
        $this->assertSame("fooBar", $result);
    }

    /**
     * @test
     */
    public function convertToHeadline(): void
    {
        $result = Str::headline("EmailNotificationSent");

        $this->assertIsString($result);
        $this->assertStringContainsString(" ", $result);
    }

    // ========== Decoratable ==========

    /**
     * @test
     */
    public function removeExtraWhiteSpaces(): void
    {
        $content = "    KitDash    library    ";

        $result = Str::squish($content);

        $this->assertIsString($result);
        $this->assertSame("KitDash library", $result);
    }

    /**
     * @test
     */
    public function trimSpecificCharacters(): void
    {
        $content = "*KitDash*";

        $result = Str::trim($content, "*");

        $this->assertSame("KitDash", $result);
    }

    // ========== Encodable ==========

    /**
     * @test
     */
    public function convertStringToBase64(): void
    {
        $result = Str::toBase64("Hello from KitDash!");

        $this->assertIsString($result);
        $this->assertNotEmpty($result);
        $this->assertSame(base64_encode("Hello from KitDash!"), $result);
    }

    // ========== Escapable ==========

    /**
     * @test
     */
    public function escapeHtmlSpecialCharacters(): void
    {
        $query =
            "SELECT * FROM users WHERE id = 1 AND <script>alert(true)</script>";

        $result = Str::e($query);

        $this->assertIsString($result);
        $this->assertStringContainsString("&lt;", $result);
        $this->assertStringContainsString("&gt;", $result);
    }

    // ========== Extraction ==========

    /**
     * @test
     */
    public function splitStringBySeparator(): void
    {
        $result = Str::split("KitDash library", " ");

        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertSame(["KitDash", "library"], $result);
    }

    // ========== Modifiable ==========

    /**
     * @test
     */
    public function convertStringToUpperCase(): void
    {
        $this->assertSame(
            "PHP PROGRAMMING LANGUAGE",
            Str::upper("PHP programming language"),
        );
    }

    /**
     * @test
     */
    public function convertStringToLowerCase(): void
    {
        $this->assertSame(
            "php programming language",
            Str::lower("PHP programming language"),
        );
    }

    /**
     * @test
     */
    public function convertFirstCharToLowerCase(): void
    {
        $this->assertSame("foo Bar", Str::lcfirst("Foo Bar"));
    }

    /**
     * @test
     */
    public function limitStringLength(): void
    {
        $content = "The quick brown fox jumps over the lazy dog";

        $result = Str::limit($content, 20);

        $this->assertIsString($result);
        $this->assertStringEndsWith("...", $result);
        $this->assertSame(23, strlen($result)); // 20 + "..."
    }

    /**
     * @test
     */
    public function maskStringByIndex(): void
    {
        $result = Str::mask("taylor@example.com", "*", 6);

        $this->assertIsString($result);
        $this->assertSame(strlen("taylor@example.com"), strlen($result));
        $this->assertStringContainsString("*", $result);
        $this->assertStringStartsWith("taylor", $result);
    }

    /**
     * @test
     */
    public function padLeft(): void
    {
        $result = Str::padLeft("KitDash", 10, "*");

        $this->assertSame("***KitDash", $result);
    }

    /**
     * @test
     */
    public function padRight(): void
    {
        $result = Str::padRight("KitDash", 10, "*");

        $this->assertSame("KitDash***", $result);
    }

    /**
     * @test
     */
    public function padBoth(): void
    {
        $result = Str::padBoth("Kit", 7, "*");

        $this->assertSame("**Kit**", $result);
    }

    /**
     * @test
     */
    public function removeValueFromString(): void
    {
        $result = Str::remove("library", "KitDash library");

        $this->assertIsString($result);
        $this->assertStringNotContainsString("library", $result);
    }

    /**
     * @test
     */
    public function repeatString(): void
    {
        $this->assertSame("AAA", Str::repeat("A", 3));
    }

    /**
     * @test
     */
    public function replaceValueInString(): void
    {
        $result = Str::replace("PHP", "KitDash", "Hello from PHP!");

        $this->assertSame("Hello from KitDash!", $result);
    }

    /**
     * @test
     */
    public function reverseString(): void
    {
        $this->assertSame("hsaDtiK", Str::reverse("KitDash"));
    }

    /**
     * @test
     */
    public function createSlug(): void
    {
        $result = Str::slug("This is my new version of KitDash library");

        $this->assertIsString($result);
        $this->assertStringContainsString("-", $result);
        $this->assertSame("This-is-my-new-version-of-KitDash-library", $result);
    }

    /**
     * @test
     */
    public function getContentBetweenTwoValues(): void
    {
        $result = Str::between("This is my name", "This", "name");

        $this->assertIsString($result);
        $this->assertStringNotContainsString("This", $result);
        $this->assertStringNotContainsString("name", $result);
    }

    // ========== Searchable ==========

    /**
     * @test
     */
    public function getCharAtIndex(): void
    {
        $this->assertSame("K", Str::charAt("KitDash", 0));
        $this->assertSame("D", Str::charAt("KitDash", 3));
    }

    /**
     * @test
     */
    public function getPositionOfSubstring(): void
    {
        $this->assertSame(0, Str::position("KitDash", "Kit"));
        $this->assertSame(3, Str::position("KitDash", "Dash"));
    }

    /**
     * @test
     */
    public function getStringAfterSubstring(): void
    {
        $result = Str::after("Hello World", "Hello ");

        $this->assertIsString($result);
        $this->assertStringContainsString("World", $result);
    }

    /**
     * @test
     */
    public function getStringBeforeSubstring(): void
    {
        $this->assertSame("Hello", Str::before("Hello World", " World"));
    }

    /**
     * @test
     */
    public function getClassBaseNameFromNamespace(): void
    {
        $this->assertSame("Str", Str::classBaseName("Kit\\Support\\Str"));
    }

    /**
     * @test
     */
    public function getSubstring(): void
    {
        $this->assertSame("Dash", Str::substr("KitDash", 3, 4));
    }

    // ========== Validatable ==========

    /**
     * @test
     */
    public function checkIfStringIsJson(): void
    {
        $this->assertTrue(Str::isJSON('{"name":"Aref"}'));
        $this->assertFalse(Str::isJSON("not a json"));
    }

    /**
     * @test
     */
    public function checkIfStringIsUrl(): void
    {
        $this->assertTrue(Str::isURL("https://example.com"));
        $this->assertFalse(Str::isURL("not-a-url"));
    }

    /**
     * @test
     */
    public function checkIfStringIsEmpty(): void
    {
        $this->assertTrue(Str::isEmpty(""));
        $this->assertFalse(Str::isEmpty("KitDash"));
    }

    /**
     * @test
     */
    public function checkIfStringContainsSubstring(): void
    {
        $this->assertTrue(Str::contains("Hello World", "World"));
        $this->assertFalse(Str::contains("Hello World", "PHP"));
    }

    /**
     * @test
     */
    public function checkIfStringContainsAllSubstrings(): void
    {
        $this->assertTrue(
            Str::containsAll("Hello World from PHP", ["Hello", "World"]),
        );
        $this->assertFalse(Str::containsAll("Hello World", ["Hello", "PHP"]));
    }

    /**
     * @test
     */
    public function checkIfStringEndsWith(): void
    {
        $this->assertTrue(Str::endsWith("Hello World", "World"));
        $this->assertFalse(Str::endsWith("Hello World", "Hello"));
    }

    /**
     * @test
     */
    public function checkIfStringStartsWith(): void
    {
        $this->assertTrue(Str::startsWith("Hello World", "Hello"));
        $this->assertFalse(Str::startsWith("Hello World", "World"));
    }
}
