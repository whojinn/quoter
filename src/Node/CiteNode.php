<?php

declare(strict_types=1);

namespace Whojinn\Quoter\Node;

use League\CommonMark\Node\Inline\AbstractStringContainer;

class CiteNode extends AbstractStringContainer
{
    public function __construct(string $cite_char, array $data = [])
    {
        parent::__construct($cite_char, $data);
    }
}
