<?php
/*
 * This file is part of Benchmark.
 *
 * (c) 2013 Nicolò Martini
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nicmart\Benchmark;
use Jeremeamia\SuperClosure\ClosureParser;

/**
 * Class Benchmark
 */
class Benchmark extends AbstractBenchmark
{
    private $functions = array();

    /**
     * @param $name
     * @param $title
     * @param $func
     * @param bool $compare
     * @return $this
     */
    public function register($name, $title, $func, $compare = false)
    {
        $this->resultsGroup->funcs[$name]
            = $this->functions[$name] = $func;
        $this->resultsGroup->funcTitles[$name] = $title;

        if ($compare)
            $this->resultsGroup->compareWith[] = $name;

        return $this;
    }

    protected function getSamplersForInputSize($inputSize)
    {
        return $this->functions;
    }
}