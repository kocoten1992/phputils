<?php

use K92\Phputils\BashCharEscape;
use PHPUnit\Framework\TestCase;

class BashCharEscapeTest extends TestCase
{
    public function test_bash_char_escape(): void
    {
        $this->assertEquals('\\\'\\\\\\}\\\'', BashCharEscape::escape('}', '\\', '\\\\\\', "'"));

        // not escape
        $this->assertEquals('\\\'\\\\\\"\\\'', BashCharEscape::escape('"', '\\', '\\\\\\', "'"));

        // override
        $this->assertEquals(
            'abc',
            BashCharEscape::escape('"', '\\', '\\\\\\', "'", ['"' => 'abc'])
        );
    }
}
