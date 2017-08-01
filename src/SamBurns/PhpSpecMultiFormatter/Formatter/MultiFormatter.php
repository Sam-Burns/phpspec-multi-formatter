<?php
namespace SamBurns\PhpSpecMultiFormatter\Formatter;

use PhpSpec\Event\ExampleEvent;
use PhpSpec\Event\SpecificationEvent;
use PhpSpec\Event\SuiteEvent;
use PhpSpec\Formatter\BasicFormatter;
use PhpSpec\Formatter\DotFormatter;
use PhpSpec\Formatter\JUnitFormatter;

class MultiFormatter extends BasicFormatter
{
    /**
     * @var BasicFormatter
     */
    private $formatter1;

    /**
     * @var BasicFormatter
     */
    private $formatter2;

    public function __construct(DotFormatter $formatter1, JUnitFormatter $formatter2)
    {
        $this->formatter1 = $formatter1;
        $this->formatter2 = $formatter2;
    }

    /**
     * @param SuiteEvent $event
     */
    public function beforeSuite(SuiteEvent $event)
    {
        $this->formatter1->beforeSuite($event);
        $this->formatter2->beforeSuite($event);
    }

    /**
     * @param SuiteEvent $event
     */
    public function afterSuite(SuiteEvent $event)
    {
        $this->formatter1->afterSuite($event);
        $this->formatter2->afterSuite($event);
    }

    /**
     * @param ExampleEvent $event
     */
    public function beforeExample(ExampleEvent $event)
    {
        $this->formatter1->beforeExample($event);
        $this->formatter2->beforeExample($event);
    }

    /**
     * @param ExampleEvent $event
     */
    public function afterExample(ExampleEvent $event)
    {
        $this->formatter1->afterExample($event);
        $this->formatter2->afterExample($event);
    }

    /**
     * @param SpecificationEvent $event
     */
    public function beforeSpecification(SpecificationEvent $event)
    {
        $this->formatter1->beforeSpecification($event);
        $this->formatter2->beforeSpecification($event);
    }

    /**
     * @param SpecificationEvent $event
     */
    public function afterSpecification(SpecificationEvent $event)
    {
        $this->formatter1->afterSpecification($event);
        $this->formatter2->afterSpecification($event);
    }
}
