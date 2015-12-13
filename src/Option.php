<?php
/**
 * @version   3.0.0
 *
 * @copyright 2011-2014 Ulrich Schmidt-Goertz <ulrich at schmidt-goertz.de> 
 * @copyright 2015 Xinc Development Team, https://github.com/xinc-develop/
 * @license Permission is hereby granted, free of charge, to any person 
 *          obtaining a copy of this software and associated documentation 
 *          files (the "Software"), to deal in the Software without restriction,
 *          including without limitation the rights to use, copy, modify, merge, 
 *          publish, distribute, sublicense, and/or sell copies of the Software, 
 *          and to permit persons to whom the Software is furnished to do so,
 *          subject to the following conditions:
 *          \\
 *          The above copyright notice and this permission notice shall be included 
 *          in all copies or substantial portions of the Software.
 *          \\
 *          THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS 
 *          OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *          FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE 
 *          AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
 *          LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, 
 *          OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 *          SOFTWARE.
 */
namespace Xinc\Getopt;

/**
 * Represents an option that Getopt accepts.
 */
class Option
{
    private $short;
    private $long;
    private $mode;
    private $description = '';
    private $argument;

    /**
     * Creates a new option.
     *
     * @param string $short the option's short name (a single letter or digit) or null for long-only options
     * @param string $long  the option's long name (a string of 2+ letter/digit/_/- characters, starting with a letter
     *                      or digit) or null for short-only options
     * @param int    $mode  whether the option can/must have an argument (one of the constants defined in the Getopt class)
     *                      (optional, defaults to no argument)
     *
     * @throws \InvalidArgumentException if both short and long name are null
     */
    public function __construct($short, $long, $mode = Getopt::NO_ARGUMENT)
    {
        if (!$short && !$long) {
            throw new \InvalidArgumentException('The short and long name may not both be empty');
        }
        $this->setShort($short);
        $this->setLong($long);
        $this->setMode($mode);
        $this->argument = new Argument();
    }

    /**
     * Defines a description for the option. This is only used for generating usage information.
     *
     * @param string $description
     *
     * @return Option this object (for chaining calls)
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Defines a default value for the option.
     *
     * @param mixed $value
     *
     * @return Option this object (for chaining calls)
     */
    public function setDefaultValue($value)
    {
        $this->argument->setDefaultValue($value);

        return $this;
    }

    /**
     * Defines a validation function for the option.
     *
     * @param callable $function
     *
     * @return Option this object (for chaining calls)
     */
    public function setValidation($function)
    {
        $this->argument->setValidation($function);

        return $this;
    }

    /**
     * Sets the argument object directly.
     *
     * @param Argument $arg
     *
     * @return Option this object (for chaining calls)
     */
    public function setArgument(Argument $arg)
    {
      if ($this->mode == Getopt::NO_ARGUMENT || $this->mode == Getopt::IS_FLAG) {
            throw new \InvalidArgumentException('Option should not have any argument');
        }
        $this->argument = $arg;

        return $this;
    }

    /**
     * Returns true if the given string is equal to either the short or the long name.
     *
     * @param string $string
     *
     * @return bool
     */
    public function matches($string)
    {
        return ($string === $this->short) || ($string === $this->long);
    }

    public function short()
    {
        return $this->short;
    }

    public function long()
    {
        return $this->long;
    }

    public function mode()
    {
        return $this->mode;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Retrieve the argument object.
     * 
     * @return Argument
     */
    public function getArgument()
    {
        return $this->argument;
    }

    private function setShort($short)
    {
        if (!(is_null($short) || preg_match('/^[a-zA-Z0-9]$/', $short))) {
            throw new \InvalidArgumentException("Short option must be null or a letter/digit, found '$short'");
        }
        $this->short = $short;
    }

    private function setLong($long)
    {
        if (!(is_null($long) || preg_match('/^[a-zA-Z0-9][a-zA-Z0-9_-]{1,}$/', $long))) {
            throw new \InvalidArgumentException("Long option must be null or an alphanumeric string, found '$long'");
        }
        $this->long = $long;
    }

    private function setMode($mode)
    {
        $valid = array(Getopt::NO_ARGUMENT, Getopt::OPTIONAL_ARGUMENT, Getopt::REQUIRED_ARGUMENT, Getopt::IS_FLAG);
        if (!in_array($mode, $valid, true)) {
            throw new \InvalidArgumentException('Option mode must be one of '
                .'Getopt::NO_ARGUMENT, Getopt::OPTIONAL_ARGUMENT, Getopt::REQUIRED_ARGUMENT and '
                .'Getopt::IS_FLAG');
        }
        $this->mode = $mode;
    }
}
