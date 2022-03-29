<?php

declare(strict_types=1);

/**
 * Copyright 2022 whojinn

 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at

 *  http://www.apache.org/licenses/LICENSE-2.0

 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Whojinn\Quoter\Parser;

use League\CommonMark\Extension\CommonMark\Node\Block\BlockQuote;
use League\CommonMark\Parser\Inline\InlineParserInterface;
use League\CommonMark\Parser\Inline\InlineParserMatch;
use League\CommonMark\Parser\InlineParserContext;

class QuoterInlineParser implements InlineParserInterface
{
    public function getMatchDefinition(): InlineParserMatch
    {
        return InlineParserMatch::string('@');
    }

    public function parse(InlineParserContext $inlineContext): bool
    {
        // blockquoteツリーの内部に居なければfalse
        if (!$inlineContext->getContainer() instanceof BlockQuote) {
            return false;
        }

        // cursorとレストア地点を定義
        $cursor = $inlineContext->getCursor();
        $restore = $cursor->saveState();

        // 引用文の冒頭になければfalse
        if (0 === $cursor->getPosition()) {
            return false;
        }

        $cite_strings = $cursor->match('/^(.+?)/u');

        // 検索結果がnullだったらレストアしてfalse
        if (null === $cite_strings) {
            $cursor->restoreState($restore);

            return false;
        }

        return true;
    }
}
