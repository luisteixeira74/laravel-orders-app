<?php

namespace Tests\Unit;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class HelpersTest extends TestCase
{
    #[Test]
    public function it_formats_user_name_correctly()
    {
        $formatted = ucfirst(strtolower('luis FERNANDO'));
        $this->assertEquals('Luis fernando', $formatted);
    }
}
