<?php
namespace SampleAppSpec\SampleApp;

use SampleApp\HelloWorld;
use PhpSpec\ObjectBehavior;

/**
 * @mixin HelloWorld
 */
class HelloWorldSpec extends ObjectBehavior
{
    function it_says_hello()
    {
        $this->sayHello()->shouldBe('Hello world');
    }
}
