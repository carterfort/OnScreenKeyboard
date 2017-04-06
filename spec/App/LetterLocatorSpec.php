<?php

namespace spec\App;

use App\LetterLocator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LetterLocatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(LetterLocator::class);
    }

    public function it_finds_the_difference_between_t_and_k_to_be_minus_2_3()
    {
    	$this->deltaBetweenLetters("T", "K")->shouldReturn([-2, 3]);
    }
}
