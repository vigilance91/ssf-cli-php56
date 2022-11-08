# [vsn\ssf-cli]()&trade; for PHP 5.6

# Copyright &copy; [Tyler R. Drury](https://vigilance91.github.io/) 28-04-2022, All Rights Reserved

## Proudly [Canadian](https://www.canada.ca/en.html), made in [Ontario](https://www.ontario.ca/)


---

**vsn\ssf-cli.phar** is a PHP 5.6 archive which contains Object oriented APIs for PHP resource types and global functions such as:

* encoding SSF 32 and 64 Byte signatures
* deconding SSF 32 and 64 Byte signatures
* verifying SSF 32 and 64 Byte signatures

---

## License

[ssf-cli.phar]() is released under the [Apache 2.0 License][],
typical of all VSN products.

See [LICENSE][7] file for details.

---

## Installation

### using composer
```
>composer require vsn/ssf-cli
```
### using curl
```
>curl ftps://vsn.ca/downloads/php56/ssf-cli.phar
```
### using github
```
>git ...
```

### Or simply

* download [**vsn\ssf-cli-php56&trade; PHAR**](https://vsn.ca/downloads/php56/ssf-cli.phar) from the offical website
* download the latest stable version via the offcial [**FTPS**](ftps://vsn.ca/downloads/php/56/ssf-cli.phar) server
* clone the public github repository [**here**](https://github.com/vigilance91/ssf-cli-php56)
* download the official compressed package (.gz) from [**IPFS**]()

---

## Use

After installation, the PHAR may be executed from anywhere on a machine

```
>cd C:/some/directory
>%php5% C:/phars/ssf-cli/run.php --d=3 --v --A
```

or, if the archive is installed in a main project's sub-directory:

```
>cd C:/some/directory
>%php5% build/run.php --d=3 --v --A
```

Or, if the PHP interpreter and the local directory containg all downloaded PHARS have been added to the default system PATH variable,
the leading call to the php interpreter can be omitted as follows


```
>php %PHAR_DIR%/ssf-cli/run.php --d=3 --v --A
```


* *DEBUG* installs are for the most recent developer builds (alphas) only, as such, all distributable PHARs lack any debug functionality and enabling quiet mode hides the header, footer and menu displays (if --A is provides as well)
* All *DEBUG* installs are dependent upon the chrono module for low-level, high accuracy code execution profiling
* Note that if debugging a script executing on a server, use of xdebug (for live server debugging) requires PHP 7.1+ as well as a manually compiled PHP interpreter, with the xdebug Zend extension installed and a compatible IDE (with appropriate extensions)

Ensure all additional desired/required modules have been installed.

Output an unsigned packed SSF32 to the console, outputting as hex

```
>php build/run.php --M=encode --F=str
    --source="hello world"
    --hex
```

Encode an unsigned packed SSF32, outputting to the console as base64

```
>php build/run.php --M=encode --F=str
    --source="hello world"
    --base64
```

Encode an signed packed SSF32, outputting to the console as hex

```
>php build/run.php --M=encode --F=str
    --source="hello world"
    --privateKey=pathToPrivateKey.key
    --password=yourPasswordHere
    --hex
```

Write SSF encoded string to file

```
>php build/run.php --M=encode --F=stf
    --source="hello world"
    --O="_output/tmpPackedUnsinged.ssf32"
    --hex --v --d=3
```

Optionally, instead of using the -F stf,
--O, --v and --d options can be omitted and the shell's pipe operator can be used
to write the output (assuming there is no other output, errors, exceptions, etc, than what is output at exection termination),
option -F str can be used similar to bellow:

```
>php build/run.php --M=encode --F=str
    --source="hello world"
    --hex > _output/tmpPackedUnsinged.hex.ssf32
```

Verify --source as a base64 encoded Unsigned SSF.

```
>php build/run.php -M verify --F=f
    --source="hello world"
    --ssf="I1NTRg0KGgqcgTTO8t+o6YGHEdqa/hDg2kjcp1jKhm66jUffJYR89Ec9fYM0P7fgOPQvfccOAYxScHP08mG8NdfcXDfIlUDBAAABQLlNJ7mTTT4IpS5S19p9q/rEhO/jelOA7pCI96zi783pSzJ0jfVOQaCUZUsMyoj3dgqKzOKwWPUatmlWE/W4N2W3w6rTJQPQTISFOECbnzUuYaWZVeVOu3g6dEdksH5JL3eX97R/uaC3lW/FFykYHY01oxf6hB/qXE1F3c6irjOiaQITZ+D6S0v7qgyvAxFdtmgRCLSVAMgI74rXrpoWAT7QnM6MSk740c/fG23iDvXKK5I7aqfVl1iLUBo4Jd8B+rhTSeOiHYdZZNbiwfdQ22ZyHu+JbmNtpRMQ7TesjOZW+SPMI009rK1KPOFW3Uqp4KJMlszQjn3tkWRlZhjnIvhpmzGIP2/JMi8weaSEd5yTIkRAIVUTCnJp1yboZSUW85dlVmXIfhMYm4wJyF7rDSHSobaG5agPMFOQETf0UUt4"
    --base64
```

**Note**: If the option argument does not contain whitespace quotes can be omitted. If the argument is a file path or URL,
it is recommended to urlencode the value if the value contains whitespace or other characters needing escaped while also omitting the quottion marks.

```
>php build/run.php -M verify --F=f
    --v --d=3 --base64 
    --privateKey="C:/path/to/rsaPrivateKey.key"
    --password="replaceWithYourPrivteKeyPassword"
    --source="_output/helloWorld.txt"
    --ssf="I1NTRg0KGgqcgTTO8t+o6YGHEdqa/hDg2kjcp1jKhm66jUffJYR89Ec9fYM0P7fgOPQvfccOAYxScHP08mG8NdfcXDfIlUDBAAABQLlNJ7mTTT4IpS5S19p9q/rEhO/jelOA7pCI96zi783pSzJ0jfVOQaCUZUsMyoj3dgqKzOKwWPUatmlWE/W4N2W3w6rTJQPQTISFOECbnzUuYaWZVeVOu3g6dEdksH5JL3eX97R/uaC3lW/FFykYHY01oxf6hB/qXE1F3c6irjOiaQITZ+D6S0v7qgyvAxFdtmgRCLSVAMgI74rXrpoWAT7QnM6MSk740c/fG23iDvXKK5I7aqfVl1iLUBo4Jd8B+rhTSeOiHYdZZNbiwfdQ22ZyHu+JbmNtpRMQ7TesjOZW+SPMI009rK1KPOFW3Uqp4KJMlszQjn3tkWRlZhjnIvhpmzGIP2/JMi8weaSEd5yTIkRAIVUTCnJp1yboZSUW85dlVmXIfhMYm4wJyF7rDSHSobaG5agPMFOQETf0UUt4"
```

**Note**:Quotation marks around string arguments are optional, unless the value contains whitespace or other escape characters.

```
>php build/run.php -M verify --F=str
    --v --d=3 --base64 
    --privateKey=C%3A%2Fpath%2Fto%2FrsaPrivateKey.key
    --password=replaceWithYourPrivteKeyPassword
    --source=.%2F_output%2FhelloWorld.txt
    --ssf=I1NTRg0KGgpskEqXGkFC0z9JaYtHC8MEOzfdU7tJvJMCSbkRuprJ4Uc9fYM0P7fgOPQvfccOAYxScHP08mG8NdfcXDfIlUDBAAAAILlNJ7mTTT4IpS5S19p9q/rEhO/jelOA7pCI96zi783p
```

---

## Links

The official, most recent and stable version of the VS CLI PHAR libraries for development use are hosted here:

* [PHAR unminifed][14] version 0.1.1 (**SSF32**: )
* [PHAR minifed][14] version 0.1.1 (**SSF32**: )
* [GZ compressed][15] version 0.1.1 (**SSF32**: )
* [BZ compressed][15] version 0.1.1 (**SSF32**: )
* [ZIP compressed][15] version 0.1.1 (**SSF32**: )

* [Developer Documentation][16]

### Additional Links

* ssf-cli-php73 - [License][10], [Authors][11] & [contributors][12].
* ssf-cli-php81 - [License][10], [Authors][11] & [contributors][12].


[1]: https://vs.ca
[2]: https://vs.ca
[3]: https://vs.ca
[4]: https://vs.ca
[5]: https://vs.ca
[6]: https://vs.ca
[7]: https://github.com/vigilance91/ssf-cli-php56/blob/master/LICENSE
[8]: https://github.com/vigilance91/ssf-cli-php56/blob/master/AUTHORS.en.txt
[9]: https://github.com/vigilance91/ssf-cli-php56/blob/master/CONTRIBUTORS.md
[10]: https://github.com/vigilance91/ssf-cli-php73/blob/master/LICENSE
[11]: https://github.com/vigilance91/ssf-cli-php73/blob/master/AUTHORS.en.txt
[12]: https://github.com/vigilance91/ssf-cli-php73/blob/master/CONTRIBUTORS.md
[13]: https://github.com/vigilance91/ssf-cli-php73/blob/master/LICENSE
[14]: https://github.com/vigilance91/ssf-cli-php73/blob/master/AUTHORS.en.txt
[15]: https://github.com/vigilance91/ssf-cli-php73/blob/master/CONTRIBUTORS.md
[16]: https://vs.ca
[17]: https://vs.ca/php/cli/meta.php
[18]: https://vs.ca/php/cli/meta_min.php