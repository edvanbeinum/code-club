# August 25, 2011 Argustment Parser

* Converts short options to booleans -a
* Converts many short options into booleans –a -b
* Converts many short options together into booleans -abc
* Converts many separated short options together into booleans –abc -def
* Converts long options into booleans --foo
* Converts many long options into booleans –foo --bar
* Adds the value to equal signed separated long options --foo=”bar”
* It will only parse valid options
* It lets you set short options that take no value
* It lets you set long options that take no value
* It creates aliases
* It can set options with mandatory value
* It can set options separated by a space
* It can set long options separated by a space
* It accepts short option and value to be concatenated
* It lets you set long options separated by space
* It converts multiple cases simultaneously
* It creates a argument list